<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro Confinamento</title>
<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
BODY {
scrollbar-face-color:#009900; scrollbar-highlight-color:#009900; scrollbar-3dlight-color:#FFFFFF; scrollbar-darkshadow-color:#009900; scrollbar-shadow-color:#FFFFFF; scrollbar-arrow-color:#FFFFFF; scrollbar-track-color:#009900;
}

</style>
<LINK href="default3.css" type=text/css rel=STYLESHEET>
<script LANGUAGE="JavaScript">

function validar(Form) {


var invalid, s;
invalid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
 
var s;
 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
return false
}

if (document.cadastro.propriedade.value=="") {
alert("O Campo Propriedade não está preenchido!")
return false
}

if (document.cadastro.municipio.value=="") {
alert("O Campo Município não está preenchido!")
return false
}

if (document.cadastro.assinatura.value=="") {
alert("O Campo Assinatura não está preenchido!")
return false
}

if (document.cadastro.localizacao.value=="") {
alert("O Campo Localização não está preenchido!")
return false
}

if (document.cadastro.reserva.value=="") {
alert("O Campo Reserva não está preenchido!")
return false
}

if (document.cadastro.area.value=="") {
alert("O Campo Área não está preenchido!")
return false
}

if (document.cadastro.pastagens.value=="") {
alert("O Campo Pastagens Predominantes não está preenchido!")
return false
}

if (document.cadastro.qt1.value=="") {
alert("O Campo Quantidade não está preenchido!")
return false
}

if (document.cadastro.sex1.value=="") {
alert("O Campo Sexo não está preenchido!")
return false
}

if (document.cadastro.idade1.value=="") {
alert("O Campo Idade não está preenchido!")
return false
}

if (document.cadastro.peso1.value=="") {
alert("O Campo Peso @ não está preenchido!")
return false
}

if (document.cadastro.pesok1.value=="") {
alert("O Campo Peso Kg não está preenchido!")
return false
}




return true;
}
</script>
</head>
</html>
<html>
<head>
</head>
<body>
<br /><p align="center"><img src="fucha.jpg" width="500" height="80" /></p>
<p align="center"><img src="banner.jpg" width="560" height="149" border="1"></p>
<table width="600" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>CONTATO POR TELEFONE: </strong></font></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><DIV><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Escritorio Central: Walker D. Ricarte   (Coordenador de Compras) (65) 3308-5069 / (65) 9605 - 7255</font></DIV>
      <DIV><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></DIV>
      <DIV><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Escritorio Juara: Eduardo Pavoni (66) 3556   - 1958 / (65) 9602-3386</font></DIV>
      <DIV><font size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></DIV>
    <DIV><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Escritorio em Paranatinga: Dario Gollin   (66) 9611-7070</font></DIV></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><div align="center"><strong><font size="1" face="Verdana, Arial, Helvetica, sans-serif">FICHA DE CADASTRO DE INTEN&Ccedil;&Atilde;O PARA O CONFINAMENTO </font></strong></div></td>
  </tr>
</table>
<br /> 
<hr />
 <div align="center"><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><br>*</font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Campos Obrigat&oacute;rios </font><br /><br>
 </div>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
  <form name="cadastro" method="post" action="http://www.casadaweb.net/vanguarda/recebe.php" onSubmit="return validar(this)"> <tr>
      <td width="31%"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Nome:</font></td>
      <td width="69%"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="nome" type="text" class="camposformularios" size="60"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Propriedade:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="propriedade" type="text" class="camposformularios" size="60"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Munic&iacute;pio:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="municipio" type="text" class="camposformularios" size="40"/>
