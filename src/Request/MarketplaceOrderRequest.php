<?php

namespace Nrgone\EsbClient\Request;

use Nrgone\EsbClient\Request\MarketplaceOrderRequest\Product;
use Nrgone\EsbClient\Request\MarketplaceOrderRequest\BillingAddress;
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
     * @var BillingAddress
     */
    private $billingAddress;

    /**
     * @var string
     */
    private $shippingMethod;

    /**
     * @var string
     */
    private $marketplace;

    /**
     * @var null|string
     */
    private $deliveryDate = null;

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

    public function getBillingAddress(): BillingAddress
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(BillingAddress $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function setShippingMethod(string $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function getDeliveryDate(): ?string
    {
        return $this->deliveryDate;
    }

    public function setDeliveryDate(?string $deliveryDate): void
    {
        $this->deliveryDate = $deliveryDate;
    }

    /**
     * @return string
     */
    public function getMarketplace(): string
    {
        return $this->marketplace;
    }

    /**
     * @param string $marketplace
     */
    public function setMarketplace(string $marketplace): void
    {
        $this->marketplace = $marketplace;
    }
}
