
<SCRIPT type=text/javascript src="classes2/mediaobject.js"></SCRIPT>


<SCRIPT type=text/javascript src="classes2/ajax_1.2.js"></SCRIPT>

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
loadXMLDoc("cidades.php?ID="+valor);
}

</script> 
<FORM style="MARGIN: 0px" name="form_busca" action="buscanormal.php" 
                  method=post>
   <table width="100%" border="0">
                  <tr>
                    <td><img src="imagens/menudelhi.png" ></td>
                  </tr>
                </table>
                 <table width="100%" border="0">
                  <tr>
                    <td align="center" bgcolor="#EFEFEF"><a href="http://www.novadelhiresidence.com.br" target=_blank><img alt="Acesse Agora o Site do Residencial Nova D�lhi" title="Acesse Agora o Site do Residencial Nova D�lhi" src="imagens/bannerdelhi.png" border="0" ></a></td>
                  </tr>
                </table>
  <table width="100%" border="0">
    <tr>
      <td><img src="imagens/menu10.jpg" /></td>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
      <td align="center"><img src="images/pbqp.jpg" /></td>
    </tr>
  </table>
  <table width="100%" border="0">
                <tr>
                  <td><img src="imagens/menu8.jpg"></td>
                </tr>
              </table>
<table width="100%" border="0">
                  <tr>
                    <td align="left">
                      <input name="palavra" onclick="this.value=''" type="text" class="texto" style="WIDTH: 188px" value="Digite o nome do Empreendimento..." />
                    </td>
                  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td align="left"><select 
                                    name="sessao" id="sessao" style="WIDTH: 194px" 
                  title="Selecione o Valor">
      <option selected="selected" value="">Selecione a Sess�o</option>
      <option value="Lan&ccedil;amentos">Lan&ccedil;amentos</option>
      <option value="Em Execu&ccedil;&atilde;o">Em Execu&ccedil;&atilde;o</option>
      <option value="Obras Realizadas">Obras Realizadas</option>
    </select></td>
  </tr>
</table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><input type="image" src="imagens/pesquisar.jpg" width="126" height="34" border="0"></td>
                  </tr>
                </table></FORM>
                
                
                
<FORM style="MARGIN: 0px" name="form_busca" action="busca.php" 
                  method=post></FORM>
                
               <FORM 
            method=get action=http://www.google.com/search target=_blank> <table width="100%" border="0">
                  <tr>
                    <td><img src="menugoogle.jpg" ></td>
                  </tr>
                </table>
                
                <table width="100%" border="0">
                  <tr>
                    <td align="left">
                      <input name="q" onclick="this.value=''" type="text" class="texto" style="WIDTH: 188px" value="Digite a Palavra Chave" />
                    </td>
                  </tr>
</table>


<table width="100%" border="0">
                  <tr>
                    <td align="center"><input type="image" src="imagens/pesquisar.jpg" width="126" height="34" border="0"></td>
                  </tr>
</table></FORM>


                
                
                
                <table width="100%" border="0">
                  <tr>
                    <td><img src="imagens/menu2.jpg" ></td>
                  </tr>
                </table>
                               <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="lancamentos.php"><img src="imagens/novos.jpg" alt="Lan�amentos" border="0" style= "cursor:Hand" title="Lan�amentos"></a></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="emexecucao.php"><img src="imagens/lanc.jpg" alt="Em Execu��o" border="0" style= "cursor:Hand" title="Em Execu��o"></a></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="realizadas.php"><img src="imagens/lanc2.jpg" alt="Obras Realizadas" border="0" style= "cursor:Hand" title="Obras Realizadas"></a></td>
                  </tr>
                </table>
                 <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="avenda.php"><img src="imagens/vend.jpg" alt="Empreendimentos � Venda" border="0" style= "cursor:Hand" title="Empreendimentos � Venda"></a></td>
                  </tr>
                </table>
                  <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="galeria.php"><img src="imagens/galeria.jpg" alt="Galeria de Fotos" border="0" style= "cursor:Hand" title="Galeria de Fotos"></a></td>
                  </tr>
                </table>
                  <table width="100%" border="0">
                  <tr>
                    <td><img src="imagens/menu11.jpg" ></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="acompanhe.php"><img border="0" src="imagens/acompanhe.jpg" style= "cursor:Hand" alt="Acompanhe dus Obra" title="Acompanhe sua Obra"></a></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td><img src="imagens/menu3.jpg" ></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><img src="imagens/marcia.jpg"></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><img src="imagens/telefone.jpg" width="188" height="44"></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td><img src="imagens/menu4.jpg" ></td>
                  </tr>
                </table>
                <table width="100%" border="0">
                  <tr>
                    <td align="center"><a href="http://www.marinaportodorio.com.br" target=_blank><img alt="Acesse Agora o Site da Marina Porto do Rio" title="Acesse Agora o Site da Marina Porto do Rio" src="imagens/portodorio.jpg" border="0" ></a></td>
                  </tr>
                </table>
                
                <table width="100%" border="0">
                  <tr>
                    <td align="center">&nbsp;</td>
                  </tr>
                </table></TD>