<?php
include_once("./seguridad.php");
$id = $_COOKIE['id'];
include_once( "./ini_base_datos.php" );
$permisos='';
$strQuery1 = "SELECT p_usuarios,p_proyectos,p_chat,p_buzon,p_lnoticias,p_enoticias,p_infocorp,p_editinfocorp from tipo_usuarios WHERE id=(SELECT tipo_usuario from usuarios where id='$id');";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
$permisos[0]=$fila[0];
$permisos[1]=$fila[1];
$permisos[2]=$fila[2];
$permisos[3]=$fila[3];
$permisos[4]=$fila[4];
$permisos[5]=$fila[5];
$permisos[6]=$fila[6];
$permisos[7]=$fila[7];
}
echo"
<ul>
";
if($permisos[0]=='1'){
	echo"<li><a id='usuarios' href='#'>USUARIOS/CLIENTES</a>
	<ul>
	<li><a href='#' id='crearUsu.php' onclick='opcion(this.id);comprueba_actividad();'>Crear usuario</a></li>
	<li><a href='#' id='editarUsu.php' onclick='opcion(this.id);comprueba_actividad();'>Editar Usuarios</a></li>
	<li><a href='#' id='eliminarUsu.php' onclick='opcion(this.id);comprueba_actividad();'>Eliminar Usuarios</a></li>
	<li><a href='#' id='creartipo.php' onclick='opcion(this.id);comprueba_actividad();'>Crear Permisos</a></li>
	<li><a href='#' id='editartipo.php' onclick='opcion(this.id);comprueba_actividad();'>Editar Permisos</a></li>
	<li><a href='#' id='eliminartipo.php' onclick='opcion(this.id);comprueba_actividad();'>Eliminar Permisos</a></li>
  </ul>
</li>";
}
if($permisos[1]=='1'){
echo "<li><a href='#'>PROYECTOS</a>
	<ul>
	<li><a href='#' id='crearProyecto.php' onclick='opcion(this.id);comprueba_actividad();'>Crear Proyecto</a></li>
	<li><a href='#' id='modificaProyecto.php' onclick='opcion(this.id);comprueba_actividad();'>Editar Proyecto</a></li>
  </ul>
</li>";
}
if($permisos[3]=='1'){
echo "
<li><a href='#' id='buzon.php' onclick='opcion(this.id);comprueba_actividad();accion(\"Recibidos\")' >CORREO<div id='numerosinleer' style='padding-left:2px;color:white; font-weight: bold;float:right;'></div></a></li>
";
}
echo "
<li><a href='#' id='noticias.php' onclick='opcion(this.id);comprueba_actividad();' >NOTICIAS</a>
  <ul>";
  if($permisos[4]=='1'){
	echo "
	<li><a href='#' id='noticias.php' onclick='opcion(this.id);comprueba_actividad();'>Noticiero</a></li>";
	}
	if($permisos[5]=='1'){
echo "<li><a href='#' id='editarnoticias.php' onclick='opcion(this.id);comprueba_actividad();'>Editar Noticiero</a></li>";
	}
  echo "</ul>
</li>
";
if($permisos[6]=='1'){
echo "
<li><a href='#'>AREA DE TRABAJO</a>
	<ul>
	<li><a href='#' id='infocorp.php' onclick='opcion(this.id);comprueba_actividad();'>Información corporativa</a></li>
	<li><a href='#' id='areaDeTrabajo.php' onclick='opcion(this.id);comprueba_actividad();'>Area de trabajo</a></li>";
}
if($permisos[7]=='1'){
	echo "<li><a href='#' id='editinfocorp.php' onclick='opcion(this.id);comprueba_actividad();'>Editar información corporativa</a></li>";
	}
echo"
  </ul>
</li>
";

echo "
<li><a href='logout.php'>LOGOUT</a></li>
</ul>";
?>  
