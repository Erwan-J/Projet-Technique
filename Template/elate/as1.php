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

<!DOCTYPE html>
<html>
	<head>
		<title>gauge</title>
	</head>

	<body>
		<svg height="500" width="500">
	  		<line id="line" x1="50" y1="300" x2="200" y2="300" transform-origin="200 300" transform="rotate(0)" style="stroke:rgb(255,0,0); stroke-width:5" />
	  		<circle cx="200" cy="300" r="3" stroke="black" stroke-width="3" fill="red" />
	  		<rect x="10" y="150" width="250" height="150" style="fill:none;stroke-width:3;stroke:rgb(0,0,0)" />
		</svg>
	</body>
</html>
<script>
	var svg = document.getElementById("line");
	var angle ="<?php echo $inclinaison ?>";

	
	
	
	function Rotate(angle) 
	{
	setInterval(function () {
		var panneau = document.getElementById("line");
    line.setAttribute("transform", "rotate(angle)");
	}, 60);

	}
</script>