
<html>

<head>
<title>Administração X-Album</title>
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
</head>
<?
// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]

include "acesso.php";
if ( $contagem == 1 ) {
  ?>
<frameset rows="125,*" framespacing="0" border="0" frameborder="0">
  <frame name="faixa" border=0 scrolling="no" noresize target="conteudo" src="logocima.htm">
  <frameset cols="161,*">
    <frame name="conteudo" target="principal" src="menu.php">
    <frame name="principal" src="principal.php">
  </frameset>
  <noframes>
  <body>

  <p>Esta página usa quadros mas seu navegador não aceita quadros.</p>

  </body>
  </noframes>
</frameset>
<?
  } else {
    echo "<font face='Verdana' size='1'>Você não está logado.<a href=index.php>Logar</a></font>";
   
}

// X-Album Desenvolvido por Brunoalencar.com
// Todos os Direitos Reservados ao Autor.
// Proibida a reprodução ou manipulação.
// [-http://www.brunoalencar.com-]
  ?>

</html>
