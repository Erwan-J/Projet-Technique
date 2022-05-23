<?php

							//    // On se connecte à MySQL
						   include_once("database.php");
							   // Connexion à la base de données
								  $idcom = connect_DB();
							
							   $conso="SELECT consommation FROM mesurerl WHERE id_rl='1' ORDER BY ID DESC ";//selcetionner seulement la consommation
							   $temps_marche="SELECT tmp_marche FROM mesurerl WHERE id_rl='1' ORDER BY ID DESC ";
								  //////////////////////////////////////////////////////
							afficheValeur($conso,$idcom);
							afficheValeur($temps_marche,$idcom); 
						   //p=U*I il me faut peut être la tension 
						   //ajouter un parametre d'unité a la fonction ??
						   header("Refresh:3");
						   
?> 