<%
Option Explicit
Dim username

username = Request.Cookies("username")
%>

<html>
<head>
<title>Grupo Vanguarda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<font face="arial,helvetica" size=2> 
<%'See if they're actually already logged in
if username <> "" then%>
</font> 
<p align="center"><font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>GRUPO</strong></font> 
  <strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif">VANGUARDA</font></strong></p>
<p align="center">&nbsp;</p>
<p align="center"><img src="../logo.JPG" width="102" height="114"></p>
<p align="center">&nbsp;</p>
<p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RECURSOS 
  HUMANOS</font></p>
  
<p align="center">&nbsp;</p>
<p align="center"><font color="#000000" size="2" face="arial,helvetica"><b>Voc&ecirc; 
  est&aacute; logado.</b></font></p>
<p align="center"><font color="#000000" size="2" face="arial,helvetica">Se voc&ecirc; 
  quer preencher um novo cadastro, precisa <b><a href="sair.asp">sair do sistema</a> 
  </b>primeiro.</font></p>
<font face="arial,helvetica" size=2><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
<%'Otherwise display the sign up form
else%>
</font> </font>
 
<form name="signup" action="signupprocess.asp" method="post">
  <p align="center">&nbsp;</p>
  <p align="center"><font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>GRUPO</strong></font> 
    <strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif">VANGUARDA</font></strong></p>
  <p align="center">&nbsp;</p>
  <p align="center"><img src="../logo.JPG" width="102" height="114"></p>
  <p align="center">&nbsp;</p>
  <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">RECURSOS HUMANOS</font></p>
  <p align="center">&nbsp;</p>
  <p align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><em>Suas 
    informa&ccedil;&otilde;es ser&atilde;o armazenadas em nosso banco de curr&iacute;culos, 
    ficando dispon&iacute;vel para todas as empresas do Grupo Vanguarda. </em></font></p>
  <p align="center">&nbsp;</p>
  <table width="60%" border="0" align="left">
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Tipo 
        de v&iacute;nculo</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="radio" name="vinculo" value="Estagi�rio">
        Estagi&aacute;rio 
        <input type="radio" name="vinculo" value="Funcion�rio">
        Funcion&aacute;rio </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Objetivo 
        </em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&Aacute;rea 
        de Trabalho</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <select name="area">
          <option value="Administrativa" 
                          selected>Administrativa</option>
          <option 
                          value="Financeira">Financeira</option>
          <option 
                          value="Comercial">Comercial</option>
          <option 
                          value="Produ��o">Produ��o</option>
          <option 
                          value="Manuten��o">Manuten��o</option>
          <option 
                          value="Engenheiro Agr�nomo">Engenheiro Agr�nomo</option>
          <option 
                          value="T�cnico Agr�cola">T�cnico Agr�cola</option>
          <option 
                          value="RH">RH</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo 
        Desejado</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cargo" size=30>
        </font></td>
    </tr>
    <tr> 
      <td width="68%">&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Dados 
        Pessoais</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="firstname" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sobrenome:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="surname" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        Nascimento:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="datanascimento" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sexo:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="sex" value="male">
        Masculino 
        <input type="radio" name="sex" value="female">
        Feminino</b></font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado 
        Civil:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="estadocivil" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Natural:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="natural" size="30" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nacionalidade:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="nacional" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cpf" size="28" >
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Dados 
        para contato:</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Endere&ccedil;o:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="endereco" size="36" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&uacute;mero:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="numero" size="12" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Complemento:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="complemento" size="26" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">CEP:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cep" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cidade" size=32>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <select name="estado">
          <option value="--">-- 
          <option value="AC">AC 
          <option value="AL">AL 
          <option value="AM">AM 
          <option value="AP">AP 
          <option value="BA">BA 
          <option value="CE">CE 
          <option value="DF">DF 
          <option value="ES">ES 
          <option value="GO">GO 
          <option value="MA">MA 
          <option value="MG">MG 
          <option value="MS">MS 
          <option value="MT">MT 
          <option value="PA">PA 
          <option value="PB">PB 
          <option value="PE">PE 
          <option value="PI">PI 
          <option value="PR">PR 
          <option value="RJ">RJ 
          <option value="RN">RN 
          <option value="RO">RO 
          <option value="RR">RR 
          <option value="RS">RS 
          <option value="SC">SC 
          <option value="SE">SE 
          <option value="SP">SP 
          <option value="TO">TO</option>
        </select>
        <input type="checkbox" name="outropais" value="Outro Pa�s">
        Outro Pa�s</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Pa&iacute;s:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <select name="pais">
          <option value="Brasil">Brasil</option>
          <option value="Afeganist�o">Afeganist�o</option>
          <option value="�frica do Sul">�frica do Sul</option>
          <option value="Aland - Finl�ndia">Aland - Finl�ndia</option>
          <option value="Alb�nia">Alb�nia</option>
          <option value="Alemanha">Alemanha</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Anguilla - Reino Unido">Anguilla - Reino Unido</option>
          <option value="Ant�rtida">Ant�rtida</option>
          <option value="Ant�gua e Barbuda">Ant�gua e Barbuda</option>
          <option value="Antilhas Holandesa">Antilhas Holandesas</option>
          <option value="Ar�bia Saudita">Ar�bia Saudita</option>
          <option value="Arg�lia">Arg�lia</option>
          <option value="Argentina">Argentina</option>
          <option value="Arm�nia">Arm�nia</option>
          <option value="Aruba - Holanda">Aruba - Holanda</option>
          <option value="Ascens�o - Reino Unido">Ascens�o - Reino Unido</option>
          <option value="Austr�lia">Austr�lia</option>
          <option value="�ustria">�ustria</option>
          <option value="Azerbaij�o">Azerbaij�o</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrein">Bahrein</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="B�lgica">B�lgica</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bermudas - Reino Unido">Bermudas - Reino Unido</option>
          <option value="Bioko - Guin� Equatorial">Bioko - Guin� Equatorial</option>
          <option value="Bol�via">Bol�via</option>
          <option value="B�snia-Herzeg�vina">B�snia-Herzeg�vina</option>
          <option value="Botsuana">Botsuana</option>
          <option value="Brunei">Brunei</option>
          <option value="Bulg�ria">Bulg�ria</option>
          <option value="Burkina Fasso">Burkina Fasso</option>
          <option value="Burundi">Burundi</option>
          <option value="But�o">But�o</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Camar�es">Camar�es</option>
          <option value="Camboja">Camboja</option>
          <option value="Canad�">Canad�</option>
          <option value="Cazaquist�o">Cazaquist�o</option>
          <option value="Ceuta -  ???
?A?�?Espanha">Ceuta - Espanha</option>
          <option value="Chade">Chade</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Chipre">Chipre</option>
          <option value="Cidade do Vaticano">Cidade do Vaticano</option>
          <option value="Cingapura">Cingapura</option>
          <option value="Col�mbia">Col�mbia</option>
          <option value="Congo">Congo</option>
          <option value="Cor�ia do Norte">Cor�ia do Norte</option>
          <option value="Cor�ia do Sul">Cor�ia do Sul</option>
          <option value="C�rsega - Fran�a">C�rsega - Fran�a</option>
          <option value="Costa do Marfim">Costa do Marfim</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Creta - Gr�cia">Creta - Gr�cia</option>
          <option value="Cro�cia">Cro�cia</option>
          <option value="Cuba">Cuba</option>
          <option value="Cura�ao - Holanda">Cura�ao - Holanda</option>
          <option value="Dinamarca">Dinamarca</option>
          <option value="Djibuti">Djibuti</option>
          <option value="Dominica">Dominica</option>
          <option value="Egito">Egito</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Emirado �rabes Unidos">Emirado �rabes Unidos</option>
          <option value="Equador">Equador</option>
          <option value="Eritr�ia">Eritr�ia</option>
          <option value="Eslov�quia">Eslov�quia</option>
          <option value="Eslov�nia">Eslov�nia</option>
          <option value="Espanha">Espanha</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Est�nia">Est�nia</option>
          <option value="Eti�pia">Eti�pia</option>
          <option value="Fiji">Fiji</option>
          <option value="Filipinas">Filipinas</option>
          <option value="Finl�ndia">Finl�ndia</option>
          <option value="Fran�a">Fran�a</option>
          <option value="Gab�o">Gab�o</option>
          <option value="G�mbia">G�mbia</option>
          <option value="Gana">Gana</option>
          <option value="Ge�rgia">Ge�rgia</option>
          <option value="Gibraltar - Reino Unido">Gibraltar - Reino Unido</option>
          <option value="Granada">Granada</option>
          <option value="Gr�cia">Gr�cia</option>
          <option value="Groenl�ndia - Dinamarca">Groenl�ndia - Dinamarca</option>
          <option value="Guadalupe - Fran�a">Guadalupe - Fran�a</option>
          <option val ???
