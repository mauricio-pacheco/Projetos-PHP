<table width="100%" border="0" cellSpacing=0 cellPadding=0>
  <tr>
    <td background="modelo_arquivos/mainnav-bg.gif">
<DIV class=clearfix id=ja-mainnavwrap>
<DIV id=ja-mainnav>
<DIV class=manchete_texto>
<UL id=ja-transmenu>
  <LI><A class=mainlevel-active-trans id=menu1 title="Página Principal" 
  href="index.php"><SPAN>&nbsp;&nbsp;&nbsp;&nbsp;Página Principal</SPAN></A>
  <LI><A class=havechild-mainlevel-trans id=menu112 title="A Empresa" 
  ><SPAN>A Empresa&nbsp;&nbsp;&nbsp;</SPAN></A>
  <LI><A class=havechild-mainlevel-trans id=menu108 title="Empreendimentos" 
  ><SPAN>Empreendimentos&nbsp;&nbsp;&nbsp;</SPAN></A>
  <LI><A class=havechild-mainlevel-trans id=menu117 title="Cidade" 
  ><SPAN>Cidade&nbsp;&nbsp;&nbsp;</SPAN></A>
  <LI><A class=havechild-mainlevel-trans id=menu103 title="Galeria de Fotos" 
  href="galeria.php"><SPAN>Galeria de Fotos&nbsp;&nbsp;&nbsp;</SPAN></A>
  <LI><A class=havechild-mainlevel-trans id=menu1 title="Fale Conosco" 
  href="contatos.php"><SPAN>Fale Conosco&nbsp;&nbsp;&nbsp;<img src="imagens/branco.gif" width="3" height="1"></SPAN></A></LI></UL>
<SCRIPT language=javascript type=text/javascript>
			if (TransMenu.isSupported()) {
				TransMenu.updateImgPath('modelo_arquivos');
				var ms = new TransMenuSet(TransMenu.direction.down, 0, 0, TransMenu.reference.bottomLeft);
				TransMenu.subpad_x = 0;
				TransMenu.subpad_y = 0;

			
				document.getElementById("menu1").onmouseover = function() {
					ms.hideCurrent();
				}
				


var tmenu112 = ms.addMenu(document.getElementById("menu112"));
tmenu112.addItem("- Histórico", "empresa.php", 0, 0);
tmenu112.addItem("- Localização", "lempresa.php", 0, 0);

var tmenu108 = ms.addMenu(document.getElementById("menu108"));
tmenu108.addItem("- Lançamentos", "lancamentos.php", 0, 0);
tmenu108.addItem("- Em Execução", "emexecucao.php", 0, 0);
tmenu108.addItem("- Obras Realizadas", "realizadas.php", 0, 0);
var tmenu117 = ms.addMenu(document.getElementById("menu117"));
tmenu117.addItem("- Localização", "localiza.php", 0, 0);
tmenu117.addItem("- Fotos", "http://www.construtoramilani.com.br/fw/vergaleria.php?id=37", 0, 0);
tmenu117.addItem("- Histórico", "historicocidade.php", 0, 0);




				TransMenu.renderAll();
			}
			init1=function(){TransMenu.initialize();}
			if (window.attachEvent) {
				window.attachEvent("onload", init1);
			}else{
				TransMenu.initialize();			
			}
			</SCRIPT>
</DIV></DIV></DIV>
<DIV class=ja-mainnavshadow></DIV></td>
  </tr>
</table>