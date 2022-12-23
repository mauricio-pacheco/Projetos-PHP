<?php include("meta.php"); ?>

<body topmargin="0" leftmargin="0">
<table width="980" height="160" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><SCRIPT src="classes/carrega.js"></SCRIPT>
                      <SCRIPT language=javascript>
     carregaFlash('flash/index.swf','980','160'); 
    </SCRIPT></td>
  </tr>
</table>
<table width="980" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td><?php include("busca.php"); ?></td>
  </tr>
</table>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" border="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0" align="center">
            <tr>
              <td width="39%"><span class="fontetabela">
                <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_veiculos WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe veículos cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                <font color="#FFFF00"><b><?php echo $y["veiculo"]; ?></b></font></span></td>
              <td width="37%"><?php if ($y["valorvista"] == 'R$ ' and $y["valorprazo"] == 'R$ ') { } else {  ?>
                <table width="97%" border="0">
                  <tr>
                    <td width="2%"><img src="imagens/money.png" /></td>
                    <td width="98%" class="fontegrana"><table width="99%" border="0">
                      <tr>
                        <td class="fontetabela"><b><?php echo $y["valorvista"]; ?></b> ou em <b><?php echo $y["prazo"]; ?></b> X de <b><?php echo $y["valorprazo"]; ?></b></td>
                      </tr>
                    </table></td>
                  </tr>
                </table>
                <?php } ?></td>
              <td width="24%" align="right"><span class="fontetabela"> Data do Cadastro: <?php echo $y["data"]; ?> - ( <?php echo $y["hora"]; ?> )</span></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><strong class="fontetabela">IMAGENS DO VEÍCULO:</strong></td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><table width="100%" border="0">
            <tr>
              <td width="15%"><img src="administrador/veiculos/<?php echo $y["foto"]; ?>" title="<?php echo $y["veiculo"]; ?>" alt="<?php echo $y["veiculo"]; ?>" border="0" /></a></td>
              <td width="85%"><span class="fontetabela">
              <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
			  <script type="text/javascript" src="js/prototype.js"></script>
                      <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
                      <script type="text/javascript" src="js/lightbox.js"></script>
                <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM cw_anexos WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/fotos/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' width=96 height=72 src='administrador/fotos/p/".$linha2['fotomenor']."'></a>
";

}
  
   ?>
              </span></td>
            </tr>
          </table></td>
        </tr>
    </table>
      <table width="100%" border="0">
        <tr>
          <td><img src="administrador/imagens/branco.gif" width="2" height="6" /></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td><strong class="fontetabela">DESCRIÇÃO DO VEÍCULO:</strong></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela"><?php echo $y["descricao"]; ?></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela"><img src="administrador/imagens/branco.gif" width="2" height="10" /></td>
        </tr>
      </table>
      <form action="emailveiculo.php" method="post" name="form1" id="form1">
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela"><strong class="fontetabela">INFORMAÇÕES SOBRE O VEÍCULO:</strong></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela">Veículo: <font color="#FFFF00"><b><?php echo $y["veiculo"]; ?>
            <input type="hidden" name="veiculo" value="<?php echo $y["veiculo"]; ?>" id="veiculo" />
            <input type="hidden" name="id" value="<?php echo $y["id"]; ?>" id="id" />
          </b></font></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela">Nome: 
          <input name="nome" type="text" class="fontetabela2" id="nome" style="width:330px"  /></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela">E-mail: 
          <input name="email2" type="text" class="fontetabela2" id="email" style="width:300px" /></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela">Digite abaixo as informações que deseja sobre o veículo:</td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela"><textarea name="descricao" cols="80" rows="10" class="fontetabela2" id="descricao"></textarea></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td class="fontetabela"><input name="button2" type="image" src="administrador/imagens/enviardados.png" class="fontegrana" id="button2"  /></td>
        </tr>
      </table></form>
      <span class="fontetabela" style="Z-INDEX: 666">
      <?php
  
  }}
 ?>
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><img src="administrador/imagens/branco.gif" width="2" height="6" /></td>
  </tr>
  <tr>
    <td><a href="javascript:history.go(-1)"><img src="administrador/imagens/voltar.png" border="0" /></a></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>