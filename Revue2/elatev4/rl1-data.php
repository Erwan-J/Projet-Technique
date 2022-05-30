<?php

		//    // On se connecte à MySQL
	include_once("database2.php");
		// Connexion à la base de données
			$idcom = connect_DB();
		
		$conso="SELECT consommation FROM mesurerl WHERE id_rl='1' ORDER BY ID DESC ";//selcetionner seulement la consommation
		//$temps_marche="SELECT Horodatage FROM mesurerl WHERE id_rl='1' ORDER BY ID DESC ";
		if($conso>500){
		    $date1="SELECT 	Horodatage FROM MesureRL WHERE id_rl='1' ORDER BY ID DESC LIMIT 1";
		    $date2="SELECT 	Horodatage FROM MesureRL WHERE id_rl='1'&& consommation<500 ORDER BY ID DESC";
		    $tmp_marche="SELECT TIMEDIFF( ".$date1."," .$date2.")";
		}
		if($conso<500){
		   $tmp_marche=0;
		}
		$sdsq = "185";
		afficheValeur($conso,$idcom);
		echo $tmp_marche;

	header("Refresh:3");
						   
?> 