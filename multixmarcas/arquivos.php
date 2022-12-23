<?php include("metaarq.php"); ?>
<table width="100%" height="91" background="imagens/bloco12.jpg" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><?php include("cima.php"); ?></td>
  </tr>
</table>
<table width="100%" height="24" background="imagens/bloco2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" height="24" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="1000" bgcolor="#EBEBEB" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="imagens/branco.gif" width="1" height="4" /></td>
        </tr>
      </table>
      <table width="1000" background="imagens/barracentro.png" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <td valign="top"><table width="992" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td width="231" valign="top"><?php include("menulateral.php"); ?></td>
            <td width="761" valign="top"><table height="30" background="imagens/funtotabelamaior.png" bgcolor="#535353" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="fontetabela5" align="right"><strong>Arquivos de <?php 
				$idcliente = $_GET["idcliente"];
				$usuario = $_GET["usuario"];
				$cliente = $_GET["cliente"]; echo $cliente; ?></strong>&nbsp;&nbsp;</td>
              </tr>
            </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                </tr>
              </table>
              <span class="fontetabela2">              </span>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0" class="manchete_texto9m">
                <tr>
                  <td>Selecione o arquivo para anexar: ( Tamanho Máx: 100 mb )</td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="5" /></td>
                </tr>
                <tr>
                  <td><span class="manchete_texto9m">
                    <style type="text/css">
#status
{
	padding:				10px 15px;
	width:					100%;
}
 
#status .progress
{
	background:				white url(administrador/funcoesjornal/progress.gif) no-repeat;
	background-position:	+50% 0;
	margin-right:			0.5em;
}
 
#status .progress-text
{
	font-size:				0.9em;
	font-weight:			bold;
}
 
#images-list
{
	list-style:				none;
	width:					100%;
	margin:					0;
}
 
#images-list li.file
{
	border-bottom:			1px solid #FFFFFF;
	background-image: url(administrador/funcoesjornal/file.png);
	background-repeat: no-repeat;
	background-position: 4px 4px;
}
#images-list li.file.file-uploading
{
	background-image:		url(administrador/funcoesjornal/uploading.gif);
	background-color:		#FFFFFF;
}
#images-list li.file.file-success
{
	background-image:		url(administrador/funcoesjornal/success.png);
}
#images-list li.file.file-failed
{
	background-image:		url(administrador/funcoesjornal/failed.png);
}
 
#images-list li.file .file-name
{
	font-size:				1.2em;
	margin-left:			60px;
	display:				block;
	clear:					left;
	line-height:			40px;
	height:					56px;
	font-weight:			bold;
}
#images-list li.file .file-size
{
	font-size:				0.9em;
	line-height:			18px;
	float:					right;
	margin-top:				2px;
	margin-right:			6px;
}
#images-list li.file .file-info
{
	display:				block;
	margin-left:			44px;
	font-size:				0.9em;
	line-height:			20px;
	clear
}
#images-list li.file .file-remove
{
	clear:					right;
	float:					right;
	line-height:			18px;
	margin-right:			6px;
}

.hide {
	display: none;
}

#loading {
	padding:				30px;
	width:					100%;
	text-align: 			center;
	font-weight: bold;
}

#loading img {
	vertical-align: middle;
}
                    </style>
	                <script type="text/javascript" src="administrador/funcoesjornal/mootools-trunk.js"></script>
	                <script type="text/javascript" src="administrador/funcoesjornal/Swiff.Uploader.js"></script>
	                <script type="text/javascript" src="administrador/funcoesjornal/Fx.ProgressBar.js"></script>
	                <script type="text/javascript" src="administrador/funcoesjornal/FancyUpload2.js"></script>

                    <script type="text/javascript">
