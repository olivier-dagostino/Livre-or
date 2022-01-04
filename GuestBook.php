<?php
include('include/bdd.inc.php');
include('include/header.inc.php');

?>

    <body>
	<h1>Livre d'Or</h1>

<?php
	if (isset($_POST['envoyer'])) { //si le bouton envoyer (name="envoyer") est cliqué, on traite le fomulaire
		if (empty($_POST['commentaire'])) {
			$msg_erreur = "Le Champ Commentaire est vide";
		} else {
			$commentaire =  $_POST['commentaire'];
			$userid = $_SESSION['id'];
			$result = mysqli_query($connect, "INSERT INTO `commentaires` (`commentaire`,`id_utilisateur`,`date`) VALUES ($commentaire, $userid, NOW())");
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
	<div class="commentaire">
		<?php
			if($result = mysqli_query($connect,"SELECT commentaires.*, utilisateurs.login FROM commentaires INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ORDER BY `date` ASC")){
				while ($infos = mysqli_fetch_assoc($result)){
					
					?>
					<div class="screen_com">
						<p>
							Commentaire posté par <?php echo $infos['login']; ?> le <?php echo $infos['date']; ?><br>
							<br><br>
							
						<?php echo $infos['commentaire']; ?>

						</p>
					</div>
					<?php 
				}
			}
		?>

	</div>
<?php include('include/footer.inc.php');?>