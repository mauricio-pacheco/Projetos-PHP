<%
ID_Radio = Cint(Request.QueryString("ID_Radio"))

Response.expires = 0
Response.Buffer=True
Set strConexao = Server.CreateObject("ADODB.Connection")
strConexao.Open "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("bancodedados.mdb")
'-------------------------------------------------------------- 
' RANDOM COM REGISTROS DE UM BD SEM REPETI??O 
' Autor: M?rcio J. Lima (Guardi?o)
' Existe altera??es nesta FUN??O, by Pacola
' Data de cria??o: 22-08-2002 - SP / Brasil 
'-------------------------------------------------------------- 
Conta = "SELECT COUNT(id) AS total FROM radio_music WHERE IDRadio ="&ID_Radio&""
Set Ls = strConexao.Execute(Conta)
totalNumber = Ls("total")
' Gravamos o Recordset em um Array Bidimensional 
Set strRS = Server.CreateObject("ADODB.RecordSet") 
strRS.Open "SELECT * FROM radio_music WHERE IDRadio ="&ID_Radio&"", strConexao, 3, 3 
arySub = strRS.getRows() 

' Fechamos a conex?o pois n?o usaremos mais 
strRS.Close 
Set strRS = Nothing 
strConexao.Close 
Set strConexao = Nothing 

Dim TotalReg, TotalNum, vran, x, encontrou, arrGerados(0) 
Dim Numreg, verGerado, var_arrGerados, xLoop 

   Function GeraRegistros(TotalNum) 
      TotalReg=Cint(uBound(arySub,2))   ' Encontramos o Maior Array Gerado 
      vran = 1 

      For x = 0 To TotalNum-1      ' LOOP de 1 p/ Total solicitado 
         encontrou = 1 
         Randomize()         ' Geramos o primeiro Random 
         NumReg = Cint((rnd*TotalReg)) 
            verGerado = Split(var_arrGerados,",") ' Verifica se n? gerado 
         For xLoop = LBound(verGerado) To UBound(verGerado) 
            IF Trim(verGerado(xLoop)) = Trim(NumReg) Then 
               'Este "response" comentado abaixo, indica qual n?mero se repetiram 
               'E n?o armazena no Array ?nico, fazendo gerando um novo Random 
               'response.write "<b>[ "& verGerado(xLoop) &","& NumReg &" ]</b><br> " 
               x = x - 1 
               encontrou = 2 
               Exit For 
            End IF 
         Next 
         IF encontrou = 1 Then ' N?O ENCONTROU, gera o pr?ximo n?mero 

            IF vran = 1 Then ' primeiro (Verificar este trecho) 
               arrGerados(0) = NumReg 
               vran = 2 
            Else 
               arrGerados(0) = arrGerados(0) &","& NumReg 
            End IF 
               var_arrGerados = Join(arrGerados) 
         End IF 
      Next 
   GeraRegistros = var_arrGerados 
   End Function 
   ' Array????? gerado, podemos iniciar a formata??o de perguntas    
      number = GeraRegistros(totalNumber) 
    
   verNum = Split(number, ",") 
   %>

<html>
<head>
<title>R&aacute;dio Luz e Alegria AM/FM</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilo.css" rel="stylesheet" type="text/css">


<script language="javascript">
function centraliza(x,y)
{
        window.resizeTo(x,y);
        window.moveTo((window.screen.width-x)/2,(window.screen.height-y)/2);
}
centraliza(414,384);
</script>

<script language=JavaScript>
<!--

//Disable right click script III- By Renigade (renigade@mediaone.net)
//For full source code, visit http://www.dynamicdrive.com
var message="";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}

document.oncontextmenu=new Function("return false")
// --> 
</script>
<SCRIPT language=JavaScript>
<!--
var a = -1

wma = new Array();
autor = new Array();
titulos = new Array();

<%
y = 0
For x = LBound(verNum) to UBound(verNum) 
%>
	wma[<%response.write (y)%>]= "<%response.write arySub(4,verNum(x))%>";
	autor[<%response.write (y)%>] = "<%response.write arySub(2,verNum(x))%>";
	titulos[<%response.write (y)%>]= "<%response.write arySub(3,verNum(x))%>";
<%
y = y + 1
Next

%>
var maxmusic = <% Response.Write(y)%>;


ns4 = (document.layers)? true:false
ie4 = (document.all)? true:false
parada=0

function inicio() {
	document.all.mautor.innerText=autor[0];
	document.all.mnome.innerText=titulos[0];
}

var bWin32IE;
if ((navigator.userAgent.indexOf("IE") != "-1") && (navigator.userAgent.length > 1)) {
	bWin32IE = true;
} else {
	bWin32IE = false;
}

function fechar()
{
	window.close()
}

function troca() {
	if (MediaPlayer.PlayState==0) {
		if (parada==0){
			onFF();
			onPlay();
		}
	}
	setTimeout('troca();',1000); 
}

function layerWrite(id,nestref,text) {	
	if (ns4) {
		if (nestref)
			var lyr = eval('document.'+nestref+'.document.'+id+'.document');
		else 
			var lyr = document.layers[id].document;
		lyr.open();
		lyr.write(text);
		lyr.close();
	} else if (ie4) { 
		document.all[id].innerHTML = text;
	}
}

