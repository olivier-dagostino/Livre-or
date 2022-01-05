<?php

require('header.php');
?>
<?php


$id = $_SESSION["id"];
$bdd = mysqli_connect("localhost:8889", "root", "root", "livreor"); 

$req= mysqli_query($bdd,"SELECT * FROM utilisateurs WHERE id = $id");

$res= mysqli_fetch_all($req,MYSQLI_ASSOC);
$login = $res[0]['login'];
$prenom = $res[0]['prenom'];
$nom = $res[0]['nom'];
$password = $res[0]['password']; 


if (isset($_POST['env']))
{
    $nom1 = $_POST['nom'];
    $prenom1 = $_POST['prenom'];
    $password1 = $_POST['password'];
    $login1 = $_POST['login'];
    $req2= mysqli_query($bdd,"UPDATE utilisateurs SET login='$login1', prenom='$prenom1', nom='$nom1', password='$password1' WHERE  id = $id ");
    header("Location: profil.php");
} 

?>




    <h2><center>Modifier votre Profil</center></h2><br><br><br><br>
    <div id="formu-modif-profil">
        <center>
        <form name="formu" action="" method="post">
            <label for ="login">Login</label><br>
            <input style="font-family: 'Indie Flower', cursive;" id="login" name="login" value="<?php echo $login?>" type="text" placeholder="Username"/><br><br>

            <label for ="prenom">Prenom</label><br>
            <input style="font-family: 'Indie Flower', cursive;" name="prenom" value="<?php echo $prenom?>" type="text" placeholder="Prenom" /><br><br>

            <label for ="nom">Nom</label><br>
            <input style="font-family: 'Indie Flower', cursive;" name="nom" value="<?php echo $nom?>" type="text" placeholder="Nom" /><br><br>

            <label for ="password">Password</label><br>
            <input style="font-family: 'Indie Flower', cursive;" name="password" value="<?php echo $password?>" type="password" placeholder="Votre Mot de Passe"/><br><br>
            
            <input style="font-family: 'Indie Flower', cursive;" name="env" type="submit" placeholder="Envoyer">
        </form>
        </center>
    </div>
    <br><br><br><br>


<?php require('footer.php'); ?>