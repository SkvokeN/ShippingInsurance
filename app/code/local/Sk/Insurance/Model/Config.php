<?php

class Sk_Insurance_Model_Config extends Mage_Core_Model_Config_Data
{

    public function getPrefixes()
    {

        $carriersData = array();
        $carriers = Mage::getSingleton('shipping/config')->getAllCarriers();

        foreach ($carriers as $carrier) {
            $carriersData[] = array(
                'field' => $carrier->getCarrierCode().'_',
                'label' => $carrier->getConfigData('title'),
            );
        }
        return $carriersData;
    }

}