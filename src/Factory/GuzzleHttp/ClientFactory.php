<?php

namespace Nrgone\EsbClient\Factory\GuzzleHttp;

use GuzzleHttp\Client;

final class ClientFactory
{
    public function create(array $config = []): Client
    {
        return new Client($config);
    }
}
