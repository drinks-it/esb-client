<?php

namespace Nrgone\EsbClient\Request\OrderRequest;

final class Customer
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $prefix;

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
    private $eori;

    /**
     * @var bool
     */
    private $isGuest;

    /**
     * @var bool
     */
    private $isBusiness;

    /**
     * @var bool
     */
    private $spedition;

    /**
     * @var bool
     */
    private $isFirstTimeOrder;

    /**
     * @var int
     */
    private $ordersCount;

    /**
     * @var bool
     */
    private $printInvoice;

    /**
     * @var null|string
     */
    private $b2bIndustry;

    /**
     * @var string
     */
    private $group;

    /**
     * @var null|string
     */
    private $isKeyAccount;

    /**
     * @var null|string
     */
    private $telAnnouncement;

    /**
     * @var null|string
     */
    private $dunningEmail;

    /**
     * @var null|string
     */
    private $invoicesEmail;

    /**
     * @var null|string
     */
    private $organizationName;

    /**
     * @var null|string
     */
    private $deliveryTimeOnMondayFrom;

    /**
     * @var null|string
     */
    private $deliveryTimeOnMondayTo;

    /**
     * @var null|string
     */
    private $deliveryTimeOnTuesdayFrom;

    /**
     * @var null|string
     */
    private $deliveryTimeOnTuesdayTo;

    /**
     * @var null|string
     */
    private $deliveryTimeOnWednesdayFrom;

    /**
     * @var null|string
     */
    private $deliveryTimeOnWednesdayTo;

    /**
     * @var null|string
     */
    private $deliveryTimeOnThursdayFrom;

    /**
     * @var null|string
     */
    private $deliveryTimeOnThursdayTo;

    /**
     * @var null|string
     */
    private $deliveryTimeOnFridayFrom;

    /**
     * @var null|string
     */
    private $deliveryTimeOnFridayTo;

    public function getId(): int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEori(): string
    {
        return $this->eori;
    }

    public function isGuest(): bool
    {
        return $this->isGuest;
    }

    public function isBusiness(): bool
    {
        return $this->isBusiness;
    }

    public function isSpedition(): bool
    {
        return $this->spedition;
    }

    public function isFirstTimeOrder(): bool
    {
        return $this->isFirstTimeOrder;
    }

    public function isPrintInvoice(): bool
    {
        return $this->printInvoice;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setEori(string $eori): void
    {
        $this->eori = $eori;
    }

    public function setIsGuest(bool $isGuest): void
    {
        $this->isGuest = $isGuest;
    }

    public function setIsBusiness(bool $isBusiness): void
    {
        $this->isBusiness = $isBusiness;
    }

    public function setSpedition(bool $spedition): void
    {
        $this->spedition = $spedition;
    }

    public function setIsFirstTimeOrder(bool $isFirstTimeOrder): void
    {
        $this->isFirstTimeOrder = $isFirstTimeOrder;
    }

    public function getOrdersCount(): int
    {
        return $this->ordersCount;
    }

    public function setOrdersCount(int $ordersCount): void
    {
        $this->ordersCount = $ordersCount;
    }

    public function setPrintInvoice(bool $printInvoice): void
    {
        $this->printInvoice = $printInvoice;
    }

    public function getB2bIndustry(): ?string
    {
        return $this->b2bIndustry;
    }

    public function setB2bIndustry(?string $b2bIndustry): void
    {
        $this->b2bIndustry = $b2bIndustry;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    public function getOrganizationName(): ?string
    {
        return $this->organizationName;
    }

    public function setOrganizationName(?string $organizationName): void
    {
        $this->organizationName = $organizationName;
    }

    public function getIsKeyAccount(): ?string
    {
        return $this->isKeyAccount;
    }

    public function setIsKeyAccount(?string $isKeyAccount): void
    {
        $this->isKeyAccount = $isKeyAccount;
    }

    public function getTelAnnouncement(): ?string
    {
        return $this->telAnnouncement;
    }

    public function setTelAnnouncement(?string $telAnnouncement): void
    {
        $this->telAnnouncement = $telAnnouncement;
    }

    public function getDunningEmail(): ?string
    {
        return $this->dunningEmail;
    }

    public function setDunningEmail(?string $dunningEmail): void
    {
        $this->dunningEmail = $dunningEmail;
    }

    public function getInvoicesEmail(): ?string
    {
        return $this->invoicesEmail;
    }

    public function setInvoicesEmail(?string $invoicesEmail): void
    {
        $this->invoicesEmail = $invoicesEmail;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnMondayFrom(): ?string
    {
        return $this->deliveryTimeOnMondayFrom;
    }

    /**
     * @param string|null $deliveryTimeOnMondayFrom
     */
    public function setDeliveryTimeOnMondayFrom(?string $deliveryTimeOnMondayFrom): void
    {
        $this->deliveryTimeOnMondayFrom = $deliveryTimeOnMondayFrom;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnMondayTo(): ?string
    {
        return $this->deliveryTimeOnMondayTo;
    }

    /**
     * @param string|null $deliveryTimeOnMondayTo
     */
    public function setDeliveryTimeOnMondayTo(?string $deliveryTimeOnMondayTo): void
    {
        $this->deliveryTimeOnMondayTo = $deliveryTimeOnMondayTo;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnTuesdayFrom(): ?string
    {
        return $this->deliveryTimeOnTuesdayFrom;
    }

    /**
     * @param string|null $deliveryTimeOnTuesdayFrom
     */
    public function setDeliveryTimeOnTuesdayFrom(?string $deliveryTimeOnTuesdayFrom): void
    {
        $this->deliveryTimeOnTuesdayFrom = $deliveryTimeOnTuesdayFrom;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnTuesdayTo(): ?string
    {
        return $this->deliveryTimeOnTuesdayTo;
    }

    /**
     * @param string|null $deliveryTimeOnTuesdayTo
     */
    public function setDeliveryTimeOnTuesdayTo(?string $deliveryTimeOnTuesdayTo): void
    {
        $this->deliveryTimeOnTuesdayTo = $deliveryTimeOnTuesdayTo;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnWednesdayFrom(): ?string
    {
        return $this->deliveryTimeOnWednesdayFrom;
    }

    /**
     * @param string|null $deliveryTimeOnWednesdayFrom
     */
    public function setDeliveryTimeOnWednesdayFrom(?string $deliveryTimeOnWednesdayFrom): void
    {
        $this->deliveryTimeOnWednesdayFrom = $deliveryTimeOnWednesdayFrom;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnWednesdayTo(): ?string
    {
        return $this->deliveryTimeOnWednesdayTo;
    }

    /**
     * @param string|null $deliveryTimeOnWednesdayTo
     */
    public function setDeliveryTimeOnWednesdayTo(?string $deliveryTimeOnWednesdayTo): void
    {
        $this->deliveryTimeOnWednesdayTo = $deliveryTimeOnWednesdayTo;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnThursdayFrom(): ?string
    {
        return $this->deliveryTimeOnThursdayFrom;
    }

    /**
     * @param string|null $deliveryTimeOnThursdayFrom
     */
    public function setDeliveryTimeOnThursdayFrom(?string $deliveryTimeOnThursdayFrom): void
    {
        $this->deliveryTimeOnThursdayFrom = $deliveryTimeOnThursdayFrom;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnThursdayTo(): ?string
    {
        return $this->deliveryTimeOnThursdayTo;
    }

    /**
     * @param string|null $deliveryTimeOnThursdayTo
     */
    public function setDeliveryTimeOnThursdayTo(?string $deliveryTimeOnThursdayTo): void
    {
        $this->deliveryTimeOnThursdayTo = $deliveryTimeOnThursdayTo;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnFridayFrom(): ?string
    {
        return $this->deliveryTimeOnFridayFrom;
    }

    /**
     * @param string|null $deliveryTimeOnFridayFrom
     */
    public function setDeliveryTimeOnFridayFrom(?string $deliveryTimeOnFridayFrom): void
    {
        $this->deliveryTimeOnFridayFrom = $deliveryTimeOnFridayFrom;
    }

    /**
     * @return string|null
     */
    public function getDeliveryTimeOnFridayTo(): ?string
    {
        return $this->deliveryTimeOnFridayTo;
    }

    /**
     * @param string|null $deliveryTimeOnFridayTo
     */
    public function setDeliveryTimeOnFridayTo(?string $deliveryTimeOnFridayTo): void
    {
        $this->deliveryTimeOnFridayTo = $deliveryTimeOnFridayTo;
    }
}
