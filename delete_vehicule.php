<?php

$bdd = new PDO('mysql:host=localhost;dbname=veville', 'root', 'root');
$sql = "DELETE FROM vehicule WHERE id_vehicule = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$requete->execute();

header('Location: vehicule_list.php');
