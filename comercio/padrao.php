<?
////
/// Variáveis base do sistema
$base['url']		= "http://www.gssom.com.br/comercio";		// Url padrão a ser usada
$base['url_segura']	= "http://www.gssom.com.br/comercio";		// Url segura a ser usada
$base['path']		= "/home/httpd/htdocs/gssomcbr/comercio";		// Path padrão
$base['nome']		= "PHP Brasilian Merchant by Lyma (sob Teste)";			// Nome padrão do site
////
/// Define os padrões do banco de dados
$dados['host']		= "mysql.gssom.com.br";	// Host do servidor de dados
$dados['usuario']		= "gssomcbr";		// Usuário de acesso ao servidor de dados
$dados['senha']		= "177210";		// Senha de acesso ao servidor de dados
$dados['banco']		= "gssomcbr";	// Banco de dados a utilizar
$dados['tipo_banco']	= "mysql";		// Define tipo do BD(mysql,postgresql)
////
/// Define os padrões do FTP
$ftp['host']	= "ftp.gssom.com.br";	// Host de acesso ao servidor FTP
$ftp['usuario']	= "gssomcbr";	// Usuário no FTP
$ftp['senha']	= "177210";		// Senha no FTP
$ftp['imagens']	= "/comercio/imagens";	// Diretório de imagens padrão(inclue as de upload)
$ftp['icones']	= "/comercio/icones";	// Diretório de ícones(tumbnails)
////
/// Enquete
$enquete['popup']		= "1"; //0-Não 1-Sim Padrão Sim // Ativa janelinha pop-up na enquete
$enquete['multipla']	= "1"; //0-Não 1-Sim Padrão Sim // Permite múltiplas enquetes
////
//// Diversos \\\\
///
/// Define os padrões de todas as paginações
// ADM - Quantidade de produtos por página
$qtde_p_p_p	= "10";
////
/// Define as cores do site (Prático né :D)
$barra	= "#0066cc";
$lado		= "#0066cc";
$cor_corpo	= "#FFFFFF";
$sub_barra	= "#0099cc";
$sub_corpo	= "#336699";
$borda 	= "#000000";
?>