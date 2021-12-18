<?php require'header.php';?>


<?php

$connect= mysqli_connect("localhost:8889","root","root","moduleconnexion"); // je me connecte a la bdd


if(isset($_POST['login']) && isset($_POST['password'])){ // SI c'est deux $Post sont défini
    $login=$_POST['login'];
    $password=$_POST['password'];
    $sql=mysqli_query ($connect,"SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'"); // Je compare toutes les données de la table utilisateurs avec $login et $password
    $res= mysqli_fetch_all($sql);  // Alors la $login et $password vont stocker $post

    if (empty($res)) {
        echo 'Votre Mot de Passe ou Votre Nom Utilisateur sont inconnus'; // verification du MDP et du Login
    }
     else {
         if($res[0][4] == $password){ //si la $res est strictement = a $password
            session_start();            // alors start session
            if ( $password == 'admin'){  // si le password est = a ADmin 

                header ("refresh:1;url=admin.php"); // alors je renvois vers admin.php

            }else {
                echo $res[0][2] .' Veuillez patienter, vous allez être redirigé vers votre espace'; // Sinon bienvenue dans votre espace
                $_SESSION["id"] = $res[0][0];
                header ("refresh:1;url=profil.php");


            }
         }else {
             echo "Erreur";
         }
     }

}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="php.css">
    <title>connexion</title>
</head>
<body>
<div class="formu">
<form method="post" action="">
    <h1><center>Connexion</center></h1>
    <input style="font-family: 'Indie Flower', cursive;" name="login" type="text" placeholder="Nom d'Utilisateur"required />
    <input style="font-family: 'Indie Flower', cursive;" name="password" type="password" placeholder="Mot de Passe" requried />
        <input style="font-family: 'Indie Flower', cursive;" type=submit value="Envoyer" name="env">
        <p class="message"><a href="inscription.php">Pas encore Inscrit ?</a></p>
        <div>
</body>
</html>