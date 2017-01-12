<?php
		session_start();
		if(!empty($_SESSION['login'])){
			header('Location: NewArtiste.php');
		}
?>
<div>
	<form action="connexionCheck.php" method="POST">

		<fieldset>
			<legend>connexion</legend>
			
			<input type="text" required name="login" placeholder="login">
			<input type="password" required name="password"  placeholder="password">
			
			<input class="bouton" type="submit" value="valider" />
		</fieldset>
	</form>
 </div>

 
 <?php
 /*si faux*/
if(!empty($_GET['false'])){
	echo "mot de passe ou identifiant ".$_GET['false'];
	}
?>
