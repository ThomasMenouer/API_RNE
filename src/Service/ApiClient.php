<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiClient
{

    private HttpClientInterface $client;
    private string $baseUrl;
    private ?string $token = null;

    public function __construct(HttpClientInterface $client, string $baseUrl)
    {
        $this->client = $client;
        $this->baseUrl = $baseUrl;
    }

    public function authenticate(string $username, string $password): void
    {
        $response = $this->client->request('POST', $this->baseUrl . '/sso/login', [
            'json' => [
                'username' => $username,
                'password' => $password,
            ],
        ]);

        $data = $response->toArray();
        $this->token = $data['token'];

    }

    public function fetchApiData(string $siren): array
    {

        if ($this->token === null){
            throw new \Exception('Client is not authenticated');
        }

        $response = $this->client->request(
            'GET', 
            $this->baseUrl . '/companies/' . $siren, [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                ],
            ]
        );

            $data = $response->toArray();

        return $data['formality']['content']['personneMorale']['identite'];

    }

}