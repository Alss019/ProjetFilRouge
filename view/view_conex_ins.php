<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/connex.css">
    <title>Connexion/Inscription</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="formConex">
                <h1>Connexion</h1>
                <div id="formulaire">
                    <form action="" method="post">
                        <div class="box">
                            <label>Email</label>
                            <input type="text" name="mail_util" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
                        </div>
                        <div class="box">
                            <label>Mot de passe</label>
                            <input type="password" name="mdp_util" pattern="(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z]).{6,}" required>
                        </div>
                        <div class="but">
                            <input type="submit" name="connect" class="button" value="Connexion">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        

        <div class="container2">
            <div class="formInscrip">
                <h1>Inscription</h1>
                <div id="formulaire">
                    <form action="" method="post">
                        <div class="inputI">
                            <label>Nom</label>
                            <input type="text" name="nom_util">
                        </div>
                        <div class="inputI">
                            <label>Prenom</label>
                            <input type="text" name="prenom_util">
                        </div>
                        <div class="inputI">
                            <label>Telephone</label>
                            <input type="text" name="tel_util">
                        </div>
                        <div class="inputI">
                            <label>Email</label>
                            <input type="text" name="mail_util" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$">
                        </div>
                        <div class="inputI">
                            <label>Mot de passe</label>
                            <input type="password" name="mdp_util" pattern="(?=.*\d)(?=.*[a-z0-9])(?=.*[A-Z]).{6,}">
                        </div>
                        <div class="but">
                            <input type="submit" name="add" class="button" value="Inscription">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div><p style="text-align:center"><?= $msg?></p></div>
        <div><p style="text-align:center"><?= $msg1?></p></div>
    </main>
</body>

</html>