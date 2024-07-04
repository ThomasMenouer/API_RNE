<?php

namespace App\DataTransformer;

use App\Dto\EntrepriseDto;
use App\Dto\EtablissementDto;
use App\DataTransformer\TransformerInterface;

class DataTransformer implements TransformerInterface
{
    public function transform(array $data): EntrepriseDto
    {

        $dataEntreprise = new EntrepriseDto(
            $data['entreprise']['siren'], 
            $data['entreprise']['denomination'], 
            $data['entreprise']['formeJuridique'], 
            new \DateTime($data['entreprise']['dateImmat']), 
            $data['description']['montantCapital']);

        return $dataEntreprise;
    }
}