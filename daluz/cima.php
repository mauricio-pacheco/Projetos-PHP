<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="252"><a href="principal.php"><img src="imagens/logo.png" border="0" /></a></td>
        <td width="728" valign="top">
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
         <form action="pesquisa.php" method="post" name="form1" id="form1"> 
           <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td class="manchete_textomenu" align="right"><b>PESQUISAR IMÓVEL</b></td>
             </tr>
           </table>
           <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td align="right"><img src="imagens/branco.gif" width="2" height="4" /></td>
             </tr>
             <tr>
               <td align="right"><span class="manchete_texto">
                 <select name="departamento" class="manchete_texto9" style="width:180px" onblur="atualiza(this.value);">
                   <option value="#"> Selecione o tipo de imóvel </option>
                   <?
		  include "administrador/conexao.php";
		  $result = mysql_query("SELECT * FROM cw_depprod ORDER BY 'nome' ASC");
		  while($row = mysql_fetch_array($result)){
		  echo "<option value=\"$row[id]\">$row[nome]</option>";
		  }
		  ?>
                 </select>
               </span></td>
             </tr>
           </table>
           <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td align="right"><img src="imagens/branco.gif" width="2" height="4" /></td>
             </tr>
             <tr>
               <td align="right"><div id="atualiza"><select style="width:200px" name="subdep" class="manchete_texto9">
                 <option value="#"> Selecione o tipo de imóvel primeiro </option>
               </select></div></td>
             </tr>
           </table>
           <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
             <tr>
               <td align="right"><img src="imagens/branco.gif" width="2" height="4" /></td>
             </tr>
             <tr>
               <td align="right"><span class="manchete_textocasab">Tipo: </span>
                 <select name="tipo" class="manchete_texto9" id="select">
                   <option value="Venda">Venda</option>
                   <option value="Loca&ccedil;&atilde;o">Loca&ccedil;&atilde;o</option>
               </select>
               <input type="submit" value="PESQUISAR IMÓVEL" name="button" id="button" class="manchete_texto9" /></td>
             </tr>
           </table>
           
           <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
               <td><img src="imagens/branco.gif" width="2" height="10" /></td>
             </tr>
           </table>
         </form>
         <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="2" /></td>
            </tr>
      </table>
         <table width="99%" border="0" align="right" cellpadding="0" cellspacing="0">
           <tr>
             <td class="manchete_textomenu" align="right"><a href="principal.php" class="manchete_textomenu"><b>PÁGINA PRINCIPAL</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="empresa.php" class="manchete_textomenu"><b>EMPRESA</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="vendas.php" class="manchete_textomenu"><b>VENDAS</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="locacao.php" class="manchete_textomenu"><b>LOCAÇÃO</b></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="contatos.php" class="manchete_textomenu"><b>FALE CONOSCO</b></a>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="msnim:add?contact=sergioamluz@hotmail.com" class="fonte"><img src="imagens/msn.png" alt="Adiconar Suporte Via MSN" title="Adiconar Suporte Via MSN" width="43" height="32" border="0" /></a></td>
           </tr>
        </table></td>
      </tr>
    </table>

