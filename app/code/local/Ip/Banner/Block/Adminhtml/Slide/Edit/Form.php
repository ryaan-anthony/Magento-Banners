<?php

class Ip_Banner_Block_Adminhtml_Slide_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $data = Mage::registry('slide_data');

        $form = new Varien_Data_Form(array(
            'id' => 'edit_form',
            'action' => $this->getUrl('*/*/save', array('slide_id' => $this->getRequest()->getParam('slide_id'))),
            'method' => 'post',
            'enctype' => 'multipart/form-data',
        ));

        $form->setUseContainer(true);

        $this->setForm($form);

        $fieldset = $form->addFieldset('slide_form', array(
            'legend' =>Mage::helper('banner')->__('Banner Slide'),
        ));


        $fieldset->addField('title', 'text', array(
            'label'     => Mage::helper('banner')->__('Title'),
            'class'     => 'required-entry',
            'style'     =>  'width:700px;',
            'required'  => true,
            'name'      => 'title',
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('banner')->__('Status'),
            'style'     =>  'width:700px;',
            'name'      => 'status',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('banner')->__('Enabled'),
                ),

                array(
                    'value'     => 0,
                    'label'     => Mage::helper('banner')->__('Disabled'),
                ),
            ),
        ));

        $fieldset->addField('url', 'text', array(
            'label'     => Mage::helper('banner')->__('Url'),
            'style'     =>  'width:700px;',
            'name'      => 'url',
        ));

        $fieldset->addField('position', 'text', array(
            'label'     => Mage::helper('banner')->__('Position'),
            'style'     =>  'width:700px;',
            'name'      => 'position',
        ));

        $fieldset->addField('image', 'image', array(
            'label'     => Mage::helper('banner')->__('Image'),
            'name'      => 'image',
        ));

        $fieldset->addField('content', 'editor', array(
            'label'     => Mage::helper('banner')->__('Content'),
            'config'    => Mage::getSingleton('cms/wysiwyg_config')->getConfig(),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'content',
            'style'     => 'width:700px; height:500px;',
            'wysiwyg'   => true,
        ));


        $form->setValues($data);

        return parent::_prepareForm();
    }

}