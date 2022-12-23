  <?php

include "conexao.php";

$logado = $_COOKIE['email'];
$logado2 = $_COOKIE['senha'];

$sql = mysql_query("SELECT * FROM integrantes WHERE email = '$logado' AND senha = '$logado2' ORDER BY id LIMIT 1");
$contar = mysql_num_rows($sql); 

if ($contar = 1) {
   while($n = mysql_fetch_array($sql))
   {
       ?>
<style type="text/css">
<!--
.style17 {color: #00FF00}
.style18 {color: #FFFFFF}
.style20 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>

<TABLE cellSpacing=0 cellPadding=0 width=778 align=center border=0>
  <TBODY>
    <TR>
      <TD vAlign=top align=middle width=11 
    background=home_arquivos/esquerdao.gif>&nbsp;</TD>
      <TD width=756 bgColor=#000000><TABLE cellSpacing=0 cellPadding=0 width=756 border=0>
        <TBODY>
          <TR>
            <TD style="BACKGROUND-REPEAT: repeat-x" vAlign=center align=middle 
          background="home_arquivos/fundouser.gif" height=34>
       <table width="100%" border="0">
              <tr>
                <td width="77%"><div align="center">
                  <table width="100%" border="0">
                    <tr>
                      <td width="36%"><span class="style2"><span class="style1"><span class="style4 style18">Seja bem  vindo</span>&nbsp;<span class="style17 style17"><?php echo $n["nome"]; ?></span><span class="style18"> !</span></span></span><span class="style20"></span></td>
                      <td width="61%"><div align="right"><span class="style2"><span class="style1"><span class="style4 style18"><span class="style15">
                        <input type="submit" onclick="Javascript: location.href='editarconta.php?id=<?php echo $n["id"]; ?>'" class="texto" value="Alterar seus dados" />
                        </span></span></span></span><span class="style15">
                          <input type="submit" onclick="Javascript: location.href='vazar.php'" class="texto" value="Sair do Sistema" />
                        </span></div></td>
                    </tr>
                  </table>
                  </td>
                </tr>
            </table>
          </TD>
          </TR>
        </TBODY>
      </TABLE></TD>
      <TD vAlign=top align=middle width=11 
    background=home_arquivos/direcao.gif>&nbsp;</TD>
    </TR>
  </TBODY>
</TABLE><?
  }
 
 ?>
<?php }
else 
   {  }?>