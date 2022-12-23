$assunto = "'+1 X-Album'";
$msg = "<font face='Verdana' size='1' color='#669900'>Meu nome é ".$nome.", meu e-mail é ".$email.", moro em ".$cidade." e acabei de intalar o X-Album Versão 1.0 de sua autoria que conheçi através de ".$conheceu.".</font>";
if (@mail("brunowd@brunoalencar.com", $assunto, $msg)) {
    print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 Concluido - Controle de Usuários instalando o Script!<br></font>");
} else {
    print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 Não Concluido - Controle de Usuários instalando o Script<br></font>");
exit;
}
