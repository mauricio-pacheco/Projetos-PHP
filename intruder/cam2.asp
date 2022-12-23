<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>95.9 FM</title>
<script language="JavaScript">
<!--
var    chasm	=   screen.availWidth;
var    mount    =   screen.availHeight;
var    IpAddress =   0;
var    LivexExist =false;


var    sizeFlag1 = 1;
var    sizeFlag2 = 1;
var    sTitle = "";


function Play()
{  
 
  CreateX();
  if( LivexExist ){
  try{   
        document.WebCamX5.PlayX();  
      
   }catch(e){
	alert("Please refresh Browser. e_PLAY");
   }   
 }
}



function PTZControl()
{
 if( LivexExist ){
   try{
   
       document.WebCamX5.PTZControlX();
     
   }catch(e){
	alert("Please refresh Browser. e_PTZControl");
   }
 }
}


function ShowSystemMenu()
{  
 if( LivexExist ){     
  try{   
        document.WebCamX5.ShowSYSMenu();  
      
   }catch(e){
	alert("ActiveX downloading please refresh");
   }   
 }   
}


function IOControl()
{
 if( LivexExist ){
   try{
   
       document.WebCamX5.IOControlX();
     
   }catch(e){
	alert("Please refresh Browser. e_IOControl");
   }
 }
}




function FileSave()
{
 if( LivexExist ){
   try{
   
       document.WebCamX5.SaveX();
     
   }catch(e){
	alert("Please refresh Browser. e_FileSave");
   }
 }
}


function Stop()
{
 if( LivexExist ){
  try{
   
       document.WebCamX5.StopX();  
      
   }catch(e){
	alert("Please refresh Browser. e_Stop");
   }
 }
   	
}

function Zoom()
{
 if( LivexExist ){
   try{       
      document.WebCamX5.FullScreenX();  	    	       
     
     }catch(e){
	alert("Please refresh Browser. e_Zoom");
   }
 }
}





function SnapShot()
{
 
 if( LivexExist ){
   try{
  
   document.WebCamX5.SnapShotX();
       
   }catch(e){
	alert("Please refresh Browser. e_SS");
   }
 }
}


function ShowCamMenu()
{    
 if( LivexExist ){   
  try{    
       document.WebCamX5.ShowCamMenuX();
    
   }catch(e){
	alert("Please refresh Browser. s_ShowCamMenu");
   }
 }
}

function ChangeQuality()
{     
 if( LivexExist ){
   try{
   	document.WebCamX5.ShowQulMenuX();  
   }catch(e){
	alert("Please refresh Browser. e_ChangeQuality");
   }
 }   
}

function AudioControl()
{     
  if( LivexExist ){
   try{
   	document.WebCamX5.AudioControlX();  
   }catch(e){
	alert("Please refresh Browser. e_AudioControl");
   }
  }
}

function MicControl()
{     
 if( LivexExist ){
   try{
   	document.WebCamX5.MicControlX();  
   }catch(e){
	alert("Please refresh Browser. e_MicControl");
   }
 }
}

function CreateX()
{  
 
  try{
  	document.WebCamX5.CreateX();
  	if(IpAddress == 0) 
  	{
  	  document.WebCamX5.IpAddress= document.location;  	
  	}
  	else
  	{
  	  document.WebCamX5.IpAddress= IpAddress;
  	}
 	 
 	 document.WebCamX5.CommandPort = CommandPort;
    	 document.WebCamX5.DataPort = DataPort;
    	 document.WebCamX5.AudioDataPort = AudioPort;
    	 LivexExist = true;
    	 
   }catch(e){
	alert("Please refresh Browser. e_CreateX");
	LivexExist = false;
   }

}

function DestroyX()
{  
 if( LivexExist ){
  try{
    document.WebCamX5.DestroyX();
  }catch(e){
	alert("Please refresh Browser. e_DestroyX");
   }
 }
}

function OCXChecker()
{
	OCXChecker1.StartOCXChecker("LiveXOCXChecker.txt",document.location);

}

//-->
</script>

</script>
<SCRIPT id="clientEventHandlersJS" language="javascript"> 
<!-- 
function OCXCheckerComplete() { 
	LivexExist=true;
} 
--> 
</SCRIPT> 

<SCRIPT id="clientEventHandlersJS" language="javascript"> 
<!-- 
function OCXCheckerDownloadComplete() { 
   window.location.reload();
} 
--> 
</SCRIPT> 

