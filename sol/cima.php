<script>
function mensagem(){
    alert('Conteudo bloqueado!');
    return false;
}
 
function bloquearCopia(Event){
    var Event = Event ? Event : window.event;
    var tecla = (Event.keyCode) ? Event.keyCode : Event.which;
    if(tecla == 17){
        mensagem();
	}
}
</script>
<script>
	document.onkeypress = bloquearCopia;
	document.onkeydown = bloquearCopia;
	document.oncontextmenu = mensagem;
</script>
<table width="100%" border="0" height="184" background="imagens/fundocima.png" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top"><table width="942" height="183" background="imagens/acima3.jpg" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="bottom"><table height="160" width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="6%">&nbsp;</td>
            <td width="27%" align="center"><a href="index.php"><img src="imagens/nada.png" width="246" height="157" border="o" alt="IR PARA A PÁGINA PRINCIPAL" title="IR PARA A PÁGINA PRINCIPAL" /></a></td>
            <td width="67%">&nbsp;</td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="33%">&nbsp;</td>
            <td width="62%" class="fonte"><script language="JavaScript" type="text/javascript">
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
document.write(txtsaudacao + " Vista Alegre-RS, hoje " + diasemana[xdia] + ", " + dia + " de " + mesdoano[mes] + " de " + ano);
</script></td>
            <td width="5%">&nbsp;</td>
          </tr>
        </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="1" height="6" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>