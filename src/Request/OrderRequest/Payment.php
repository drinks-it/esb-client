<?php

namespace Nrgone\EsbClient\Request\OrderRequest;

final class Payment
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $baseCurrencyCode;

    /**
     * @var null|string
     */
    private $lastTransactionId;

    public function getCode(): string
    {
        return $this->code;
    }

    public function getBaseCurrencyCode(): string
    {
        return $this->baseCurrencyCode;
    }

    public function getLastTransactionId(): ?string
    {
        return $this->lastTransactionId;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function setBaseCurrencyCode(string $baseCurrencyCode): void
    {
        $this->baseCurrencyCode = $baseCurrencyCode;
    }

    public function setLastTransactionId(?string $lastTransactionId): void
    {
        $this->lastTransactionId = $lastTransactionId;
    }
}
