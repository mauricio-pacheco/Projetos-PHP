<?php include("meta.php"); ?>
<BODY class=wide bgcolor="#3C7FAF">
<DIV id=reporting><IMG id=ctag height=1 alt="" src="home_arquivos/c.gif" 
width=1>
<DIV id=omni>
<NOSCRIPT>
<DIV><IMG height=1 alt="" src="home_arquivos/r.gif" 
width=1></DIV></NOSCRIPT></DIV></DIV>
<DIV class="page6 region9" id=wrapper>
<DIV id=page>
<?php include("cabecalho.php"); ?>
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <?php include("busca.php"); ?>
  </DIV>
<DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
<?php include("login.php"); ?>
</DIV>
<DIV id=nav>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
<DIV class="nav3 cf">
  <DIV style="BORDER-TOP: #E1E1E1 1px solid; WIDTH: 972px">
    <DIV align=center>
      <?php include("menu.php"); ?>
    </DIV>
  </DIV>
</DIV></DIV></DIV></DIV>
<DIV id=content>
<DIV class=ca id=subhead></DIV>
<DIV id=mediapage2>
<DIV id=infopanerow>
<DIV class="ca mpreg5" id=infotop>
<?php include("notgeral.php"); ?></DIV>
<DIV class="ca mpreg4" id=mainadtop><!---->
<DIV class="parent chrome29  advertisement customcontainer blue">
<DIV class="heading alignright"><!----></DIV>
<DIV class=content>
<DIV class=adcenter>
  <DIV class=advertisement>
  <?php include("edicoes.php"); ?>
    
</DIV></DIV></DIV></DIV></DIV></DIV>
<DIV class=ca id=subfoot><?php include("fotos.php"); ?></DIV>
<DIV id=mediapage2column1and2>
<DIV class="ca mpreg3" id=area4></DIV>
<DIV class="ca mpreg1 largetitle blackheading" id=area1>
  <DIV class="parent chrome23 single1 customcontainer blue">
    <DIV class="heading" style="BACKGROUND: #E71C24"><SPAN class=text 
style="COLOR: #ffffff">Cadastrar Classificado</SPAN></span></DIV>
    <DIV class=content><script language=javascript>
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
           </table></form></DIV>
  </DIV>
</DIV>
 
 
 
<DIV class="ca mpreg4" id=area2><!---->
<?php include("enquete.php"); ?>
<?php include("tempo.php"); ?>
<?php include("lateral.php"); ?>
  
  </DIV>
<DIV class="ca mpreg3" id=area5><!----></DIV></DIV></DIV>
<DIV class=ca id=subfoot>
<?php include("videos.php"); ?>
<?php include("baixo.php"); ?>
<?php include("rodape.php"); ?>
</DIV></DIV></DIV>
<DIV id=foot>
<DIV class="parent chrome6 single1">
<DIV class="child c1 first">
</DIV></DIV></DIV></DIV>
</BODY></HTML>
