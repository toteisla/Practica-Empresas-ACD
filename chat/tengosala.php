<?php 
$id = $_GET['id'];
$id_salas = "";
include_once("../ini_base_datos.php");
$consulta = mysql_query("SELECT idsala FROM userschat WHERE iduser = $id AND conectado = 0");
while($fila = mysql_fetch_array($consulta))
{
	$sala = $fila['idsala'];
	$id_salas = $id_salas.$sala."_@_@_";
}
echo $id_salas;
?>
