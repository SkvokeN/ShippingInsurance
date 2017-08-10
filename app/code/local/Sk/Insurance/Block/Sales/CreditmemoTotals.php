<?php

class Sk_Insurance_Block_Sales_CreditmemoTotals extends Mage_Sales_Block_Order_Creditmemo_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();
        $amount = $this->getOrder()->getInsuranceAmount();
        $baseAmount = $this->getOrder()->getBaseInsuranceAmount();;
        if ($amount != 0) {
            $this->addTotal(new Varien_Object(array(
                'code' => 'insurance',
                'value' => $amount,
                'base_value' => $baseAmount,
                'label' => 'Insurance',
            )), 'shipping');
        }
        return $this;
    }

}