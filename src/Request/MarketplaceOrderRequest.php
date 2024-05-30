<?php

namespace Nrgone\EsbClient\Request;

use Nrgone\EsbClient\Request\MarketplaceOrderRequest\Product;
use Nrgone\EsbClient\Request\MarketplaceOrderRequest\ShippingAddress;

final class MarketplaceOrderRequest
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var int
     */
    private $customerId;

    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * @var string
     */
    private $paymentMethod;

    /**
     * @var ShippingAddress
     */
    private $shippingAddress;

    /**
     * @var string
     */
    private $shippingMethod;

    /**
     * @var string
     */
    private $shippingCarrier;

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function setCustomerId(int $customerId): void
    {
        $this->customerId = $customerId;
    }

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): void
    {
        $this->products = $products;
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->paymentMethod = $paymentMethod;
    }

    public function getShippingAddress(): ShippingAddress
    {
        return $this->shippingAddress;
    }

    public function setShippingAddress(ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(string $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getShippingCarrier(): string
    {
        return $this->shippingCarrier;
    }

    public function setShippingCarrier(string $shippingCarrier): void
    {
        $this->shippingCarrier = $shippingCarrier;
    }
}
