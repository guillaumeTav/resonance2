<?php
//-------------------------------------------------------
//fonction permettant d'upload dans la bdd max video 1Mo-
//-------------------------------------------------------
// dossier envoie / nom de l'imput d'envoie / 
function UploadVideo($NomImput, $dossierEnvoie){
	
		//----------------------------------------
		//test des differentes erreurs possibles
		//----------------------------------------
		$dossier = $dossierEnvoie.'/';
		$fichier = basename($_FILES[$NomImput]['name']);

		//test des extentions disponibles
		$extensions = array('.mp3', '.ogg', '.mov', '.flv');
		$extension = strrchr($_FILES[$NomImput]['name'], '.'); 
		if(!in_array($extension, $extensions)) 
		{
			 $erreur = 'Vous devez uploader un fichier de type mp3, ogg, mov, flv...';
		}
		
		//test taille maximum du fichier
		$taille_maxi = 1000000;
		$taille = filesize($_FILES[$NomImput]['tmp_name']);
		if($taille>$taille_maxi)
		{
			 $erreur = 'Le fichier est trop gros...';
		}
		
		
		//----------------------------------------
		//---S'il n'y a pas d'erreur, on upload---
		//----------------------------------------
		if(!isset($erreur)) 
		{
			//Formatage du nom du fichier
			$fichier = strtr($fichier, 
				  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			
			
			//creation du dossier si il n'existe pas
			if(!is_dir($dossier)){
			   mkdir($dossier);
			}
			
			//test existance du fichier
			$CheckFichier = $dossierEnvoie.'/'.$fichier;
			if (file_exists($CheckFichier)) {
				echo "Le fichier $CheckFichier existe.";
				return $fichier;
			} 
			else {
				echo "Le fichier $CheckFichier n'existe pas.";
				//Upload des informations et déplacement de la video
				if(move_uploaded_file($_FILES[$NomImput]['tmp_name'], $dossier . $fichier)) 
				{
					echo 'Upload de la video effectue avec succes ! ';
					return $fichier;
				}
				//Si probleme lors de upload
				 else 
				 {
					  echo 'Echec de l\'upload !';
				 }
			}
		}
		
		//----------------------------------------
		//------Sinon renvoie de l'erreur---------
		//----------------------------------------
		else if(!empty($erreur))
		{
			 echo $erreur;
		}
}



//------------------------------------------------------------------
//fonction permettant d'upload une image max image 1Mo--------------
//------------------------------------------------------------------
// dossier envoie / nom de l'imput d'envoie / 
function UploadImage($NomImput, $dossierEnvoie){
	
		//----------------------------------------
		//test des differentes erreurs possibles
		//----------------------------------------
		$dossier = $dossierEnvoie.'/';
		$fichier = basename($_FILES[$NomImput]['name']);

		//test des extentions disponibles
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
		$extension = strrchr($_FILES[$NomImput]['name'], '.'); 
		if(!in_array($extension, $extensions)) 
		{
			 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg...';
		}
		
		//test taille maximum du fichier
		$taille_maxi = 1000000;
		$taille = filesize($_FILES[$NomImput]['tmp_name']);
		if($taille>$taille_maxi)
		{
			 $erreur = 'Le fichier est trop gros...';
		}
		
		
		//----------------------------------------
		//---S'il n'y a pas d'erreur, on upload---
		//----------------------------------------
		if(!isset($erreur)) 
		{
			//Formatage du nom du fichier
			$fichier = strtr($fichier, 
				  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
			
			
			//creation du dossier si il n'existe pas
			if(!is_dir($dossier)){
			   mkdir($dossier);
			}
			
			//test existance du fichier
			$CheckFichier = $dossierEnvoie.'/'.$fichier;
			if (file_exists($CheckFichier)) {
				echo "Le fichier $CheckFichier existe.";
				return $fichier;
			} 
			else {
				echo "Le fichier $CheckFichier n'existe pas.";
				//Upload des informations et déplacement de l'image
				if(move_uploaded_file($_FILES[$NomImput]['tmp_name'], $dossier . $fichier)) 
				{
					echo 'Upload de l\'image effectue avec succes ! ';
					return $fichier;
				}
				//Si probleme lors de upload
				 else 
				 {
					  echo 'Echec de l\'upload !';
				 }
			}
		}
		
		//----------------------------------------
		//------Sinon renvoie de l'erreur---------
		//----------------------------------------
		else if(!empty($erreur))
		{
			 echo $erreur;
		}
}

?>
