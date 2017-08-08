<?php
/**
 * Created by PhpStorm.
 * User: skvoka
 * Date: 07.08.17
 * Time: 16:15
 */

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
        return Mage::getStoreConfig('insurance/'.$carrierCode.'/value');
    }

    public static function getInsuranceCarrierType($carrierCode)
    {
        return Mage::getStoreConfig('insurance/'.$carrierCode.'/type');
    }

    public static function getInsuranceCost($allTotals, $carrierCode)
    {

    }

}