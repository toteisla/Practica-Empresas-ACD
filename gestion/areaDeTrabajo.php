<?php
include_once("./seguridad.php");
?>
<div style='text-align:center; padding : 0 0 0 25px;'>
	<table>
		<tr style="border:0px;">
			<td style="border:0px;">
				<div id='seleccion_proyecto'>
					<select id='lista_proyectos' onchange="cargaSubproyecto(this); vaciaDiv('proyecto'); cargaFechas(this.value,'proyecto');">
						<option value='0' >-Selecciona un proyecto-</option>
						<?PHP
							$id = $_COOKIE['id'];
							include_once( "../ini_base_datos.php" );
							$strQuery = 
							
							"SELECT DISTINCT P.id,P.nombre_proyecto 
							FROM proyectos P, proy_subproy PS, area_proy_subproy APS 
							WHERE P.id=PS.id_proyecto 
							AND PS.id=APS.id_proy_subproy 
							AND (PS.id_jefe=$id OR APS.id_usuario=$id OR P.id_jefe=$id);";
							
							$query = mysql_query( $strQuery, $db_resource ); 
							while ($fila = mysql_fetch_array($query))
							{
								echo "<option value='$fila[0]'>$fila[1]</option>";
							}
							mysql_free_result($query);
						?>
					</select>	
				</div>
			</td>
			<td style="border:0px;">
				<div id='seleccion_subproyecto'>
					<select id='lista_subproyecto'>
						<option value='0'>-Selecciona un subproyecto-</option>
					</select>
				</div>
			</td>
			<td style="border:0px;">
				<div id='seleccion_area'>
					<select id='lista_area'>
						<option value='0'>-Selecciona un area-</option>
					</select>
				</div>
			</td>
		</tr>
	</table>
	<div id="contenedor_botones">
		<div id="botones_fases" style="display:none; height:100%;">
			<a style="cursor:pointer" id="Requisitos"  class='botones' onclick="cargarArchivos(this.id)">Requisitos</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a style="cursor:pointer" id="Analisis"  class='botones'  onclick="cargarArchivos(this.id)">Análisis</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a style="cursor:pointer" id="Desarrollo"  class='botones' onclick="cargarArchivos(this.id)">Desarrollo</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a style="cursor:pointer" id="Implantacion"  class='botones' onclick="cargarArchivos(this.id)">Implantación</a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<a style="cursor:pointer" id="Seguimiento"  class='botones' onclick="cargarArchivos(this.id)">Seguimiento</a>
		</div>
	</div>
	<div id="all_dates">
		<table>
			<tr style="border:1px solid #CCC" >
				<td>
					Fechas Estimadas Proyecto
				</td>
				<td id="fiptd" >
					Fecha Inicio:
				</td>
				<td id="ffptd" >
					Fecha Fin:
				</td>
			</tr>
			<tr style="border:1px solid #CCC" >
				<td>
					Fechas Estimadas Subproyecto
				</td>
				<td id="fisbtd" >
					Fecha Inicio:
				</td>
				<td id="ffsbtd" >
					Fecha Fin:
				</td>
			</tr>
			<tr style="border:1px solid #CCC" >
				<td>
					Fechas Estimadas Area
				</td>
				<td id="fiatd" >
					Fecha Inicio:
				</td>
				<td id="ffatd" >
					Fecha Fin:
				</td>
			</tr>
			<tr style="border:1px solid #CCC" >
				<td>
					Fechas Estimadas Fase
				</td>
				<td id="fiftd" >
					Fecha Inicio:
				</td>
				<td id="ffftd" >
					Fecha Fin:
				</td>
			</tr>
			<tr>
				<td>
					Comenzar Fase: <input type="button" value="Empezar" id="start" onclick="empezarCerrarFase(this);" disabled="disabled" />
				</td>
				<td>
					<input type="text" id="fie" onkeyup="mascara(this,'/',patron3,true);" disabled="disabled" />
					<input type="button" value="Guardar" id="botonfie" onclick="guardarFecha(fie);" disabled="disabled" />
				</td>
				<td>
					<input type="text" id="ffe" onkeyup="mascara(this,'/',patron3,true);" disabled="disabled" />
					<input type="button" value="Guardar" id="botonffe" onclick="guardarFecha(ffe);"disabled="disabled" />
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<div style='width:720px;'>	
						<div>
							<center><h1>Archivos</h1></center>
						</div>
						<div  id="all_phases" >
						
						</div>
						<div id="boton_añadir_cerrar" style="float:right">
							<iframe id="iframeD" name='iframeD' style="display:none">
							</iframe>
							<form style="visibility:hidden; padding-top:10px;" target="iframeD" action="./gestion/subir_archivos_area.php" id="formulario" enctype="multipart/form-data" method="POST">
								<small style='color:red;'>MAXIMO:20MB</small>
								<input type="file" multiple name="archivo[]" id="archivo" value="Añadir Archivo" onchange="activaEnvio();" /> 
								<input type="submit" id="add" name="botonArchivo" />
								<input type="button" value="Cerrar" disabled="disabled" id="close" onclick="empezarCerrarFase(this)" >
								<input type="hidden" id="hidden_nombre" name="hidden_nombre" value="" />
								<input type="hidden" id="hidden_proy_subproy" name="hidden_proy_subproy" value="" />
							</form>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td>
					<h1>Notificaciones</h1>
				</td>
				<td>
					Titulo: <input type="text" id="tituloNotificacion" onblur="compruebaTitulo(this.value)" disabled="disabled" maxlength="50" style='width:60%' /><br>
					Mensaje: <textarea id="textoNotificacion" cols="50" rows="3" style='max-width:400px; max-height:100px;' disabled="disabled" ></textarea>
					<input type="button" value="Enviar" id="btnSend" onclick="enviaNotificacion();" disabled="disabled" />
				</td>
				<td id="statusTitulo">
				</td>
			</tr>
		</table>
	</div>
</div>
