<?php

session_start();

$bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
$sql = "SELECT * FROM vehicule WHERE id_vehicule = :id";
$requete = $bdd->prepare($sql);
$requete->bindValue(":id", $_POST['car'], PDO::PARAM_INT);
$requete->execute();
$resultat = $requete->fetch(PDO::FETCH_ASSOC);

var_dump($_POST);
echo "<br>";
var_dump($resultat);
echo "<br>";
var_dump($_SESSION);
echo "<br>";

$date = date('Y-m-d');
var_dump($date);
echo "<br>";
$date_depart = new DateTime($_POST['date_depart']);
$date_fin = new DateTime($_POST['date_fin']);

$interval = $date_depart->diff($date_fin);


var_dump($date_depart);
echo "<br>";
var_dump($date_fin);

echo "<br>";
var_dump($interval);

$prix_total = $interval->days * $resultat['prix_journalier'];

echo "<br>";
var_dump($prix_total);
echo "<br>";

$sql_add = "INSERT INTO commande (date_heure_depart, date_heure_fin, prix_total, date_enregistrement, id_membre, id_vehicule, id_agence)
VALUES (:date_heure_depart, :date_heure_fin, :prix_total, :date_enregistrement, :id_membre, :id_vehicule, :id_agence)";
$requete_add = $bdd->prepare($sql_add);
$requete_add->bindValue(':date_heure_depart', date("Y-m-d h:i:s", strtotime($_POST['date_depart'])), PDO::PARAM_STR);
$requete_add->bindValue(':date_heure_fin', date("Y-m-d h:i:s", strtotime($_POST['date_fin'])), PDO::PARAM_STR);
$requete_add->bindValue(':id_membre', $_SESSION['id_membre'], PDO::PARAM_INT);
$requete_add->bindValue(':id_vehicule', $resultat['id_vehicule'], PDO::PARAM_INT);
$requete_add->bindValue(':id_agence', $resultat['id_agence'], PDO::PARAM_INT);
$requete_add->bindValue(':date_enregistrement', $date, PDO::PARAM_STR);
$requete_add->bindValue(':prix_total', $prix_total, PDO::PARAM_INT);

var_dump($requete_add);
$requete_add->execute();

header('Location: mon_compte.php');
