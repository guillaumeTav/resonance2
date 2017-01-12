<?php
		//----------------------------------------
		//--------test si conditions valide-------
		//----------------------------------------
		if(empty($_POST['Nom']) AND empty($_POST['StyleMusical'])){
			header('Location: NewArtiste.php');
		}
			
		session_start();
		if(empty($_SESSION['login'])){
			header('Location: connexion.php');
		}

		//----------------------------------------
		//connection a la BDDD--------------------
		//----------------------------------------
		include("configuration/config.php");
		include("function.php");
		
		
		$Image = UploadImage('PhotoArtiste','upload');
		$Extrait = UploadVideo('Extrait','extrait');
		
		if(!empty($Image) && !empty($Extrait)){
			//Convertion PHP > HTML
			$NomArtiste = htmlentities($_POST['Nom']);
			$StyleMusical = htmlentities($_POST['StyleMusical']);
			//$PhotoArtiste = htmlentities($_POST['PhotoArtiste']);
			$Description = htmlentities($_POST['Description']);
			//$Extrait = htmlentities($_POST['Extrait']);
			
			
			//Requete d'envoie
			$req = $bdd->prepare('INSERT INTO resonance.artiste (Nom,StyleMusical, PhotoArtiste, Description,Extrait) 
														VALUES (:Nom, :StyleMusical, :PhotoArtiste, :Description, :Extrait)');
														
			$req->execute(array(

				'Nom' => $NomArtiste,
				'StyleMusical' => $StyleMusical,
				'PhotoArtiste' => $Image,
				'Description' => $Description,
				'Extrait' => $Extrait,
			));
			echo ' Donnee envoye a la BDD';
		}		 
	
		

		
	
		
	

?>
