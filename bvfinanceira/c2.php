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
<form action="enviac2.php" method="post" name="cadastro" onSubmit="return validar(this)"><table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela" align="center"><img src="cadastro.png" width="128" height="128"></td>
  </tr>
  <tr>
    <td class="fontetabela" align="center"><strong>CADASTRO DE PESSOA FÍSICA</strong></td>
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
    <input name="1nome" type="text" class="fontetabela" style="width:400px" id="1nome" /> 
    Sexo: 
    <select name="1sexo" class="fontetabela" id="1sexo">
      <option value="Masculino">Masculino</option>
      <option value="Feminino">Feminino</option>
    </select> 
    RG: 
    <input name="1rg" type="text" class="fontetabela" style="width:180px" id="1rg" /> 
    Data Emissão:
    <input name="1dataemissao" type="text" class="fontetabela" style="width:124px" id="1dataemissao" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Órgão Expedidor:
      <input name="1oexpedidor" type="text" class="fontetabela" style="width:110px" id="1oexpedidor" />
      CPF:
      <input name="1cpf" type="text" class="fontetabela" style="width:160px" id="1cpf" />
      Data de Nascimento:
      <input name="1nascimento" type="text" class="fontetabela" style="width:90px" id="1nascimento" /> 
      Nacionalidade: 
      <input name="1nacionalidade" type="text" class="fontetabela" style="width:88px" id="1nacionalidade" /> 
      Natural: 
    <input name="natural" type="text" class="fontetabela" style="width:139px" id="natural" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">UF:
      <select class="fontetabela" 
                              name="1estado" id="1estado">
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
    N° de Dependentes: 
    <input name="1dependentes" type="text" class="fontetabela" style="width:40px" id="1dependentes" /> 
    Estado Civil: 
    <input name="1ecivil" type="text" class="fontetabela" style="width:80px" id="1ecivil" />
    Correspondência:
    <input name="1correspondencia" type="text" class="fontetabela" style="width:90px" id="1correspondencia" />
     
    Endereço: 
    <input name="1endereco" type="text" class="fontetabela" style="width:245px" id="1endereco" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">N°:
    <input name="1numero" type="text" class="fontetabela" style="width:60px" id="1numero" /> 
    Complemento: 
    <input name="1complemento" type="text" class="fontetabela" style="width:143px" id="1complemento" /> 
    Bairro: 
    <input name="1bairro" type="text" class="fontetabela" style="width:80px" id="1bairro" /> 
    Cidade: 
    <input name="1cidade" type="text" class="fontetabela" style="width:180px" id="1cidade" />
     UF:
      <select class="fontetabela" 
                              name="1estado2" id="1estado2">
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
    <input name="1cep" type="text" class="fontetabela" style="width:90px" id="1cep" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Tempo de Residência (Anos):
    <input name="1tresidencia" type="text" class="fontetabela" style="width:90px" id="1tresidencia" /> 
    Telefone: 
    <input name="1telefone" type="text" class="fontetabela" style="width:90px" id="1telefone" /> 
    Celular: 
    <input name="1celular" type="text" class="fontetabela" style="width:90px" id="1celular" /> 
    E-mail:
    <input name="1email" type="text" class="fontetabela" style="width:169px" id="1email" /> 
    Filiação: 
    <input name="1filiacao" type="text" class="fontetabela" style="width:168px" id="1filiacao" /></td> 
   
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Categoria:
      <select name="1categoria" class="fontetabela" id="1categoria">
        <option value="Próprio?">Próprio?</option>
        <option value="Recados?">Recados?</option>
      </select>
      Tipo:
      <input name="1tipo" type="text" class="fontetabela" style="width:86px" id="1tipo" />
      Tipo de Moradia:
