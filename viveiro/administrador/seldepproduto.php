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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR PRODUTO NO DEPARTAMENTO 
                    <?php
									
									$iddepnovo = $_GET["id"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$iddepnovo'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];    
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
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr></tr>
          <tr>
            <td><script language=javascript>
function validar(form1) { 

if (document.form1.nome.value=="") {
alert("O Campo Nome do Produto não está preenchido!")
form1.nome.focus();
return false
}

if (document.form1.peso.value=="") {
alert("O Campo Peso do Produto não está preenchido!")
form1.peso.focus();
return false
}

}

                        </SCRIPT>
                                <form action="cadproduto.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)"><table width="98%" border="0" align="center">
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Nome do Produto:
                   <input class="fontetabela" style="WIDTH: 580px" 
                  name="nome" value="" />
                 *</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Sub-Departamento: 
                 <input name="departamento" type="hidden" value="<?php echo $z["id"]; ?>" />
                 <select class="fontetabela" name="subdep">
                   <?php
$iddeppuxado = $z["id"];


$sql = mysql_query("SELECT * FROM cw_subdepprod WHERE iddep='$iddeppuxado' ORDER BY nomesub ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe sub-departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                   <option value="<?php echo $n["id"]; ?>"><?php echo $n["nomesub"]; ?></option>
                   <?
  }
  }
 ?>
                 </select><?php } ?></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Imagem do Produto: 
                   <input type="file" name="foto" class="fontetabela" />
                 </span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">Peso: <span class="fontetabela">
                 <input class="fontetabela" name="peso" size="12" />
               </span>Kg ( Peso total do pacote em Quilos, caso seja menos de 1Kg, ex.: 300g, coloque 0.300 ) <span class="fontetabela">*</span><br /></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Valor: <font color="#009900">R$</font> <span class="fontetabela">
                 <input class="fontetabela" name="valor" />
               Ex: 12.98</span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Valor a Prazo: <span class="fontetabela">
                 <input class="fontetabela" name="valorpx" size="6" />
               </span>X de <font color="#009900">R$</font> <span class="fontetabela">
               <input class="fontetabela" name="valorp" />
               </span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Valor a tratar:<span class="fontetabela">
               <input class="fontetabela" name="valortratar" size="100" />
               </span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Descrição do Produto:</span></td>
             </tr>
             <tr>
               <td class="rodape">                 <span class="fontetabela">
                 <?php    
                //Step 2: Create Editor object.    
                $editor=new CuteEditor("descricao");    
                $editor->Text="";
				$editor->Height="600";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="descricao";     
                //Step 4: Render Editor    
                $editor->Draw();    
            ?>               
                 </span></td>
             </tr>
             <tr>
               <td align="left"><p style="MARGIN: 0px"> 
                 <span class="fontetabela">
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR PRODUTO" />
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