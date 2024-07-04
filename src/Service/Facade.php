<?php

namespace App\Service\Facade;

use App\Service\ApiClient;
use App\DataTransformer\TransformerInterface;
use App\Dto\EntrepriseDto;

class RneFacade
{
    private ApiClient $apiClient;
    private TransformerInterface $transformer;

    public function __construct(ApiClient $apiClient, TransformerInterface $transformer)
    {
        $this->apiClient = $apiClient;
        $this->transformer = $transformer;
    }

    public function getData(string $siren): EntrepriseDto
    {
        $data = $this->apiClient->fetchApiData($siren);
        return $this->transformer->transform($data);
    }
}
