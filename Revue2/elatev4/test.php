<?php
//    // On se connecte à MySQL
include_once("database2.php");
// Connexion à la base de données
$idcom = connect_DB();


$systeme = htmlspecialchars(strip_tags(trim($_POST['hello'])));
$inclinaison = htmlspecialchars(strip_tags(trim($_POST['inclinaison'])));
$orientation = htmlspecialchars(strip_tags(trim($_POST['Orientation'])));
$courant = htmlspecialchars(strip_tags(trim($_POST['consommation'])));
$id=htmlspecialchars(strip_tags(trim($_POST['id'])));
	//////////////////////////////////////////////////////


if ($systeme == "mesurePS")
	{
		$strRequete = "INSERT INTO mesurePS (Inclinaison_Panneau,Orientation_Panneau,I_Panneau,id_ps) VALUES ('".$inclinaison."','".$orientation."','".$courant."','".$id."')";
		$result = $idcom->exec($strRequete);
	}
else if ($systeme == "mesureRL")
	{
		$strRequete= "INSERT INTO mesureRL ( `id_rl`, `consommation`) VALUES ( '".$id."','".$courant."')";
		$result = $idcom->exec($strRequete);
	}



					   
?> 
<!DOCTYPE html>
<html>
	<form method="post" action="test.php">

		<label for="hello">systeme:</label><input type="text" name="hello" id="hello" placeholder="mesurePS/RL" ><p></p>

		<label for="inclinaison" >Inclinaison:</label><input type="number" name="inclinaison" id="inclinaison" placeholder="90°" min="0" max="100"><p></p>

		<label for="Orientation" >Orientation:</label><input type="number" name="Orientation" id="Orientation" placeholder="360°" min="0" max="360"><p></p>

		<label for="consommation" >consommation:</label><input type="number" name="consommation" id="consommation" placeholder="50" min="0" max="999"><p></p>

		<label for="id" >id:</label><input type="number" name="id" id="id" placeholder="1/2" min="1" max="2"><p></p>

		<input type="submit" name="Valider" value="Valider"><p></p>

	</form>
</html>