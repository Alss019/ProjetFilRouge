<?php

include './view/vue_profil.php';

$message = "";

if ($_SESSION['connected']) {
    include './utils/connectBdd.php';
    if (isset($_GET['id']) && $_GET['id'] != "") {

        $util = new ManagerUtilissateur(null, null, null, null);
        $util->setId($_GET['id']);

        $tab = $util->getUserById($bdd);

        $nom = $tab['nom_util'];
        $prenom = $tab['prenom_util'];
        $mail = $tab['mail_util'];
        $tel = $tab['tel_util'];

        echo"<script>
                let name = '$nom';
                let first = '$prenom';
                let email = '$mail';
                let phone = '$tel';
                let nom = document.querySelector('#nom');
                let prenom = document.querySelector('#prenom');
                let mail = document.querySelector('#mail');
                let tel = document.querySelector('#tel');
                nom.value = name;
                prenom.value = first;
                tel.value = phone;
                mail.value = email;
            </script>";

        if (isset($_POST['update'])) {
            if (!empty($_POST['nom_util']) && !empty($_POST['prenom_util']) 
            && !empty($_POST['tel_util']) && !empty($_POST['mail_util'])) 
                {
                    $nom = cleanInput($_POST['nom_util']);
                    $prenom = cleanInput($_POST['prenom_util']);
                    $tel = cleanInput($_POST['tel_util']);
                    $mail = cleanInput($_POST['mail_util']);

                        $util = new ManagerUtilissateur();

                        $util->setNom($nom);
                        $util->setPrenom($prenom);
                        $util->setTel($tel);
                        $util->setMail($mail);
                        $util->setId($_SESSION['id']);
                        $util->updateUtil($bdd);

                }else{
                    echo"<h1>Erreur</h1>";
                }
            $id = $_SESSION['id'];
            $message = '<div class="card">
                            <div class="pop">
                                <img src="./asset/image/ok.png" width="100px" height="100px">
                                <p>Modification réussi !</p>
                            </div>
                        </div>';
            redirection('/projetFilRouge/profil?id=' . $id . '', '2000');
        }
    }else {

    }
    echo $message;
}
