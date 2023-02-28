<?php
    $club = cleanInput($_POST['nom_club']);
    $tel = cleanInput($_POST['tel_club']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/creationClub.css">
    <script defer src="./asset/script/script.js"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <h1 id="titre">Cree votre espace club ici</h1>
        <div id="formd">
            <form action="" method="POST" id="form">
                <label>Nom du Club</label>
                <input type="text" name="nom_club" id="name" value="<?php echo $club?>">
                <label>Telephone</label>
                <input type="text" name="tel_club" id="tel" value="<?php echo $tel?>">
                <input type="submit" name="add" value="Cree votre espace" id="btn" onclick="openForm()">
                <div id="msg"><p><?=$message?></p></div>
            </form>
        </div>
    </main>
</body>
</html>