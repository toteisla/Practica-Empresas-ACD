<script type="text/javascript" src="./js/librerias.js"></script>
<?PHP
/*
 *Creamos una nueva tabla donde insertamos los mensajes recibidos
 * Este muestra si el mensaje se ha leido 
 */
$miid = $_COOKIE['id'];
$minombre = $_COOKIE['nombre'];
include_once( "../ini_base_datos.php" );
echo "<h2>MENSAJES RECIBIDOS</h2>";
echo "<table class='tablacorreo'>
	<th style='width:6%;background-color:#F9F9F9;'>NUM</th>
	<th style='width:24%;background-color:#F9F9F9;'>ASUNTO</th>
	<th style='width:20%;background-color:#F9F9F9;'>FECHA</th>
	<th style='width:10%;background-color:#F9F9F9;'>ARCHIVOS</th>
	<th style='width:21%;background-color:#F9F9F9;'>REMITENTE</th>
	<th style='width:5%;background-color:#F9F9F9;'>BORRAR</th>
	</table>
";
$numeros=0;$miidbuzon=0;
/*
 * Traemos el id de buzon del usuario
 */
$strQuery1 = "SELECT id FROM buzon_correos WHERE id_user='$miid';";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) 
{
$miidbuzon=$fila[0];
}
/*
 *Recibimos los valores de cada mensaje 
 */
$strQuery2 = "SELECT c1.* , (SELECT count( * )FROM archivos_correos a1 WHERE id_correo = c1.id) ,(SELECT nombre FROM usuarios us,buzon_correos bz WHERE us.id = bz.id_user AND bz.id=c1.id)
FROM correos c1
WHERE id_buzon_correo='$miidbuzon'  AND borrado_rec='0' order by fecha_envio desc";
$query2 = mysql_query( $strQuery2, $db_resource ); 
while ($fila = mysql_fetch_array($query2)) 
{
	$numeros++;
	echo "<table class='tablacorreo'>";
	if($fila[6]==0)
		echo "<tr id='tr$fila[0]' style='cursor:pointer;background-color:#E9E9E9;'>";
	if($fila[6]==1)
		echo "<tr style='cursor:pointer;'>";
		/*
		 *Rellenamos la tabla con los datos del mensaje y añadimos cada fila un boton para borrar el correo
		 * y un metodo a cada fila para mostrar u ocultar el mensaje. 
		 */
	echo"
				<td onclick='ocultarmensaje($fila[0],0)'style='width:6%;'>$numeros</td>
				<td onclick='ocultarmensaje($fila[0],0)'style='width:24%;'>$fila[2]</td>
				<td onclick='ocultarmensaje($fila[0],0)'style='width:20%;'>$fila[4]</td>
				<td onclick='ocultarmensaje($fila[0],0)'style='width:10%;'>$fila[9]</td>
				<td onclick='ocultarmensaje($fila[0],0)'style='width:26%;'>$fila[10]</td>
				<td style='width:5%;' onclick='borrarcorreo($fila[0],\"rec\")'><div style='width:20px;heigth:20px;'><img src='./images/delete.png'style='cursor:url(\"./images/cursor.gif\");'></div></td>
			</tr>
		</table>
		<div id='mens$fila[0]' style='display:none;padding-top:0px;'>
			<table id='mensaje$fila[0]' style='border-top:0px;overflow:auto;width:100%;height:70px;padding-left:10px;padding-top:10px;'>
			<tr><td>$fila[3]</td></tr>
			</table>
	";
	/*
	 *Si tiene archivos adjuntos se añade para su descarga. 
	 */
	if($fila[9]!='0')
	{
		echo "
		ARCHIVOS ADJUNTOS:
		<div id='archivos$fila[0]'>";
			$strQuery1 = "SELECT id,nombrearchivo,tipo from archivos_correos where id_correo='$fila[0]';";
			$query1 = mysql_query( $strQuery1, $db_resource ); 
		while ($fila1 = mysql_fetch_array($query1)) 
		{
			echo "<a style='cursor:pointer;' onclick='window.open(\"./gestion/descargararchivoscorreo.php?id=$fila1[0],_blank\")'	>Nombre: $fila1[1] Tipo: $fila1[2]</a><br>";
		}
		echo "</div>";
	}
	echo "</div>";
}

?>
<style>
.tablacorreo{
margin-bottom:0px;	
}
</style>
