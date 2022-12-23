<HTML><HEAD><TITLE>Hotel Palace - Frederico Westphalen/RS</TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1252"><LINK 
href="home_arquivos/estilos.css" type=text/css rel=stylesheet>
<SCRIPT src="home_arquivos/AC_RunActiveContent.js" 
type=text/javascript></SCRIPT>

<META content="MSHTML 6.00.2900.2180" name=GENERATOR>
<style type="text/css">
<!--
.style1 {font-size: 10px}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style3 {font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style7 {
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
</HEAD>
<BODY leftMargin=0 topMargin=0 marginheight="0" marginwidth="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD rowSpan=100><IMG height=1 src="home_arquivos/espaco.gif" width=1 
      border=0></TD>
    <TD><!--idiomas-->
      <TABLE class=TextoBranco height=20 cellSpacing=0 cellPadding=0 width=778 
      bgColor=#f2f1eb background=home_arquivos/fundo_saudacao.gif border=0>
        <TBODY>
        <TR>
          <TD width="476" align=605 bgcolor="#B9241D">&nbsp&nbsp<script language="JavaScript" type="text/JavaScript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia!"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde!"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite!"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda";
diasemana[2] = "Terça";
diasemana[3] = "Quarta";
diasemana[4] = "Quinta";
diasemana[5] = "Sexta";
diasemana[6] = "Sábado";
dia = datahora.getDate();
mes = datahora.getMonth();
mesdoano = new Array(12);
mesdoano[0] = "janeiro";
mesdoano[1] = "fevereiro";
mesdoano[2] = "março";
mesdoano[3] = "abril";
mesdoano[4] = "maio";
mesdoano[5] = "junho";
mesdoano[6] = "julho";
mesdoano[7] = "agosto";
mesdoano[8] = "setembro";
mesdoano[9] = "outubro";
mesdoano[10] = "novembro";
mesdoano[11] = "dezembro";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script> - N&uacute;mero de Visitas: 
            <?php 
$fp = fopen("palace/counterlog.txt", "r"); 

$count = fread($fp, 1024); 

fclose($fp); 

$count = $count + 0; 

echo "" . $count . ""; 

$fp = fopen("counterlog.txt", "w"); 

fwrite($fp, $count); 

fclose($fp); 

?></TD>
          <TD width=302 align=right bgcolor="#B9241D"></TD>
        </TR></TBODY></TABLE><!--menu-->
      <SCRIPT language=JavaScript>
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</SCRIPT>

      <SCRIPT language=JavaScript type=text/JavaScript>
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
//-->
</SCRIPT>

      <SCRIPT language=JavaScript type=text/JavaScript>
<!--
//mostra seta no submenu
tms=new Array()

//Mostra o submenu no mouseover
function over(n){
	if(typeof(tms[n])!="undefined")clearTimeout(tms[n])
	document.getElementById("s"+n).style.visibility="visible"
}
//Esconde o submenu no mouseout
function out(n){
	tms[n]=setTimeout('document.getElementById("s'+n+'").style.visibility="hidden"',100)
}	 

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}

//-->
</SCRIPT>

      <SCRIPT language=JavaScript type=text/JavaScript>
<!--
//mostra seta no submenu
tempo=new Array()

//Mostra o submenu no mouseover
function grupoover(n){

	if(typeof(tempo[n])!="undefined")clearTimeout(tempo[n])
	document.getElementById("Randon"+n).style.visibility="visible"
	document.getElementById("Randon"+n).style.filter='alpha(opacity=100%)'

}
//-->
</SCRIPT>
<!--institucional-->
      <DIV id=institucional 
      style="Z-INDEX: 1; LEFT: 74px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu01','','home_arquivos/menu_institucional_ativo.gif',1); MM_showHideLayers('institucional','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('institucional','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
             <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s12><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(12) onmouseout=out(12) width=145><A 
                  class=MenuDropDown 
                  href="ho.php">&nbsp;&nbsp;Apartamentos</A> 
                </TD></TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s3><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(3) onmouseout=out(3) width=145><A 
                  class=MenuDropDown 
                  href="apartamentos.php">&nbsp;&nbsp;Sala de Reunião</A> 
                </TD></TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s30><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(30) onmouseout=out(30) width=145><A 
                  class=MenuDropDown 
                  href="tv.php">&nbsp;&nbsp;Sala de TV</A> 
                </TD></TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s7><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(7) onmouseout=out(7) width=145><A 
                  class=MenuDropDown 
                  href="cafe.php">&nbsp;&nbsp;Café</A> </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s8><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(8) onmouseout=out(8) width=145><A 
                  class=MenuDropDown 
                  href="saladestar.php">&nbsp;&nbsp;Sala de Estar</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s57><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(57) onmouseout=out(57) width=145><A 
                  class=MenuDropDown 
                  href="escritorio.php">&nbsp;&nbsp;Escritório</A> </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s9><IMG src="home_arquivos/seta_menu.gif" 
                  border=0></SPAN></TD>
                <TD onmouseover=over(9) onmouseout=out(9) width=145><A 
                  class=MenuDropDown 
                  href="estacionamento.php">&nbsp;&nbsp;Estacionamento</A> 
      </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--hotéis-->
      <DIV id=hoteis 
      style="Z-INDEX: 1; LEFT: 141px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu02','','home_arquivos/menu_hoteis_ativo.gif',1); MM_showHideLayers('hoteis','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('hoteis','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
             <!--
				  <tr> 
				  	<td width="2">&nbsp;</td>
					<td width="2"><span id="s2"><img src="home_arquivos/seta_menu.gif" border="0"></span></td>
					<td width="145" onmouseover="over(2)" onmouseout="out(2)"> 
						<a href="../hoteis/busca.asp?NumFuncionalidade=" class="MenuDropDown">&nbsp;&nbsp;Lançamentos</a>
					</td>
				  </tr>--></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--notícias-->
      <DIV id=noticias 
      style="Z-INDEX: 1; LEFT: 234px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu03','','home_arquivos/menu_noticias_ativo.gif',1); MM_showHideLayers('noticias','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('noticias','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--investidores-->
      <DIV id=investidores 
      style="Z-INDEX: 1; LEFT: 373px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu04','','home_arquivos/menu_investidores_ativo.gif',1); MM_showHideLayers('investidores','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('investidores','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
               </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--agências de viagens-->
      <DIV id=agencias 
      style="Z-INDEX: 1; LEFT: 488px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu05','','home_arquivos/menu_agencias_ativo.gif',1); MM_showHideLayers('agencias','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('agencias','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s21><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(21) onmouseout=out(21) width=145><A 
                  class=MenuDropDown 
                  href="galfrederico/index.html" target=_blank>&nbsp;&nbsp;Frederico Westphalen</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
				<TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s22><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(22) onmouseout=out(22) width=145><A 
                  class=MenuDropDown 
                  href="galirai/index.html" target=_blank>&nbsp;&nbsp;Iraí</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s24><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(24) onmouseout=out(24) width=145><A 
                  class=MenuDropDown 
                  href="galvicente/index.html" target=_blank>&nbsp;&nbsp;Vicente Dutra</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s25><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(25) onmouseout=out(25) width=145><A 
                  class=MenuDropDown 
                  href="galyucuma/index.html" target=_blank>&nbsp;&nbsp;Yucumã</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
				<TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s27><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(27) onmouseout=out(27) width=145><A 
                  class=MenuDropDown 
                  href="galderrubadas/index.html" target=_blank>&nbsp;&nbsp;Derrubadas</A> 
                </TD></TR>
              <TR>
                <TD colSpan=3><IMG src="home_arquivos/linha_menu.gif" 
                border=0></TD></TR>
              <TR>
                <TD width=2>&nbsp;</TD>
                <TD width=2><SPAN id=s23><IMG 
                  src="home_arquivos/seta_menu.gif" border=0></SPAN></TD>
                <TD onmouseover=over(23) onmouseout=out(23) width=145><A 
                  class=MenuDropDown 
                  href="galametista/index.html" target=_blank>&nbsp;&nbsp;Ametista do Sul</A> </TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--promoções-->
      <DIV id=promocoes 
      style="Z-INDEX: 1; LEFT: 586px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu06','','home_arquivos/menu_promocoes_ativo.gif',1); MM_showHideLayers('promocoes','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('promocoes','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
                </TR>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></DIV><!--central de contatos-->
      <DIV id=contatos 
      style="Z-INDEX: 1; LEFT: 656px; VISIBILITY: hidden; WIDTH: 150px; POSITION: absolute; TOP: 45px; HEIGHT: 168px">
      <TABLE 
      onmouseover="MM_swapImage('Menu07','','home_arquivos/menu_contatos_ativo.gif',1); MM_showHideLayers('contatos','','show')" 
      onmouseout="MM_swapImgRestore(); MM_showHideLayers('contatos','','hide')" 
      cellSpacing=0 cellPadding=0 width=149 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=1></TD>
          <TD vAlign=top>
            <TABLE 
            style="BORDER-RIGHT: #666666 1px solid; BORDER-TOP: #666666 1px solid; BORDER-LEFT: #666666 1px solid; BORDER-BOTTOM: #666666 1px solid" 
            cellSpacing=0 cellPadding=0 width=149 bgColor=#ffffff border=0>
              <TBODY>
              </TBODY></TABLE></TD></TR></TBODY></TABLE></DIV>
      <TABLE cellSpacing=0 cellPadding=0 width=778 bgColor=#f2f1eb border=0>
        <TBODY>
        <TR>
          <TD><A 
            onmouseover="MM_swapImage('MenuHome','','home_arquivos/menu_home_ativo.gif',1);" 
            onmouseout=MM_swapImgRestore(); 
            href="index.php"><IMG 
            id=MenuHome src="home_arquivos/menu_home_inativo.gif" border=0 
            name=MenuHome></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu01','','home_arquivos/menu_institucional_ativo.gif',1); MM_showHideLayers('institucional','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('institucional','','hide')" 
            ><IMG 
            id=Menu01 src="home_arquivos/menu_institucional_inativo.gif" 
            border=0 name=Menu01></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu02','','home_arquivos/menu_hoteis_ativo.gif',1); MM_showHideLayers('hoteis','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('hoteis','','hide')" 
            href="servicos.php"><IMG 
            id=Menu02 src="home_arquivos/menu_hoteis_inativo.gif" border=0 
            name=Menu02></A></TD><!--<td><a href="../hoteis/busca.asp?NumFuncionalidade=" onMouseOut="MM_swapImgRestore();" onMouseOver="MM_swapImage('Menu02','','home_arquivos/menu_hoteis_ativo.gif',1);"><img src="home_arquivos/menu_hoteis_ativoinativo.gif" border="0" name="Menu02" id="Menu02"></a></td>-->
          <TD><A 
            onmouseover="MM_swapImage('Menu03','','home_arquivos/menu_noticias_ativo.gif',1); MM_showHideLayers('noticias','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('noticias','','hide')" 
            href="localizacao.php"><IMG 
            id=Menu03 src="home_arquivos/menu_noticias_inativo.gif" border=0 
            name=Menu03></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu04','','home_arquivos/menu_investidores_ativo.gif',1); MM_showHideLayers('investidores','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('investidores','','hide')" 
            href="turismo.php"><IMG 
            id=Menu04 src="home_arquivos/menu_investidores_inativo.gif" border=0 
            name=Menu04></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu05','','home_arquivos/menu_agencias_ativo.gif',1); MM_showHideLayers('agencias','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('agencias','','hide')" 
            ><IMG 
            id=Menu05 src="home_arquivos/menu_agencias_inativo.gif" border=0 
            name=Menu05></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu06','','home_arquivos/menu_promocoes_ativo.gif',1); MM_showHideLayers('promocoes','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('promocoes','','hide')" 
            href="links.php"><IMG 
            id=Menu06 src="home_arquivos/menu_promocoes_inativo.gif" border=0 
            name=Menu06></A></TD>
          <TD><A 
            onmouseover="MM_swapImage('Menu07','','home_arquivos/menu_contatos_ativo.gif',1); MM_showHideLayers('contatos','','show')" 
            onmouseout="MM_swapImgRestore(); MM_showHideLayers('contatos','','hide')" 
            href="contatos.php"><IMG 
            id=Menu07 src="home_arquivos/menu_contatos_inativo.gif" border=0 
            name=Menu07></A></TD></TR></TBODY></TABLE></TD>
    <TD width=241 
    height=44 vAlign=top background="home_arquivos/bg_cabecallho_topo.gif" bgcolor="#D7DBD3"></TD>
  </TR>
  <TR>
    <TD vAlign=top>
      <TABLE cellSpacing=0 cellPadding=0 width=778 border=0>
        <TBODY>
        <TR>
          <TD vAlign=top width=497 bgColor=#eff1ee>
            <TABLE cellSpacing=0 cellPadding=0 width=497 border=0>
              <TBODY>
              <TR>
                <TD width=497>
                  <SCRIPT src="prin.js"></SCRIPT> <SCRIPT language=javascript>
     carregaFlash('topo_internas.swf','497','280'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></TD></TR>
              </TBODY></TABLE>
            </TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD><IMG 
                  src="home_arquivos/logo.jpg" width=281 
                  border=0></TD>
              </TR>
              <TR>
                <TD><div align="center"><SCRIPT src="prin2.js"></SCRIPT> <SCRIPT language=javascript>
     carregaFlash('wifi.swf','220','130'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div></TD>
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD vAlign=top width=497 bgColor=#eff1ee><!--conteúdo principal-->
            <TABLE cellSpacing=0 cellPadding=0 width="100%" bgColor=#eff1ee 
            border=0>
              <TBODY>
              <TR>
                <TD vAlign=top>
                  <TABLE cellSpacing=0 cellPadding=0 width="100%" 
                  bgColor=#eff1ee border=0>
                    <TBODY>
                    <TR>
                      <TD colSpan=2>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" 
border=0>
                          <TBODY>
                          <TR>
                            <TD vAlign=top><!-- 
                              -->
                              <TABLE class=TextoCinza cellSpacing=1 
                              cellPadding=1 width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD width="55%">&nbsp;&nbsp;<span class="TituloCapaG">&nbsp;Apartamentos</span></TD>
                                <TD width="30%">&nbsp;</TD>
                                <TD width="15%">&nbsp;</TD>
                                </TR>
                                <TR>
                                <TD bgColor=#cccccc colSpan=3 
height=1></TD></TR>
                                <TR>
                                <TD bgColor=#ffffff colSpan=3 
                                height=1></TD></TR></TBODY></TABLE>
                              <TABLE class=TextoCinza cellSpacing=1 
                              cellPadding=1 width="100%" border=0>
                                <TBODY>
                                <TR>
                                <TD vAlign=top>
                                  <p align="justify" class="style7">
                                    <iframe src="palace/ho.php" name="centro" width="490" height="332" frameborder="0" marginheight="0" marginwidth="0" scrolling="no"></iframe>
                                  </p>
                                  </TD>
                                </TR></TBODY></TABLE>
                              <TABLE cellSpacing=1 cellPadding=1 width="100%" 
                              border=0>
                                <TBODY>
                                </TBODY></TABLE>
                              </TD>
                            <TD 
                  width="2%"></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE><BR></TD>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD></TD>
                <TD>&nbsp;</TD>
              </TR>
              <TR>
                <TD></TD>
                <TD>&nbsp;</TD>
              </TR>
              <TR>
                <TD width="3%"></TD>
                <TD><!--conteúdo secundário-->
                  <TABLE cellSpacing=2 cellPadding=2 width="100%" border=0>
                    <TBODY>
                    <TR></TR></TBODY></TABLE>
                  <div align="center"><BR>
                    <a href="reservas.php"><img src="reserva.jpg" width="240" height="98" border="0"></a></div>
                  <TABLE cellSpacing=2 cellPadding=2 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD width="2">&nbsp;</TD>
                    </TR></TBODY></TABLE>
                  <div align="center"><BR>
                      <!--newsletter-->
                  </div>
                  <TABLE cellSpacing=2 cellPadding=2 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD><div align="center"><SCRIPT src="prin3.js"></SCRIPT> <SCRIPT language=javascript>
     carregaFlash('tel.swf','240','120'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div></TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                    </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR><!--rodape-->
        <TR>
          <TD vAlign=top width=498 background=home_arquivos/bg_rodape_esq.gif 
          height=96>
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD 
                  height=17 colSpan=2 vAlign=bottom bgcolor="#B9241D" class=TextoBranco>&nbsp;&nbsp;&nbsp;© Copyright 2006 -&nbsp;Hotel Palace  &nbsp;<!--|&nbsp; <a href="" style="color:#FFFFFF;">Política de Privacidade</a>--></TD>
              </TR>
              <TR>
                <TD colSpan=2 height=8></TD></TR>
              <TR>
                <TD>&nbsp;&nbsp;</TD>
                <TD>
                  <TABLE class=TextoCinza cellSpacing=0 cellPadding=0 
                  width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD>Rua do   Com&eacute;rcio, 789, Centro - Cep 98400-000 - Frederico Westphalen - RS - Brasil</TD>
                    </TR>
                    <TR>
                      <TD>Fone: 55 3744 - 4333  Fax: 55 3744 - 4333 </TD>
                    </TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD>
          <TD><IMG src="home_arquivos/bg_rodape_dir.jpg" useMap=#Map 
          border=0></TD>
        </TR><MAP name=Map>
            <AREA 
          onclick="atmCLL('atlanticahotels_pmweb_website')" shape=RECT 
          target=_blank alt="Casa da Web - Soluções em Marketing Digital" 
          coords=185,22,277,37 
    href="http://www.casadaweb.net/">
          </MAP></TBODY></TABLE></TD>
    <TD vAlign=top width="100%" height="100%">
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD vAlign=top bgColor=#d7dbd3 height="100%">
            <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
              <TBODY>
              <TR>
                <TD 
               width=58 
                height=187><img src="hotel.jpg"><br><br><br><TABLE width="190" border=0 cellPadding=0 cellSpacing=0>
                  <TBODY>
                    <TR>
                      <TD align=middle><div align="center"><img src="ser.gif" width="17" height="21"></div></TD>
                      <TD class=TituloCapaG style5>SERVI&Ccedil;OS</TD>
                    </TR>
                    <TR>
                      <TD align=middle width=47><div align="center"><img src="estacionamento.gif" width="20" height="19"></div></TD>
                      <TD class=texto width=132><span class="style1 style2">Estacionamento</span></TD>
                    </TR>
                    <TR>
                      <TD align=middle width=47><div align="center"><img src="eventos.gif" width="20" height="20"></div></TD>
                      <TD class=texto><span class="style1 style2">Sala 
                        de eventos</span></TD>
                    </TR>

                    <TR>
                      <TD align=middle width=47><div align="center"><img src="lavanderia.gif" width="20" height="21"></div></TD>
                      <TD class=texto><span class="style1 style2">Lavanderia</span></TD>
                    </TR>
                    <TR>
                      <TD align=middle width=47><div align="center"><img src="seguranca.gif" width="20" height="20"></div></TD>
                      <TD class=texto><span class="style1 style2">Seguran&ccedil;a</span></TD>
                    </TR>
                    <TR>
                      <TD align=middle width=47><div align="center"><img src="traslados.gif" width="20" height="20"></div></TD>
                      <TD class=texto><span class="style1 style2"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Servi&ccedil;os 
                        de traslados</font></span></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="fax.gif" width="20" height="21"></div></TD>
                      <TD class=texto><span class="style1 style2"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Fax</font></span></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="telefone.gif" width="20" height="20"></div></TD>
                      <TD class=texto style1 style2><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Telefone</font></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="ar.gif" width="20" height="20"></div></TD>
                      <TD class=texto style1 style2><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Ar Condicionado</font></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="frigobar.gif" width="20" height="20"></div></TD>
                      <TD class=texto style1 style2><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Frigobar</font></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="tv.gif" width="20" height="20"></div></TD>
                      <TD class=texto><span class="style3"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">TV 
                  &agrave; cores 14' com controle</font></span></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="bagagem.gif" width="20" height="19"></div></TD>
                      <TD class=texto style1 style2><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Guarda Bagagem</font></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="despertar.gif" width="20" height="20"></div></TD>
                      <TD class=texto style1 style2><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Despertar</font></TD>
                    </TR>
                    <TR>
                      <TD align=middle><div align="center"><img src="internet2.gif" width="20" height="20"></div></TD>
                      <TD class=texto style1 style4><font face="Verdana, Arial, Helvetica, sans-serif" size="1">Internet</font></TD>
                    </TR>
                  </TBODY>
                </TABLE></TD>
              </TR></TBODY></TABLE></TD></TR>
        <TR>
          <TD 
          style="BACKGROUND-IMAGE: url(home_arquivos/bg_capa.jpg); BACKGROUND-REPEAT: repeat-x" 
          width=241 background=home_arquivos/bg_capa.jpg 
        height=96><div align="center"><a href="http://www.oaltouruguai.com.br" target=_blank><img src="alto.jpg" width="200" height="35" border="1" bordercolor="#000000"></a></div></TD>
        </TR></TBODY></TABLE></TD></TR></TBODY></TABLE><MAP 
  name=Map2><AREA shape=RECT coords=18,119,102,149 
  href="index.php"><AREA 
  shape=CIRCLE coords=34,87,34 
  href="index.php"><AREA 
  shape=CIRCLE coords=106,34,33 
  href="index.php"><AREA 
  shape=RECT coords=77,66,135,84 
  href="index.php"><AREA 
  shape=RECT coords=111,120,196,149 
  href="index.php"><AREA 
  shape=CIRCLE coords=181,90,35 
  href="index.php"></MAP>
          <!-- Predicta Atmosphere - Nao remover esta parte do codigo -->
<SCRIPT>
_dAtm=298;
_s='index.php';
_uN="atlanticahotels_buscacomfort";
</SCRIPT>

<SCRIPT src="home_arquivos/ATM.JS"></SCRIPT>
<NOSCRIPT><IMG height=1 src="" width=1></NOSCRIPT> <!-- Predicta Atmosphere - Nao remover esta parte do codigo --></BODY></HTML>
