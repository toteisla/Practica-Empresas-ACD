<script>
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


//

// "Internal" function to return the decoded value of a cookie
//

function getCookieVal (offset) {
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1)
    endstr = document.cookie.length;
  return decode(document.cookie.substring(offset, endstr));
}


//

//  Function to return the value of the cookie specified by "name".
//    name - String object containing the cookie name.
//

function GetCookie (name) {
  var arg = name + "=";
  var alen = arg.length;
  var clen = document.cookie.length;
  var i = 0;
  while (i < clen) {
    var j = i + alen;
    if (document.cookie.substring(i, j) == arg)
      return getCookieVal (j);
    i = document.cookie.indexOf(" ", i) + 1;
    if (i == 0) break; 
  }

  return null;
}



//

//  Function to create or update a cookie.
//    name - String object object containing the cookie name
//    value - String object containing the cookie value.  May contain
//      any valid sting characters, including whitespace, commas and quotes.
//    expires - Date object containing the expiration data of the cookie,
//      or null to expire the cookie at the end of the current session.
//
function SetCookie (name, value, expires) {

  document.cookie = name + "=" + encode(value) + ((expires == null) ? "" : ("; expires=" + expires.toGMTString()));

}



//  Function to delete a cookie. (Sets expiration date to current date/time)

//    name - String object containing the cookie name

//

function DeleteCookie (name) {
  var exp = new Date();
  var cval = GetCookie (name);
  document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();

}
//
//  Example
//


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

function calendar(e)

{
   var cambiames  = e;
   var monthNames = "JanFebMarAprMayJunJulAugSepOctNovDec";
   var today      = new Date();
   var day        = today.getDate();
   var month      = today.getMonth();
   var year       = today.getFullYear();
   canbiames = month + e;

// figure out how many days this month will have...
   var numDays    = daysInMonth(month, year);

// and go back to the first day of the month...

   var firstDay   = today;
       firstDay.setDate(1);

// and figure out which day of the week it hits...

   var startDay = firstDay.getDay();

   var column = 0;

   // Start the calendar table     

   document.write("<TABLE style='width:15%;margin: 0px; border: 0px; padding: 0px;'>");
   document.write("<TR><TH style='background-color:#ff9933;' COLSPAN=7>");
   document.write("<TD><input type='button' style='float:left;' value='mas' id='mas' onclick='calendar(1);'/></TD>");
   document.write(monthNames.substring(3*month, 3*(month + 1)) + " " + year);
   document.write("<TR><TH style='background-color:#83aec0;'>Dom<TH style='background-color:#83aec0;'>Lun<TH style='background-color:#83aec0;'>Mar<TH style='background-color:#83aec0;'>Mie<TH style='background-color:#83aec0;'>Jue<TH style='background-color:#83aec0;'>Vie<TH style='background-color:#83aec0;'>Sab");

   // put blank table entries for days of week before beginning of the month

   document.write("<TR>");

   for (i=1; i < startDay; i++)

   {

      document.write("<TD>");
      column++;
   }

   for (i=1; i <= numDays; i++)
   {
      // Write the day

      var s = "" + i;
     // if ((GetCookie("d"+i) != null))
	
	var fechaActual = new Date();
    	dia = fechaActual.getDate();
        // s = s.fontcolor(document.vlinkColor);
	if(i > dia){
        s = s.fontcolor("#FF0000");
     	s = s.link("javascript:dayClick(" + i + ")")
	}
	if(i == dia){
	s = s.bold()
	}
          document.write("<TD>" + s);

      

      // Check for end of week/row

      if (++column == 7)
      {
         document.write("<TR>"); // start a new row
         column = 0;
      }

   }

   document.write("</TABLE>");

}



////////////////////////////

//////// dayClick //////////

////////////////////////////

function dayClick(day)

{

        var expdate = new Date ();
            expdate.setTime (expdate.getTime() + (24 * 60 * 60 * 1000)); // 24 hrs from now
        var prefix                = "d";
        var theCookieName         = prefix + day;
        var theDayclickedReminder = GetCookie(theCookieName);

    if (theDayclickedReminder != null) {
        alert("Añada un evento para el dia " + day + ":"  + theDayclickedReminder);

    } // end if
        if (confirm("¿Quieres agregar un evento para el " + day + "?"))

        {
                x = prompt("Agregar evento para el dia "+ day);

        SetCookie (theCookieName, x, expdate);

    } // end if

}
	
	
	
</script>

 <script language='javascript'>
		  calendar();
		</script>
