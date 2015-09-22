	<?php
			include_once("../ini_base_datos.php");
			$consulta = mysql_query("SELECT * FROM infocorp ORDER BY id desc");
			while($fila = mysql_fetch_array($consulta))
			{
				echo "<div id='$fila[0]' style='text-align:left; margin: 15px 15px 15px 15px; border : 1px solid #000000; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; word-wrap:break-word; text-align:left; padding:15px 15px 15px 15px;'>
					<label style='color:#000000;'>$fila[1] </label></br>
					<label style='color:#000000;'>Fecha -> $fila[3] :</label></br></br>
					<p style='color:#000000;'>$fila[2]</p></br>
					<label style='color:#000000;'>----------------------------------------------------------</label>
					<input type='button' id='".$fila[0]."----not' value='x' onclick='edicion(this.id);'/>
				</div>";
			}
		?>
