<?php
include './view/vue_accueil.php';
include './utils/connectBdd.php';


if (isset($_SESSION['connected']) AND ($_SESSION['activ'] == 1)) {
    $event = new ManagerEvenement(null, null, null, null, null);
    $tab = $event->allEvent($bdd);
    foreach ($tab as $value) {
        $nom = substr($value->nom_event,0,10);
        if($value->id_type_event == 1){
        echo '
        <li class="carousel-item">
        <div class="card">
            <div class="card-header">
                <h4>' . $nom . '</h4>
                <h6>' . $value->date_debut_event . '</h6>
            </div>
            <div class="card-body">
                <img src="./asset/image/football.png" alt="img" width="50px" height="50px";>
            </div>
            <div class="card-footer">
                <a href="/projetFilRouge/event?id='.$value->id_event.'" class="button">INFOS</a>
            </div>
    </li>';
        }
        elseif($value->id_type_event == 2){
        echo '
        <li class="carousel-item">
        <div class="card">
            <div class="card-header">
                <h4>' . $nom . '</h4>
                <h6>' . $value->date_debut_event . '</h6>
            </div>
            <div class="card-body">
                <img src="./asset/image/haltère.png" alt="img" width="50px" height="50px">
            </div>
            <div class="card-footer">
                <a href="/projetFilRouge/event?id='.$value->id_event.'" class="button">INFOS</a>
            </div>
    </li>';
        }
        elseif($value->id_type_event == 3){
        echo '
        <li class="carousel-item">
        <div class="card">
            <div class="card-header">
                <h4>' . $nom . '</h4>
                <h6>' . $value->date_debut_event . '</h6>
            </div>
            <div class="card-body">
                <img src="./asset/image/courir.png" alt="img" width="50px" height="50px">
            </div>
            <div class="card-footer">
                <a href="/projetFilRouge/event?id='.$value->id_event.'" class="button">INFOS</a>
            </div>
    </li>';
        }
        elseif($value->id_type_event == 4){
        echo '
        <li class="carousel-item">
        <div class="card">
            <div class="card-header">
                <h4>' . $nom . '</h4>
                <h6>' . $value->date_debut_event . '</h6>
            </div>
            <div class="card-body">
                <img src="./asset/image/autre.png" alt="img" width="50px" height="50px">
            </div>
            <div class="card-footer">
                <a href="/projetFilRouge/event?id='.$value->id_event.'" class="button">INFOS</a>
            </div>
    </li>';
        }
    }
    echo '
        </ul>
        <main>
                    <div class="container-info">
                <div class="art">
                    <article class="infos">
                        <div class="art-header">
                            <img src="./asset/image/pers.jpeg" height="50px" width="50px">
                            <p>Jean Dupont</p>
                            <p>President</p>
                        </div>
                        <div class="art-body">
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                                impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500,
                                quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                                spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté
                                à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans
                                les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et,
                                plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus
                                PageMaker</p>
                        </div>
                        <div class="art-footer">
                            <p>15:49 9Juin 2022</p>
                        </div>
                    </article>
                </div>
                <hr>
                <div class="art">
                    <article class="infos">
                        <div class="art-header">
                            <img src="./asset/image/pers.jpeg" height="50px" width="50px">
                            <p>Jean Dupont</p>
                            <p>President</p>
                        </div>
                        <div class="art-body">
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                                impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500,
                                quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                                spécimen de polices de texte. Il n pas fait que survivre cinq siècles, mais sest aussi adapté
                                à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans
                                les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et,
                                plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus
                                PageMaker</p>
                        </div>
                        <div class="art-footer">
                            <p>15:49 9Juin 2022</p>
                        </div>
                    </article>
                </div>
                <hr>
                <div class="art">
                    <article class="infos">
                        <div class="art-header">
                            <img src="./asset/image/pers.jpeg" height="50px" width="50px">
                            <p>Jean Dupont</p>
                            <p>President</p>
                        </div>
                        <div class="art-body">
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                                impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500,
                                quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                                spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté
                                à la bureautique informatique, sans que son contenu nen soit modifié. Il a été popularisé dans
                                les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et,
                                plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus
                                PageMaker</p>
                        </div>
                        <div class="art-footer">
                            <p>15:49 9Juin 2022</p>
                        </div>
                    </article>
                </div>
                <hr>
                <div class="art">
                    <article class="infos">
                        <div class="art-header">
                            <img src="./asset/image/pers.jpeg" height="50px" width="50px">
                            <p>Jean Dupont</p>
                            <p>President</p>
                        </div>
                        <div class="art-body">
                            <p>Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant
                                impression. Le Lorem Ipsum est le faux texte standard de limprimerie depuis les années 1500,
                                quand un imprimeur anonyme assembla ensemble des morceaux de texte pour réaliser un livre
                                spécimen de polices de texte. Il na pas fait que survivre cinq siècles, mais sest aussi adapté
                                à la bureautique informatique, sans que son contenu en soit modifié. Il a été popularisé dans
                                les années 1960 grâce à la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et,
                                plus récemment, par son inclusion dans des applications de mise en page de texte, comme Aldus
                                PageMaker</p>
                        </div>
                        <div class="art-footer">
                            <p>15:49 9Juin 2022</p>
                        </div>
                    </article>
                </div>
                <hr>
            </div>
';

        $stat = new ManagerStatIndividuel();
        $stat->setIdUtil($_SESSION['id']);
        $tb = $stat->statSaison($bdd);
        $but = $tb[0]['but'];
        $passe_d = $tb[0]['passe_d'];
        $carton_jaune = $tb[0]['carton_jaune'];
        $carton_rouge = $tb[0]['carton_rouge'];
        $presence = $tb[0]['presence'];
            echo'<div class="card-stat">
                <div class="titre">
                    <h1>Saison</h1>
                </div>
                <div class="body">
                ';
                if($but == 0){
                    echo '0';
                }else{
                    echo '<div class="col1">
                    <p>'.$but.'</p>
                    <p>BUTS</p>
                    </div>';}
                if($passe_d == 0){
                    echo '0';
                }else{
                    echo '<div class="col2">
                    <p>'.$passe_d.'</p>
                    <p>Passe D</p>
                    </div>';}

                if($carton_jaune == ""&& $carton_rouge == ""){
                    echo '<div class="col3">
                    <p>0</p>
                    <p>Carton jaunes</p>
                    <p>0</p>
                    <p>Carton Rouges</p>
                </div>';
                }elseif($carton_jaune == 0){
                    echo'                    <div class="col3">
                    <p>0</p>
                    <p>Carton jaunes</p>
                    <p>'.$carton_rouge.'</p>
                    <p>Carton Rouges</p>
                </div>';
                }else{
                    echo'                    <div class="col3">
                    <p>'.$carton_jaune.'</p>
                    <p>Carton jaunes</p>
                    <p>0</p>
                    <p>Carton Rouges</p>
                </div>';
                }
                echo'


                    <div class="col4">
                        <h2>Match Jouer</h2>
                        <p>Coupe 12</p>
                        <p>Championnat 12</p>
                        <p>Total 12</p>
                    </div>
                </div>
                <div class="footer-stat">
                    <a href="/projetFilRouge/stat">Voir Plus</a>
                </div>
            </div>';


echo'
            <div class="card-resultat">
                <div class="card-title">
                    <h1>Resultat</h1>
                </div>
                <div>
                    <ul class="list">
                        <li class="item">
                            <p>20h00</p>
                            <p>12/12</p>
                            <p>Champ</p>
                            <p>domicile</p>
                            <p>2-0</p>
                            <p>exterieur</p>
                        </li>
                        <li class="item">
                            <p>20h00</p>
                            <p>12/12</p>
                            <p>Champ</p>
                            <p>domicile</p>
                            <p>2-0</p>
                            <p>exterieur</p>
                        </li>
                        <li class="item">
                            <p>20h00</p>
                            <p>12/12</p>
                            <p>Champ</p>
                            <p>domicile</p>
                            <p>2-0</p>
                            <p>exterieur</p>
                        </li>
                        <li class="item">
                            <p>20h00</p>
                            <p>12/12</p>
                            <p>Champ</p>
                            <p>domicile</p>
                            <p>2-0</p>
                            <p>exterieur</p>
                        </li>
                        <li class="item">
                            <p>20h00</p>
                            <p>12/12</p>
                            <p>Champ</p>
                            <p>domicile</p>
                            <p>2-0</p>
                            <p>exterieur</p>
                        </li>
                    </ul>
                </div>
                <div class="footer-resultat">
                    <a href="../resultat1.html">Voir Plus</a>
                </div>
            </div>
            </main>';
}
