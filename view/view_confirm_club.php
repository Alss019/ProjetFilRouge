<!DOCTYPE html>
<?php 
    @$nom=cleanInput($_GET['nom']);
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/club.css">
    <script defer src="./asset/script/script.js"></script>
    <title>Document</title>
</head>
<body>
    <main>
        <form action="" class="form-container" method="post"> 
            <h1>Je suis le club de :<?= $nom ?> <h1>
            <button type="submit" name="confirme" class="btn">Confirmer</button>
        </form>

    </form>
    </main>

</body>
</html>