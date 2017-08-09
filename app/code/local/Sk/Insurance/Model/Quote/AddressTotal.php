<?php

class Sk_Insurance_Model_Quote_AddressTotal extends Mage_Sales_Model_Quote_Address_Total_Abstract
{

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing') {
            return $this;
        }

        $carrierCode = explode('_', $address->getShippingMethod())[0];

        if ($address->getInsuranceEnable() && Sk_Insurance_Model_Insurance::checkInsuranceCarrierActive($carrierCode)) {

            $grandTotal = $address->getGrandTotal();
            $baseGrandTotal = $address->getBaseGrandTotal();

            $type = Sk_Insurance_Model_Insurance::getInsuranceCarrierType($carrierCode);
            $insuranceValue = Sk_Insurance_Model_Insurance::getInsuranceCarrierValue($carrierCode);

            if ($type == Sk_Insurance_Model_Insurance::TYPE_ABSOLUTE) {
                $address->setInsuranceAmount($insuranceValue);
                $address->setBaseInsuranceAmount($insuranceValue);
            } else if ($type == Sk_Insurance_Model_Insurance::TYPE_PERCENT) {
                $totals = array_sum($address->getAllTotalAmounts());
                $baseTotals = array_sum($address->getAllBaseTotalAmounts());
                $address->setInsuranceAmount($totals * $insuranceValue / 100);
                $address->setBaseInsuranceAmount($baseTotals * $insuranceValue / 100);
            }

            $address->setGrandTotal($grandTotal + $address->getInsuranceAmount());
            $address->setBaseGrandTotal($baseGrandTotal + $address->getBaseInsuranceAmount());
        }else {
            $address->setInsuranceAmount(0);
            $address->setBaseInsuranceAmount(0);
        }

        return $this;
    }


    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($address->getData('address_type') == 'billing') {
            return $this;
        }

        $amount = $address->getInsuranceAmount();

        if ($amount != 0) {
            $address->addTotal(
                array(
                    'code' => $this->getCode(),
                    'title' => 'Insurance',
                    'value' => $amount,
                )
            );
        }

        return $address;
    }
}
