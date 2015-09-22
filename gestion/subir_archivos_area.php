<script type='text/javascript' src='../js/libreriaAT.js'></script>
<?PHP
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );

$tamañototal=0;
if(isset($_FILES["archivo"]["tmp_name"]))
{
	for($i=0;$i<count($_FILES["archivo"]["tmp_name"]);$i++)
	{
		$tamañototal += $_FILES["archivo"]["size"][$i];
	}
	if($tamañototal<20000001)
	{
		for($i=0;$i<count($_FILES["archivo"]["tmp_name"]);$i++)
		{
			$archivo = $_FILES["archivo"]["tmp_name"][$i];
			$tamanio = $_FILES["archivo"]["size"][$i];
			$tipo    = $_FILES["archivo"]["type"][$i];
			$nombre  = $_FILES["archivo"]["name"][$i];
			$id_area_proy_subproy = $_POST["hidden_proy_subproy"];
			$nombre_fase = $_POST["hidden_nombre"];
			 if ( $archivo != "none" )
			 {
				$fp = fopen($archivo, "rb");
				$contenido = fread($fp, $tamanio);
				$contenido = addslashes($contenido);
				fclose($fp); 
				$strQuery1 = "SELECT id FROM fases WHERE id_area_proy_subproy=$id_area_proy_subproy AND nombre_fase='$nombre_fase'";
				$query1 = mysql_query($strQuery1,$db_resource);
				$fila = mysql_fetch_array($query1);
				
				$strQuery2 = "INSERT INTO archivos_fases VALUES('','$fila[0]','$contenido','$nombre','$tipo')";
				mysql_query($strQuery2,$db_resource);
			}
		}
		echo "<script>
				alert('Archivo subido correctamente');
				recargarArchivos('".$nombre_fase."');
			  </script>";
	}
	mysql_close($db_resource);
}
?>