<input name="1tmoradia" type="text" class="fontetabela" style="width:82px" id="1tmoradia" /> 
      Valor do Imóvel: 
      <input name="1valorimovel" type="text" class="fontetabela" style="width:82px" id="1valorimovel" /> 
      Valor do Aluguel: <input name="1valoraluguel" type="text" class="fontetabela" style="width:82px" id="1valoraluguel" /> 
      Valor da Prestação: 
      <input name="1valorprestacao" type="text" class="fontetabela" style="width:82px" id="1valorprestacao" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Pai:
      <input name="1pai" type="text" class="fontetabela" style="width:452px" id="1pai" />
    Mãe: 
    <input name="1mae" type="text" class="fontetabela" style="width:452px" id="1mae" />
    </td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>2 - Dados Pessoais</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Classe Profissional:
      <input name="2cprofissional" type="text" class="fontetabela" style="width:120px" id="2cprofissional" />
      Empresa: 
      <input name="2empresa" type="text" class="fontetabela" style="width:320px" id="2empresa" />
    N° do CNPJ: 
    <input name="2cnpj" type="text" class="fontetabela" id="2cnpj" style="width:100px" value="Sócio ou Empresário" /> 
    Grau de Instrução:
    <input name="2instrucao" type="text" class="fontetabela" style="width:90px" id="2instrucao" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Cargo:
      <input name="2cargo" type="text" class="fontetabela" style="width:120px" id="2cargo" />
      Salário:
      <input name="2salario" type="text" class="fontetabela" style="width:120px" id="2salario" />
      Tempo de Serviço (anos):
      <input name="2tempo" type="text" class="fontetabela" id="2tempo" style="width:100px" />
      Grau de Instrução:
      <input name="2grau2" type="text" class="fontetabela" style="width:96px" id="ccorrente4" />      
       Nº de Empregados:
      <input name="2empregados" type="text" class="fontetabela" style="width:90px" id="ccorrente5" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Endereço:
      <input name="2endereco" type="text" class="fontetabela" style="width:287px" id="2endereco" />
      N°:
      <input name="2numero" type="text" class="fontetabela" style="width:80px" id="2numero" />
      Telefone:
      <input name="2telefone" type="text" class="fontetabela" style="width:90px" id="ccorrente7" />
      Bairro:
      <input name="2bairro" type="text" class="fontetabela" style="width:90px" id="2bairro" />
       Cidade:
      <input name="2cidade" type="text" class="fontetabela" style="width:180px" id="ccorrente8" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">
      UF:
      <select class="fontetabela" 
                              name="2estado" id="2estado">
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
      <input name="2cep" type="text" class="fontetabela" style="width:90px" id="2cep" />
       Telefone:
       <input name="2telefone2" type="text" class="fontetabela" style="width:90px" id="2telefone2" />
       Contador:
      <input name="2contador" type="text" class="fontetabela" style="width:90px" id="2contador" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>3 - Endereço alternativo de correspondência (No caso do Financiado desejar receber a correspondência em um endereço diferente do LR e do LT)</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Endereço:
      <input name="3endereco" type="text" class="fontetabela" style="width:290px" id="3endereco" />
      Bairro:
      <input name="3bairro" type="text" class="fontetabela" style="width:90px" id="3bairro" />
      Cidade:
      <input name="3cidade" type="text" class="fontetabela" style="width:260px" id="ccorrente9" />
      UF:
      <select class="fontetabela" 
                              name="3estado" id="3estado">
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
      </select></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"> CEP:
      <input name="3cep" type="text" class="fontetabela" style="width:90px" id="3cep" />
      Tempo de Residência   (Mês / Ano):
      <input name="3residencia" type="text" class="fontetabela" style="width:90px" id="cep6" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>4 - Dados do Cônjuge</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Nome:
      <input name="4nome" type="text" class="fontetabela" style="width:340px" id="4nome" />
      
      RG:
      <input name="4rg" type="text" class="fontetabela" style="width:139px" id="4rg" />
      Data Emissão:
      <input name="4dataemissao" type="text" class="fontetabela" style="width:124px" id="4dataemissao" />
      Órgão Expedidor:
      <input name="4oexpedidor" type="text" class="fontetabela" style="width:110px" id="4oexpedidor" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">
      CPF:
      <input name="4cep" type="text" class="fontetabela" style="width:160px" id="4cep" />
      Data de Nascimento:
      <input name="4nascimento" type="text" class="fontetabela" style="width:90px" id="4nascimento" />
      Nacionalidade:
      <input name="4nacionalidade" type="text" class="fontetabela" style="width:88px" id="4nacionalidade" />
      
      Empresa aonde Trabalha:
      <input name="4empresa" type="text" class="fontetabela" style="width:260px" id="4empresa" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"> Telefone Comercial:
      <input name="4telefonec" type="text" class="fontetabela" style="width:160px" id="4telefonec" />
      Admissão (Mês / Ano):
      <input name="4admissao" type="text" class="fontetabela" style="width:90px" id="4admissao" />
       Salário:
      <input name="4salario" type="text" class="fontetabela" style="width:90px" id="4salario" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>5 - Referências</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Banco:
      <input name="5banco" type="text" class="fontetabela" style="width:130px" id="5banco" />
      Agência:
      <input name="5agencia" type="text" class="fontetabela" style="width:124px" id="5agencia" />
      Conta Corrente:
      <input name="5ccorrente" type="text" class="fontetabela" id="ccorrente10" style="width:110px" />
      Tempo de Conta (Anos):
      <input name="5tempoconta" type="text" class="fontetabela" style="width:110px" id="ccorrente11" />
      Telefone:
      <input name="5telefone" type="text" class="fontetabela" style="width:110px" id="ccorrente12" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Cheque Especial:
      <input name="5cheque" type="text" class="fontetabela" style="width:130px" id="5cheque" />
      Cartão de Crédito:
      <input name="5cartao" type="text" class="fontetabela" style="width:124px" id="5cartao" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><em>Financeira (de crédito):</em></td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Nome:
      <input name="f5nome" type="text" class="fontetabela" style="width:340px" id="f5nome" />
      Valor da Prestação:
      <input name="f5prestacao" type="text" class="fontetabela" style="width:124px" id="f5prestacao" />
      N.º de Prest. Pagas:
      <input name="f5prestpagas" type="text" class="fontetabela" id="ccorrente13" style="width:110px" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">N.º de Prest. Devidas:
        <input name="f5prestdevidas" type="text" class="fontetabela" style="width:110px" id="ccorrente14" />
