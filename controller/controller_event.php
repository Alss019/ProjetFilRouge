<?php
include './view/vue_event.php';
include './utils/connectBdd.php';
$msg = "";
if (isset($_GET['id']) && $_GET['id'] != "") {
    $event = new ManagerEvenement();
    $event->setIdEvent($_GET['id']);

    $tab = $event->eventById($bdd);
    $nom = $tab[0]['nom_event'];
    $debut = $tab[0]['date_debut_event'];
    $fin = $tab[0]['date_fin_event'];
    $desc = $tab[0]['description_event'];
    $type = $tab[0]['id_type_event'];
    $annee = substr($debut,0,4);
    $mois = substr($debut,5,2);
    $jour = substr($debut, 8,2);
    $jo = new Mois($mois, $annee);
    // echo $jo->toString();

    // echo $jour;
   echo '<div class="vue">
            <span><img src="/image/user.png"></span>
            <span>'.$jo->toString().'</span>
            <span>'.$jour.'</span>
            <span></span>
            <span></span>
            <span>'.$nom.'</span>
            <span>'.$desc.'</span>
            <span>Stade de France</span>
            <span>ZAC du Cornillon Nord</span>
            <span>93200 Saint-Denis</span>
            <span><a href="">Absence</a></span>
        </div>';
    // redirection('/FilRouge/event', '2000');
}
// $event = new ManagerEvenement(null, null, null, null, null,null);
//         $liste = $event->allEvent($bdd);
//         foreach ($liste as $value) {
//             // $start = ($value->date_debut_event)->format('D d M');
//             // $end = ($value->date_fin_event)->format('D d M'); 
//             echo '<li>
//                 <span>' . $value->nom_event . '</span>
//                 <span>' . $value->date_debut_event . '</span>
//                 <span>' .$value->date_fin_event. '</span>
//                 <span>' . $value->description_event . '</span>
//                 <span>' . $value->id_type_event . '</span>
//                 <span><a href="/projetFilRouge/eventUpdate?id=' . $value->id_event . '">🖍</a></span>
//                 <span><a href="/projetFilRouge/deleteEvent?id=' . $value->id_event . '">❌</a></span>
//             </li>';
//         }
        echo '</main>
            </body>';