<?php

class Sk_Insurance_Model_Observer_InsuranceObserver
{
    const DISABLED = 0;
    const ENABLED = 1;

    public function add_insurance_to_save_shipping_method($observer){
        if ($observer->getEvent()->getRequest()->getPost('shipping_insurance') == self::ENABLED) {
            $observer->getEvent()->getQuote()->getShippingAddress()->setInsuranceEnable(self::ENABLED);
        } else {
            $observer->getEvent()->getQuote()->getShippingAddress()->setInsuranceEnable(self::DISABLED);
        }
    }
}