function mostra() {
	if (ns4){
		document.layers["mnome"].document.open()
		document.layers["mnome"].document.write(titulos[a])
		document.layers["mnome"].document.close()

		document.layers["mautor"].document.open()
		document.layers["mautor"].document.write(autor[a])
		document.layers["mautor"].document.close()
		
		var proximamusic;
		proximamusic = (a + 1);
		b = maxmusic;
if (proximamusic == b){
proximamusic = 0;
}
else
{
proximamusic = (a + 1);
}

		document.layers["proxima"].document.open()
		document.layers["proxima"].document.write(autor[a + 1] + "/" + titulos[a + 1])
		document.layers["proxima"].document.close()

	}
	
	if (ie4){
		document.all.mnome.innerText=titulos[a];
		document.all.mautor.innerText=autor[a];
		var proximamusic;
		proximamusic = (a + 1);
		b = maxmusic;
if (proximamusic == b){
proximamusic = 0;
}
else
{
proximamusic = (a + 1);
}
		document.all.proxima.innerText=autor[proximamusic] + "/" + titulos[proximamusic];
	}
}


function mudwma(k) {
	MediaPlayer.Filename=wma[k];
	mostra();
}

function onFF() {
	a = a + 1;
	b = maxmusic;
	if (a == b){
		a = 0;
	}
	mudwma(a);
}

function onFF2() {
	a = a - 1;
	b = maxmusic;
	if (a == b){
		a = 0;
	}
	mudwma(a);
}


function onPause()    {

	if (navigator.appName.indexOf('Netscape') != -1)
            estado=document.MediaPlayer.GetPlayState();
        else
            estado=document.MediaPlayer.PlayState;

	if(estado==1)
        	document.MediaPlayer.Play();
	else if (estado==2)
        	document.MediaPlayer.Pause();

    }

function onPlay() {
	if(MediaPlayer.PlayState == 0){
		MediaPlayer.Play();
		parada=0;
	}
	mostra();
}

function onStop() {
	MediaPlayer.Stop();
    parada=1;
}

function onVolumeUp() {
	if (MediaPlayer.Volume <= -300) {
		MediaPlayer.Volume = MediaPlayer.Volume + 300;
	}
}

function onVolumeDown() {
	if (MediaPlayer.Volume >= -8000) {
		MediaPlayer.Volume = MediaPlayer.Volume - 300;
	}
}

/*
function MM_changeProp(objName,x,theProp,theValue) { //v3.0
	var obj = MM_findObj(objName);
	if (obj && (theProp.indexOf("style.")==-1 || obj.style)) eval("obj."+theProp+"='"+theValue+"'");
}
*/
//-->
</SCRIPT>

</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="troca();inicio(); onFF();">
<table width="372" border="1" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="3"><p>
        <embed src="cimario.swf" width="380" height="120"></embed></p>
      
    </td>
  </tr>
  <tr> 
    <td width="26" valign="top" bgcolor="#000000">&nbsp;</td>
    <td width="320" valign="bottom" bgcolor="#000000"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td height="18" class="Radio"><table width="100%" height="18" border="0" cellpadding="0" cellspacing="0" class="Radio">
              <tr> 
                <td width="13%">&nbsp;T&iacute;tulo:</td>
                <td width="87%"  id=mautor></td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="18" class="Radio"><table width="100%" height="18" border="0" cellpadding="0" cellspacing="0" class="Radio">
              <tr> 
                <td width="11%">&nbsp;Detalhes:</td>
                <td width="89%"  id=mnome>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td height="18" class="Radio"> <table width="100%" border="0" cellpadding="0" cellspacing="0" class="Radio">
              <tr> 
                <td width="15%" height="18">&nbsp;Pr&oacute;xima:</td>
                <td width="85%" id=proxima>&nbsp;</td>
              </tr>
            </table></td>
        </tr>
        <tr> 
          <td><object id="MediaPlayer" style="width:100%; height:20;" classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95"   codebase="http://activex.microsoft.com/activex/%20%20%20controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701" standby="Loading Microsoft? Windows? Media Player components..." type="application/x-oleobject" VIEWASTEXT>
              <param name="AutoStart" value="1">
              <param name="TransparentAtStart" value="1">
              <param name="ShowControls" value="0">
              <param name="ShowDisplay" value="0">
              <param name="ShowStatusBar" value="1">
              <param name="AutoSize" value="False">
              <param name="AnimationAtStart" value="False">
              <param name="Filename" value="">
              <embed type="application/x-mplayer2" pluginspage="http://www.microsoft.com/windows/mediaplayer/download/default.asp" border="0" src="" autostart="True" transparentatstart="True" showcontrols="0" showdisplay="0" showstatusbar="1" animationatstart="False" id="MediaPlayer" designtimesp="9716" autosize="False" filename="" width="300" height="20"></embed> 
            </object></td>
        </tr>
      </table></td>
    <td width="26" valign="top" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3"><hr></td>
  </tr>
  <tr> 
    <td colspan="3"><div align="center"><font color="#FFFFFF"><img src="Imagens/07_compact.jpg" width="372" height="35" border="0" usemap="#Map"></font><font color="#FFFFFF">
        <map name="Map">
          <area shape="rect">
          <area shape="circle" coords="41,14,9" href="#" alt="Play" onClick="onPlay();">
          <area shape="circle" coords="60,17,7" href="#" alt="Stop" onClick="onStop();">
          <area shape="circle" coords="77,18,7" href="#" alt="Pausa" onClick="onPause();">
          <area shape="rect" coords="289,14,317,28" href="#" alt="Baixar Volume" onClick="onVolumeDown();">
          <area shape="rect" coords="317,14,342,28" href="#" alt="Aumentar Volume" onClick="onVolumeUp();">
          <area shape="circle" coords="162,21,33" href="#" alt="Anterior" onClick="onFF2();">
          <area shape="circle" coords="244,23,36" href="#" alt="Pr&oacute;xima" onClick="onFF();">
        </map>
        </font></div></td>
  </tr>
</table>

</body>
</html>
