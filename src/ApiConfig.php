<?php

namespace Nrgone\EsbClient;

final class ApiConfig implements ApiConfigInterface
{
    /**
     * @var string
     */
    private $endpointUrl;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    public function __construct(string $endpointUrl, string $username, string $password)
    {
        $this->endpointUrl = $endpointUrl;
        $this->username = $username;
        $this->password = $password;
    }

    public function getEndpointUrl(): string
    {
        return $this->endpointUrl;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
