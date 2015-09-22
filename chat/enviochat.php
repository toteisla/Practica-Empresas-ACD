<?php
$id = $_COOKIE ['id']; 
$nombre = $_COOKIE ['nombre'];
$idsala = $_GET['idsala'];
$receptor = $_GET['receptor'];
$cadena = $_GET['texto'];
include_once("../ini_base_datos.php");
$consulta = mysql_query("SELECT id FROM usuarios WHERE nombre = '$receptor'");
$fila = mysql_fetch_array($consulta);
$id_receptor = $fila['id']; 
$texto = "<FONT COLOR=blue>".$nombre." dice:</FONT></br>".$cadena."</br>";
$consulta = mysql_query("UPDATE salas SET texto = CONCAT(texto,'$texto') WHERE id = $idsala");
$consulta = mysql_query("UPDATE userschat SET conectado = 0 WHERE idsala = $idsala AND iduser!=$id");
?>
