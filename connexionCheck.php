<?php
//-------------------------------------------------
//----------systeme de connexion-------------------
//-------------------------------------------------

//A ameliorer
//fonction d'erreur
//mettre la requete en requete prepare

		//------------------------------
		//verification des conditions---
		//------------------------------
		
		if(empty($_POST['login']) AND empty($_POST['password'])){
			header('Location: connexion.php');
			}
		session_start();
		if(!empty($_SESSION['login'])){
			header('Location: connexion.php');;
		}
		
		//------------------------------
		//connection a la base de donné-
		//------------------------------
		
		include("configuration/config.php");
		//include("function.php");

		
		//--------------------------------------
		//requete pour savoir utilisateur existe
		//--------------------------------------
		
		$requete='SELECT loginAdmin, passwordAdmin FROM administrateur WHERE loginAdmin = "'.$_POST["login"].'" AND passwordAdmin = MD5("'.$_POST["password"].'")';
		$login=$bdd->query($requete);
		$test=$login->fetch(PDO::FETCH_OBJ);
		$login->closeCursor();
		
		
		//------------------------------
		//si l'utilisateur existe-------
		//------------------------------
		
		if($test != NULL){
			$_SESSION['login']=$_POST['login'];
			header('Location: NewArtiste.php');
		}
		
		//------------------------------
		//si l'utilisateur existe pas---
		//------------------------------
		else{	
			$msg="incorrect";				
			header('Location: connexion.php?false='.$msg.'');
		}

?>
