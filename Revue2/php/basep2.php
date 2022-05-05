<?php

 //    // On se connecte à MySQL
include_once("database.php");
    // Connexion à la base de données
   	$idcom = connect_DB();
 
   	$inclinaison="SELECT Inclinaison_panneau FROM MesurePS WHERE id_ps= '2' ORDER BY ID DESC ";//selcetionner seulement la consommation
   	$orientation="SELECT Orientation_panneau FROM MesurePS WHERE id_ps= '2' ORDER BY ID DESC";
    $tension="SELECT V_Panneau FROM MesurePS WHERE id_ps= '2' ORDER BY ID DESC";
    $courant="SELECT I_Panneau FROM MesurePS WHERE id_ps= '2' ORDER BY ID DESC";
   	//////////////////////////////////////////////////////
   	afficheValeur($orientation,$idcom,"deg");
   	echo"\n"."\n";
   	afficheValeur($inclinaison,$idcom,"deg");
    echo"\n"."\n";
   	afficheValeur($courant,$idcom,"A");

//ajouter un parametre d'unité a la fonction ??


?>