<?php 
include_once("database.php");
include_once("param_connect_db.php");
$idcom = connect_DB();

if ($_POST) 
{									
	if (isset($_POST['posPanneau']) && isset($_POST['inclPanneau']) && isset($_POST['I_Panneau']) && isset($_POST['I_Batterie']) &&  isset($_POST['V_Panneau']) && isset($_POST['V_Batterie']))  
	  	{

      		$posP = htmlspecialchars(strip_tags(trim($_POST['posPanneau'])));
			$inclP = htmlspecialchars(strip_tags(trim($_POST['inclPanneau'])));
			$int = htmlspecialchars(strip_tags(trim($_POST['I_Panneau'])));
			$ten = htmlspecialchars(strip_tags(trim($_POST['I_Batterie'])));
			$cap = htmlspecialchars(strip_tags(trim($_POST['V_Panneau'])));
			$V_Batterie= htmlspecialchars(strip_tags(trim($_POST['V_Batterie'])));

	  	}
	  

	  	$strRequete = "INSERT INTO as1 ( Position_Panneau, Inclination_Panneau, I_Panneau, I_Batterie, V_Panneau, V_Batterie ) VALUES ('".$posP."','".$inclP."','".$int."','".$ten."', '".$cap."','".$V_Batterie."')";
		
		echo $strRequete;
		$result = $idcom->exec($strRequete);

		if ($result == 1)
		{
			header('Location: ./teste.php');
			exit();
		}
		else 
		{
			$msgErreur = '<p class="warning">"Un problème d\'écriture est est survenu !"</p>';
		}
	  		
}

?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8" />
		<title>Produits</title>	
		<link rel="stylesheet"  href="style.css">
	</head>

	<body>
		<h1>Send</h1>

		<form method="post" action="RL1.php">
    <label for="posPanneau" >Position du Panneau</label><input type="number" name="posPanneau" id="posPanneau" placeholder="0" min="0" ></p>
    <input type="submit" name="Valider" value="Valider">
		</form>



	
	</body>

</html>