<?
 $nome = $_POST['nome'];
 $cidade = $_POST['cidade'];
 $estado = $_POST['estado'];
 $cep = $_POST['cep'];
 $telefone = $_POST['telefone'];
 $endereco = $_POST['endereco'];
 $email = $_POST['email'];
 $mensagem = $_POST['mensagem'];

 $to = "mandry@casadaweb.net";
  
 $nome = "$nome";
 $cidade = "$cidade";
 $estado = "$estado";
 $cep = "$cep";
 $telefone = "$telefone";
 $endereco = "$endereco";
 $email = "$email";
 $mensagem = "$mensagem";

  mail($to, $nome, $cidade, $estado, $cep, $telefone, $endereco, $email, $mensagem "From: Contato do meu sitenReply-To: $emailn");

?>

<LINK href="../default3.css" type=text/css rel=STYLESHEET>
<html>
<head>
<title>Contatos</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" link="#000000" vlink="#000000" alink="#000000">
<p align="center">&nbsp;</p>
<p align="center"><img src="logomenor.jpg" width="120" height="136"> </p>
<p align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Formul&aacute;rio 
  enviado com sucesso!!!</strong></font></p>
<p align="center"><font color="#000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Agradecemos 
  pela sua opni&atilde;o!</strong></font></p>
<p align="center">&nbsp;</p>
<p> 
</body>
</html>
