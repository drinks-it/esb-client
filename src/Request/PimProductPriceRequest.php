<?php

namespace Nrgone\EsbClient\Request;

final class PimProductPriceRequest
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var float
     */
    private $pricePrivat;

    /**
     * @var float
     */
    private $priceGastro;

    /**
     * @var float
     */
    private $priceHandel;

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getPricePrivat(): float
    {
        return $this->pricePrivat;
    }

    public function setPricePrivat(float $pricePrivat): void
    {
        $this->pricePrivat = $pricePrivat;
    }

    public function getPriceGastro(): float
    {
        return $this->priceGastro;
    }

    public function setPriceGastro(float $priceGastro): void
    {
        $this->priceGastro = $priceGastro;
    }

    public function getPriceHandel(): float
    {
        return $this->priceHandel;
    }

    public function setPriceHandel(float $priceHandel): void
    {
        $this->priceHandel = $priceHandel;
    }
}
