<?php

$date = date('Y-m-d');
var_dump($date);
$bdd = new PDO("mysql:host=localhost;dbname=veville", "root", "root");
$sql = "INSERT INTO membre (pseudo, nom, prenom, email, civilite, statut, date_enregistrement, mdp) VALUES (:pseudo, :nom, :prenom, :mail, :civilite, :statut, :date, :mdp)";
$requete = $bdd->prepare($sql);
$requete->bindValue(":pseudo", $_POST["pseudo"], PDO::PARAM_STR);
$requete->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
$requete->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
$requete->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
$requete->bindValue(':civilite', $_POST['civilite'], PDO::PARAM_STR);
$requete->bindValue(':statut', $_POST['statut'], PDO::PARAM_INT);
$requete->bindValue(':date', $date, PDO::PARAM_STR);
$requete->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);

$requete->execute();

header('Location: list_membre.php');
