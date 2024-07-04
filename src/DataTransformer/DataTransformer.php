<?php

namespace App\DataTransformer;

use App\Dto\EntrepriseDto;
use App\Dto\EtablissementDto;
use APP\DataTransformer\TransformerInterface;

class DataTransformer implements TransformerInterface
{
    public function transform(array $data): EntrepriseDto
    {

        $dataEntreprise = new EntrepriseDto(
            $data['siren'], $data['denomination'], $data['forme_juridique'], 
            new \DateTime($data['date_immatriculation']), $data['capital']);

        return $dataEntreprise;
    }
}