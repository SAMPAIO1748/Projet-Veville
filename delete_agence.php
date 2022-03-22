<?php

$bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
$sql = "DELETE FROM agences WHERE id_agence = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$requete->execute();

header('Location: list_agence.php');
