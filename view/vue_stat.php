<?php
    $match = new ManagerEvenement();
    $tab = $match->getMatch($bdd);
    $stat = new ManagerStatIndividuel();
    $stat->setIdUtil($_SESSION['id']);
    $tb = $stat->statSaison($bdd);
    $but = $tb[0]['but'];
    $passe = $tb[0]['passe'];
    $passe_d = $tb[0]['passe_d'];
    $tirs = $tb[0]['tirs'];
    $carton_jaune = $tb[0]['carton_jaune'];
    $carton_rouge = $tb[0]['carton_rouge'];
    $presence = $tb[0]['presence'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/stat.css">
    <title>Statistique</title>
</head>

<body>
<?php
?>
    <div class="card1">
        <div class="cardTitle">
            <h2>Mes Stats</h2>
        </div>
        <div class="cardBody">
            <div class="col1">
                <span><?php 
                if($presence == ""){
                    echo'0';
                }else{
                    echo $presence;
                }?></span><br>
                <span>Match Jouer</span>
            </div>
            <div class="col2">
                <span><?php 
                if($but == ""){
                    echo'0';
                }else{echo $but;}?>
            </span><br>
                <span>But</span>
            </div>
            <div class="col3">
                <span><?php if($passe_d == ""){echo'0';
                }else{echo $passe_d;}?></span><br>
                <span>Passe D</span>
            </div>
            <div class="col41">
            <span><?php if($tirs == ""){echo'0';
                }else{echo $tirs;}?></span><br>
                <span>Tirs</span>
            </div>
            <div class="col51">
            <span><?php if($carton_jaune == ""){echo'0';
                }else{echo $carton_jaune;}?></span><br>
                <span>Carton Jaune</span>
            </div>
            <div class="col42">
            <span><?php if($passe == ""){echo'0';
                }else{echo $passe;}?></span><br>
                <span>Passe</span>
            </div>
            <div class="col52">
            <span><?php if($carton_rouge == ""){echo'0';
                }else{echo $carton_rouge;}?></span><br>
                <span>Carton Rouge</span>
            </div>
        </div>
    </div>
    <main class="ma">


        <div class="listeMatch">
            <h1>Mes Match</h1>
            <div class="cat">
                <span>Dates</span>
                <span>Match</span>
                <span>Score</span>
                <span>Minutes</span>
                <span>Competition</span>
            </div>

            <div class="listeBody">
                <ul>
                <?php foreach($tab as $value):?>
                    <li class="li1">
                        <span><?= $value->date_debut_event?></span>
                        <span><?= $value->nom_event ?></span>
                        <span><?= $value->nom_event ?></span>
                        <span>0</span>
                        <span>0</span>
                        <span>90'</span>
                        <span>Coupe</span>
                        <span><a href="/projetFilRouge/statIndiv?idEvent=<?= $value->id_event?>">Détails</a></span>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>

        </div>
        <div class="menu">

            <span class="mn">Championnat</span><br />
            <span class="mn">Coupe</span><br />
            <span class="mn">Amical</span><br />
            <span class="mn">Tous</span><br />

        </div>
    </main>
</body>

</html>