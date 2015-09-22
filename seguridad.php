<?php

if( !isset($_COOKIE['id']) || !isset($_COOKIE['nombre']) )
{
	echo "
<html>
<head>
<title>ACD Consulting</title>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta http-equiv='imagetoolbar' content='no' />
<link rel='shortcut icon' href='./images/demo/logo.png' type='image/x-icon' />
<link rel='stylesheet' href='./styles/layout.css' type='text/css' />
</head><body>
<div class='wrapper col2'>
  <div id='topbar' >
    <div id='topnav' >
    </div>
    <br class='clear' />
  </div>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class='wrapper col4'>
  <div id='latest' style='width:100%;'>
	<center><div><img src='./images/stop.png' /></div></center>
	<center><div style='font-size:40px;'>Usted no tiene permiso para acceder a esta página.</div></center>
  </div>
  <div style='width:200px; float:right; padding-right:25px;'> 
  </div>
  <br class='clear' />  
  <br class='clear' />
</div>
<!-- ####################################################################################################### -->
<div class='wrapper col5'>
  <div id='footer'>
	</div>
</div>
<!-- ####################################################################################################### -->
<div class='wrapper col6'>
<div id='copyright'>
    <p class='fl_left'>Copyright &copy; 2012 - All Rights Reserved - <a href='#'>ACD Asesores</a></p>
    <p class='fl_right'>Design by <a href='http://www.grupomontes.com/' title='AFT Design'>AFT Design</a></p>
    <br class='clear' />
  </div>
</div>
</body>
</html>
";
	header("Refresh:4;url=index.php");
	exit ( 1 );
}
?>
