<?php

class Sk_Insurance_Block_Checkout_Onepage_Shipping_Method_Available extends  Mage_Checkout_Block_Onepage_Shipping_Method_Available
{

    public function checkInsuranceCarrierActive($carrierCode)
    {
        return (int) Mage::getStoreConfig('insurance/'.$carrierCode.'/active');
    }

    public function getInsurancePrice($subTotals, $carrierCode)
    {
        $insuranceCost = 0;
        $type = Sk_Insurance_Model_Insurance::getInsuranceCarrierType($carrierCode);
        $insuranceValue = Sk_Insurance_Model_Insurance::getInsuranceCarrierValue($carrierCode);

        if($type == Sk_Insurance_Model_Insurance::TYPE_ABSOLUTE) {
            $insuranceCost = $insuranceValue;
        }else if($type == Sk_Insurance_Model_Insurance::TYPE_PERCENT) {
            $insuranceCost = $subTotals * $insuranceValue / 100;
        }

        return $this->getQuote()->getStore()->convertPrice($insuranceCost, true);
    }

}