<?php
	// fichier de configuration pour accéder au serveur de base de données
	$hote='localhost';
	$port='';
	$nom_bd='resonance';
	$identifiant='root';
	$mot_de_passe='';
	$encodage='utf8';
	$debug=true;

	
	
	// ajouter l'encodage pour la méthode quote() de PDO
try{
	$options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$encodage);
	$bdd = new PDO('mysql:host='.$hote.';port='.$port.';dbname='.$nom_bd,$identifiant, $mot_de_passe,$options);
}

catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>