?a?�?ue="Guam - Estados Unidos">Guam - Estados Unidos</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guiana">Guiana</option>
          <option value="Guiana Francesa">Guiana Francesa</option>
          <option value="Guin�">Guin�</option>
          <option value="Guin� Equatorial">Guin� Equatorial</option>
          <option value="Guin�-Bissau">Guin�-Bissau</option>
          <option value="Haiti">Haiti</option>
          <option value="Holanda">Holanda</option>
          <option value="Honduras">Honduras</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungria">Hungria</option>
          <option value="I�men">I�men</option>
          <option value="IIhas Virgens - Estados Unidos">IIhas Virgens - Estados 
          Unidos</option>
          <option value="Ilha de Man - Reino Unido">Ilha de Man - Reino Unido</option>
          <option value="Ilha Natal - Austr�lia">Ilha Natal - Austr�lia</option>
          <option value="Ilha Norfolk - Austr�lia">Ilha Norfolk - Austr�lia</option>
          <option value="Ilha Pitcairn - Reino Unido">Ilha Pitcairn - Reino Unido</option>
          <option value="Ilha Wrangel - R�ssia">Ilha Wrangel - R�ssia</option>
          <option value="Ilhas Aleutas - Estados Unidos">Ilhas Aleutas - Estados 
          Unidos</option>
          <option value="Ilhas Can�rias - Espanha">Ilhas Can�rias - Espanha</option>
          <option value="Ilhas Cayman - Reino Unido">Ilhas Cayman - Reino Unido</option>
          <option value="Ilhas Comores">Ilhas Comores</option>
          <option value="Ilhas Cook - Nova Zel�ndia">Ilhas Cook - Nova Zel�ndia</option>
          <option value="Ilhas do Canal - Reino Unido">Ilhas do Canal - Reino 
          Unido</option>
          <option value="Ilhas Salom�o">Ilhas Salom�o</option>
          <option value="Ilhas Seychelles">Ilhas Seychelles</option>
          <option value="Ilhas Tokelau - Nova Zel�ndia">Ilhas Tokelau - Nova Zel�ndia</option>
          <option value="Ilhas Turks e Caicos - Reino Unido">Ilhas Turks e Caicos 
          - Reino Unido</option>
          <option value="Ilhas Virgens - Reino Unido">Ilhas Virgens - Reino Unido</option>
          <option value="Ilhas Wallis e Futuna - Fran�a">Ilhas Wallis e Futuna 
          - Fran�a</option>
          <option value="Ilhsa Cocos - Austr�lia">Ilhsa Cocos - Austr�lia</option>
          <option value="�ndia">�ndia</option>< ???
?A?�?option value="Indon�sia">Indon�sia
             
          <option value="Ir�">Ir�</option>
          <option value="Iraque">Iraque</option>
          <option value="Irlanda">Irlanda</option>
          <option value="Isl�ndia">Isl�ndia</option>
          <option value="Israel">Israel</option>
          <option value="It�lia">It�lia</option>
          <option value="Iugosl�via">Iugosl�via</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Jan Mayen - Noruega">Jan Mayen - Noruega</option>
          <option value="Jap�o">Jap�o</option>
          <option value="Jord�nia">Jord�nia</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Kuait">Kuait</option>
          <option value="Laos">Laos</option>
          <option value="Lesoto">Lesoto</option>
          <option value="Let�nia">Let�nia</option>
          <option value="L�bano">L�bano</option>
          <option value="Lib�ria">Lib�ria</option>
          <option value="L�bia">L�bia</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Litu�nia">Litu�nia</option>
          <option value="Luxemburgo">Luxemburgo</option>
          <option value="Macau - Portugal">Macau - Portugal</option>
          <option value="Maced�nia">Maced�nia</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Madeira - Portugal">Madeira - Portugal</option>
          <option value="Mal�sia">Mal�sia</option>
          <option value="Malaui">Malaui</option>
          <option value="Maldivas">Maldivas</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marrocos">Marrocos</option>
          <option value="Martinica - Fran�a">Martinica - Fran�a</option>
          <option value="Maur�cio - Reino Unido">Maur�cio - Reino Unido</option>
          <option value="Maurit�nia">Maurit�nia</option>
          <option value="M�xico">M�xico</option>
          <option value="Micron�sia">Micron�sia</option>
          <option value="Mo�ambique">Mo�ambique</option>
          <option value="Moldova">Moldova</option>
          <option value="M�naco">M�naco</option>
          <option value="Mong�lia">Mong�lia</option>
          <option value="MontSerrat - Reino Unido">MontSerrat - Reino Unido</option>
          <option value="Myanma">Myanma</option>
          <option value="Nam�bia">Nam�bia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option v ???
