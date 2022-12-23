<?php
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
include "acesso.php";
if ( $contagem == 1 ) {
$comentario=str_replace(":)","<img src=\"img/smiley.gif\">",$comentario);
$comentario=str_replace(":bronca:","<img src=\"img/bronca.gif\">",$comentario);
$comentario=str_replace(":chopp:","<img src=\"img/chopp.gif\">",$comentario);
$comentario=str_replace(":~|","<img src=\"img/choro.gif\">",$comentario);
$comentario=str_replace("8D","<img src=\"img/cool.gif\">",$comentario);
$comentario=str_replace(":~(","<img src=\"img/cry.gif\">",$comentario);
$comentario=str_replace("$)","<img src=\"img/dindin.gif\">",$comentario);
$comentario=str_replace(":D","<img src=\"img/grin.gif\">",$comentario);
$comentario=str_replace(":*","<img src=\"img/kiss.gif\">",$comentario);
$comentario=str_replace(":*","<img src=\"img/lipsrsealed.gif\">",$comentario);
$comentario=str_replace(">(","<img src=\"img/nervoso.gif\">",$comentario);
$comentario=str_replace(":O","<img src=\"img/shocked.gif\">",$comentario);
$comentario=str_replace(":/","<img src=\"img/undecided.gif\">",$comentario);
$comentario=str_replace(";)","<img src=\"img/wink.gif\">",$comentario);
  } else {
echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php target=_parent>Logar</a></font>";
    include "button.php";
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

?>
