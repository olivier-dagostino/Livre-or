<?php
require('header.php'); 
include('include/bdd.inc.php');
?>

<?php


if (isset($_POST['login']) && isset($_POST['password'])) { // SI c'est deux $Post sont défini
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login='$login'"); // Je compare toutes les données de la table utilisateurs avec $login et $password
    $res = mysqli_fetch_array($sql);  // Alors la $login et $password vont stocker $post

    if (empty($res)) {
        echo 'Votre Mot de Passe ou Votre Nom Utilisateur sont inconnus'; // verification du MDP et du Login
    } else {
        if (password_verify($password, $res['password'])) 
        {
            if ($res['role'] == "admin") { //si la $res est strictement = a $password
                // alors start session
                $_SESSION['id'] = $res['id'];
                $_SESSION['role'] = $res['role'];
                $_SESSION['login'] = $res['login'];

                header("refresh:1;url=admin.php"); // alors je renvois vers admin.php

            } else {
                echo $res['prenom'] . ' Veuillez patienter, vous allez être redirigé'; // Sinon bienvenue dans votre espace
                $_SESSION["id"] = $res['id'];
                $_SESSION["role"] = $res['role'];
                $_SESSION["login"] = $res ['login'];
                header("refresh:1;url=GuestBook.php");
            }
        }
    }
}
?>
<main>

    <div class="formu">
        
            <form id="form-connexion" method="post" action="">
                <h1>
                    <center>Connexion</center>
                </h1>
                <input style="font-family: 'Indie Flower', cursive;" name="login" type="text" placeholder="Nom d'Utilisateur" required /><br><br>
                <input style="font-family: 'Indie Flower', cursive;" name="password" type="password" placeholder="Mot de Passe" requried /><br><br>
                <input style="font-family: 'Indie Flower', cursive;" type=submit value="Envoyer" name="env">
            </form>
        
        <div>
</main>
<br><br><br>
<footer>
    <?php require('footer.php'); ?>
</footer>