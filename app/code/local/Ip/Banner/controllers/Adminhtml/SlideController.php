<?php

class Ip_Banner_Adminhtml_SlideController extends Mage_Adminhtml_Controller_Action
{

    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction()
    {
        $model = Mage::getModel('banner/slide');
        if($id = $this->getRequest()->getParam('slide_id', null)){
            $model->load((int) $id);
        }
        Mage::register('slide_data', $model);
        $this->loadLayout();
        if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
            $this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
        }
        $this->renderLayout();
    }

    public function saveAction()
    {
        $_session = Mage::getSingleton('adminhtml/session');
        if ($data = $this->getRequest()->getPost()){

            $model = Mage::getSingleton('banner/slide');

            /* set the image */
            if($image = $this->saveImage()){
                $data['image'] = $image;
            } else {
                $data['image'] = $data['image']['value'];
            }

            /* set all post data */
            $model->setData($data);
            /* set the id instead of loading for simplicity */
            if($entity_id = $this->getRequest()->getParam('slide_id', null)){
                $model->setSlideId($entity_id);
            }

            $_session->setFormData($data);
            try {
                $model->save();
                $_session->setFormData(false);
                $_session->addSuccess(Mage::helper('banner')->__('Banner slide was successfully saved.'));
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('slide_id' => $model->getSlideId()));
                } else {
                    $this->_redirect('*/*/');
                }
                return;
            }
            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this banner slide.'));
            }
            $this->_redirectReferer();
        } else {
            $_session->addError(Mage::helper('banner')->__('No banner slide found.'));
        }
        $this->_redirect('*/*/');
    }

    protected function saveImage()
    {
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            try {
                $image_name = $_FILES['image']['name'];
                $uploader = new Varien_File_Uploader('image');
                $uploader->setAllowedExtensions(array('jpg','jpeg','gif','png'));
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $path = Mage::getBaseDir('media') . DS . 'banners';
                $uploader->save($path, $image_name);
                return 'banners/'.$image_name;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this banner slide.'));
            }
            return false;
        }
    }

    public function deleteAction()
    {
        if( $this->getRequest()->getParam('slide_id') > 0 ) {
            try {
                $model = Mage::getSingleton('banner/slide');

                $model->setSlideId($this->getRequest()->getParam('slide_id'))
                    ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('banner')->__('Banner slide was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('slide_id' => $this->getRequest()->getParam('slide_id')));
            }
        }
        $this->_redirect('*/*/');
    }

}