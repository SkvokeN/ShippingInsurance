<?php

class Sk_Insurance_Model_Insurance extends Mage_Core_Model_Abstract
{
    const TYPE_ABSOLUTE = 1;
    const TYPE_PERCENT = 2;

    public function _construct()
    {
        parent::_construct();
        $this->_init('insurance/insurance');
    }

    public static function isActive()
    {
        return (bool)Mage::getStoreConfig('insurance/settings/active');
    }

    public static function getInsuranceCarrierValue($carrierCode)
    {
        return Mage::getStoreConfig('insurance/shipping_rates/'.$carrierCode.'_value');
    }

    public static function getInsuranceCarrierType($carrierCode)
    {
        return Mage::getStoreConfig('insurance/shipping_rates/'.$carrierCode.'_type');
    }

    public static function checkInsuranceCarrierActive($carrierCode)
    {
        return (int) Mage::getStoreConfig('insurance/shipping_rates/'.$carrierCode.'_active');
    }


}