</font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        Estado:
        <select name="estado">
          <option value="--">-- </option>
          <option value="AC">AC </option>
          <option value="AL">AL </option>
          <option value="AM">AM </option>
          <option value="AP">AP </option>
          <option value="BA">BA </option>
          <option value="CE">CE </option>
          <option value="DF">DF </option>
          <option value="ES">ES </option>
          <option value="GO">GO </option>
          <option value="MA">MA </option>
          <option value="MG">MG </option>
          <option value="MS">MS </option>
          <option value="MT">MT </option>
          <option value="PA">PA </option>
          <option value="PB">PB </option>
          <option value="PE">PE </option>
          <option value="PI">PI </option>
          <option value="PR">PR </option>
          <option value="RJ">RJ </option>
          <option value="RN">RN </option>
          <option value="RO">RO </option>
          <option value="RR">RR </option>
          <option value="RS">RS </option>
          <option value="SC">SC </option>
          <option value="SE">SE </option>
          <option value="SP">SP </option>
          <option value="TO">TO</option>
        </select>
      
      </font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Localiza&ccedil;&atilde;o (coordenadas):</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="localizacao" type="text" class="camposformularios" size="60"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Reserva:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="reserva" type="text" class="camposformularios" size="26"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">&Aacute;rea:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="area" type="text" class="camposformularios" size="26"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Suplementa&ccedil;&atilde;o realizada:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        &aacute;gua:
        <input  name="agua" type="text" class="camposformularios" size="26"/> 
        seca: 
        <input  name="seca" type="text" class="camposformularios" size="26"/>
      </font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Pastagens predominantes:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="pastagens" type="text" class="camposformularios" size="60"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Rastreabilidade:</font></td>
      <td><input type="radio" name="rastro" value="Sim" />
          <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sim</font> &nbsp;&nbsp;&nbsp;
          <input type="radio" name="rastro" value="Não" />
          <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&atilde;o</font> &nbsp;&nbsp;&nbsp;
          <input type="radio" name="rastro" value="Em processo de rastreamento" />
      <font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Em processo de rastreamento </font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Se sim, qual a empresa:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="rastrosim" type="text" class="camposformularios" size="60"/>
      </font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Dist&acirc;ncia  estimada da &aacute;rea de Confinamento:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="distancia" type="text" class="camposformularios" size="60"/>
      </font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<table width="600" border="0" align="center">
  <tr>
    <td width"20%"><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Quantidade</font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> *</font></div></td>
    <td width"20%"><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Sexo </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></div></td>
    <td width"20%"><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Idade </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></div></td>
    <td width"20%"><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Peso @</font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> *</font></div></td>
    <td width"20%"><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Peso Kg</font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> *</font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="qt1" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="sex1" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="idade1" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="peso1" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="pesok1" type="text" class="camposformularios" size="20"/>
    </font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="qt2" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="sex2" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="idade2" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="peso2" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="pesok2" type="text" class="camposformularios" size="20"/>
    </font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="qt3" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="sex3" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="idade3" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="peso3" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="pesok3" type="text" class="camposformularios" size="20"/>
    </font></div></td>
  </tr>
  <tr>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="qt4" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="sex4" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="idade4" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="peso4" type="text" class="camposformularios" size="20"/>
    </font></div></td>
    <td><div align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
      <input  name="pesok4" type="text" class="camposformularios" size="20"/>
    </font></div></td>
  </tr>
</table>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="279">&nbsp;</td>
      <td width="321"><div align="right"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Nova Mutum, 
        <input  name="dia" type="text" class="camposformularios" size="4"/>
        de 
        <select name="mes">
          <option value="Janeiro">Janeiro </option>
          <option value="Fevereiro">Fevereiro </option>
          <option value="Março">Março </option>
          <option value="Abril">Abril </option>
          <option value="Maio">Maio </option>
          <option value="Junho">Junho </option>
          <option value="Julho">Julho </option>
          <option value="Agosto">Agosto </option>
          <option value="Setembro">Setembro </option>
          <option value="Outubro">Outubro </option>
          <option value="Novembro">Novembro </option>
          <option value="Dezembro">Dezembro </option>
          </select> 
        20 
        <select name="ano">
          <option value="07">07 </option>
          <option value="08">08 </option>
          <option value="09">09 </option>
          <option value="10">10 </option>
          </select>
        &nbsp&nbsp
      </font></div></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
<p align="center"><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">DECLARO QUE LI AS INFORMA&Ccedil;&Otilde;ES, E ACEITO AS MESMAS.</font></p>
<table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">Assinatura do Interessado:</font></td>
      <td><font 
                                face="Verdana, Arial, Helvetica, sans-serif" 
                                color="#000000" size="1">
        <input  name="assinatura" type="text" class="camposformularios" size="60"/>
      </font><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif">*</font></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
  <label>
<div align="center">
    <input type="submit" name="Submit" value="ENVIAR FORMULÁRIO" />
</div>
 <br /> <hr /><br />
