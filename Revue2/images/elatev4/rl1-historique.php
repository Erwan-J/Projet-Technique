
<?php 

include_once("database.php");
include_once("param_connect_db.php");

$idcom = connect_DB();
afficheTableRegie($idcom,'mesurerl','tabOrange','id_rl',1,'ID',20);
    ?>