<?php

class Roles
{

    protected $id;
    protected $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId($id): void
    {
        $this->id = $id;
    }
    public function getNom(): string
    {
        return $this->nom;
    }
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }
}
