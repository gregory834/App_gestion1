<?php
if (isset($_POST['delete'])) { //Si le bouton delete est cliké je lance la fonction delete().

    delete(); //Création de la fonction delete()
}

if (isset($_POST['reserver'])) {
    reserve();
}

// Réservation de poste.

function reserve()
{

    //Connexion à la base de donnée
    $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");

    $etudiant_nom = $_POST['idetudiant']; //Je récupère l'id de l'étudiant quand je choisi dans le select.

    //Je sélectionne toute les informations de l'étudiant que j'ai choisi.
    $select_etudiant_nom = mysqli_query($db, "select * from etudiant where idetudiant = '" . $etudiant_nom . "'");

    //On les récupères sous forme de listes
    $select_etudiant_nom_fetch = mysqli_fetch_array($select_etudiant_nom);

    //Les informations de l'idetudiant (nom,prenom,ordinateur choisi ect...)
    $reservation_etudiant_nom = $select_etudiant_nom_fetch['etudiantnom'];
    $reservation_etudiant_prenom = $select_etudiant_nom_fetch['etudiantprenom'];
    $reservation_horaire = $_POST['reservation_horaire'];

    //Récupère l'id de l'ordinateur, ensuite je sélectionne toute les informations de l'idordinateur correspondant à l'id choisi.
    $ordinateur_id = $_POST['ordinateur_id'];
    $select_ordinateur_id = mysqli_query($db, "select * from ordinateur where idordinateur = '" . $ordinateur_id . "'");


    $select_ordinateur_id_fetch = mysqli_fetch_array($select_ordinateur_id); //Toute les infos de l'ordinateur clické dedans.
    $reservationcol = $select_ordinateur_id_fetch['Identifiantordinateur'];

//Requête d'ajout de nouvelle réservation avec toute les infos étudiant et tout les infos ordinateur.
    $assigncomp = mysqli_query($db, "insert into reservation(Reservation_etudiant_id,Reservation_etudiant_nom,Reservation_etudiant_prenom,Reservation_horaire,Reservation_ordinateur_id,Reservationcol) values('" . $etudiant_nom . "', '" . $reservation_etudiant_nom . "','" . $reservation_etudiant_prenom . "','" . $reservation_horaire . "','" . $ordinateur_id . "','" . $reservationcol . "')");

    //Condition si la requête c'est bien passé on affiche 'assign computer'.
    if ($assigncomp) {
        echo 'assign computer!';

        header('location: ../home.php#ordinateur');

        //update etudiant id..
        $update_etudiant_disponible = mysqli_query($db, "update etudiant set disponible = '1' where idetudiant = '" . $etudiant_nom . "'");
        //update ordinateur id..
        $update_ordinateur_disponible = mysqli_query($db, "update ordinateur set Disponible = '1' where idordinateur = '" . $ordinateur_id . "'");

        die;
    } else {
        echo mysqli_error($db);
    }
}

// Supprimer une réservation

function delete()
{

    $reservID = $_POST['reservID']; //Récupère l'id générer par le click.
    //Connexion à la base de donnée
    $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");


    $select_reserv = mysqli_query($db, "select * from reservation where idReservation = '" . $reservID . "'"); //Je selectionne dans la table reservation tout les colonnes dont l'idreservation est égale à l'id récupérer.
    $select_reserv_f = mysqli_fetch_array($select_reserv); //Créer un tableau.

    $del_reserv = mysqli_query($db, "delete from reservation where idReservation = '" . $reservID . "'"); //Supprime dans la table réservation la ligne qui correspond à L'idreservation. 
    if ($del_reserv) {
        echo 'assignment removed!'; //Si la ligne est bien supprimé un message affichera "assignement removed!"

        //update etudiant id..
        $update_etudiant_disponible = mysqli_query($db, "update etudiant set disponible = '0' where idetudiant = '" . $select_reserv_f['Reservation_etudiant_id'] . "'");
        //update ordinateur id..
        $update_ordinateur_disponible = mysqli_query($db, "update ordinateur set Disponible = '0' where idordinateur = '" . $select_reserv_f['Reservation_ordinateur_id'] . "'");


        header('location: ../home.php#ordinateur');
        die;
    }
}
