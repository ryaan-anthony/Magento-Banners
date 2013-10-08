<?php

class Ip_Banner_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function filter($content)
    {
        $_processor = Mage::helper('cms')->getBlockTemplateProcessor();
        return $_processor->filter($content);
    }

    public function getOption($id)
    {
        return Mage::getStoreConfig('banner/slide/'.$id);
    }

}