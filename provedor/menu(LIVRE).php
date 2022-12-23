 
<STYLE>.mt {
	BORDER-RIGHT: #333333 1px solid; BORDER-TOP: #333333 1px solid; BORDER-LEFT: #333333 1px solid; BORDER-BOTTOM: #333333 1px solid; BACKGROUND-COLOR: #ffffff
}
.menu {
	FONT-WEIGHT: bold; FONT-SIZE: 12px; CURSOR: pointer; COLOR: #ffffff; FONT-FAMILY: arial,helvetica,sanserif; WHITE-SPACE: nowrap
}
.nav {
	FONT-SIZE: 11px; COLOR: #000000; LINE-HEIGHT: 18px; FONT-FAMILY: arial,helvetica,sanserif; WHITE-SPACE: nowrap
}
.free {
	FONT-WEIGHT: bold; FONT-SIZE: 10px; COLOR: #cc0000; LINE-HEIGHT: 18px; FONT-FAMILY: arial,helvetica,sanserif; WHITE-SPACE: nowrap
}
.nav2 {
	PADDING-RIGHT: 6px; PADDING-LEFT: 6px; FONT-SIZE: 11px; PADDING-BOTTOM: 2px; CURSOR: pointer; COLOR: #333333; LINE-HEIGHT: 18px; PADDING-TOP: 2px; BORDER-BOTTOM: #cccccc 1px solid; FONT-FAMILY: arial,helvetica,sanserif; WHITE-SPACE: nowrap; BACKGROUND-COLOR: #F9F3AC
}
A.nav:link {
	COLOR: #333333; TEXT-DECORATION: none
}
A.nav:visited {
	COLOR: #333333; TEXT-DECORATION: none
}
A.nav:hover {
	CURSOR: hand; COLOR: #000000; TEXT-DECORATION: underline
}
A.nav:active {
	COLOR: #000000; TEXT-DECORATION: none
}
#main {
	Z-INDEX: 20; VISIBILITY: visible; WIDTH: 770; POSITION: relative
}
#domd {
	Z-INDEX: 100; LEFT: 0px; VISIBILITY: hidden; WIDTH: 124px; POSITION: absolute; TOP: 24px
}
#hostd {
	Z-INDEX: 100; LEFT: 120px; VISIBILITY: hidden; WIDTH: 140px; POSITION: absolute; TOP: 24px
}
#webd {
	Z-INDEX: 100; LEFT: 253px; VISIBILITY: hidden; WIDTH: 109px; POSITION: absolute; TOP: 24px
}
#ed {
	Z-INDEX: 100; LEFT: 300px; VISIBILITY: hidden; WIDTH: 64px; POSITION: absolute; TOP: 24px
}
#ssld {
	Z-INDEX: 100; LEFT: 381px; VISIBILITY: hidden; WIDTH: 130px; POSITION: absolute; TOP: 24px
}
#ecod {
	Z-INDEX: 100; LEFT: 390px; VISIBILITY: hidden; WIDTH: 102px; POSITION: absolute; TOP: 24px
}
#dad {
	Z-INDEX: 100; LEFT: 513px; VISIBILITY: hidden; WIDTH: 120px; POSITION: absolute; TOP: 24px
}
#wwdd {
	Z-INDEX: 100; LEFT: 640px; VISIBILITY: hidden; WIDTH: 120px; POSITION: absolute; TOP: 24px
}
</STYLE>
<SCRIPT src="menu_arquivos/dn.js" type=javascript></SCRIPT>
<SCRIPT language=javascript type=text/javascript>
var agt=navigator.userAgent.toLowerCase();
var is_safari = agt.indexOf("safari")!=-1;