Telefone:
<input name="f5telefone" type="text" class="fontetabela" style="width:110px" id="ccorrente15" />
    </span></td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><em>Comercial:</em></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Nome:
      <input name="c5nome" type="text" class="fontetabela" style="width:340px" id="c5nome" />
      Valor da Prestação:
      <input name="c5prestacao" type="text" class="fontetabela" style="width:124px" id="c5prestacao" />
      N.º de Prest. Pagas:
      <input name="c5prestpagas" type="text" class="fontetabela" id="ccorrente16" style="width:110px" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">N.º de Prest. Devidas:
      <input name="c5prestdevidas" type="text" class="fontetabela" style="width:110px" id="ccorrente17" />
      Telefone:
      <input name="ccorrente13" type="text" class="fontetabela" style="width:110px" id="ccorrente18" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><em>Familiar:</em></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Nome:
      <input name="fm5nome" type="text" class="fontetabela" style="width:340px" id="fm5nome" />
      Endereço:
      <input name="fm5endereco" type="text" class="fontetabela" style="width:240px" id="fm5endereco" />
      Bairro:
      <input name="fm5bairro" type="text" class="fontetabela" id="ccorrente19" style="width:110px" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">
      Cidade:
      <input name="fm5cidade" type="text" class="fontetabela" style="width:260px" id="ccorrente20" />
      UF:
      <select class="fontetabela" 
                              name="fm5estado" id="fm5estado">
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
       <input name="fm5cep" type="text" class="fontetabela" style="width:90px" id="cep7" />
