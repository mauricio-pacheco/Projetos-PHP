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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>ADMINISTRAR GALERIAS</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td>
            
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td>
                  <form name="formbusca" method="post" action="buscaevento.php">
                    <label><span class="manchete_texto"><strong>Pesquisar Galeria:</strong></span>
                      <input name="palavra" type="text" value="Digite o Título da Galeria" onclick="this.value=''" class="manchete_texto" id="palavra" size="98" />
                    </label>
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
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
            <table width="740" border="0" align="center">
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
$qnt = 10;
// O sistema calcula o in&iacute;cio da sele&ccedil;&atilde;o calculando: 
// (p&aacute;gina atual * quantidade por p&aacute;gina) - quantidade por p&aacute;gina
$inicio = ($p*$qnt) - $qnt;
// Seleciona no banco de dados com o LIMIT indicado pelos n&uacute;meros acima
$sql_select = "SELECT * FROM cw_galeria WHERE nomegaleria LIKE '%".$palavra."%' ORDER BY id DESC LIMIT $inicio, $qnt";
// Executa o Query
$sql_query = mysql_query($sql_select);

// Cria um while para pegar as informa&ccedil;&otilde;es do BD
while($array = mysql_fetch_array($sql_query)) {
// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$nomegaleria = $array["nomegaleria"];
$dataevento = $array["dataevento"];
$foto = $array["foto"];
$comentario = $array["comentario"];
$data = $array["data"];
$hora = $array["hora"];

// Exibe o nome que est&aacute; no BD e pula uma linha


?>
                  <table width="99%" border="0" align="center">
                    <tr>
                      <td width="2%"><img src="ups/galerias/<?php echo $foto.""; ?>" width="150" height="112" /></td>
                      <td align="left" width="98%" class="manchete_texto5" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><font color="#000000"><b><?php echo $nomegaleria.""; ?></b></font></td>
                        </tr>
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                        </tr>
                        <tr>
                          <td><div align="justify"><font color="#000000"><?php echo $comentario.""; ?></font></div></td>
                        </tr>
                        <tr>
                          <td><img src="imagens/branco.gif" width="1" height="3" /></td>
                        </tr>
                        <tr>
                          <td><font color="#000000"><em>Data de Publicação: <?php echo $data.""; ?> <?php echo $hora.""; ?></em></font></td>
                        </tr>
                      </table>
                        <br />
                        <br /></td>
                    </tr>
                  </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td align="left"><a href="edigalerias.php?id=<?php echo $id.""; ?>" class="manchete_texto4"><b>EDITAR GALERIA</b></a> - <a href="delgalerias.php?id=<?php echo $id.""; ?>&amp;foto=<?php echo $foto.""; ?>" onclick="return confirm('Tem certeza que deseja apagar o evento <?php echo $nomegaleria.""; ?> ?')" class="manchete_texto6"><b>APAGAR GALERIA</b></a> - <a href="enviafotos.php?id=<?php echo $id.""; ?>" class="manchete_textof6"><b>ENVIAR IMAGENS A GALERIA</b></a> - <a href="comenadmfotos.php?id=<?php echo $id.""; ?>" class="manchete_textof8"><b>ADMINISTRAR IMAGENS DA GALERIA</b></a></td>
                    </tr>
                  </table>
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
                   <table bgcolor="#F5F5F5" align="center" width="732" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td><img src="imagens/branco.gif" width="1" height="2" /></td>
                          </tr>
                        </table>
<div align="center"><?php

}

// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br /><br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_galeria WHERE nomegaleria LIKE '%".$palavra."%'";
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
echo "<a class=manchete_texto href='buscaevento.php?p=1' target='_self'><b>PRIMEIRA P&Aacute;GINA</b></a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a class=manchete_texto href='buscaevento.php?p=".$i."' target='_self'>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero
echo "| <span class=manchete_texto><b>";
echo $p." ";
echo "</b></span> |";

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
echo " <a class=manchete_texto href='buscaevento.php?p=".$i."' target='_self'>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a class=manchete_texto href='buscaevento.php?p=".$pags."' target='_self'><b>&Uacute;LTIMA P&Aacute;GINA</b></a> ";
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