?a?�?alue="Nicar�gua">Nicar�gua</option>
          <option value="N�ger">N�ger</option>
          <option value="Nig�ria">Nig�ria</option>
          <option value="Niue">Niue</option>
          <option value="Noruega">Noruega</option>
          <option value="Nova Bretanha - Papua-Nova Guin�">Nova Bretanha - Papua-Nova 
          Guin�</option>
          <option value="Nova Caled�nia - Fran�a">Nova Caled�nia - Fran�a</option>
          <option value="Nova Zel�ndia">Nova Zel�ndia</option>
          <option value="Om�">Om�</option>
          <option value="Palau - Estados Unidos">Palau - Estados Unidos</option>
          <option value="Palestina">Palestina</option>
          <option value="Panam�">Panam�</option>
          <option value="Papua-Nova Guin�">Papua-Nova Guin�</option>
          <option value="Paquist�o">Paquist�o</option>
          <option value="Paraguai">Paraguai</option>
          <option value="Peru">Peru</option>
          <option value="Polin�sia Francesa">Polin�sia Francesa</option>
          <option value="Pol�nia">Pol�nia</option>
          <option value="Porto Rico">Porto Rico</option>
          <option value="Portugal">Portugal</option>
          <option value="Qatar">Qatar</option>
          <option value="Qu�nia">Qu�nia</option>
          <option value="Quirguist�o">Quirguist�o</option>
          <option value="Reino Unido">Reino Unido</option>
          <option value="Rep�blica Centro-Africana">Rep�blica Centro-Africana</option>
          <option value="Rep�blica Dominicana">Rep�blica Dominicana</option>
          <option value="Rep�blica Tcheca">Rep�blica Tcheca</option>
          <option value="Rom�nia">Rom�nia</option>
          <option value="Ruanda">Ruanda</option>
          <option value="R�ssia">R�ssia</option>
          <option value="Samoa Ocidental">Samoa Ocidental</option>
          <option value="San Marino">San Marino</option>
          <option value="Santa Helena - Reino Unido">Santa Helena - Reino Unido</option>
          <option value="Santa L�cia">Santa L�cia</option>
          <option value="S�o Cristov�o e N�vis">S�o Cristov�o e N�vis</option>
          <option value="S�o Tom� e Pr�ncipe">S�o Tom� e Pr�ncipe</option>
          <option value="S�o Vicente e Granadinas">S�o Vicente e Granadinas</option>
          <option value="Sardenha - It�lia">Sardenha - It�lia</option>
          <option value="Senegal">Senegal</option>
          <option value="Serra Leoa">Serra Leoa</option>
          <option value="S�ria">S�ria</ ??? ?A?�?option> 
          <option value="Som�lia">Som�lia</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Suazil�ndia">Suazil�ndia</option>
          <option value="Sud�o">Sud�o</option>
          <option value="Su�cia">Su�cia</option>
          <option value="Su��a">Su��a</option>
          <option value="Suriname">Suriname</option>
          <option value="Tadjiquist�o">Tadjiquist�o</option>
          <option value="Tail�ndia">Tail�ndia</option>
          <option value="Taiti">Taiti</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Tanz�nia">Tanz�nia</option>
          <option value="Terra de Francisco Jos� - R�ssia">Terra de Francisco 
          Jos� - R�ssia</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad e Tobago">Trinidad e Tobago</option>
          <option value="Trist�o da Cunha - Reino Unido">Trist�o da Cunha - Reino 
          Unido</option>
          <option value="Tun�sia">Tun�sia</option>
          <option value="Turcomenist�o">Turcomenist�o</option>
          <option value="Turquia">Turquia</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Ucr�nia">Ucr�nia</option>
          <option value="Uganda">Uganda</option>
          <option value="Uruguai">Uruguai</option>
          <option value="Uzbequist�o">Uzbequist�o</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietn�">Vietn�</option>
          <option value="Zaire">Zaire</option>
          <option value="Z�mbia">Z�mbia</option>
          <option value="Zimb�bue">Zimb�bue</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="email" size=32>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Telefone:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="telefone" size=24>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Celular:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="celular" size=24>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Forma&ccedil;&atilde;o 
        Acad&ecirc;mica</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&iacute;vel: 
        <select name="nivel">
          <option value="Ensino M�dio" 
                                selected>Ensino m�dio</option>
          <option 
                                value="Superior">Superior</option>
          <option value="P�s Gradua��o">P�s Gradua��o</option>
          <option 
                                value="Mestrado">Mestrado</option>
          <option 
                                value="Doutorado">Doutorado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Status: 
        <select name="status_">
          <option 
                                value="Conclu�do" selected>Concluido</option>
          <option 
                                value="Trancado">Trancado</option>
          <option 
                                value="Suspenso">Suspenso</option>
          <option value="Em andamento">Em andamento</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Institui&ccedil;&atilde;o: 
        <input type="text" name="inst" size=34>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&iacute;vel: 
        <select name="nivel2">
          <option value="Ensino M�dio" 
                                selected>Ensino m�dio</option>
          <option 
                                value="Superior">Superior</option>
          <option value="P�s Gradua��o">P�s Gradua��o</option>
          <option 
                                value="Mestrado">Mestrado</option>
          <option 
                                value="Doutorado">Doutorado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Status: 
        <select name="status2">
          <option 
                                value="Conclu�do" selected>Concluido</option>
          <option 
                                value="Trancado">Trancado</option>
          <option 
                                value="Suspenso">Suspenso</option>
          <option value="Em andamento">Em andamento</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Institui&ccedil;&atilde;o: 
        <input type="text" name="inst2" size=34>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&iacute;vel: 
        <select name="nivel3">
          <option value="Ensino M�dio" 
                                selected>Ensino m�dio</option>
          <option 
                                value="Superior">Superior</option>
          <option value="P�s Gradua��o">P�s Gradua��o</option>
          <option 
                                value="Mestrado">Mestrado</option>
          <option 
                                value="Doutorado">Doutorado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Status: 
        <select name="status3">
          <option 
                                value="Conclu�do" selected>Concluido</option>
          <option 
                                value="Trancado">Trancado</option>
          <option 
                                value="Suspenso">Suspenso</option>
          <option value="Em andamento">Em andamento</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Institui&ccedil;&atilde;o: 
        <input type="text" name="inst3" size=34>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Cursos 
        Realizados</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do curso: 
        <input type="text" name="nomecurso" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso" size=16>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do curso: 
        <input type="text" name="nomecurso2" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso2" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso2" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso2" size=16>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do curso: 
        <input type="text" name="nomecurso3" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso3" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso3" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso3" size=16>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>&Iacute;diomas</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="ingles" value="Ingl�s">
        </b>Ingl&ecirc;s - 
        <select name="inglesc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="espanhol" value="Espanhol">
        </b>Espanhol - 
        <select name="espanholc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="italiano" value="Italiano">
        </b>Italiano - 
        <select name="italianoc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="alemao" value="Alem�o">
        </b>Alem&atilde;o - 
        <select name="alemaoc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Outro 
        &Iacute;dioma: 
        <input type="text" name="outroidioma" size=16>
        - 
        <select name="outroidiomac">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Conhecimentos 
        em Inform&aacute;tica</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="editort" value="Editor de Texto">
        </b>Editor de Texto - 
        <select name="editortc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="planilha" value="Planilhas Eletr�nicas">
        </b> Planilhas Eletr&ocirc;nicas - 
        <select name="planilhac">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="programas" value="Programas de Apresenta��o">
        </b>Programas de Apresenta&ccedil;&atilde;o - 
        <select name="programasc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="conhecimento" value="Conhecimento em Internet">
        </b>Conhecimento em Internet - 
        <select name="conhecimentoc">
          <option value="B�sico" 
                                selected>b�sico</option>
          <option 
                                value="Intermedi�rio">intermedi�rio</option>
          <option 
                                value="Avan�ado">avan�ado</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><p><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Outros 
          conhecimerntos na &aacute;rea:</font></p>
        <p><font color="#000000"><b><font color="#000000"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
          <textarea name="infoutros" cols="50" rows="10"></textarea>
          </font></b></font></b></font></p>
        <p><font color="#000000"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
          </font></b></font></p></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Experi&ecirc;ncia 
        Profissional</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        da Empresa: 
        <input type="text" name="nomeempresa" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp">
          <option value="--">-- 
          <option value="AC">AC 
          <option value="AL">AL 
          <option value="AM">AM 
          <option value="AP">AP 
          <option value="BA">BA 
          <option value="CE">CE 
          <option value="DF">DF 
          <option value="ES">ES 
          <option value="GO">GO 
          <option value="MA">MA 
          <option value="MG">MG 
          <option value="MS">MS 
          <option value="MT">MT 
          <option value="PA">PA 
          <option value="PB">PB 
          <option value="PE">PE 
          <option value="PI">PI 
          <option value="PR">PR 
          <option value="RJ">RJ 
          <option value="RN">RN 
          <option value="RO">RO 
          <option value="RR">RR 
          <option value="RS">RS 
          <option value="SC">SC 
          <option value="SE">SE 
          <option value="SP">SP 
          <option value="TO">TO</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Pa&iacute;s: 
        <select name="paisemp">
          <option value="Brasil">Brasil</option>
          <option value="Afeganist�o">Afeganist�o</option>
          <option value="�frica do Sul">�frica do Sul</option>
          <option value="Aland - Finl�ndia">Aland - Finl�ndia</option>
          <option value="Alb�nia">Alb�nia</option>
          <option value="Alemanha">Alemanha</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Anguilla - Reino Unido">Anguilla - Reino Unido</option>
          <option value="Ant�rtida">Ant�rtida</option>
          <option value="Ant�gua e Barbuda">Ant�gua e Barbuda</option>
          <option value="Antilhas Holandesa">Antilhas Holandesas</option>
          <option value="Ar�bia Saudita">Ar�bia Saudita</option>
          <option value="Arg�lia">Arg�lia</option>
          <option value="Argentina">Argentina</option>
          <option value="Arm�nia">Arm�nia</option>
          <option value="Aruba - Holanda">Aruba - Holanda</option>
          <option value="Ascens�o - Reino Unido">Ascens�o - Reino Unido</option>
          <option value="Austr�lia">Austr�lia</option>
          <option value="�ustria">�ustria</option>
          <option value="Azerbaij�o">Azerbaij�o</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrein">Bahrein</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="B�lgica">B�lgica</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bermudas - Reino Unido">Bermudas - Reino Unido</option>
          <option value="Bioko - Guin� Equatorial">Bioko - Guin� Equatorial</option>
          <option value="Bol�via">Bol�via</option>
          <option value="B�snia-Herzeg�vina">B�snia-Herzeg�vina</option>
          <option value="Botsuana">Botsuana</option>
          <option value="Brunei">Brunei</option>
          <option value="Bulg�ria">Bulg�ria</option>
          <option value="Burkina Fasso">Burkina Fasso</option>
          <option value="Burundi">Burundi</option>
          <option value="But�o">But�o</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Camar�es">Camar�es</option>
          <option value="Camboja">Camboja</option>
          <option value="Canad�">Canad�</option>
          <option value="Cazaquist�o">Cazaquist�o</option>
          <option value="Ceuta -  ???
