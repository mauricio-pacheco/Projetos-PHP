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
                  <td width="98%">&nbsp;&nbsp;<font color="#FFFFFF" class="fontetabela2"><b>EDITAR PRODUTO
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

}

                        </SCRIPT>
                                <form action="updateproduto.php" method="post" name="form1" enctype="multipart/form-data" id="form1" onSubmit="return validar(this)">
                                <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM cw_produtos WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe noticias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                <table width="98%" border="0" align="center">
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Nome do Produto:
                   <input class="fontetabela" style="WIDTH: 580px" 
                  name="nome" value="<?php echo $n["nome"]; ?>" />
                 *
                 <input type="hidden" name="id" value="<?php echo $n["id"]; ?>" />
               </span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">
               <script>

var req;
function loadXMLDoc(url){
 req = null;

if (window.XMLHttpRequest) {
 req = new XMLHttpRequest();
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true); 
 req.send(null);

} else if (window.ActiveXObject) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.4.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP.3.0");
} catch(e) {
try {
req = new ActiveXObject("Msxml2.XMLHTTP");
} catch(e) {
try {
req = new ActiveXObject("Microsoft.XMLHTTP");
} catch(e) {
req = false;
}
}
}
}
if (req) {
 req.onreadystatechange = processReqChange;
 req.open("GET", url, true);
 req.send();
}
}
}


function processReqChange(){

if (req.readyState == 4) {
if (req.status == 200) {

document.getElementById("atualiza").innerHTML = req.responseText;
} else {
alert("Houve um problema ao obter os dados:\n" + req.statusText);
}
}
}



function atualiza(valor){
loadXMLDoc("subdeps.php?id="+valor);
}

</script>
               &nbsp;Departamento: 
               <select name="departamento" class="fontetabela" onblur="atualiza(this.value);">
                                  <option value="<?php
									
									$iddepnovo = $n["departamento"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$iddepnovo'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["id"];    }
									?>"> <?php
									
									$iddepnovo = $n["departamento"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_depprod WHERE id = '$iddepnovo'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nome"];    }
									?></option>
                 <?
		  include "conexao.php";
		  $result = mysql_query("SELECT * FROM cw_depprod ORDER BY 'nome' ASC");
		  while($row = mysql_fetch_array($result)){
		  echo "<option value=\"$row[id]\">$row[nome]</option>";
		  }
		  ?>
               </select></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><div id="atualiza">
                      &nbsp;Sub-Departamento: <select name="subdep" class="fontetabela">
                        <option value="<?php
									
									$iddepnovo = $n["departamento"];
									$idsubnovo = $n["subdep"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$idsubnovo' AND iddep = '$iddepnovo'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["id"];    }
									?>"><?php
									
									$iddepnovo = $n["departamento"];
									$idsubnovo = $n["subdep"];
									include "conexao.php";
									$sql2 = mysql_query("SELECT * FROM cw_subdepprod WHERE id = '$idsubnovo' AND iddep = '$iddepnovo'");
									while($z = mysql_fetch_array($sql2))
   { echo $z["nomesub"];    }
									?></option>
                      </select>
                    </div></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><img src="ups/produtos/<?php echo $n["foto"]; ?>" /></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left"><span class="fontetabela">&nbsp;Imagem do Produto: 
                   <input type="file" name="foto" class="fontetabela" />
                       &nbsp;(caso n&atilde;o deseje editar a foto deixe   em branco)
                       <input type="hidden" name="foto" value="<?php echo $n["foto"]; ?>" />
               </span></td>
             </tr>
             <tr>
               <td class="manchete_texto" align="left">&nbsp;Preço: <font color="#009900">R$</font> <span class="fontetabela">
                 <input class="fontetabela" name="valor" value="<?php echo $n["valor"]; ?>" />
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
				$editor->Text="$n[descricao]";
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
                 <input name="submit" type="submit" style="FONT-SIZE: 10px" value="EDITAR PRODUTO" />
                 </span></p></td>
             </tr>
           </table><?php
  }
  }
 ?></form></td>
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