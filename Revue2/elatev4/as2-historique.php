
<?php 

    include_once("database2.php");
    include_once("param_connect_db.php");

    $idcom = connect_DB();
    afficheTablePanneau($idcom,'mesureps','tabOrange','id_ps',2,'ID',20);
?>