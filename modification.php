<?php
// Connexion à la base de donnée
$db = mysqli_connect("localhost", "root", "", "gestionnaire") or die("La base de donnée n'est pas connecté");

$etudiant_id = $_GET['id']; // Je récupère l'id de l'étudiant que je souhaite modifier.

//Requête qui récupère les informations de l'étudiant que j'ai choisi.
$etudiant_requete = mysqli_query($db, "SELECT * From etudiant where idetudiant = '" . $etudiant_id . "'" );

// j'ai récupérer les infos de l'étudiant sous forme de tableau.
$etudiant_info = mysqli_fetch_array($etudiant_requete); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier utilisateur | ordinateur.</title>

    <!-- Fichier CSS du Bootstrap  -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- <link href="css/stylish-portfolio.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/css/bootstrap-select.min.css">

    <!-- Css -->
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
 
  

    <!-- Modifier un utilisateur -->
    <section class="content-section bg-dark text-white text-center" id="nouvelutilisateur">
        <div class="container text-center">
            <div class="content-section-heading">
                <h3 class="text-secondary mb-0">Modifier</h3>
                <h2 class="mb-5">Modifier un utilisateur</h2>

                <!-- Modifier un utilisateur -->

                <form class="container text-center" action="./function/delete_modif_users.php" method="post">
                    <div class="form-row align-items-center content-section-heading">
                        <input type="text" class="form-control" id="inlineFormInputName" name="etudiantnom" placeholder="Nom" value="<?php echo $etudiant_info['etudiantnom'] ?>"></br>
                        <input type="text" class="form-control" id="inlineFormInputName" name="etudiantprenom" placeholder="Prénom" value="<?php echo $etudiant_info['etudiantprenom'] ?>"><br></br><br></br>
                        <input type="hidden" name="etudiantid" value="<?php echo $etudiant_info['idetudiant'] ?>"> 
                        <button type="submit" name="modifier" class="btn btn-warning container">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </section>




 
                       
               

    <!-- Pied de page -->
    <footer class="footer text-center">
        <div class="container">
            <ul class="list-inline mb-5">
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-dark mr-3 bg-warning" href="https://www.facebook.com/simplonreunion/">
                        <i class="icon-social-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="social-link rounded-circle text-dark mr-3 bg-warning" href="https://twitter.com/simplon_reunion">
                        <i class="icon-social-twitter"></i>
                    </a>
                </li>
            </ul>
            <p class="text-muted small mb-0">Copyright &copy; Application test entré BTS </p>
        </div>
    </footer>

    <!-- Bouton pour remonter tout en haut de la page -->
    <!-- <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a> -->

    <!-- Librairie JavaScript fonctionnant avec bootstrap -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Librairie jQuery pour faire des animation fluide -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Fichier JavaScript de l'animation du menu et du thème en général -->
    <script src="js/stylish-portfolio.min.js"></script>
    <!-- Librairie JavaScript qui met en place bootstrap pour avoir des "forms" personnalisé comme le champs de recherche des étudiants -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.3/js/i18n/defaults-*.min.js"></script>





</body>

</html>