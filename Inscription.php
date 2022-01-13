<?php
require('header.php');
include('include/bdd.inc.php');


if (isset($_POST['env'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $login = $_POST['login'];
  $conf = $_POST['confpw'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $select = mysqli_query($connect, "SELECT * FROM `utilisateurs` WHERE `login` = '$login'");
  if (mysqli_num_rows($select)) {
    exit("Ce nom d'utilisateur existe déjà");
  }

  if (!empty($nom) && !empty($prenom) && !empty($password) && !empty($login)) {
    if ($password == $conf) {
      mysqli_query($connect, "INSERT INTO utilisateurs (login,prenom,nom,password,role) VALUES('".$login."','".$prenom."','".$nom."','".$hash."','utilisateur')");
      header("Refresh:3; url=connexion.php");
      echo 'Votre Compte à bien été créé, vous allez être redirigé vers la page de Connexion';
    } else {
      echo 'Confirmer votre MDP';
    }
  } else {
    echo 'Tous les champs doivent être remplis';
  }
}

if (isset($_SESSION['login']) == false) {
  if (isset($_POST['inscription'])) {
    $login = $_POST['login'];
    $mdp = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $conf = $_POST['confpw'];

    $checklogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $query = mysqli_query($connect, $checklogin);
    $veriflogin = mysqli_fetch_all($query);

    if (empty($veriflogin)) {
      if ($_POST['password'] == $_POST['confpw']) {

        $ajoutbdd = 'INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ("' . $login . '", "' . $prenom . '","' . $nom . '", "' . $password . '")';
        $ajout = mysqli_query($connect, $ajoutbdd);
        // echo $ajoutbdd;
      } else {
        echo 'Vos mos de passes de correspondent pas';
      }
    } else {
      echo 'Ce login n\'est pas disponible';
    }
  }
  mysqli_close($connect);
}
?>



<div class="form-inscription">
  <form id="form-inscription" action="" method="post">
    <?php
    // if (!empty($nom) && !empty($prenom) && !empty($password) && !empty($login)) {
    //   if ($password == $conf) {
    //     echo 'Compte créé';
    //     // header('location: connexion.php');
    //   }
    // }
    ?>
    <h1>
      <center>Formulaire d'Inscription</center>
    </h1>
    <label for="login">Login</label><br>
    <input style="font-family: 'Indie Flower', cursive;" type="text" name="login" id="login" placeholder="Login"><br><br>
    <label for="prenom">Prénom</label><br>
    <input style="font-family: 'Indie Flower', cursive;" name="prenom" type="text" placeholder="prenom" /><br><br>
    <label for="nom">Nom</label><br>
    <input style="font-family: 'Indie Flower', cursive;" name="nom" type="text" placeholder="nom" /><br><br>
    <label for="password">Mot de Passe</label><br>
    <input style="font-family: 'Indie Flower', cursive;" type="password" name="password" id="password" placeholder="Password"><br><br>
    <label for="confpw">Confirmation Mot de Passe</label><br>
    <input style="font-family: 'Indie Flower', cursive;" type="password" name="confpw" id="confpw" placeholder="Confirmer votre Password"><br><br>
    <input style="font-family: 'Indie Flower', cursive; font: size 20px;" type="submit" value="S'inscrire" name="env" class="submit"><br><br><br><br>
  </form>
</div>

<?php require('footer.php'); ?>