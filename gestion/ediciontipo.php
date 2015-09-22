<?php
	include_once("./seguridad.php");
	if($_POST['opcion'] == "crear")
	{
		$nombre = $_POST['nombreUsuario'];
		$usuarios = $_POST['usuariostipoocul'];
		$proyectos = $_POST['proyectosocul'];
		$chat = $_POST['pchatocul'];
		$correo = $_POST['correoocul'];
		$noticias = $_POST['noticiasocul'];
		$editnot = $_POST['gesnoticiasocul'];
		$infocorp = $_POST['infocorpocul'];
		$editinfocorp = $_POST['ediinfocorpocul'];
		include_once("../ini_base_datos.php");
				
		$strQuery = "INSERT INTO  `ACD`.`tipo_usuarios` (`id` ,`nombre_tipo` ,`p_usuarios` ,`p_proyectos` ,`p_chat` ,`p_buzon` ,`p_lnoticias` ,`p_enoticias`, `p_infocorp`, `p_editinfocorp` ) 
													VALUES ('', '$nombre', '$usuarios', '$proyectos', '$chat', '$correo', '$noticias', '$editnot', '$infocorp', '$editinfocorp')";
		$query = mysql_query($strQuery, $db_resource);
		
		mysql_close($db_resource);
		header('Location: ../apli.php');
	}
	else if ($_POST['opcion'] == "editar")
	{
		$tiposel = $_POST['nombreUsuario'];
		$usuarios = $_POST['usuariostipoocul'];
		$proyectos = $_POST['proyectosocul'];
		$chat = $_POST['pchatocul'];
		$correo = $_POST['correoocul'];
		$noticias = $_POST['noticiasocul'];
		$editnot = $_POST['gesnoticiasocul'];
		$infocorp = $_POST['infocorpocul'];
		$editinfocorp = $_POST['ediinfocorpocul'];
		include_once("../ini_base_datos.php");
		
		$strQuery = "UPDATE `tipo_usuarios` SET `p_usuarios`='$usuarios',`p_proyectos`='$proyectos',`p_chat`='$chat',`p_buzon`='$correo',`p_lnoticias`='$noticias',`p_enoticias`='$editnot',`p_infocorp`='$infocorp',`p_editinfocorp`='$infocorp' WHERE nombre_tipo = '$tiposel'";
		$query = mysql_query($strQuery, $db_resource);
		
		mysql_close($db_resource);
		header('Location: ../apli.php');
	}
	else
	{
		$tiposel = $_POST['nombreUsuario'];
		include_once("../ini_base_datos.php");
		$strQuery = "DELETE FROM `tipo_usuarios` WHERE nombre_tipo = '$tiposel'";
		$query = mysql_query($strQuery, $db_resource);
		//echo $strQuery;
		header('Location: ../apli.php');
	}
?>

