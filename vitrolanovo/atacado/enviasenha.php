<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Vitrola</title>
</head>

<body>

<?
include 'conecta.php';
include 'funcoes.php';
include 'funcoespedido.php';

$dt= date("d/m/Y");

$sql=  "SELECT NOME_CLI,
		EMAIL_CLI,
		SENHA_CLI
		FROM CLIENTE
	WHERE EMAIL_CLI= '$emailsenha';";
$rs= $conn->Execute($sql);
if ($rs->RecordCount()>0)
	{
	$NOME_CLI= $rs->fields[0];
	$EMAIL_CLI= $rs->fields[1];
	$SENHA_CLI= $rs->fields[2];
	
	$subject = "Sua Senha";
	$html = "
	<html>
		<title>Vitrola</title>
		<link href=../estilo.css rel=stylesheet type=text/css>
	<body>
	<table align=center width=600 border=0 style=border-color: black; border-style: solid; border-width:1; font-family: verdana; font-size:9;>
		<tr>
			<td align=center bgcolor=#003366>
			<font color=#FFFFFF face=verdana size=2>
			<b>Vitrola Comercial Fonografica LTDA</b><br>
			</font>
			</td>
		</tr>
	</table>
	<table align=center width=600 border=1 bordercolor=#000000 cellspacing=0>
		<tr>
			<td colspan=3 align=center bgcolor=#dadada>
			<font face=verdana size=2>
			Usuário e Senha
			</font>
			</td>
		</tr>
		<tr>
			<td colspan=3>
			<p align=justify>
			<font face=verdana size=1>
			A Vitrola disponibiliza apartir de agora mais um serviço para você, amigo cliente,
			visando melhorar cada vez mais o nosso atendimento.
			</p>
			<p align=justify>
			A nossa home page já está disponível para você acessar e conhecer as novidades, 
			fazendo seus pedidos diretos no atacado.
			</p>
			<p align=justify>
			Este usuário e senha que você está recebendo é exclusivo, somente para os clientes Vitrola.<br><br>
			Aguardamos a sua visita.<br>
			<a href=http://www.vitrolars.com.br>http://www.vitrolars.com.br</a>
			</p>
			</font>
			</td>
		</tr>
		<tr>
			<td colspan=3><font face=verdana size=1>Cliente</font><br>
			<strong><font face=verdana size=2>".$NOME_CLI."</font></strong></td>
		</tr>
		<tr>
			<td><font face=verdana size=1>Data</font><br>
			<font face=verdana size=2>".$dt."</font></td>			
			<td colspan=1><font face=verdana size=1>Seu Usuário</font><br>
			<font face=verdana size=2>".$EMAIL_CLI."</font></td>			
			<td colspan=1><font face=verdana size=1>Sua Senha</font><br>
			<font face=verdana size=2>".$SENHA_CLI."</font></td>			
		</tr>
		<tr>
			<td colspan=3><font face=verdana size=1>Observações:<br>
			- Não revele a sua senha para ninguém.<br>
			- Em caso de dúvidas, entre em contato pelo telefone (55) 3744-6878.
			</font></td>
		</tr>
	</table>
	</html>";

$to = $EMAIL_CLI;
$headers = "Content-type: text/html; charset=iso-8859-1\r\n";
$headers.= "From: Vitrola<vitrola@vitrola.com.br>\r\n";

if (mail($to, $subject, $html, $headers)) 
	{
	?>
	<script>
	alert("Sua senha foi enviada para o seu e-mail.");
	location.href='index.php';
	</script>
	<?
	} 
else
	{
	?>
	<script>
	alert("Ocorreu um erro no envio do e-mail com a senha.");
	location.href='index.php';
	</script>		
	<?
	}
	}
else
	{
	?>
	<script>
	alert("E-mail não cadastrado.");
	location.href='index.php';
	</script>		
	<?
	}
?>
</body>
</html>
