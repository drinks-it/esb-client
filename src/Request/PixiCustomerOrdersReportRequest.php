<?php

namespace Nrgone\EsbClient\Request;

final class PixiCustomerOrdersReportRequest
{
    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $customerEmail;

    /**
     * @var string
     */
    private $recipientEmail;

    public function __construct(string $countryCode, string $customerEmail, string $recipientEmail)
    {
        $this->countryCode = $countryCode;
        $this->customerEmail = $customerEmail;
        $this->recipientEmail = $recipientEmail;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function getCustomerEmail(): string
    {
        return $this->customerEmail;
    }

    public function getRecipientEmail(): string
    {
        return $this->recipientEmail;
    }
}
