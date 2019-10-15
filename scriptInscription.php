<?php
$bdd = new PDO('mysql:host=mariadb;dbname=application;charset=utf8', 'jdoe', 'secret');

$pseudo = $_POST['pseudo'];
$motDePasse = $_POST['motDePasse'];

// Requête préparée pour empêcher les injections SQL
$requete = $bdd->prepare("SELECT pseudo from utilisateurs WHERE pseudo=:pseudo");
$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$requete->execute();

if( $requete->fetch() ) {
    echo 'Pseudo déjà utilisé.';
} else {
    echo 'Inscription validée';
    $request = $bdd->prepare("INSERT INTO utilisateurs (pseudo, motDePasse) VALUES (:pseudo,:motDePasse)");
    
    $request->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $request->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);
    $request->execute();
    $request->closeCursor();
}
$requete->closeCursor();