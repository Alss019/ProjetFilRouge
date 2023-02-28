<?php

class Evenement
{

    private ?int $id_event;
    private ?string $nom_event;
    private ?string $date_debut_event;
    private ?string $date_fin_event;
    private ?string $description_event;
    private ?int $id_type_event;
    private $id_lieux;

    public function __construct(){}
    
    //----------------//
    //-----GETTER-----//
    //----------------//

    public function getIdEvent(): ?int
    {
        return $this->id_event;
    }
    public function getDateDeb(): ?string
    {
        return $this->date_debut_event;
    }
    public function getDateFin(): ?string
    {
        return $this->date_fin_event;
    }
    public function getNom(): ?string
    {
        return $this->nom_event;
    }
    public function getDescription(): ?string
    {
        return $this->description_event;
    }
    public function getTypeEvent(): ?int
    {
        return $this->id_type_event;
    }
    public function getLieuxEvent(): ?int
    {
        return $this->id_lieux;
    }

    //----------------//
    //-----SETTER-----//
    //----------------//

    public function setIdEvent($id_event): void
    {
        $this->id_event = $id_event;
    }

    public function setDateDeb($date_debut_event): void
    {
        $this->date_debut_event = $date_debut_event;
    }
    public function setDateFin($date_fin_event): void
    {
        $this->date_fin_event = $date_fin_event;
    }
    public function setNom($nom_event): void
    {
        $this->nom_event = $nom_event;
    }
    public function setDescription($description_event): void
    {
        $this->description_event = $description_event;
    }
    public function setTypeEvent($id_type_event): void
    {
        $this->id_type_event = $id_type_event;
    }
    public function setLieuxEvent($id_lieux): void
    {
        $this->id_lieux = $id_lieux;
    }

}
