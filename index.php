<?php
session_start();

/* ------------------------------ IMPORT MODELS & UTILITAIRES ------------------------------ */
include './model/model_util.php';
include './model/model_mois.php';
include './model/model_roles.php';
include './model/model_type_event.php';
include './model/model_event.php';
include './model/model_stats.php';
include './model/model_club.php';
include './model/model_categorie.php';
include './model/model_appartenir.php';
include './manager/manager_util.php';
include './manager/manager_stat.php';
include './manager/manager_event.php';
include './manager/manager_club.php';
include './manager/manager_categorie.php';
include './manager/manager_appartenir.php';
include './utils/fonction.php';

/* ------------------------------ IMPORT HEADERS ------------------------------ */

if (isset($_SESSION['connected'])) {
    if ($_SESSION['roles'] == 1) {
        include './view/header_admin.php';
        include './utils/connectBdd.php';
    } else {
        include './view/header_util.php';
        include './utils/connectBdd.php';
    }
} else {
    include './view/header_visiteur.php';
    include './utils/connectBdd.php';
}

/* ------------------------------ ROUTER ------------------------------ */
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';

switch ($path) {
    case $path === "/projetFilRouge/":
        include './controller/controller_inscription.php';
        break;
    case $path === "/projetFilRouge/accueil":
        include './controller/controller_accueil.php';
        break;
    case $path === "/projetFilRouge/active":
        include './controller/controller_active_util.php';
        break;
    case $path === "/projetFilRouge/club":
        include './controller/controller_club.php';
        break;
    case $path === "/projetFilRouge/confirmClub":
        include './controller/controller_confirm_club.php';
        break;
    case $path === "/projetFilRouge/CreationClub":
        include './controller/controller_creation_club.php';
        break;
    case $path === "/projetFilRouge/profil":
        include './controller/controller_profil.php';
        break;
    case $path === "/projetFilRouge/stat":
        include './controller/controller_stat.php';
        break;
    case $path === "/projetFilRouge/addStat":
        include './controller/controller_add_stat.php';
        break;
    case $path === "/projetFilRouge/statIndiv":
        include './controller/controller_stats_indiv.php';
        break;
    case $path === "/projetFilRouge/event":
        include './controller/controller_event.php';
        break;
    case $path === "/projetFilRouge/addEvent":
        include './controller/controller_add_event.php';
        break;
    case $path === "/projetFilRouge/eventUpdate":
        include './controller/controller_update_event.php';
        break;
    case $path === "/projetFilRouge/deleteEvent":
        include './controller/controller_delete_event.php';
        break;
    case $path === "/projetFilRouge/categorie":
        include './controller/controller_categorie.php';
        break;
    case $path === "/projetFilRouge/admin":
        include './controller/controller_admin.php';
        break;
    case $path === "/projetFilRouge/deco":
        include './controller/controller_deco.php';
        break;

    default:
        include './controller/error.php';
        break;
}

/* ------------------------------ IMPORT FOOTER ------------------------------ */
include './view/footer.php';
