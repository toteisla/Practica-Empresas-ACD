<script type='text/javascript' src='../js/librerias.js'></script>
<?PHP
/*
 *Guarda los archivos a la base de datos. Recibimos el id del correo por la sesion. 
 */
include_once("./seguridad.php");
include_once( "../ini_base_datos.php" );
session_start();
$idcorreo=$_SESSION['idcorreo'];
$tamañototal=0;
if(isset($_FILES["adjuntar"]["tmp_name"]))
{
	for($i=0;$i<count($_FILES["adjuntar"]["tmp_name"]);$i++)
	{
		$tamañototal += $_FILES["adjuntar"]["size"][$i];
	}
	if($tamañototal<10000001){
		for($i=0;$i<count($_FILES["adjuntar"]["tmp_name"]);$i++){
		 $archivo = $_FILES["adjuntar"]["tmp_name"][$i]; 
		 $tamanio = $_FILES["adjuntar"]["size"][$i];
		 $tipo    = $_FILES["adjuntar"]["type"][$i];
		 $nombre  = $_FILES["adjuntar"]["name"][$i];

			 if ( $archivo != "none" )
			 {
				$fp = fopen($archivo, "rb");
				$contenido = fread($fp, $tamanio);
				$contenido = addslashes($contenido);
				fclose($fp); 

				$qry = "INSERT INTO archivos_correos VALUES
						('','$idcorreo','$contenido','$nombre','$tipo')";

				mysql_query($qry,$db_resource);
			}
		}
	echo"
	<script>
	mostrardiv();
	alert('Correo enviado correctamente');
	</script>
	";
	}else
	{
		$idcorreo=$_SESSION["idcorreo"];
		$qry = "Delete From correos where id=$idcorreo";
		mysql_query($qry,$db_resource);
		echo"
		<script>
		mostrardiv();
		alert('Los archivos que intenta subir tienen mas de 10MB');
		</script>
		";
	}
}
?>
