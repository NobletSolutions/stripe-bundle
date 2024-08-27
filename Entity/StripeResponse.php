<?php

namespace NS\StripeBundle\Entity;

use \Symfony\Component\Validator\Constraints as Assert;

class StripeResponse
{
    /**
     * @var string $token
     * @Assert\NotBlank()
     */
    private $token;

    /**
     * @var string $last4
     * @Assert\NotBlank()
     * @Assert\Length(min=4, max=4)
     */
    private $last4;

    /**
     * @var string $brand
     * @Assert\NotBlank()
     */
    private $brand;

    /**
     * @var integer $exp_month
     * @Assert\NotNull()
     * @Assert\Type(type="integer")
     * @Assert\Range(min=1, max=12)
     */
    private $exp_month;

    /**
     * @var integer $exp_year
     * @Assert\NotNull()
     * @Assert\Type(type="integer")
     * @Assert\GreaterThanOrEqual(value=2015)
     */
    private $exp_year;

    /**
     * @var string $client_ip
     * @Assert\NotNull()
     */
    private $client_ip;

    /**
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     *
     * @return string
     */
    public function getLast4()
    {
        return $this->last4;
    }

    /**
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     *
     * @return integer
     */
    public function getExpMonth()
    {
        return $this->exp_month;
    }

    /**
     *
     * @return integer
     */
    public function getExpYear()
    {
        return $this->exp_year;
    }

    /**
     *
     * @return string
     */
    public function getClientIp()
    {
        return $this->client_ip;
    }

    /**
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     *
     * @param string $last4
     */
    public function setLast4($last4)
    {
        $this->last4 = $last4;
    }

    /**
     *
     * @param string $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     *
     * @param integer $exp_month
     */
    public function setExpMonth($exp_month)
    {
        $this->exp_month = $exp_month;
    }

    /**
     *
     * @param integer $exp_year
     */
    public function setExpYear($exp_year)
    {
        $this->exp_year = $exp_year;
    }

    /**
     *
     * @param string $client_ip
     */
    public function setClientIp($client_ip)
    {
        $this->client_ip = $client_ip;
    }

    public function fromResponse($response)
    {
        $this->token = $response->id;
        $this->last4 = $response->card->last4;
        $this->brand = $response->card->brand;
        $this->exp_month = $response->card->exp_month;
        $this->exp_year = $response->card->exp_year;
        $this->client_ip = $response->client_ip;
    }
}