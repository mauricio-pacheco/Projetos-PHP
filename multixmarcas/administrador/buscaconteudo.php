<?php include("cima.php"); ?>
<table width="100%" background="imagens/geral2.png" height="210" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','210'); 
    </SCRIPT></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="boxSombra" width="980" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="24%" bgcolor="#F0F0F0" valign="top"><?php include("menu.php"); ?>
        
</td>
        <td width="76%" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="1" height="1" /></td>
            </tr>
          </table>
          <table width="100%" border="0" align="center">
            <tr>
              <td width="11%" height="30" bgcolor="#076CA0"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR PÁGINAS DO DEPARTAMENTO 
                    <?php
									
									$idmenu = $_POST["idmenu"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_menus WHERE id = '$idmenu'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["departamento"];    }
									?>
                  </b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
                   
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                               <form name="formbusca" method="post" action="buscaconteudo.php">
                 <span class="manchete_texto"><strong>Pesquisar Página:
                 <input name="palavra" type="text" value="Digite o Título da Página" onClick="this.value=''" class="manchete_texto" size="60" />
                  Departamento: </strong></span><span class="manchete_texto">
                  <select class="fontetabela" name="idmenu">
                  
                    <?php 	  
	   $sql3 = mysql_query("SELECT * FROM cw_menus WHERE id='$idmenu'");
				   while($z = mysql_fetch_array($sql3))
   {
	  
   ?>
                    <option value="<?php echo $z["id"]; ?>"><?php echo $z["departamento"];?></option>
                    <?php 
				   $dept = $z["departamento"];
				   }  ?>
                    <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM cw_menus WHERE departamento!='$dept' ORDER BY departamento ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                    <option value="<?php echo $y["id"]; ?>"><?php echo $y["departamento"]; ?></option>
                    <?
  }
  }
 ?>
                  </select>
                  </span>
                  <input name="button" type="submit" class="manchete_texto" value="PESQUISAR" />
                </form></td>
              </tr>
            </table>
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                    </tr>
                  </table>
             <table bgcolor="#076CA0" width="100%" align="center" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                    </tr>
                  </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><table width="100%" border="0" align="center">
              <tr>
                <td><?php
include "conexao.php";
// Pegar a p&aacute;gina atual por GET
$palavra = $_POST["palavra"];
$p = $_GET["p"];
// Verifica se a vari&aacute;vel t&aacute; declarada, sen&atilde;o deixa na primeira p&aacute;gina como padr&atilde;o
if(isset($p)) {
$p = $p;
} else {
$p = 1;
}
// Defina aqui a quantidade m&aacute;xima de registros por p&aacute;gina.
$qnt = 15;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_conteudo WHERE titulo LIKE '%".$palavra."%' AND idmenu='$idmenu' ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$idmenu = $array["idmenu"];
$titulo = $array["titulo"];
$texto = $array["texto"];
$data = $array["data"];
$hora = $array["hora"];
$rodape = $array["rodape"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                  <table width="100%" border="0" align="center">
                    <tr>
                      <td align="left" width="98%"><table width="100%" border="0">
                        <tr>
                          <td><table width="100%" border="0">
                            <tr>
                              <td width="4%"><img src="imagens/page.gif" /></td>
                              <td width="96%" class="manchete_texto"><font color="#000000"><?php echo $titulo.""; ?> -- <?php echo $data.""; ?> <?php echo $hora.""; ?></font></td>
                            </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td>&nbsp;<a href="ediconteudo.php?id=<?php echo $id.""; ?>&amp;idmenu=<?php echo $idmenu.""; ?>" class="manchete_texto4"><strong>EDITAR PÁGINA</strong></a> - <a href="delconteudo.php?id=<?php echo $id.""; ?>" class="manchete_texto6" onclick="return confirm('Tem certeza que deseja apagar a página <?php echo $titulo.""; ?> ?')"><b>APAGAR PÁGINA</b></a></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table>
                  <div align="center">
				  <?php




}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br /><br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_conteudo WHERE titulo LIKE '%".$palavra."%' AND idmenu='$idmenu'";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 10;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a class=manchete_texto href='buscaconteudo.php?p=1&amp;id=$idmenu' target='_self'><b>PRIMEIRA P&Aacute;GINA</b></a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a class=manchete_texto href='buscaconteudo.php?p=".$i."&amp;id=$idmenu' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "| <font class=manchete_texto><b>";
echo $p." ";
echo "</b></font> |";

// Cria outro for(), desta vez para exibir 3 links ap&oacute;s a p&aacute;gina atual
for($i = $p+1; $i <= $p+$max_links; $i++) {
// Verifica se a p&aacute;gina atual &eacute; maior do que a &uacute;ltima p&aacute;gina. Se for, n&atilde;o faz nada.
if($i > $pags)
{
//faz nada
}
// Se tiver tudo Ok gera os links.
else
{
echo " <a class=manchete_texto href='buscaconteudo.php?p=".$i."&amp;id=$idmenu' target='_self'>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a class=manchete_texto href='buscaconteudo.php?p=".$pags."&amp;id=$idmenu' target='_self'><b>&Uacute;LTIMA P&Aacute;GINA</b></a> ";
?></div></td>
              </tr>
            </table></td>
          </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr></tr>
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
            </tr>
          </table></td>
        </tr>
    </table>
    </td>
  </tr>
</table>
<table width="100%" background="imagens/rodape.png" height="104" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="8" /></td>
      </tr>
    </table>
      <table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="22" /></td>
        </tr>
      </table>
      <?php include("baixo.php"); ?></td>
  </tr>
</table>
</body>
</html>