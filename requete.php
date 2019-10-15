<?php
$bdd = new PDO('mysql:host=mariadb;dbname=application;charset=utf8', 'jdoe', 'secret');


$sql = 'SELECT * FROM produits';
$sql = 'DELETE FROM `produits` WHERE `produits`.`id` = 1';
$sql = 'UPDATE `produits` SET `solde` = 1 WHERE `produits`.`id` = 6';


foreach($bdd->query($sql) as $produit) {
    echo "<p>Produit".$produit['id']."</p>";
    echo "<ul>";
    echo "<li>".$produit['nom']."</li>";
    echo "<li>".$produit['prix']."</li>";
    echo "<li>".$produit['description']."</li>";
    echo "</ul>";
}

$requete = $bdd->prepare("INSERT INTO produits (nom, prix, description, solde, urlImage) VALUES (:nom, :prix, :description, :solde, :urlImage)");

$nom='Chaussures';
$prix=450;
$description='Chassures de sport';
$solde=0;
$urlImage='Produits/p7.jpg';

$requete->bindValue(':nom', $nom, PDO::PARAM_STR);
$requete->bindValue(':prix', $prix, PDO::PARAM_INT);
$requete->bindValue(':description', $description, PDO::PARAM_STR);
$requete->bindValue(':solde', $solde, PDO::PARAM_INT);
$requete->bindValue(':urlImage', $urlImage, PDO::PARAM_STR);

$requete->execute();

echo "Done";

