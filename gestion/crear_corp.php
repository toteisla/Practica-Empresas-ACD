<?php
	include_once("../ini_base_datos.php");
	if($_POST['opcion'] == "not")
	{
		$nombrenot = $_POST['nomnot'];
		$cuerponot = $_POST['cuerpnot'];
		$consulta = mysql_query("INSERT INTO infocorp VALUES ('', '$nombrenot', '$cuerponot', NOW())");
	}
	else
	{
		$archivo = $_FILES["archivo"]["tmp_name"];
		$tamanio = $_FILES["archivo"]["size"];
		$tipo    = $_FILES["archivo"]["type"];
		$nombre  = $_FILES["archivo"]["name"];
		$fp = fopen($archivo, "rb");
		$contenido = fread($fp, $tamanio);
		$contenido = addslashes($contenido);
		fclose($fp); 
		
		$strQuery2 = "INSERT INTO adjuntos_corporativos VALUES ('','$nombre','$contenido', NOW(),'$tipo')";
		mysql_query($strQuery2,$db_resource);
	}
?>
