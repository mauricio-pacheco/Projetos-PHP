<?


////
/// Vari�veis base do sistema
$base['url']                = "http://localhost/comercio";                // Url padr�o a ser usada
$base['url_segura']        = "http://localhost/comercio";                // Url segura a ser usada
$base['path']                = "e:\\phpdev\\www\\comercio";                // Path padr�o
$base['nome']                = "Vitrola";                        // Nome padr�o do site
////
/// Define os padr�es do banco de dados
$dados['host']                = "localhost";        // Host do servidor de dados
$dados['usuario']        = "root";                // Usu�rio de acesso ao servidor de dados
$dados['senha']                = "123";                // Senha de acesso ao servidor de dados
$dados['banco']                = "comercio";        // Banco de dados a utilizar
$dados['tipo_banco']        = "mysql";                // Define tipo do BD(mysql,postgresql)
////
/// Define os padr�es do FTP
$ftp['host']        = 'localhost';        // NOME do Host de acesso ao servidor FTP
$ftp['usuario']        = 'comercio';        // Usu�rio no FTP
$ftp['senha']        = '123456';                // Senha no FTP
$ftp['imagens']        = '/comercio/imagens';        // Diret�rio de imagens padr�o(inclue as de upload)
$ftp['icones']        = '/comercio/icones';        // Diret�rio de �cones(tumbnails)
////
/// Define usuario e senha do administrador do site. Muito cuidado ao
/// definir esta senha pois a seguran�a do site depende dela.

$site['admin'] = "admin";
$site['senha'] = "12345";
////
/// Enquete
$enquete['popup']                = "1"; //0-N�o 1-Sim Padr�o Sim // Ativa janelinha pop-up na enquete
$enquete['multipla']        = "1"; //0-N�o 1-Sim Padr�o Sim // Permite m�ltiplas enquetes
////
//// Diversos \\\\
///
/// Define os padr�es de todas as pagina��es
// ADM - Quantidade de produtos por p�gina
$qtde_p_p_p        = "10";
$frete_motoboy     = '999'; // valor do frete via Motoboy
////
/// Define as cores do site (Pr�tico n� :D)
$barra        = "#0066cc";
$lado                = "#0066cc";
$cor_corpo        = "#FFFFFF";
$sub_barra        = "#0099cc";
$sub_corpo        = "#336699";
$borda         = "#000000";
?>