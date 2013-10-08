<?php


class Ip_Banner_Block_Adminhtml_Slide extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected $_addButtonLabel = 'Add New Slide';

    public function __construct()
    {
        parent::__construct();
        $this->_controller = 'adminhtml_slide';
        $this->_blockGroup = 'banner';
        $this->_headerText = Mage::helper('banner')->__('Banner Slide');
    }

}