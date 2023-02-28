<?php
include './view/view_active.php';
$message = "";
//test si $_GET['id'] existe et est non vide
if (isset($_GET['id']) and $_GET['id'] != "") {
    //nettoyer le contenu de $_GET['id']
    $token = cleanInput($_GET['id']);
    //instance de ManagerUtil
    $util = new ManagerUtilissateur();
    //set la valeur du token
    $util->setToken($token);
    //récupére l'utilisateur
    $testToken = $util->getUtilByToken($bdd);
    //test si l'utilisateur existe
    if ($testToken != null) {

        
        //active le compte
        $util->activateUtil($bdd);
        $message = '<div class="container">
                        <div class="activ">
                            <h1>Voter compte est activer</h1>
                            <p>Cliquer sur le button ci-dessous pour vous connecter a votre compte</p>
                            <p>Pour continuer votre inscription</p>
                            <p><a class="btn" href="/FilRouge/inscription">Connexion</a></p>
                        </div>
                    </div >';
    }
    //l'utilisateur n'existe pas
    else {
        $message = "erreur impossible d'activer le compte";
    }
}
//$_GET['id'] n'existe pas ou vide
else {
    $message = "Erreur aucuns Paramètres";
}
echo $message;