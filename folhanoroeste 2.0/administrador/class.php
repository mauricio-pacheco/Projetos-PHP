<?php require_once "cuteeditor/cuteeditor_files/include_CuteEditor.php" ?> 
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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR CLASSIFICADO</b></font></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="4" /></td>
              </tr>
            </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
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
                 <input class="fontetabela" style="WIDTH: 580px" 
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
               <td class="manchete_texto" align="left"><strong>Dados do Classificado</strong></td>
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

include "conexao.php";

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
               <td class="rodape">                 <span class="fontetabela">
                 <?php    
                //Step 2: Create Editor object.    
                $editor=new CuteEditor("texto");    
                $editor->Text="";
				$editor->Height="600";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="texto";     
                //Step 4: Render Editor    
                $editor->Draw();    
            ?>               
                 </span></td>
             </tr>
             <tr>
               <td align="left"><p style="MARGIN: 0px"> 
                 <span class="fontetabela">
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR CLASSIFICADO" />
                 </span></p></td>
             </tr>
           </table></form></td>
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