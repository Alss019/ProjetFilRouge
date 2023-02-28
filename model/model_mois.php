<?php

// namespace Calendrier;

class Mois
{
    public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public $months = [
        'Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet',
        'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'
    ];
    public $month;
    public $annees;

    public function __construct(?int $month = null, ?int $annees = null)
    {
        if ($month === null || $month < 1 || $month > 12) {
            $month = intval(date('m'));
        }
        if ($annees === null) {
            $annees = intval(date('Y'));
        }
        $this->month = $month;
        $this->annees = $annees;
    }

    /* Revoie le Premier jour du mois */
     public function getDebutMois(): \DateTime
    {
        return new \DateTime("{$this->annees}-{$this->month}-01");
    }

    /* Revoie en mois toute lettre (ex : Aout 2022) */
    public function toString(): string
    {
        return $this->months[$this->month - 1] . ' ' . $this->annees;
    }

    /* Renvoie le nombre de semaine dans le mois  */
    public function getSemaine(): int
    {
        $start = $this->getDebutMois();
        $end = (clone $start)->modify('+1 month - 1 day');
        $semaine = intval($end->format('W')) - intval($start->format('W')) + 1;
        if ($semaine < 0) {
            $semaine = intval($end->format('W'));
        }
        return $semaine;
    }

    /* Es ce que le jour est dans le mois en cour  */
    public function DansLeMois(\Datetime $date): bool
    {
        return $this->getDebutMois()->format('Y-m') === $date->format('Y-m');
    }

    /**
     * Renvoie le mois suivant
     */
    public function MoisSuivant(): Mois
    {
        $month = $this->month + 1;
        $annee = $this->annees;
        if ($month > 12) {
            $month = 1;
            $annee += 1;
        }
        return new Mois($month, $annee);
    }
    /**
     * Renvoie Le mois precedent
     */
    public function MoisPrecedent(): Mois
    {
        $month = $this->month - 1;
        $annee = $this->annees;
        if ($month < 1) {
            $month = 12;
            $annee -= 1;
        }
        return new Mois($month, $annee);
    }
}