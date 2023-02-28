<?php

if($_SESSION['roles'] == 1){
    if(isset($_GET['id']) AND $_GET['id'] != ""){
        $event = new ManagerEvenement(null, null,null,null,null);
        //parsing en entier du paramètre $_GET['id']
        $_GET['id'] = intval($_GET['id']);
        //set de l'id
        $event->setIdEvent($_GET['id']);
        //récupération de l'evenement par son id
        $tab = $event->eventById($bdd);
        //stockage du nom
        $nom = $tab[0]['nom_event'];
        //suppression de l'evenement par son id
        $event->deleteEventById($bdd);
        redirection("/projetFilRouge/event",0);
    }
    //sinon
    else{
    }
}
else{
}