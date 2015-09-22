<?PHP
	include_once( "./ini_base_datos.php" );
	$iduser = $_COOKIE['id'];
	$fecha = $_GET['fecha'];
	$texto = $_GET['texto'];
	$strQuery = "INSERT INTO agenda (id_user, fecha, texto) VALUES ($iduser, str_to_date('$fecha','%Y,%m,%d'),'$texto') ";
	$query = mysql_query( $strQuery, $db_resource );
	mysql_close($db_resource);
?>
