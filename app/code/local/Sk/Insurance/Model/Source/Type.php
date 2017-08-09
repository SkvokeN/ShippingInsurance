<?php


class Sk_Insurance_Model_Source_Type
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array('value' => 1, 'label' => 'Absolute'),
            array('value' => 2, 'label' => 'Percentage'),
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return array(
            1 => 'Absolute',
            2 => 'Percentage',
        );
    }
}