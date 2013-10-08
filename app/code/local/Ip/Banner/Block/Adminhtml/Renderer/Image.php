<?php

class Ip_Banner_Block_Adminhtml_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        $html = '<img ';
        $html .= 'id="' . $this->getColumn()->getId() . '" ';
        $html .= 'width="100" ';
        $html .= 'height="100" ';
        $html .= 'src="' . Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA) . '/' .$row->getData($this->getColumn()->getIndex()) . '"';
        $html .= 'class="grid-image ' . $this->getColumn()->getInlineCss() . '"/>';
        return $html;
    }

}