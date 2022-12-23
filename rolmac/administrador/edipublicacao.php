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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>CADASTRAR PUBLICAÇÃO</b></font></td>
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
            <td>
            <?php 
			
			$id = $_GET['id'];
			$idsessao = $_GET['idsessao'];
			$idsubsessao = $_GET['idsubsessao'];
			
			?>
            
             <span class="rodape">
             <?php

include "conexao.php";

$sql = mysql_query("SELECT * FROM cw_pub WHERE id='$id' AND idsessao='$idsessao' AND idsubsessao='$idsubsessao' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe publicação cadastrada!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
             </span>
<script language=javascript>
function validar(form1) { 

if (document.form1.titulo.value=="") {
alert("O Campo Titulo da Publicação não está preenchido!")
form1.titulo.focus();
return false
}

}

                        </SCRIPT>
                                <form action="updatepublicacao.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)"><table width="100%" border="0" align="center">
             <tr>
               <td class="manchete_texto" align="left">&nbsp;T&iacute;tulo da Publicação:
                 <input class="fontetabela" style="WIDTH: 600px" 
                  name="titulo" value="<?php echo $n["titulo"]; ?>" />
                 *</td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td width="1%"><img src="imagens/ddd.png" width="36" height="40" /></td>
                   <td width="99%">&nbsp;<a href="ups/publicacoes/<?php echo $n["arquivo"]; ?>" class="fontetabela" target="_blank"><?php echo $n["titulo"]; ?></a></td>
                 </tr>
               </table></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Arquivo da Publicação:<span class="style15">
                 <input type="file" name="arquivo" class="fontetabela" />
                 <span class="fonteadm">
                 <input name="id" type="hidden" value="<?php echo $n["id"]; ?>" />
                 <input name="idsessao" type="hidden" value="<?php echo $n["idsessao"]; ?>" />
                 <input name="idsubsessao" type="hidden" value="<?php echo $n["idsubsessao"]; ?>" />
                 (caso n&atilde;o deseje editar a foto deixe   em branco)
                 <input type="hidden" name="arquivo" value="<?php echo $n["arquivo"]; ?>" />
                 </span></span></td>
             </tr>
             <tr>
               <td align="left"><p style="MARGIN: 0px"> <span class="manchete_texto">
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="EDITAR PUBLICAÇÃO" />
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