<?php 
include './view/vue_stats_indiv.php';
$message = "";

if (isset($_GET['idEvent']) && $_GET['idEvent'] != ""){

    $match = new ManagerStatIndividuel();
    $match->setIdEvent($_GET['idEvent']);
    $match->setIdUtil($_SESSION['id']);
    $tab = $match->statUtilByEvent($bdd);

    $passe = $tab[0]['passe'];
    $passeR = $tab[0]['passe_reussi'];
    $tirs = $tab[0]['tirs'];
    $tirsC = $tab[0]['tirs_cadre'];
    $faute = $tab[0]['faute'];
    $cartonJ = $tab[0]['carton_jaune'];
    $cartonR = $tab[0]['carton_rouge'];
    $tacle = $tab[0]['tacle'];
    $tacleR = $tab[0]['tacle_reussi'];
    $but = $tab[0]['but'];
    $passeD = $tab[0]['passe_d'];
    $blessure = $tab[0]['blessure'];
    $min = $tab[0]['minutes'];
    $poste = $tab[0]['poste'];
    echo' 
    <div class="monMt">
        <h1 id="titre">Mon Match</h1>
        <div class="stats">
            <div class="header_stats">
                <h1>Minutes jouer '.$min.'\'</h1>
            </div>
            <div class="body_stats">
                <ul class="detail_indiv">
                    <li><span>But</span>
                        <span>'.$but.'</span></li>
                    <li><span>Passe decisive</span>
                        <span>'.$passeD.'</span></li>
                    <li><span>Tirs</span>
                        <span>'.$tirs.'</span></li>
                    <li><span>Tirs cadrer</span>
                        <span>'.$tirsC.'</span></li>
                    <li><span>Passes</span>
                        <span>'.$passe.'</span></li>
                    <li><span>Passes réussie</span>
                        <span>'.$passeR.'</span></li>
                    <li><span>Carton Jaune</span>
                        <span>'.$cartonJ.'</span></li>
                    <li><span>Carton Rouge</span>
                        <span>'.$cartonR.'</span></li>
                    <li><span>Fautes</span>
                        <span>'.$faute.'</span></li>
                </ul>
            </div>
        </div>
    </div>';
}

echo '<div class="match">
            <div class="score">
                <span>Paris SG</span>
                <span>Montpellier</span>
                <span>5</span>
                <span>-</span>
                <span>2</span>
            </div>
            <hr>
            <div class="stat_match">
                <ul class="stat">
                    <li>
                        <span>20</span>
                        <span>Tirs</span>
                        <span>7</span>
                    </li>
                    <li>
                        <span>563</span>
                        <span>Passe</span>
                        <span>425</span>
                    </li>
                    <li>
                        <span>2</span>
                        <span>Carton Jaune</span>
                        <span>1</span>
                    </li>
                    <li>
                        <span>0</span>
                        <span>Carton Rouge</span>
                        <span>0</span>
                    </li>
                    <li>
                        <span>15</span>
                        <span>Fautes</span>
                        <span>18</span>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="detail_match">
                <ul class="detail">
                    <li>
                        <span><img src="./asset/image/Deuxieme jaune.png" style="width:15px; height:15px;"></span>
                        <span>Mbappe</span>
                        <span>10</span>
                    </li>
                    <li>
                        <span><img src="./asset/image/rate.png" style="width:15px; height:18px;"></span>
                        <span>Mbappe</span>
                        <span>32</span>
                    </li>
                    <li>
                        <span><img src="./asset/image/Carton Rouge.png" style="width:15px; height:18px;"></span>
                        <span>Sacko.F</span>
                        <span>35</span>
                    </li>
                    <li>
                        <span><img src="./asset/image/Carton jaune.png" style="width:15px; height:18px;"></span>
                        <span>Neymar</span>
                        <span>44</span>
                    </li>
                    <li>
                        <span><img src="./asset/image/ballon.png"></span>
                        <span>Neymar</span>
                        <span>62</span>
                    </li>
                </ul>
            </div>
        </div>

    </main>

</body>

</html>';

