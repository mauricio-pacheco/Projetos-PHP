<?
// leitura das datas
$dia = date('d');
$mes = date('m');
$ano = date('Y');
$semana = date('w');


// configuração mes

switch ($mes){

case 1: $mes = "JANEIRO"; break;
case 2: $mes = "FEVEREIRO"; break;
case 3: $mes = "MARÇO"; break;
case 4: $mes = "ABRIL"; break;
case 5: $mes = "MAIO"; break;
case 6: $mes = "JUNHO"; break;
case 7: $mes = "JULHO"; break;
case 8: $mes = "AGOSTO"; break;
case 9: $mes = "SETEMBRO"; break;
case 10: $mes = "OUTUBRO"; break;
case 11: $mes = "NOVEMBRO"; break;
case 12: $mes = "DEZEMBRO"; break;

}


// configuração semana

switch ($semana) {

case 0: $semana = "DOMINGO"; break;
case 1: $semana = "SEGUNDA FEIRA"; break;
case 2: $semana = "TERÇA-FEIRA"; break;
case 3: $semana = "QUARTA-FEIRA"; break;
case 4: $semana = "QUINTA-FEIRA"; break;
case 5: $semana = "SEXTA-FEIRA"; break;
case 6: $semana = "SÁBADO"; break;

}

?>
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<SCRIPT type=text/javascript charset=utf-8>
function CheckBusca()
{
	
	if ( document.buscaCidadesBR.strBusca.value.length <= 2 )
	{
		
		alert('A cidade precisa ter mais de 3 caracteres');
		return false;
		
	}
	
	if ( document.buscaCidadesBR.strBusca.value == 'Cidade' )
	{
		
		alert('Cidade');
		return false;	
	
	}

	return true;
	
}
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</SCRIPT>
<?php

/********************************************************/
/* Event Calendar for PHP-Nuke 7.0                      */
/*                                                      */
/* Based on Event Calendar 1.5 by Rob Sutton            */
/* Development & enhancments by Holbrookau and friends  */
/* http://phpnuke.holbrookau.net                        */
/********************************************************/

if (eregi("block-Calendar6.php",$PHP_SELF)) {
   Header("Location: index.php");
   die();
}

$module_name = "Calendar";
include("modules/$module_name/configset.php");
global $prefix, $currentlang, $calsetmonth, $calsetyear;
include("modules/$module_name/language/lang-$currentlang.php");

// Edit to suit
$todaycolor = "#006A00";
$daycolor = "#ffffff";
$daybackground = "#F59127";
$todaybackground = "#ffffff";
$show_cats = 1; // Show the categories legend at the top of block - Yes = 1, No = 0
// End Edits

$Date = Date("m/d/Y");
$Date_Array = explode("/", $Date);

$content = "";


$content .= "<p align=center><FORM action=http://www.google.com/custom method=get target=_blank>
  <div align=center><img src=goo.gif><br><a href=http://www.google.com.br target=_blank><img src=google.gif border=0></a>
  </div>
  <div align=center>
    <INPUT maxLength=255 size=25 name=q> 
    <br>
    <INPUT type=submit value='Pesquisa Google' name=sa>
   </div>
</FORM>
<FORM id=buscaCidadesBR name=buscaCidadesBR 
            onsubmit='return CheckBusca();' action=http://tempoagora.uol.com.br/busca.html/ 
            method=post target=_blank><div align=center>  <img src=previsao.gif><br></span>
<iframe src=http://www.tempoagora.com.br/selos/custom/selo.php?cid=FredericoWestphalen-RS; name=seloFredericoWestphalen-RS width=120 height=125 frameborder=0 marginheight=0 marginwidth=0 scrolling=no></iframe></div>
  <div align=center>
    <INPUT class=txt_aeroportos id=strBusca  size=26 
            value='' name=strBusca> 
    <INPUT id=tipoBusca type=hidden 
            value=CidadesBR name=tipoBusca>   
    <br>
    <INPUT class=btOK type=submit value='Buscar Cidades' name=ok> 
  </div>
  </p>
</FORM>";


$content .= "<table width=\"100%\"  height=\"100%\"><tr><td nowrap valign=\"bottom\">";
$content .= "<img src=calendar.gif><br><center><a href=\"modules.php?name=Calendar&op=modload&file=index&type=month&Date=$Date\"><font color=#F59127>•</font><FONT FACE=verdana size=\"1\"> VISUALIZAR CALENDÁRIO </font><font color=#F59127>•</font></a></center>";

