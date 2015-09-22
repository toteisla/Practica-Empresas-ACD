<?php
	// Conectamos la base de datos.
	include_once("./ini_base_datos.php");
	session_start();
	session_name('idcorreo');
	$_SESSION['idcorreo']='';
	$user = $_GET['User'];
	$pass = $_GET['Pass'];
	
	if(!isset($_COOKIE['logeado']))
	{
		// Comprobamos que exista el usuario y sea valido.
		$strQuery = "SELECT id, pass FROM usuarios WHERE nick = '$user' AND bolLogged = 0";
		$query = mysql_query($strQuery, $db_resource);
		$fila = mysql_fetch_array($query);
		if(strcmp($pass,$fila['pass']) == 0)
		{
			//si es valido se realiza el update.
			echo "1";
			$strQuery2 = "UPDATE usuarios SET bolLogged = 1,fecha_ult_actividad = NOW()+INTERVAL 30 MINUTE WHERE nick = '$user'";
			$query2 = mysql_query($strQuery2, $db_resource);
			$id = $fila['id'];
			setcookie("id",$id);
			setcookie("nombre",$user);
			setcookie("logeado","1");
			setcookie("idcorreo","");
		}
		mysql_free_result($query);
		mysql_close($db_resource);
	}
	else
	{
		echo "0";
	}
?>
