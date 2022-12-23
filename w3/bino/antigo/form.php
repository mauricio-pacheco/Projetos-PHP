<?
if ($email != "" and $destinatario != "")
{
  $cabecalho = "From: $email\nReply-To: $email";
  $corpo .= "Nome = $nome .\n";
  $corpo .= "Email = $email .\n";
  $corpo .= "Mensagem = $mensagem .\n\n";
  $corpo .= "**********************************************";
  mail($destinatario, $assunto, $corpo, $cabecalho);
  echo ("&enviado=ok&");
}
?>