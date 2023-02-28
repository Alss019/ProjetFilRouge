<?php 
$util = new ManagerUtilissateur();
// $util->setIdClub($_SESSION['club']);
$tabUtil = $util->allUtil($bdd);
$event = new ManagerEvenement();
$tabEvent = $event->allEvent($bdd);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addStat.css">
    <title>Ajouter Stat</title>
</head>
<body>
    <div class="container">

    <form action="" method="GET">
        <select class="type" name="id_util">
                <?php foreach($tabUtil as $value):?>
                <option value="<?= $value->id_util?>"><a href="/projetFilRouge/addStat?id_util=<?= $value->id_util?>"><?= $value->prenom_util ?></a></option>
                <?php endforeach ?>
        </select>
        <select class="type" name="id_event">
                <?php foreach($tabEvent as $value):?>
                <option value="<?= $value->id_event?>"><?= $value->nom_event ?></option>
                <?php endforeach ?>
        </select>
        <input type="submit" name="addS" class="button" value="Ajouter">
    </form>

    <form action="" method="POST">

        <label for="">Presence</label>
        <input type="checkbox" name="presence" value="1">

        <label for="">Blessure</label>
        <input type="checkbox" name="blessure" value="1">

        <label for="">Passe</label>
        <input type="text" name="passe">

        <label for="">Passe réussi</label>
        <input type="text" name="passe_reussi">

        <label for="">Tirs</label>
        <input type="text" name="tirs">

        <label for="">Tirs cadré</label>
        <input type="text" name="tirs_cadre">

        <label for="">Faute</label>
        <input type="text" name="faute">

        <label for="">Carton Jaune</label>
        <input type="text" name="carton_jaune">

        <label for="">Carton Rouge</label>
        <input type="text" name="carton_rouge">

        <label for="">Tacle</label>
        <input type="text" name="tacle">

        <label for="">Tacle réussi</label>
        <input type="text" name="tacle_reussi">

        <label for="">But</label>
        <input type="text" name="but">

        <label for="">Passe décisive</label>
        <input type="text" name="passe_d">

        <label for="">Minutes</label>
        <input type="text" name="minutes">

        <label for="">Poste</label>
        <input type="text" name="poste">
        
        <input type="submit" name="add" class="button" value="Ajouter">
    </form>
    </div>
</body>
</html>