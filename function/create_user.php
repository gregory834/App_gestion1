<?php

//Si le bouton créer est cliqué on lance la fonction créer.
if (isset($_POST['create'])) {
    createUser();
}

function createUser(){
    //Connexion à la base de donnée
    $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");

    //Initialisation de variable et récupération des donnees en traitant les données.
    $etudiantnom = htmlspecialchars($_POST['etudiantnom']);
    $etudiantprenom = htmlspecialchars($_POST['etudiantprenom']);
    $disponible = '0';

    //Création de la requête pour la mise en Base de donnée.
    //Cible la table étudiant et les colonnes pour insérer les données.
    $createuser = mysqli_query($db, "insert into etudiant (etudiantnom, etudiantprenom, disponible) values('" . $etudiantnom . "', '" . $etudiantprenom . "', '" . $disponible . "')");

    if ($createuser) {
        echo 'utilisateur créer!';
        header('location: ../home.php#nouvelutilisateur');
        // echo '<script>window.location.href=`${window.location.hostname}/index.php#nouvelutilisateur`;</script>';
        die;
    }
}
?>
