<?php
class ManagerEvenement extends Evenement{

    // fonction qui ajoute un evenement en BDD
    public function addEvent($bdd)
    {
        $nom = $this->getNom();
        $dateDeb = $this->getDateDeb();
        $dateFin = $this->getDateFin();
        $desc = $this->getDescription();
        $type = $this->getTypeEvent();
        try {
            $req = $bdd->prepare('INSERT INTO Evenement(nom_event, date_debut_event, date_fin_event, description_event, id_type_event)
            VALUES  (?, ?, ?, ?, ?)');
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $dateDeb, PDO::PARAM_STR);
            $req->bindParam(3, $dateFin, PDO::PARAM_STR);
            $req->bindParam(4, $desc, PDO::PARAM_STR);
            $req->bindParam(5, $type, PDO::PARAM_STR);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // fonction qui met a jour un evenement dans la base de donnée
    public function updateEvent($bdd)
    {
        $nom = $this->getNom();
        $dateDeb = $this->getDateDeb();
        $dateFin = $this->getDateFin();
        $desc = $this->getDescription();
        $type = $this->getTypeEvent();
        $id = $this->getIdEvent();
        try {
            $req = $bdd->prepare('UPDATE evenement 
                    SET nom_event = ?, date_debut_event = ?,
                    date_fin_event = ?, description_event = ?,
                    id_type_event = ?
                    WHERE id_event = ?');
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $dateDeb, PDO::PARAM_STR);
            $req->bindParam(3, $dateFin, PDO::PARAM_STR);
            $req->bindParam(4, $desc, PDO::PARAM_STR);
            $req->bindParam(5, $type, PDO::PARAM_STR);
            $req->bindParam(6, $id, PDO::PARAM_INT);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // permet d'afficher tout les evenements
    public function allEvent($bdd): array{
        try {

            $req = $bdd->prepare('SELECT id_event, nom_event, date_debut_event, date_fin_event, 
            description_event, id_type_event FROM evenement');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }

    // récupere un evenement par son id
    public function eventById($bdd): array
    {
        try {
            $req = $bdd->prepare('SELECT nom_event, date_debut_event, date_fin_event, description_event, id_type_event FROM evenement
            WHERE id_event = :id_event');
            $req->execute(array('id_event' => $this->getIdEvent()));
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }

    //permet de recuperer un evenement commencant entre deux dates
    public function getEventBetween($bdd, \DateTime $debut, \DateTime $fin): array
    {
        try {
            $req = $bdd->query("SELECT * FROM evenement WHERE date_debut_event BETWEEN '{$debut->format('Y-m-d 00:00:00')}' AND '{$fin->format('Y-m-d 23:59:59')}'");
            $date = $req->fetchAll();
            return $date ;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }

    //permet de recuperer un evenement commencant entre deux dates indexe par jour 
    public function getEventBetweenByDay($bdd, \DateTime $debut, \DateTime $fin): array{
        $events = $this->getEventBetween($bdd, $debut, $fin);
        $days = [];
        foreach ($events as $event) {
            $date = explode(' ', $event['date_debut_event'])[0]; 
            if (!isset($days[$date])) {
                $days[$date] = [$event];
            } else {
                $days[$date][] = $event;
            }
        }
        return $days;
    }


    //supprimer un event par son id
    public function deleteEventById($bdd):void{
        try{
            $req = $bdd->prepare('DELETE FROM evenement 
            WHERE id_event = :id_event');
            $req->execute(array(
                'id_event' => $this->getIdEvent(),
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    public function ordreCroiNom($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT id_event, nom_event, date_debut_event, date_fin_event, 
            description_event, id_type_event FROM evenement ORDER BY nom_event ASC');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getMatch($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT id_event, nom_event, date_debut_event, date_fin_event, 
            description_event, id_type_event FROM evenement WHERE id_type_event = 1');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function ordreCroiDeb($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT id_event, nom_event, date_debut_event, date_fin_event, 
            description_event, id_type_event FROM evenement ORDER BY date_debut_event ASC');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function ordreCroiFin($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT id_event, nom_event, date_debut_event, date_fin_event, 
            description_event, id_type_event FROM evenement ORDER BY date_fin_event ASC');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
}

?>