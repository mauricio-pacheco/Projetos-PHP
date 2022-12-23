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
         <table width="100%" border="0" height="30" cellspacing="0" cellpadding="0">
           <tr>
             <td align="left" bgcolor="#E71C24" class="fontemaior">&nbsp;&nbsp;<strong>Cadastrar Classificado</strong></td>
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
                <td class="legenda"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td><script language=javascript>
function validar(form1) { 

if (document.form1.nome.value=="") {
alert("O Campo Nome do Classificado não está preenchido!")
form1.nome.focus();
return false
}

if (document.form1.email.value=="") {
alert("O Campo E-mail do Classificado não está preenchido!")
form1.email.focus();
return false
}

if (document.form1.telefone.value=="") {
alert("O Campo Telefone do Classificado não está preenchido!")
form1.telefone.focus();
return false
}

if (document.form1.titulo.value=="") {
alert("O Campo Titulo do Classificado não está preenchido!")
form1.titulo.focus();
return false
}

}

                        </SCRIPT>
                                <form action="cadclass.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)"><table width="98%" border="0" align="center">
             <tr>
               <td class="manchete_texto" align="left"><strong>Dados Pessoais</strong></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Nome: <span class="fontetabela">
                 <input class="fontetabela" style="WIDTH: 480px" 
                  name="nome" value="" />
               *</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;E-mail: <span class="fontetabela">
                 <input class="fontetabela" style="WIDTH: 200px" 
                  name="email" value="" />
*</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Telefone: <span class="fontetabela">
                 <input class="fontetabela" style="WIDTH: 100px" 
                  name="telefone" value="" />
*</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><img src="../imagens/branco.gif" width="2" height="6" /></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left" bgcolor="#CCCCCC"><img src="../imagens/branco.gif" width="2" height="1" /></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><img src="../imagens/branco.gif" width="2" height="6" /></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><strong>Dados Classificado</strong></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;T&iacute;tulo do Classificado:
                   <input class="fontetabela" style="WIDTH: 580px" 
                  name="titulo" value="" />
                 *</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Departamento: 
                 <select class="fontetabela" name="iddep">
                    <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM cw_depclass ORDER BY departamento ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                   <option value="<?php echo $n["id"]; ?>"><?php echo $n["departamento"]; ?></option>
                   <?
  }
  }
 ?>
                 </select></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Imagem do Classificado: 
                   <input type="file" name="foto" class="fontetabela" />
                   ( Tamanho Máximo do Arquivo: 500 Kb - Tipo: JPG )</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Imagem do Classificado:
                   <input type="file" name="foto2" class="fontetabela" />
                   ( Tamanho Máximo do Arquivo: 500 Kb - Tipo: JPG )</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Imagem do Classificado:
                   <input type="file" name="foto3" class="fontetabela" />
                   ( Tamanho Máximo do Arquivo: 500 Kb - Tipo: JPG )</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Descrição do Classificado:</span></td>
             </tr>
             <tr>
               <td class="rodape">
               <?php
include("fckeditor/fckeditor.php");
?>
                <?php
									$editor = new FCKeditor("texto");
									$editor->BasePath = "fckeditor/";
									$editor->Value = "";
									$editor->Width = "100%";
									$editor->Height = "440";
									$editor->ToolbarSet	= "Basic" ;
									$editor->Create();
									?></td>
             </tr>
             <tr>
               <td align="left"><p style="MARGIN: 0px"> 
                 <span class="fontetabela">
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR CLASSIFICADO" />
                 </span></p></td>
             </tr>
           </table></form></td>
                  </tr>
                </table></td>
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