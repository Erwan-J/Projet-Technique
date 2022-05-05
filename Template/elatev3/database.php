
 <?php
///////////////////////////////////////////////////////////////////////////////////////////////////
/**
* Se connecte à une base de données selon les paramètres
* définis dans le fichier <b>"param_connect_db.php"</b>
*
* @author : SD
* @return PDO un objet PDO en cas de succès sinon met fin au script quand 
* une exception est levée
*/
function connect_DB() {
	// Inclusion des paramètres de connexion
	include_once("./param_connect_db.php");

	$dsn="mysql:host=" . HOST . ";dbname=" . BASE;

	try {
		// Tentative de connexion au serveur
		$idcom = new PDO($dsn,USER,PASS);
		
		// Renvoie l'objet en cas de réussite
		return $idcom;
	}
	catch(PDOException $except)
	{
		// Met fin au script en cas d'échec
		echo "Échec de la connexion : ", $except->getMessage();
		exit();
	}
 }
///////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Affiche sous forme d'un tableau une table dont le nom est passé en paramètre
 * 
 * @author : SD
 * @param : $idcom     connection PDO
 * @param : $nomTable  nom de la table
 * @param : $classCss nom de la classe CSS à utiliser pour la mise en forme du tableau
 */
function afficheTable($idcom, $nomTable, $classCss) {
	$requete="SELECT * FROM " . $nomTable;
	afficheRequete($idcom, $requete, $classCss);
}
///////////////////////////////////////////////////////////////////////////////////////////////////
/**
 * Affiche sous forme d'un tableau le résultat d'une requête passée en paramètre
 * 
 * @author : SD
 * @param : $idcom    connection PDO
 * @param : $requete  requête SQL à afficher
 * @param : $classCss nom de la classe CSS à utiliser pour la mise en forme du tableau
 */
function afficheRequete($idcom, $requete, $classCss) {
	$result=$idcom->query($requete);
	if($result) {
		$nbLignes=$result->rowCount();
		echo "Il y a $nbLignes enregistrements.";

		echo "<table class=\"" . $classCss . "\">";
		
		if($ligne=$result->fetch(PDO::FETCH_ASSOC)) {
			// Affichage des noms des colonnes ou des alias			
			afficheEnTeteColonnes(array_keys($ligne));

			echo "<tbody>";
			// Affichage de la première ligne
			afficheLigne($ligne);
		}
		
		// Affichage des autres lignes
		while($ligne=$result->fetch(PDO::FETCH_NUM)){
			afficheLigne($ligne);		
		}
		echo "</tbody></table>";
		
		$result->closeCursor(); 
	} else {
		$mes_erreur=$idcom->errorInfo();
		echo "Lecture impossible, code ", $idcom->errorCode(),$mes_erreur[2];
	}
}
/////////////////////////////////////////////////////////////////////////////////////////////////// 
/**
 * Affiche une ligne de tableau HTML à partir d'un tableau passé en paramètre
 * 
 * @author : SD
 * @param : $ligne    tableau contenant les valeurs des colonnes à afficher
 */
function afficheLigne($ligne) {
	echo "<tr>";
	foreach($ligne as $valeur) {
		echo "<td> " . htmlentities($valeur) . " </td>";
	}

	echo "</tr>";				 
 }
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 /**
 * Affiche l'en-tête d'un tableau HTML à partir d'un tableau contenant le nom des colonnes passé en paramètre
 * 
 * @author : SD
 * @param : $titres    tableau contenant les noms des colonnes à afficher
 */
function afficheEnTeteColonnes($titres) {
	echo "<thead><tr>";
	foreach($titres as $nomcol) {
		echo "<th>", htmlentities($nomcol) ,"</th>";
	}
	echo "</tr></thead>";	 
 }
 ///////////////////////////////////////////////////////////////////////////////////////////////////
 /**
 * Affiche la informations tirés de la requête mise en paramêtre 
 * 
 * @author : SS
 * @param : $requete une requette sql qui affiche une valeur precise de la table
 */
 function afficheValeur($requete,$idcom,$unite=""){
  $result=$idcom->query($requete);
	if ($result) {
		if($ligne=$result->fetch(PDO::FETCH_ASSOC)) {
			foreach($ligne as $valeur) {
		       echo htmlentities($valeur)." ".$unite;
		    }
	    }	
	}
	
 }