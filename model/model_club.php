<?php

class Club{
    private ?int $id_club;
    private ?string $nom_club;
    private ?string $tel_club;

    public function __construct(){}

    //  GETTER  //

    public function getIdCl():?int{
        return $this->id_club;
    }
    public function getNomCl():?string{
        return $this->nom_club;
    }
    public function getTelCl():?string{
        return $this->tel_club;
    }

    //  SETTER  //

    public function setIdCl($id_club){
        $this->id_club=$id_club;
    }
    public function setNomCl($nom_club){
        $this->nom_club=$nom_club;
    }
    public function setTelCl($tel_club){
        $this->tel_club=$tel_club;
    }
}