<?php

namespace App\Dto;

use DateTime;

class EntrepriseDto
{
    private string $siren;
    private string $denomination;
    private string $formeJuridique;
    private \DateTime $dateImmatriculation;
    private float $capital;

    public function __construct(string $siren, string $denomination, string $formeJuridique, \DateTime $dateImmatriculation, float $capital) {
        
        $this->siren = $siren;
        $this->denomination = $denomination;
        $this->formeJuridique = $formeJuridique;
        $this->dateImmatriculation = $dateImmatriculation;
        $this->capital = $capital;
    }

    public function getSiren(): string
    {
        return $this->siren;
    }

    public function getDenomination(): string
    {
        return $this->denomination;
    }

    public function getFormeJuridique(): string
    {
        return $this->formeJuridique;
    }

    public function getDateImmatriculation(): \DateTime
    {
        return $this->dateImmatriculation;
    }

    public function getCapital(): float
    {
        return $this->capital;
    }
}