window.addEvent('load', function() {
 
	var swiffy = new FancyUpload2($('status'), $('images-list'), {
		url: $('form_imagens').action,
		fieldName: 'photoupload',
		path: 'administrador/funcoesjornal/Swiff.Uploader.swf',
		onLoad: function() {
			$('loading').destroy();
			$('status').removeClass('hide');
			
		this.options.typeFilter = {'Arquivos (*.txt, *.doc, *.docx, *.pdf, *.htm, *.html, *.zip, *.rar, *.cdr, *.psd, *.jpg, *.jpeg, *.gif, *.png)': '*.txt; *.doc; *.docx; *.pdf; *.htm; *.html; *.zip; *.rar; *.cdr; *.psd; *.jpg; *.jpeg; *.gif; *.png'};
		},
		limitFiles: 50,
		debug: true,
		target: 'add-image'
	});
 
	/**
	 * Various interactions
	 */
 
	$('add-image').addEvent('click', function() {
		swiffy.browse();
		return false;
	});
 
	$('clear-list').addEvent('click', function() {
		swiffy.removeFile();
		return false;
	});
 
	$('upload-images').addEvent('click', function() {
		swiffy.upload();
		return false;
	});
 
});
                    </script>
	
                  </span>
                    <div>
  <form action="administrador/funcoesjornal/script.php?idpuxado=<?php echo $idcliente; ?>" method="post" enctype="multipart/form-data" id="form_imagens">
  <span class="manchete_texto9m">
  <input type="hidden" name="idpuxado" value="<?php echo $idcliente; ?>" />
  </span>
  <div id="loading">
    <span class="manchete_texto9m"><img src="administrador/funcoesjornal/uploading.gif" alt="" /><br />Carregando...
    </span></div>
    
  <div id="status" class="hide">
  <p>
    <span><a href="#" id="add-image">
      <input name="Button" class="manchete_texto9m" type="button" value="PROCURAR ARQUIVO" />
      </a>
      <a href="#" id="clear-list">
        <input name="Button" class="manchete_texto9m" type="button" value="LIMPAR" />
        </a>
      <a href="#" id="upload-images">
        <input type="submit" class="manchete_texto9m" value="ENVIAR" />
        </a></span></p>
  <span class="manchete_texto9m"><br />
  </span>
  <p>
    
    
  <div>
    
    <span class="manchete_texto9m"><strong class="overall-title">Progresso Total</strong><br />
  <img src="administrador/funcoesjornal/bar.gif" class="progress overall-progress" />
      </span></div>
    
  <div>
    <span class="manchete_texto9m"><strong class="current-title">Arquivo atual</strong><br />
  <img src="administrador/funcoesjornal/bar.gif" class="progress current-progress" />
      </span></div>

<div class="current-text"></div>
</div>
 
<div id="images-list"></div>
</form>
</div></td>
                </tr>
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="5" /></td>
                </tr>
              </table>
              <table width="99%" border="0" bgcolor="#333333" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="1" /></td>
                </tr>
              </table>
              <span class="fontetabela2">
              <?php
include "administrador/conexao.php";

$p = $_GET["p"];
$idcliente = $_GET["idcliente"];

if(isset($p)) {
$p = $p;
} else {
$p = 1;
}

$qnt = 12;

$inicio = ($p*$qnt) - $qnt;

$sql_select = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC LIMIT $inicio, $qnt";

$sql_query = mysql_query($sql_select);

$colunas="1"; //quantidade de colunas
$cont="1"; //contador

print"<table width=730>";


while($array = mysql_fetch_array($sql_query)) {
	
	if($cont==1){
print"<tr>";
}
print"<td valign=top>";

// Vari&aacute;vel para capturar o campo 'nome' no banco de dados
$id = $array["id"];
$arquivo = $array["arquivo"];
$legenda = $array["legenda"];
$idcliente = $array["idcliente"];
$data = $array["data"];
$hora = $array["hora"];


// Exibe o nome que est&aacute; no BD e pula uma linha


?>
              </span>
              <table width="99%" border="0" align="center">
                <tr>
                  <td width="5%" class="manchete_texto9"><img src="imagens/arquivo.png" width="33" height="32" /></td>
                  <td width="49%" class="manchete_texto9"><strong><?php echo $arquivo.""; ?></strong><br /><em>ARQUIVO CADASTRADO EM <?php echo $data.""; ?> - <?php echo $hora.""; ?></em></td>
                                    <td width="5%" class="manchete_texto9"><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="manchete_texto9"><img src="imagens/down.png" border="0" /></a></td>
                  <td width="16%" class="manchete_texto9"><strong><a href="administrador/ups/arquivos/<?php echo $arquivo.""; ?>" class="manchete_texto9">BAIXAR ARQUIVO</a></strong></td>
                  <td width="3%" class="manchete_texto9">&nbsp;</td>
                  <td width="5%" class="manchete_texto9"><a href="delarquivo.php?idcliente=<?php echo $idcliente.""; ?>&amp;id=<?php echo $id.""; ?>&amp;arquivo=<?php echo $arquivo.""; ?>&amp;usuario=<?php echo $usuario.""; ?>&amp;cliente=<?php echo $cliente.""; ?>" onclick="return confirm('Tem certeza que deseja apagar o arquivo ?')" class="manchete_texto9"><img src="imagens/deletar.png" border="0" /></a></td>
                  <td width="17%" class="manchete_texto9"><strong><a href="delarquivo.php?idcliente=<?php echo $idcliente.""; ?>&amp;id=<?php echo $id.""; ?>&amp;arquivo=<?php echo $arquivo.""; ?>&amp;usuario=<?php echo $usuario.""; ?>&amp;cliente=<?php echo $cliente.""; ?>" onclick="return confirm('Tem certeza que deseja apagar o arquivo ?')" class="manchete_texto9">APAGAR ARQUIVO</a></strong></td>
                </tr>
              </table>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td><img src="imagens/branco.gif" width="1" height="6" /></td>
                </tr>
              </table>
              <span class="manchete_texto96">
              <?php
print"</td>";

//se o cont for igual o número de colunas ele fecha a linha da tabela
if($cont==$colunas){
print"</tr>";
$cont=0;
}
$cont=$cont+1; //acrescenta valor ao cont
}

