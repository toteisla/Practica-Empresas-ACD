<?php 
$nombre = $_COOKIE ['nombre'];
$id = $_GET['id'];
$cadena = "";
include_once("../ini_base_datos.php");
$consulta = mysql_query("SELECT U.nombre, S.id FROM usuarios U, userschat UC, salas S WHERE UC.iduser=U.id AND UC.idsala=S.id AND UC.iduser!=$id");
while($fila = mysql_fetch_array($consulta))
{
	$cadena = $cadena."$fila[0]"."_@_@_".$fila[1]."_@_@_";
}
echo $cadena;
?>
