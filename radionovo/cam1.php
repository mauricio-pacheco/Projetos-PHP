<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>AM 1.160</title>
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
        document.WebCamX2.PlayX();  
      
   }catch(e){
	alert("Please refresh Browser. e_PLAY");
   }   
 }
}



function PTZControl()
{
 if( LivexExist ){
   try{
   
       document.WebCamX2.PTZControlX();
     
   }catch(e){
	alert("Please refresh Browser. e_PTZControl");
   }
 }
}


function ShowSystemMenu()
{  
 if( LivexExist ){     
  try{   
        document.WebCamX2.ShowSYSMenu();  
      
   }catch(e){
	alert("ActiveX downloading please refresh");
   }   
 }   
}


function IOControl()
{
 if( LivexExist ){
   try{
   
       document.WebCamX2.IOControlX();
     
   }catch(e){
	alert("Please refresh Browser. e_IOControl");
   }
 }
}




function FileSave()
{
 if( LivexExist ){
   try{
   
       document.WebCamX2.SaveX();
     
   }catch(e){
	alert("Please refresh Browser. e_FileSave");
   }
 }
}


function Stop()
{
 if( LivexExist ){
  try{
   
       document.WebCamX2.StopX();  
      
   }catch(e){
	alert("Please refresh Browser. e_Stop");
   }
 }
   	
}

function Zoom()
{
 if( LivexExist ){
   try{       
      document.WebCamX2.FullScreenX();  	    	       
     
     }catch(e){
	alert("Please refresh Browser. e_Zoom");
   }
 }
}





function SnapShot()
{
 
 if( LivexExist ){
   try{
  
   document.WebCamX2.SnapShotX();
       
   }catch(e){
	alert("Please refresh Browser. e_SS");
   }
 }
}


function ShowCamMenu()
{    
 if( LivexExist ){   
  try{    
       document.WebCamX2.ShowCamMenuX();
    
   }catch(e){
	alert("Please refresh Browser. s_ShowCamMenu");
   }
 }
}

function ChangeQuality()
{     
 if( LivexExist ){
   try{
   	document.WebCamX2.ShowQulMenuX();  
   }catch(e){
	alert("Please refresh Browser. e_ChangeQuality");
   }
 }   
}

function AudioControl()
{     
  if( LivexExist ){
   try{
   	document.WebCamX2.AudioControlX();  
   }catch(e){
	alert("Please refresh Browser. e_AudioControl");
   }
  }
}

function MicControl()
{     
 if( LivexExist ){
   try{
   	document.WebCamX2.MicControlX();  
   }catch(e){
	alert("Please refresh Browser. e_MicControl");
   }
 }
}

