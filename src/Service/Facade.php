<?php

namespace App\Service;

use App\Dto\EntrepriseDto;
use App\Service\ApiClient;
use App\Entity\Entreprises;
use Doctrine\ORM\EntityManagerInterface;
use App\DataTransformer\DataTransformer;

class Facade
{
    private ApiClient $apiClient;
    private DataTransformer $transformer;
    private string $username;
    private string $password;
    private EntityManagerInterface $entityManager;

    public function __construct(ApiClient $apiClient, DataTransformer $transformer, string $username, string $password, EntityManagerInterface $entityManager)
    {
        $this->apiClient = $apiClient;
        $this->transformer = $transformer;
        $this->username = $username;
        $this->password = $password;
        $this->entityManager = $entityManager;
    }

    public function authenticate(): void
    {
        $this->apiClient->authenticate($this->username, $this->password);
    }

    public function getData(string $siren): EntrepriseDto
    {
        $data = $this->apiClient->fetchApiData($siren);
        $entrepriseDto = $this->transformer->transform($data);

        return $entrepriseDto;
        
    }

    // this function can't be here
    public function saveData(EntrepriseDto $entrepriseDto): void
    {
        $entreprise = new Entreprises(
            $entrepriseDto->getSiren(),
            $entrepriseDto->getDenomination(),
            $entrepriseDto->getFormeJuridique(),
            $entrepriseDto->getDateImmatriculation(),
            $entrepriseDto->getCapital()
        );

        $this->entityManager->persist($entreprise);
        $this->entityManager->flush();
    }

}
