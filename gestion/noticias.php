<div id="containter">
	<?php
			$iduser = $_COOKIE['id'];
			include_once("./seguridad.php");
			include_once("../ini_base_datos.php");
			
			$strPermisos = "SELECT U.tipo_usuario FROM tipo_usuarios TP, usuarios U WHERE U.tipo_usuario=TP.id AND U.id=$iduser";
			$queryPermisos = mysql_query($strPermisos,$db_resource);
			$fila = mysql_fetch_array($queryPermisos);
			
			if($fila[0]==1)
			{
				$strQuery = "SELECT id, nombre_proyecto FROM proyectos WHERE fecha_fin_real = '0000-00-00'";
			}
			else
			{
				$strQuery = "SELECT id, nombre_proyecto FROM proyectos WHERE id_cliente=$iduser AND fecha_fin_real = '0000-00-00'";
			}
			
			$query = mysql_query($strQuery, $db_resource);
			echo "<select id='selectNoticia' onchange='cargaNoticias(this,\"mostrar\");' >";
			echo "<option value=0 name=0>--Elige un proyecto--</option>";
			while($fila = mysql_fetch_array($query))
			{
				echo "<option value='$fila[0]' name=$fila[0] >$fila[1]</option>";
			}
			echo "</select>";
			
			mysql_close($db_resource);
		?>
	<div id="noticiero" class='noticiero' style="width:50%; padding: 0 0 0 10px; text-align:left; word-wrap: break-word">
	</div>
</div>
