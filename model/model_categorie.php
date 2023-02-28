<?php
class Categorie{
    private ?int $id_cat;
    private ?string $nom_cat;

    public function __construct(){}

    public function getIdCat():?int{
        return $this->id_cat;
    }
    public function getNomCat():?string{
        return $this->nom_cat;
    }

    public function setIdCat($id_cat){
        $this->id_cat = $id_cat;
    }
    public function setNomCat($nom_cat){
        $this->nom_cat = $nom_cat;
    }
}
?>