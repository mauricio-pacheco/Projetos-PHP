<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

$nome = $_POST["nome"];
$email = $_POST["email"];
$cidade = $_POST["cidade"];
$login = $_POST["login"];
$senha = $_POST["senha"];
$conheceu = $_POST["conheceu"];
$userdb = $_POST["userdb"];
$senhadb = $_POST["senhadb"];
$bancodados = $_POST["bancodados"];
$tabela = $_POST["tabela"];
$tabela22 = $_POST["tabela2"];
$tabela33 = $_POST["tabela3"];
$localdb = "localhost";
$data = date("d/m/Y");
echo "<font face='Verdana' size='1'>Olá ".$nome.", o x-album está se instalando... Aguarde...<Br></font>";
if(fopen("testandochmod.php", "r+")) {
Print ("<font face='Verdana' size='1' color='#669900'>Etapa 1 Concluido - Testando se Foi efetuado o chmod pelo ftp na pasta raiz e no arquivo testandochmod.php no mesmo.<BR></font>");
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 1 <B>NÃO</b> Concluido- Testando se Foi efetuado o chmod pelo ftp<br><Br><br></font>");
print ("<b>ATENÇÃO, NÃO FOI ENCONTRADO CHMOD NA PASTA RAIZ DO SCRIPT ou NO TESTANDOCHMOD.PHP QUE SE ENCONTRA NO MESMO</b><BR>");
print ("<b>FAVOR, DAR CHMOD VIA <b>FTP</B> NAS PASTAS RAIZ, NO ARQUIVO TESTANDOCHMOD.PHP QUE SE E ENCONTRA NO MESMO, NA PASTA FOTOS, E NO ARQUIVO TESTANDOCHMOD.PHP QUE SE ENCONTRA NA PASTA FOTOS COM O MODO 777 OU 0777 ONDE O SCRIPT SE ENCONTRA.</b><BR>");
print ("<b>APOS DISSO, RETORNE A INSTALAÇÃO</b><br>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
exit;
}
if(fopen("fotos/testandochmod.php", "r+")) {
Print ("<font face='Verdana' size='1' color='#669900'>Etapa 2 Concluido - Testando se Foi efetuado o chmod pelo ftp na pasta fotos e no arquivo testandochmod.php onde se encontra no mesmo.<BR></font>");
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 2 <B>NÃO</b> Concluido - Testando se Foi efetuado o chmod pelo ftp na pasta fotos e no arquivo testandochmod.php onde se encontra no mesmo.<BR>");
print ("<b>ATENÇÃO, NÃO FOI ENCONTRADO CHMOD NA PASTA FOTOS ou NO TESTANDOCHMOD.PHP QUE SE ENCONTRA NO MESMO</b><BR>");
print ("<b>FAVOR, DAR CHMOD VIA <b>FTP</B> NA PASTA FOTOS, E NO ARQUIVO TESTANDOCHMOD.PHP QUE SE ENCONTRA NA PASTA NO MESMO COM O MODO 777 OU 0777 ONDE O SCRIPT SE ENCONTRA.</b><BR>");
print ("<b>APOS DISSO, RETORNE A INSTALAÇÃO</b><br>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
exit;
}
if(fopen("admin/testandochmod.php", "r+")) {
Print ("<font face='Verdana' size='1' color='#669900'>Etapa 2 Concluido - Testando se Foi efetuado o chmod pelo ftp na pasta admin e no arquivo testandochmod.php onde se encontra no mesmo.<BR></font>");
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 2 <B>NÃO</b> Concluido - Testando se Foi efetuado o chmod pelo ftp na pasta fotos e no arquivo testandochmod.php onde se encontra no mesmo.<BR>");
print ("<b>ATENÇÃO, NÃO FOI ENCONTRADO CHMOD NA PASTA ADMIN ou NO TESTANDOCHMOD.PHP QUE SE ENCONTRA NO MESMO</b><BR>");
print ("<b>FAVOR, DAR CHMOD VIA <b>FTP</B> NA PASTA ADMIN, E NO ARQUIVO TESTANDOCHMOD.PHP QUE SE ENCONTRA NA PASTA NO MESMO COM O MODO 777 OU 0777 ONDE O SCRIPT SE ENCONTRA.</b><BR>");
print ("<b>APOS DISSO, RETORNE A INSTALAÇÃO</b><br>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
exit;
}

$db = mysql_connect ($localdb,$userdb,$senhadb) or die ('Não conectou ao Banco de Dados por causa: ' . mysql_error());
if (@mysql_select_db ($bancodados)) {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 3 Concluido - Selecionando Banco de Dados<br></font>");
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 3 Não Concluida - Selecionando Database<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
exit;
}
$criatabela = "CREATE TABLE `".$tabela."` (`id` SMALLINT( 6 ) NOT NULL AUTO_INCREMENT ,`nome` VARCHAR( 200 ) NOT NULL ,`login` VARCHAR( 200 ) NOT NULL ,`senha` VARCHAR( 200 ) NOT NULL ,`larguraimg` VARCHAR( 200 ) NOT NULL ,`alturaimg` VARCHAR( 200 ) NOT NULL ,`tamanhoimg` VARCHAR( 200 ) NOT NULL ,`corfundo` VARCHAR( 200 ) NOT NULL ,`cortitulofotos` VARCHAR( 200 ) NOT NULL ,`cordata` VARCHAR( 200 ) NOT NULL ,`corcomentario` VARCHAR( 200 ) NOT NULL ,`emotion` VARCHAR( 200 ) NOT NULL ,`controlepalavrao` VARCHAR( 200 ) NOT NULL ,`corcomentariopub` VARCHAR( 200 ) NOT NULL ,`comentario` VARCHAR( 200 ) NOT NULL ,`ampliar` VARCHAR( 200 ) NOT NULL ,PRIMARY KEY ( `id` ))";
if(!@mysql_query($criatabela,$db)){
print ("<font face='Verdana' size='1' color='#669900'>Etapa 4 Não Concluida - Criando Tabela!<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 4 Concluida - Criando Tabela<br></font>");
}
$criatabela2 = "CREATE TABLE `".$tabela22."` ( `id` SMALLINT( 6 ) NOT NULL AUTO_INCREMENT ,`fototitulo` VARCHAR( 220 ) NOT NULL ,`data` VARCHAR( 220 ) NOT NULL ,`fotolink` VARCHAR( 220 ) NOT NULL ,`comentario` TEXT NOT NULL ,PRIMARY KEY ( `id` ))";
if(!@mysql_query($criatabela2,$db)){
print ("<font face='Verdana' size='1' color='#669900'>Etapa 5 Não Concluida - Criando Tabela Foto!<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
@mysql_query("DROP TABLE $tabela");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 5 Concluida - Criando Tabela Foto<br></font>");
}
$criatabela3 = "CREATE TABLE `".$tabela33."` ( `id` SMALLINT( 6 ) NOT NULL AUTO_INCREMENT ,`idcoments` VARCHAR( 220 ) NOT NULL ,`data` VARCHAR( 220 ) NOT NULL ,`nome` VARCHAR( 220 ) NOT NULL ,`email` VARCHAR( 220 ) NOT NULL ,`site` VARCHAR( 220 ) NOT NULL ,`comentario` TEXT NOT NULL ,PRIMARY KEY ( `id` ))";
if(!@mysql_query($criatabela3,$db)){
print ("<font face='Verdana' size='1' color='#669900'>Etapa 5 Não Concluida - Criando Tabela Foto!<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
@mysql_query("DROP TABLE $tabela");
@mysql_query("DROP TABLE $tabela22");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 5 Concluida - Criando Tabela Foto<br></font>");
}

$inserttabela = "INSERT INTO ".$tabela." (nome,login,senha,larguraimg,alturaimg,tamanhoimg,corfundo,cortitulofotos,cordata,corcomentario,emotion,controlepalavrao,corcomentariopub,comentario,ampliar) VALUES('$nome','$login','$senha','500','373','409600','f5f5f5','000000','000000','000000','Ativo','Ativo','000000','Ativo','Ativo')";
if(!@mysql_query($inserttabela,$db)) {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 6 Não Concluido - Adicionando Conteúdo a Tabela!<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
@mysql_query("DROP TABLE $tabela");
@mysql_query("DROP TABLE $tabela22");
@mysql_query("DROP TABLE $tabela33");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 6 Concluida - Adicionando Conteúdo a Tabela!<br></font>");
}

$dbsome = '$db3';
$tabelasome = '$tabela2';
$tabelasome2 = '$tabela3';
$tabelasome3 = '$tabelacoments';
$somecontent = "<? ".$dbsome." = mysql_connect ('".$localdb."','".$userdb."','".$senhadb."') or die ('Não conectou ao Banco de Dados por causa: ' . mysql_error()); mysql_select_db ('".$bancodados."'); ".$tabelasome." = '".$tabela."'; ".$tabelasome2." = '".$tabela22."'; ".$tabelasome3." = '".$tabela33."'; ?>";
if(!$handle = @fopen("config.php", "w")) {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 Não Concluido - Abrindo config.php<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
@mysql_query("DROP TABLE $tabela");
@mysql_query("DROP TABLE $tabela22");
@mysql_query("DROP TABLE $tabela33");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 Concluido - Abrindo config.php<br></font>");
}
if (!@fwrite($handle, $somecontent)) {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 8 Não Concluido - Escrevendo no config.php<br><br>Arrume e retorne a instalação.</font>");
print ("<B><U>MESMO ASSIM O ERRO AINDA CONTINUA, FAVOR REPORTAR O ERRO: <a href='http://www.brunoalencar.com/xalbum'>http://www.brunoalencar.com/xalbum</a>. OBRIGADO<br>");
@mysql_query("DROP TABLE $tabela");
@mysql_query("DROP TABLE $tabela22");
@mysql_query("DROP TABLE $tabela33");
exit;
} else {
print ("<font face='Verdana' size='1' color='#669900'>Etapa 8 Concluido - Escrevendo no config.php<br></font>");
}

echo "<font face='Verdana' size='1'>Script instalado com sucesso!<Br></font>";
echo "<font face='Verdana' size='1'>ATENÇÃO, SE TODAS AS ETAPAS CONCLUIRAM, DELETE O ARQUIVO INSTALAR.PHP DO SERVIDOR POR MEDIDAS DE SEGURANÇA<br></font>";
echo "<font face='Verdana' size='1' color='#669900'><a href='admin/'>Ir ao painel de Controle</a><br></font>";
echo "<br><br><p align='center' style='word-spacing: 0; margin-top: 0; margin-bottom: 0'><font face='Verdana' size='1'>X-Album desenvolvido por Brunoalencar.com</font></p><p align='center' style='word-spacing: 0; margin-top: 0; margin-bottom: 0'><font face='Verdana' size='1'>Todos os direitos reservados ao autor</font></p><Br><br>";
echo "<iframe name='contadorinstalar' src='http://www.brunoalencar.com/xalbum/index.php?acao=instalou&data=$data&nome=$nome&conheceu=$conheceu&cidade=$cidade&email=$email' borderframe='0' frameborder='0' width='1' height='1'></iframe>";
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

?>

<script>
alert("ATENÇÃO\n______________________________\nCaso sua instalação seja concluida totalmente, você deve deletar o arquivo instalar.php pra que outros não Re-instale o Script. Obrigado.")
</script>
