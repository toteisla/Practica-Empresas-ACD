<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>ACD | Contacto</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
<script>
function comprueba()
{
	var nombre = document.getElementById('nombres').value;
	var ciudad = document.getElementById('ciudad').value;
	var pais = document.getElementById('select').value;
	var empresa = document.getElementById('empresa').value;
	var mail1 = document.getElementById('email').value;
	var mail2 = document.getElementById('email2').value;
	var texto = document.getElementById('texto').value;
	
	if(nombre == "" || ciudad == "" || pais == "" || empresa == "" || mail1 == "" || mail2 == "" || texto == "" || mail1 != mail2)
	{
			if(nombre == "")
				alert("Por favor introduzca Nombre.");
			else if(ciudad == "")
				alert("Por favor introduzca Ciudad.");
			else if(pais == "")
				alert("Por favor introduzca Pais.");
			else if(empresa == "")
				alert("Por favor introduzca Empresa.");
			else if(mail1 == "")
				alert("Por favor introduzca Email.");
			else if(mail2 == "")
				alert("Por favor introduzca Email de confirmacion.");
			else if(mail1 != mail2)
				alert("Ha introducido dos cuentas de correo distintas.    Por favor Compruebelo.");
			else if(texto == "")
				alert("Por favor introduzca Texto.");
	}
	else
	{
		document.getElementById('envio').click();
	}
}
</script>
</head>
<body id="top">
<div class="wrapper col1">
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
	<?php include_once("./cabecera_pag.php") ?>
</div>
<!-- ####################################################################################################### -->

