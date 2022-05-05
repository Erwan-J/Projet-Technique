<?php 
include_once("database.php");
include_once("param_connect_db.php");
$idcom = connect_DB();

if ($_POST) 
{									
	if (isset($_POST['orPanneau']) && isset($_POST['inclPanneau']) && isset($_POST['I_Panneau']) && isset($_POST['I_Batterie']) &&  isset($_POST['V_Panneau']) && isset($_POST['V_Batterie']))  
	  	{

      		$orP = htmlspecialchars(strip_tags(trim($_POST['orPanneau'])));
			$inclP = htmlspecialchars(strip_tags(trim($_POST['inclPanneau'])));
			$int = htmlspecialchars(strip_tags(trim($_POST['I_Panneau'])));
			$ten = htmlspecialchars(strip_tags(trim($_POST['I_Batterie'])));
			$cap = htmlspecialchars(strip_tags(trim($_POST['V_Panneau'])));
			$V_Batterie= htmlspecialchars(strip_tags(trim($_POST['V_Batterie'])));

	  	}
	  

	  	$strRequete = "INSERT INTO as2 ( Orientation_Panneau, Inclination_Panneau, I_Panneau, I_Batterie, V_Panneau, V_Batterie ) VALUES ('".$orP."','".$inclP."','".$int."','".$ten."', '".$cap."','".$V_Batterie."')";
		
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
		<h1>Send P2</h1>

		<form method="post" action="AS2.php">
    <label for="inclPanneau" >inclination du Panneau</label><input type="number" name="inclPanneau" id="inclPanneau" placeholder="0" min="-20" ></p>
    <label for="orPanneau" >Orientation du Panneau</label><input type="number" name="orPanneau" id="orPanneau" placeholder="0" min="0" ></p>
    <label for="I_Panneau" >I_Panneau:</label><input type="number" name="I_Panneau" id="I_Panneau" placeholder="0" ></p>
    <label for="I_Batterie" >I_Batterie:</label><input type="number" name="I_Batterie" id="I_Batterie" placeholder="0" ></p>
    <label for="V_Panneau" >V_Panneau:</label><input type="number" name="V_Panneau" id="V_Panneau" placeholder="0" ></p>
	<label for="V_Batterie">V_Batterie:</label>	<input type="number" name="V_Batterie" id="V_Batterie"  placeholder="0"></p>
    <input type="submit" name="Valider" value="Valider">
		</form>



	
	</body>

</html>