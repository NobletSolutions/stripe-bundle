<?php

namespace NS\StripeBundle\Entity;

/**
 * Description of CreditCard
 *
 * @author gnat
 */
class CreditCard
{
    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var integer
     */
    private $number;

    /**
     *
     * @var integer
     */
    private $expiryYear;

    /**
     *
     * @var integer
     */
    private $expiryMonth;

    /**
     *
     * @var integer
     */
    private $cvv;

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     *
     * @return integer
     */
    public function getExpiryYear()
    {
        return $this->expiryYear;
    }

    /**
     *
     * @return integer
     */
    public function getExpiryMonth()
    {
        return $this->expiryMonth;
    }

    /**
     *
     * @return integer
     */
    public function getCvv()
    {
        return $this->cvv;
    }

    /**
     *
     * @param string $name
     * @return CreditCard
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     *
     * @param string $number
     * @return CreditCard
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     *
     * @param integer $expiryYear
     * @return CreditCard
     */
    public function setExpiryYear($expiryYear)
    {
        $this->expiryYear = $expiryYear;
        return $this;
    }

    /**
     *
     * @param integer $expiryMonth
     * @return CreditCard
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->expiryMonth = $expiryMonth;
        return $this;
    }

    /**
     *
     * @param integer $cvv
     * @return CreditCard
     */
    public function setCvv($cvv)
    {
        $this->cvv = $cvv;
        return $this;
    }
}