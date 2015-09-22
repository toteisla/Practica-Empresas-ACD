<?php 
$id = $_GET['id'];
$receptor = utf8_encode($_GET['receptor']);
include_once("../ini_base_datos.php");
$comprueba = mysql_query("SELECT idsala FROM userschat WHERE iduser = $id");
$fila = mysql_fetch_array($comprueba);
$idsala1 = $fila['idsala'];
$comprueba2 = mysql_query("SELECT id FROM usuarios WHERE nombre = '$receptor'");
$fila = mysql_fetch_array($comprueba2);
$id_receptor = $fila['id'];
$comprueba3 = mysql_query("SELECT idsala
FROM userschat U1
WHERE iduser =$id_receptor
AND idsala = (
SELECT idsala
FROM userschat U2
WHERE iduser =$id
AND U2.idsala = U1.idsala )");
$cont = mysql_num_rows($comprueba3);
$fila = mysql_fetch_array($comprueba3);
$idsala2 = $fila['idsala'];
if($cont < 1)
{
	mysql_query("INSERT INTO `salas`(`texto`,`maxplayers`) VALUES ('',2)");
    $sala = mysql_insert_id($db_resource);
	mysql_query("INSERT INTO `userschat`(`iduser`, `idsala`, `conectado`) VALUES ($id, $sala, 1)");
	mysql_query("INSERT INTO `userschat`(`iduser`, `idsala`, `conectado`) VALUES ($id_receptor, $sala, 0)");
	echo $sala;
}else{
	echo $idsala2;
}
?>
