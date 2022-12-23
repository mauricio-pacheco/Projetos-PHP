<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<table width="100%" border="0">
      <tr>
        <td><img src="tabela1.jpg" width="148" height="22"></td>
      </tr>
      <tr>
        <td><TABLE class=menu_fundo cellSpacing=3 cellPadding=3 width=150 
            border=0>
          <TBODY>
            <TR>
              <TD class=menu_titulos 
                onmouseover="this.className='menu_titulos_over';layer_menu_401.style.display='';" 
                onmouseout="this.className='menu_titulos';layer_menu_401.style.display='none'"><SPAN 
                  style="WIDTH: 95%; CURSOR: hand" 
                  onclick="document.location.href='index.php'">&nbsp;Home</SPAN>
                  <DIV id=layer_menu_401></DIV></TD>
            </TR>
                       <TR>
              <TD class=menu_titulos 
                onmouseover="this.className='menu_titulos_over';layer_menu_7.style.display='';" 
                onmouseout="this.className='menu_titulos';layer_menu_7.style.display='none'"><SPAN 
                  style="WIDTH: 95%; CURSOR: hand" 
                  onclick="document.location.href='noticias.php'">&nbsp;Notícias</SPAN>
                  <DIV id=layer_menu_7></DIV></TD>
            </TR>
             <TR>
              <TD class=menu_titulos 
                onmouseover="this.className='menu_titulos_over';layer_menu_7.style.display='';" 
                onmouseout="this.className='menu_titulos';layer_menu_7.style.display='none'"><SPAN 
                  style="WIDTH: 95%; CURSOR: hand" 
                  onclick="document.location.href='http://www.palmitinho.rs.gov.br/antigo/'">&nbsp;Site Antigo</SPAN>
                  <DIV id=layer_menu_7></DIV></TD>
            </TR>
          </TBODY>
        </TABLE></td>
      </tr>
      <tr>
        <td><img src="dep1.jpg" width="148" height="22" /></td>
      </tr>
      <tr>
        <td><table class="menu_fundo" cellspacing="3" cellpadding="3" width="150" 
            border="0">
          <tbody>
            <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM departamentos ORDER BY id DESC");
$contar = mysql_num_rows($sql); 

while($n = mysql_fetch_array($sql))
   {
   ?>
            <tr>
              <td class="menu_titulos" 
                onmouseover="this.className='menu_titulos_over';layer_menu_7.style.display='';" 
                onmouseout="this.className='menu_titulos';layer_menu_7.style.display='none'"><span 
                  style="WIDTH: 95%; CURSOR: hand" 
                  onclick="document.location.href='verdeps.php?id=<?php echo $n["id"]; ?>&amp;departamento=<?php echo $n["departamento"]; ?>'"><?php echo $n["departamento"]; ?></span>
                <div id="layer_menu_2"></div></td>
            </tr>
            <?php

  }
 ?>
          </tbody>
        </table></td>
      </tr>
      <tr>
        <td><img src="twebabela.jpg" width="148" height="22" /></td>
      </tr>
      <tr>
        <td><script language=javascript>
function validar(form1) { 

if (document.form1.f_email.value=="") {
alert("O Campo E-mail não está preenchido!")
form1.f_email.focus();
return false
}

if (document.form1.f_pass.value=="") {
alert("O Campo Senha não está preenchido!")
form1.f_pass.focus();
return false
}

}

                </SCRIPT>
                              <FORM name="form1" action="index.php" onSubmit="return validar(this)" target=_blank>
                                &nbsp;E-mail
                                :
                                <INPUT class=texto style="WIDTH: 94px" 
                  name=f_email>
                                <BR>
                                &nbsp;Senha:
                                <INPUT class=texto style="WIDTH: 70px" 
                  name=f_pass>
                                <INPUT class=texto style="FONT-SIZE: 10px" type=submit value="ok">
                              </FORM></td>
      </tr>
      <tr>
        <td><img src="tabelafone.jpg" width="148" height="22" /></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="1%"><img src="fonezinho.gif" /></td>
            <td width="99%">Prefeitura<br />(0xx55) 3791 - 1123</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="1%"><img src="fonezinho.gif" /></td>
            <td width="99%">Prefeitura 2<br />
              (0xx55) 3791 - 1133</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0">
          <tr>
            <td width="1%"><img src="fonezinho.gif" /></td>
            <td width="99%">Hospital<br />
              (0xx55) 3791 - 1150</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
