<div><h1>Ultimas noticias corporaitvas.</h1></div>
<div id='ultnoticias' style='overflow:auto; width:80%; height:200px; margin:25px 0 0 25px; border : 2px solid #005577; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;'>
	<div id='cuadrotextnot'>
		<?php
			include_once("../ini_base_datos.php");
			$consulta = mysql_query("SELECT * FROM infocorp ORDER BY id desc");
			while($fila = mysql_fetch_array($consulta))
			{
				echo "<div id='$fila[0]' style='text-align:left; margin: 15px 15px 15px 15px; border : 1px solid #000000; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; word-wrap:break-word; text-align:left; padding:15px 15px 15px 15px;'>
					<div style='padding:15px 15px 15px 15px;'>
					<label style='color:#000000;'>Nombre -> $fila[1] </label></br>
					<label style='color:#000000;'>Fecha -> $fila[3] :</label></br></br>
					<p style='color:#000000;'>$fila[2]</p></br>
					</div>
				</div>";
			}
		?>
	</div>
</div>

<div style='margin:25px 0 0 0;' ><h1>Ultimos Archivos adjuntados.</h1></div>
<div id='ultadjuntos' style='overflow:auto; width:80%; height:100px; margin:25px 25px 0 0; border : 2px solid #005577; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;' >
	<div id='cuadrotextarc'>
			<?php
			include_once("../ini_base_datos.php");
			$consulta = mysql_query("SELECT * FROM adjuntos_corporativos ORDER BY id desc");
			while($fila = mysql_fetch_array($consulta))
			{
				echo "<div id='$fila[0]' style='text-align:left; margin: 15px 15px 15px 15px; border : 1px solid #000000; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; word-wrap:break-word; text-align:left; padding:15px 15px 0 15px;'>
					<label style='color:#000000;'>Fecha -> $fila[3] :</label></br>
					<label onclick='window.open(\"./gestion/archivos_corporativos.php?id=$fila[0],_blank\")' style='cursor:pointer; color:#f90;'>$fila[1]</label></br>
				</div>";
			}
		?>
	</div>
</div>
