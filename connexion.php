<?php require 'header.php' ?>


<?php

$connect = mysqli_connect("localhost:3306", "utilisateurs1", "12345", "olivier-d-agostino_livreor"); // je me connecte a la bdd


if (isset($_POST['login']) && isset($_POST['password'])) { // SI c'est deux $Post sont défini
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = mysqli_query($connect, "SELECT * FROM utilisateurs WHERE login='$login' AND password='$password'"); // Je compare toutes les données de la table utilisateurs avec $login et $password
    $res = mysqli_fetch_all($sql);  // Alors la $login et $password vont stocker $post

    if (empty($res)) {
        echo 'Votre Mot de Passe ou Votre Nom Utilisateur sont inconnus'; // verification du MDP et du Login
    } else {
        if ($res[0][5] == "admin") { //si la $res est strictement = a $password
            session_start();
            // alors start session
            $_SESSION["id"] = $res[0][0];
            $_SESSION["role"] = $res[0][5];

            header("refresh:1;url=admin.php"); // alors je renvois vers admin.php

        } else {
            echo $res[0][2] . ' Veuillez patienter, vous allez être redirigé vers votre espace'; // Sinon bienvenue dans votre espace
            session_start();
            $_SESSION["id"] = $res[0][0];
            $_SESSION["role"] = $res[0][5];
            header("refresh:1;url=profil.php");
        }
    }
}
?>
<main>

    <div class="formu">
        <center>
            <form id="form-connexion" method="post" action="">
                <h1>
                    <center>Connexion</center>
                </h1>
                <input style="font-family: 'Indie Flower', cursive;" name="login" type="text" placeholder="Nom d'Utilisateur" required /><br><br>
                <input style="font-family: 'Indie Flower', cursive;" name="password" type="password" placeholder="Mot de Passe" requried /><br><br>
                <input style="font-family: 'Indie Flower', cursive;" type=submit value="Envoyer" name="env">
            </form>
        </center>
        <div>
</main>
<br><br><br>
<footer>
    <?php require 'footer.php' ?>
</footer>