<SCRIPT id="clientEventHandlersJS" language="javascript"> 
<!-- 
function OCXCheckerDownloadCancel() { 
   window.close();
} 
--> 
</SCRIPT> 


<SCRIPT id="clientEventHandlersJS" language="javascript"> 
<!-- 
function OnUpdateTitle() {      
   sTitle = WebCamX5.GetAlarmCaption();
   document.title = sTitle; 
   sTemp = sTitle + " - Microsoft Internet Explorer";
   WebCamX5.PopupCurrentWindow(sTemp);  
} 
--> 
</SCRIPT> 

<SCRIPT language="JavaScript1.2" SRC="AC_RunActiveContent.js" type="text/javascript">
//v1.0
//Copyright 2006 Adobe Systems, Inc. All rights reserved.
function AC_AddExtension(src, ext)
{
  if (src.indexOf('?') != -1)
    return src.replace(/\?/, ext+'?'); 
  else
    return src + ext;
}

function AC_Generateobj(objAttrs, params, embedAttrs) 
{ 
  var str = '<object ';
  for (var i in objAttrs)
    str += i + '="' + objAttrs[i] + '" ';
  str += '>';
  for (var i in params)
    str += '<param name="' + i + '" value="' + params[i] + '" /> ';
  str += '<embed ';
  for (var i in embedAttrs)
    str += i + '="' + embedAttrs[i] + '" ';
  str += ' ></embed></object>';

  document.write(str);
}

