<?php

include './view/view_add_event.php';
$message = "";

$type = new TypeEvenement(null, null);
$tabType = $type->allTypeEvent($bdd); 
if($_SESSION['roles'] == 1){
    // include './utils/connectBdd.php';
    if (isset($_POST['addEvent'])) {
        // Verifier si le formulaire est rempli
        if (!empty($_POST['date_debut_event'])AND !empty($_POST['date_fin_event'])AND 
        !empty($_POST['nom_event'])AND !empty($_POST['description_event'])AND 
        !empty($_POST['id_type_event'])){
            // Instancier un nouvel objet
            $event = new ManagerEvenement();
            $event->setNom(cleanInput($_POST['nom_event']));
            $event->setDateDeb(cleanInput($_POST['date_debut_event']));
            $event->setDateFin(cleanInput($_POST['date_fin_event']));
            $event->setDescription(cleanInput($_POST['description_event']));
            $event->setTypeEvent(cleanInput($_POST['id_type_event']));
            $event->addEvent($bdd);

            $message = '<div class="card">
            <div class="pop">
                    <img src="./asset/image/ok.png" width="100px" height="100px">
                    <p>Enregistrement réussi !</p>
                </div>
            </div>';
            redirection('/projetFilRouge/addEvent', '3000');
        }else {
            $message = '<div class="card">
            <div class="pop">
                <img src="./asset/image/noOk.png" width="100px" height="100px">
                <p>echec enregistrement</p>
            </div>
        </div>';
        redirection('/projetFilRouge/addEvent', '3000');
        }
    }
}
    echo $message;
