<?php

class Ip_Banner_Block_Widget extends Mage_Core_Block_Template
{

    public function getSlides()
    {
        return Mage::getModel('banner/slide')->getCollection()
            ->addOrder('position', 'asc')
            ->addFieldToFilter('status', 1);
    }

}