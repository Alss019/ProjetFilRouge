<?php
$type = new TypeEvenement(null, null);
$tabType = $type->allTypeEvent($bdd); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/addEvent.css">
    <title>Ajouter Evenement</title>
</head>
<body>
    <main>
<div class="container">
            <h2>Ajouter un evenement</h2>
            <form action="" method="post">

                <label>Nom</label>
                <p><input type="text" name="nom_event" id="nom"></p>

                <label>Date deb</label>
                <p><input type="datetime-local" name="date_debut_event" id="debut"></p>

                <label>Date fin</label>
                <p><input type="datetime-local" name="date_fin_event" id="fin"></p>

                <label id="desc">Description</label>
                <textarea name="description_event" id="desc"></textarea>

                <select class="type" name="id_type_event">
                    <?php foreach($tabType as $value):?>
                    <option value="<?= $value->id_type_event?>"><?= $value->nom_type_event ?></option>
                    <?php endforeach ?>
                    <!-- <option value="2">Entrainement</option>
                    <option value="3">Stage</option>
                    <option value="4">Autre</option> -->
                </select>

                <input id="btn" type="submit" name="addEvent" value="Ajouter">
            </form>
        </div>
        </main>
</body>
</html>