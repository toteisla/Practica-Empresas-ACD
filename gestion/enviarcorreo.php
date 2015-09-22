<?PHP
/*
 *Script que inserta el correo a la base de datos.En la sesion se guardará el id del correo para añadir los archivos adjuntos si éste tiene 
 */
session_start();
include_once("./seguridad.php");
$miid = $_COOKIE['id'];
include_once( "../ini_base_datos.php" );
$rec=$_GET['rec'];
$asu=$_GET['asu'];
$mens=$_GET['mens'];
$mens=str_ireplace('|@','&',$mens);
$asu=str_ireplace('|@','&',$asu);
$recbuzon=0;
$mibuzon=0;
	$strQuery1 = "SELECT id from buzon_correos WHERE id_user='$rec';";
	$query1 = mysql_query( $strQuery1, $db_resource );
	while ($fila = mysql_fetch_array($query1)) 
	{ 
	$recbuzon=$fila[0];
	}
	$strQuery1 = "SELECT id from buzon_correos WHERE id_user='$miid';";
	$query1 = mysql_query( $strQuery1, $db_resource );
	while ($fila = mysql_fetch_array($query1)) 
	{ 
	$mibuzon=$fila[0];
	}
	$strQuery2 = "INSERT INTO correos VALUES('','$recbuzon','$asu','$mens',NOW(),$mibuzon,0,0,0);";
	$query2 = mysql_query( $strQuery2, $db_resource ); 
	$idcorreo=mysql_insert_id($db_resource);
	$_SESSION['idcorreo'] = $idcorreo;
?>
