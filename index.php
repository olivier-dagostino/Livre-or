
<?php
//on définit notre variable pour pouvoir inclure les fichier
define("C2SCRIPT","peut être n'importe quoi ici");
include("fonctions.inc.php");

//on se connecte à la base de données (à adapter/remplacer avec votre système de connexion)"localhost:8889", "root", "root", "livreor"
$BDD = array();
$BDD['serveur'] = "localhost:8889";
$BDD['login'] = "root";
$BDD['pass'] = "root";
$BDD['bdd'] = "livreor";
$mysqli = mysqli_connect($BDD['serveur'],$BDD['login'],$BDD['pass'],$BDD['bdd']);
if(!$mysqli) exit('Connexion MySQL non accomplie!');

?>
<?php require_once 'header.php';?>
<main>


    <h2>Test Sony WH-1000XM4 : la référence des casques sans fil à réduction de bruit s'améliore encore</h2>
    <div class="img-1">
        <img id="design-mx4" src="asset/img/mx4.webp" alt="photo-casque">
    </div>

    <div class="container1">
        <div class="left-container1">
            <img id="img-avis1" src="asset/img/IMG_0024.jpg" alt="">
        </div>
        <div class="middle-container1">
            <p>
                On serait bien en peine de reprocher au Sony WH-1000XM4</br>
                sa similarité extrême avec le WH-1000XM3. L'aîné était</br>
                déjà extrêmement proche d'une certaine forme de perfection,</br>
                et à coup de petits ajustements fonctionnels souvent minimes,</br>
                parfois notables (la connexion Bluetooth multipoint, enfin !),</br>
                le cadet prend tout naturellement la relève en tant que référence</br>
                des casques sans fil à réduction de bruit. Seule précaution à prendre</br>
                avant l'achat : s'assurer que l'on ne sera pas incommodé par une sonorité</br>
                certes remarquablement précise et musicale, mais au penchant vers</br>
                les graves très prononcé.
            </p> <br><br><br>
            <p>Pour laisser un Commentaires inscrivez-vous, puis connectez-vous à votre espace</p>
        </div>
        <div class="right-container1">
            <img id="img-avis2" src="asset/img/IMG_0025.jpg" alt="">
        </div>

    </div>
    <div class="commentaire">

    
    <center>
	<?php afficherCommentaires(123);?>
	</center>
    </div>

</main>

<?php require_once 'footer.php' ?>