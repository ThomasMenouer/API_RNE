<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{

    private HttpClientInterface $client;
    private string $baseUrl;
    private string $apiKey;

    public function __construct(HttpClientInterface $client, string $baseUrl, string $apiKey)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
        $this->apiKey = $apiKey;
    }

    public function fetchApiData(string $siren): array
    {
        $response = $this->client->request(
            'GET', 
            "{$this->baseUrl}/{$siren}", [
                'headers' => [
                    'Authorization' => "Bearer {$this->apiKey}",
                ],
            ]
        );

        return $response->toArray();
    }

}