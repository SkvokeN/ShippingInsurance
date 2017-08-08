<?php

class Sk_Insurance_Model_Order_InvoiceTotal extends Mage_Sales_Model_Order_Invoice_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Invoice $invoice)
    {
        $invoice->setGrandTotal($invoice->getGrandTotal() + $invoice->getOrder()->getInsuranceAmount());
        $invoice->setBaseGrandTotal($invoice->getBaseGrandTotal() + $invoice->getOrder()->getBaseInsuranceAmount());

        return $this;
    }
}
