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
			<h1>ELIMINAR USUARIO</h1>
				<form method="POST" action="./gestion/borrarUsuarios.php">
					<table>
						<tr>
							<td>
								<center>
									Seleccione Usuario :
									<select name="selectUsers" id="selectUsers">
										<option disabled='disabled'>--Usuarios--</option>
										<?php
											include_once("../ini_base_datos.php");
											$strQuery = "SELECT nick FROM usuarios WHERE nick != 'admin'";
											$query = mysql_query($strQuery, $db_resource);
											while($filas = mysql_fetch_array($query, MYSQL_ASSOC)){
												foreach($filas as $i){
													echo "<option name='$i' id='$i'>$i</option>";
												}
											}
										?>
									</select>
								</center>
							</td>
						</tr>
					</table>
					<div style='text-align: center;'>
						<input type="submit" value="Borrar" id="btnDelete" />
						<input type="reset" value="Restablecer" />
						<input type="button" value="Ir a pagina principal" onclick="volver();"/>
					</div>
				</form>
			</br>
			</br>
		</center>
	</div>
 </div>
