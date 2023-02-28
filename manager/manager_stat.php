<?php 

class ManagerStatIndividuel extends StatIndividuel{
    
        //fonction qui ajoute des statistisque a un utilisateur lors d'une evenement en BDD
        public function addStat($bdd)
        {
                $id_util = $this->getIdUtil();
                $id_event = $this->getIdEvent();
                $presence = $this->getPresence();
                $passe = $this->getPasse();
                $passe_reussi = $this->getPasseR();
                $tirs = $this->getTirs();
                $tirs_cadre = $this->getTirsC();
                $faute = $this->getFaute();
                $carton_jaune = $this->getCartonJ();
                $carton_rouge = $this->getCartonR();
                $tacle = $this->getTacle();
                $tacle_reussi = $this->getTacleR();
                $but = $this->getBut();
                $passe_d = $this->getPasseD();
                $minutes = $this->getMinutes();
                $blessure = $this->getBlessure();
                $poste = $this->getPoste();
                try {
                        $req = $bdd->prepare('INSERT INTO stat_individuel(id_util,id_event,presence,passe,
                        passe_reussi,tirs,tirs_cadre,faute,carton_jaune,carton_rouge,tacle,
                        tacle_reussi,but,passe_d,blessure,minutes,poste)
                        VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)');
                        $req->bindParam(1, $id_util, PDO::PARAM_INT);
                        $req->bindParam(2, $id_event, PDO::PARAM_INT);
                        $req->bindParam(3, $presence, PDO::PARAM_BOOL);
                        $req->bindParam(4, $passe, PDO::PARAM_STR);
                        $req->bindParam(5, $passe_reussi, PDO::PARAM_STR);
                        $req->bindParam(6, $tirs, PDO::PARAM_STR);
                        $req->bindParam(7, $tirs_cadre, PDO::PARAM_STR);
                        $req->bindParam(8, $faute, PDO::PARAM_STR);
                        $req->bindParam(9, $carton_jaune, PDO::PARAM_STR);
                        $req->bindParam(10, $carton_rouge, PDO::PARAM_STR);
                        $req->bindParam(11, $tacle, PDO::PARAM_STR);
                        $req->bindParam(12, $tacle_reussi, PDO::PARAM_STR);
                        $req->bindParam(13, $but, PDO::PARAM_STR);
                        $req->bindParam(14, $passe_d, PDO::PARAM_STR);
                        $req->bindParam(15, $blessure, PDO::PARAM_BOOL);
                        $req->bindParam(16, $minutes, PDO::PARAM_STR);
                        $req->bindParam(17, $poste, PDO::PARAM_STR);
                        $req->execute();
                } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
                }
        }
            // récupere un evenement par son id
        public function statUtilByEvent($bdd): array
        {
                try {
                        $req = $bdd->prepare('SELECT id_util,id_event,presence,passe,
                        passe_reussi,tirs,tirs_cadre,faute,carton_jaune,carton_rouge,
                        tacle,tacle_reussi,but,passe_d,blessure,minutes,poste
                        FROM stat_individuel
                        WHERE id_event = :id_event AND id_util = :id_util');
                        $req->execute(array(
                                'id_event' => $this->getIdEvent(),
                                'id_util' => $this->getIdUtil()));
                        $data = $req->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                } catch (Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : ' . $e->getMessage());
                }
        }
        public function passeSaison($bdd){
                try{
                        $req =$bdd->prepare('SELECT SUM(passe) as passe FROM `stat_individuel` WHERE id_util = :id_util');
                        $req->execute(array('id_util' => $this->getIdUtil()));
                        $data = $req->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                }catch (Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : ' . $e->getMessage());
                }
        }
        public function statSaison($bdd){
                try{
                        $req =$bdd->prepare('SELECT SUM(presence)as presence,
                        SUM(passe)as passe,
                        SUM(passe_d)as passe_d,
                        SUM(but) as but,
                        SUM(tirs)as tirs,
                        SUM(carton_jaune)as carton_jaune,
                        SUM(carton_rouge) as carton_rouge
                         FROM `stat_individuel` WHERE id_util = :id_util');
                        $req->execute(array('id_util' => $this->getIdUtil()));
                        $data = $req->fetchAll(PDO::FETCH_ASSOC);
                        return $data;
                }catch (Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : ' . $e->getMessage());
                }
        }

}
?>