function getdropdowns(){
	var dn = 'domd';startdiv(dn,'125');
	bi('index.php',dn,'Perfil');
	bi('index.php',dn,'Informações');
	bi('index.php',dn,'Símbolos');
	enddiv(); 
	dn = 'hostd';startdiv(dn ,'131');
	bi('index.php',dn ,'Comércio');
	bi('index.php',dn ,'Engenharia');
	bi('index.php',dn ,'Factoring');
	bi('index.php',dn ,'Fazendas');
	enddiv();
	dn = 'webd';startdiv(dn,'130');
	bi('index.php',dn,'Hospedagem 1');
	bi('index.php',dn,'Hospedagem 2');
	bi('index.php',dn,'Hospedagem 3');
	bi('index.php',dn,'Hospedagem 4');
	bi('index.php',dn,'Disco Virtual');
	enddiv();
	dn = 'ssld';startdiv(dn,'134');
	bi('index.php',dn,'Quem somos');
	bi('index.php',dn,'Localização');
	bi('index.php',dn,'Clientes');
	enddiv();
	dn = 'ecod';startdiv(dn,'130');
	bi('index.php',dn,'Link 1');
	bi('index.php',dn,'Link 2');
	bi('index.php',dn,'Link 3');
	enddiv();
	dn = 'dad';
	startdiv(dn,'129');
	bi('index.php',dn,'Fotos');     
	bi('index.php',dn,'Publicidade');       
	enddiv();
	dn = 'wwdd';
	startdiv(dn,'130');
	bi('index.php',dn,'Fale Conosco');
	bi('index.php',dn,'Dúvidas'); 
	enddiv();
}

function startdiv(idval,w){
	var s = document.write ('<div id="'+idval+'"><table width="'+w+'" border="0" cellpadding="0" cellspacing="0" class="mt">');
}
function enddiv(){
	var s = document.write ("</table></div>");
}
function bi(link,div,name){
	var s = document.write ("<tr><td onClick=\"lnk('"+link+"');\" onMouseOver=\"menuovr('"+div+"','"+pn(name)+"',this);\" onMouseOut=\"menuout('"+div+"',this);\" class=\"nav2\">"+name+"</td></tr>");
}
function pn(name){
	var s=name;if(s.indexOf("<")>0) {return(s.slice(0,s.indexOf("<")-1));}return(s);
}
function lnk(link){
	internal_clicked = true;
	window.open(link,'_self');
}
function mainovr(div,status){
	if(is_safari){
		bHover=status;window.status=status;setDD(div,status,false);}
	else{
		bHover=status;window.status=status;setTimeout('setDD(\'' + div + '\', \'' + status + '\', false)',10);}
}
function mainout(div){
	bHover='';window.status='';setDDTimeout(div);
}
function menuovr(div, link, item){
	window.status=link;item.style.backgroundColor='#F8F8F3';setDD(div,'',true);
}
function imgovr(div){
}
function menuout(div, item){
	setDDTimeout(div);item.style.backgroundColor='#F9F3AC';
}
function findDiv(n, d) { 
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=findDiv(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}
function tNav() { 	
	var i,p,v,obj,args=tNav.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=findDiv(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v='hide')?'hidden':v; }
    obj.visibility=v; }    
}
function hideDDs(sect) {
	tNav('domd','','hide');tNav('hostd','','hide');tNav('webd','','hide');tNav('ed','','hide');tNav('ssld','','hide');tNav('ecod','','hide');tNav('dad','','hide');tNav('wwdd','','hide');showElement('SELECT');
}
function hideDD(sect) {
	tNav(sect,'','hide');hideDDs(sect);
}
var secSet = null;
var activeTimer = null;
var bHover = '';
var img = '';
function setDD(sect, windowStatusVal, bshow) {
	hideDDs(sect);
	if ((bHover==windowStatusVal)||(bshow)){
		tNav(sect,'','show');
		if (secSet != null) window.clearTimeout(secSet);		
		hideElement('SELECT', document.all[sect]); 
	}
}
function setDDTimeout(sect){
	if (secSet != null) window.clearTimeout(secSet);
	secSet = window.setTimeout('hideDD("' + sect + '")',1000);
}
function hideElement( elmID, overDiv ) {
  if(document.all) {
    for(i = 0; i < document.all.tags( elmID ).length; i++) {
      obj = document.all.tags( elmID )[i];
      if(!obj || !obj.offsetParent) continue;
      // Find the element's offsetTop and offsetLeft relative to the BODY tag.
      objLeft   = obj.offsetLeft - overDiv.offsetParent.offsetLeft;
      objTop    = obj.offsetTop;
      objParent = obj.offsetParent;
      while(objParent.tagName.toUpperCase() != 'BODY') {
        objLeft  += objParent.offsetLeft;
        objTop   += objParent.offsetTop;
        objParent = objParent.offsetParent;}
      objHeight = obj.offsetHeight;
      objWidth  = obj.offsetWidth;
      if((overDiv.offsetLeft + overDiv.offsetWidth) <= objLeft);
      else if((overDiv.offsetParent.offsetTop + overDiv.offsetHeight + 20) <= objTop);
      else if(overDiv.offsetTop >= eval(objTop + objHeight));
      else if(overDiv.offsetLeft >= eval(objLeft + objWidth));
      else {
        obj.style.visibility = 'hidden';
      }
    }
  }
}

