<?php

							//    // On se connecte à MySQL
						   include_once("database.php");
							   // Connexion à la base de données
								  $idcom = connect_DB();
							
							   $inclinaison="SELECT Inclination_panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC ";//selcetionner seulement la consommation
							   $orientation="SELECT Orientation_panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
							   $tension="SELECT V_Panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
							   $courant="SELECT I_Panneau FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
							   $temps_marche="SELECT Horodatage FROM MesurePS WHERE id_ps='1' ORDER BY ID DESC";
								  //////////////////////////////////////////////////////
								  afficheValeur($inclinaison,$idcom,"deg");
							   echo"\n"."\n";
							    afficheValeur($orientation,$idcom,"deg");
								  echo"\n"."\n";
								  afficheValeur($courant,$idcom,"A");
							   echo"\n"."\n";
							   afficheValeur($temps_marche,$idcom); 
						   //p=U*I il me faut peut être la tension 
						   //ajouter un parametre d'unité a la fonction ??
						   header("Refresh:0");
						   
?>  

<!DOCTYPE html>
<html>
	<head>
	    <link rel="stylesheet"  href="style.css">
		<style>
            .sys {
                display: inline-block;
            }
        </style>
	</head>

	<body>
	    <div>
    	    <!--Panneau-->
    	    <div class="sys">
    	        <h3>Inclinaison : <?php afficheValeur($inclinaison,$idcom)?>°</h3>
        		<svg height="170" width="280">
                    <line id="line" x1="50" y1="100" x2="200" y2="100" transform-origin="150 100" transform="rotate(<?php afficheValeur($inclinaison,$idcom)?>)" style="stroke:rgb(255,0,0); stroke-width:5" />
                    <line x1="125" y1="150" x2="150" y2="100"style="stroke:rgb(0,0,0); stroke-width:3" />
                    <line x1="175" y1="150" x2="150" y2="100"style="stroke:rgb(0,0,0); stroke-width:3" />
                    <circle cx="150" cy="100" r="3" stroke="black" stroke-width="3" fill="red" />
                    <rect x="10" y="0" width="250" height="150" style="fill:none;stroke-width:3;stroke:rgb(0,0,0)" />
                </svg>
    		</div>
    		
    		<!--boussole-->
    		 <div class="sys">
    	        <h3>Orientation : <?php afficheValeur($orientation,$idcom)?>°</h3>
        		<svg height="170" width="140" >
                    <text x="60" y="13" fill="red">N</text>
                    <circle cx="65" cy="80" r="60" stroke="black" stroke-width="5" fill="none" />
                    <polygon points="65,40 40,80 90,80 " style="fill:darkred;stroke:black;stroke-width:1" transform-origin="65 80" transform="rotate(<?php afficheValeur($orientation,$idcom)?>)" />
                    <polygon points="65,120 40,80 90,80 " style="fill:cyan;stroke:black;stroke-width:1" transform-origin="65 80" transform="rotate(<?php afficheValeur($orientation,$idcom)?>)"/>
                </svg>
            </div>
        </div>
	</body>
</html>











