<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php

    $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', 'root');
    $sql = "SELECT * FROM vehicule INNER JOIN agences ON vehicule.id_agence = agences.id_agence";
    $requete = $bdd->prepare($sql);
    $requete->execute();
    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($resultat);

    ?>

    <header>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="form_inscription.php">Inscription</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Se connecter</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="mon_compte.php">Mon compte</a>
            </li>
        </ul>
        <div class="voiture">
            <img src="https://images.caradisiac.com/images/3/0/3/7/193037/S0-porsche-panamera-une-platinum-edition-696118.jpg" alt="" class="header">
        </div>
    </header>

    <main>

        <?php

        if (empty($_SESSION['pseudo']) && empty($_SESSION['nom']) && empty($_SESSION['prenom']) && empty($_SESSION['pseuo']) && empty($_SESSION['email']) && empty($_SESSION['statut'])) {
            echo "Vous devez être connecté pour passer une commande. <br> Pour se connecter : <a href='login.php'>Cliquer ici</a>";
        } else {
            echo "<form action=\"add_commande.php\" method=\"post\">

            <div class=\"form_commande\">

                <label for=\"date_depart\">Date et heure de départ</label>
                <input type=\"datetime-local\" name=\"date_depart\" id=\"date_depart\">

                <label for=\"date_fin\">Date et heure de fin</label>
                <input type=\"datetime-local\" name=\"date_fin\" id=\"date_fin\">";

            foreach ($resultat as $voiture) {
                echo "<input type='checkbox' name='car' value='" . $voiture['id_vehicule'] . "' id='car_" . $voiture['id_vehicule'] . "'>" .
                    "<label for='car_" . $voiture['id_vehicule'] . "'>" .
                    "<img src='img/" . $voiture['image'] . "'>" .
                    "<h3>" . $voiture['marque'] . " " . $voiture['model'] . "</h3>" .
                    "<h3>" . $voiture['enseigne'] . " - " . $voiture['ville'] . "</h3>";
            }

            echo "<div class=\"boutton\">
            <input type=\"submit\" value=\"Réserver\" class=\"button\">
        </div>

        </div>
        </form>";
        }

        ?>
    </main>


</body>

</html>