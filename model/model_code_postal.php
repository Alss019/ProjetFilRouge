<?php

class CodePostal
{

    protected $id_cp;
    protected $nom_cp;

    public function __construct($nom_cp)
    {
        $this->nom_cp = $nom_cp;
    }

    public function getId()
    {
        return $this->id_cp;
    }
    public function getNom()
    {
        return $this->nom_cp;
    }

    public function setId($id_cp)
    {
        $this->id_cp = $id_cp;
    }
    public function setNom($nom_cp)
    {
        $this->nom_cp = $nom_cp;
    }
}