/*this is going to be changed to a switch ASAP*/
$selmon = array();
 for ($i=1; $i <=12; $i++) {
 $selmon[$i] = "";
     }
  $month = $Date_Array[0];
   if ($month == "01" || $month =="1") 
  {
    $monthname = _CALJAN;
      $selmon[1] = "selected";
  } elseif ($month == "02") 
  {
     $monthname = _CALFEB;
     $selmon[2] = "selected";
  } elseif ($month == "03") 
  {
    $monthname = _CALMAR;
     $selmon[3] = "selected";
  } elseif ($month == "04") 
  {
    $monthname = _CALAPR;
    $selmon[4] = "selected";
  } elseif ($month == "05") 
  {
    $monthname = _CALMAY;
    $selmon[5] = "selected";
  } elseif ($month == "06") 
  {
   $monthname = _CALJUN;
   $selmon[6] = "selected";
  } elseif ($month == "07") 
  {
    $monthname = _CALJUL;
    $selmon[7] = "selected";
  } elseif ($month == "08") 
  {
    $monthname = _CALAUG;
$selmon[8] = "selected";
  } elseif ($month == "09") 
  {
    $monthname = _CALSEP;
$selmon[9] = "selected";
  } elseif ($month == "10") 
  {
     $monthname = _CALOCT;
$selmon[10] = "selected";

  } elseif ($month == "11") 
  {
    $monthname = _CALNOV;
$selmon[11] = "selected";
  } elseif ($month == "12") 
  {
     $monthname = _CALDEC;
$selmon[12] = "selected";
  }

$selyear = array();
 for ($i=1; $i <=10; $i++) {
  $selyear[$i] = "";
  if ($Date_Array[2] == ($i+2002)) {
  $selyear[$i] = "selected";
   }
     }
       
$First_Day_of_Month_Date = mktime("", "", "", $Date_Array[0], 1, $Date_Array[2]);
$Date = $First_Day_of_Month_Date;
$Day_of_First_Week = Date("w",$First_Day_of_Month_Date);

$Month = Date("m",$Date);
$day = 27;
do {
    $End_of_Month_Date = mktime("", "", "", $Date_Array[0], $day, $Date_Array[2]);
    $Test_Month = Date("m",$End_of_Month_Date);
    $day += 1;
  } while ( $Month == $Test_Month );
$Last_Day = $day - 2;

$Today_d = Date("d");
$Today_m = Date("m");
$Today_y = Date("Y");




$content .= "\n<center><TABLE border=0 cellspacing=1 cellpadding=2>";
$content .= "\n<TR>\n\t<Td colspan=7 height=40 align=center><FONT class=\"tiny\">";
$content .= "<font color=#006A00> $semana <br> $dia DE $mes DE $ano </font>";
$content .= "</TH>\n</TR>";

$content .= "\n<TR>";
if ($Day_of_First_Week != 0)
$content .= "\n\t<TD colspan=$Day_of_First_Week><font class=\"content\"> </TD>";
$day_of_week = $Day_of_First_Week + 1;

for ($day = 1; $day <= $Last_Day; $day++) 
  {
  if ($day_of_week == 1) 
  {
  $content .= "\n<TR>";
  }
$result = mysql_query("SELECT eid,title,eventDate,endDate,startTime,endTime,barcolor FROM ".$prefix."_events WHERE (eventDate <= '$Date_Array[2]-$Date_Array[0]-$day' AND endDate >= '$Date_Array[2]-$Date_Array[0]-$day');");
if (($Date_Array[1] == $day) && ($Date_Array[0] == $Today_m) && ($Date_Array[2] == $Today_y)) 
$content .= "\n\t<TD align=center bgcolor=$todaybackground><b><a href=\"modules.php?name=$module_name&op=modload&file=index&Date=$Date_Array[0]/$day/$Date_Array[2]&type=day\"><FONT FACE=verdana size=\"1\" color=$todaycolor>$day</font></a></b>";
       else
$content .= "\n\t<TD width=\"30\" align=center bgcolor=$daybackground><a href=\"modules.php?name=$module_name&op=modload&file=index&Date=$Date_Array[0]/$day/$Date_Array[2]&type=day\"><FONT FACE=verdana size=\"1\" color=$daycolor>$day</font></a>";
if (mysql_num_rows($result) == 0)
$content .= "<br><img src=\"images/calendar/events0.gif\">";
elseif (mysql_num_rows($result) >= 4)
$content .= "<br><img src=\"images/calendar/events4.gif\">";
elseif (mysql_num_rows($result) >= 3)
$content .= "<br><img src=\"images/calendar/events3.gif\">";
elseif (mysql_num_rows($result) >= 2)
$content .= "<br><img src=\"images/calendar/events2.gif\">";
else
$content .= "<br><img src=\"images/calendar/events1.gif\">";
$content .= "</TD>";
       if ($day_of_week == 7) 
       {
       $day_of_week = 0;
       $content .= "\n</TR>";
       }
       $day_of_week += 1;
}

