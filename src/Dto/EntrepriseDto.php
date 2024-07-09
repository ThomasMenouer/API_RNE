<?php

namespace App\Dto;

use DateTime;

class EntrepriseDto
{
    public string $siren;
    public string $denomination;
    public string $formeJuridique;
    public \DateTime $dateImmatriculation;
    public int $capital;

    public function __construct(string $siren, string $denomination, string $formeJuridique, \DateTime $dateImmatriculation, int $capital) {
        
        $this->siren = $siren;
        $this->denomination = $denomination;
        $this->formeJuridique = $formeJuridique;
        $this->dateImmatriculation = $dateImmatriculation;
        $this->capital = $capital;
    }
}
