<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/header.css">

</head>

<body>
    <nav>
        <ul class="nav-list">
            <li class="nav-item"><a href="/projetFilRouge/accueil">Accueil</a></li>
            <li class="nav-item"><a href="/projetFilRouge/stat">Stats</a></li>
            <li class="nav-item"><a href="/projetFilRouge/event">Calendrier</a></li>
            <li class="nav-item"><a href="">Infos</a></li>
            <li class="nav-item"><a href="">Contact</a></li>
            <li class="nav-item"><a href="">Résultats</a></li>
            <?php
            $id = $_SESSION['id'];
            echo '<li class="nav-item dropdown">
                <a class="dropbtn">Mon Compte<img src="./asset/image/user.png" alt="" width="25px" height="25px"></a>
                <div class="dropdown-content">
                    <a href="/projetFilRouge/profil?id=' . $id . '" name="profil">Profil</a>
                    <a href="/projetFilRouge/deco">Deconexion</a>
                </div>
            </li> ' ?>
        </ul>
    </nav>