<div class="container" style='width:80%;'>
	<div id='envio'>
		<center>
			<h1>EDITAR TIPO DE USUARIO</h1>
			  <form method="post" action="./gestion/ediciontipo.php">
				<input type='hidden' name='opcion' id='opcion' value='editar'/>
				<table>
					<tr>
						<td >tipos de usuario : </td><td>
							<select name='nombreUsuario' id='nombreUsuario' onchange='datostipo(this.value);'>
							<option selected='selected'>-- Seleccione Tipo --</option>
							<?php
							
								include_once("../ini_base_datos.php");
								$consulta = mysql_query("SELECT nombre_tipo FROM tipo_usuarios WHERE id != 1");
								while($fila = mysql_fetch_array($consulta))
								{
									$nomb = $fila[0];
									echo "<option>$nomb</option>";
								}					
							?>
							</select>
						</td>
					</tr>
					<tr>
						<td >Permisos de creación/edición de usuarios : </td><td> 
						<input type="checkbox" id="usuariostipo" name="usuariostipo"/>
						<input type="hidden" name='usuariostipoocul' id="usuariostipoocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de creación/edición de proyectos : </td><td>
						<input type="checkbox" id="proyectos" name="proyectos"/>
						<input type="hidden" name='proyectosocul' id="proyectosocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de correo interno : </td><td>
						<input type="checkbox" id="correo" name="correo"/>
						<input type="hidden" name='correoocul' id="correoocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de chat : </td><td>
						<input type="checkbox" id="pchat" name="pchat"/>
						<input type="hidden" name='pchatocul' id="pchatocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de lectura de noticias : </td><td>
						<input type="checkbox" id="noticias" name="noticias"/>
						<input type="hidden" name='noticiasocul' id="noticiasocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de Gestión/Edición de noticias : </td><td>
						<input type="checkbox" id="gesnoticias" name="gesnoticias"/>
						<input type="hidden" name='gesnoticiasocul' id="gesnoticiasocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de información corporativa : </td><td>
						<input type="checkbox" id="infocorp" name="infocorp"/>
						<input type="hidden" name='infocorpocul' id="infocorpocul" value='0'/>
						</td>
					</tr>
					<tr>
						<td >Permisos de edición información corporativa : </td><td>
						<input type="checkbox" id="ediinfocorp" name="ediinfocorp"/>
						<input type="hidden" name='ediinfocorpocul' id="ediinfocorpocul" value='0'/>
						</td>
					</tr>
				</table>
				<div style='text-align: center;'>
					<input type="button" value="Editar" name='editar' id="btnEnviar" onclick="compruebatipo();"/>
					<input type="submit" style='display:none;' id="btnsend"/>
					<input type="reset" value="Restablecer" />
					<input type="button" value="Ir a pagina principal" onclick="volver();"/>
				</div>
				</form>
			</br>
			</br>
		</center>
	</div>
 </div>
