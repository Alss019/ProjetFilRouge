<?php 
class ManagerAppatenir extends Appartenir{

    public function ajouterCat($bdd){
        $util = $this->getIdUtil();
        $cat = $this->getIdCat();
        try{
            $req = $bdd->prepare('INSERT INTO Appartenir(id_util, id_cat)
            VALUES  (?, ?)');
            $req->bindParam(1, $util, PDO::PARAM_STR);
            $req->bindParam(2, $cat, PDO::PARAM_STR);
            $req->execute();
        }catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function allApt(object $bdd): array{
        try {
            $req = $bdd->prepare('SELECT id_util, id_cat 
            FROM appartenir');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function trieParId($bdd): array
    {
        try {
            $req = $bdd->prepare('SELECT id_util FROM appartenir
            WHERE id_cat = :id_cat');
            $req->execute(array('id_cat' => $this->getIdCat()));
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>