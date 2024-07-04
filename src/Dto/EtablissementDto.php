<?php

namespace App\Dto;

class EtablissementDto
{
    public string $siret;
    public string $codePays;
    public bool $principal;
    public string $adresse;

    public function __construct(string $siret, string $codePays, bool $principal, string $adresse)
    {
        $this->siret = $siret;
        $this->codePays = $codePays;
        $this->principal = $principal;
        $this->adresse = $adresse;
    }
}