function showElement(elmID) {
  if(document.all) {
    for(i = 0; i < document.all.tags( elmID ).length; i++) {
      obj = document.all.tags(elmID)[i];
      if(!obj || !obj.offsetParent) continue;
      obj.style.visibility = '';
    }
  }
}
</SCRIPT>
        
<DIV id=main> 
  <TABLE 
style="BORDER-RIGHT: #000000 1px solid; BORDER-TOP: #000000 1px solid; BORDER-LEFT: #000000 1px solid; CURSOR: pointer; BORDER-BOTTOM: #000000 1px solid" 
cellSpacing=0 cellPadding=0 width=770 background=menu_arquivos/bck_img_grey.gif 
border=0>
    <TBODY>
      <TR> 
        <TD class=menu onmouseover="mainovr('domd','Cidade')" 
     onclick="lnk('index.php');"
	 onmouseout="mainout('domd')" align=middle width=123 height=23><div align="center"><font color="#FFFFFF">Home</font></div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
        <TD width=2><IMG height=23 src="menu_arquivos/menu_div.png" width=2></TD>
        <TD class=menu onmouseover="mainovr('hostd','Softwares')" 
     onmouseout="mainout('hostd')" align=middle width=123 height=23><div align="center">Softwares</div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
        <TD width=2><IMG height=23 src="menu_arquivos/menu_div.png" width=2></TD>
        <TD class=menu onmouseover="mainovr('webd','Planos')" 
    onmouseout="mainout('webd')" align=middle width=123 height=23><div align="center">Planos</div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
        <TD width=2><IMG height=23 src="menu_arquivos/menu_div.png" width=2></TD>
        <TD class=menu onmouseover="mainovr('ssld','Empresa')" 
    onmouseout="mainout('ssld')" align=middle width=123 height=23><div align="center">Empresa</div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
        <TD width=2><IMG height=23 src="menu_arquivos/menu_div.png" width=2></TD>
        <TD class=menu onmouseover="mainovr('dad','Outros')" 
    onmouseout="mainout('dad')" align=middle width=123 height=23><div align="center">Outros</div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
        <TD width=2><IMG height=23 src="menu_arquivos/menu_div.png" width=2></TD>
        <TD class=menu onmouseover="mainovr('wwdd','Contatos')" 
    onmouseout="mainout('wwdd')" align=middle width=123 height=23><div align="center">Contatos</div></TD>
        <TD width=20 height=8><img src="seta.gif" width="13" height="14"></TD>
      </TR>
    </TBODY>
  </TABLE>
  <SCRIPT language=javascript>getdropdowns();</SCRIPT>
