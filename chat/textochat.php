<?php 
$id = $_GET['id'];
$receptor = $_GET['receptor'];
$texto = $_GET['texto'];
include_once("../ini_base_datos.php");
$consulta = mysql_query("INSERT INTO chat (id_usuario_envia , id_usuario_recibe , mensaje) VALUES ($id, ".$fila['id'].", '$texto' )");
?>



	
	
	
	

