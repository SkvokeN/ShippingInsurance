<?php

class Sk_Insurance_Block_Sales_OrderTotals extends Mage_Sales_Block_Order_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();
        $amount = $this->getSource()->getInsuranceAmount();
        $baseAmount = $this->getSource()->getBaseInsuranceAmount();
        if ($amount != 0) {
            $this->addTotal(new Varien_Object(array(
                'code' => 'insurance',
                'value' => $amount,
                'base_value' => $baseAmount,
                'label' => 'Insurance',
            )), 'shipping');
        }
    }
}