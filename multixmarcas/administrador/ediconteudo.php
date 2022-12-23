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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR PÁGINA</b></font></td>
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
            <td> <script language=javascript>
function validar(form1) { 

if (document.form1.titulo.value=="") {
alert("O Campo Titulo da Página não está preenchido!")
form1.titulo.focus();
return false
}

}

                        </SCRIPT>
                                <form action="updateconteudo.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)"><table width="100%" border="0" align="center">
             <tr>
               <td class="manchete_texto" align="left">&nbsp;<span class="rodape">
                 <?php

include "conexao.php";

$id = $_GET['id'];
$idmenu = $_GET['idmenu'];
$sql = mysql_query("SELECT * FROM cw_conteudo WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe conteúdo cadastrado!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
               </span>
                 <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />T&iacute;tulo da P&aacute;gina ( Sub-Menu ):
                 <input class="fontetabela" style="WIDTH: 180px" 
                  name="titulo"  value="<?php echo $n["titulo"]; ?>" />
                 *</td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Selecione o Menu: 
                 <select class="fontetabela" name="idmenu">
                  <?php if ($idmenu == '0') { ?>
                  
                   <?php } else { ?> 			   
				   <?php 	  
	   $sql3 = mysql_query("SELECT * FROM cw_menus WHERE id='$idmenu'");
				   while($z = mysql_fetch_array($sql3))
   {
	  
   ?>
                   
                   
                   <option value="<?php echo $z["id"]; ?>"><?php echo $z["departamento"];?></option>
                 				   <?php 
				   $dept = $z["departamento"];
				   } } ?>
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
                 </select></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Texto da Página:</td>
             </tr>
             <tr>
               <td class="rodape"><span class="style25">
                 <?php    
                //Step 2: Create Editor object.    
                $editor=new CuteEditor("texto");    
                 $editor->Text="$n[texto]";
				$editor->Height="1000";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="texto";     
                //Step 4: Render Editor    
                $editor->Draw();    
            ?>
               </span></td>
             </tr>
             <tr>
               <td align="left"><p style="MARGIN: 0px"> <span class="manchete_texto">
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="EDITAR PÁGINA" />
                 </span>
                   <?php
  }
  }
 ?>
               </p></td>
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