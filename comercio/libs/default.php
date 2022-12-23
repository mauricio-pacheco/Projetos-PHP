<?
////
/// Variáveis base do sistema
$base['url']                = "http://localhost/comercio";                // Url padrão a ser usada
$base['url_segura']        = "http://localhost/comercio";                // Url segura a ser usada
$base['path']                = "c:\\phpdev\\www\\comercio";                // Path padrão
$base['nome']                = "Lymas.com.br - Vendas On-line";                        // Nome padrão do site
////
/// Define os padrões do banco de dados
$dados['host']                = "localhost";        // Host do servidor de dados
$dados['usuario']        = "root";                // Usuário de acesso ao servidor de dados
$dados['senha']                = "";                // Senha de acesso ao servidor de dados
$dados['banco']                = "comercio";        // Banco de dados a utilizar
$dados['tipo_banco']        = "mysql";                // Define tipo do BD(mysql,etc)
////
/// Define os padrões do FTP
$ftp['host']        = 'localhost';        // NOME do Host de acesso ao servidor FTP
$ftp['usuario']        = 'comercio';        // Usuário no FTP
$ftp['senha']        = '123456';                // Senha no FTP
$ftp['imagens']        = '/phpdev/www/comercio/imagens';        // caminho completo para Diretório de imagens padrão(inclue as de upload)
$ftp['icones']        = '/phpdev/www/comercio/icones';        // caminho completo para Diretório de ícones(tumbnails)
////
/// Define usuario e senha do administrador do site. Muito cuidado ao
/// definir esta senha pois a segurança do site depende dela.

$site['admin'] = "admin";
$site['senha'] = "12345";
////
/// Enquete
$enquete['popup']                = "1"; //0-Não 1-Sim Padrão Sim // Ativa janelinha pop-up na enquete
$enquete['multipla']        = "1"; //0-Não 1-Sim Padrão Sim // Permite múltiplas enquetes
////
//// Diversos \\\\
///
/// Define os padrões de todas as paginações
// ADM - Quantidade de produtos por página
$qtde_p_p_p        = "10";

// Define valor do frete via Motoboy

$frete_motoboy     = '999'; // valor do frete via Motoboy

////
/// Define as cores do site (Prático né :D)

$barra        = "#0066cc";
$lado                = "#0066cc";
$cor_corpo        = "#FFFFFF";
$sub_barra        = "#0099cc";
$sub_corpo        = "#336699";
$borda         = "#000000";
?>
