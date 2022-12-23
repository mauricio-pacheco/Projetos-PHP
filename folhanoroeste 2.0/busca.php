<FORM style="MARGIN: 0px" name="form_busca" action="buscanormal.php" method=post>
<table width="100%" border="0">
      <tr>
        <td width="44%">&nbsp;<script language="JavaScript" type="text/javascript">
var datahora,xhora,xdia,dia,mes,ano,txtsaudacao;
datahora = new Date();
xhora = datahora.getHours();
if (xhora >= 0 && xhora < 12) {txtsaudacao = "Bom Dia,"}
if (xhora >= 12 && xhora < 18) {txtsaudacao = "Boa Tarde,"}
if (xhora >= 18 && xhora <= 23) {txtsaudacao = "Boa Noite,"}
xdia = datahora.getDay();
diasemana = new Array(7);
diasemana[0] = "Domingo";
diasemana[1] = "Segunda Feira";
diasemana[2] = "Terça Feira";
diasemana[3] = "Quarta Feira";
diasemana[4] = "Quinta Feira";
diasemana[5] = "Sexta Feira";
diasemana[6] = "Sábado";
dia = datahora.getDate();
mes = datahora.getMonth();
mesdoano = new Array(12);
mesdoano[0] = "janeiro";
mesdoano[1] = "fevereiro";
mesdoano[2] = "março";
mesdoano[3] = "abril";
mesdoano[4] = "maio";
mesdoano[5] = "junho";
mesdoano[6] = "julho";
mesdoano[7] = "agosto";
mesdoano[8] = "setembro";
mesdoano[9] = "outubro";
mesdoano[10] = "novembro";
mesdoano[11] = "dezembro";
ano = datahora.getFullYear();
document.write(txtsaudacao + " Frederico Westphalen/RS, hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script></td>
        <td width="18%"><span id="clock">
      <script>setTimeout("horas()",1000);</script>
    </span></td>
        <td width="35%" align="right" valign="top">Pesquisar Notícia:
          <input name="palavra" onClick="this.value=''" value="Digite a Palavra Chave" type="text" class="texto" size="38"></td>
        <td width="3%"><input type="image" src="imagens/ok.jpg" alt="Pesquisar" name="button" class="texto" value="ok"></td>
      </tr>
    </table></FORM>