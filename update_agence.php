<?php

$dossier = "img/";
$nom_photo = $_FILES['photo']['name'];
$photo = $_FILES['photo']['tmp_name'];

move_uploaded_file($photo, $dossier . $nom_photo);

$bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
$sql = "UPDATE agences SET enseigne = :enseigne, adresse = :adresse, ville = :ville, cp = :cp, description = :description, photo = :photo WHERE id_agence = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(":enseigne", $_POST['enseigne'], PDO::PARAM_STR);
$requete->bindValue(":adresse", $_POST['adresse'], PDO::PARAM_STR);
$requete->bindValue(":ville", $_POST['ville'], PDO::PARAM_STR);
$requete->bindValue(":cp", $_POST['cp'], PDO::PARAM_INT);
$requete->bindValue(":description", $_POST['description'], PDO::PARAM_STR);
$requete->bindValue(":photo", $nom_photo, PDO::PARAM_STR);
$requete->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
$requete->execute();

header('Location: list_agence.php');
