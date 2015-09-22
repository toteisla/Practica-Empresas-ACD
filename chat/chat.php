<?php
	$nombre = $_COOKIE['nombre'];
	$id = $_COOKIE['id'];
	include_once("../ini_base_datos.php");
	$consulta = mysql_query("SELECT u.nombre nom, u.id receptor FROM usuarios u, tipo_usuarios t WHERE u.tipo_usuario = t.id AND t.p_chat = 1 AND u.nick != '$nombre' AND bolLogged = 1");
	echo "<select id='seleccion' size='2' style='width:200px; float:right;'>";
	if(mysql_num_rows($consulta)!= 0)
	{
		
		while($fila=mysql_fetch_array($consulta))
		{
			echo utf8_encode("<option onclick='muestrachat(this)' id='".$fila['receptor']."' value='".$fila['nom']."'> - ".$fila['nom']."</option>");
		}
	}
	else
	{
		echo "<option value='vacio'>No hay usuarios conectados</option>";
	}
	echo "</select>";
	mysql_free_result($consulta);
	mysql_close($db_resource);
?>



