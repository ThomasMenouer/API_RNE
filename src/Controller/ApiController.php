<?php

namespace App\Controller;

use App\Service\Facade;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    private Facade $facade;

    public function __construct(Facade $facade)
    {
        $this->facade = $facade;
    }

    #[Route('/{siren}', name: 'api_entreprise')]
    public function getEntreprise(string $siren): JsonResponse
    {
        $this->facade->authenticate();
        $entrepriseDto = $this->facade->getData($siren);
        
        // Sauvegarder les données
        //dd($entrepriseDto);
        
        $this->facade->saveData($entrepriseDto);

        return $this->json($entrepriseDto);
    }
}
