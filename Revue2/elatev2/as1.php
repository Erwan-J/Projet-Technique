<?php

							//    // On se connecte à MySQL
						   include_once("database.php");
							   // Connexion à la base de données
								  $idcom = connect_DB();
							
								  $inclinaison="SELECT Inclination_panneau FROM MesurePS ORDER BY ID DESC ";//selcetionner seulement la consommation
								  $orientation="SELECT Orientation_panneau FROM MesurePS ORDER BY I DESC";
							   $tension="SELECT V_Panneau FROM MesurePS ORDER BY ID DESC";
							   $courant="SELECT I_Panneau FROM MesurePS ORDER BY ID DESC";
							   $temps_marche="SELECT Horodatage FROM MesurePS ORDER BY ID DESC";
								  //////////////////////////////////////////////////////
								  afficheValeur($orientation,$idcom,"deg");
								  echo"\n"."\n";
								  afficheValeur($inclinaison,$idcom,"deg");
							   echo"\n"."\n";
								  afficheValeur($courant,$idcom,"A");
							   echo"\n"."\n";
							   afficheValeur($temps_marche,$idcom); 
						   //p=U*I il me faut peut être la tension 
						   //ajouter un parametre d'unité a la fonction ??
						   header("Refresh:0");
						   
						   ?>  