</DIV>
</SPAN><!-- END GODADDY HEADER -->
<STYLE type=text/css>TD {
	FONT-SIZE: 11px; FONT-FAMILY: arial,helvetica
}
A:link {
	COLOR: #0033cc
}
A:visited {
	COLOR: #0033cc
}
.t10 {
	FONT-WEIGHT: normal; FONT-SIZE: 10px; COLOR: #000000; FONT-FAMILY: arial,helvetica
}
.t11 {
	FONT-WEIGHT: normal; FONT-SIZE: 11px; COLOR: #000000; FONT-FAMILY: arial,helvetica
}
.t12 {
	FONT-WEIGHT: normal; FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: arial,helvetica
}
.t14 {
	FONT-WEIGHT: normal; FONT-SIZE: 14px; COLOR: #000000; FONT-FAMILY: arial,helvetica
}
.red_price {
	FONT-WEIGHT: bold; FONT-SIZE: 16px; COLOR: #ff3300; FONT-FAMILY: arial,helvetica
}
.red {
	COLOR: #cc0000
}
.hb {
	COLOR: #000000; TEXT-DECORATION: none
}
A.hb:link {
	COLOR: #000000
}
A.hb:visited {
	COLOR: #000000
}
A.hb:hover {
	COLOR: #0033cc; TEXT-DECORATION: underline
}
.s1 {
	FONT-SIZE: 1px; LINE-HEIGHT: 1px
}
.s2 {
	FONT-SIZE: 2px; LINE-HEIGHT: 2px
}
.s3 {
	FONT-SIZE: 3px; LINE-HEIGHT: 3px
}
.s4 {
	FONT-SIZE: 4px; LINE-HEIGHT: 4px
}
.s6 {
	FONT-SIZE: 6px; LINE-HEIGHT: 6px
}
.s8 {
	FONT-SIZE: 8px; LINE-HEIGHT: 8px
}
.wl {
	COLOR: #ffffff; TEXT-DECORATION: none
}
A.wl:link {
	COLOR: #ffffff; TEXT-DECORATION: none
}
A.wl:visited {
	COLOR: #ffffff; TEXT-DECORATION: none
}
.hot {
	PADDING-RIGHT: 0px; PADDING-LEFT: 6px; FONT-WEIGHT: bold; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; COLOR: #ffffff; PADDING-TOP: 0px; FONT-FAMILY: arial,helvetica
}
.q {
	BORDER-RIGHT: #000000 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #000000 1px solid; PADDING-LEFT: 0px; FONT-WEIGHT: bold; FONT-SIZE: 15px; BACKGROUND-IMAGE: url(https://imagesak.godaddy.com/aaa/home/bck_img_green.gif); PADDING-BOTTOM: 2px; BORDER-LEFT: #000000 1px solid; WIDTH: 600px; COLOR: #ffffff; PADDING-TOP: 2px; BORDER-BOTTOM: #000000 1px solid; FONT-FAMILY: helvetica,arial; TEXT-ALIGN: center
}
.per {
	PADDING-RIGHT: 0px; BORDER-TOP: #000000 1px solid; PADDING-LEFT: 6px; FONT-SIZE: 13px; BACKGROUND-IMAGE: url(https://imagesak.godaddy.com/aaa/home/HP_gradient.png); PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 1px solid; COLOR: #ffffff; PADDING-TOP: 2px; BORDER-BOTTOM: #000000 1px solid; BACKGROUND-REPEAT: repeat
}
.per2 {
	BORDER-RIGHT: #000000 1px solid; PADDING-RIGHT: 0px; BORDER-TOP: #000000 1px solid; PADDING-LEFT: 6px; FONT-SIZE: 13px; BACKGROUND-IMAGE: url(https://imagesak.godaddy.com/aaa/home/HP_gradient.png); PADDING-BOTTOM: 0px; BORDER-LEFT: #000000 1px solid; COLOR: #ffffff; PADDING-TOP: 2px; BORDER-BOTTOM: #000000 1px solid; BACKGROUND-REPEAT: repeat
}
</STYLE>
