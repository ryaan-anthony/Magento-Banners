<?php

class Ip_Banner_Block_Adminhtml_Slide_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('slide_grid');
        $this->setDefaultSort('slide_id');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('banner/slide')
            ->getCollection()
            ->addFieldToSelect('*');
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('position', array(
            'header'    => Mage::helper('banner')->__('Position'),
            'align'     =>'right',
            'width'     => '50px',
            'index'     => 'position',
        ));
        $this->addColumn('image', array(
            'header'=> Mage::helper('banner')->__('Image'),
            'width' => '100px',
            'type'  => 'image',
            'index' => 'image',
            'renderer' => 'banner/adminhtml_renderer_image'
        ));
        $this->addColumn('title', array(
            'header'    => Mage::helper('banner')->__('Slide Title'),
            'align'     =>'left',
            'index'     => 'title',
        ));
        $this->addColumn('url', array(
            'header'    => Mage::helper('banner')->__('Slide Url'),
            'align'     =>'left',
            'index'     => 'url',
        ));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('slide_id' => $row->getSlideId()));
    }
}