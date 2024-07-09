<?php

namespace App\Entity;

use App\Repository\EntreprisesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntreprisesRepository::class)]
class Entreprises
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $siren;

    #[ORM\Column(length: 255)]
    private string $denomination;

    #[ORM\Column(length: 255)]
    private string $forme_juridique;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private \DateTimeInterface $date_immatriculation;

    #[ORM\Column]
    private int $capital;

    public function __construct(string $siren, string $denomination, string $forme_juridique, \DateTimeInterface $date_immatriculation, int $capital)
    {
        $this->siren = $siren;
        $this->denomination = $denomination;
        $this->forme_juridique = $forme_juridique;
        $this->date_immatriculation = $date_immatriculation;
        $this->capital = $capital;

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSiren(): string
    {
        return $this->siren;
    }

    public function setSiren(string $siren): static
    {
        $this->siren = $siren;

        return $this;
    }

    public function getDenomination(): string
    {
        return $this->denomination;
    }

    public function setDenomination(string $denomination): static
    {
        $this->denomination = $denomination;

        return $this;
    }

    public function getFormeJuridique(): string
    {
        return $this->forme_juridique;
    }

    public function setFormeJuridique(string $forme_juridique): static
    {
        $this->forme_juridique = $forme_juridique;

        return $this;
    }

    public function getDateImmatriculation(): ?\DateTimeInterface
    {
        return $this->date_immatriculation;
    }

    public function setDateImmatriculation(\DateTimeInterface $date_immatriculation): static
    {
        $this->date_immatriculation = $date_immatriculation;

        return $this;
    }

    public function getCapital(): int
    {
        return $this->capital;
    }

    public function setCapital(float $capital): static
    {
        $this->capital = settype($capital * 100, 'int');

        return $this;
    }
}
