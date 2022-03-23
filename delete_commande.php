<?php

$bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
$sql = "DELETE FROM commande WHERE id_commande = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
$requete->execute();

header("Location: list_commande.php");
