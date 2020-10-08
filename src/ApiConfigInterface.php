<?php

namespace Nrgone\EsbClient;

interface ApiConfigInterface
{
    public function getEndpointUrl(): string;

    public function getUsername(): string;

    public function getPassword(): string;
}
