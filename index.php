<?php


		//----------------------------------------
		//connection a la BDDD
		//----------------------------------------
		include("configuration/config.php");
		include("function.php");
		
		$req = $bdd->prepare('SELECT * FROM artiste');
		$req->execute();
		$artiste=$req->fetchAll(PDO::FETCH_OBJ);
		//print_r($artiste);
		
		
		 
		foreach($artiste as $ligne){
			echo"<div>
				<h5>".$ligne->Nom."</h5>
				<p>".$ligne->StyleMusical."</p>
				<img src='upload/".$ligne->PhotoArtiste."' alt='".$ligne->Nom."'>
				<p>".$ligne->Description."</p>
				<video src='extrait/".$ligne->Extrait."' controls>
					Votre navigateur n'est pas compatible avec le HTML 5, désolé.
				</video></div>";
		}
		

		
	
		
	


?>
