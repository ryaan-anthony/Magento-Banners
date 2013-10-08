<?php

class Ip_Banner_Block_Adminhtml_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

    public function render(Varien_Object $row)
    {
        return $row->getData($this->getColumn()->getIndex()) ? 'Enabled' : 'Disabled';
    }

}