<?php
$bdd = new PDO('mysql:host=mariadb;dbname=application;charset=utf8', 'jdoe', 'secret');

$pseudo = $_POST['pseudo'];
$motDePasse = $_POST['motDePasse'];

// Requête préparée pour empêcher les injections SQL
<<<<<<< HEAD
$requete = $bdd->prepare("SELECT pseudo FROM utilisateurs WHERE pseudo=:pseudo AND motDePasse=:motdepasse");

$requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
$requete->bindValue(':motdepasse', $motDePasse, PDO::PARAM_STR);

$requete->execute();


if ($requete->fetch()){
echo "Ce pseudo existe déjà !";
} else {

    $requete = $bdd->prepare("INSERT INTO utilisateurs (pseudo, motDePasse, statutAdmin) VALUES (:pseudo, :motDePasse, :statutAdmin)");


        $statutAdmin=0;
    
        
        $requete->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $requete->bindValue(':motDePasse', $motDePasse, PDO::PARAM_STR);
        $requete->bindValue(':statutAdmin', $statutAdmin, PDO::PARAM_STR);
        
        $requete->execute();
        
    
    }
    
// TODO : si l'utilisateur n'existe pas le créer avec une requête INSERT INTO
   // UNE BOUCLE POUR INFORMER L'UTLISATEU
=======
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
>>>>>>> c047e9301a319a651dd4ae29a67050c2cda99d25
