<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Document</title>
</head>

<body>

    <?php

    $bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', 'root');
    $sql = "SELECT * FROM membre";
    $requete = $bdd->prepare($sql);
    $requete->execute();

    $resultat = $requete->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Pseudo</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Civilité</th>
                <th>Statut</th>
                <th>Date d'enregistrement</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php

            foreach ($resultat as $membre) {
                if ($membre['statut'] == 0) {
                    $membre['statut'] = "admin";
                } else {
                    $membre['statut'] = "membre";
                }

                $date = date("d/m/Y", strtotime($membre['date_enregistrement']));
                echo "<tr><td>" . $membre['id_membre'] . "</td><td>" .
                    $membre['pseudo'] . "</td><td>" .
                    $membre['nom'] . "</td><td>" .
                    $membre['prenom'] . "</td><td>" .
                    $membre['email'] . "</td><td>" .
                    $membre['civilite'] . "</td><td>" .
                    $membre['statut'] . "</td><td>" .
                    $date . "</td><td>" .
                    "<a href='show_membre.php?id=" . $membre['id_membre'] . "'><i class=\"fa-solid fa-magnifying-glass\"></a>" .
                    "<a href='form_update_membre.php?id=" . $membre['id_membre'] . "'><i class='fa-solid fa-pencil'></a>" .
                    "<a href='delete_membre.php?id=" . $membre['id_membre'] . "'><i class='fa-solid fa-trash'></a></td></tr>";
            }

            ?>
        </tbody>

    </table>

</body>

</html>