?A?�?Espanha">Ceuta - Espanha</option>
          <option value="Chade">Chade</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Chipre">Chipre</option>
          <option value="Cidade do Vaticano">Cidade do Vaticano</option>
          <option value="Cingapura">Cingapura</option>
          <option value="Col�mbia">Col�mbia</option>
          <option value="Congo">Congo</option>
          <option value="Cor�ia do Norte">Cor�ia do Norte</option>
          <option value="Cor�ia do Sul">Cor�ia do Sul</option>
          <option value="C�rsega - Fran�a">C�rsega - Fran�a</option>
          <option value="Costa do Marfim">Costa do Marfim</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Creta - Gr�cia">Creta - Gr�cia</option>
          <option value="Cro�cia">Cro�cia</option>
          <option value="Cuba">Cuba</option>
          <option value="Cura�ao - Holanda">Cura�ao - Holanda</option>
          <option value="Dinamarca">Dinamarca</option>
          <option value="Djibuti">Djibuti</option>
          <option value="Dominica">Dominica</option>
          <option value="Egito">Egito</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Emirado �rabes Unidos">Emirado �rabes Unidos</option>
          <option value="Equador">Equador</option>
          <option value="Eritr�ia">Eritr�ia</option>
          <option value="Eslov�quia">Eslov�quia</option>
          <option value="Eslov�nia">Eslov�nia</option>
          <option value="Espanha">Espanha</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Est�nia">Est�nia</option>
          <option value="Eti�pia">Eti�pia</option>
          <option value="Fiji">Fiji</option>
          <option value="Filipinas">Filipinas</option>
          <option value="Finl�ndia">Finl�ndia</option>
          <option value="Fran�a">Fran�a</option>
          <option value="Gab�o">Gab�o</option>
          <option value="G�mbia">G�mbia</option>
          <option value="Gana">Gana</option>
          <option value="Ge�rgia">Ge�rgia</option>
          <option value="Gibraltar - Reino Unido">Gibraltar - Reino Unido</option>
          <option value="Granada">Granada</option>
          <option value="Gr�cia">Gr�cia</option>
          <option value="Groenl�ndia - Dinamarca">Groenl�ndia - Dinamarca</option>
          <option value="Guadalupe - Fran�a">Guadalupe - Fran�a</option>
          <option val ???
?a?�?ue="Guam - Estados Unidos">Guam - Estados Unidos</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guiana">Guiana</option>
          <option value="Guiana Francesa">Guiana Francesa</option>
          <option value="Guin�">Guin�</option>
          <option value="Guin� Equatorial">Guin� Equatorial</option>
          <option value="Guin�-Bissau">Guin�-Bissau</option>
          <option value="Haiti">Haiti</option>
          <option value="Holanda">Holanda</option>
          <option value="Honduras">Honduras</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungria">Hungria</option>
          <option value="I�men">I�men</option>
          <option value="IIhas Virgens - Estados Unidos">IIhas Virgens - Estados 
          Unidos</option>
          <option value="Ilha de Man - Reino Unido">Ilha de Man - Reino Unido</option>
          <option value="Ilha Natal - Austr�lia">Ilha Natal - Austr�lia</option>
          <option value="Ilha Norfolk - Austr�lia">Ilha Norfolk - Austr�lia</option>
          <option value="Ilha Pitcairn - Reino Unido">Ilha Pitcairn - Reino Unido</option>
          <option value="Ilha Wrangel - R�ssia">Ilha Wrangel - R�ssia</option>
          <option value="Ilhas Aleutas - Estados Unidos">Ilhas Aleutas - Estados 
          Unidos</option>
          <option value="Ilhas Can�rias - Espanha">Ilhas Can�rias - Espanha</option>
          <option value="Ilhas Cayman - Reino Unido">Ilhas Cayman - Reino Unido</option>
          <option value="Ilhas Comores">Ilhas Comores</option>
          <option value="Ilhas Cook - Nova Zel�ndia">Ilhas Cook - Nova Zel�ndia</option>
          <option value="Ilhas do Canal - Reino Unido">Ilhas do Canal - Reino 
          Unido</option>
          <option value="Ilhas Salom�o">Ilhas Salom�o</option>
          <option value="Ilhas Seychelles">Ilhas Seychelles</option>
          <option value="Ilhas Tokelau - Nova Zel�ndia">Ilhas Tokelau - Nova Zel�ndia</option>
          <option value="Ilhas Turks e Caicos - Reino Unido">Ilhas Turks e Caicos 
          - Reino Unido</option>
          <option value="Ilhas Virgens - Reino Unido">Ilhas Virgens - Reino Unido</option>
          <option value="Ilhas Wallis e Futuna - Fran�a">Ilhas Wallis e Futuna 
          - Fran�a</option>
          <option value="Ilhsa Cocos - Austr�lia">Ilhsa Cocos - Austr�lia</option>
          <option value="�ndia">�ndia</option>< ???
?A?�?option value="Indon�sia">Indon�sia
             
          <option value="Ir�">Ir�</option>
          <option value="Iraque">Iraque</option>
          <option value="Irlanda">Irlanda</option>
          <option value="Isl�ndia">Isl�ndia</option>
          <option value="Israel">Israel</option>
          <option value="It�lia">It�lia</option>
          <option value="Iugosl�via">Iugosl�via</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Jan Mayen - Noruega">Jan Mayen - Noruega</option>
          <option value="Jap�o">Jap�o</option>
          <option value="Jord�nia">Jord�nia</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Kuait">Kuait</option>
          <option value="Laos">Laos</option>
          <option value="Lesoto">Lesoto</option>
          <option value="Let�nia">Let�nia</option>
          <option value="L�bano">L�bano</option>
          <option value="Lib�ria">Lib�ria</option>
          <option value="L�bia">L�bia</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Litu�nia">Litu�nia</option>
          <option value="Luxemburgo">Luxemburgo</option>
          <option value="Macau - Portugal">Macau - Portugal</option>
          <option value="Maced�nia">Maced�nia</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Madeira - Portugal">Madeira - Portugal</option>
          <option value="Mal�sia">Mal�sia</option>
          <option value="Malaui">Malaui</option>
          <option value="Maldivas">Maldivas</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marrocos">Marrocos</option>
          <option value="Martinica - Fran�a">Martinica - Fran�a</option>
          <option value="Maur�cio - Reino Unido">Maur�cio - Reino Unido</option>
          <option value="Maurit�nia">Maurit�nia</option>
          <option value="M�xico">M�xico</option>
          <option value="Micron�sia">Micron�sia</option>
          <option value="Mo�ambique">Mo�ambique</option>
          <option value="Moldova">Moldova</option>
          <option value="M�naco">M�naco</option>
          <option value="Mong�lia">Mong�lia</option>
          <option value="MontSerrat - Reino Unido">MontSerrat - Reino Unido</option>
          <option value="Myanma">Myanma</option>
          <option value="Nam�bia">Nam�bia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option v ???
