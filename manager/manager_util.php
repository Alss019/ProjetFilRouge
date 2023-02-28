<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    class ManagerUtilissateur extends Utilisateur{

        // Fonction qui cree un utilisateur
        public function addUtil(object $bdd):void{
            //récupération des valeurs de l'objet ManagerUtilisateur
            $nom = $this->getNom();
            $prenom = $this->getPrenom();
            $mail = $this->getMail();
            $mdp= $this->getMdp();
            $tel = $this->getTel();
            $valid = $this->getValide();
            $token = $this->getToken();
            $idRole = $this->getIdRole();
            try {
                $req = $bdd->prepare("INSERT INTO utilisateur
                (nom_util, prenom_util, mail_util,
                mdp_util, tel_util, valid_util,
                token_util, id_role)
                VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                $req->bindParam(1, $nom, PDO::PARAM_STR);
                $req->bindParam(2, $prenom, PDO::PARAM_STR);
                $req->bindParam(3, $mail, PDO::PARAM_STR);
                $req->bindParam(4, $mdp, PDO::PARAM_STR);
                $req->bindParam(5, $tel, PDO::PARAM_STR);
                $req->bindParam(6, $valid, PDO::PARAM_BOOL);
                $req->bindParam(7, $token, PDO::PARAM_STR);
                $req->bindParam(8, $idRole, PDO::PARAM_STR);
                $req->execute();
            } 
            catch (Exception $e) 
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }

        // fonction qui selectionne un utilisateur par son mail
        public function getUtilByMail(object $bdd): ?array{
            $mail = $this->getMail();
            try{
                $req = $bdd->prepare('SELECT id_util, nom_util, prenom_util, mail_util,
                mdp_util, tel_util, activ_util, valid_util, token_util, id_role, id_club
                FROM utilisateur WHERE mail_util = ?');
                $req->bindparam(1,$mail, PDO::PARAM_STR);
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
            }
        }

        //fonction qui envoie un mail pour activer son compte
        public function sendMail(
            ?string $userMail,
            ?string $subject,
            ?string $emailMessage,
            ?string $loginSmtp,
            ?string $mdpSmtp
            ) {
                require './vendor/autoload.php';
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.office365.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $loginSmtp;
                    $mail->Password   = $mdpSmtp;
                    $mail->SMTPSecure = 'strattls';
                    $mail->Port       = 587;
                    //Recipients
                    $mail->setFrom($login_smtp, 'StatFoot');
                    $mail->addAddress($userMail);
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body    = $emailMessage;
                    $mail->send();
                } catch (Exception $e) {
                    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }

            
        //fonction active un compte via le liens d'activation
        public function activateUtil(object $bdd): void{
            try {
                $token = $this->getToken();
                //préparation de la requête
                $req = $bdd->prepare('UPDATE utilisateur SET valid_util = 1 
                        WHERE token_util = ?');
                //affectation des paramètres
                $req->bindparam(1, $token, PDO::PARAM_STR);
                $req->execute();
            }
            //exception
            catch (Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : ' . $e->getMessage());
            }
        }
            //récuper un utilisateur avec son token
        public function getUtilByToken(object $bdd): ?array{
            try {
                $token = $this->getToken();
                //préparation de la requête
                $req = $bdd->prepare('SELECT id_util, nom_util, prenom_util, tel_util,
                mail_util, mdp_util, valid_util, token_util, id_role 
                        FROM utilisateur WHERE token_util = ?');
                //affectation des paramètres
                $req->bindparam(1, $token, PDO::PARAM_STR);
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            //exception
            catch (Exception $e) {
                //affichage d'une exception en cas d’erreur
                die('Erreur : ' . $e->getMessage());
            }
            return $data;
        }
        

    // Fonction qui met à jour un compte utilisateur
    public function updateUtil($bdd){
        //récupération des valeurs de l'objet ManagerUtilisateur
        $nom = $this->getNom();
        $prenom = $this->getPrenom();
        $mail = $this->getMail();
        $tel = $this->getTel();
        $id = $this->getId();

        try {
            $req = $bdd->prepare('UPDATE utilisateur
            SET nom_util = ?, prenom_util = ?, 
            tel_util = ?, mail_util = ? 
            WHERE id_util = ?');
            $req->bindParam(1, $nom, PDO::PARAM_STR);
            $req->bindParam(2, $prenom, PDO::PARAM_STR);
            $req->bindParam(3, $tel, PDO::PARAM_STR);
            $req->bindParam(4, $mail, PDO::PARAM_STR);
            $req->bindParam(5, $id, PDO::PARAM_INT);
            $req->execute();
        } 
        catch (Exception $e) 
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }

    // Fonction qui supprime un compte utilisateur (on passe l'attribut activ_util à 0 pour rendre le compte non actif)
    public function deleteUser($bdd)
    {
        try {
            $req = $bdd->prepare('UPDATE utilisateur
                    SET activ_util = 0
                    WHERE id_util = :id_util;');
            $req->execute(array(
                "id_util" => $this->getId(),
            ));
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Fonction qui renvoie un utilisateur actif par son mail
    // public function getUserByMail($bdd)
    // {
    //     try {
    //         $req = $bdd->prepare('SELECT * FROM utilisateur
    //                 WHERE mail_util = :mail_util
    //                 AND activ_util = :activ_util;');
    //         $req->execute(array(
    //             'mail_util' => $this->getMail(),
    //             'activ_util' => 1
    //         ));
    //         return $req->fetch(PDO::FETCH_OBJ);
    //     } catch (Exception $e) {
    //         die('Erreur : ' . $e->getMessage());
    //     }
    // }
    public function getUserById($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT * FROM utilisateur
                    WHERE id_util = :id_util ');
            $req->execute(array(
                'id_util' => $this->getId()));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getUserByClubId($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT * FROM utilisateur
                    WHERE id_util = :id_util AND id_club = :id_club');
            $req->execute(array(
                'id_util' => $this->getId(),
                'id_club' => $this->getIdClub()));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getUserByClub($bdd)
    {
        try {
            $req = $bdd->prepare('SELECT nom_util, prenom_util FROM utilisateur
                    WHERE id_club = :id_club');
            $req->execute(array(
                'id_club' => $this->getIdClub()));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function addClub(object $bdd):void{
        try{
            $club = $this->getIdClub();
            $id = $this->getId();
            $req = $bdd->prepare("UPDATE utilisateur SET id_club = ?, activ_util = 1
            WHERE id_util = ?");
            $req->bindParam(1, $club, PDO::PARAM_STR);
            $req->bindParam(2, $id, PDO::PARAM_INT);
            $req->execute();
        }catch (Exception $e) {
            //affichage d'une exception en cas d’erreur
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function getUtilByClub($bdd)   
    {
        try {
            $req = $bdd->prepare("SELECT utilisateur.id_util,utilisateur.nom_util,utilisateur.prenom_util, utilisateur.id_club, appartenir.id_cat
            FROM utilisateur
            INNER JOIN appartenir ON utilisateur.id_util = appartenir.id_util WHERE utilisateur.id_club =:id_club");
            $req->execute(array(
                'id_club' => $this->getIdClub()));
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public function allUtil($bdd){
        try{
            $req = $bdd->prepare('SELECT * from utilisateur');
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_OBJ);
            return $data;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
?>