<!-- ####################################################################################################### -->
<div class="wrapper col4">
  <div class="container">
	  <div style='padding-top:50px;'>
		  <h1>CONTACTENOS</h1>
			<FORM action="form_contactanos.php" method="post" name="contacto" target="_self" id="contacto">
					<div align="center">
					  <table width="312" height="341" align="center" bgcolor="#FFFFF7">
						<tr>
						  <td width="10" scope="row">&nbsp;</td>
						  <td width="78" height="27" scope="row"><div align="left">
							  <div align="center" >
								<div align="left"></div>
							  </div>
						  </div></td>
						  <td width="2" bgcolor="#FBFCFD">&nbsp;</td>
						  <td width="225">&nbsp;</td>
						</tr>
						<tr class="Estilo10">
						  <td scope="row">&nbsp;</td>
						  <td height="24" scope="row"><div align="left">
							  <div align="center" >
								<div align="left" class="texto_contenido">*Nombres/Apellidos:</div>
							  </div>
							  </div></td>
							  <td style="bordercolor:#801819">&nbsp;</td>
							  <td style="bordercolor:#801819"><div align="left">
							  <input name="nombres" type="text" id="nombres" size="31">
						  </div></td>
						</tr>
						<tr>
						  <td scope="row">&nbsp;</td>
						  <td height="18" class="texto_contenido" scope="row"><div align="left" class="style35"><span class="Estilo10">*Ciudad</span>:</div></td>
						  <td>&nbsp;</td>
						  <td><div align="left">
							  <input name="ciudad" type="text" id="ciudad" size="31">
						  </div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="24" class="texto_contenido"><div align="left" class="style34">*Pais:</div></td>
						  <td>&nbsp;</td>
						  <td><div align="left"><span class="textohome"><font size="2"> <font size="2">
							  <select name="pais" class="style32" id="select">
								<option value="" selected>escoge un pa&iacute;s</option>
								<option value="">--------------------- </option>
								<option value="ESP">ESPA&Ntilde;A </option>
								<option value="">--------------------- </option>
								<option value="BRA">Brazil </option>
								<option value="DEU">Germany </option>
								<option value="FRA">France </option>
								<option value="GBR">United Kingdom </option>
								<option value="IND">India </option>
								<option value="USA">United States of America </option>
								<option value="">--------------------- </option>
								<option value="AFG">Afghanistan </option>
								<option value="ALB">Albania </option>
								<option value="DZA">Algeria </option>
								<option value="ASM">American Samoa </option>
								<option value="AND">Andorra </option>
								<option value="AGO">Angola </option>
								<option value="AIA">Anguilla </option>
								<option value="ATA">Antarctica </option>
								<option value="ATG">Antigua and Barbuda </option>
								<option value="ARG">Argentina </option>
								<option value="ARM">Armenia </option>
								<option value="ABW">Aruba </option>
								<option value="AUS">Australia </option>
								<option value="AUT">Austria </option>
								<option value="AZE">Azerbaijan </option>
								<option value="BHS">Bahamas </option>
								<option value="BHR">Bahrain </option>
								<option value="BGD">Bangladesh </option>
								<option value="BRB">Barbados </option>
								<option value="BLR">Belarus </option>
								<option value="BEL">Belgium </option>
								<option value="BLZ">Belize </option>
								<option value="BEN">Benin </option>
								<option value="BMU">Bermuda </option>
								<option value="BTN">Bhutan </option>
								<option value="BOL">Bolivia </option>
								<option value="BIH">Bosnia and Herzegowina </option>
								<option value="BWA">Botswana </option>
								<option value="BVT">Bouvet Island </option>
								<option value="IOT">British Indian Ocean Territory </option>
								<option value="BRN">Brunei Darussalam </option>
								<option value="BGR">Bulgaria </option>
								<option value="BFA">Burkina Faso </option>
								<option value="BDI">Burundi </option>							
								<option value="CAN">Canada </option>
								<option value="KHM">Cambodia </option>
								<option value="CMR">Cameroon </option>
								<option value="CPV">Cape Verde </option>
								<option value="CYM">Cayman Islands </option>
								<option value="CAF">Central African Republic </option>
								<option value="TCD">Chad </option>
								<option value="CHL">Chile </option>
								<option value="CHN">China </option>
								<option value="CXR">Christmas Island </option>
								<option value="CCK">Cocoa (Keeling) Islands </option>
								<option value="COL">Colombia </option>
								<option value="COM">Comoros </option>
								<option value="COG">Congo </option>
								<option value="COK">Cook Islands </option>
								<option value="CRI">Costa Rica </option>
								<option value="CIV">Cote Divoire </option>
								<option value="HRV">Croatia (local name: Hrvatska) </option>
								<option value="CUB">Cuba </option>
								<option value="CYP">Cyprus </option>
								<option value="CZE">Czech Republic </option>
								<option value="DNK">Denmark </option>
								<option value="DJI">Djibouti </option>
								<option value="DMA">Dominica </option>
								<option value="DOM">Dominican Republic </option>
								<option value="TMP">East Timor </option>
								<option value="ECU">Ecuador </option>
								<option value="EGY">Egypt </option>
								<option value="SLV">El Salvador </option>
								<option value="GNQ">Equatorial Guinea </option>
								<option value="ERI">Eritrea </option>
								<option value="EST">Estonia </option>
								<option value="Etd">Etdiopia </option>
								<option value="FLK">Falkland Islands (Malvinas) </option>
								<option value="FRO">Faroe Islands </option>
								<option value="FJI">Fiji </option>
								<option value="FIN">Finland </option>
								<option value="FXX">France, Metropolitan </option>
								<option value="GUF">French Guiana </option>
								<option value="PYF">French Polynesia </option>
								<option value="ATF">French Soutdern Territories </option>
								<option value="GAB">Gabon </option>
								<option value="GMB">Gambia </option>
								<option value="GEO">Georgia </option>
								<option value="GHA">Ghana </option>
								<option value="GIB">Gibraltar </option>
								<option value="GRC">Greece </option>
								<option value="GRL">Greenland </option>
								<option value="GRD">Grenada </option>
								<option value="GLP">&gt;Guadeloupe </option>
								<option value="GUM">Guam </option>
								<option value="GTM">Guatemala </option>
								<option value="GIN">Guinea </option>
								<option value="GNB">Guinea-Bissau </option>
								<option value="GUY">Guyana </option>
								<option value="HTI">Haiti </option>
								<option value="HMD">Heard and Mc Donald Islands </option>
								<option value="HND">Honduras </option>
								<option value="HKG">Hong Kong </option>
								<option value="HUN">Hungary </option>
								<option value="ISL">Iceland </option>
								<option value="IDN">Indonesia </option>
								<option value="IRN">Iran (Islamic Republic of) </option>
								<option value="IRQ">Iraq </option>
								<option value="IRL">Ireland </option>
								<option value="ISR">Israel </option>
								<option value="ITA">Italy </option>
								<option value="JAM">Jamaica </option>
								<option value="JPN">Japan </option>
								<option value="JOR">Jordan </option>
								<option value="KAZ">Kazakhstan </option>
								<option value="KEN">Kenya </option>
								<option value="KIR">Kiribati </option>
								<option value="PRK">Korea, Democratic Peoples Republic of </option>
								<option value="KOR">Korea, Republic of </option>
								<option value="KWT">Kuwait </option>
								<option value="KGZ">Kyrgyzstan </option>
								<option value="LAO">Lao Peoples Democratic Republic </option>
								<option value="LVA">Latvia </option>
								<option value="LBN">Lebanon </option>
								<option value="LSO">Lesotdo </option>
								<option value="LBR">Liberia </option>
								<option value="LBY">Libyan Arab Jamahiriya </option>
								<option value="LIE">Liechtenstein </option>
								<option value="LTU">Litduania </option>
								<option value="LUX">Luxembourg </option>
								<option value="MAC">Macau </option>
								<option value="MKD">Macedonia</option>
								<option value="MDG">Madagascar </option>
								<option value="MWI">Malawi </option>
								<option value="MYS">Malaysia </option>
								<option value="MDV">Maldives </option>
								<option value="MLI">Mali </option>
								<option value="MLT">Malta </option>
								<option value="MHL">Marshall Islands </option>
								<option value="MTQ">Martinique </option>
								<option value="MRT">Mauritania </option>
								<option value="MVS">Mauritius </option>
								<option value="MYT">Mayotte </option>
								<option value="MEX">Mexico </option>
								<option value="FSM">Micronesia</option>
								<option value="MDA">Moldova, Republic of </option>
								<option value="MCO">Monaco </option>
								<option value="MNG">Mongolia </option>
								<option value="MSR">Montserrat </option>
								<option value="MAR">Morocco </option>
								<option value="MOZ">Mozambique </option>
								<option value="MMR">Myanmar </option>
								<option value="NAM">Namibia </option>
								<option value="NRU">Nauru </option>
								<option value="NPL">Nepal </option>
								<option value="NLD">Netderlands </option>
								<option value="ANT">Netderlands Antilles </option>
								<option value="NCL">New Caledonia </option>
								<option value="NZL">New Zealand </option>
								<option value="NIC">Nicaragua </option>
								<option value="NER">Niger </option>
								<option value="NGA">Nigeria </option>
								<option value="NIU">Niue </option>
								<option value="NFK">Norfolk Island </option>
								<option value="MNP">Nortdern Mariana Islands </option>
								<option value="MOR">Norway </option>
								<option value="OMN">Oman </option>
								<option value="PAK">Pakistan </option>
								<option value="PLW">Palau </option>
								<option value="PAN">Panama </option>
								<option value="PNG">Papua New Guinea </option>
								<option value="PRY">Paraguay </option>
								<option value="PER">Peru </option>
								<option value="PHL">Philippines </option>
								<option value="PCN">Pitcairn </option>
								<option value="POL">Poland </option>
								<option value="PRT">Portugal </option>
								<option value="PRI">Puerto Rico </option>
								<option value="QAT">Qatar </option>
								<option value="REU">Reunion </option>
								<option value="ROM">Romania </option>
								<option value="RUS">Russian Federation </option>
								<option value="RWA">Rwanda </option>
								<option value="KNA">Saint Kitts and Nevis </option>
								<option value="LCA">Saint Lucia </option>
								<option value="VCT">Saint Vincent and tde Grenadines </option>
								<option value="WSM">Samoa </option>
								<option value="SMR">San Marino </option>
								<option value="STP">Sao Tome and Principe </option>
								<option value="SAU">Saudi Arabia </option>
								<option value="SEN">Senegal </option>
								<option value="SYC">Seychelles </option>
								<option value="SLE">Sierra Leone </option>
								<option value="SGP">Singapore </option>
								<option value="SVK">Slovakia (Slovak Republic) </option>
								<option value="SVN">Slovenia </option>
								<option value="SLB">Solomon Islands </option>
								<option value="SOM">Somalia </option>
								<option value="ZAF">Soutd Africa </option>
								<option value="SGS">Soutd Georgia </option>								
								<option value="LKA">Sri Lanka </option>
								<option value="SHN">St. Helena </option>
								<option value="SPM">St. Pierre and Miquelon </option>
								<option value="SDN">Sudan </option>
								<option value="SUR">Suriname </option>
								<option value="SJM">Svalbard and Jan Mayen Islands </option>
								<option value="SWZ">Swaziland </option>
								<option value="SWE">Sweden </option>
								<option value="CHE">Switzerland </option>
								<option value="SYR">Syrian Arab Republic </option>
								<option value="TWN">Taiwan </option>
								<option value="TJK">Tajikistan </option>
								<option value="TZA">Tanzania, United Republic of </option>
								<option value="tdA">tdailand </option>
								<option value="TGO">Togo </option>
								<option value="TKL">Tokelau </option>
								<option value="TON">Tonga </option>
								<option value="TTO">Trinidad and Tobago </option>
								<option value="TUN">Tunisia </option>
								<option value="TUR">Turkey </option>
								<option value="TKM">Turkmenistan </option>
								<option value="TCA">Turks and Caicos Islands </option>
								<option value="TUV">Tuvalu </option>
								<option value="UGA">Uganda </option>
								<option value="UKR">Ukraine </option>
								<option value="ARE">United Arab Emirates </option>
								<option value="UMI">United States Minor Outlying Islands </option>
								<option value="URY">Uruguay </option>
								<option value="UZB">Uzbekistan </option>
								<option value="VUT">Vanuatu </option>
								<option value="VAT">Vatican City State (Holy See) </option>
								<option value="VEN">Venezuela </option>
								<option value="VNM">Viet Nam </option>
								<option value="VGB">Virgin Islands (British) </option>
								<option value="VIR">Virgin Islands (U.S.) </option>
								<option value="WLF">Wallisw and Futuna Islands </option>
								<option value="ESH">Western Sahara </option>
								<option value="YEM">Yeman </option>
								<option value="YUG">Yugoslavia </option>
								<option value="ZAR">Zaire </option>
								<option value="ZMB">Zambia </option>
								<option value="ZWE">Zimbabwe </option>
								<option value="UNK">Not Listed </option>
							  </select>
						  </font> </font></span></div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="24" class="texto_contenido"><div align="left" class="style35">Empresa:</div></td>
						  <td>&nbsp;</td>
						  <td><div align="left">
							  <input name="empresa" type="text" id="empresa" size="31">
						  </div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="24" class="texto_contenido"><div align="left" class="style34">*E-mail:</div></td>
						  <td>&nbsp; </td>
						  <td><div align="left">
							  <input name="email" type="text" id="email" size="31">
						  </div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="24" class="texto_contenido"><div align="left" class="style34">*Confirma E-mail:</div></td>
						  <td>&nbsp; </td>
						  <td><div align="left">
							  <input name="email2" type="text" id="email2" size="31">
						  </div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="34" class="texto_contenido"><div align="left">&iquest;C&oacute;mo le ayudamos?</div></td>
						  <td>&nbsp;</td>
						  <td><div align="left">
							  <textarea name="texto" cols="40" rows="5" id="texto"></textarea>
						  </div></td>
						</tr>
						<tr class="Estilo10">
						  <td>&nbsp;</td>
						  <td height="34">&nbsp;</td>
						  <td>&nbsp;</td>
						  <td><table width="179">
							  <tr>
								<input style='display:none' type="submit" name="submit" value="enviar" id="envio">
								<td width="91" scope="row"><input type="button" onclick='comprueba()' name="boton" value="Enviar"></td>
								<td width="76" scope="row"><input type="reset" name="Reset" value="Limpiar"></td>
							  </tr>
						  </table></td>
						</tr>
					  </table>
					</div>
				</FORM></td>
			</div>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col5">
  <div id="footer">

</div>
<!-- ####################################################################################################### -->
<div class="wrapper col6">
<div id="copyright">
    <p class="fl_left">Copyright &copy; 2012 - All Rights Reserved - <a href="#">ACD Asesores</a></p>
    <p class="fl_right">Design by <a href="http://www.grupomontes.com/" title="AFT Design">AFT Design</a></p>
    <br class="clear" />
  </div>
</div>
</div>
</body>
</html>