?a?�?alue="Nicar�gua">Nicar�gua</option>
          <option value="N�ger">N�ger</option>
          <option value="Nig�ria">Nig�ria</option>
          <option value="Niue">Niue</option>
          <option value="Noruega">Noruega</option>
          <option value="Nova Bretanha - Papua-Nova Guin�">Nova Bretanha - Papua-Nova 
          Guin�</option>
          <option value="Nova Caled�nia - Fran�a">Nova Caled�nia - Fran�a</option>
          <option value="Nova Zel�ndia">Nova Zel�ndia</option>
          <option value="Om�">Om�</option>
          <option value="Palau - Estados Unidos">Palau - Estados Unidos</option>
          <option value="Palestina">Palestina</option>
          <option value="Panam�">Panam�</option>
          <option value="Papua-Nova Guin�">Papua-Nova Guin�</option>
          <option value="Paquist�o">Paquist�o</option>
          <option value="Paraguai">Paraguai</option>
          <option value="Peru">Peru</option>
          <option value="Polin�sia Francesa">Polin�sia Francesa</option>
          <option value="Pol�nia">Pol�nia</option>
          <option value="Porto Rico">Porto Rico</option>
          <option value="Portugal">Portugal</option>
          <option value="Qatar">Qatar</option>
          <option value="Qu�nia">Qu�nia</option>
          <option value="Quirguist�o">Quirguist�o</option>
          <option value="Reino Unido">Reino Unido</option>
          <option value="Rep�blica Centro-Africana">Rep�blica Centro-Africana</option>
          <option value="Rep�blica Dominicana">Rep�blica Dominicana</option>
          <option value="Rep�blica Tcheca">Rep�blica Tcheca</option>
          <option value="Rom�nia">Rom�nia</option>
          <option value="Ruanda">Ruanda</option>
          <option value="R�ssia">R�ssia</option>
          <option value="Samoa Ocidental">Samoa Ocidental</option>
          <option value="San Marino">San Marino</option>
          <option value="Santa Helena - Reino Unido">Santa Helena - Reino Unido</option>
          <option value="Santa L�cia">Santa L�cia</option>
          <option value="S�o Cristov�o e N�vis">S�o Cristov�o e N�vis</option>
          <option value="S�o Tom� e Pr�ncipe">S�o Tom� e Pr�ncipe</option>
          <option value="S�o Vicente e Granadinas">S�o Vicente e Granadinas</option>
          <option value="Sardenha - It�lia">Sardenha - It�lia</option>
          <option value="Senegal">Senegal</option>
          <option value="Serra Leoa">Serra Leoa</option>
          <option value="S�ria">S�ria</ ??? ?A?�?option> 
          <option value="Som�lia">Som�lia</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Suazil�ndia">Suazil�ndia</option>
          <option value="Sud�o">Sud�o</option>
          <option value="Su�cia">Su�cia</option>
          <option value="Su��a">Su��a</option>
          <option value="Suriname">Suriname</option>
          <option value="Tadjiquist�o">Tadjiquist�o</option>
          <option value="Tail�ndia">Tail�ndia</option>
          <option value="Taiti">Taiti</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Tanz�nia">Tanz�nia</option>
          <option value="Terra de Francisco Jos� - R�ssia">Terra de Francisco 
          Jos� - R�ssia</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad e Tobago">Trinidad e Tobago</option>
          <option value="Trist�o da Cunha - Reino Unido">Trist�o da Cunha - Reino 
          Unido</option>
          <option value="Tun�sia">Tun�sia</option>
          <option value="Turcomenist�o">Turcomenist�o</option>
          <option value="Turquia">Turquia</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Ucr�nia">Ucr�nia</option>
          <option value="Uganda">Uganda</option>
          <option value="Uruguai">Uruguai</option>
          <option value="Uzbequist�o">Uzbequist�o</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietn�">Vietn�</option>
          <option value="Zaire">Zaire</option>
          <option value="Z�mbia">Z�mbia</option>
          <option value="Zimb�bue">Zimb�bue</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        da Empresa: 
        <input type="text" name="nomeempresa2" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa2" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp2" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp2">
          <option value="--">-- 
          <option value="AC">AC 
          <option value="AL">AL 
          <option value="AM">AM 
          <option value="AP">AP 
          <option value="BA">BA 
          <option value="CE">CE 
          <option value="DF">DF 
          <option value="ES">ES 
          <option value="GO">GO 
          <option value="MA">MA 
          <option value="MG">MG 
          <option value="MS">MS 
          <option value="MT">MT 
          <option value="PA">PA 
          <option value="PB">PB 
          <option value="PE">PE 
          <option value="PI">PI 
          <option value="PR">PR 
          <option value="RJ">RJ 
          <option value="RN">RN 
          <option value="RO">RO 
          <option value="RR">RR 
          <option value="RS">RS 
          <option value="SC">SC 
          <option value="SE">SE 
          <option value="SP">SP 
          <option value="TO">TO</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Pa&iacute;s: 
        <select name="paisemp2">
          <option value="Brasil">Brasil</option>
          <option value="Afeganist�o">Afeganist�o</option>
          <option value="�frica do Sul">�frica do Sul</option>
          <option value="Aland - Finl�ndia">Aland - Finl�ndia</option>
          <option value="Alb�nia">Alb�nia</option>
          <option value="Alemanha">Alemanha</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Anguilla - Reino Unido">Anguilla - Reino Unido</option>
          <option value="Ant�rtida">Ant�rtida</option>
          <option value="Ant�gua e Barbuda">Ant�gua e Barbuda</option>
          <option value="Antilhas Holandesa">Antilhas Holandesas</option>
          <option value="Ar�bia Saudita">Ar�bia Saudita</option>
          <option value="Arg�lia">Arg�lia</option>
          <option value="Argentina">Argentina</option>
          <option value="Arm�nia">Arm�nia</option>
          <option value="Aruba - Holanda">Aruba - Holanda</option>
          <option value="Ascens�o - Reino Unido">Ascens�o - Reino Unido</option>
          <option value="Austr�lia">Austr�lia</option>
          <option value="�ustria">�ustria</option>
          <option value="Azerbaij�o">Azerbaij�o</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrein">Bahrein</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="B�lgica">B�lgica</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bermudas - Reino Unido">Bermudas - Reino Unido</option>
          <option value="Bioko - Guin� Equatorial">Bioko - Guin� Equatorial</option>
          <option value="Bol�via">Bol�via</option>
          <option value="B�snia-Herzeg�vina">B�snia-Herzeg�vina</option>
          <option value="Botsuana">Botsuana</option>
          <option value="Brunei">Brunei</option>
          <option value="Bulg�ria">Bulg�ria</option>
          <option value="Burkina Fasso">Burkina Fasso</option>
          <option value="Burundi">Burundi</option>
          <option value="But�o">But�o</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Camar�es">Camar�es</option>
          <option value="Camboja">Camboja</option>
          <option value="Canad�">Canad�</option>
          <option value="Cazaquist�o">Cazaquist�o</option>
          <option value="Ceuta -  ???
?A?�?Espanha">Ceuta - Espanha</option>
          <option value="Chade">Chade</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Chipre">Chipre</option>
          <option value="Cidade do Vaticano">Cidade do Vaticano</option>
          <option value="Cingapura">Cingapura</option>
          <option value="Col�mbia">Col�mbia</option>
          <option value="Congo">Congo</option>
          <option value="Cor�ia do Norte">Cor�ia do Norte</option>
          <option value="Cor�ia do Sul">Cor�ia do Sul</option>
          <option value="C�rsega - Fran�a">C�rsega - Fran�a</option>
          <option value="Costa do Marfim">Costa do Marfim</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Creta - Gr�cia">Creta - Gr�cia</option>
          <option value="Cro�cia">Cro�cia</option>
          <option value="Cuba">Cuba</option>
          <option value="Cura�ao - Holanda">Cura�ao - Holanda</option>
          <option value="Dinamarca">Dinamarca</option>
          <option value="Djibuti">Djibuti</option>
          <option value="Dominica">Dominica</option>
          <option value="Egito">Egito</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Emirado �rabes Unidos">Emirado �rabes Unidos</option>
          <option value="Equador">Equador</option>
          <option value="Eritr�ia">Eritr�ia</option>
          <option value="Eslov�quia">Eslov�quia</option>
          <option value="Eslov�nia">Eslov�nia</option>
          <option value="Espanha">Espanha</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Est�nia">Est�nia</option>
          <option value="Eti�pia">Eti�pia</option>
          <option value="Fiji">Fiji</option>
          <option value="Filipinas">Filipinas</option>
          <option value="Finl�ndia">Finl�ndia</option>
          <option value="Fran�a">Fran�a</option>
          <option value="Gab�o">Gab�o</option>
          <option value="G�mbia">G�mbia</option>
          <option value="Gana">Gana</option>
          <option value="Ge�rgia">Ge�rgia</option>
          <option value="Gibraltar - Reino Unido">Gibraltar - Reino Unido</option>
          <option value="Granada">Granada</option>
          <option value="Gr�cia">Gr�cia</option>
          <option value="Groenl�ndia - Dinamarca">Groenl�ndia - Dinamarca</option>
          <option value="Guadalupe - Fran�a">Guadalupe - Fran�a</option>
          <option val ???
