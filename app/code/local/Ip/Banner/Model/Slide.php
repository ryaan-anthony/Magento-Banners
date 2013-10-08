<?php

class Ip_Banner_Model_Slide extends Mage_Core_Model_Abstract
{

    protected function _construct()
    {
        $this->_init('banner/slide');
    }

    public function getWidth()
    {
        list($width, $height, $type, $attr) = getimagesize($this->getImageUrl());
        return $width;
    }

    public function getHeight()
    {
        list($width, $height, $type, $attr) = getimagesize($this->getImageUrl());
        return $height;
    }

    public function getImagePath()
    {
        return Mage::getBaseDir('media') . DS . $this->getImage();
    }

    public function getImageUrl()
    {
        return Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . '/' . $this->getImage();
    }

}