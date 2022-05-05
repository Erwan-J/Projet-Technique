<?php
   
  include_once("database.php");
    // Connexion à la base de données
     $idcom = connect_DB();
     
     $conso="SELECT consommation FROM MesureRL WHERE id_rl= '2' ORDER BY ID DESC";//selectionner seulement la consommation
     $temps_marche="SELECT tmp_marche FROM MesureRL WHERE id_rl= '2' ORDER BY ID DESC";//le but est d'afficher que la consommation d'energie Wh

    afficheValeur($temps_marche,$idcom);
    echo "\n"."\n";
    afficheValeur($conso,$idcom,"A"); 
  ?>