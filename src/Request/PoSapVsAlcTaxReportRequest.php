<?php

namespace Nrgone\EsbClient\Request;

final class PoSapVsAlcTaxReportRequest
{
    private string $email;

    private string $countryCode;

    private \DateTimeInterface $yearMonthDate;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): void
    {
        $this->countryCode = $countryCode;
    }

    public function getYearMonthDate(): \DateTimeInterface
    {
        return $this->yearMonthDate;
    }

    public function setYearMonthDate(\DateTimeInterface $yearMonthDate): void
    {
        $this->yearMonthDate = $yearMonthDate;
    }
}