function AC_FL_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".swf", "movie", "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
     , "application/x-shockwave-flash"
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_SW_RunContent(){
  var ret = 
    AC_GetArgs
    (  arguments, ".dcr", "src", "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
     , null
    );
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_GetArgs(args, ext, srcParamName, classid, mimeType){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    

    switch (currArg){	
      case "classid":
        break;
      case "pluginspage":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
      case "src":
      case "movie":	
        args[i+1] = AC_AddExtension(args[i+1], ext);
        ret.embedAttrs["src"] = args[i+1];
        ret.params[srcParamName] = args[i+1];
        break;
      case "onafterupdate":
      case "onbeforeupdate":
      case "onblur":
      case "oncellchange":
      case "onclick":
      case "ondblClick":
      case "ondrag":
      case "ondragend":
      case "ondragenter":
      case "ondragleave":
      case "ondragover":
      case "ondrop":
      case "onfinish":
      case "onfocus":
      case "onhelp":
      case "onmousedown":
      case "onmouseup":
      case "onmouseover":
      case "onmousemove":
      case "onmouseout":
      case "onkeypress":
      case "onkeydown":
      case "onkeyup":
      case "onload":
      case "onlosecapture":
      case "onpropertychange":
      case "onreadystatechange":
      case "onrowsdelete":
      case "onrowenter":
      case "onrowexit":
      case "onrowsinserted":
      case "onstart":
      case "onscroll":
      case "onbeforeeditfocus":
      case "onactivate":
      case "onbeforedeactivate":
      case "ondeactivate":
      case "type":
      case "codebase":
        ret.objAttrs[args[i]] = args[i+1];
        break;
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "id":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }
  ret.objAttrs["classid"] = classid;
  if (mimeType) ret.embedAttrs["type"] = mimeType;
  return ret;
}
</SCRIPT>
<SCRIPT language="JavaScript1.2" SRC="AC_ActiveX.js" type="text/javascript">
//v1.1
//Copyright 2006 Adobe Systems, Inc. All rights reserved.
function AC_AX_RunContent(){
  var ret = AC_AX_GetArgs(arguments);
  AC_Generateobj(ret.objAttrs, ret.params, ret.embedAttrs);
}

function AC_AX_GetArgs(args){
  var ret = new Object();
  ret.embedAttrs = new Object();
  ret.params = new Object();
  ret.objAttrs = new Object();
  for (var i=0; i < args.length; i=i+2){
    var currArg = args[i].toLowerCase();    

    switch (currArg){	
      case "pluginspage":
      case "type":
      case "src":
        ret.embedAttrs[args[i]] = args[i+1];
        break;
      case "data":
      case "codebase":
      case "classid":
      case "id":
      case "onafterupdate":
      case "onbeforeupdate":
      case "onblur":
      case "oncellchange":
      case "onclick":
      case "ondblClick":
      case "ondrag":
      case "ondragend":
      case "ondragenter":
      case "ondragleave":
      case "ondragover":
      case "ondrop":
      case "onfinish":
      case "onfocus":
      case "onhelp":
      case "onmousedown":
      case "onmouseup":
      case "onmouseover":
      case "onmousemove":
      case "onmouseout":
      case "onkeypress":
      case "onkeydown":
      case "onkeyup":
      case "onload":
      case "onlosecapture":
      case "onpropertychange":
      case "onreadystatechange":
      case "onrowsdelete":
      case "onrowenter":
      case "onrowexit":
      case "onrowsinserted":
      case "onstart":
      case "onscroll":
      case "onbeforeeditfocus":
      case "onactivate":
      case "onbeforedeactivate":
      case "ondeactivate":
        ret.objAttrs[args[i]] = args[i+1];
        break;
      case "width":
      case "height":
      case "align":
      case "vspace": 
      case "hspace":
      case "class":
      case "title":
      case "accesskey":
      case "name":
      case "tabindex":
        ret.embedAttrs[args[i]] = ret.objAttrs[args[i]] = args[i+1];
        break;
      default:
        ret.embedAttrs[args[i]] = ret.params[args[i]] = args[i+1];
    }
  }
  return ret;
}

</SCRIPT>
<SCRIPT language="JavaScript1.2" SRC="Server.js" type="text/javascript"></SCRIPT>
<SCRIPT language="JavaScript1.2" SRC="setup.js" type="text/javascript"></SCRIPT>


<SCRIPT LANGUAGE=javascript FOR=OCXChecker1 EVENT=Complete>
<!--
 OCXCheckerComplete()
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=OCXChecker1 EVENT=DownloadComplete>
<!--
 OCXCheckerDownloadComplete()
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=OCXChecker1 EVENT=DownloadCancel>
<!--
 OCXCheckerDownloadCancel()
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=WebCamX5 EVENT=UpdateHTMLTitle>
<!--
 OnUpdateTitle();
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=WebCamX5 EVENT=AlarmPopup>
<!--
 OnAlarmPopup();
//-->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta HTTP-EQUIV="refresh" CONTENT="300;URL=http://www.luzealegria.com.br/fim2.php">
<style type="text/css">
<!--
body {
	background-color: #0099cc;
}
-->
</style></head>
<script language="JavaScript">
<!-- hide on

function popup(popupfile,winheight,winwidth,scrolls)
{
open(popupfile,"PopupWindow","resizable=no,height=" + winheight + ",width=" + winwidth + ",scrollbars=no" + scrolls);
}

// hide off -->
</script>
<body topmargin="0" leftmargin="0">
<object classid="clsid:1DB93715-3B60-43ee-93E6-279BB3E1DF76" id="OCXChecker1" width="1" height="1"  codebase="cab/OCXChecker_6110.cab#version=6,1,1,0">
        <param name="_Version" value="65536">
        <param name="_ExtentX" value="8281">
        <param name="_ExtentY" value="1455">
        <param name="_StockProps" value="0">
    </object>
<table width="362" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1%"><table width="359" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#0099cc">
          <td width="355"><object classid="clsid:DA8484DE-52DB-4860-A986-61A8682E298A" id="WebCamX5" width="355" height="300"  codebase="cab/Live.cab#version=6,0,1,0">
            <param name="_Version" value="65536">
            <param name="_ExtentX" value="2646">
            <param name="_ExtentY" value="1323">
            <param name="_StockProps" value="0">
            <param name="IpAddress" value="127.0.0.1">
            <param name="CommandPort" value="4550">
            <param name="DataPort" value="5550">
            <param name="BandWidth" value="LAN">
            <param name="DisablePWD" value="1">
            <param name="UserName" value="am">
            <param name="Password" value="123456">
            <param name="DefaultCam" value="5">
          </object></td>
        </tr>
      </table></td>
  </tr>
</table>

<table width="362" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1%"><table width="359" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#0099cc">
        <td width="355"><table width="100%" border="1">
          <tr>
            <td width="7%" bgcolor="#000000"><div align="center"><a href="javascript:Stop()"><img src="http://www.luzealegria.com.br/stop.gif" width="19" height="16" alt="STOP" border="0"></a></div></td>
            <td width="3%" bgcolor="#000000"><div align="center"><a href="javascript:Play()"><img src="http://www.luzealegria.com.br/play.gif" width="19" height="16" alt="PLAY" border="0"></a></div></td>
            <td width="90%" bgcolor="#0099cc"><marquee scrolldelay="0" scrollamount="5" behavior="scroll" direction="left" class="texto" style="color:#000000">
            <A class=mssansserif1d><font color="#006600" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Programação Radio Luz e 
                  Alegria FM 95.9</font></strong></font><font color="#FFFFFF"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Segunda a Sexta:|06:00hs – Momento de Pausa e 
                  Reflexão|06:20hs – Um Novo Dia começa Para Ti|07:00hs - Pelos 
                  Caminhos do Sul|08:00hs – Correspondente Ipiranga - Rede 
                  Gaúcha Sat|08:10hs – Brasil Sertanejo|09:00hs – Noticia na 
                  Hora Certa - Rede Gaúcha Sat|09:02hs – Estação da 
                  Manhã|10:00hs - Noticia na Hora Certa - Rede Gaúcha 
                  Sat|11:00hs - Noticia na Hora Certa - Rede Gaúcha Sat|11:45hs 
                  – Momento de Pausa e Reflexão|12:00hs - Noticia na Hora Certa 
                  - Rede Gaúcha Sat|12:02hs – Som Brasil|12:50hs – 
                  Correspondente Ipiranga – Rede Gaúcha Sat|13:00hs – Rádio 
                  Pocker|14:00hs - Noticia na Hora Certa - Rede Gaúcha 
                  Sat|15:00hs - Noticia na Hora Certa - Rede Gaúcha Sat|16:00hs 
                  - Noticia na Hora Certa - Rede Gaúcha Sat|17:00hs - Noticia na 
                  Hora Certa - Rede Gaúcha Sat|17:02hs – FM Sertanejo|18:00hs - 
                  Noticia na Hora Certa - Rede Gaúcha Sat|18:02hs – Melhores do 
                  Dia|19:00hs – Voz do Brasil|20:00hs – Correspondente Ipiranga 
                  – Rede Gaúcha Sat|20:10hs – Noite à Dentro(Domingo à 
                  Quinta)|20:10hs – Adrenalina(sexta-feira)|00:00hs - 
                  Madrugadão|Sábado|06:00hs – Momento de Pausa e 
                  Reflexão|06:15hs – Sábado Gaúcho|07:00hs – Programa 
                  Quero-Quero|09:00hs – Programa Fim de Semana|11:00hs – 
                  Informativo URI-F.W|11:30hs – Programa CLJ|11:45hs – Momento 
                  de Pausa e Reflexão|12:00hs – Sabadão Sertanejo|12:00hs – 
                  Sabadão Sertanejo|19:00hs – Voz da Diocese|19:30hs – 
                  Dinamite|00:00hs - Madrugadão|Domingo|06:00hs – Momento de 
                  Pausa e Reflexão|06:15hs – Domingo Musical|09:00hs – Santa 
                  Missa Dominical – Catedral Diocesana|10:00hs – Nativismo do 
                  Rio Grande|12:00hs – Voz da Diocese|12:30hs – Informativo 
                  Sicredi Alto Uruguai|13:00hs – Super Interativo|18:00hs – 
                  Momento de Pausa e Reflexão|19:00hs – Santa Missa Dominical – 
                  Catedral Diocesana|20:00hs – Noite a Dentro|00:00hs – 
                  Madrugadão|</font></strong></font></a> 
            </marquee></td>
            <td width="3%" bgcolor="#000000"><div align="center"><a onClick="window.open('ajuda.asp','Janela','toolbar=no,location=no,width=450,height=350,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no'); return false;" href="http://www.luzealegria.com.br/ajuda.asp"><img src="http://www.luzealegria.com.br/nops.jpg" width="80" border="0" height="16" alt="PROBLEMAS NO ACESSO"></a></div></td>
          <td width="3%" bgcolor="#000000"><div align="center"><a
href="javascript:window.close()"><img src="http://www.luzealegria.com.br/x.gif" width="19" border="0" height="16" alt="FECHAR JANELA"></a></div></td>
            </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
<TR>
                                
  <TD bgColor=#e6d9ba>&nbsp; </TD>
</TR>
                                <TR>
                                <TD 
                                background="Luz e Alegria AM - FM_arquivos/cellpic1.gif" 
                                bgColor=#e6d9ba 
                                height=26>&nbsp;</TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
</body>
</html>