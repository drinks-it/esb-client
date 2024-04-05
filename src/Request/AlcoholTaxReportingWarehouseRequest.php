<?php

namespace Nrgone\EsbClient\Request;

final class AlcoholTaxReportingWarehouseRequest
{
    private $email = null;

    private $countryCode = null;

    private $yearMonthDate = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(?string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getYearMonthDate(): \DateTimeInterface
    {
        return $this->yearMonthDate;
    }

    public function setYearMonthDate(?\DateTimeInterface $yearMonthDate): self
    {
        $this->yearMonthDate = $yearMonthDate;
        return $this;
    }
}
