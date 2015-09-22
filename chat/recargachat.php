<?php 
$idsala = $_GET['idsala'];
include_once("../ini_base_datos.php");
$strQuery = "SELECT texto FROM salas WHERE id = '$idsala'";
$query = mysql_query($strQuery,$db_resource);
$fila = mysql_fetch_array($query);
echo $fila[0];
?>