//se o valor final de cont for diferente do numero de colunas ele fechará a tabela
if(!$cont==$colunas){
print"</tr></table>";
} else {
print"</table>";
}
?>
              </span>
              <div align="center">
                <?php



// Depois que selecionou todos os nome, pula uma linha para exibir os links(pr&oacute;xima, &uacute;ltima...)
echo "<br>";

// Faz uma nova sele&ccedil;&atilde;o no banco de dados, desta vez sem LIMIT, 
// para pegarmos o n&uacute;mero total de registros
$sql_select_all = "SELECT * FROM cw_anexosarquivos WHERE idcliente='$idcliente' ORDER BY id DESC";
// Executa o query da sele&ccedil;&atilde;o acimas
$sql_query_all = mysql_query($sql_select_all);
// Gera uma vari&aacute;vel com o n&uacute;mero total de registros no banco de dados
$total_registros = mysql_num_rows($sql_query_all);
// Gera outra vari&aacute;vel, desta vez com o n&uacute;mero de p&aacute;ginas que ser&aacute; precisa. 
// O comando ceil() arredonda 'para cima' o valor
$pags = ceil($total_registros/$qnt);
// N&uacute;mero m&aacute;ximos de bot&otilde;es de pagina&ccedil;&atilde;o
$max_links = 20;
// Exibe o primeiro link 'primeira p&aacute;gina', que n&atilde;o entra na contagem acima(3)
echo "<a href='arquivos.php?p=1&amp;idcliente=$idcliente&usuario=$usuario&cliente=$cliente' target='_self' class=manchete_texto96>PRIMEIRA PÁGINA</a>&nbsp;&nbsp;";
// Cria um for() para exibir os 3 links antes da p&aacute;gina atual
for($i = $p-$max_links; $i <= $p-1; $i++) {
// Se o n&uacute;mero da p&aacute;gina for menor ou igual a zero, n&atilde;o faz nada
// (afinal, n&atilde;o existe p&aacute;gina 0, -1, -2..)
if($i <=0) {
//faz nada
// Se estiver tudo OK, cria o link para outra p&aacute;gina
} else {
echo "| <a href='arquivos.php?p=".$i."&amp;idcliente=$idcliente&usuario=$usuario&cliente=$cliente' target='_self' class=manchete_texto96>".$i."</a> ";
}
}
// Exibe a p&aacute;gina atual, sem link, apenas o n&uacute;mero

echo "<span class=manchete_texto96>|</span> <span class=manchete_texto96><b>";
echo $p." ";
echo "</b></span> <span class=manchete_texto96>|</span>";

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
echo " <a href='arquivos.php?p=".$i."&amp;idcliente=$idcliente&usuario=$usuario&cliente=$cliente' target='_self' class=manchete_texto96>".$i."</a> |";
}
}
// Exibe o link "&uacute;ltima p&aacute;gina"
echo "&nbsp;&nbsp;<a href='arquivos.php?p=".$pags."&amp;idcliente=$idcliente&usuario=$usuario&cliente=$cliente' target='_self' class=manchete_texto96>ÚLTIMA PÁGINA</a> ";


?>
              </div>
              <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td align="center"><a href="principal.php"><img src="imagens/continuar.jpg"  border="0" /></a></td>
                  <td align="center"><a href="carrinho.php"><img border="0" src="imagens/comprascar.png" /></a></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td><img src="imagens/branco.gif" width="1" height="12" /></td>
                </tr>
