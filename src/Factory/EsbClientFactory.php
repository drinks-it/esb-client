<?php

namespace Nrgone\EsbClient\Factory;

use GuzzleHttp\Client;
use Nrgone\EsbClient\ApiConfig;
use Nrgone\EsbClient\Factory\GuzzleHttp\ClientFactory as GuzzleHttpClientFactory;
use Psr\Log\LoggerInterface;

final class EsbClientFactory
{
    /**
     * @var ApiConfig
     */
    private $apiConfig;

    /**
     * @var GuzzleHttpClientFactory
     */
    private $guzzleHttpClientFactory;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(
        ApiConfig $apiConfig,
        GuzzleHttpClientFactory $guzzleHttpClientFactory,
        LoggerInterface $logger
    ) {
        $this->apiConfig = $apiConfig;
        $this->guzzleHttpClientFactory = $guzzleHttpClientFactory;
        $this->logger = $logger;
    }

    public function create(): Client
    {
        $config = [
            'base_uri' => $this->apiConfig->getEndpointUrl(),
        ];
        $client = $this->guzzleHttpClientFactory->create($config);
        $response = $client->request('POST', 'authentication_token', [
            'json' => [
                'email' => $this->apiConfig->getUsername(),
                'password' => $this->apiConfig->getPassword(),
            ],
        ]);
        $responseDecoded = json_decode((string)$response->getBody()->getContents(), true);
        $token = $responseDecoded['token'];
        $config['headers'] = [
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/vnd.api+json',
            'Accept' => 'application/vnd.api+json',
        ];
        $this->logger->debug($token, $config);
        return $this->guzzleHttpClientFactory->create($config);
    }
}
