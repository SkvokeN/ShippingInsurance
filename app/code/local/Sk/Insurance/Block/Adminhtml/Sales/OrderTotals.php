<?php

class Sk_Insurance_Block_Adminhtml_Sales_OrderTotals extends Mage_Sales_Block_Order_Totals
{
    protected function _initTotals()
    {
        parent::_initTotals();

        $amt = $this->getSource()->getInsuranceAmount();

        if ($amt != 0) {
            $this->addTotal(
                new Varien_Object(
                    array(
                        'code' => 'insurance',
                        'value' => $amt,
                        'label' => 'Insurance',
                    )
                ),
                'insurance'
            );
        }

        return $this;
    }
}