$day = 1;
if ($day_of_week != 1) 
  {
   $tmp = 8 - $day_of_week;
   $content .= "<TD colspan=$tmp><font class\"tiny\"> </TD>";
  }
 $Date = implode("/", $Date_Array);  
$content .= "</tr></table>";

if ($show_cats == 1) {
$content .= "";
}

$content .= "<table width=\"100%\"  height=\"100%\"><tr><td height=\"100%\" width=\"100%\" valign=\"top\" bgcolor=#ffffff>";
$content .= "<br><center><img src=proximos.gif></center><br>";
$content .= "<MARQUEE behavior= \"scroll\" align= \"center\" direction= \"up\" height=\"100\" scrollamount= \"1\" scrolldelay= \"80\" onmouseover='this.stop()' onmouseout='this.start()'>";
$eventsresult = mysql_query("SELECT eid,title,startTime,endTime,alldayevent,barcolor FROM $prefix"._events." ORDER BY eventDate ASC");
        while(list($eid, $title,$startTime,$endTime,$alldayevent,$barcolor) = mysql_fetch_row($eventsresult)) 
        {
        if ($barcolor == "r") $barcolorchar="r";
        elseif ($barcolor == "g") $barcolorchar="g";
        elseif ($barcolor == "b") $barcolorchar="b";
        elseif ($barcolor == "y") $barcolorchar="y";
        else $barcolorchar="w";
        $content .= "&nbsp;&nbsp;<img src=\"images/calendar/ball$barcolorchar.gif\" border=0> <a href=\"modules.php?name=$module_name&op=modload&file=index&type=view&eid=$eid\">$title</a><br><br>"; 
        } 

$content .= "</marquee>";



function busca_cotacao() {
	$resultado = @file_get_contents('http://www.cotacao.republicavirtual.com.br/web_cotacao.php?formato=query_string');
	parse_str($resultado, $retorno);
	return $retorno;
}

$cotacao = busca_cotacao();



$content .= "<br><img src=cotacoes.gif><table width=166 border=0>
  <tr>
    <td><table width=100% border=0>
      <tr>
        <td width=3%><img src=grana.jpg /></td>
        <td width=97%><span class=style3>COMPRA</span></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width=88%><span class=style3>Dólar Comercial</span></td>
    <td width=12%>".$cotacao['dolar_comercial_compra']."</td>
  </tr>
  <tr>
    <td><span class=style3>Dólar Paralelo</span></td>
    <td>".$cotacao['dolar_paralelo_compra']."</td>
  </tr>
  <tr>
    <td><span class=style3>Euro -&gt; Dólar</span></td>
    <td>".$cotacao['euro_dolar_compra']."</td>
  </tr>
  <tr>
    <td><span class=style3>Euro -&gt; Real</span></td>
    <td>".$cotacao['euro_real_compra']."</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width=100% border=0>
      <tr>
        <td width=3%><img src=grana.jpg /></td>
        <td width=97%><span class=style3>VENDA</span></td>
      </tr>
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><span class=style3>Dólar Comercial</span></td>
    <td>".$cotacao['dolar_comercial_venda']."</td>
  </tr>
  <tr>
    <td><span class=style3>Dólar Paralelo</span></td>
    <td>".$cotacao['dolar_paralelo_venda']."</td>
  </tr>
  <tr>
    <td><span class=style3>Euro -&gt; Dólar</span></td>
    <td>".$cotacao['euro_dolar_venda']."</td>
  </tr>
  <tr>
    <td><span class=style3>Euro -&gt; Real</span></td>
    <td>".$cotacao['euro_real_venda']."</td>
  </tr>
</table>
";
$content .= "</td></tr></table></td></tr></table>";



?>