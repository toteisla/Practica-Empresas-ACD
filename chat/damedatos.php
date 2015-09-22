<?php 
$id = $_COOKIE['id'];
$user = $_COOKIE['nombre'];
include_once("../ini_base_datos.php");
$consulta = mysql_query("SELECT idsala FROM userschat WHERE iduser = $id AND conectado = 0");
if(	$fila = mysql_fetch_array($consulta) )
{
	$idsala = $fila['idsala'];
	$consulta2 = mysql_query("SELECT iduser FROM userschat WHERE idsala = $idsala AND iduser != $id");
	$fila2 = mysql_fetch_array($consulta2);
	$idrecept = $fila2['iduser'];
	$consulta3 = mysql_query("SELECT nombre FROM usuarios WHERE id = $idrecept");
	$fila3 = mysql_fetch_array($consulta3);
	$nombrerec = $fila3['nombre'];
	mysql_query("UPDATE userschat SET conectado = 1 WHERE iduser = $id");
	echo $nombrerec;
}
else
{
	echo "2";
}
?>
