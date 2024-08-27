<?php

namespace NS\StripeBundle\Service;

use \Stripe\Stripe;
use \Stripe\Charge;
use \Stripe\Error\Card as CardError;

class StripeProcessor
{
    private $private_key;
    private $public_key;

    public function __construct($private_key, $public_key)
    {
        $this->private_key = $private_key;
        $this->public_key = $public_key;

        $this->init();
    }

    public function init()
    {
        Stripe::setApiKey($this->private_key);
    }

    public function getPublicKey()
    {
        return $this->public_key;
    }

    public function charge($amount, $token = false, $currency = "cad", $description = "", $receipt_email = null, $otherOptions = array())
    {
        if(!$token)
        {
            throw new CardError('No transaction token provided');
        }

        $amount = $this->formatAmount($amount);

        try
        {
            $charge = $this->_charge($amount, $token, $currency, $description, $receipt_email, $otherOptions);
        }
        catch (CardError $ex)
        {
            throw $ex;
        }

        return $charge;
    }

    private function _charge($amount, $token, $currency, $description, $receipt_email, $otherOptions = array())
    {
        return Charge::create(array_merge($otherOptions, array(
                'amount'      => $amount,
                'source'      => $token,
                'currency'    => $currency,
                'description' => $description,
                'receipt_email' => $receipt_email
            )));
    }

    public function formatAmount($amount)
    {
        if(is_float($amount))
        {
            return $amount * 100;
        }

        return $amount;
    }
}