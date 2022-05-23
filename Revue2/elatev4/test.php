<?php
//    // On se connecte à MySQL
include_once("database.php");
// Connexion à la base de données
$idcom = connect_DB();



$inclinaison = htmlspecialchars(strip_tags(trim($_POST['inclinaison'])));
$orientation = htmlspecialchars(strip_tags(trim($_POST['Orientation'])));
$systeme = htmlspecialchars(strip_tags(trim($_POST['systeme'])));
$courant = htmlspecialchars(strip_tags(trim($_POST['consommation'])));
$id=htmlspecialchars(strip_tags(trim($_POST['id'])));
	//////////////////////////////////////////////////////


//p=U*I il me faut peut être la tension 
//ajouter un parametre d'unité a la fonction ??
$strRequete = "INSERT INTO mesureps (Inclinaison_Panneau,Orientation_Panneau,V_Panneau,V_Batterie,I_Panneau,I_Batterie,id_ps) VALUES ('".$inclinaison."','".$orientation."','".$tension."','".$tension."','".$courant."','".$courant."','".$sys."')";

$strRequete2= "INSERT INTO mesurerl ( `id_rl`, `consommation`, `tmp_marche`) VALUES ( '".$sys."', '".$p."', '".$h.":".$m.":".$s."')";
$result = $idcom->exec($strRequete);
$result2 = $idcom->exec($strRequete2);

					   
?> 
<html>
<form method="post" action="test.php">
<label for="systeme"  >systeme:</label>	<select name="systeme" id="systeme">
										<option>mesureps</option> <option>mesurerl</option>
										</select></p>
<label for="inclinaison" >Inclinaison:</label><input type="number" name="inclinaison" id="inclinaison" placeholder="inclinaison" min="0" max="360"></p>
<label for="Orientation" >Orientation:</label><input type="number" name="Orientation" id="Orientation" placeholder="Orientation" min="0" max="100"></p>
<label for="consommation" >consommation:</label><input type="number" name="consommation" id="consommation" placeholder="consommation" min="0" max="999"></p>
<label for="id" >id:</label><input type="number" name="id" id="id" placeholder="id" min="1" max="2"></p>
<input type="submit" name="Valider" value="Valider">
</form>
</html>