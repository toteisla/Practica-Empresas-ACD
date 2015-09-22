<?php // Comprobación de autenticación.
if(!isset($_COOKIE['id']))
	header("Location: ./index.php");
else
{
	include_once( "./ini_base_datos.php" );
	$id = $_COOKIE['id'];
	$strQuery = "UPDATE usuarios set bolLogged=0 WHERE id=$id";
	$query = mysql_query( $strQuery, $db_resource ) or die("Ha habido un error en logout.php. Consulte al administrador");
	setcookie ("id", "", time() - 3600);
	setcookie ("nombre", "", time() - 3600);
	setcookie ("logeado", "", time() - 3600);
	setcookie ("idcorreo", "", time() - 3600);
	setcookie ("NSUB", "", time() - 3600);
	
	$strQuery2 = "SELECT S.id FROM salas S,userschat UC WHERE S.id=UC.idsala AND UC.iduser=$id";
	$query2 = mysql_query( $strQuery2, $db_resource ) or die("Ha habido un error al borrar la sala en logout.php. Consulte al administrador");
	while($fila = mysql_fetch_array($query2))
	{
		$strQuery3 = "UPDATE userschat SET conectado = 1 WHERE idsala = $fila[0]";
		$query3 = mysql_query($strQuery3,$db_resource);
	}
	
	mysql_free_result($query2);
	mysql_close($db_resource);
	header ("Location: ./index.php");
}
?>
