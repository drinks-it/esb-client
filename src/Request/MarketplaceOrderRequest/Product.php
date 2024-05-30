<?php

namespace Nrgone\EsbClient\Request\MarketplaceOrderRequest;

final class Product
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @var int
     */
    private $qty;

    /**
     * @var float
     */
    private $price;

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function getQty(): int
    {
        return $this->qty;
    }

    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}
