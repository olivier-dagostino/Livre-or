<?php 

if (!defined("C2SCRIPT")) exit; //empêche l'accès direct à cette page, autorisé seulement en include en définissant "C2SCRIPT", juste avant

function htmlent($texte)
{
	// htmlentities(chaine de caractères,ENT_QUOTES,"UTF-8") permet de convertir tous les caractères en entité HTML
	return htmlentities($texte, ENT_QUOTES, "UTF-8");
}

/* *********************************************************** */

function raf($NomDuBouton, $TexteParDefaut = '')
{
	//fonction pour réafficher les champs du formulaire après l'avoir envoyé pour ne pas avoir à les reremplir
	return isset($_POST[$NomDuBouton]) ? htmlentities($_POST[$NomDuBouton], ENT_QUOTES, "UTF-8") : $TexteParDefaut;
}

/* *********************************************************** */

function afficherFormulaireCommentaire($Page, $IdArticle = 0)
{
	global $mysqli; //permet à la variable $mysqli d'être utilisée dans la fonction
	$AfficherForm = 1; //quand tout sera bien posté, on cachera le formulaire en mettant cette valeur à 0
	$msg_erreur = ''; //pour indiquer les erreurs qui empéche la soumission du formulaire, on prendre aussi cette valeur comme répère pour savoir si il y a une erreur (vide = OK, pas vide = il y a des erreurs, on affiche le message)
	if (isset($_POST['envoyer'])) { //si le bouton envoyer (name="envoyer") est cliqué, on traite le fomulaire
		if (empty($_POST['commentaire'])) {
			$msg_erreur .= "Le Champ Commentaire est vide";
		} else if ($msg_erreur != '') {
			//si il y a des erreurs, on les affichent
			echo '<h1 style="color:red">Il y a des erreurs:</h1>';
			echo $msg_erreur;
		} else {
			//pas d'erreurs, on sécurise les champs pour les insérer dans la base de données
			$Login = htmlent($_POST['login']); //voir la fonction htmlent() dans le fichier fonctions.php pour plus de détails
		
			$Commentaire =  htmlent($_POST['commentaire']);
			$Commentaire = nl2br($Commentaire); //nl2br nous permet d'ajouter des <br/> quand il y a un saut de ligne, nous permettra de garder les saut quand on 

			//on l'insère dans la bdd (vous remarquerez que je n'ai pas entouré les variable par ".$MaVariable.", ça fonctionne seulement si vous mettez des guillemets double en debut et en fin ("INSERT INTO....") ne fonctionnera pas avec des guillemets simples, exemple: ('INSERT INTO....')
			if (mysqli_query($mysqli, "INSERT INTO commentaires SET 
				login = '$Login',
				
				commentaire = '$Commentaire',
				" . ($IdArticle != 0 ? "id_article = $IdArticle," : "") /* ici id_article à remplacer par le nom de votre colonne */ . "
				quand = " . time())) { //time() donne le timestamp actuel, on pourra le manipuler avec la fonction date(), exemple: date("H:i d-m-Y",quand)
				echo "<p>Commentaire posté avec succès!</br></br></p>";
				//bien sûr, on pourrait imaginer que le commentaire ne soit pas tout de suite validé, en mettant une colonne supplémentaire dans la table des commentaires (ex: valide=0) et l'afficher que quand un admin le valide et mis à 1
				$AfficherForm = 0; //on cache le formulaire
			} else {
				echo "<p>Une erreur s'est produite, merci de réessayer ou contactez le support si le problème persiste.</p>" . mysqli_error($mysqli);
			}
		}
	}
	if ($AfficherForm == 1) {
?>

		<form id="form-guestbook"action="<?php echo $Page; ?>" method="post">
			<?php echo "Vous êtes connecté en tant que " . $_SESSION['login']; ?>
			

			<br /><br /><br />
			
			Message
			<br /><br />
			<textarea placeholder="Votre commentaire" name="commentaire" rows="10" cols="50" required="required"><?php echo raf("commentaire"); ?></textarea>
			<!--
			rows définit la hauteur, indique le nombre de ligne qui sera visible
			cols définit la largeur, indique le nombre de lettre qui sera visible de gauche à droite
			ici on à une hauteur de 10 ligne et d'une largeur de 50 lettres
			-->
			<br /><br /><br />
			<input type="submit" name="envoyer" value="Poster!">
		</form>
		<?php
	}
}



function afficherCommentaires($IdArticle = 0)
{
	global $mysqli; //permet à la variable $mysqli d'être utilisée dans la fonction
	//on va chercher les commentaires qui correspondent à l'id de l'article (si mentionné)
	$req = mysqli_query($mysqli, "SELECT * FROM commentaires WHERE id_article " . ($IdArticle != 0 ? "=$IdArticle" : "IS NULL") . " ORDER BY id DESC");
	if (mysqli_num_rows($req) == 0) {
		echo "<p>Aucun commentaire pour le moment.</p>";
	} else {
		while ($infos = mysqli_fetch_assoc($req)) {
		?>
			<div style="margin-bottom:50px; border:2px solid #4fce99; width: 70%;padding: 40px;">
				<p style="color:#4fce99; "><b><?php echo $infos['pseudo']; ?> le <?php echo date("d-m-Y", $infos['quand']) . " à " . date("H:i", $infos['quand']); ?></b></p><br>
				<p><?php echo $infos['commentaire']; ?></p>
			</div>
<?php
		}
	}
}

