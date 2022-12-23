<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel=stylesheet type=text/css href="classes/estilos.css">
<title>CDC Veículos - Cadastro Consignado</title>
</head>

<body leftmargin="0" rightmargin="0" topmargin="0">
<script language=javascript>
function validar(cadastro) { 

if (document.cadastro.nome.value=="") {
alert("O Campo Nome não está preenchido!")
cadastro.nome.focus();
return false
}


		return true;

}


                        </SCRIPT>
<form action="enviac1.php" method="post" name="cadastro" onSubmit="return validar(this)"><table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela" align="center"><img src="cadastro.png" width="128" height="128"></td>
  </tr>
  <tr>
    <td class="fontetabela" align="center"><strong>CADASTRO CONSIGNADO E CRÉDITO REFORMA</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>1 - Dados Pessoais</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Nome:
    <input name="nome" type="text" class="fontetabela" style="width:400px" id="nome" /> 
    Sexo: 
    <select name="sexo" class="fontetabela" id="sexo">
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select> 
    RG: 
    <input name="rg" type="text" class="fontetabela" style="width:180px" id="rg" /> 
    Data Emissão:
    <input name="dataemissao" type="text" class="fontetabela" style="width:124px" id="dataemissao" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Órgão Expedidor:
      <input name="oexpedidor" type="text" class="fontetabela" style="width:110px" id="oexpedidor" />
      CPF:
      <input name="cpf" type="text" class="fontetabela" style="width:160px" id="cpf" />
      Data de Nascimento:
      <input name="nascimento" type="text" class="fontetabela" style="width:90px" id="nascimento" /> 
      Nacionalidade: 
      <input name="nacionalidade" type="text" class="fontetabela" style="width:88px" id="nacionalidade" /> 
      Natural: 
    <input name="natural" type="text" class="fontetabela" style="width:139px" id="natural" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">UF:
      <select class="fontetabela" 
                              name="estado">
          <option value='RS - Rio Grande do Sul' selected="selected">RS - Rio Grande do Sul</option>
          <option 
                                value='AC - Acre'>AC - Acre</option>
          <option value='AL - Alagoas'>AL - Alagoas</option>
          <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
          <option value='AP - Amapá'>AP - Amap&aacute;</option>
          <option 
                                value='BA - Bahia'>BA - Bahia</option>
          <option value='CE - Ceará'>CE - Cear&aacute;</option>
          <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
          <option value='ES - Espírito Santo'>ES - Esp&iacute;rito Santo</option>
          <option 
                                value='GO - Goiás'>GO - Goi&aacute;s</option>
          <option value='MA - Maranhão'>MA - Maranh&atilde;o</option>
          <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
          <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
          <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
          <option value='PA - Pará'>PA - Par&aacute;</option>
          <option 
                                value='PB - Paraíba'>PB - Para&iacute;ba</option>
          <option value='PE - Pernambuco'>PE - Pernambuco</option>
          <option 
                                value='PI - Piauí'>PI - Piau&iacute;</option>
          <option value='PR - Paraná'>PR - Paran&aacute;</option>
          <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
          <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
          <option 
                                value='RO - Roraima'>RO - Roraima</option>
          <option value='RR - Roraima'>RR - Roraima</option>
          <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
          <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
          <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
          <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
        </select>
    N° do Beneficio: 
    <input name="beneficio" type="text" class="fontetabela" style="width:90px" id="beneficio" /> 
    Estado Civil: 
    <input name="ecivil" type="text" class="fontetabela" style="width:90px" id="ecivil" /> 
    Endereço: 
    <input name="endereco" type="text" class="fontetabela" style="width:391px" id="endereco" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">N°:
    <input name="numero" type="text" class="fontetabela" style="width:60px" id="numero" /> 
    Complemento: 
    <input name="complemento" type="text" class="fontetabela" style="width:143px" id="complemento" /> 
    Bairro: 
    <input name="bairro" type="text" class="fontetabela" style="width:80px" id="bairro" /> 
    Cidade: 
    <input name="cidade" type="text" class="fontetabela" style="width:180px" id="cidade" />
     UF:
      <select class="fontetabela" 
                              name="estado2">
          <option value='RS - Rio Grande do Sul' selected="selected">RS - Rio Grande do Sul</option>
          <option 
                                value='AC - Acre'>AC - Acre</option>
          <option value='AL - Alagoas'>AL - Alagoas</option>
          <option 
                                value='AM - Amazonas'>AM - Amazonas</option>
          <option value='AP - Amapá'>AP - Amap&aacute;</option>
          <option 
                                value='BA - Bahia'>BA - Bahia</option>
          <option value='CE - Ceará'>CE - Cear&aacute;</option>
          <option 
                                value='DF - Distrito Federal'>DF - Distrito Federal</option>
          <option value='ES - Espírito Santo'>ES - Esp&iacute;rito Santo</option>
          <option 
                                value='GO - Goiás'>GO - Goi&aacute;s</option>
          <option value='MA - Maranhão'>MA - Maranh&atilde;o</option>
          <option 
                                value='MG - Minas Gerais'>MG - Minas Gerais</option>
          <option value='MS - Mato Grosso do Sul'>MS - Mato Grosso do Sul</option>
          <option 
                                value='MT - Mato Grosso'>MT - Mato Grosso</option>
          <option value='PA - Pará'>PA - Par&aacute;</option>
          <option 
                                value='PB - Paraíba'>PB - Para&iacute;ba</option>
          <option value='PE - Pernambuco'>PE - Pernambuco</option>
          <option 
                                value='PI - Piauí'>PI - Piau&iacute;</option>
          <option value='PR - Paraná'>PR - Paran&aacute;</option>
          <option 
                                value='RJ - Rio de Janeiro'>RJ - Rio de Janeiro</option>
          <option value='RN - Rio Grande do Norte'>RN - Rio Grande do Norte</option>
          <option 
                                value='RO - Roraima'>RO - Roraima</option>
          <option value='RR - Roraima'>RR - Roraima</option>
          <option value='SC - Santa Catarina'>SC - Santa Catarina</option>
          <option 
                                value='SE - Sergipe'>SE - Sergipe</option>
          <option value='SP - São Paulo'>SP - S&atilde;o Paulo</option>
          <option 
                                value='TO - Tocantins'>TO - Tocantins</option>
    </select> 
        CEP:
    <input name="cep" type="text" class="fontetabela" style="width:90px" id="cep" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Tempo de Residência (Anos):
    <input name="tresidencia" type="text" class="fontetabela" style="width:90px" id="tresidencia" /> 
    Telefone: 
    <input name="telefone" type="text" class="fontetabela" style="width:90px" id="telefone" /> 
    Celular: 
    <input name="celular" type="text" class="fontetabela" style="width:90px" id="celular" /> 
    E-mail:
    <input name="email" type="text" class="fontetabela" style="width:169px" id="email" /> 
    Filiação: 
    <input name="filiacao" type="text" class="fontetabela" style="width:168px" id="filiacao" /></td> 
   
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Pai:
      <input name="pai" type="text" class="fontetabela" style="width:452px" id="pai" />
    Mãe: 
    <input name="mae" type="text" class="fontetabela" style="width:452px" id="mae" />
    </td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Banco:
      <input name="banco" type="text" class="fontetabela" style="width:90px" id="banco" />
      Agência: 
    <input name="agencia" type="text" class="fontetabela" style="width:90px" id="agencia" />
    Conta Corrente: 
    <input name="ccorrente" type="text" class="fontetabela" style="width:90px" id="ccorrente" />
      Tempo de Conta (Anos): 
    <input name="tconta" type="text" class="fontetabela" style="width:90px" id="tconta" /> <input class="fontetabela" type="submit" value="EFETUAR O CADASTRO DO FORMULÁRIO" name="submit" style="width:285px" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>
</body>
</html>