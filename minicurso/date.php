<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<LINK rel=stylesheet type=text/css href="classes/estilos.css">
<title>Mini Curso de PHP - Maurício Pacheco</title>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">
<?php include("cima.php"); ?>
<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table class="boxSombra" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="23%" valign="top" bgcolor="#1A181D"><?php include("menu.php"); ?></td>
        <td width="77%" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="imagens/branco.gif" width="2" height="8" /></td>
          </tr>
        </table>
          <table background="imagens/barratexto.jpg" height="29" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="fontetitulo"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td>&nbsp;&nbsp;<strong>MINI CURSO DE PHP e MySQL - COMANDO DATE()</strong></td>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="8" /></td>
            </tr>
          </table>
          <table width="98%" bgcolor="#FFFFFF" height="500" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="fontetabela"><p><strong>Comando Date ()</strong></p>
                    <p>O objetivo desta sessão é ensinar como mostrar a data corrente (ou não) com PHP.</p>
                    <p>O PHP tem uma função chamada date() que serve para formatar a visualização da data. Esta função precisa de ao menos um parâmetro, que é exatamente o formato que a data será apresentada. Veja o exemplo abaixo:</p>
                    <div>
                      <p><span lang="EN-US" xml:lang="EN-US">echo date(“d/m/Y”);</span><br />
                    </p>
                    </div>
<p>Resultado será mais ou menos isso:</p>
                    <div>
                      <p>15/08/2008</p>
                    </div>
                    <p> Mas agora me diga: Como vou imaginar quais caracteres servem para formatar a data?<br />
                      Vou passar o link do php.net que contém todos os caracteres possíveis.</p>
                    <p><a href="http://br2.php.net/manual/pt_BR/function.date.php">http://br2.php.net/manual/pt_BR/function.date.php</a></p>
                    <p>Bom, mesmo assim, vou postar alguns exemplos bem úteis:</p>
                    <ul type="disc">
                      <li>date(“d/m/Y”):      15/07/2008 </li>
                      <li>date(“d/m/y”):      15/07/08</li>
                      <li><span lang="EN-US" xml:lang="EN-US">date(“d/m/Y H:i:s”): 15/07/2008 14:00:15</span></li>
                      <li>date(“d”):      15<span lang="EN-US" xml:lang="EN-US"></span></li>
                      <li>date(“Y”): 2008<span lang="EN-US" xml:lang="EN-US"></span></li>
                      <li>date(“Y-m-d”):      2008-07-15<span lang="EN-US" xml:lang="EN-US"></span></li>
                    </ul>
                    <p>Esta função retorna a hora do SERVIDOR. Então significa o seguinte, se você estiver vendo um site que esta hospedado em outro pais, posso ocorrer do horário mostrado na tela ser diferente do seu.<br />
                    </p></td>
                </tr>
              </table></td>
            </tr>
          </table>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="imagens/branco.gif" width="2" height="10" /></td>
            </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
</table>
<?php include("baixo.php"); ?>
</body>
</html>
