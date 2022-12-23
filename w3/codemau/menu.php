<body onclick=checkExpand()>
<SCRIPT language=JavaScript>
var MS=navigator.appVersion.indexOf("MSIE")
window.isIE4 =(MS>0) && ((parseInt(navigator.appVersion.substring(MS+5,MS+6)) >= 4) && (navigator.appVersion.indexOf("MSIE"))>0)
function checkExpand() {
    if (""!=event.srcElement.id) {
      var ch = event.srcElement.id + "Child"
      var el = document.all[ch] 
      if (null!=el) el.style.display = "none" == el.style.display ? "" : "none"
      event.returnValue=false
    }
  }
</SCRIPT>
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> PÁGINA INICIAL</td>
      </tr></table>
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" id=HG1 onMouseOver="this.style.backgroundColor='#D5FFD5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> CODEMAU</td>
      </tr></table>
<DIV id=HG1Child style="DISPLAY: none">
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> O que é?</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Missão</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Objetivos</td>
      </tr>
          <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Diretoria</td>
      </tr>
          <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=Stories_Archive';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Arquivo de Notícias</td>
      </tr>
          <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=Recherches';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Busca Avançada</td>
      </tr>
          <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=Feedback';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Fale Conosco</td>
      </tr></table></DIV>
      
<? ?>


<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" id=HG2 onMouseOver="this.style.backgroundColor='#D5FFD5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> PROJETOS</td>
      </tr></table>
<DIV id=HG2Child style="DISPLAY: none">
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Em Andamento</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Concluídos</td>
      </tr>
</table></DIV>      
      
      
<? ?>

     
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" id=HG3 onMouseOver="this.style.backgroundColor='#D5FFD5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> ABRANGÊNCIA</td>
      </tr></table>
<DIV id=HG3Child style="DISPLAY: none">
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Municípios</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='index.php';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> Coredes</td>
      </tr>
</table></DIV>      
      
      
<? ?>


<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" id=HG4 onMouseOver="this.style.backgroundColor='#D5FFD5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> CONSULTA POPULAR</td>
      </tr></table>
<DIV id=HG4Child style="DISPLAY: none">
<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=2001';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> 2001 - 2003</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=2003';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> 2003 - 2005</td>
      </tr>
    <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#FDF5CC" onClick="window.location='modules.php?name=2005';" onMouseOver="this.style.backgroundColor='#ffffff'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#FDF5CC'; this.style.color='#252525';"> <STRONG>·</STRONG> 2005 - 2007</td>
      </tr>
</table></DIV>


<? ?>




<? ?>


<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" onClick="window.location='modules.php?name=Downloads';" onMouseOver="this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> PUBLICAÇÕES</td>
      </tr></table>


<? ?>


<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" onClick="window.location='modules.php?name=Potenciais';" onMouseOver="this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> POTENCIAIS TURÍSTICOS</td>
      </tr></table>


<? ?>


<table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" onClick="window.location='modules.php?name=Calendar';" onMouseOver="this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> EVENTOS REGIONAIS</td>
      </tr></table>
      
      <table width="175" border="0" cellpadding="3" cellspacing="1" bordercolor="#FFFFFF" class="cinza_esc11" style="margin-bottom:4px">
      <tr>
        <td height="24" bordercolor="#A7D2EF" bgcolor="#D5EEFF" onClick="window.location='modules.php?name=coppermine';" onMouseOver="this.style.backgroundColor='#d5ffd5'; this.style.color='#252525'; this.style.cursor='pointer'" onMouseOut="this.style.backgroundColor='#D5EEFF'; this.style.color='#252525';"> <STRONG><img src=caxeta.gif /></STRONG> GALERIA DE FOTOS</td>
      </tr></table>
      </DIV>