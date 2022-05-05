<?php
    // On se connecte à MySQL
  include_once("database.php");
    // Connexion à la base de données
     $idcom = connect_DB();
    // afficheTable($idcom, "regie_lumiere", ""); fonction qui afficher tout la table de la regie lumière
     $conso="SELECT consommation FROM MesureRL WHERE id_rl= '1' ORDER BY ID DESC";//selectionner seulement la consommation
     $temps_marche="SELECT tmp_marche FROM MesureRL WHERE id_rl= '1' ORDER BY ID DESC";//le but est d'afficher que la consommation d'energie Wh
     
    afficheValeur($temps_marche,$idcom);//fonction qui affiche la valeur tiré de la requette SELECT.
    echo "\n"."\n";
    afficheValeur($conso,$idcom,"A"); 
  ?>