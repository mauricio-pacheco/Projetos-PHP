<?php
/* file: padrao.php */
/* Criado via setup.php by Lyma < lyma@lymas.com.br > */


/* Variáveis base do sistema: */
$base['url']            = "http://localhost/comercio"; // Url completa da Loja
$base['url_segura']     = "http://localhost/comercio"; // Url segura para a Loja
$base['path']           = "c:\\phpdev\\www\\comercio"; // Caminho completo do script
$base['nome']           = "Lymas.com.br - Vendas On-line";    // Nome da Loja


/* Define os padrões do banco de dados: */
$dados['host']          = "localhost"; // Host do servidor de dados
$dados['usuario']       = "usuario"; // Usuário de acesso ao servidor de dados
$dados['senha']         = "123456"; // Senha de acesso ao servidor de dados
$dados['banco']         = "phplojafacil"; // Banco de dados a utilizar
$dados['tipo_banco']    = "mysql"; // Define tipo do BD(mysql,postgresql)


/* Define os padrões do FTP: */
$ftp['host']            = "localhost"; // Host do servidor de FTP
$ftp['usuario']         = "comercio"; // Usuário de acesso ao servidor de FTP
$ftp['senha']           = "123456"; // Senha de acesso ao servidor de FTP
$ftp['imagens']         = "/phpdev/www/comercio/imagens"; // Diretório de imagens padrão(inclui as de upload)
$ftp['icones']          = "/phpdev/www/comercio/icones"; // Diretório de ícones(tumbnails)


/* Define usuario e senha do administrador do site. Muito cuidado ao definir esta senha pois a segurança do site depende dela.: */
$site['admin']          = "admin"; // Usuário administrador-Deus
$site['senha']          = "123456"; // Senha do administrador (evite senhas faceis)


/* Define opcoes da enquete. (experimental).: */
$enquete['popup']       = "1"; // 0-Não 1-Sim (Padrão Sim) Ativa janelinha pop-up na enquete
$enquete['multipla']    = "1"; // 0-Não 1-Sim (Padrão Sim) Permite múltiplas enquetes


/* Diversos: */
/* Define os padrões de todas as paginações: */
$qtde_p_p_p             = "10"; // Quantidade de produtos por pagina.
/* Valor do frete via motoboy: */
$frete_motoboy          = "999"; // Valor sem virgulas/pontos.




/* Define as cores do site (valores em RGB hexadecimal): */
$barra                  = "#0066cc";   // cores do site
$lado                   = "#0066cc";   // cores do site
$cor_corpo              = "#FFFFFF";   // cores do site
$sub_barra              = "#0099cc";   // cores do site
$sub_corpo              = "#336699";   // cores do site
$borda                  = "#000000";   // cores do site


/* Para executar novamente o setup.php comente a linha abaixo: */
$script                 = "PHPLojaFacil"; // Visite www.lymas.com.br
?>
