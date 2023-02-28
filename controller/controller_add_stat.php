<?php
include './view/view_add_stat.php';
$message = "";



if($_SESSION['roles'] == 1){
    if(!empty($_SESSION['club'])){
        $util = new ManagerUtilissateur();
        $util->setIdClub($_SESSION['club']);
        $tab = $util->getUserByClub($bdd);
        foreach($tab as $value){
            $nom = $tab[0]['nom_util'];
            $prenom = $tab[0]['prenom_util'];
            $id = $tab[0]['id_util'];
            echo '<p>'.$nom.' '.$prenom.' '.$id.'</p>';
        }
    }
    if (isset($_POST['add'])){
        if(isset($_POST['passe']) AND isset($_POST['passe_reussi']) AND isset($_POST['tirs']) AND isset($_POST['tirs_cadre']) AND
        isset($_POST['faute']) AND isset($_POST['carton_jaune']) AND isset($_POST['carton_rouge']) AND isset($_POST['tacle']) AND
        isset($_POST['tacle_reussi']) AND isset($_POST['but']) AND isset($_POST['passe_d']) AND
        isset($_POST['minutes']) AND isset($_POST['poste'])){

            $stat = new ManagerStatIndividuel();
            $stat->setIdUtil(cleanInput($_GET['id_util']));
            $stat->setIdEvent(cleanInput($_GET['id_event']));
            $stat->setPresence(cleanInput($_POST['presence']));
            $stat->setPasse(cleanInput($_POST['passe']));
            $stat->setPasseR(cleanInput($_POST['passe_reussi']));
            $stat->setTirs(cleanInput($_POST['tirs']));
            $stat->setTirsC(cleanInput($_POST['tirs_cadre']));
            $stat->setFaute(cleanInput($_POST['faute']));
            $stat->setCartonJ(cleanInput($_POST['carton_jaune']));
            $stat->setCartonR(cleanInput($_POST['carton_rouge']));
            $stat->setTacle(cleanInput($_POST['tacle']));
            $stat->setTacleR(cleanInput($_POST['tacle_reussi']));
            $stat->setBut(cleanInput($_POST['but']));
            $stat->setPasseD(cleanInput($_POST['passe_d']));
            $stat->setBlessure(cleanInput($_POST['blessure']));
            $stat->setMinutes(cleanInput($_POST['minutes']));
            $stat->setPoste(cleanInput($_POST['poste']));
            $stat->addStat($bdd);
            $message = '<div class="card">
            <div class="pop">
                    <img src="./asset/image/ok.png" width="100px" height="100px">
                    <p>Enregistrement réussi !</p>
                </div>
            </div>';
            redirection('/projetFilRouge/addStat' , '1000');
        }else{
            $message = '<div class="card">
            <div class="pop">
                <img src="./asset/image/noOk.png" width="100px" height="100px">
                <p>echec enregistrement</p>
            </div>
        </div>';
        redirection('/projetFilRouge/addStat' , '1000');
        }
    }
    
}
echo $message;
?>