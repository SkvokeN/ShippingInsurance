<?php

class Sk_Insurance_Model_Order_CreditmemoTotal extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $creditmemo->getOrder()->getInsuranceAmount());
        $creditmemo->setBaseGrandTotal(
            $creditmemo->getBaseGrandTotal() + $creditmemo->getOrder()->getBaseInsuranceAmount()
        );

        return $this;
    }
}
