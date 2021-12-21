<?php
//on définit notre variable pour pouvoir inclure les fichier
define("C2SCRIPT","peut être n'importe quoi ici");
include("fonctions.php");

//on se connecte à la base de données (à adapter/remplacer avec votre système de connexion)
$BDD = array();
$BDD['serveur'] = "localhost:3306";
$BDD['login'] = "utilisateurs1";
$BDD['pass'] = "12345";
$BDD['bdd'] = "olivier-d-agostino_livreor";
$mysqli = mysqli_connect($BDD['serveur'],$BDD['login'],$BDD['pass'],$BDD['bdd']);
if(!$mysqli) exit('Connexion MySQL non accomplie!');

?>

<?php require 'header.php'; ?>
    <body>
	<h1>Livre d'Or</h1>
    <br><br><br>
	<h2>Écrire un commentaire</h2>
	<br><br><br>
	
	<div class="formulaire">
	
		 <!-- indiquer la page actuelle avec ou sans query du type ?id=123&... et l'id de la'rticle pour affiche les commentaire de cette article seulement, si vous utilisez ce système de commentaire pour un livre d'or par exemple, vous pouvez l'enlever et mettre seulement la page actuelle: afficherFormulaireCommentaire("page.php"); -->
	<center>
	<?php afficherFormulaireCommentaire("GuestBook.php",123);?>
	</center>
	
	
	</div>
	
     <br><br><br>
	<h2>Commentaires postés</h2>
<br><br>
	<div class="commentaire-poste">
	<center>
	<?php afficherCommentaires(123);?>
	</center>	
	</div>
    
<?php require 'footer.php' ?>
	</body>
</html>