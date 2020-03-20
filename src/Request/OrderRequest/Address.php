<?php

namespace Nrgone\EsbClient\Request\OrderRequest;

final class Address
{
    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $vatId;

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getCompany(): string
    {
        return $this->company;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getFax(): string
    {
        return $this->fax;
    }

    public function getVatId(): string
    {
        return $this->vatId;
    }

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    public function setCompany(string $company): void
    {
        $this->company = $company;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setFax(string $fax): void
    {
        $this->fax = $fax;
    }

    public function setVatId(string $vatId): void
    {
        $this->vatId = $vatId;
    }
}
