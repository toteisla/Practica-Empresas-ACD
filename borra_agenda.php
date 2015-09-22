<?PHP
	include_once( "./ini_base_datos.php" );
	$id = $_GET['id'];
	$strQuery = "DELETE FROM agenda WHERE id = $id";
	$query1 = mysql_query( $strQuery, $db_resource );
	mysql_close($db_resource);
?>
