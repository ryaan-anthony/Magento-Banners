<?php

class Ip_Banner_Block_Adminhtml_Slide_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {

        //do this before parent constructor to enable delete button
        $this->_objectId = 'slide_id';

        parent::__construct();

        $this->_blockGroup = 'banner';
        $this->_controller = 'adminhtml_slide';
        $this->_mode = 'edit';

        $this->_addButton('save_and_continue', array(
            'label' => Mage::helper('banner')->__('Save And Continue Edit'),
            'onclick' => 'saveAndContinueEdit()',
            'class' => 'save',
        ), -100);

        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('form_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'edit_form');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'edit_form');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('slide_data') && Mage::registry('slide_data')->getSlideId())
        {
            return Mage::helper('banner')->__('Slide: "%s"', $this->htmlEscape(Mage::registry('slide_data')->getTitle()));
        } else {
            $this->_removeButton('save_and_continue');
            return Mage::helper('banner')->__('New Banner Slide');
        }
    }

}