?a?�?ue="Guam - Estados Unidos">Guam - Estados Unidos</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guiana">Guiana</option>
          <option value="Guiana Francesa">Guiana Francesa</option>
          <option value="Guin�">Guin�</option>
          <option value="Guin� Equatorial">Guin� Equatorial</option>
          <option value="Guin�-Bissau">Guin�-Bissau</option>
          <option value="Haiti">Haiti</option>
          <option value="Holanda">Holanda</option>
          <option value="Honduras">Honduras</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungria">Hungria</option>
          <option value="I�men">I�men</option>
          <option value="IIhas Virgens - Estados Unidos">IIhas Virgens - Estados 
          Unidos</option>
          <option value="Ilha de Man - Reino Unido">Ilha de Man - Reino Unido</option>
          <option value="Ilha Natal - Austr�lia">Ilha Natal - Austr�lia</option>
          <option value="Ilha Norfolk - Austr�lia">Ilha Norfolk - Austr�lia</option>
          <option value="Ilha Pitcairn - Reino Unido">Ilha Pitcairn - Reino Unido</option>
          <option value="Ilha Wrangel - R�ssia">Ilha Wrangel - R�ssia</option>
          <option value="Ilhas Aleutas - Estados Unidos">Ilhas Aleutas - Estados 
          Unidos</option>
          <option value="Ilhas Can�rias - Espanha">Ilhas Can�rias - Espanha</option>
          <option value="Ilhas Cayman - Reino Unido">Ilhas Cayman - Reino Unido</option>
          <option value="Ilhas Comores">Ilhas Comores</option>
          <option value="Ilhas Cook - Nova Zel�ndia">Ilhas Cook - Nova Zel�ndia</option>
          <option value="Ilhas do Canal - Reino Unido">Ilhas do Canal - Reino 
          Unido</option>
          <option value="Ilhas Salom�o">Ilhas Salom�o</option>
          <option value="Ilhas Seychelles">Ilhas Seychelles</option>
          <option value="Ilhas Tokelau - Nova Zel�ndia">Ilhas Tokelau - Nova Zel�ndia</option>
          <option value="Ilhas Turks e Caicos - Reino Unido">Ilhas Turks e Caicos 
          - Reino Unido</option>
          <option value="Ilhas Virgens - Reino Unido">Ilhas Virgens - Reino Unido</option>
          <option value="Ilhas Wallis e Futuna - Fran�a">Ilhas Wallis e Futuna 
          - Fran�a</option>
          <option value="Ilhsa Cocos - Austr�lia">Ilhsa Cocos - Austr�lia</option>
          <option value="�ndia">�ndia</option>< ???
?A?�?option value="Indon�sia">Indon�sia
             
          <option value="Ir�">Ir�</option>
          <option value="Iraque">Iraque</option>
          <option value="Irlanda">Irlanda</option>
          <option value="Isl�ndia">Isl�ndia</option>
          <option value="Israel">Israel</option>
          <option value="It�lia">It�lia</option>
          <option value="Iugosl�via">Iugosl�via</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Jan Mayen - Noruega">Jan Mayen - Noruega</option>
          <option value="Jap�o">Jap�o</option>
          <option value="Jord�nia">Jord�nia</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Kuait">Kuait</option>
          <option value="Laos">Laos</option>
          <option value="Lesoto">Lesoto</option>
          <option value="Let�nia">Let�nia</option>
          <option value="L�bano">L�bano</option>
          <option value="Lib�ria">Lib�ria</option>
          <option value="L�bia">L�bia</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Litu�nia">Litu�nia</option>
          <option value="Luxemburgo">Luxemburgo</option>
          <option value="Macau - Portugal">Macau - Portugal</option>
          <option value="Maced�nia">Maced�nia</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Madeira - Portugal">Madeira - Portugal</option>
          <option value="Mal�sia">Mal�sia</option>
          <option value="Malaui">Malaui</option>
          <option value="Maldivas">Maldivas</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marrocos">Marrocos</option>
          <option value="Martinica - Fran�a">Martinica - Fran�a</option>
          <option value="Maur�cio - Reino Unido">Maur�cio - Reino Unido</option>
          <option value="Maurit�nia">Maurit�nia</option>
          <option value="M�xico">M�xico</option>
          <option value="Micron�sia">Micron�sia</option>
          <option value="Mo�ambique">Mo�ambique</option>
          <option value="Moldova">Moldova</option>
          <option value="M�naco">M�naco</option>
          <option value="Mong�lia">Mong�lia</option>
          <option value="MontSerrat - Reino Unido">MontSerrat - Reino Unido</option>
          <option value="Myanma">Myanma</option>
          <option value="Nam�bia">Nam�bia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option v ???
?a?�?alue="Nicar�gua">Nicar�gua</option>
          <option value="N�ger">N�ger</option>
          <option value="Nig�ria">Nig�ria</option>
          <option value="Niue">Niue</option>
          <option value="Noruega">Noruega</option>
          <option value="Nova Bretanha - Papua-Nova Guin�">Nova Bretanha - Papua-Nova 
          Guin�</option>
          <option value="Nova Caled�nia - Fran�a">Nova Caled�nia - Fran�a</option>
          <option value="Nova Zel�ndia">Nova Zel�ndia</option>
          <option value="Om�">Om�</option>
          <option value="Palau - Estados Unidos">Palau - Estados Unidos</option>
          <option value="Palestina">Palestina</option>
          <option value="Panam�">Panam�</option>
          <option value="Papua-Nova Guin�">Papua-Nova Guin�</option>
          <option value="Paquist�o">Paquist�o</option>
          <option value="Paraguai">Paraguai</option>
          <option value="Peru">Peru</option>
          <option value="Polin�sia Francesa">Polin�sia Francesa</option>
          <option value="Pol�nia">Pol�nia</option>
          <option value="Porto Rico">Porto Rico</option>
          <option value="Portugal">Portugal</option>
          <option value="Qatar">Qatar</option>
          <option value="Qu�nia">Qu�nia</option>
          <option value="Quirguist�o">Quirguist�o</option>
          <option value="Reino Unido">Reino Unido</option>
          <option value="Rep�blica Centro-Africana">Rep�blica Centro-Africana</option>
          <option value="Rep�blica Dominicana">Rep�blica Dominicana</option>
          <option value="Rep�blica Tcheca">Rep�blica Tcheca</option>
          <option value="Rom�nia">Rom�nia</option>
          <option value="Ruanda">Ruanda</option>
          <option value="R�ssia">R�ssia</option>
          <option value="Samoa Ocidental">Samoa Ocidental</option>
          <option value="San Marino">San Marino</option>
          <option value="Santa Helena - Reino Unido">Santa Helena - Reino Unido</option>
          <option value="Santa L�cia">Santa L�cia</option>
          <option value="S�o Cristov�o e N�vis">S�o Cristov�o e N�vis</option>
          <option value="S�o Tom� e Pr�ncipe">S�o Tom� e Pr�ncipe</option>
          <option value="S�o Vicente e Granadinas">S�o Vicente e Granadinas</option>
          <option value="Sardenha - It�lia">Sardenha - It�lia</option>
          <option value="Senegal">Senegal</option>
          <option value="Serra Leoa">Serra Leoa</option>
          <option value="S�ria">S�ria</ ??? ?A?�?option> 
          <option value="Som�lia">Som�lia</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Suazil�ndia">Suazil�ndia</option>
          <option value="Sud�o">Sud�o</option>
          <option value="Su�cia">Su�cia</option>
          <option value="Su��a">Su��a</option>
          <option value="Suriname">Suriname</option>
          <option value="Tadjiquist�o">Tadjiquist�o</option>
          <option value="Tail�ndia">Tail�ndia</option>
          <option value="Taiti">Taiti</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Tanz�nia">Tanz�nia</option>
          <option value="Terra de Francisco Jos� - R�ssia">Terra de Francisco 
          Jos� - R�ssia</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad e Tobago">Trinidad e Tobago</option>
          <option value="Trist�o da Cunha - Reino Unido">Trist�o da Cunha - Reino 
          Unido</option>
          <option value="Tun�sia">Tun�sia</option>
          <option value="Turcomenist�o">Turcomenist�o</option>
          <option value="Turquia">Turquia</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Ucr�nia">Ucr�nia</option>
          <option value="Uganda">Uganda</option>
          <option value="Uruguai">Uruguai</option>
          <option value="Uzbequist�o">Uzbequist�o</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietn�">Vietn�</option>
          <option value="Zaire">Zaire</option>
          <option value="Z�mbia">Z�mbia</option>
          <option value="Zimb�bue">Zimb�bue</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        da Empresa: 
        <input type="text" name="nomeempresa3" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa3" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp3" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp3">
          <option value="--">-- 
          <option value="AC">AC 
          <option value="AL">AL 
          <option value="AM">AM 
          <option value="AP">AP 
          <option value="BA">BA 
          <option value="CE">CE 
          <option value="DF">DF 
          <option value="ES">ES 
          <option value="GO">GO 
          <option value="MA">MA 
          <option value="MG">MG 
          <option value="MS">MS 
          <option value="MT">MT 
          <option value="PA">PA 
          <option value="PB">PB 
          <option value="PE">PE 
          <option value="PI">PI 
          <option value="PR">PR 
          <option value="RJ">RJ 
          <option value="RN">RN 
          <option value="RO">RO 
          <option value="RR">RR 
          <option value="RS">RS 
          <option value="SC">SC 
          <option value="SE">SE 
          <option value="SP">SP 
          <option value="TO">TO</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Pa&iacute;s: 
        <select name="paisemp3">
          <option value="Brasil">Brasil</option>
          <option value="Afeganist�o">Afeganist�o</option>
          <option value="�frica do Sul">�frica do Sul</option>
          <option value="Aland - Finl�ndia">Aland - Finl�ndia</option>
          <option value="Alb�nia">Alb�nia</option>
          <option value="Alemanha">Alemanha</option>
          <option value="Andorra">Andorra</option>
          <option value="Angola">Angola</option>
          <option value="Anguilla - Reino Unido">Anguilla - Reino Unido</option>
          <option value="Ant�rtida">Ant�rtida</option>
          <option value="Ant�gua e Barbuda">Ant�gua e Barbuda</option>
          <option value="Antilhas Holandesa">Antilhas Holandesas</option>
          <option value="Ar�bia Saudita">Ar�bia Saudita</option>
          <option value="Arg�lia">Arg�lia</option>
          <option value="Argentina">Argentina</option>
          <option value="Arm�nia">Arm�nia</option>
          <option value="Aruba - Holanda">Aruba - Holanda</option>
          <option value="Ascens�o - Reino Unido">Ascens�o - Reino Unido</option>
          <option value="Austr�lia">Austr�lia</option>
          <option value="�ustria">�ustria</option>
          <option value="Azerbaij�o">Azerbaij�o</option>
          <option value="Bahamas">Bahamas</option>
          <option value="Bahrein">Bahrein</option>
          <option value="Bangladesh">Bangladesh</option>
          <option value="Barbados">Barbados</option>
          <option value="Belarus">Belarus</option>
          <option value="B�lgica">B�lgica</option>
          <option value="Belize">Belize</option>
          <option value="Benin">Benin</option>
          <option value="Bermudas - Reino Unido">Bermudas - Reino Unido</option>
          <option value="Bioko - Guin� Equatorial">Bioko - Guin� Equatorial</option>
          <option value="Bol�via">Bol�via</option>
          <option value="B�snia-Herzeg�vina">B�snia-Herzeg�vina</option>
          <option value="Botsuana">Botsuana</option>
          <option value="Brunei">Brunei</option>
          <option value="Bulg�ria">Bulg�ria</option>
          <option value="Burkina Fasso">Burkina Fasso</option>
          <option value="Burundi">Burundi</option>
          <option value="But�o">But�o</option>
          <option value="Cabo Verde">Cabo Verde</option>
          <option value="Camar�es">Camar�es</option>
          <option value="Camboja">Camboja</option>
          <option value="Canad�">Canad�</option>
          <option value="Cazaquist�o">Cazaquist�o</option>
          <option value="Ceuta -  ???
