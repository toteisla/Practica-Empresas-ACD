<script type="text/javascript" src="./js/librerias.js"></script>
<?PHP
/*
 * Muestra el menú para la Redactar correo, ver los recibidos o ver los enviados
 */
include_once("./seguridad.php");
$miid = $_COOKIE['id'];
include_once( "../ini_base_datos.php" );
echo"
<table>
	<tr>
		<td style='vertical-align:top;'>
			<div id='Redactar' onclick='accion(this.id)' style='cursor:pointer;'><FONT COLOR=BLUE>Redactar</FONT></div>
			<div id='Recibidos' onclick='accion(this.id)' style='cursor:pointer;'><FONT COLOR=BLUE>Recibidos";
			$mensnoleidos=0;
			$strQuery2 = "SELECT count( * )
			FROM correos
			WHERE id_buzon_correo ='$miid' AND leido='0'";
			$query2 = mysql_query( $strQuery2, $db_resource ); 
			while ($fila = mysql_fetch_array($query2)){
			$mensnoleidos=$fila[0];
			}
			echo" (</FONT><a id='mensnole'>$mensnoleidos</a><a>)</a></div>
			<div id='Enviados' onclick='accion(this.id)' style='cursor:pointer;'><FONT COLOR=BLUE>Enviados</FONT></div>
		</td>
		<td rowspan='3' width='85%' height='550px' style='overflow:auto;'>
			<div id='centrocorreo' style='width:100%;height:100%;overflow:auto;'></div>
		</td>
	</tr>
</table>";
?>
