<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>

    <form action="add_inscription.php" method="post">

        <div class="form">
            <div class="form-left">

                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="pseudo">

                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom">

                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom">

                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" id="mdp">

            </div>

            <div class="form-right">

                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail">

                <label for="civilite">Civilité</label>
                <input type="text" name="civilite" id="civilite">

            </div>

        </div>

        <div class="bouton">
            <input type="submit" value="Enregistrer" class="button">
        </div>



    </form>

</body>

</html>