?A?�?Espanha">Ceuta - Espanha</option>
          <option value="Chade">Chade</option>
          <option value="Chile">Chile</option>
          <option value="China">China</option>
          <option value="Chipre">Chipre</option>
          <option value="Cidade do Vaticano">Cidade do Vaticano</option>
          <option value="Cingapura">Cingapura</option>
          <option value="Col�mbia">Col�mbia</option>
          <option value="Congo">Congo</option>
          <option value="Cor�ia do Norte">Cor�ia do Norte</option>
          <option value="Cor�ia do Sul">Cor�ia do Sul</option>
          <option value="C�rsega - Fran�a">C�rsega - Fran�a</option>
          <option value="Costa do Marfim">Costa do Marfim</option>
          <option value="Costa Rica">Costa Rica</option>
          <option value="Creta - Gr�cia">Creta - Gr�cia</option>
          <option value="Cro�cia">Cro�cia</option>
          <option value="Cuba">Cuba</option>
          <option value="Cura�ao - Holanda">Cura�ao - Holanda</option>
          <option value="Dinamarca">Dinamarca</option>
          <option value="Djibuti">Djibuti</option>
          <option value="Dominica">Dominica</option>
          <option value="Egito">Egito</option>
          <option value="El Salvador">El Salvador</option>
          <option value="Emirado �rabes Unidos">Emirado �rabes Unidos</option>
          <option value="Equador">Equador</option>
          <option value="Eritr�ia">Eritr�ia</option>
          <option value="Eslov�quia">Eslov�quia</option>
          <option value="Eslov�nia">Eslov�nia</option>
          <option value="Espanha">Espanha</option>
          <option value="Estados Unidos">Estados Unidos</option>
          <option value="Est�nia">Est�nia</option>
          <option value="Eti�pia">Eti�pia</option>
          <option value="Fiji">Fiji</option>
          <option value="Filipinas">Filipinas</option>
          <option value="Finl�ndia">Finl�ndia</option>
          <option value="Fran�a">Fran�a</option>
          <option value="Gab�o">Gab�o</option>
          <option value="G�mbia">G�mbia</option>
          <option value="Gana">Gana</option>
          <option value="Ge�rgia">Ge�rgia</option>
          <option value="Gibraltar - Reino Unido">Gibraltar - Reino Unido</option>
          <option value="Granada">Granada</option>
          <option value="Gr�cia">Gr�cia</option>
          <option value="Groenl�ndia - Dinamarca">Groenl�ndia - Dinamarca</option>
          <option value="Guadalupe - Fran�a">Guadalupe - Fran�a</option>
          <option val ???
?a?�?ue="Guam - Estados Unidos">Guam - Estados Unidos</option>
          <option value="Guatemala">Guatemala</option>
          <option value="Guiana">Guiana</option>
          <option value="Guiana Francesa">Guiana Francesa</option>
          <option value="Guin�">Guin�</option>
          <option value="Guin� Equatorial">Guin� Equatorial</option>
          <option value="Guin�-Bissau">Guin�-Bissau</option>
          <option value="Haiti">Haiti</option>
          <option value="Holanda">Holanda</option>
          <option value="Honduras">Honduras</option>
          <option value="Hong Kong">Hong Kong</option>
          <option value="Hungria">Hungria</option>
          <option value="I�men">I�men</option>
          <option value="IIhas Virgens - Estados Unidos">IIhas Virgens - Estados 
          Unidos</option>
          <option value="Ilha de Man - Reino Unido">Ilha de Man - Reino Unido</option>
          <option value="Ilha Natal - Austr�lia">Ilha Natal - Austr�lia</option>
          <option value="Ilha Norfolk - Austr�lia">Ilha Norfolk - Austr�lia</option>
          <option value="Ilha Pitcairn - Reino Unido">Ilha Pitcairn - Reino Unido</option>
          <option value="Ilha Wrangel - R�ssia">Ilha Wrangel - R�ssia</option>
          <option value="Ilhas Aleutas - Estados Unidos">Ilhas Aleutas - Estados 
          Unidos</option>
          <option value="Ilhas Can�rias - Espanha">Ilhas Can�rias - Espanha</option>
          <option value="Ilhas Cayman - Reino Unido">Ilhas Cayman - Reino Unido</option>
          <option value="Ilhas Comores">Ilhas Comores</option>
          <option value="Ilhas Cook - Nova Zel�ndia">Ilhas Cook - Nova Zel�ndia</option>
          <option value="Ilhas do Canal - Reino Unido">Ilhas do Canal - Reino 
          Unido</option>
          <option value="Ilhas Salom�o">Ilhas Salom�o</option>
          <option value="Ilhas Seychelles">Ilhas Seychelles</option>
          <option value="Ilhas Tokelau - Nova Zel�ndia">Ilhas Tokelau - Nova Zel�ndia</option>
          <option value="Ilhas Turks e Caicos - Reino Unido">Ilhas Turks e Caicos 
          - Reino Unido</option>
          <option value="Ilhas Virgens - Reino Unido">Ilhas Virgens - Reino Unido</option>
          <option value="Ilhas Wallis e Futuna - Fran�a">Ilhas Wallis e Futuna 
          - Fran�a</option>
          <option value="Ilhsa Cocos - Austr�lia">Ilhsa Cocos - Austr�lia</option>
          <option value="�ndia">�ndia</option>< ???
