<?php


class Sk_Insurance_Model_Source_Type
{
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => 'Absolute'),
            array('value' => 2, 'label' => 'Percentage'),
        );
    }
}