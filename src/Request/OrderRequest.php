<?php

namespace Nrgone\EsbClient\Request;

use Nrgone\EsbClient\Request\OrderRequest\Address;
use Nrgone\EsbClient\Request\OrderRequest\Customer;
use Nrgone\EsbClient\Request\OrderRequest\Item;
use Nrgone\EsbClient\Request\OrderRequest\Payment;

final class OrderRequest
{
    /**
     * @var \DateTimeInterface
     */
    private $createdAt;

    /**
     * @var string
     */
    private $websiteCode;

    /**
     * @var string
     */
    private $storeCode;

    /**
     * @var string
     */
    private $incrementId;

    /**
     * @var string
     */
    private $couponCode;

    /**
     * @var null|string
     */
    private $referenceNumber = null;

    /**
     * @var null|string
     */
    private $giftMessage = null;

    /**
     * @var string
     */
    private $shippingMethod;

    /**
     * @var string
     */
    private $shippingAmount;

    /**
     * @var string|null
     */
    private $shippingAmountInclTax;

    /**
     * @var string
     */
    private $grandTotal;

    /**
     * @var string
     */
    private $shippingDescription;

    /**
     * @var string
     */
    private $type;

    /**
     * @var Address
     */
    private $billingAddress;

    /**
     * @var Address
     */
    private $shippingAddress;

    /**
     * @var Item[]
     */
    private $items;

    /**
     * @var Payment
     */
    private $payment;


    /**
     * @var ?float
     */
    private $voucherDiscount = null;

    /**
     * @var ?\DateTimeInterface
     */
    private $voucherUsedDate = null;

    /**
     * @var null|bool
     */
    private $voucherIsGiftCard = null;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var null|string
     */
    private $shippingPhoneNumber = null;

    /**
     * @var null|\DateTimeInterface
     */
    private $shippingDateTimeFrom = null;

    /**
     * @var null|\DateTimeInterface
     */
    private $shippingDateTimeTo = null;

    /**
     * @var null|string
     */
    private $marketplace = null;

    public function getCreatedAt(): \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getWebsiteCode(): string
    {
        return $this->websiteCode;
    }

    public function getStoreCode(): string
    {
        return $this->storeCode;
    }

    public function getIncrementId(): string
    {
        return $this->incrementId;
    }

    public function getCouponCode(): string
    {
        return $this->couponCode;
    }

    public function getReferenceNumber(): ?string
    {
        return $this->referenceNumber;
    }

    public function getGiftMessage(): ?string
    {
        return $this->giftMessage;
    }

    public function getShippingMethod(): string
    {
        return $this->shippingMethod;
    }

    public function getShippingAmount(): string
    {
        return $this->shippingAmount;
    }

    public function getShippingAmountInclTax(): ?string
    {
        return $this->shippingAmountInclTax;
    }

    public function getShippingDescription(): string
    {
        return $this->shippingDescription;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getBillingAddress(): Address
    {
        return $this->billingAddress;
    }

    public function getShippingAddress(): Address
    {
        return $this->shippingAddress;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setWebsiteCode(string $websiteCode): void
    {
        $this->websiteCode = $websiteCode;
    }

    public function setStoreCode(string $storeCode): void
    {
        $this->storeCode = $storeCode;
    }

    public function setIncrementId(string $incrementId): void
    {
        $this->incrementId = $incrementId;
    }

    public function setCouponCode(string $couponCode): void
    {
        $this->couponCode = $couponCode;
    }

    public function setReferenceNumber(?string $referenceNumber): void
    {
        $this->referenceNumber = $referenceNumber;
    }

    public function setGiftMessage(?string $giftMessage): void
    {
        $this->giftMessage = $giftMessage;
    }

    public function setShippingMethod(string $shippingMethod): void
    {
        $this->shippingMethod = $shippingMethod;
    }

    public function setShippingAmount(string $shippingAmount): void
    {
        $this->shippingAmount = $shippingAmount;
    }

    public function setShippingAmountInclTax(?string $shippingAmountInclTax): void
    {
        $this->shippingAmountInclTax = $shippingAmountInclTax;
    }

    public function setShippingDescription(string $shippingDescription): void
    {
        $this->shippingDescription = $shippingDescription;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function setBillingAddress(Address $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    public function setShippingAddress(Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function setPayment(Payment $payment): void
    {
        $this->payment = $payment;
    }

    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }

    public function getGrandTotal(): string
    {
        return $this->grandTotal;
    }

    public function setGrandTotal(string $grandTotal): void
    {
        $this->grandTotal = $grandTotal;
    }

    public function getVoucherDiscount(): ?float
    {
        return $this->voucherDiscount;
    }

    public function setVoucherDiscount(?float $voucherDiscount): void
    {
        $this->voucherDiscount = $voucherDiscount;
    }

    public function getVoucherUsedDate(): ?\DateTimeInterface
    {
        return $this->voucherUsedDate;
    }

    public function setVoucherUsedDate(?\DateTimeInterface $voucherUsedDate): void
    {
        $this->voucherUsedDate = $voucherUsedDate;
    }

    public function getVoucherIsGiftCard(): ?bool
    {
        return $this->voucherIsGiftCard;
    }

    public function setVoucherIsGiftCard(?bool $voucherIsGiftCard): void
    {
        $this->voucherIsGiftCard = $voucherIsGiftCard;
    }

    public function getShippingPhoneNumber(): ?string
    {
        return $this->shippingPhoneNumber;
    }

    public function setShippingPhoneNumber(?string $shippingPhoneNumber): void
    {
        $this->shippingPhoneNumber = $shippingPhoneNumber;
    }

    public function getShippingDateTimeFrom(): ?\DateTimeInterface
    {
        return $this->shippingDateTimeFrom;
    }

    public function setShippingDateTimeFrom(?\DateTimeInterface $shippingDateTimeFrom): void
    {
        $this->shippingDateTimeFrom = $shippingDateTimeFrom;
    }

    public function getShippingDateTimeTo(): ?\DateTimeInterface
    {
        return $this->shippingDateTimeTo;
    }

    public function setShippingDateTimeTo(?\DateTimeInterface $shippingDateTimeTo): void
    {
        $this->shippingDateTimeTo = $shippingDateTimeTo;
    }

    /**
     * @return string|null
     */
    public function getMarketplace(): ?string
    {
        return $this->marketplace;
    }

    /**
     * @param string|null $marketplace
     */
    public function setMarketplace(?string $marketplace): void
    {
        $this->marketplace = $marketplace;
    }
}
