<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/eventUpdate.css">

    <title>Document</title>
</head>

<body>

</body>

</html>

<body>
    <main>
        <div class="container">
            <h1>Modifier votre evenement</h1>
            <form action="" method="post">

                <label>Nom</label>
                <input type="text" name="nom_event" id="nom">

                <label>Date deb</label>
                <input type="datetime-local" name="date_debut_event" id="debut">

                <label>Date fin</label>
                <input type="datetime-local" name="date_fin_event" id="fin">

                <label id="desclabel">Description</label>
                <textarea name="description_event" id="desc"></textarea>

                <select id="type" name="id_type_event">
                    <option value="1">Match</option>
                    <option value="2">Entrainement</option>
                    <option value="3">Stage</option>
                    <option value="4">Autre</option>
                </select>

                <input id="btn" type="submit" value="Modifier" name="update">
            </form>
        </div>
        <div class="listeEvent">
            <table>
                <tr>
                    <th>
                        <div>
                            <form action="" method="POST">
                                <input id="btn1" type="submit" name="triNom" value="Nom event">
                            </form>
                        </div>
                    </th>
                    <th>
                        <div>
                            <form action="" method="POST">
                                <input id="btn1" type="submit" name="triDeb" value="Debut Event">
                            </form>
                        </div>
                    </th>
                    <th>
                        <div>
                            <form action="" method="POST">
                                <input id="btn1" type="submit" name="triFin" value="Fin Event">
                            </form>
                        </div>
                    </th>
                    <th>
                        <div>Description Event</div>
                    </th>
                </tr>
</body>

</html>