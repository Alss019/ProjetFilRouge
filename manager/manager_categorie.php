<?php

class ManagerCategorie extends Categorie{

    public function allCat(object $bdd): array{
        try {
            $req = $bdd->prepare('SELECT id_cat, nom_cat 
            FROM categorie');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }

        public function getCatById($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT nom_cat FROM categorie
                    WHERE id_cat = :id_cat');
            $req->execute(array(
                'id_cat' => $this->getIdCat()));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}