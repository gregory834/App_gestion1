<?php

//Si je click que le bouton supprimer je lance la fonction
if (isset($_POST['supprimer_utilisateur'])) {
    delete_users();
}


//Si je clik sur le bouton modifier je fais une redirection vers la page modificatio.php.

if (isset($_POST['redirection_modifier_utilisateur'])){

    //Je récupère l'id de l'utilisateur sélectionner pour pour voir le modifier dans l'autre page.

 $etudiant_id=($_POST['modif_utilisateur']);

 //Je redirige l'utilisateur vers la page modification.php.
 header('location: ../modification.php?id='.$etudiant_id);

exit();

}

//Condition qui se trouve dans la page modification.php, si j'appuie sur le bouton modifier je lance la fonction modifier

if (isset($_POST['modifier'])){
    modif_utilisateur();
}

function modif_utilisateur(){

    $etudiantnom = $_POST['etudiantnom'];
    $etudiantprenom = $_POST['etudiantprenom'];
    $idetudiant= $_POST['etudiantid'];

      //Connexion à la base de donnée
      $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");


      $update_users= mysqli_query($db, ("UPDATE `etudiant` SET `etudiantnom`='$etudiantnom' ,`etudiantprenom`= '$etudiantprenom' WHERE idetudiant = '$idetudiant' " ));

      if ($update_users){

        header('location: ../home.php');

        exit();
      }



}












function delete_users()
{

    $etudiant_id= $_POST['modif_utilisateur'];

    //Connexion à la base de donnée
    $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");

    //Requête qui supprime l'étudiant dont l'id correspond à l'id selectionner.
    $etudiant_delete= mysqli_query ($db, " DELETE FROM  etudiant WHERE idetudiant =  '" . $etudiant_id . "' ");

    if ($etudiant_delete){

        header ('location: ../home.php#nouvelutilisateur');

        exit();

    }

    else{
        echo "Ca ne marche pas";
    }


}



