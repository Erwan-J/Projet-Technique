<?php

							//    // On se connecte à MySQL
						   include_once("database.php");
							// Connexion à la base de données
							$idcom = connect_DB();


						
							$inclinaison = rand(0,110);
							$orientation = rand(0,360);
							$tension = rand(10,100);
							$courant = rand(10,50);
							$sys = rand(1,2);
							$h = rand(0,24);
							$m = rand(0,60);
							$s = rand(0,60);
							$p = ($tension * $courant)/100;
								//////////////////////////////////////////////////////
							echo $inclinaison;
							echo "\n";
							echo $orientation;
							echo "\n";
						 
						   //p=U*I il me faut peut être la tension 
						   //ajouter un parametre d'unité a la fonction ??
						   	$strRequete = "INSERT INTO mesureps (Inclinaison_Panneau,Orientation_Panneau,V_Panneau,V_Batterie,I_Panneau,I_Batterie,id_ps) VALUES ('".$inclinaison."','".$orientation."','".$tension."','".$tension."','".$courant."','".$courant."','".$sys."')";

							$strRequete2= "INSERT INTO mesurerl ( `id_rl`, `consommation`, `tmp_marche`) VALUES ( '".$sys."', '".$p."', '".$h.":".$m.":".$s."')";
							echo $strRequete;
							echo "\n";
							echo $strRequete2;
							$result = $idcom->exec($strRequete);
							$result2 = $idcom->exec($strRequete2);
						   header("Refresh:2");
						   
?> 

