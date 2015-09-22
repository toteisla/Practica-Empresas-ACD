<link rel="shortcut icon" href="images/demo/logo.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/estiloproyecto.css" />
<?PHP
/*
 *Formulario para la creacion de nuevos proyectos 
 */
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
?>
<div id='divfondo'>
	<div id='divusu'>
		<p color='#605B5B'>ASIGNAR USUARIO</p>
		<select id="selectusu" size='5' style='width:95%;height:45%;float:center;background-color:white;'>
<?PHP
$strQuery1 = "SELECT id,nombre from usuarios where tipo_usuario!=(SELECT id from tipo_usuarios where nombre_tipo='cliente');";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
echo "<option value='$fila[0]'>$fila[1]</option>";
}
/*Div oculto que se mostrara cuando se quiera añadir un area al subproyecto
 Este select muestra los usuarios que no son clientes  */
mysql_free_result($query1);
?>
		</select><br>
		<input type='text' id='entry' name="entry" style='width:95%;' onKeyUp="javascript:obj1.bldUpdate();"> 
		<table style='heigth:50px;'>
			<tr>
				<td>Fecha Inicio</td>
				<td><input type='text' id='fechaisub2' name='fechaisub1' style='width:60px;' onblur='compruebacampos(this)' onkeyup='mascara(this,"/",patron3,true)' id='fechainicio' /></td>
			</tr>
			<tr>
				<td>Fecha Fin</td>
				<td><input type='text' id='fechafsub2' name='fechafsub2' style='width:60px;' onblur='compruebacampos(this)' onkeyup='mascara(this,"/",patron3,true)' id='fechafin' /></td>
			</tr>
		</table>
		<input type='button' onclick='oculdiv()' value='Asignar'><input type='button' onclick='cancel(<?echo $_COOKIE["NSUB"] +1?>)' value='Cancelar'>
	</div>
</div>
		<div id='envio'>
			<center>
				<h1>CREAR PROYECTO</h1>
				<form id='formproyecto'>
			<table style='border:0;'>
				<tr>
					<td style='border:0;'>
					<table style='border:0;width:100%;'>
						<tr>
							<td>Nombre de Proyecto : </td>
							<td>
							<input type="text" name="proyecto" onblur="compruebacampos(this)" onkeypress="" id="nombreproyecto" /><div id='errornombre'></div>
							</td>
						</tr>
						<tr>
							<td>Fecha inicio estimada: </td>
							<td>
							<input type="text" name="fecha" onblur="compruebacampos(this)" onkeyup='mascara(this,"/",patron3,true)' id="fecha" /><div id='errorfecha'></div>
							</td>
						</tr>
						<tr>
							<td>Fecha fin estimada: </td>
							<td>
							<input type="text" name="fecha1" onblur="compruebacampos(this)" onkeyup='mascara(this,"/",patron3,true)' id="fecha1" /><div id='errorfecha1'></div>
							</td>
						</tr>
						<tr>
							<td>Asignación de Cliente :</td>
							 <td><div align="left"><span class="textohome"><font size="2"> <font size="2">
							  <select name="tipo" class="style32" onchange='compruebacampos(this)' id="selectcli">
								<option value="" selected style='display:none;'>Asigna Cliente</option>
								<?PHP
									$strQuery1 = "SELECT id,nombre from usuarios where tipo_usuario=(SELECT id from tipo_usuarios where nombre_tipo='cliente');";
									$query1 = mysql_query( $strQuery1, $db_resource ); 
									while ($fila = mysql_fetch_array($query1)) {
									echo "<option value='$fila[0]'>$fila[1]</option>";			
									}
								?>
							  </select><div id='errorcliente'></div>
						  </font> </font></span></div></td>
						</tr>
							<tr>
							<td>Asignación de Jefe :</td>
							 <td><div align="left"><span class="textohome"><font size="2"> <font size="2">
							  <select name="tipo" class="style32" onchange='compruebacampos(this)' id="selectjefe">
								<option value="" selected style='display:none;'>Asigna Jefe</option>
								<?PHP
									$strQuery1 = "SELECT id,nombre from usuarios where tipo_usuario!=(SELECT id from tipo_usuarios where nombre_tipo='cliente');";
									$query1 = mysql_query( $strQuery1, $db_resource ); 
									while ($fila = mysql_fetch_array($query1)) {
									echo "<option value='$fila[0]'>$fila[1]</option>";			
									}
								?>
							  </select><div id='errorjefe'></div>
						  </font> </font></span></div></td>
						</tr>
					</table>
				</td>
				<td rowspan='6' style='border:0;'>
							<div id='resultareas'>
								<table style='border:0;'>
										<tr id='nuevosub' style='border:0;'>
											<td style='text-align:center;border:0;'><a id='nuevopro' name='n<?echo $_COOKIE["NSUB"]+1?>' onclick='asignarsub(<?echo $_COOKIE["NSUB"]+1?>)' style='text-shadow:1px 1px 0px rgba(230,230,230,1), 2px 2px 0px rgba(200,200,200,1),  3px 3px 0px rgba(180,180,180,1),  4px 4px 0px rgba(160,160,160,1);5px 5px 0px rgba(0,0,0,1), 8px 8px 20px rgba(0,0,0,0.5);font-size:medium;color:black;cursor:pointer;'>Añadir Subproyecto</a></td>
											<td style='text-align:center;border:0;'><a id='creasub' name='crea' onclick='creasub()'style='text-shadow:1px 1px 0px rgba(230,230,230,1), 2px 2px 0px rgba(200,200,200,1),  3px 3px 0px rgba(180,180,180,1),  4px 4px 0px rgba(160,160,160,1);5px 5px 0px rgba(0,0,0,1), 8px 8px 20px rgba(0,0,0,0.5);font-size:medium;color:black;cursor:pointer;'>Crear Subproyecto</a></td>
										</tr>
								</table>
							</div>
							<div id='errores'></div>
						</td>
			</tr>
		</table>
				</br>
				</br>
			</center>
			<div style='text-align: center;'>
				<input type="button" value="Crear" onclick="crearproyecto()" id="btnSend" style='height:50px;width:100px;'/>
            </div>
            <div id='aa' style='width:300px;heigth:300px;'></div>
            </form>
		</div>
    <br class="clear" />
  </div>
</div>

