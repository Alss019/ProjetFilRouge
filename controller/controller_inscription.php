<?php

include './id_smtp.php';

$msg = "";
$msg1 = "";


//test si le bouton est cliqué
if(isset($_POST['add'])){
    //test si les champs sont remplis
    if(!empty($_POST['nom_util']) AND !empty($_POST['prenom_util']) AND 
    !empty($_POST['mail_util']) AND !empty($_POST['mdp_util']) AND 
    !empty($_POST['tel_util'])){
        // Variable, nettoyer les inputs et set des données
        $mail = cleanInput($_POST['mail_util']);
        $mdp = cleanInput($_POST['mdp_util']);
        $valid = 0;
        //instancier un nouvel objet 
        $util = new ManagerUtilissateur();
        //nettoyer les inputs et set des données
        $util->setNom(cleanInput($_POST['nom_util']));
        $util->setPrenom(cleanInput($_POST['prenom_util']));
        $util->setTel(cleanInput($_POST['tel_util']));
        $util->setMail($mail);
        $util->setValide($valid);
        $util->setIdRole(2);

        // recherche un utilisateur par son mail
        $testMail = $util->getUtilByMail($bdd);
        //test existence de l'utilisateur (éviter les doublons)
        if ($testMail == null) {
            //paramètre cout (nbr de tour de l'algo de hash)
            $options = ['cost' => 12,];
            //hasher le mot de passe
            $mdp = password_hash($mdp, PASSWORD_BCRYPT, $options);
            // On hash le mail pour cree un token unique
            $hash = md5($mail); 
            // on hash encore une fois le mail pour obtenir le token final
            $token =  ''.$hash.''.rand(0,999999).'';
            //set du password hash
            $util->setMdp($mdp);
            // on insert le token dans l'objet urilisateur
            $util -> setToken($token);
            //insertion du compte en BDD
            $util->addUtil($bdd);
            //récupération du token
            $tok = $util->getToken();
            //Variables pour envoi du mail de confirmation
            $userMail = $mail;
            $subject = utf8_decode("Verification de votre Mail et activation de votre compte");
            $emailMessage = "<p> Veuillez cliquer sur le lien pour activer votre compte</p> 
            <a href='http://localhost:8888/projetFilRouge/active?id=$tok'>
            Activer votre compte utilisateur</a>";
            //envoi du mail d'activation
            $util->sendMail(
                $userMail,
                $subject,
                $emailMessage,
                $login_smtp,
                $mdp_smtp
            );
            //message de confirmation de creation de compte
            $msg = '<div class="card">
                        <div class="pop">
                            <img src="./asset/image/ok.png" width="100px" height="100px">
                            <p>Creation de compte reussi
                            </p>
                        </div>
                    </div>';
            redirection("/projetFilRouge/", "3500");
        }else{
            // Message qui renvoie que le mail existe deja
            $msg = '<div class="card">
                        <div class="pop">
                            <img src="./asset/image/noOk.png" width="100px" height="100px">
                            <p>Votre mail est deja associer a un compte</p>
                        </div>
                    </div>';
            redirection("/projetFilRouge/", "3500");
        }
    }
    else{
        // Affiche un message d'erreur qu'il manque un champs non remplie
        $msg = '<p>Veuillez remplit tout les champs du formulaire</p>';
    }
}





if (isset($_POST['connect'])) {
    if ($_POST['mail_util'] != "" && $_POST['mdp_util'] != "") {

        $mail= cleanInput($_POST['mail_util']);
        $mdp = cleanInput($_POST['mdp_util']);

        $util = new ManagerUtilissateur();
        $util->setMail($mail);
        $util->setMdp($mdp);
        $compte = $util->getUtilByMail($bdd);
        // on verifie si il y a un compte ayant ce mail en BDD 
        if ($compte != null) {
            // on peut passer à la verification du mot de passe 
            $hash = $compte[0]['mdp_util'];
            //vérifie si le mot de passe correspond
            $motdepasse = password_verify($mdp, $hash);

            if ($motdepasse) {
                // les mots de passe correspondent
                // on initialise les varibles de session
                $_SESSION['connected'] = true;
                $_SESSION['id'] = $compte[0]['id_util'];
                $_SESSION['nom'] = $compte[0]['nom_util'];
                $_SESSION['prenom'] = $compte[0]['prenom_util'];
                $_SESSION['mail'] = $compte[0]['mail_util'];
                $_SESSION['roles'] = $compte[0]['id_role'];
                $_SESSION['valid'] = $compte[0]['valid_util'];
                $_SESSION['activ'] = $compte[0]['activ_util'];
                $_SESSION['club'] = $compte[0]['id_club'];
                // on redirige vers la page d'accueil
                $msg = "Connexion réussi";
                if($_SESSION['activ'] == 1 AND $_SESSION['club'] != null){
                    redirection("/projetFilRouge/accueil", "500");
                }else{
                    redirection("/projetFilRouge/club", "500");
                }
            } else {
                $msg1 = '<div class="card">
                <div class="pop">
                    <img src="./asset/image/noOk.png" width="100px" height="100px">
                    <p>Mot de passe ou mail incorecte
                    </p>
                </div>
            </div>';
    redirection("/projetFilRouge/", "3500");
            }
        } else {
            $msg1 = "Le compte existe pas";
        }
    }
}
include './view/view_conex_ins.php';
?>