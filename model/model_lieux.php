<?php

class Lieux
{

    protected $id_lieux;
    protected $adresse;
    protected $ville;

    public function __construct($adresse, $ville)
    {
        $this->adresse = $adresse;
        $this->ville = $ville;
    }

    //----------------//
    //-----GETTER-----//
    //----------------//

    public function getId(): int
    {
        return $this->id_lieux;
    }
    public function getAdresse(): string
    {
        return $this->adresse;
    }
    public function getVille(): string
    {
        return $this->ville;
    }

    //----------------//
    //-----SETTER-----//
    //----------------//

    public function setId($id)
    {
        $this->id_lieux = $id;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }
    public function setVille($ville)
    {
        $this->ville = $ville;
    }
}
