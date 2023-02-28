<?php 

include './view/view_categorie.php';

    // Menu qui affiche les catégories

    $cat = new ManagerCategorie(null,null);
    $tb = $cat->allCat($bdd);
        echo '<ul class="menuCat">
        <li class="cat"><a href="/projetFilRouge/categorie">Tous</a></li>';
        foreach($tb as $value){
            echo '<li class="cat"><a href="/projetFilRouge/categorie?id='.$value->id_cat.'">'.$value->nom_cat.'</a></li>';
        }
        echo'</ul>';

    //Affiche le nom des utilisateur par categories

        if (isset($_GET['id']) && $_GET['id'] != ""){
            $apt = new ManagerAppatenir(null,null);
            $apt->setIdCat($_GET['id']);
            $tab = $apt->trieParId($bdd);
            foreach($tab as $value){
                $util = new ManagerUtilissateur();
                $util->setId($value->id_util);
                $util->setIdClub($_SESSION['club']);
                $tab = $util->getUserByClubId($bdd);
                $nom = $tab['nom_util'];
                $prenom = $tab['prenom_util'];
                echo'<p class="listNom">'.$nom.' '.$prenom.'</p>';
            }
        }else {
            $apt = new ManagerAppatenir(null,null);
            $tab = $apt->allApt($bdd);
            foreach($tab as $value){
                $util = new ManagerUtilissateur();
                $cat = new ManagerCategorie();
                $util->setId($value->id_util);
                $util->setIdClub($_SESSION['club']);
                $tab = $util->getUserByClubId($bdd);
                $nom = $tab['nom_util'];
                $prenom = $tab['prenom_util'];

                echo'<p class="listNom">'.$nom.' '.$prenom.'</p>';
            }
        }
?>