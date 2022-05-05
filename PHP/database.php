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
	function connect_DB() 
	{
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
?>