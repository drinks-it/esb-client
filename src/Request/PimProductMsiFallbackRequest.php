<?php

namespace Nrgone\EsbClient\Request;

class PimProductMsiFallbackRequest
{
    private $countryCode;
    private $sku;
    private $isMsiFallbackDisabled;

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getIsMsiFallbackDisabled(): ?bool
    {
        return $this->isMsiFallbackDisabled;
    }

    public function setIsMsiFallbackDisabled(bool $isMsiFallbackDisabled): self
    {
        $this->isMsiFallbackDisabled = $isMsiFallbackDisabled;
        return $this;
    }
}
