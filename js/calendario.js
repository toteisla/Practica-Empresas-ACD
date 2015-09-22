function AJAX(){
 var xmlhttp=false;
  try{
   xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  }catch(e){
   try {
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }catch(E){
    xmlhttp = false;
   }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
   xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

var ajax = AJAX();

function encode (str) {
  var dest = "";
  var len = str.length;
  var index = 0;
  var code = null;
  for (var i = 0; i < len; i++) {
    var ch = str.charAt(i);
    if (ch == " ") code = "%20";
    else if (ch == "%") code = "%25";
    else if (ch == ",") code = "%2C";
    else if (ch == ";") code = "%3B";
    else if (ch == "\b") code = "%08";
    else if (ch == "\t") code = "%09";
    else if (ch == "\n") code = "%0A";
    else if (ch == "\f") code = "%0C";
    else if (ch == "\r") code = "%0D";
    if (code != null) {
      dest += str.substring(index,i) + code;
      index = i + 1;
      code = null;
    }
  }

  if (index < len)
    dest += str.substring(index, len);
  return dest;
}

//

// "Internal" function to decode cookie values.
//

function decode (str) {

  var dest = "";
  var len = str.length;
  var index = 0;
  var code = null;
  var i = 0;
  while (i < len) {
    i = str.indexOf ("%", i);
    if (i == -1)
      break;
    if (index < i)
      dest += str.substring(index, i);
    code = str.substring (i+1,i+3);
    i += 3;
    index = i;
    if (code == "20") dest += " ";
    else if (code == "25") dest += "%";
    else if (code == "2C") dest += ",";
    else if (code == "3B") dest += ";";    
    else if (code == "08") dest += "\b";
    else if (code == "09") dest += "\t";
    else if (code == "0A") dest += "\n";
    else if (code == "0C") dest += "\f";
    else if (code == "0D") dest += "\r";
    else {
      i -= 2;
      index -= 3;
    }
  }        

  if (index < len)
    dest += str.substring(index, len);
  return dest;
}

function arrayOfDaysInMonths(isLeapYear)

{

   this[0] = 31;
   this[1] = 28;
   if (isLeapYear)

   this[1] = 29;

   this[2] = 31;
   this[3] = 30;
   this[4] = 31;
   this[5] = 30;
   this[6] = 31;
   this[7] = 31;
   this[8] = 30;
   this[9] = 31;
   this[10] = 30;
   this[11] = 31;

}

function daysInMonth(month, year)

{

// do the classic leap year calculation

   var isLeapYear = (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0));
   var monthDays  = new arrayOfDaysInMonths(isLeapYear);
   return monthDays[month];

}

var today      = new Date();
var day        = today.getDate();
var month      = today.getMonth();
var year       = today.getFullYear();

function calendar()
{
	var documento='';
	var monthNames = "JanFebMarAprMayJunJulAugSepOctNovDec";

// figure out how many days this month will have......

   var numDays    = daysInMonth(month, year);

// and go back to the first day of the month...

   var firstDay   = today;
       firstDay.setDate(1);

// and figure out which day of the week it hits...

   var startDay = firstDay.getDay();

   var column = 0;

   // Start the calendar table     

   documento+="AGENDA:";
   documento+="</br>";
   documento+="<TABLE style='width:195px; margin: 0px; border: 0px; padding-top: 15px;'>";
   documento+="<TR><TH style='background-color:#d5d5d5;' COLSPAN=7>";
   documento+="<img onclick='restarMes();' style='float:left' width='16' height='16' src='./img/monthBackward_down.gif' alt='no-foto'/><a style='color:#000000; background-color:transparent; padding: 0 0 0 52px' >"+monthNames.substring(3*month, 3*(month + 1)) + " " + year+"</a></div><img onclick='sumaMes()' style='float:right' width='16' height='16' src='./img/monthForward_down.gif' alt='no-foto'/>";
   documento+="<TR><TH style='background-color:#e9e9e9;'>Lun<TH style='background-color:#e9e9e9;'>Mar<TH style='background-color:#e9e9e9;'>Mie<TH style='background-color:#e9e9e9;'>Jue<TH style='background-color:#e9e9e9;'>Vie<TH style='background-color:#e9e9e9;'>Sab<TH style='background-color:#e9e9e9;'>Dom";

   // put blank table entries for days of week before beginning of the month

   documento+="<TR>";

   for (i=1; i < startDay; i++)
   {
      documento+="<TD>";
      column++;
   }

   for (i=1; i <= numDays; i++)
   {
      var s = "" + i;

	var fechaActual = new Date();
    	dia = fechaActual.getDate();
    
    if( today.getYear() > fechaActual.getYear() )
    {
		s = s.fontcolor("#0B610B");
		s = s.link("javascript:dayClick(" + i + ")");
	}

	else if( today.getYear() == fechaActual.getYear() )
	{
		if( today.getMonth() == fechaActual.getMonth() )
		{
			if(i >= dia)
			{
				s = s.fontcolor("#0B610B");
				s = s.link("javascript:dayClick(" + i + ")");
			}
			else if(i == dia)
			{
				s = s.bold();
			}
			else
			{
				s = s.fontcolor("#B40404");
			}
		}
		else if( today.getMonth() > fechaActual.getMonth() )
		{
			s = s.fontcolor("#0B610B");
			s = s.link("javascript:dayClick(" + i + ")");
		}
		else
		{
			s = s.fontcolor("#B40404");
		}
	}
	else
	{
		s = s.fontcolor("#B40404");
	}
	
	
	documento+="<TD>" + s;

      

      // Check for end of week/row

      if (++column == 7)
      {
         documento+="<TR>"; // start a new row
         column = 0;
      }

   }

   documento+="</TABLE>";
   document.getElementById('calendario').innerHTML=documento;

}

        
function RefrescaAgenda()
{
	var ajax = AJAX();
	ajax.open("GET", "./muestraAgenda.php", false);
	ajax.send();
	document.getElementById("agenda").innerHTML = ajax.responseText;
}

////////////////////////////

//////// dayClick //////////

////////////////////////////

function dayClick(day)

{
	var month = today.getMonth()+1;
	var year = today.getFullYear();
	var fecha_ordenada = day+"-"+month+"-"+year;
	var fecha = year+","+month+","+day;
	if (confirm("¿Quieres agregar un evento para el " + fecha_ordenada + "?"))
	{			
		x = prompt("Agregar evento para el dia "+ fecha_ordenada);
		
		if(x.length<150)
		{
			ajax.open("GET", "./guarda_agenda.php?fecha="+fecha+"&texto="+x, false);
			ajax.send();
			RefrescaAgenda();
			alert("Evento guardado");
		}
		else
			alert("El evento tiene que tener menos de 150 caracteres");
	}

}
