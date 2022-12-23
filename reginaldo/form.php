<?
if ($email != "" and $destinatario != "")
{
  $cabecalho = "From: $email\nReply-To: $email";
  $corpo .="\n\n**********************************************\n";
  $corpo .= "Formulário de Contato do Site da ACVAN.\n";
  $corpo .= "**********************************************\n\n";
  $corpo .= "Nome = $nome .\n";
  $corpo .= "Email = $email .\n";
  $corpo .= "Mensagem = $mensagem .";
  $corpo .="\n\n**********************************************\n";
  $corpo .= "Formulário de Contato do Site da ACVAN.\n";
  $corpo .= "**********************************************";
  mail($destinatario, $assunto, $corpo, $cabecalho);
  echo ("&enviado=ok&");
}
?>