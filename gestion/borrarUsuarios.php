<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$user = $_POST['selectUsers'];
	$strQuery = "DELETE FROM usuarios WHERE nick='$user'";
	mysql_query($strQuery, $db_resource);
	mysql_close($db_resource);
	header("Location: ../apli.php");
?>

