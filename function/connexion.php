<?php
//condition si le bouton connexion est bien rempli et clické je lance la foncion connexion
if (isset($_POST['connexion'])){
    connexion();
}

function connexion(){

  $username=htmlspecialchars($_POST['username']);
    $password= htmlspecialchars($_POST['password']);

      //Connexion à la base de donnée
      $db = mysqli_connect('localhost', "root", "", 'gestionnaire') or die("La base de donnée n'est pas connecté");

      $admin= mysqli_query($db, "SELECT * FROM users WHERE idusers = '1' ");//Je selectionne toute les infos dans la table users dont l'id users est égale à 1

      $admin_info= mysqli_fetch_array($admin);//Je met toute ces infos sous forme de tableau.

      $login= $admin_info['login'];
      $password_bdd=$admin_info['password'];

      if ($username == $login && $password == $password_bdd) {

        header ('location: ../home.php');
      }
     else{
            header ('location: ./index.php');
        }
       exit;

    }

?>









}
