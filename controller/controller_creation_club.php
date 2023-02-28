<?php

include './utils/connectBdd.php';

$message = "";
// test si le booutton est cliquer 
if(isset($_POST['add'])){
    //test si les champs sont remplis
    if(!empty($_POST['nom_club']) AND !empty($_POST['tel_club'])){

        $nom = cleanInput($_POST['nom_club']);
        $tel = cleanInput($_POST['tel_club']);
        //instancier un nouvel objet vide 
        $club = new ManagerClub(null, null, null);
        //nettoyer les inputs et set des données
        $club->setNomCl($nom);
        $club->setTelCl($tel);
        //insertion du club en bdd
        $testClub = $club->getClubByName($bdd);
        if($testClub == null){
            //insertion du club en bdd
            $club->newClub($bdd);
            //nouvelle variable qui contient l'id du denier club créer
            $id = $bdd->lastInsertId();
            // //insatncie un nouvel utilisateur pour ajouter club au compte 
            $util = new ManagerUtilissateur();
            $util->setIdClub($id);
            $util->setId($_SESSION['id']);
            // //insertion club au compte utilisateur
            $util->addClub($bdd);
            // $compte = $util->getUtilByMail($bdd);
            $_SESSION['activ'] = 1;
            $_SESSION['club'] = $id;
            //message de validation de creation
            $message = 'Vous avez bien cree votre espace';
            // redicretion vers la pages d'accueil
            redirection("/projetFilRouge/accueil", "100000");
        }else{
            $message ='Club Deja Cree';
        }
    }else{
        $message =' Veuillez remplir tous les champs du fomulaire';
    }
}
// else{
//         $message = '<h1>Veuillez remplir le fomulaire</h1>';
// }
include './view/view_creation_club.php';
