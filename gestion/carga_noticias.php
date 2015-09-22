<?php
	include_once("./seguridad.php");
	include_once("../ini_base_datos.php");
	$id_proyecto = $_GET['id_proyecto'];
	$tipo = $_GET['tipo'];
	
	if($tipo == "mostrar")
	{
		$strQuery = "
		SELECT P.nombre_proyecto, N.fecha, N.texto,N.titulo FROM notificaciones N, proyectos P
		WHERE N.id_proyecto = P.id AND P.fecha_fin_real = '0000-00-00' AND P.id=$id_proyecto";
		
		$query = mysql_query($strQuery, $db_resource);
		while($fila = mysql_fetch_array($query))
		{
			$fecha_s= explode(" ",$fila[1]);
			$fecha_array = explode("-",$fecha_s[0]);
			$fecha_ordenada = $fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]." ".$fecha_s[1];
			echo "<br><div class='divnoticia' style='border:1px solid; padding: 15px 15px 15px 15px;>";
			echo "<label style='width:100%' >Titulo: $fila[3]</label><br>";
			echo "<label style='width:100%' >Proyecto: $fila[0]</label><br>";
			echo "<label style='width:100%' >Fecha: $fecha_ordenada</label></br>";
			echo "<label style='width:100%' >Mensaje: $fila[2]</label></br>";
			echo "</div>";
		}
	}
	else
	{
		$strQuery = "SELECT N.id, titulo,fecha,texto FROM notificaciones N, proyectos P WHERE N.id_proyecto=P.id AND N.id_proyecto=$id_proyecto";
		$query = mysql_query($strQuery, $db_resource);
		echo "<select id='selectNoticias' onchange='cargaEditNoticia(this)'>";
		echo "<option value=0>--Elige noticia--</option>";
		while($fila = mysql_fetch_array($query))
		{
			$fecha_s= explode(" ",$fila[2]);
			$fecha_array = explode("-",$fecha_s[0]);
			$fecha_ordenada = $fecha_array[2]."-".$fecha_array[1]."-".$fecha_array[0]." ".$fecha_s[1];
			echo "<option value='$fila[0]%&$$fila[3]%&$$fila[1]' id=$fila[0]>$fila[1]&nbsp;&nbsp;&nbsp;--&nbsp;&nbsp;&nbsp;$fecha_ordenada</option>";
		}
		echo "</select>";
	}
?>
