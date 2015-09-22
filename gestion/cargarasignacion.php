<?PHP
/*
 *Este script rellena el div creado previamente por javascript.
 *Div de un nuevo subproyecto.
 */
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
$nsub=$_COOKIE["NSUB"]+1;
setcookie("NSUB", $nsub);
$x=$_GET["x"];
if($x!=$nsub)
echo"<table id='$x' name='tablasub'>";
else
echo"<table id='$x' name='tablasubnuevos'>";

echo"
<tr>
	<td>Subproyecto</td>
	<td>Jefe Subproyecto</td>
	<td>Areas</td>
</tr>
<tr>
<td style='width:100px;border:0;'>
<select size='1' style='width:100px;' onchange='elimsubpro($nsub);compruebacampos(this);' name='selsubpro' id='select$nsub'>";
echo "<option value='0' onchange='' onclick=''>Seleccione un subproyecto</option>";
$strQuery1 = "SELECT id,nombre from subproyecto;";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
echo "<option value='$fila[0]' onchange='' onclick=''>$fila[1]</option>";			
}
echo "</select>
Fecha Inicio<input type='text' id='fechaisub$nsub' name='fechaisub' style='width:100px;' onblur='compruebacampos(this)' onkeyup='mascara(this,\"/\",patron3,true)' id='fechai$nsub' />
Fecha Fin<input type='text' id='fechafsub$nsub' name='fechafsub' style='width:100px;' onblur='compruebacampos(this)' onkeyup='mascara(this,\"/\",patron3,true)' id='fechaf$nsub' />
</td>";
echo"<td style='width:100px;'><select style='width:100px;' onchange='compruebacampos(this)' id='selecty$nsub' name='selecty'>";
$strQuery1 = "SELECT id,nombre from usuarios where tipo_usuario!=(SELECT id from tipo_usuarios where nombre_tipo='cliente');";
$query1 = mysql_query( $strQuery1, $db_resource );
if(mysql_num_rows($query1)>0)
$_COOKIE["NSUB"]+=1;
while ($fila = mysql_fetch_array($query1)) {
echo "<option value='$fila[0]' onclick=''>$fila[1]</option>";			
}
echo"
</td><td>
</select><img id='borrar$nsub' name='borrarsub' src='./images/delete.png' onclick='eliminarsub($nsub);compruebacampos(this);' style='float:right;'>";
?>
<select multiple='multiple' name="tipo" style='background-color:white;' size='5' onchange="ctrMays('<?echo $nsub?>')" id="select3<?echo $nsub?>">
<?PHP
$strQuery1 = "SELECT id,nombre from areas;";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
echo "<option value='$fila[0]' onclick='asignarusuario(this,$nsub)'>$fila[1]</option>";			
}
echo "<br><input type='button' value='Crear' onclick='creaarea()'>";
?>
<option id='nada' value='0' style='visibility:hidden;' selected disabled></option>
</select><div id='resultareas<?echo $nsub?>' style='overflow:auto;height:75px;width:200px;float:left;'></div>
</td></tr>
</table>
<?PHP
echo "|".$nsub;
?>