<table width="600" border="0" align="center">
  <tr>
    <td><p align="justify" class="style2"><strong><font size="2">Informa&ccedil;&otilde;es Adicionais:</font></strong></p>
      <p align="justify" class="style1"><strong>Do Translado:</strong></p>
      <p align="justify" class="style1">1 - O envio  dos animais para o Confinamento fica por conta do propriet&aacute;rio dos mesmos.</p>
      <div align="justify">
        <ol class="style1">
          <ol>
            <li> &ndash; Caso o  propriet&aacute;rio n&atilde;o tenha disponibilidade para o translado dos animais at&eacute; a  unidade de confinamento, o Grupo Vanguarda se encarrega deste, descontado os  custos de frete sobre a quantidade em arroubas, peso na unidade, na chegada dos  mesmos, descontado sobre o valor da origem, funrural e rastreabilidade.</li>
            <li>&ndash;  Os ve&iacute;culos de transporte devem atender aos padr&otilde;es que evitem quaisquer dados  f&iacute;sicos aos animais.</li>
          </ol>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Da Quantidade e Aparte:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  fixada a quantidade dos animais n&atilde;o poder&aacute; haver altera&ccedil;&atilde;o dos lotes, salvo  qualquer les&atilde;o ou outro sinistro sofrido pelo animal antes do embarque.</li>
         <BR /> <ol>
            <li>&ndash;  O aparte dos animais &eacute; realizado por um Funcion&aacute;rio T&eacute;cnico do Grupo Vanguarda,  que classificar&aacute; os mesmos de acordo com as necessidades de padr&atilde;o de  rendimento c&aacute;rneo e econ&ocirc;mico.</li>
            <li>&ndash;  O aparte acontece ap&oacute;s os animais terem permanecido 12 (doze) horas de jejum,  caso o produtor se recuse a jejuar os animais, ser&aacute; descontado 6% (seis por  cento) do peso bruto.</li>
          </ol>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Dos Encargos:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Estes ser&atilde;o avaliados, sendo que cada parte arcar&aacute; com os impostos que lhes s&atilde;o  cabidos</li>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Das Posses:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Fica o produtor, a partir da entrega dos animais, propriet&aacute;rio da quantidade em  arroubas, mensuradas na Unidade Confinadora, n&atilde;o dos animais.</li>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Do Per&iacute;odo de Confinamento:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Os prazos de confinamentos dos animais v&atilde;o de 90 a 120 dias.</li>
         <BR /> <ol>
            <li>&ndash;  Excedido este per&iacute;odo dever-se-&aacute; reaver o contrato, alem de outros atributos.</li>
          </ol>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Do Ganho de Peso:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Garante o Confinamento Vanguarda o m&eacute;dio di&aacute;rio de 1,2   kg  (hum quilo e duzentas gramas).</li>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Da Fixa&ccedil;&atilde;o de Valores:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Tem o produtor a mesmo prazo de dias em confinamento, dos animais, para fixar o  valor da arrouba. Ou seja, caso a perman&ecirc;ncia dos animais seja de 100 dias,  este &eacute; o prazo para o produtor fixar o valor da arrouba.</li>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Da Sanidade:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  Cabe aos produtores estarem em dia com calend&aacute;rio sanit&aacute;rio vigente no estado.</li>
        </ol>
      </div>
      <p align="justify" class="style1"><br />
          <strong>Do Volume M&iacute;nimo para Fechamento de Contratos:</strong></p>
      <div align="justify">
        <ol class="style1">
          <li>&ndash;  O volume m&iacute;nimo para fechamento &eacute; de 3.600 @, ou 300 animais de 12 @.</li>
        </ol>
      </div>
      <p align="justify" class="style1"><strong>Por que  Confinar:</strong></p>
      <p align="justify" class="style1">Confinar &eacute;  uma maneira de agregar valor aos animais. Tendo como vantagem o alivio das  pastagens, diminuindo a press&atilde;o de pastejo, principalmente no per&iacute;odo seco do  ano e reduzindo custos com funcion&aacute;rios, arrendamento e outros. Neste caso o  produtor pode estar repondo em suas pastagens animais mais jovem que estar&aacute; abatendo-os  na pr&oacute;xima safra.</p>
      <p align="justify" class="style1"><strong>Confinamento Vanguarda:</strong>  </p>
      <p align="justify" class="style1">A Vanguarda,  com seu sucesso em produ&ccedil;&atilde;o de gr&atilde;os, disp&otilde;e de ume estrutura para confinamento  sediada no munic&iacute;pio de Nova Mutum, MT, a 50 km da cidade. Conta com um corpo  t&eacute;cnico que atua desde o manejo dos animais ate a formula&ccedil;&atilde;o de dietas  balanceadas, usado como ingredientes alimentos analisados e que garantam o  ganho de peso di&aacute;rio alcan&ccedil;ando o per&iacute;odo certo para a melhor comercializa&ccedil;&atilde;o  dos animais.</p>
      <p align="justify" class="style1"><strong>Mercado Futuro:</strong></p>
      <p align="justify" class="style1">&Eacute; um  mecanismo seguro que apresenta garantia antecipada de um pre&ccedil;o que, segundo as  suas estimativas, possa efetivamente recompensar seu investimento e o custeio  de sua produ&ccedil;&atilde;o.</p>
      <p align="justify" class="style1">&nbsp;</p>
    <p align="justify" class="style1"><strong><em>Seja  consciente, invista no Confinamento Vanguarda!</em></strong></p></td>
  </tr>
</table>
</body>
</html>

