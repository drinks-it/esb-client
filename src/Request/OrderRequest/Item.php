<?php

namespace Nrgone\EsbClient\Request\OrderRequest;

final class Item
{
    /**
     * @var float
     */
    private $price;

    /**
     * @var float
     */
    private $priceInclTax;

    /**
     * @var string
     */
    private $incrementId;

    /**
     * @var string
     */
    private $sku;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $orderedQty;

    /**
     * @var float
     */
    private $discountAmount;

    /**
     * @var string
     */
    private $itemNote;

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getPriceInclTax(): float
    {
        return $this->priceInclTax;
    }

    public function getIncrementId(): string
    {
        return $this->incrementId;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getOrderedQty(): int
    {
        return $this->orderedQty;
    }

    public function getDiscountAmount(): float
    {
        return $this->discountAmount;
    }

    public function getItemNote(): string
    {
        return $this->itemNote;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setPriceInclTax(float $priceInclTax): void
    {
        $this->priceInclTax = $priceInclTax;
    }

    public function setIncrementId(string $incrementId): void
    {
        $this->incrementId = $incrementId;
    }

    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setOrderedQty(int $orderedQty): void
    {
        $this->orderedQty = $orderedQty;
    }

    public function setDiscountAmount(float $discountAmount): void
    {
        $this->discountAmount = $discountAmount;
    }

    public function setItemNote(string $itemNote): void
    {
        $this->itemNote = $itemNote;
    }
}
