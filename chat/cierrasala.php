<?php 
$id = $_COOKIE['id'];
include_once("../ini_base_datos.php");
$comprueba2 = mysql_query("SELECT idsala FROM userschat WHERE iduser = $id");
$fila = mysql_fetch_array($comprueba2);
$idsala = $fila['idsala'];
$comprueba3 = mysql_query("SELECT count(idsala) cont FROM userschat WHERE idsala = $idsala");
$fila = mysql_fetch_array($comprueba3);
$cont = $fila['cont'];
echo "SELECT idsala FROM userschat WHERE iduser = $id </br>";
echo "id sala -> ".$idsala."</br>";
echo "SELECT count(idsala) cont FROM userschat WHERE idsala = $idsala </br>";
echo "count -> ".$cont;
if($cont == 1)
{
	mysql_query("DELETE FROM salas WHERE id = $idsala");
}
else
{
	mysql_query("DELETE FROM userschat WHERE idsala = $idsala AND iduser = $id");
}
?>