?A?�?option value="Indon�sia">Indon�sia
             
          <option value="Ir�">Ir�</option>
          <option value="Iraque">Iraque</option>
          <option value="Irlanda">Irlanda</option>
          <option value="Isl�ndia">Isl�ndia</option>
          <option value="Israel">Israel</option>
          <option value="It�lia">It�lia</option>
          <option value="Iugosl�via">Iugosl�via</option>
          <option value="Jamaica">Jamaica</option>
          <option value="Jan Mayen - Noruega">Jan Mayen - Noruega</option>
          <option value="Jap�o">Jap�o</option>
          <option value="Jord�nia">Jord�nia</option>
          <option value="Kiribati">Kiribati</option>
          <option value="Kuait">Kuait</option>
          <option value="Laos">Laos</option>
          <option value="Lesoto">Lesoto</option>
          <option value="Let�nia">Let�nia</option>
          <option value="L�bano">L�bano</option>
          <option value="Lib�ria">Lib�ria</option>
          <option value="L�bia">L�bia</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Litu�nia">Litu�nia</option>
          <option value="Luxemburgo">Luxemburgo</option>
          <option value="Macau - Portugal">Macau - Portugal</option>
          <option value="Maced�nia">Maced�nia</option>
          <option value="Madagascar">Madagascar</option>
          <option value="Madeira - Portugal">Madeira - Portugal</option>
          <option value="Mal�sia">Mal�sia</option>
          <option value="Malaui">Malaui</option>
          <option value="Maldivas">Maldivas</option>
          <option value="Mali">Mali</option>
          <option value="Malta">Malta</option>
          <option value="Marrocos">Marrocos</option>
          <option value="Martinica - Fran�a">Martinica - Fran�a</option>
          <option value="Maur�cio - Reino Unido">Maur�cio - Reino Unido</option>
          <option value="Maurit�nia">Maurit�nia</option>
          <option value="M�xico">M�xico</option>
          <option value="Micron�sia">Micron�sia</option>
          <option value="Mo�ambique">Mo�ambique</option>
          <option value="Moldova">Moldova</option>
          <option value="M�naco">M�naco</option>
          <option value="Mong�lia">Mong�lia</option>
          <option value="MontSerrat - Reino Unido">MontSerrat - Reino Unido</option>
          <option value="Myanma">Myanma</option>
          <option value="Nam�bia">Nam�bia</option>
          <option value="Nauru">Nauru</option>
          <option value="Nepal">Nepal</option>
          <option v ???
?a?�?alue="Nicar�gua">Nicar�gua</option>
          <option value="N�ger">N�ger</option>
          <option value="Nig�ria">Nig�ria</option>
          <option value="Niue">Niue</option>
          <option value="Noruega">Noruega</option>
          <option value="Nova Bretanha - Papua-Nova Guin�">Nova Bretanha - Papua-Nova 
          Guin�</option>
          <option value="Nova Caled�nia - Fran�a">Nova Caled�nia - Fran�a</option>
          <option value="Nova Zel�ndia">Nova Zel�ndia</option>
          <option value="Om�">Om�</option>
          <option value="Palau - Estados Unidos">Palau - Estados Unidos</option>
          <option value="Palestina">Palestina</option>
          <option value="Panam�">Panam�</option>
          <option value="Papua-Nova Guin�">Papua-Nova Guin�</option>
          <option value="Paquist�o">Paquist�o</option>
          <option value="Paraguai">Paraguai</option>
          <option value="Peru">Peru</option>
          <option value="Polin�sia Francesa">Polin�sia Francesa</option>
          <option value="Pol�nia">Pol�nia</option>
          <option value="Porto Rico">Porto Rico</option>
          <option value="Portugal">Portugal</option>
          <option value="Qatar">Qatar</option>
          <option value="Qu�nia">Qu�nia</option>
          <option value="Quirguist�o">Quirguist�o</option>
          <option value="Reino Unido">Reino Unido</option>
          <option value="Rep�blica Centro-Africana">Rep�blica Centro-Africana</option>
          <option value="Rep�blica Dominicana">Rep�blica Dominicana</option>
          <option value="Rep�blica Tcheca">Rep�blica Tcheca</option>
          <option value="Rom�nia">Rom�nia</option>
          <option value="Ruanda">Ruanda</option>
          <option value="R�ssia">R�ssia</option>
          <option value="Samoa Ocidental">Samoa Ocidental</option>
          <option value="San Marino">San Marino</option>
          <option value="Santa Helena - Reino Unido">Santa Helena - Reino Unido</option>
          <option value="Santa L�cia">Santa L�cia</option>
          <option value="S�o Cristov�o e N�vis">S�o Cristov�o e N�vis</option>
          <option value="S�o Tom� e Pr�ncipe">S�o Tom� e Pr�ncipe</option>
          <option value="S�o Vicente e Granadinas">S�o Vicente e Granadinas</option>
          <option value="Sardenha - It�lia">Sardenha - It�lia</option>
          <option value="Senegal">Senegal</option>
          <option value="Serra Leoa">Serra Leoa</option>
          <option value="S�ria">S�ria</ ??? ?A?�?option> 
          <option value="Som�lia">Som�lia</option>
          <option value="Sri Lanka">Sri Lanka</option>
          <option value="Suazil�ndia">Suazil�ndia</option>
          <option value="Sud�o">Sud�o</option>
          <option value="Su�cia">Su�cia</option>
          <option value="Su��a">Su��a</option>
          <option value="Suriname">Suriname</option>
          <option value="Tadjiquist�o">Tadjiquist�o</option>
          <option value="Tail�ndia">Tail�ndia</option>
          <option value="Taiti">Taiti</option>
          <option value="Taiwan">Taiwan</option>
          <option value="Tanz�nia">Tanz�nia</option>
          <option value="Terra de Francisco Jos� - R�ssia">Terra de Francisco 
          Jos� - R�ssia</option>
          <option value="Togo">Togo</option>
          <option value="Tonga">Tonga</option>
          <option value="Trinidad e Tobago">Trinidad e Tobago</option>
          <option value="Trist�o da Cunha - Reino Unido">Trist�o da Cunha - Reino 
          Unido</option>
          <option value="Tun�sia">Tun�sia</option>
          <option value="Turcomenist�o">Turcomenist�o</option>
          <option value="Turquia">Turquia</option>
          <option value="Tuvalu">Tuvalu</option>
          <option value="Ucr�nia">Ucr�nia</option>
          <option value="Uganda">Uganda</option>
          <option value="Uruguai">Uruguai</option>
          <option value="Uzbequist�o">Uzbequist�o</option>
          <option value="Vanuatu">Vanuatu</option>
          <option value="Venezuela">Venezuela</option>
          <option value="Vietn�">Vietn�</option>
          <option value="Zaire">Zaire</option>
          <option value="Z�mbia">Z�mbia</option>
          <option value="Zimb�bue">Zimb�bue</option>
        </select>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><em>Resumo 
        das Qualifica&ccedil;&otilde;es</em></strong></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Fa&ccedil;a 
        aqui o seu resumo:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000"><b><font color="#000000"><b><font color="#000000"><b><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <textarea name="sugestao" cols="50" rows="10"></textarea>
        </font></b></font></b></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font></b></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Usu&aacute;rio*: 
        <input type="text" name="username" size=20 maxlenght="12">
        *<b>entre 1 e 12 caracteres</b> </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Senha**: 
        <input type="password" name="password" size=20>
        ** <b> entre 5 e 15 caracteres</b> </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Confirma 
        Senha: 
        <input type="password" name="passwordconfirm" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="submit" type="submit" value="CADASTRAR">
        </font></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
<font face="arial,helvetica" size=2><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
<%end if%>
</font> </font> 
</body>
</html>