Telefone:
<input name="fm5telefone" type="text" class="fontetabela" style="width:90px" id="cep8" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>6 - Outras Rendas</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Especificar:
      <input name="6esp1" type="text" class="fontetabela" style="width:340px" id="6esp1" />
      Valor:
      <input name="6valor1" type="text" class="fontetabela" style="width:124px" id="6valor1" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Especificar:
      <input name="6esp2" type="text" class="fontetabela" style="width:340px" id="6esp2" />
      Valor:
      <input name="6valor2" type="text" class="fontetabela" style="width:124px" id="6valor2" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>7 - Veículos</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Marca:
      <input name="7marca1" type="text" class="fontetabela" style="width:200px" id="7marca1" />
      Modelo:
      <input name="7modelo1" type="text" class="fontetabela" style="width:139px" id="7modelo1" />
      Ano:
      <input name="7ano1" type="text" class="fontetabela" style="width:124px" id="7ano1" />
      Placa:
      <input name="7placa1" type="text" class="fontetabela" style="width:110px" id="7placa1" />
       Valor:
      <input name="7valor1" type="text" class="fontetabela" style="width:110px" id="7valor1" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Quitado:
      <input name="7quitado1" type="text" class="fontetabela" style="width:200px" id="7quitado1" />
      Nome do Credor:
      <input name="7credor1" type="text" class="fontetabela" style="width:139px" id="7credor1" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Marca:
      <input name="7marca2" type="text" class="fontetabela" style="width:200px" id="7marca2" />
      Modelo:
      <input name="7modelo2" type="text" class="fontetabela" style="width:139px" id="7modelo2" />
      Ano:
      <input name="7modelo2" type="text" class="fontetabela" style="width:124px" id="7modelo2" />
      Placa:
      <input name="7placa2" type="text" class="fontetabela" style="width:110px" id="7placa2" />
      Valor:
      <input name="7valor2" type="text" class="fontetabela" style="width:110px" id="oexpedidor6" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Quitado:
      <input name="7quitado2" type="text" class="fontetabela" style="width:200px" id="7quitado2" />
      Nome do Credor:
      <input name="7credor2" type="text" class="fontetabela" style="width:139px" id="7credor2" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela"><strong>8 - Proposta de Negócio</strong></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td class="fontetabela">Tipo de Financiamento:
      <select name="8financiamento" class="fontetabela" id="8financiamento">
        <option value="Financiamento">Financiamento</option>
        <option value="Refinanciamento">Refinanciamento</option>
      </select>
Produto:
<input name="8produto" type="text" class="fontetabela" style="width:410px" id="8produto" />
Marca:
<input name="8marca" type="text" class="fontetabela" style="width:240px" id="8marca" /></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela"> Modelo:
        <input name="8modelo" type="text" class="fontetabela" style="width:281px" id="8modelo" />
    
      Ano (Mod.):
      <input name="8anomod" type="text" class="fontetabela" style="width:80px" id="8anomod" />
    
      Ano (Fabr.):
      <input name="8anofab" type="text" class="fontetabela" style="width:80px" id="8anofab" />
    
      Combustível:
      <input name="8combustivel" type="text" class="fontetabela" style="width:100px" id="8combustivel" />
    
      Renavam:
      <input name="8renavam" type="text" class="fontetabela" style="width:104px" id="8renavam" />
    </span></td>
    </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">Placa:
        <input name="8placa" type="text" class="fontetabela" style="width:122px" id="oexpedidor7" />
    </span><span class="fontetabela">Valor da Compra:
    <input name="8compra" type="text" class="fontetabela" style="width:68px" id="oexpedidor8" />
    Valor da Entrada:
    <input name="8entrada" type="text" class="fontetabela" style="width:68px" id="oexpedidor9" />
    
      % Entrada:
      <input name="8porentrada" type="text" class="fontetabela" style="width:68px" id="oexpedidor10" />
    Taxa:
      <input name="8taxa" type="text" class="fontetabela" style="width:68px" id="oexpedidor11" />
    
    Valor Liberado:
    <input name="8liberado" type="text" class="fontetabela" style="width:68px" id="oexpedidor12" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela">Valor da TAC:
        <input name="8tac" type="text" class="fontetabela" style="width:68px" id="oexpedidor13" />
    Retorno:
    <input name="8retorno" type="text" class="fontetabela" style="width:105px" id="oexpedidor14" />
    Valor a Financiar:
    <input name="8financiar" type="text" class="fontetabela" style="width:68px" id="oexpedidor15" />
    Fator:
    <input name="8fator" type="text" class="fontetabela" style="width:68px" id="oexpedidor16" />
    Carência / Dias:
    <input name="8carencia" type="text" class="fontetabela" style="width:68px" id="oexpedidor17" />
    Nº Prestações:
    <input name="8prestacoes" type="text" class="fontetabela" style="width:68px" id="oexpedidor18" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td><span class="fontetabela"> Valor da Prestação:
        <input name="8vprestacao" type="text" class="fontetabela" style="width:68px" id="oexpedidor19" />
    
    1º Vencimento:
    <input name="8vencimento" type="text" class="fontetabela" style="width:68px" id="oexpedidor20" />
    Forma de Pagamento:
        <input name="8fpagamento" type="text" class="fontetabela" style="width:156px" id="8fpagamento" />
        <input class="fontetabela" type="submit" value="EFETUAR O CADASTRO DO FORMULÁRIO" name="submit" style="width:285px" />
    </span></td>
  </tr>
</table>
<table width="980" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>