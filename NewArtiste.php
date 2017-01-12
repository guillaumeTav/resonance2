<?php
		//----------------------------------
		//test si la personne est connectee-
		//----------------------------------
		session_start();
		if(empty($_SESSION['login'])){
			header('Location: connexion.php');;
		}
?>
<a href="deconnexion.php">deconnexion</a>
<div>
	<form action="UploadArtiste.php" method="POST" enctype="multipart/form-data">

		<fieldset>
			<legend>Artiste</legend>
			
			<input type="text" required name="Nom" placeholder="Nom de l'artiste ou du groupe">
			
			<fieldset class="part1">
				<label for="DubStep">DubStep</label>
				<input type="radio" checked required name="StyleMusical" value="DubStep">
				<label for="Electro">Electro</label>
				<input type="radio" name="StyleMusical" value="Electro">
				<label for="Locaux">Locaux</label>
				<input type="radio" name="StyleMusical" value="Locaux">
				<label for="Rap">Rap</label>
				<input type="radio" name="StyleMusical" value="Rap">
				<label for="Rock">Rock</label>
				<input type="radio" name="StyleMusical" value="Rock">
			</fieldset>
			<input type="file" required name="PhotoArtiste" placeholder="Image de l'artiste">
			<input type="text" required name="Description"  placeholder="Description">
			<input type="file" required name="Extrait" placeholder="Lien d'un extrait video de l'artiste">

			
			<input class="bouton" type="submit" value="valider" />
		</fieldset>
	</form>
 </div>

  <?php
/*affichage du menu*/
	//include("footer.php");
?>

 
</body>
</html>