<?php

							//    // On se connecte à MySQL
						   include_once("database2.php");
							   // Connexion à la base de données
								  $idcom = connect_DB();
							
							   $inclinaison="SELECT Inclinaison_Panneau FROM MesurePS WHERE id_ps='2' ORDER BY ID DESC ";//selcetionner seulement la consommation
							   $orientation="SELECT Orientation_Panneau FROM MesurePS WHERE id_ps='2' ORDER BY ID DESC";
							   $courant="SELECT I_Panneau FROM MesurePS WHERE id_ps='2' ORDER BY ID DESC";
								  //////////////////////////////////////////////////////
								afficheValeur($inclinaison,$idcom);
							  afficheValeur($orientation,$idcom);
								afficheValeur($courant,$idcom);
							  afficheValeur($temps_marche,$idcom); 
						   //p=U*I il me faut peut être la tension 
						   //ajouter un parametre d'unité a la fonction ??
						   header("Refresh:3");
						   
?> 