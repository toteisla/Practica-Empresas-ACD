<center>
	<div id='creanorform' style='margin:20px 0 0 20px;'>
	<iframe id="iframe" style="display:none">
	</iframe>
		<form target="iframe" action="./gestion/crear_corp.php" id="formulario1" enctype="multipart/form-data" method="POST">
			<table>
				<tr>
					<td>Nombre noticia : </td>
					<td><input type='text' onkeypress='return filtros(this,event)' id='nomnot' name='nomnot' /></td>
				</tr>
				<tr>
					<td>Cuerpo de la noticia : </td>
					<td><textarea id='cuerpnot' onkeypress='return filtros(this,event)' name='cuerpnot' style='width:350px; height:70px'></textarea></td>
				</tr>
				<tr>
					<td><input type='button' onclick='comprobaciones(this.id)' value='Subir Noticia' id='btnsendnot' /></td>
					<td><input type='hidden' style='display:none' value='not' id='opcion' name='opcion' /></td>
				</tr>
			</table>
			<input type='submit' style='display:none' id='btnenvionot' />
		</form>
		<iframe id="iframe2" style="display:none">
		</iframe>
		<form target="iframe2" action="./gestion/crear_corp.php" id="formulario2" enctype="multipart/form-data" method="POST">
			<table>
				<tr>
					<td>archivo : </td>
					<td><input type='file' id='adj' name='archivo' /></td>
				</tr>
				<tr>
					<td><input type='button' onclick='comprobaciones(this.id)' value='Subir Archivo' id='btnsendarc' /></td>
					<td><input type='hidden' style='display:none' value='arc' id='opcion' name='opcion' /></td>
				</tr>
			</table>
			<input type='submit' style='display:none' id='btnenvioarc' />
		</form>
	</div>
</center>
<div><button onclick='muestraventana(ultnoticias);'>Eliminar noticias</button><button onclick='muestraventana(ultadjuntos);'>Eliminar Archivos</button></div>
<div id='ultnoticias' style='display:none; overflow:auto; text-align:center; width:80%; height:200px; margin:25px 0 0 25px; border : 2px solid #005577; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;'>
	<div id='cuadrotextnot'>
		<?php
			include_once("../ini_base_datos.php");
			$consulta = mysql_query("SELECT * FROM infocorp ORDER BY id desc");
			while($fila = mysql_fetch_array($consulta))
			{
				echo "<div id='$fila[0]' style='text-align:left; margin: 15px 15px 15px 15px; border : 1px solid #000000; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; word-wrap:break-word; text-align:left; padding:15px 15px 15px 15px;'>
					<label style='color:#000000;'>Nombre -> $fila[1] </label></br>
					<label style='color:#000000;'>Fecha -> $fila[3] :</label></br></br>
					<p style='color:#000000;'>$fila[2]</p></br>
					<input type='button' id='".$fila[0]."----not' value='x' onclick='edicion(this.id);'/>
				</div>";
			}
		?>
	</div>
</div>

<div id='ultadjuntos' style='display:none; width:80%; overflow:auto; height:200px; margin:25px 25px 0 0; border:2px solid #005577; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;' >
	<div id='cuadrotextarc'>
		<?php
			include_once("../ini_base_datos.php");
			$consulta = mysql_query("SELECT * FROM adjuntos_corporativos ORDER BY id desc");
			while($fila = mysql_fetch_array($consulta))
			{
				echo "<div id='$fila[0]' style='text-align:left; margin: 15px 15px 15px 15px; border : 1px solid #000000; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; word-wrap:break-word; text-align:left; padding:15px 15px 0 15px;'>
					<label style='color:#000000;'>Fecha -> $fila[3] :</label></br>
					<label style='color:#000000;'>$fila[1]</label></br>
					<input type='button' id='".$fila[0]."----adj' value='x' onclick='edicion(this.id);'/>
				</div>";
			}
		?>
	</div>
</div>

