$assunto = "'+1 X-Album'";
$msg = "<font face='Verdana' size='1' color='#669900'>Meu nome � ".$nome.", meu e-mail � ".$email.", moro em ".$cidade." e acabei de intalar o X-Album Vers�o 1.0 de sua autoria que conhe�i atrav�s de ".$conheceu.".</font>";
if (@mail("brunowd@brunoalencar.com", $assunto, $msg)) {
    print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 Concluido - Controle de Usu�rios instalando o Script!<br></font>");
} else {
    print ("<font face='Verdana' size='1' color='#669900'>Etapa 7 N�o Concluido - Controle de Usu�rios instalando o Script<br></font>");
exit;
}
