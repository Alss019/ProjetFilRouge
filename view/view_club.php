<?php
    @$txt=cleanInput($_GET['txt']);
    @$valid=cleanInput($_GET['valid']);
    if(isset($valid) AND !empty(trim($txt))){
        $req=$bdd->prepare("select id_club,nom_club from club where nom_club like '%$txt%'");
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $req->execute();
        $tab=$req->fetchAll();
        $afficher="oui";
    }
?>
<!DOCTYPE html>
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
        <h1 id="titre">Crée votre espace ou recherche votre club</h1>
        
<!-- Barre de recherche  -->
        <form action="" method="get" name="form1">
            <input type="text" placeholder="recheche" value="<?php echo $txt?>"name="txt" id="txt">
            <input type="submit" value="Recherche un club" name="valid" id="btn">
        </form>
<!-- résultat de la recherche -->
        <?php if($afficher === "oui"){?>
            <div id="result">
                <div id="nbr"><?=count($tab)." ".(count($tab)>1?"résultats trouvés":"résultat trouvé") ?></div>
                <ol>
                    <?php for($i=0;$i<count($tab);$i++){ ?>
                    <li>
                        <a onclick="openForm()" href="/projetFilRouge/confirmClub?id=<?=$tab[$i]["id_club"]?>&amp;nom=<?=$tab[$i]["nom_club"]?>"><?php echo $tab[$i]["nom_club"]?></a>
                    </li>
                    <!-- <div class="form-popup" id="myForm">
                    <form action="" class="form-container" method="post"> 
                        <h1></h1>
                        <button type="submit" name="confirme" class="btn">Confirmer</button>
                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                    </div> -->
                    <?php }?>
                </ol>
            </div>
        <?php }?>   
<!-- Cree un club -->
        <form action="/projetFilRouge/CreationClub" name="form2">
        <button type="submit" id="btn">Crée votre espace club</button>
        </form>
    </main>


</body>
</html>