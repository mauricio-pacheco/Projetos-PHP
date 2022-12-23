<table width="99%" border="0" align="center">
      <tr>
        <td width="53%" class="fontetabela"><script language="JavaScript" type="text/javascript">
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
document.write(txtsaudacao + " Palmitinho/RS, hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script></td>
        <td width="47%" align="right">
                  <form action="buscarveiculos.php" method="post" name="form1" id="form1"><table width="90%" border="0">
            <tr>
              <td width="73%"><input name="palavra" type="text" class="fontetabela2" id="palavra" style="width:330px" onclick="this.value=''"value="DIGITE O NOME DO VE&Iacute;CULO" /></td>
              <td width="27%" align="left"><input name="button" type="image" src="administrador/imagens/pesquisar.png" class="fontegrana" id="button" value="PESQUISAR VE&Iacute;CULO" /></td>
            </tr>
          </table></form></td>
      </tr>
    </table>