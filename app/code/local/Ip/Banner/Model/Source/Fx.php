<?php

class Ip_Banner_Model_Source_Fx
{

    public function toOptionArray()
    {
        $transitions = array(
            array('value' => 'none', 'label' => 'none'),
            array('value' => 'fade', 'label' => 'fade'),
            array('value' => 'fadeout', 'label' => 'fadeout'),
            array('value' => 'scrollHorz', 'label' => 'scrollHorz'),
        );

        return $transitions;
    }

}