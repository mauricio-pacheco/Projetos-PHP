<%
Option Explicit
Dim sql, rsProfile, username, malechecked, femalechecked, sendemailchecked, datanascimento, cidade, estado, pais, sugestao, vinculo, area, cargo, estadocivil, natural, nacional, cpf, endereco, numero, complemento, cep, telefone, celular, nivel, status_, inst, nivel2, status2, inst2, nivel3, status3, inst3, nomecurso, entidadecurso, datacurso, cargacurso, nomecurso2, entidadecurso2, datacurso2, cargacurso2, nomecurso3, entidadecurso3, datacurso3, cargacurso3, ingles, espanhol, italiano, alemao, inglesc, espanholc, italianoc, alemaoc, outroidioma, outroidiomac, editort, editortc, planilha, planilhac, programas, programasc, conhecimento, conhecimentoc, infoutros, nomeempresa, cargoempresa, estadoemp, cidadeemp, paisemp, nomeempresa2, cargoempresa2, estadoemp2, cidadeemp2, paisemp2, nomeempresa3, cargoempresa3, estadoemp3, cidadeemp3, paisemp3

username = Request.Cookies("username")
%>

<html>
<head>
<meta http-equiv="Expires" content="Mon, 06 Jan 1990 00:00:01 GMT">
<title>Grupo Vanguarda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<font color="#000000" size="1" face="arial,helvetica"> 
<%
if username = "" then
  nologin()
end if
%>
<!--#include file="conn.asp"-->
<%
sql = "SELECT * FROM Users WHERE username = '" & username & "'"
Set rsProfile = Server.CreateObject("ADODB.Recordset")
rsProfile.Open sql, conn, 3, 3
%>
</font><font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong> 
<div align="center">
  <p>GRUPO<font color="#009900"> </font><strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif">VANGUARDA</font></strong> 
  </p>
  <p>&nbsp; </p>
</div>
</strong></font>
<h3 align="center"><font size="1" face="arial,helvetica"><img src="../logo.JPG" width="102" height="114"></font></h3>
<p align="center"><font color="#0000FF" size="2" face="Verdana, Arial, Helvetica, sans-serif"></font> 
  <strong><font color="#009900" size="2" face="Verdana, Arial, Helvetica, sans-serif">Atualiza&ccedil;&atilde;o 
  de Curriculum</font></strong></p>
<p align="center"><font size="1" face="arial,helvetica"><a href="index.asp">VOLTAR 
  AO PAINEL DE CONTROLE</a></font></p>
<h3>&nbsp;</h3>
<h3><font color="#000000" size="2" face="arial,helvetica"><strong><em>Perfil de 
  <font color="#009900"><%=username%></font></em></strong></font></h3>
<font color="#000000" size="1" face="arial,helvetica"> 
<%if Request.QueryString("updated") = "true" then%>
</font> 
<p><font color="#000000" size="1" face="arial,helvetica">Seu perfil foi alterado 
  com sucesso <%=Time()%></font></p>
