
<?php 

include_once("database.php");
include_once("param_connect_db.php");

$idcom = connect_DB();
afficheTablePanneau($idcom,'mesureps','tabOrange','id_ps',1,'ID',20);
    ?>