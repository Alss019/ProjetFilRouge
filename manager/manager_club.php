<?php 

class ManagerClub extends Club{

    public function newClub(object $bdd):void{
        //récupération des valeurs de l'objet ManagerUtilisateur
        $nom = $this->getNomCl();
        $tel = $this->getTelCl();
        try {
            $req = $bdd->prepare("INSERT INTO club
            (nom_club, tel_club)
            VALUES(?, ?)");
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $tel, PDO::PARAM_STR);
            $req->execute();
            // $dernier_id = $bdd->lastInsertId();
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    // fonction qui selectionne un club par son nom
    public function getClubByName(object $bdd): ?array{
        $nom = $this->getNomCl();
        try{
            $req = $bdd->prepare('SELECT id_club, tel_club
            FROM club WHERE nom_club = ?');
            $req->bindparam(1,$nom, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch (Exception $e) {
        //affichage d'une exception en cas d’erreur
        die('Erreur : ' . $e->getMessage());
        }
    }
    public function allClub(object $bdd): array{
        try {
            $req = $bdd->prepare('SELECT id_club, nom_club, tel_club 
            FROM club');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function rechercheClub($bdd,$txt):array{
        try{
            $req = $bdd->prepare("SELECT nom_club FROM club WHERE nom_club like'%$txt%'");
            $req->execute();
            $tab=$req->fetchAll(PDO::FETCH_ASSOC);
            return $tab;
        }catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    // fonction qui selectionne un utilisateur par son mail
    public function getClub(object $bdd): ?array{
        $nom = $this->getNomCl();
        $tel = $this->getTelCl();
        try{
            $req = $bdd->prepare('SELECT id_club, nom_club, tel_club
            FROM club WHERE nom_club = ? AND tel_club = ?');
            $req->bindparam(1,$nom, PDO::PARAM_STR);
            $req->bindparam(2,$tel, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch (Exception $e) {
        //affichage d'une exception en cas d’erreur
        die('Erreur : ' . $e->getMessage());
        }
    }
    public function getIdClub(object $bdd): ?array{
        $id = $this->getIdCl();
        try{
            $req = $bdd->prepare('SELECT id_club, nom_club, tel_club
            FROM club WHERE id_club = ?');
            $req->bindparam(1,$id, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }catch (Exception $e) {
        //affichage d'une exception en cas d’erreur
        die('Erreur : ' . $e->getMessage());
        }
    }
}