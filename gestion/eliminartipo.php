<script type="text/javascript" src="./js/filtros.js"></script>

<div class="container" style='width:80%;'>
	<div id='envio'>
		<center>
			<h1>ELIMINAR TIPO DE USUARIO</h1>
			  <form method="post" action="./gestion/ediciontipo.php">
			  <input type='hidden' name='opcion' id='opcion' value='eliminar'/>
				<table>
					<tr>
						<td >tipos de usuario : </td><td>
							<select name='nombreUsuario' id='nombreUsuario'>
							<option selected='selected'>-- Seleccione Tipo --</option>
							<?php
								include_once("../ini_base_datos.php");
								$consulta = mysql_query("SELECT nombre_tipo FROM tipo_usuarios WHERE id NOT IN (1,2)");
								while($fila = mysql_fetch_array($consulta))
									echo "<option>$fila[0]</option>";
							?>
							</select>
						</td>
					</tr>
				</table>
				<div style='text-align: center;'>
					<input type="submit" value="Eliminar" name='eliminar' id="btnEnviar"/>
					<input type="reset" value="Restablecer" />
					<input type="button" value="Ir a pagina principal" onclick="volver();"/>
				</div>
				</form>
			</br>
			</br>
		</center>
	</div>
 </div>
