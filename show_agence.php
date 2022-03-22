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

    <?php

    $bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
    $sql = "SELECT * FROM agences WHERE id_agence = :id";
    $requete = $bdd->prepare($sql);
    $requete->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $requete->execute();
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);

    //var_dump($resultat);

    ?>

    <table>

        <thead>
            <tr>
                <th>Agence</th>
                <th>Enseigne</th>
                <th>Adresse</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Description</th>
                <th>Photo</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <?php

                echo "<td>" . $resultat['id_agence'] . "</td><td>" .
                    $resultat['enseigne'] . "</td><td>" .
                    $resultat['adresse'] . "</td><td>" .
                    $resultat['ville'] . "</td><td>" .
                    $resultat['cp'] . "</td><td>" .
                    $resultat['description'] . "</td><td>" .
                    "<img src='img/" . $resultat['photo'] . "'></td>";

                ?>
            </tr>
        </tbody>

    </table>

</body>

</html>