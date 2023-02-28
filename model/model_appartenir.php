<?php
class Appartenir{
    private ?int $id_util;
    private ?int $id_cat;

    public function __construct(){}

    public function getIdUtil():?int{
        return $this->id_util;
    }
    public function getIdCat():?int{
        return $this->id_cat;
    }

    public function setIdUtil($id_util){
        $this->id_util = $id_util;
    }
    public function setIdCat($id_cat){
        $this->id_cat = $id_cat;
    }
}
?>