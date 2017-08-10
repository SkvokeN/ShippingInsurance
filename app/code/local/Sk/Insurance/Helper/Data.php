<?php

class Sk_Insurance_Helper_Data extends Mage_Core_Helper_Abstract
{
    const TYPE_ABSOLUTE = 1;
    const TYPE_PERCENT = 2;

    const PATH_CONFIG_INSURANCE_SETTING_ACTIVE = 'insurance/settings/active';
    const PATH_CONFIG_INSURANCE_SHIPPING_RATES = 'insurance/shipping_rates/';

    public function isActive()
    {
        return (bool)Mage::getStoreConfig(self::PATH_CONFIG_INSURANCE_SETTING_ACTIVE);
    }

    public function getInsuranceCarrierValue($carrierCode)
    {
        return Mage::getStoreConfig(self::PATH_CONFIG_INSURANCE_SHIPPING_RATES.$carrierCode.'_value');
    }

    public function getInsuranceCarrierType($carrierCode)
    {
        return Mage::getStoreConfig(self::PATH_CONFIG_INSURANCE_SHIPPING_RATES.$carrierCode.'_type');
    }

    public function checkInsuranceCarrierActive($carrierCode)
    {
        return (int) self::isActive()?Mage::getStoreConfig(self::PATH_CONFIG_INSURANCE_SHIPPING_RATES.$carrierCode.'_active'):0;
    }
}