<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	
	$nick = $_GET['Nick'];
	$strQuery = "SELECT nick FROM usuarios WHERE nick='$nick'";
	$query = mysql_query($strQuery, $db_resource);
	if(mysql_num_rows($query) > 0)
		echo 0;
	else
		echo 1;
	mysql_free_result($query);
	mysql_close($db_resource);
?>
