<?php
include('include/bdd.inc.php');
require('header.php');
?>


	<h1>Livre d'Or</h1>


<?php
	if (! isset($_SESSION['login']))  {
	
		header("location:connexion.php");
		exit();
	}
	
	if (isset($_POST['envoyer'])) { //si le bouton envoyer (name="envoyer") est cliqué, on traite le fomulaire
		if (empty($_POST['commentaire'])) {
			$msg_erreur = "Le Champ Commentaire est vide";
		} else {
			$commentaire =  $_POST['commentaire'];
			$userid = $_SESSION['id'];
			$req = "INSERT INTO `commentaires` (`commentaire`,`id_utilisateur`,`date`) VALUES ('$commentaire', '$userid', NOW())";
			$result = mysqli_query($connect, $req);
		}
	}
?>

	<div class="formulaire">

		<form id="form-guestbook" action="" method="POST">
			<?php echo "Vous êtes connecté en tant que " . $_SESSION['login']; ?>
			<h2>Message</h2>
			<textarea placeholder="Votre commentaire" name="commentaire" rows="10" cols="50" required></textarea>
			<input type="submit" name="envoyer" value="Poster!">
		</form>

	</div>
	<div id="alignement-com">
		<div class="commentaire">
			<?php
			if ($result = mysqli_query($connect, "SELECT commentaires.*, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY `date` DESC")) {
				while ($infos = mysqli_fetch_assoc($result)) {
					
			?>
					<div class="screen_com">
							<div class="screen-com1">
								<p>
									Commentaire posté par <?php echo $infos['login']; ?> le <?php echo $infos['date']; ?>
								</p>
							</div>
							<div class="screen-com2">	
							<?php echo $infos['commentaire']; ?>
							</div>
						</div>
				<?php }
			}?>
		</div>
	</div>

	<?php require('footer.php');?>