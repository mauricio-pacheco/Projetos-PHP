<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="classes/estilos.css">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<title>Folha do Noroeste</title>
</head>

<body>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
    <td width="978" bgcolor="#FFFFFF">
   
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("cabecalho(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("busca(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("login(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("menu(1).php"); ?></td>
  </tr>
</table>
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>  
  
  

<table width="100%" align="center" background="btabela2.png" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="280" valign="top">
     <?php include("esquerdo(1).php"); ?> </td>
    <td width="700" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
         <?php

include "administrador/conexao.php";

$id = $_GET['id'];

$sql = mysql_query("SELECT * FROM cw_noticias WHERE id='$id' ORDER BY id");
$sql2 = mysql_query("UPDATE cw_noticias set contador=contador + 1 where id='$id'");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><font color='#ffffff' size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Não existe noticias cadastradas!</b></font></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong><?php echo $y["titulo"]; ?></strong></td>
           </tr>
         </table>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
           <tr>
             <td><img src="imagens/branco.gif" width="2" height="6" /></td>
           </tr>
         </table></td>
      </tr>
    </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="78%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="fonte"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><table width="100%" border="0">
                <tr>
                  <td width="100%"><i>Notícia postada em <?php echo $y["data"]; ?> - <?php echo $y["hora"]; ?>  ( <?php echo $y["contador"]; ?> Visualizações )</i></td>
                </tr>
              </table>
      <table width="100%" border="0" align="center">
        <tr>
          <td align="left"><b>Imagens Anexadas a Notícia</b></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center">
        <tr>
          <td align="left"><link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
            <script type="text/javascript" src="js/prototype.js"></script>
            <script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
            <script type="text/javascript" src="js/lightbox.js"></script>
            <?php

include "administrador/conexao.php";

$id = $y["id"];

$sql2="SELECT * FROM cw_anexosnot WHERE idnot='$id'"; 
$resultado2=mysql_query($sql2);

while($linha2= mysql_fetch_array($resultado2))
{

echo 
"<a href='administrador/ups/fotosnot/g/".$linha2['fotomaior']."' rel='lightbox['roadtrip']' title='".$linha2["legenda"]."'><img alt='VISUALIZAR IMAGEM' border='0' src='administrador/ups/fotosnot/p/".$linha2['fotomenor']."'></a><img src=imagens/branco.gif width=5 height=2>
";

}
  
   ?>
            </td>
        </tr>
      </table>
      <table width="100%" height="2" border="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="2" /></td>
        </tr>
      </table>
      <table width="98%" border="0">
        <tr>
          <td align="left"><p align="justify"><?php echo $y["legenda"]; ?></p></td>
        </tr>
      </table>
      <table width="98%" border="0">
        <tr>
          <td><p align="justify"><?php echo $y["texto"]; ?></p></td>
        </tr>
      </table>
       <table width="100%" height="2" border="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="8" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Adicionar Comentário:</strong></td>
        </tr>
      </table>
      <script language=javascript>
function validar(form1) { 

if (document.form1.nome.value=="") {
alert("O Campo Nome não está preenchido!")
form1.nome.focus();
return false
}

var filtro_mail = /^.+@.+\..{2,3}$/
if (!filtro_mail.test(form1.email.value) || form1.email.value=="") {
alert("Preencha o e-mail corretamente.");
form1.email.focus();
return false
}

}

                        </SCRIPT>
      <form action="cadcomentario.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>Nome:
              <input name="nome" type="text" class="fontebaixo2" size="60">
              *
              <input type="hidden" name="idnoticia" value="<?php echo $y["id"]; ?>" /></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>E-mail:
              <input name="email" type="text" class="fontebaixo2" size="60">
              *</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="4"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>Comentário: <i>( Limite de 255 caracteres )</i></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><SCRIPT LANGUAGE="JavaScript">
<!-- 
function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
// -->
      </script>
              <textarea  wrap="physical" onKeyDown="textCounter(this.form.texto,this.form.remLen,255);" onKeyUp="textCounter(this.form.texto,this.form.remLen,255);" name="texto" cols="60" rows="8" class="fontebaixo2"></textarea></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="2"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>Faltam
              <input name=remLen type=text class="manchete_texto" value="255" size=3 maxlength=3 readonly />
              caracteres.</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="2"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><input name="button3" type="submit" class="fontebaixo2" id="button3" value="Postar Comentário"></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="2"></td>
          </tr>
        </table>
       </form>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Comentários Postados:</strong></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="2" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><span class="rodape">
            <?php
				   
				   include "administrador/conexao.php";

$sql5 = mysql_query("SELECT * FROM cw_comentarios WHERE idnoticia='$id' AND status='0' ORDER BY id DESC");
$contar5 = mysql_num_rows($sql5); 
if ($contar5 < 1)  
   {echo "<div align=center><br><b>N&atilde;o existe comentários cadastrados!</b><br></div>"; 
   }
else 
   {
while($x = mysql_fetch_array($sql5))
   {
   ?>
            </span>
            <table width="99%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="3%"><img src="administrador/imagens/comentarios.png" width="24" height="24" /></td>
                <td width="61%">&nbsp;<b><?php echo $x["nome"]; ?></b> - <a href="mailto:<?php echo $x["email"]; ?>" class="fontebaixo2"><?php echo $x["email"]; ?></a></td>
                <td width="36%" align="right"><i><?php echo $x["data"]; ?> - <?php echo $x["hora"]; ?></i>&nbsp;</td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><?php echo $x["texto"]; ?></td>
              </tr>
            </table>
            <span style="MARGIN: 0px">
              <?php
  }
  }
 ?>
            </span></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="4" /></td>
        </tr>
      </table>
      <table width="100%" border="0">
        <tr>
          <td><a href="javascript:history.go(-2)"><img src="imagens/volta.png" border="0" /></a></td>
        </tr>
      </table>
      <table width="100%" height="2" border="0">
        <tr>
          <td><img src="imagens/branco.gif" width="2" height="2" /></td>
        </tr>
      </table></td>
                  </tr>
                </table><?php
  
  }}
 ?></td>
                </tr>
          </table></td>
        </tr>
</table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td><img src="imagens/branco.gif" width="2" height="4" /></td>
              </tr>
          </table></td>
    
  </tr>
</table>

<table width="100%" bgcolor="#CCCCCC" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table> 
<table width="100%" bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><img src="imagens/branco.gif" width="2" height="1" /></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php include("baixo(1).php"); ?></td>
  </tr>
</table>

    
    
    </td>
    <td width="1" bgcolor="#CCCCCC"><img src="imagens/branco.gif" width="1" height="1" /></td>
  </tr>
</table>
</body>
</html>