</table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" height="120" background="imagens/blocoabaixo.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="imagens/branco.gif" width="1" height="16" /></td>
      </tr>
    </table>
     <table width="1000" height="350" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="top"><table width="98%" height="210" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td valign="top"><table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="30%" valign="top" class="manchete_texto9m"><a href="ccompra.php" class="manchete_texto9m">&nbsp; &bull; &nbsp;Condições de Compra</a><br /><br /><a href="tgarantia.php" class="manchete_texto9m">&nbsp; &bull; &nbsp;Termos de Garantia</a><br /> <br />                 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><img src="imagens/termo.png" /></td>
                  </tr>
                </table>                <br /></td>
                <td align="center" width="40%"><table width="99%" border="0" cellspacing="0" cellpadding="0">
                 
                  <tr>
                    <td align="center"><img src="imagens/blindado.png" width="220" height="56" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="center"><img src="imagens/pagse.png" width="165" height="129" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                  </tr>
                </table></td>
                <td width="30%" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                 
                </table>
                  <table width="99%" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="manchete_texto9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="14%"><img src="imagens/news.png" width="34" height="30" /></td>
                        <td width="86%"><strong>NEWSLETTER</strong></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                  
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                  </table>
                  <table width="96%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9">Cadastre-se e receba as novidades da Multix Shop em seu e-mail:</td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="14" /></td>
                    </tr>
                  </table>
                  <script language="JavaScript" type="text/javascript">
function validarnews(formnews) { 

if (document.formnews.nome.value=="") {
alert("O Campo Nome não está preenchido!")
formnews.nome.focus();
return false
}

if (document.formnews.email.value=="") {
alert("O Campo E-mail não está preenchido!")
formnews.email.focus();
return false
}

}

                        </script>
          <form action="cadnew.php" method="post" name="formnews" onsubmit="return validarnews(this)">
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="manchete_texto9">Nome:
                      <input name="nome" type="text" style="width:210px" class="manchete_texto9" size="36" />
                      *</td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                    <tr>
                      <td><span class="manchete_texto9">E-mail:
                        <input name="email" type="text" style="width:209px" class="manchete_texto9" size="36" />
                      *</span></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="submit" name="cadastrar" class="manchete_texto9" style="FONT-SIZE: 10px" value="CADASTRAR" /></td>
                    </tr>
                </table>
                  <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                    </tr>
                  </table>
                            </form>
                            <script language="JavaScript" type="text/javascript">
function removenews(rnews) { 

if (document.rnews.email.value=="") {
alert("O Campo E-mail não está preenchido!")
rnews.email.focus();
return false
}


}

                        </script>
          <form action="apaganew.php" method="post" name="rnews" onsubmit="return removenews(this)">
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                              </tr>
                              <tr>
                                <td><span class="manchete_texto9">E-mail:
                                  <input name="email" type="text" style="width:209px" class="manchete_texto9" size="36" />
                                  *</span></td>
                              </tr>
                            </table>
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                              <tr>
                                <td><img src="imagens/branco.gif" width="1" height="4" /></td>
                              </tr>
                            </table>
                            <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><input type="submit" name="remover" class="manchete_texto9" style="FONT-SIZE: 10px" value="REMOVER" /></td>
                    </tr>
                  </table></form>
                </td>
              </tr>
            </table></td>
          </tr>
        </table>
          
          <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="82%"><img src="imagens/cartoes.jpg" width="800" height="30" /></td>
                  <td width="18%"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                     
                      <td width="21%" align="center"><a href="https://www.facebook.com/MultixShop" target="_blank"><img src="imagens/facebook.png" border="0" alt="Acesse Nossa Página no FaceBook" title="Acesse Nossa Página no FaceBook"  /></a></td>
                      <td width="27%" align="center"><a href="callto:atendimento@multixshop.com.br"><img src="imagens/skype.png" border="0" alt="Adicione Nosso Contato no Skype" title="Adicione Nosso Contato no Skype" /></a></td>
                      <td width="22%" align="right">&nbsp;</td>
                      <td width="26%" align="right"><a href="http://www.casadaweb.net" target="_blank"><img src="imagens/ghost.png" border="0" alt="Desenvolvido por Casa da Web" title="Desenvolvido por Casa da Web" /></a></td>
                       <td width="4%" align="right">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="14" /></td>
            </tr>
          </table>
          <table width="96%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" class="fonteadm">Preços e condições estão sujeitos à alteração sem aviso prévio e são válidos apenas para compras pela internet, nesta data ou enquanto houver estoque na Loja Virtual. Vendas sujeitas à análise e confirmação. As imagens dos produtos são meramente ilustrativas. Parcela mínima de R$20,00.</td>
          </tr>
        </table></td>
       
      </tr>
    </table>
</td>
  </tr>
</table>
</body>
</html>