<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
function controlepalavrao($comentario){
$badword_array = file("palavrao.txt");
foreach($badword_array as $key=>$val)
{
$comentario = eregi_replace(trim($val),'[****]',$comentario);
}
return $comentario;
}
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

?>
