<?php

namespace Nrgone\EsbClient\Request;

final class PixiCustomerOrdersReportRequest
{
    /**
     * @var string
     */
    private $customerEmail;

    /**
     * @var string
     */
    private $recipientEmail;

    public function __construct(string $customerEmail, string $recipientEmail)
    {
        $this->customerEmail = $customerEmail;
        $this->recipientEmail = $recipientEmail;
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
