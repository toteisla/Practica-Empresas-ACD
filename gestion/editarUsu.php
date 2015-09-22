<?php
include_once("./seguridad.php");
?>
<link rel="shortcut icon" href="images/demo/logo.ico" type="image/x-icon" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script type="text/javascript" src="./js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript" src="./js/sha1.js"></script>
<script type="text/javascript"></script>
<div class="container" style='width:80%;'>
	<div id='envio'>
		<center>
			<h1>EDITAR USUARIO</h1>
			<form method="post" action="./gestion/editaUsuario.php">
				<table>
					<tr>
						<td>
							<center>
								<input type="text" hidden="hidden" style="display:none;" name="id" id="id">
								Seleccione Usuario :
								<select name="selectUsers" id="selectUsers" onchange="traerDatos();">
									<option selected="selected" disabled='disabled'>--Usuarios--</option>
									<?php
										include_once("../ini_base_datos.php");
										$strQuery = "SELECT nick FROM usuarios";
										$query = mysql_query($strQuery, $db_resource);
										while($filas = mysql_fetch_array($query, MYSQL_ASSOC)){
											foreach($filas as $i){
												echo "<option name='$i' value='$i' id='$i'>$i</option>";
											}
										}
									?>
								</select>
							</center>
						</td>
					</tr>
				</table>
				<table >
					<tr>
						<td>Nombre de usuario : </td>
						<td>
						<input type="text" name="nombreUsuario" onblur="compruebaNombre();" onkeypress="return filtros(this, event);" id="nombreUsuario" />
						</td>
						<td id="statusNombre"></td>
					</tr>
					<tr>
						<td>DNI : </td>
						<td>
						<input type="text" name="DNI" onblur="compruebaDNI();" onkeypress="return filtros(this, event);" id="DNI" />
						</td>
						<td id="statusDNI"></td>
					</tr>
					<tr>
						<td>Nick : </td>
						<td>
						<input type="nick" name="nick" onkeyup="compruebaEdicionNick();" onblur="compruebaNick();" onkeypress="return filtros(this, event);" id="nick" />
						</td>
						<td id="statusNick"></td>
					</tr>
					<tr>
						<td>Escoge tipo de Cuenta : </td>
						   <td>
							  <div align="left">
								<span class="textohome">
									<font size="2">
										<select name="select3" onblur="compruebaSelect();" class="style32" id="select3">
											<option value="0" selected>Escoge Tipo de cuenta</option>
											<?php
												include_once( "../ini_base_datos.php" );
												$strQuery = "SELECT id,nombre_tipo FROM tipo_usuarios";
												$query = mysql_query($strQuery,$db_resource);
												while($fila = mysql_fetch_array($query))
												{
													echo "<option value='$fila[0]' >$fila[1]</option>";
												}
											?>
										</select>
									</font>
								</span>
							</div>
						</td>
						<td id="statusSelect"></td>
					</tr>
					<tr>
						<td>Dirección : </td>
						<td>
						<input type="text" name="direccion" onblur="compruebaDireccion();" onkeypress="return filtros(this, event);" id="direccion" />
						</td>
						<td id="statusDireccion"></td>
					</tr>
					<tr>
						<td>e-mail : </td>
						<td>
						<input type="text" name="email" onblur="compruebaEmail();" onkeypress="return filtros(this, event);" id="email" />
						</td>
						<td id="statusEmail"></td>
					</tr>
					<tr>
						<td>Teléfono : </td>
						<td>
						<input type="text" name="telefono" onblur="compruebaTelefono();" onkeyup="mascara(this,'-',patron,true);" onkeypress="return filtros(this, event);" id="telefono" />
						</td>
						<td id="statusTelefono"></td>
					</tr>
					<tr>
						<td>Teléfono móvil(*) : </td>
						<td>
						<input type="text" name="telefonomvl" onblur="compruebaTelefonomvl();" onkeyup="mascara(this,'-',patron,true);" onkeypress="return filtros(this, event);" id="telefonomvl" />
						</td>
						<td id="statusTelefonomvl"></td>
					</tr>
					<tr>
						<td>Contraseña : </td>
						<td>
						<input type="text" name="pass" id="pass" onblur="compruebaPass();">
						</td>
						<td id="statusPass"></td>
					</tr>
					<tr>
						<td>Confirme contraseña : </td>
						<td>
						<input type="password" name="pass" onblur='compruebaPass1();' id="pass1">
						</td>
						<td id="statusPass1"></td>
					</tr>
					<tr>
						<td style='color:red; size:2px'>(*)Este campo no es obligatorio.</td>
						<td></td>
						<td></td>
					</tr>
				</table>
				<div style='text-align: center;'>
					<input type="text" style="display:none;" name="opt" id="opt" value="E" size="1">
					<input type="submit" style="display: none;" value="Crear" id="btnSend" />
					<input type="button" value="Editar" onclick="cifrar()" id="btnEnviar" />
					<input type="reset" value="Restablecer" />
					<input type="button" value="Ir a pagina principal" onclick="volver();"/>
				</div>
			</form>
			</br>
			</br>
		</center>
	</div>
 </div>
