<?php

include './view/vue_update_event.php';
$message = "";

if ($_SESSION['roles'] == 1) {
    include './utils/connectBdd.php';

    if (isset($_GET['id']) && $_GET['id'] != "") {

        $event = new ManagerEvenement(null, null, null, null, null);

        $event->setIdEvent($_GET['id']);

        $tab = $event->eventById($bdd);

        $nom = $tab[0]['nom_event'];
        $debut = $tab[0]['date_debut_event'];
        $fin = $tab[0]['date_fin_event'];
        $desc = $tab[0]['description_event'];
        $type = $tab[0]['id_type_event'];
        
        echo "<script>
        let start = '$debut';
        let end = '$fin';
        let name = '$nom';
        let descrip = '$desc';
        let type_event = '$type';
        let debut = document.querySelector('#debut');
        let fin = document.querySelector('#fin');
        let nom = document.querySelector('#nom');
        let desc = document.querySelector('#desc');
        let type = document.querySelector('#type');
        debut.value = start;
        fin.value = end;
        nom.value = name;
        desc.value = descrip;
        type.value = type_event;
        </script>";

        if (isset($_POST['update'])) {
            if (!empty($_POST['date_debut_event'])AND !empty($_POST['date_fin_event'])AND 
            !empty($_POST['nom_event'])AND !empty($_POST['description_event'])AND 
            !empty($_POST['id_type_event'])) {

            $newNom = cleanInput($_POST['nom_event']);
            $newDebut = cleanInput($_POST['date_debut_event']);
            $newFin = cleanInput($_POST['date_fin_event']);
            $newDesc = cleanInput($_POST['description_event']);
            $newType = cleanInput($_POST['id_type_event']);

                $event = new ManagerEvenement();

                $event->setNom($newNom);
                $event->setDateDeb($newDebut);
                $event->setDateFin($newFin);
                $event->setDescription($newDesc);
                $event->setTypeEvent($newType);
                $event->setIdEvent($_GET['id']);
                $event->updateEvent($bdd);
                
                echo "<script>
                debut.value = '$newDebut';
                fin.value = '$newFin';
                nom.value = '$newNom';
                desc.value = '$newDesc';
                type.value = '$newType';
                // </script>";
            }
            $message = '<div class="card">
                            <div class="pop">
                                <img src="./asset/image/ok.png" width="100px" height="100px">
                                <p>Modification réussi !</p>
                            </div>
                        </div>';
            redirection('/projetFilRouge/eventUpdate', '2000');
        }
    }    if (isset($_POST['triNom'])) {
        $event = new ManagerEvenement(null, null, null, null, null, null);
        $tab = $event->ordreCroiNom($bdd);
        foreach ($tab as $value) {
            echo '<tr class="row">
                    <td>' . $value->nom_event . '</td>
                    <td>' . $value->date_debut_event . '</td>
                    <td>' . $value->date_fin_event .  '</td>
                    <td>' . $value->description_event . '</td>
                    <td>' . $value->id_type_event . '</td>
                    <td><a href="/projetFilRouge/eventUpdate?id=' . $value->id_event . '">🖍</a></td>
                    <td><a href="/projetFilRouge/deleteEvent?id=' . $value->id_event . '">❌</a></td>
                </tr>';
        }
        echo '</table>
                </div>
            </main>';
    } elseif (isset($_POST['triDeb'])) {
        $event = new ManagerEvenement(null, null, null, null, null, null);
        $tab = $event->ordreCroiDeb($bdd);
        foreach ($tab as $value) {
            echo '<tr class="row">
                    <td>' . $value->nom_event . '</td>
                    <td>' . $value->date_debut_event . '</td>
                    <td>' . $value->date_fin_event .  '</td>
                    <td>' . $value->description_event . '</td>
                    <td>' . $value->id_type_event . '</td>
                    <td><a href="/projetFilRouge/eventUpdate?id=' . $value->id_event . '">🖍</a></td>
                    <td><a href="/projetFilRouge/deleteEvent?id=' . $value->id_event . '">❌</a></td>
                </tr>';
        }
        echo '      </table>
                </div>
            </main>';
    } elseif (isset($_POST['triFin'])) {
        $event = new ManagerEvenement(null, null, null, null, null,null);
        $tab = $event->ordreCroiFin($bdd);
        foreach ($tab as $value) {
            echo '<tr class="row">
                    <td>' . $value->nom_event . '</td>
                    <td>' . $value->date_debut_event . '</td>
                    <td>' . $value->date_fin_event .  '</td>
                    <td>' . $value->description_event . '</td>
                    <td>' . $value->id_type_event . '</td>
                    <td><a href="/projetFilRouge/eventUpdate?id=' . $value->id_event . '">🖍</a></td>
                    <td><a href="/projetFilRouge/deleteEvent?id=' . $value->id_event . '">❌</a></td>
                </tr>';
        }
        echo '      </table>
                </div>
            </main>';
    } else {
        $event = new ManagerEvenement(null, null, null, null, null,null);
        $liste = $event->allEvent($bdd);
        foreach ($liste as $value) {
            echo '<tr class="row">
                <td>' . $value->nom_event . '</td>
                <td>' . $value->date_debut_event . '</td>
                <td>' . $value->date_fin_event .  '</td>
                <td>' . $value->description_event . '</td>
                <td>' . $value->id_type_event . '</td>
                <td><a href="/projetFilRouge/eventUpdate?id=' . $value->id_event . '">🖍</a></td>
                <td><a href="/projetFilRouge/deleteEvent?id=' . $value->id_event . '">❌</a></td>
            </tr>';
        }
        echo '      </table>
                </div>
            </main>';
    }
    echo $message;
} else {
    redirection('/FilRouge/', '0');
}
