<?php

class Sk_Insurance_Block_Checkout_Onepage_Shipping_Method_Available extends  Mage_Checkout_Block_Onepage_Shipping_Method_Available
{

    public function getInsurancePrice($subTotals, $carrierCode)
    {
        $insuranceCost = 0;
        $helper = Mage::helper('skinsurance');
        $type = $helper->getInsuranceCarrierType($carrierCode);
        $insuranceValue = $helper->getInsuranceCarrierValue($carrierCode);

        if($type == $helper::TYPE_ABSOLUTE) {
            $insuranceCost = $insuranceValue;
        }else if($type == $helper::TYPE_PERCENT) {
            $insuranceCost = $subTotals * $insuranceValue / 100;
        }

        return $this->getQuote()->getStore()->convertPrice($insuranceCost, true);
    }

}