<font color="#000000" size="1" face="arial,helvetica"> 
<%else%>
<br clear="all">
<%end if%>
</font><font color="#FFFFFF"></font> 
<form action="profile_update.asp" method="post" name="profileform">
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
        </em></strong> </font></td>
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
        <select name="area" value="<%=rsProfile("area")%>">
          <option value="Administrativa"> Administrativa</option>
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
        <input type="text" name="cargo" value="<%=rsProfile("cargo")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td width="67%">&nbsp;</td>
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
        <input type="text" name="firstname" value="<%=rsProfile("firstname")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sobrenome:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="surname" value="<%=rsProfile("surname")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        Nascimento:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="datanascimento" value="<%=rsProfile("datanascimento")%>" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Sexo:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
        </b></font><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <%
  if rsProfile("sex") = "male" then
    malechecked = " checked"
  else
    femalechecked = " checked"
  end if
  %>
        </font><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b> 
        <input type="radio" name="sex" value="male"<%=malechecked%>>
        Masculino 
        <input type="radio" name="sex" value="male"<%=femalechecked%>>
        Feminino</b></font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado 
        Civil:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="estadocivil" value="<%=rsProfile("estadocivil")%>" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Natural:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="natural" value="<%=rsProfile("natural")%>" size="30" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nacionalidade:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="nacional" value="<%=rsProfile("nacional")%>" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">CPF:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cpf" value="<%=rsProfile("cpf")%>" size="28" >
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
        <input type="text" name="endereco" value="<%=rsProfile("endereco")%>" size="36" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">N&uacute;mero:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="numero" value="<%=rsProfile("numero")%>" size="12" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Complemento:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="complemento" value="<%=rsProfile("complemento")%>" size="26" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">CEP:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cep" value="<%=rsProfile("cep")%>" size="20" >
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="cidade" value="<%=rsProfile("cidade")%>" size=32>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <select name="estado" value="<%=rsProfile("estado")%>">
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
        <input type="checkbox" name="outropais" value="<%=rsProfile("outropais")%>">
        Outro Pa�s</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Pa&iacute;s:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <select name="pais" value="<%=rsProfile("pais")%>">
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
        <input type="text" name="email" value="<%=rsProfile("email")%>" size=32>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Telefone:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="telefone" value="<%=rsProfile("telefone")%>" size=24>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Celular:</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input type="text" name="celular" value="<%=rsProfile("celular")%>" size=24>
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
        <select name="nivel" value="<%=rsProfile("nivel")%>">
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
        <select name="status_" value="<%=rsProfile("status_")%>">
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
        <input type="text" name="inst" value="<%=rsProfile("inst")%>" size=34>
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
        <select name="nivel2" value="<%=rsProfile("nivel2")%>">
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
        <select name="status2" value="<%=rsProfile("status2")%>">
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
        <input type="text" name="inst2" value="<%=rsProfile("inst2")%>" size=34>
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
        <select name="nivel3" value="<%=rsProfile("nivel3")%>">
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
        <select name="status3" value="<%=rsProfile("status3")%>">
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
        <input type="text" name="inst3" value="<%=rsProfile("inst3")%>" size=34>
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
        <input type="text" name="nomecurso" value="<%=rsProfile("nomecurso")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso" value="<%=rsProfile("entidadecurso")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso" value="<%=rsProfile("datacurso")%>" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso" value="<%=rsProfile("cargacurso")%>" size=16>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do curso: 
        <input type="text" name="nomecurso2" value="<%=rsProfile("nomecurso2")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso2" value="<%=rsProfile("entidadecurso2")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso2" value="<%=rsProfile("datacurso2")%>" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso2" value="<%=rsProfile("cargacurso2")%>" size=16>
        </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Nome 
        do curso: 
        <input type="text" name="nomecurso3" value="<%=rsProfile("nomecurso3")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Entidade: 
        <input type="text" name="entidadecurso3" value="<%=rsProfile("entidadecurso3")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Data 
        do Curso: 
        <input type="text" name="datacurso3" value="<%=rsProfile("datacurso3")%>" size=16>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Carga 
        Hor&aacute;ria: 
        <input type="text" name="cargacurso3" value="<%=rsProfile("cargacurso3")%>" size=16>
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
        <select name="inglesc" value="<%=rsProfile("inglesc")%>">
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
        <select name="espanholc" value="<%=rsProfile("espanholc")%>">
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
        <select name="italianoc" value="<%=rsProfile("italianoc")%>">
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
        <select name="alemaoc" value="<%=rsProfile("alemaoc")%>">
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
        <input type="text" name="outroidioma" value="<%=rsProfile("outroidioma")%>" size=16>
        - 
        <select name="outroidiomac" value="<%=rsProfile("outroidiomac")%>">
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
        <select name="editortc" value="<%=rsProfile("editortc")%>">
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
        <input type="radio" name="planilha" value="Planilha">
        </b> Planilhas Eletr&ocirc;nicas - 
        <select name="planilhac" value="<%=rsProfile("planilhac")%>">
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
        <input type="radio" name="programas" value="Programas">
        </b>Programas de Apresenta&ccedil;&atilde;o - 
        <select name="programasc" value="<%=rsProfile("programasc")%>">
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
        <input type="radio" name="conhecimento" value="Conhecimento">
        </b>Conhecimento em Internet - 
        <select name="conhecimentoc" value="<%=rsProfile("conhecimentoc")%>">
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
          <textarea name="infoutros" value="<%=rsProfile("infoutros")%>" cols="50" rows="10"></textarea>
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
        <input type="text" name="nomeempresa" value="<%=rsProfile("nomeempresa")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa" value="<%=rsProfile("cargoempresa")%>" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp" value="<%=rsProfile("cidadeemp")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp" value="<%=rsProfile("estadoemp")%>">
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
        <select name="paisemp" value="<%=rsProfile("paisemp")%>">
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
        <input type="text" name="nomeempresa2" value="<%=rsProfile("nomeempresa2")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa2" value="<%=rsProfile("cargoempresa2")%>" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp2" value="<%=rsProfile("cidadeemp2")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp2" value="<%=rsProfile("estadoemp2")%>">
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
        <select name="paisemp2" value="<%=rsProfile("paisemp2")%>">
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
        <input type="text" name="nomeempresa3" value="<%=rsProfile("nomeempresa3")%>" size=34>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cargo: 
        <input type="text" name="cargoempresa3" value="<%=rsProfile("cargoempresa3")%>" size=20>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Cidade: 
        <input type="text" name="cidadeemp3" value="<%=rsProfile("cidadeemp3")%>" size=30>
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Estado: 
        <select name="estadoemp3" value="<%=rsProfile("estadoemp3")%>">
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
        <select name="paisemp3" value="<%=rsProfile("paisemp3")%>">
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
        <textarea name="sugestao" value="<%=rsProfile("sugestao")%>" cols="50" rows="10"></textarea>
        </font></b></font></b></font><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        </font></b></font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">Usu&aacute;rio*: 
        <input type="text" name="username" value="<%=rsProfile("username")%>" size=20 maxlenght="12">
        *<b>entre 1 e 12 caracteres</b> </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size=1 face="Verdana, Arial, Helvetica, sans-serif">&nbsp;</font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <a href="changepwd.asp">MUDAR A SENHA</a> </font></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif">&nbsp; 
        </font></td>
    </tr>
    <tr> 
      <td><font color="#000000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
        <input name="submit" type="submit" value="ATUALIZAR">
        </font></td>
    </tr>
  </table>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>

<%
rsProfile.close
set rsProfile = nothing
conn.close
set conn = nothing
%>

<%Function nologin()%>

<p align="center"><b>Voc&ecirc; precisa estar logado para mudar seu perfil.</b></p>

<p align="center"><b><a href="javascript:window.close()">Fechar esta janela</a></b></p>

</font>
</body>
</html>
<%Response.end
End Function%>