function CreateX()
{  
 
  try{
  	document.WebCamX2.CreateX();
  	if(IpAddress == 0) 
  	{
  	  document.WebCamX2.IpAddress= document.location;  	
  	}
  	else
  	{
  	  document.WebCamX2.IpAddress= IpAddress;
  	}
 	 
 	 document.WebCamX2.CommandPort = CommandPort;
    	 document.WebCamX2.DataPort = DataPort;
    	 document.WebCamX2.AudioDataPort = AudioPort;
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
    document.WebCamX2.DestroyX();
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
   sTitle = WebCamX2.GetAlarmCaption();
   document.title = sTitle; 
   sTemp = sTitle + " - Microsoft Internet Explorer";
   WebCamX2.PopupCurrentWindow(sTemp);  
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

<SCRIPT LANGUAGE=javascript FOR=WebCamX2 EVENT=UpdateHTMLTitle>
<!--
 OnUpdateTitle();
//-->
</SCRIPT>

<SCRIPT LANGUAGE=javascript FOR=WebCamX2 EVENT=AlarmPopup>
<!--
 OnAlarmPopup();
//-->
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta HTTP-EQUIV="refresh" CONTENT="300;URL=http://www.luzealegria.com.br/fim.php">
<style type="text/css">
<!--
body {
	background-color: #006600;
}
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-size: 9px;
}
.style2 {color: #FFFF00}
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
        <tr bgcolor="#006600">
          <td width="355" bgcolor="#000000"><div align="center" class="style1"><span class="style2">PARA ACESSAR UTILIZE:</span> USU&Aacute;RIO: <strong>AM </strong>- SENHA:<strong> AM </strong></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="362" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td width="1%"><table width="359" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr bgcolor="#006600">
          <td width="355"><object classid="clsid:DA8484DE-52DB-4860-A986-61A8682E298A" id="WebCamX2" width="355" height="300"  codebase="cab/Live.cab#version=6,0,1,0">
            <param name="_Version" value="65536">
            <param name="_ExtentX" value="2646">
            <param name="_ExtentY" value="1323">
            <param name="_StockProps" value="0">
            <param name="IpAddress" value="127.0.0.1">
            <param name="CommandPort" value="4550">
            <param name="DataPort" value="5550">
            <param name="BandWidth" value="LAN">
            <param name="DisablePWD" value="0">
            <param name="DefaultCam" value="2">
          </object></td>
        </tr>
      </table></td>
  </tr>
</table>

<table width="362" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1%"><table width="359" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#006600">
        <td width="355"><table width="100%" border="1">
          <tr>
            <td width="7%" bgcolor="#000000"><div align="center"><a href="javascript:Stop()"><img src="http://www.luzealegria.com.br/stop.gif" width="19" height="16" alt="STOP" border="0"></a></div></td>
            <td width="3%" bgcolor="#000000"><div align="center"><a href="javascript:Play()"><img src="http://www.luzealegria.com.br/play.gif" width="19" height="16" alt="PLAY" border="0"></a></div></td>
            <td width="90%" bgcolor="#006600"><marquee scrolldelay="0" scrollamount="5" behavior="scroll" direction="left" class="texto" style="color:#000000">
            <A class=mssansserif1d><font color="#006600" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">Programação 
            Radio Luz e Alegria AM 1.160</font></strong></font><font color="#FFFFFF"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
            - Segunda a Sexta:|05:00hs- Despertar da Alegria|06:20hs- Um Novo 
            Dia Come&ccedil;a Para Ti|07:00hs- Noticia Hora Certa- Rede Ga&uacute;cha 
            Sat|07:02hs- Primeira Edi&ccedil;&atilde;o|08:00hs- Correspondente 
            Ipiranga- Rede Ga&uacute;cha Sat|08:30hs- LA Not&iacute;cias- Local/ 
            Regional|08:10hs- R&aacute;dio Rep&oacute;rter|09:00hs- Not&iacute;cia 
            na Hora Certa- Rede Ga&uacute;cha Sat|09:02hs- LA Regional|10:00hs- 
            Noticia na Hora Certa- Rede Ga&uacute;cha Sat|10:30hs- LA Not&iacute;cias- 
            Local/Regional|11:00hs- Not&iacute;cia na Hora Certa- Rede Ga&uacute;cha 
            Sat|11:02hs-Espa&ccedil;o Livre ( segunda &agrave; quinta)|11:02hs 
            -LA Debate ( sexta-feira)|11:45hs- Mensagem para o Lar (Ter&ccedil;a 
            e Quinta)|12:00hs- Noticia na Hora Certa- Rede Ga&uacute;cha Sat|12:00hs- 
            Jornal Das Doze|12:30hs- A Hora Do Recado|13:00hs- Esporte Total|14:00hs- 
            Noticia na Hora Certa- Rede Ga&uacute;cha Sat|14:00hs- Comunidade 
            em A&ccedil;&atilde;o|15:00hs- Noticia na Hora Certa- Rede Ga&uacute;cha 
            Sat|15:30hs- LA Not&iacute;cias- Local/Regional|16:00hs- Noticia na 
            Hora Certa- Rede Ga&uacute;cha Sat|16:30hs- LA Not&iacute;cias- Local/Regional|17:00hs- 
            Noticia na Hora Certa- Rede Ga&uacute;cha Sat|18:00hs- Boletim R&aacute;dio 
            Vaticano|18:15hs- Missa di&aacute;ria - Capela Bispado|18:50hs- Correspondente 
            Ipiranga|19:00hs- Voz Do Brasil|20:00hs- Correspondente Ipiranga ( 
            segunda,quarta,quinta e sexta)|20:00hs-Ter&ccedil;a-feira - Sess&otilde;es 
            ao vivo C&acirc;mara de Vereadores|20:10hs-Ter&ccedil;o ( segunda,quarta,quinta 
            e sexta)|20:45hs- Boletim R&aacute;dio Vaticano ( segunda,quarta,quinta 
            e sexta)|21:00hs- Not&iacute;cia na Hora Certa- Rede Ga&uacute;cha 
            Sat|21:02hs- Esporte Total 2&ordf; Edi&ccedil;&atilde;o(segunda-feira)|21:02hs- 
            LA Dentro da Noite (quarta e quinta)|21:02hs- Luar do Sert&atilde;o 
            (sexta-feira)|23:00hs- Rede Ga&uacute;cha. Sat|S&aacute;bado|06:02hs- 
            Informativo Cootrifred|07:00hs-Noticia na Hora Certa &#8211; Rede 
            Ga&uacute;cha Sat|07:05hs- Programa Concession&aacute;ria VALTRA|08:00hs- 
            Correspondente Ipiranga- Rede Ga&uacute;cha Sat|08:10hs- Musical |09:00hs- 
            Noticia na Hora Certa- Rede Ga&uacute;cha Sat |09:00hs- Programa OAB|10:00hs- 
            Informativo URI-F.W.|10:30hs- Informativo-C&acirc;mara Municipal de 
            Vereadores de F.W.|10:45hs- Informativo- Prefeitura Municipal de F.W.|11:00hs- 
            Espa&ccedil;o para o Munic&iacute;pio de Vicente Dutra|11:45hs- Rep&oacute;rter 
            Creluz|12:00hs- Informativo- Prefeitura Municipal - Vista Alegre|12:15hs- 
            Informativo- Emater - Vista Alegre|12:20hs- Informativo -Sindicato 
            de F.W.|12:35hs- Informativo -Emater de F.W.|12:40hs- Informativo 
            -Prefeitura Municipal de Cai&ccedil;ara|12:55hs- Informativo- Paroquial 
            de F.W.|13:10hs- Informativo -Paroquial de Vista Alegre|13:30hs- Informativo-Paroquial 
            de Erval Seco|14:00hs- Informativo do CEPRGS-Sindicato|14:15hs- Programa 
            da Pastoral da Sa&uacute;de Viva a Vida|14:30hs- Programa CTG Rodeio 
            da Quer&ecirc;ncia|16:00hs- Noticia na Hora Certa- Rede Ga&uacute;cha 
            Sat|16:02hs- Nativismo Canto da Terra|17:00hs- Noticia na Hora Certa 
            -Rede Ga&uacute;cha Sat|18:00hs- Noticia na Hora Certa -Rede Ga&uacute;cha 
            Sat|18:02hs -Ter&ccedil;o Vocacional|18:32hs- Boletim R&aacute;dio 
            Vaticano|19:00hs- Voz da Diocese|19:30hs- Rede Ga&uacute;cha Sat|Domingo|06:00hs- 
            Noticia na Hora Certa- Rede Ga&uacute;cha Sat|06:02hs- Amanhecendo 
            Com Alegria|07:00hs- Noticia na Hora Certa -Rede Ga&uacute;cha Sat|09:00hs- 
            Santa Missa Dominical-Catedral Diocesana|10:00hs- Programa da Melhor 
            Idade|11:45hs- Vida e Sa&uacute;de|12:00hs- Voz da Diocese|12:30hs- 
            Informativo FARSUL|13:00hs- Informativo Sicredi Alto Uruguai|13:30hs- 
            Programa&ccedil;&atilde;o Musical|14:00hs- Noticia na Hora Certa- 
            Rede Ga&uacute;cha Sat|15:00hs- Noticia na Hora Certa -Rede Ga&uacute;cha 
            Sat|15:30hs- Jornada Esportiva &#8211; Esporte Local/Regional|18:00hs- 
            Ter&ccedil;o Vocacional|18:30hs- Boletim R&aacute;dio Vaticano|19:00hs- 
            Santa Missa Dominical-Catedral Diocesana|20:00hs- Rede Ga&uacute;cha 
            Sat|</font></strong></font></a> 
            </marquee></td>
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