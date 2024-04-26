<?php

namespace App\Entity;

use App\Repository\CompanyScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: CompanyScheduleRepository::class)]
class CompanySchedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    #[Assert\NotBlank(message: "Le jour ne peut pas être vide.")]
    #[Assert\Choice(choices: ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'], message: "Veuillez choisir un jour valide.")]
    private ?string $day = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotNull(message: "L'heure de début du matin ne peut pas être vide.")]
    private ?\DateTimeInterface $startMorning = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    #[Assert\NotNull(message: "L'heure de fin du matin ne peut pas être vide.")]
    #[Assert\Expression(
        "this.getEndMorning() > this.getStartMorning()",
        message: "L'heure de fin du matin doit être après l'heure de début du matin."
    )]
    private ?\DateTimeInterface $endMorning = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $startAfternoon = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    #[Assert\Expression(
        "this.getStartAfternoon() == null or this.getEndAfternoon() > this.getStartAfternoon()",
        message: "L'heure de fin d'après-midi doit être après l'heure de début d'après-midi."
    )]
    private ?\DateTimeInterface $endAfternoon = null;

    #[ORM\ManyToOne(inversedBy: 'companySchedules')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "L'entreprise ne peut pas être vide.")]
    private ?Company $company = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getStartMorning(): ?\DateTimeInterface
    {
        return $this->startMorning;
    }

    public function setStartMorning(\DateTimeInterface $startMorning): static
    {
        $this->startMorning = $startMorning;

        return $this;
    }

    public function getEndMorning(): ?\DateTimeInterface
    {
        return $this->endMorning;
    }

    public function setEndMorning(\DateTimeInterface $endMorning): static
    {
        $this->endMorning = $endMorning;

        return $this;
    }

    public function getStartAfternoon(): ?\DateTimeInterface
    {
        return $this->startAfternoon;
    }

    public function setStartAfternoon(\DateTimeInterface $startAfternoon): static
    {
        $this->startAfternoon = $startAfternoon;

        return $this;
    }

    public function getEndAfternoon(): ?\DateTimeInterface
    {
        return $this->endAfternoon;
    }

    public function setEndAfternoon(\DateTimeInterface $endAfternoon): static
    {
        $this->endAfternoon = $endAfternoon;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): static
    {
        $this->company = $company;

        return $this;
    }
}
