<?php
$connect = mysqli_connect("localhost:8889", "root", "root", "moduleconnexion"); // je me connecte a la bdd


if (isset($_POST['env'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $password = $_POST['password'];
  $login = $_POST['login'];
  $conf = $_POST['conf'];


  if (!empty($nom) && !empty($prenom) && !empty($password) && !empty($login)) {
    if ($password == $conf) {
      echo 'Compte créé';
      $req = mysqli_query($connect, "INSERT INTO utilisateurs (login,prenom,nom,password)
    VALUES('$login','$prenom','$nom','$password')");
    } else {
      echo 'Confirmer votre MDP';
    }
  } else {
    echo 'Tous les champs doivent être remplis';
  }
}
?>

<?php require 'header.php' ?>

<div class="form-inscription">
  <form action="" method="post">
    <?php
    if (!empty($nom) && !empty($prenom) && !empty($password) && !empty($login)) {
      if ($password == $conf) {
        echo 'Compte créé';
        header('location: connexion.php');
        
      }
    }
    ?>
    <h1>
      <center>Formulaire d'Inscription</center>
    </h1>
    <label for="login">Login</label>
    <input style="font-family: 'Indie Flower', cursive;" type="text" name="login" id="login" placeholder="Login"><br><br>
    <label for="prenom">Prénom</label>
    <input style="font-family: 'Indie Flower', cursive;" name="prenom" type="text" placeholder="prenom" /><br><br>
    <label for="nom">Nom</label>
    <input style="font-family: 'Indie Flower', cursive;" name="nom" type="text" placeholder="nom" /><br><br>
    <label for="password">Mot de Passe</label>
    <input style="font-family: 'Indie Flower', cursive;" type="password" name="password" id="password" placeholder="Password"><br><br>
    <label for="confpw">Confirmation Mot de Passe</label>
    <input style="font-family: 'Indie Flower', cursive;" type="password" name="confpw" id="confpw" placeholder="Confirmer votre Password"><br><br>
    <input style="font-family: 'Indie Flower', cursive;" type="submit" value="S'inscrire" name="inscription" class="submit"><br><br><br><br>
  </form>
</div>

<?php
$bdd = mysqli_connect("localhost:8889", "root", "root", "moduleconnexion");

if (isset($_SESSION['login']) == false) {
  if (isset($_POST['inscription'])) {
    $login = $_POST['login'];
    $mdp = $_POST['password'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    $conf = $_POST['confpw'];

    $checklogin = "SELECT login FROM utilisateurs WHERE login = '$login'";
    $query = mysqli_query($bdd, $checklogin);
    $veriflogin = mysqli_fetch_all($query);

    if (empty($veriflogin)) {
      if ($_POST['password'] == $_POST['confpw']) {

        $ajoutbdd = 'INSERT INTO utilisateurs (login, prenom, nom, password) VALUES ("' . $login . '", "' . $prenom . '","' . $nom . '", "' . $password . '")';
        $ajout = mysqli_query($bdd, $ajoutbdd);
        // echo $ajoutbdd;
      } else {
        echo 'Vos mos de passes de correspondent pas';
      }
    } else {
      echo 'Ce login n\'est pas disponible';
    }
  }
  mysqli_close($bdd);
}

?>


</body>

</html>