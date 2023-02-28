<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/profil.css">
    <script defer src="./asset/script/script.js"></script>
    <title>Document</title>
</head>


    <body>
        <main>
            <div class="menu">
                <img src="./asset/image/image.jpeg" alt="" width="200px" height="200px">
                <div class="bodyProfil">
                    <ul>
                        <li><a href="">Information Personnel</a></li>
                        <li><a href="">Modifier photo de profil</a></li>
                        <li><a href="">Modifier mot de passe</a></li>
                        <li><a href="">Contacter club</a></li>
                        <li><a href="">Déclarer un changement</a></li>
                    </ul>
                </div>
            </div>

            <div class="container">
                <h1>Informations personelle</h1>

                <div class="bodyForm">

                    <form action="" method="post">
                        <label>Nom</label>
                        <input type="text" name="nom_util" id="nom">

                        <label>Prenom</label>
                        <input type="text" name="prenom_util" id="prenom">

                        <label>Telephone</label>
                        <input type="text" name="tel_util" id="tel">

                        <label>Email</label>
                        <input type="email" name="mail_util" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" id="mail">


                        <input id="btn" type="submit" value="Modifier" name="update">
                    </form>

                </div>

            </div>

            <p id="msg"></p>
            
    </body>

</html>