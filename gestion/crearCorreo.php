<?php
include_once("./seguridad.php");
/*
 *Formulario para el envio de correo 
 */
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type='text/javascript' src='../ckeditor/ckeditor.js'>
</script>
<script type='text/javascript' src='../js/librerias.js'>
</script>
<link rel="stylesheet" type="text/css" href="../css/estilocorreo.css" />
<div id='divfon' style='display:none;'>
	<div id='divus'>
	SUBIENDO ARCHIVOS
	<div id='imagen'><img src='../images/cargando.gif'></div>
	</div>
</div>
<div id='divfondo1'>
	<div id='divusu1'>
		<form name="menuform" onSubmit="javascript:window.location = document.menuform.itemlist.options[document.menuform.itemlist.selectedIndex].value;return false;">
		Para <input type='text' id='entry' name="entry" onKeyUp="javascript:obj1.bldUpdate();"> 
		<select name="itemlist" id='itemlist' size=1>
<SCRIPT LANGUAGE="JavaScript">
function replaceAll( text, busca, reemplaza ){

  while (text.toString().indexOf(busca) != -1)

      text = text.toString().replace(busca,reemplaza);

  return text;

}

function enviarcorreo(){
	var receptor=document.getElementById('itemlist').value;	
	var Asunto=document.getElementById('Asunto').value;	
	var adjuntar=document.getElementById('adjuntar').files.length;	
	var editorText = CKEDITOR.instances.editor1.getData();
	if(receptor>0 && Asunto!='' && editorText!=''){
		var ajax = objetoAjax();
		editorText=replaceAll(editorText, '&','|@' );
		Asunto=replaceAll(Asunto, '&','|@' );
		ajax.open("GET", "./enviarcorreo.php?rec="+receptor+"&asu="+Asunto+"&mens="+editorText,true);
		ajax.send();
		
		if(adjuntar>0){
			if(document.getElementById('divfon').style.display=='none')
				document.getElementById('divfon').style.display='block';
			else
				document.getElementById('divfon').style.display='none';
		document.getElementById('enviaarchivos').click();
		}else{
		alert('Correo enviado correctamente');	
		}
		document.getElementById('entry').value='';
		document.getElementById('itemlist').value='';	
		document.getElementById('Asunto').value='';	
		document.getElementById('resetear').click();	
		CKEDITOR.instances.editor1.setData('');
		}else{
			alert('Rellene todos los campos correctamente');
		}
}
function SelObj(formname,selname,textname,str) {
this.formname = formname;
this.selname = selname;
this.textname = textname;
this.select_str = str || '';
this.selectArr = new Array();
this.initialize = initialize;
this.bldInitial = bldInitial;
this.bldUpdate = bldUpdate;
}

function initialize() {
if (this.select_str =='') {
for(var i=0;i<document.forms[this.formname][this.selname].options.length;i++) {
this.selectArr[i] = document.forms[this.formname][this.selname].options[i];
this.select_str += document.forms[this.formname][this.selname].options[i].value+":"+
document.forms[this.formname][this.selname].options[i].text+",";
   }
}
else {
var tempArr = this.select_str.split(',');
for(var i=0;i<tempArr.length;i++) {
var prop = tempArr[i].split(':');
this.selectArr[i] = new Option(prop[1],prop[0]);
   }
}
return;
}
function bldInitial() {
this.initialize();
for(var i=0;i<this.selectArr.length;i++)
document.forms[this.formname][this.selname].options[i] = this.selectArr[i];
document.forms[this.formname][this.selname].options.length = this.selectArr.length;
return;
}

function bldUpdate() {
var str = document.forms[this.formname][this.textname].value.replace('^\\s*','');
if(str == '') {this.bldInitial();return;}
this.initialize();
var j = 0;
pattern1 = new RegExp("^"+str,"i");
for(var i=0;i<this.selectArr.length;i++)
if(pattern1.test(this.selectArr[i].text)) 
document.forms[this.formname][this.selname].options[j++] = this.selectArr[i];
document.forms[this.formname][this.selname].options.length = j;
if(j==1){
document.forms[this.formname][this.selname].options[0].selected = true;
//document.forms[this.formname][this.textname].value = document.forms[this.formname][this.selname].options[0].text;
   }
}
function setUp() {
obj1 = new SelObj('menuform','itemlist','entry');
obj1.bldInitial(); 
}
setUp();
</script>

<?PHP
$miid = $_COOKIE['id'];
include_once( "../ini_base_datos.php" );
$strQuery1 = "SELECT id,nombre from usuarios where tipo_usuario!='cli' AND id!=$miid;";
$query1 = mysql_query( $strQuery1, $db_resource ); 
while ($fila = mysql_fetch_array($query1)) {
echo "<option value='$fila[0]'>$fila[1]</option>";
}
mysql_free_result($query1);
?>
		</select>Asunto <input type='text' id='Asunto'><input type='button' style='float:right;font-size:1em;cursor:pointer;' onclick='enviarcorreo()' value='Enviar'>
	</div>
</div>
</form>
<form action='./guardararchivos.php' target='frameguardar' method="post" enctype="multipart/form-data">
		<br>Adjuntar <input type='file' id='adjuntar' name='adjuntar[]' multiple value='adjuntar'>   <small style='color:red;'>MAXIMO:10MB</small>
		<input type='submit' id='enviaarchivos' value='enviar' style='display:none;'><input type="reset" id='resetear' value="borrar" style='display:none;'>
		</form>
		<iframe name='frameguardar' style='width:0px;height:0px;display:none;'></iframe>
<textarea cols='80' id='editor1' name='editor1' rows='5'>	
</textarea>
<script type="text/javascript">
	CKEDITOR.replace( 'editor1',
		{
		toolbar : 
			[
				['Source'],
				['Cut','Copy','Paste','PasteText','PasteFromWord','-','SpellChecker', 'Scayt'],
				['Undo','Redo','Find','Replace','-','SelectAll','RemoveFormat'],
				['Maximize', 'ShowBlocks'],
				'/',
				['Format'],
				['Styles'],
				['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
				['NumberedList','BulletedList','-','Outdent','Indent'],
				['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
				['Link','Unlink','LinkToNode', 'LinkToMenu'],
		    ]
 
    		} 
	);
	CKEDITOR.config.height        = '310px';
	CKEDITOR.config.width        = '98%';
</script>
