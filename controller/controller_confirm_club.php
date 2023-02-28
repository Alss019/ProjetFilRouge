<?php
include './utils/connectBdd.php';
include './view/view_confirm_club.php';

$msg = "";
$id = cleanInput($_GET['id']);
$nom = cleanInput($_GET['nom']);
if(isset($_POST['confirme'])){
    if(isset($_GET['id']) AND isset($_GET['nom'])){

            $util = new ManagerUtilissateur(null, null);
            $util->setIdClub($id);
            $util->setId($_SESSION['id']);
            // //insertion club au compte utilisateur
            $util->addClub($bdd);
            // $compte = $util->getUtilByMail($bdd);
            $_SESSION['activ'] = 1;
            $_SESSION['club'] = $id;
            $msg = '<h1>Vous avez bien cree votre espace</h1>';
            // redirection vers la page d'accueil
            redirection("/projetFilRouge/accueil", "1000");
        }else{
            $msg = '<h1>Veuillez cochez toute les case</h1>';
            // redirection vers la page club
            redirection("/projetFilRouge/club", "1000000");
        }
    }
    // else{
    //     $msg = '<h1>Veuillez confirmer</h1>';
    //     redirection("/projetFilRouge/club", "1000000");
    // }

echo $msg;

?>