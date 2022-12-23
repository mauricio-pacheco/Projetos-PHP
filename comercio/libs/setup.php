<?
////////////////////////////////////////////////////////////
// Arquivo de Setup do PHPLojaFacil                  
// Autor: Lyma (phplojafacil@lymas.com.br)
// Data: 17/09/2003
// Testado com PHP 4.2.3
// Maiores informações veja o arquivo /docs/leiame.txt
////////////////////////////////////////////////////////////


echo'<HTML>
<HEAD>
<META NAME="Generator" CONTENT="www.lymas.com.br">
<TITLE>Setup do PHPLojaFácil</TITLE>
<style type=\'text/css\'>
a:link    { text-decoration:none; color:black; }
a:visited { text-decoration:none; color:#333333; }
a:hover   { text-decoration:underline; color:#333333; }
.drop     {font-family: arial, helvetica, geneva, sans-serif; color: #ff0000}
body,td,pre {
  color: black;
  font-family: Verdana;
  font-size: x-small;
  background-color: #eeeee0;
}
H5 {
  background-color: #dddddd;
  font-weight: bold;
}
.submit {
  background-color: #dddddd;
}
INPUT
	{
    BORDER-RIGHT: #ff3300 1px solid;
	BORDER-TOP: #ff3300 1px solid;
	FONT-SIZE: 10pt;
	MARGIN: 1px;
	BORDER-LEFT: #ff3300 1px solid;
	COLOR: #003300;
	BORDER-BOTTOM: #ff3300 1px solid;
	BACKGROUND-COLOR: transparent
 
	}

FORM {
    BACKGROUND-COLOR: transparent
	}

TEXTAREA
	{
	BORDER-RIGHT: #ff3300 1px solid;
	BORDER-TOP: #ff3300 1px solid;
	FONT-SIZE: 10pt;
	MARGIN: 1px;
	BORDER-LEFT: #ff3300 1px solid;
	COLOR: #000000;
	BORDER-BOTTOM: #ff3300 1px solid;
	BACKGROUND-COLOR: transparent
	}
</style>
</HEAD>
<BODY>';
if ($lyma){exit;}

// checa se existem os arquivos padrao.php e default.php na pasta do script...
checa_arquivos();

//ver se o form estah sendo postado:
if ($HTTP_POST_VARS['grava']) {
    grava();
    exit;
}

if ($HTTP_POST_VARS['controle']) {
   /* aqui iremos fazer a validaçao, confirmação e gravação*/


   //testamos se o script já foi configurado antes:
   include "padrao.php";
   if ($lyma) {
       echo "<p><b>Alteracoes nao realizadas!<br>Configuracoes bloqueadas... verifique seus arquivos de configuracao!</b></p>";
       rodape();
       exit;
       } else {
           //grava o arquivo, criando backup antes do padrao.php
       echo "<strong>Verifique os dados abaixo e confirme.</strong><br>
            (para alterar os dados, clique no botao VOLTAR de seu navegador)";
       tmp_file();
           
       }

} else {


  form_entrada();


}

Function section_break() { return "\n\n"; }

Function comment_string( $comment ) {
   return '/* ' . $comment . ' */' . "\n";
}

Function set_val( $val_name, $value , $comment = '' ) {
   $val_string = $val_name;
   for( $i = strlen( $val_name ); $i < 23; $i++ ) {
      $val_string .= ' ';
   }
   $val_string .= ' = ';

   if ( is_string( $value ) && $value != 'true' && $value != 'false' ) { 
   $val_string .= '"' . $value . '";' . " " ;
   } else {
   $val_string .= $value . ';' . " " ;
   }

   if ( $comment  != '' ) {
      for( $i = strlen( $comment ) ; $i < 15; $i++ ) {
         $val_string .= ' ';
      }
      // $val_string .= '/* ' . $comment . ' */';
      $val_string .= '// ' . $comment . "\n";
   }

   return $val_string;
}


Function create_padrao_php() {
   global $default, $HTTP_POST_VARS;

   $output = '';
   $output .= '<?php' . "\n";
   $output .= comment_string( 'file: padrao.php' );
   $output .= comment_string( 'Criado via setup.php by Lyma < lyma@lymas.com.br >' );
   $output .= section_break();

   $output .= comment_string( 'Variáveis base do sistema:' );
   $output .= set_val( '$base[\'url\']', $HTTP_POST_VARS['fbase_url'], 'Url completa da Loja' );
   $output .= set_val( '$base[\'url_segura\']', $HTTP_POST_VARS['fbase_url_segura'], 'Url segura para a Loja' );
   $output .= set_val( '$base[\'path\']', $HTTP_POST_VARS['fbase_path'], 'Caminho completo do script' );
   $output .= set_val( '$base[\'nome\']', $HTTP_POST_VARS['fbase_nome'], 'Nome da Loja' );
   $output .= section_break();

   $output .= comment_string( 'Define os padrões do banco de dados:' );
   $link = @mysql_connect($HTTP_POST_VARS['fdados_host'],$HTTP_POST_VARS['fdados_usuario'],$HTTP_POST_VARS['fdados_senha']);
   $banco = @mysql_select_db($HTTP_POST_VARS['fdados_banco']) ;
   if(!$link || !$banco){
             print "<br><strong>Erro nos dados para acessar o Mysql (banco de dados). Verifique o servidor/usuario/senha/banco...</strong><br>";
			 echo "<p> variaveis:<br> link:" . $link . "<br> banco: " . $banco ;
			 echo 
			 "<br>Host: ". $HTTP_POST_VARS['fdados_host'].
			 "<br> Usuario: ".$HTTP_POST_VARS['fdados_usuario'].
			 "<br> Senha: ".$HTTP_POST_VARS['fdados_senha']."<br> ";
             rodape();
             exit;
             }
   mysql_close($link);
			 
   $output .= set_val( '$dados[\'host\']', $HTTP_POST_VARS['fdados_host'], 'Host do servidor de dados' );
   $output .= set_val( '$dados[\'usuario\']', $HTTP_POST_VARS['fdados_usuario'], 'Usuário de acesso ao servidor de dados' );
   $output .= set_val( '$dados[\'senha\']', $HTTP_POST_VARS['fdados_senha'], 'Senha de acesso ao servidor de dados' );
   $output .= set_val( '$dados[\'banco\']', $HTTP_POST_VARS['fdados_banco'], 'Banco de dados a utilizar' );
   $output .= set_val( '$dados[\'tipo_banco\']', 'mysql', 'Define tipo do BD(mysql,postgresql)' );
   $output .= section_break();

   $output .= comment_string( 'Define os padrões do FTP:' );
   $output .= set_val( '$ftp[\'host\']', $HTTP_POST_VARS['fftp_host'], 'Host do servidor de FTP' );
   $output .= set_val( '$ftp[\'usuario\']', $HTTP_POST_VARS['fftp_usuario'], 'Usuário de acesso ao servidor de FTP' );
   $output .= set_val( '$ftp[\'senha\']', $HTTP_POST_VARS['fftp_senha'], 'Senha de acesso ao servidor de FTP' );
   $output .= set_val( '$ftp[\'imagens\']', $HTTP_POST_VARS['fftp_imagens'], 'Diretório de imagens padrão(inclui as de upload)' );
   $output .= set_val( '$ftp[\'icones\']', $HTTP_POST_VARS['fftp_icones'], 'Diretório de ícones(tumbnails)' );
   $output .= section_break();

   $output .= comment_string( 'Define usuario e senha do administrador do site. Muito cuidado ao definir esta senha pois a segurança do site depende dela.:' );
   if ($HTTP_POST_VARS['fsite_senha'] == "12345" || $HTTP_POST_VARS['fsite_senha'] == "" ) {
       echo '<br><strong>A senha do administrador DEVE ser alterada... abortando configuração...</strong><br>
             Evite manter o usuário padrao (admin) tambem.';
       rodape();
       exit;
   }
   $output .= set_val( '$site[\'admin\']', $HTTP_POST_VARS['fsite_admin'], 'Usuário administrador-Deus' );
   $output .= set_val( '$site[\'senha\']', $HTTP_POST_VARS['fsite_senha'], 'Senha do administrador (evite senhas faceis)' );
   $output .= section_break();

   $output .= comment_string( 'Define opcoes da enquete. (experimental).:' );
   $output .= set_val( '$enquete[\'popup\']', '1', '0-Não 1-Sim (Padrão Sim) Ativa janelinha pop-up na enquete' );
   $output .= set_val( '$enquete[\'multipla\']', '1', '0-Não 1-Sim (Padrão Sim) Permite múltiplas enquetes' );
   $output .= section_break();

   $output .= comment_string( 'Diversos:' );
   
   $output .= comment_string( 'Define os padrões de todas as paginações:' );
   $output .= set_val( '$qtde_p_p_p', $HTTP_POST_VARS['fqtde_p_p_p'], 'Quantidade de produtos por pagina.' );
   $output .= comment_string( 'Valor do frete via motoboy:' );
   $output .= set_val( '$frete_motoboy', $HTTP_POST_VARS['ffrete_motoboy'], 'Valor sem virgulas/pontos.' );
   $output .= section_break();
   $output .= section_break();
   
   $output .= comment_string( 'Define as cores do site (valores em RGB hexadecimal):' );
   $output .= set_val( '$barra', $HTTP_POST_VARS['fbarra'],'cores do site');
   $output .= set_val( '$lado', $HTTP_POST_VARS['flado'],'cores do site');
   $output .= set_val( '$cor_corpo', $HTTP_POST_VARS['fcor_corpo'],'cores do site');
   $output .= set_val( '$sub_barra', $HTTP_POST_VARS['fsub_barra'],'cores do site');
   $output .= set_val( '$sub_corpo', $HTTP_POST_VARS['fsub_corpo'],'cores do site');
   $output .= set_val( '$borda', $HTTP_POST_VARS['fborda'],'cores do site');
   $output .= section_break();
   
   $output .= comment_string( 'Para executar novamente o setup.php comente a linha abaixo:' );
   $output .= set_val( '$lyma', 'set ok', 'Visite www.lymas.com.br' );
   $output .= set_val( '$script', 'PHPLojaFacil', 'Visite www.lymas.com.br' );
   $output .= '?>' . "\n";
   return $output;
}

Function form_entrada() {
echo '<p>
<h2>Setup do PHPLojaFácil</h2>
</p><br>';
   $parser_version = phpversion();
	echo " Sua versão do PHP: ". $parser_version."<br>" ;
   if ($parser_version <= "4.1.0") { 
   		echo " Sua versão do PHP (". $parser_version . ") está desatualizada.<br> Verifique com seu administrador a possibilidade de atualizar para a última versão estável. (ver http://www.php.net)<br>";
      
	  }


print '<strong>Atencao!!!</strong> register_globals = ' . ini_get('register_globals') . "\n<br>";
if (!ini_get('register_globals')){
	print '<p class=drop><strong>Atencao!!!</strong> register_globals está <b>DESATIVADA</b>!!!!!<br>
	Como paliativo, tente criar em cada diretório do script um arquivo chamado ".htaccess" (com o ponto no início e sem as aspas, claro:) com o conteudo:<br>
	"php_flag register_globals on" (também sem as aspas!!!)</p>';
}
echo "O PhpLojaFacil precisa que a variável register_globals do seu arquivo php.ini esteja ativada.
     <br>Caso nao esteja verifique isto com seu administrador...<br><br>";
print '<strong>Atencao!!!</strong> Safe_mode = ' . ini_get('safe_mode') . "\n<br>";
echo 'Algumas funcionalidades do PHPLojaFacil podem se alterar quando o servidor
     <br>estah em modo seguro (safe_mode=1). Veja os manuais do PHP (em <a href="http://php.net">http://php.net</a>) para mais informacoes.<br>';


include "padrao.php";
if ($lyma) {
       echo "<p><b>Alteracoes nao realizadas!<br>Configuracoes bloqueadas... verifique seus arquivos de configuracao!</b></p>";
       rodape();
       exit;
       }

include "default.php";

echo '<form method="post" NAME="form_setup" action="'.$PHP_SELF.'">';
echo "<table border='0' align='center' cellspacing='0'>";
echo '<br>';
echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Vari&aacute;veis base do sistema:</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo 'Url completa da Loja:</td>';
echo '<td><input type="text" size=50 size=50 name="fbase_url" value="'.$base['url'].'">';
echo "</td></tr>";
echo "<tr><td>";
echo 'Url segura da Loja:</td><td>';
echo '<input type="text" size=50 name="fbase_url_segura" value="'.$base['url_segura'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Caminho completo do script:<br>
Exemplos:<br>
* Unix/Linux use: /home/httpd/www/comercio<br>
* Win32 use: e:\phpdev\www\comercio </td><td>';
echo '<input type="text" size=50 name="fbase_path" value="'.$base['path'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Nome da Loja:</td><td> ';
echo '<input type="text" size=50 name="fbase_nome" value="'.$base['nome'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "<tr><td colspan='2' align='center' class='title'>";
echo '<h5>Define os padrões do banco de dados:</h5>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Endereco do servidor Mysql:</td><td> ';
echo '<input type="text" size=50 name="fdados_host" value="'.$dados['host'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Usuario no banco de dados Mysql:</td><td> ';
echo '<input type="text" size=50 name="fdados_usuario" value="'.$dados['usuario'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Senha no banco de dados Mysql:</td><td> ';
echo '<input type="text" size=50 name="fdados_senha" value="'.$dados['senha'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Nome do banco de dados: (o banco informado já DEVE EXISTIR no servidor MySQL)<br> Para ajuda sobre como criar um banco de dados, consulte seu administrador.</td><td> ';
echo '<input type="text" size=50 name="fdados_banco" value="'.$dados['banco'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Tipo do BD (atualmente suporta somente Mysql):</td><td> ';
echo '<input type="text" size=50 name="fdados_tipo_banco" value="mysql" disabled ><br>';
echo "</td></tr>";
echo "<tr><td>";

echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Define os padrões do servidor FTP(breve em desuso):</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo 'Endereco do servidor FTP:</td><td> ';
echo '<input type="text" size=50 name="fftp_host" value="'.$ftp['host'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Usuario no FTP:</td><td> ';
echo '<input type="text" size=50 name="fftp_usuario" value="'.$ftp['usuario'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Senha no FTP:</td><td> ';
echo '<input type="text" size=50 name="fftp_senha" value="'.$ftp['senha'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Diretorio onde ficarao as imagens no FTP:<br>
Exemplos:<br>
* Unix/Linux use: /home/httpd/www/comercio/imagens<br>
* Win32 use: e:\phpdev\www\comercio\imagens </td><td>';
echo '<input type="text" size=50 name="fftp_imagens" value="'.$ftp['imagens'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Diretorio onde ficarao os icones (miniaturas) no FTP:<br>
Exemplos:<br>
* Unix/Linux use: /home/httpd/www/comercio/imagens<br>
* Win32 use: e:\phpdev\www\comercio\imagens </td><td>';
echo '<input type="text" size=50 name="fftp_icones" value="'.$ftp['icones'].'"><br>';
echo "</td></tr>";


echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Define usuario e senha do administrador do site. (Muito cuidado ao definir esta senha pois a segurança do site depende dela).:</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo 'Login do Administrador (altere este valor!):</td><td> ';
echo '<input type="text" size=50 name="fsite_admin" value="'.$site['admin'].'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Senha do Administrador (altere este valor OBRIGATORIAMENTE!!!):</td><td> ';
echo '<input type="text" size=50 name="fsite_senha" value="'.$site['senha'].'"><br>';
echo "</td></tr>";

echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Define opcoes da enquete. (experimental).:</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo 'Enquete em tela popup:</td><td> ';
echo '<input type="text" size=50 name="fenquete_popup" value="'.$enquete['popup'].'" disabled><br>';
echo "</td></tr>";
echo "<tr><td>";
echo 'Mais de uma enquete na pagina inicial:</td><td> ';
echo '<input type="text" size=50 name="fenquete_multipla" value="'.$enquete['multipla'].'" disabled><br>';
echo "</td></tr>";

echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Define opcoes genéricas do script:</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo "Quantidade de produtos por página: </td><td>";
echo '<input type="text" size=50 name="fqtde_p_p_p" value="'.$qtde_p_p_p.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Valor do frete via motoboy: (sem virgulas/pontos)</td><td> ";
echo '<input type="text" size=50 name="ffrete_motoboy" value="'.$frete_motoboy.'"><br>';
echo "</td></tr>";

echo "<tr><td colspan='2' align='center' class='title'>";
echo "<h5>Define as cores do site (experimental?):</h5>";
echo "</td></tr>";
echo "<tr><td>";
echo "Barra: </td><td>";
echo '<input type="text" size=50 name="fbarra" value="'.$barra.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Lado: </td><td>";
echo '<input type="text" size=50 name="flado" value="'.$lado.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Corpo: </td><td>";
echo '<input type="text" size=50 name="fcor_corpo" value="'.$cor_corpo.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Sub Barra: </td><td>";
echo '<input type="text" size=50 name="fsub_barra" value="'.$sub_barra.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Sub Corpo: </td><td>";
echo '<input type="text" size=50 name="fsub_corpo" value="'.$sub_corpo.'"><br>';
echo "</td></tr>";
echo "<tr><td>";
echo "Borda: </td><td>";
echo '<input type="text" size=50 name="fborda" value="'.$borda.'"><br>';
echo "</td></tr>";
echo '<br>';
echo '<br>';
echo '<input TYPE="hidden" NAME="controle" VALUE="1">';
echo "<tr><td></td><td class='title'>";
echo '<input type="submit" class="submit" value="Enviar">';
echo "</td></tr>";
echo "</table>";
echo '</form>';
rodape();
}



Function write_file() {
   $output = create_padrao_php();
   checa_arquivos();
   if (!copy('padrao.php', 'padrao.php.bkp')) {
       print ("<br>Erro ao copiar padrao.php para padrao.php.bkp...<br>\n Verifique as permissoes no diretorio origem/destino.<br>\n");
       rodape();
       exit;
       }

   $fh = fopen( 'padrao.php', 'w' );
   fwrite( $fh, $output, strlen( $output ) );
   fclose( $fh );
   echo "<br><strong>Alteracoes gravadas com sucesso no arquivo padrao.php</strong><br>";
   /* Alterando chmod do arquivo de configuracao*/
   /*
      -- NAO funciona se o server não for o dono do arquivo --
   $chmod_these = 
      Array(
         'padrao.php',
               );
   for( $i = 0 ; $i < count( $chmod_these ) ; $i++ ) {
      chmod ( './' . $chmod_these[ $i ], 0555 );
   }
   */
}


Function tmp_file() {
   global $output;
   $output = create_padrao_php();
   checa_arquivos();
   if (!copy('padrao.php', 'padrao.php.bkp')) {
       print ("<br>Erro ao copiar padrao.php para padrao.php.bkp...<br>\n Verifique as permissoes no diretorio origem/destino.<br>\n");
       rodape();
       exit;
       }
   $fh = fopen( 'padrao_tmp.php', 'w' );
   fwrite( $fh, $output, strlen( $output ) );
   fclose( $fh );
   confirma();
}

Function confirma() {
    //alterar aqui!!!
    global $output;
         echo '<textarea rows=20 cols=90 wrap="off">'. $output. '</textarea>';
         echo'    <form method="post" NAME="confirma_setup" action="'.$PHP_SELF.'">
                  <input TYPE="hidden" NAME="grava" VALUE="1">
                  <input type="submit" name="Confirmar class="submit" value="Confirmar">
                  </form>';
}
Function grava() {
   checa_arquivos();
   if (!copy('padrao_tmp.php', 'padrao.php')) {
       print ("<br>Erro ao copiar padrao.php...<br>\n Verifique as permissoes no diretorio origem/destino.<br>\n");
       rodape();
       exit;
       } else {
          echo "<br><strong>Alteracoes gravadas com sucesso no arquivo padrao.php</strong><br>";

          // ler o arquivo comercio.sql e executar as queries no BD informado, criando as tabelas...
          include "padrao.php";
		  $fcontents = file ('comercio.sql');
          
		  //tentando conectar ao servidor Mysql e selecionar o db;
          $link = @mysql_connect($dados['host'],$dados['usuario'],$dados['senha']) or die("Não pude conectar: " . mysql_error());
		  $banco = @mysql_select_db($dados['banco'])or die("Não pude selecionar o banco de dados ".$dados['banco']);

          // efetua as queryes
		  while ( $query = each ($fcontents)) {
              echo "<br><b>Executando Query: $query[1]</b><br> ";
			  $result = mysql_query($query[1]) or die("A query falhou: " . mysql_error());
              }
		  // fecha a conexao com o DB.
		  mysql_close($link);

          echo "<br><b>Dados de exemplo criados com sucesso.</b><br> ";
          if (!unlink('padrao_tmp.php')) {
              print ("<br>Erro ao apagar arquivo temporario padrao_tmp.php...<br>\n Apague-o manualmente.<br>\n");
              rodape();
              exit;
          }
          rodape();
          exit;
      }
}

Function checa_arquivos() {
//ver se arquivos existem... e se sao acessiveis.
if (
      ! file_exists( 'default.php' )
   || ! file_exists( 'padrao.php' ) || ! file_exists( 'comercio.sql' )
   ) { 
/*
NO Configuration file found.
*/
   echo( '<p>
   Um ou mais arquivos de configuração nao encontrados. (veja se existe o padrao.php, comercio.sql e o default.php)
   </p>' );
   rodape();
   exit;
   
} else if (
         ! is_writeable( 'default.php' )
      || ! is_writeable( 'padrao.php' )
      ) {
   echo( '<p>
   Arquivos de configuração (default.php e padrao.php) protegidos contra escrita. Verifique o chmod das pastas...
   </p>' );
   rodape();
   exit;
}
}

Function rodape() {
 echo '</BODY> </HTML>';
}

?>
