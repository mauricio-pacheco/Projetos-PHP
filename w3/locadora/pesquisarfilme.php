<?php include("acima.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>MV Video Locadora</TITLE>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<STYLE type=text/css>
A:link {
	COLOR: #000000; TEXT-DECORATION: none
}
A:visited {
	COLOR: #000000; TEXT-DECORATION: none
}
A:hover {
	COLOR: #003366;
	TEXT-DECORATION: underline
}
#divDrag0 {
	LEFT: 0px; WIDTH: 40px; CLIP: rect(0px 120px 120px 0px); CURSOR: hand; POSITION: absolute; TOP: 0px; HEIGHT: 120px
}
.style1 {
	color: #FFFFFF;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
.style2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
</STYLE>

<META content="MSHTML 6.00.5730.13" name=GENERATOR></HEAD>
<BODY bottomMargin=0 leftMargin=0 topMargin=0 rightMargin=0>
<TABLE style="BORDER-RIGHT: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid" 
cellSpacing="0" cellPadding="0" width="760" bgColor=#ffffff 
align=center>
  <TBODY>
  <TR>
    <TD><div align="center">
        <table width="100%" border="0">
          <tr>
            <td width="64%"><img src="mv.jpg"></td>
            <td width="36%"><div align="center"><a href="sair.php"><img src="sair.jpg" width="240" height="48" border="0"></a></div></td>
          </tr>
        </table>
    </div>
      <HR align=center width="99%" color=#cccccc SIZE=1>
      <table width="100%" border="0">
        <tr>
          <td width="19%" valign="top"><?php include("menu.php"); ?></td>
          <td width="81%" valign=top><table width="100%" border="0">
            <tr>
              <td>&nbsp;<font face="Verdana">Consultar Filme</font></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><table width="98%" border="0" align="center">
                <form method="post" ENCTYPE="multipart/form-data" action="pesquisarfilme.php" name="cadastro" onSubmit="return validar(this)"><tr>
                  <td width="25%"><span class="style2">Digite o nome do filme:</span></td>
                  <td width="44%"><script language=javascript>
function validar(cadastro) { 

if (document.cadastro.palavra.value=="") {
alert("Digite a palavra para a pesquisa!")
cadastro.palavra.focus();
return false
}

		return true;

}


</SCRIPT><input name="palavra" type="text" size=50 value="" style=font-size:11px;font-family:tahoma></td>
                  <td width="31%"><input type="submit" NAME="Enter" style=font-size:11px;font-family:tahoma value=" Pesquisar "></td>
                </tr></form>
              </table></td>
            </tr>
            <tr>
              <td><HR align=center width="99%" color=#cccccc SIZE=1></td>
            </tr>
            <tr>
              <td><?php
								  
								  include "conexao.php";

if(!empty($HTTP_POST_VARS["palavra"])) {

        $palavra = str_replace(" ", "%", $HTTP_POST_VARS[palavra]);

        /* Altera os espaços adicionando no lugar o simbolo % */
        
      $qr = "SELECT * FROM filmes WHERE nomefilme LIKE '%".$palavra."%'";
        
        // Executa a query no Banco de Dados
        $sql = mysql_query($qr);
        
        // Conta o total ded resultados encontrados
        $total = mysql_num_rows($sql);

        echo "<div align=\"center\"><font face='Verdana' size='2'>Sua busca retornou <font color\"#2C9955\">' $total ' </font> resultados.</font></div><br>";
			// Gera o Loop com os resultados
        while($r = mysql_fetch_array($sql)) {
		
 ?>
                                      <table><tr><td><a href="filmep.php?codigo=<?php echo $r["codigo"]; ?>"><?php
                     $branca = $r["foto"];
					 $testeb = '';
					 if ($branca == $testeb)
					 {
					  					  ?><img src="capas/nada.jpg" width="75" height="110" border="0"><?php } else { ?><img src="capas/<?php echo $foto.""; ?>" width="75" height="110" border="0"><?php } ?></a></td><td>&nbsp;&nbsp;<font face='Verdana' size='2'><a href="filmep.php?codigo=<?php echo $r["codigo"]; ?>"><?php echo $r["nomefilme"]; ?></a></font></td></tr></table><br>
                                    <? }
 
  }
 
 
  
 ?></td>
            </tr>
          </table></td>
        </tr>
      </table>
      </TD>
  </TR>
  <TR>
    <TD>&nbsp;</TD>
  </TR>
  <TR>
    <TD vAlign=bottom>
      <TABLE cellSpacing=2 cellPadding=2 width="100%" align=center 
      bgColor=#eeeeee border=0 valign="bottom">
        <TBODY>
        <TR>
          <TD vAlign=bottom align=right width="100%"><B><FONT style="FONT-SIZE: 11px" face=tahoma>© Sistema desenvolvido por 
        <A 
            style="TEXT-DECORATION: none" href="mailto:mandry@casadaweb.net" 
            target=_new>Maurício Pacheco</A> e  <A 
            style="TEXT-DECORATION: none" href="mailto:rossivr@hotmail.com" 
            target=_new>Vinicius Rossi</A></FONT></B></TD></TR></TBODY></TABLE></TD></TR></TBODY></TABLE></TD></TR></TABLE></BODY></HTML>
