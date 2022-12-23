<?php
/**************************************************************************/
/* PHP-NUKE: Advanced Content Management System                           */
/* ============================================                           */
/*                                                                        */
/* This is the language module with all the system messages               */
/*                                                                        */
/* If you made a translation, please go to the site and send to me        */
/* the translated file. Please keep the original text order by modules,   */
/* and just one message per line, also double check your translation!     */
/*                                                                        */
/* You need to change the second quoted phrase, not the capital one!      */
/*                                                                        */
/* If you need to use double quotes (") remember to add a backslash (\),  */
/* so your entry will look like: This is \"double quoted\" text.          */
/* And, if you use HTML code, please double check it.                     */
/**************************************************************************/

define("_LAN_01","Programa de Instala��o do PHP-Nuke ( Todas as vers�es )");
define("_LAN_02","Cortesia:");
define("_LAN_03","Introdu��o");
define("_LAN_04","Conex�o");
define("_LAN_05","Tabelas");
define("_LAN_06","Prefixos");
define("_LAN_07","Renomear Prefixo");
define("_LAN_08","Pronto");
define("_LAN_09","Essa ser� a chave do seu site, � muito importante que voc� altere-a, n�o deixando padr�o. <br />Pode usar qualquer coisa!!!");
define("_LAN_10","N�vel de Seguran�a, permite utilizar ou n�o o c�digo de seguran�a. <br />Recomendo: <b>N�vel 7</b>");
define("_LAN_11","Se voc� tem um site com subscri��es, coloque a url aqui para facilitar a indica��o do seu site! <br /><br />Vers�o: <b>7.1+</b>");
define("_LAN_12","Aqui voc� pode digitar as palavras que dever�o ser censuradas em seu site. <br /><br />Para digitar, siga o estilo dos exemplos. <br /><br />Lista separada por v�rgulas e as palavras dever�o estar entre aspas.");
define("_LAN_13","Aqui voc� pode informar as tags HTML's que ser�o permitidas no seu site. <br /><br />Para digitar, siga o estilo dos exemplos. <br /><br />Lista separada por v�rgulas. <br /><br />Recomendo deixar padr�o, ou seja, do jeito que est�.");
define("_LAN_14","Servidor MySQL no qual, o PHP-Nuke ir� conectar-se... Verifique no seu provedor de hospedagem, qual o nome do Servidor MySQL. <br />Padr�o: <b>localhost</b>");
define("_LAN_15","Nome do usu�rio que tem permiss�o para acessar o banco de dados no servidor MySQL. Crie o usu�rio, antes de continuar! <br />N�o � permitido o uso de espa�o ou caracteres especiais. Ex.: <b>voce_nuke</b>");
define("_LAN_16","Senha do usu�rio que tem permiss�o para acessar o banco de dados no servidor MySQL! <b>Recomendado:</b> Usar caracteres alfanum�ricos. <br />N�o � permitido o uso de espa�o. Ex.: <b>x6r#2p5</b>");
define("_LAN_17","Nome do banco de dados, no qual as tabelas do PHP-Nuke ser�o criadas. Dependendo do seu provedor, poder� ser necess�rio a cria��o do mesmo via Painel de Controle. <br />N�o � permitido o uso de espa�o ou caracteres especiais. Ex.: <b>voce_nuke</b>");
define("_LAN_18","Nome do arquivo que cont�m a estrutura e os dados das tabelas usadas pelo PHP-Nuke. O arquivo dever� estar no diretorio 'instalar/sql/' <br /> Ex.: <b>nuke.sql</b>");
define("_LAN_19","P�gina gerada em:");
define("_LAN_20","segundos");
define("_LAN_21","Por:");
define("_LAN_22","e");
define("_LAN_23","Este Instalador do PHP-Nuke � software livre lan�ado sob");
define("_LAN_24","licen�a GNU/GPL");
define("_LAN_25","�");
define("_LAN_26","de");
define("_LAN_27","Introdu��o");
define("_LAN_28","Bem-vindo ao programa de instala��o do PHP-Nuke.<br /><br />
Seguindo todos os passos corretamente, dentro de poucos minutos, seu PHP-Nuke estar� pronto para uso.<br />
Antes de prosseguir:<br /><br />
<li>D� permiss�o <b><font color=\"#FF0033\">666</font></b> para o arquivo config.php na ra�z do seu PHP-Nuke ( Somente servidores Linux );</li>
<li>Copie o arquivo <b>nuke.sql</b> que acompanha o pacote do seu PHP-Nuke para dentro do diret�rio <b>INSTALL</b>;</li>
<li>Obtenha os seguintes dados:</li><br /><br />
&nbsp;&nbsp;&nbsp;1- Nome ou IP do servidor MySQL ( Normalmente: <b><i>localhost</i></b> );<br />
&nbsp;&nbsp;&nbsp;2- Usu�rio que ter� acesso ao banco de dados;<br />
&nbsp;&nbsp;&nbsp;3- Senha do Usu�rio;<br />
&nbsp;&nbsp;&nbsp;4- Nome do banco de dados.<br /><br />
<b>Observa��es:</b> <li>Dependendo do seu servidor, antes de prosseguir, talvez seja necess�rio criar o usu�rio e o banco de dados 
atrav�s do Painel de Administra��o de sua conta.</li>
<li>Para atualiza��es do seu PHP-Nuke, utilize o arquivo upgrade correspondente a sua vers�o atual e que acompanha o pacote
de instala��o.</li>");
define("_LAN_29","Conex�o com o Banco de Dados");
define("_LAN_30","Preencha corretamente os seguintes dados:");
define("_LAN_31","Nome do Servidor:");
define("_LAN_32","Nome do Usu�rio:");
define("_LAN_33","Senha do Usu�rio:");
define("_LAN_34","Nome do Banco de Dados:");
define("_LAN_35","Nome do arquivo:");
define("_LAN_36","Prefixo para as tabelas");
define("_LAN_37","Prefixo para a tabelas dos usu�rios");
define("_LAN_38","ATEN��O");
define("_LAN_39","Clique apenas uma vez no bot�o <b>A V A N � A R</b> e aguarde at� que o processo termine, isso poder� levar alguns minutos, dependendo do tamanho do arquivo a ser processado.");
define("_LAN_40","Criando Tabelas");
define("_LAN_41","Erro na cria��o das tabelas<br /><br /><font color=\"red\"><b>Mensagem de erro do servidor:</b></font>");
define("_LAN_42","Tabelas criadas com sucesso!!!");
define("_LAN_43","Configurando ( CONFIG.PHP )");
define("_LAN_44","Preencha corretamente os seguintes dados: <br /><br /><b>Obs.: </b>O arquivo config.php dever� estar com permiss�o <b>666</b> e estar na ra�z do seu PHP-Nuke.");
define("_LAN_45","Chave do site: <i>(sitekey)</i>");
define("_LAN_46","ALTERAR_POR_QUEST�O_DE_SEGURAN�A");
define("_LAN_47","N�vel de Seguran�a: <i>(gfx_chk)</i>");
define("_LAN_48","Servidor DB:");
define("_LAN_49","N�vel");
define("_LAN_50","URL subscription (7.1+): <i>(subscription_url)</i>");
define("_LAN_51","Lista de Palavr�es:<br /><i>Informe conforme o exemplo</i>");
define("_LAN_52","Tags HTML permitidas:<br /><i>Informe conforme o exemplo</i>");
define("_LAN_53","Clique apenas uma vez no bot�o <b>A V A N � A R</b> e aguarde at� que o processo termine.");
define("_LAN_54","\"puta\", \"viado\", \"gay\"");
define("_LAN_55","Falha");
define("_LAN_56","Falha na hora de escrever o arquivo config.php<br /><br />
Poss�veis causas:
<li>O arquivo config.php n�o est� com permiss�o <b>666</b>;</li>
<li>O arquivo config.php n�o est� na ra�z do seu php-nuke;</li><br /><br />
Poss�veis solu��es:
<li>Atrav�s de um cliente FTP ( consulte o manual dele para saber como fazer ), d� permiss�o <b>666</b> para o arquivo config.php na ra�z do seu PHP-Nuke;</li>
<li>Envie o arquivo config.php para o servidor;</li><br /><br /><br />
<b><center>Volte e Tente Novamente</center></b>");
define("_LAN_57","Renomear os Prefixos");
define("_LAN_58","Essa � a �ltima etapa da instala��o!<br /><br />
Todos os prefixos das tabelas est�o sendo alterados para");
define("_LAN_59","<b>Script para renomear os prefixos das tabelas ( Cortesia )</b>");
define("_LAN_60","Traduzido por:");
define("_LAN_61","Implementa��es por:");
define("_LAN_62","Comunidade PHP-Nuke Brasil - CNB");
define("_LAN_63","Desenvolvido por:");
define("_LAN_64","<center><h3>A altera��o dos prefixos das tabelas do Banco de Dados ocorreu com <b>SUCESSO!</b></h3>
</center><br><br><br>
<b>Suas tabelas agora mudaram para:</b><br><br>");
define("_LAN_65","Pronto");
define("_LAN_66","O seu PHP-Nuke est� instalado e pronto para ser utilizado.<br /><br />
Para sua seguran�a, crie imediatamente o administrador ( Superusu�rio ), acessando a administra��o do site clicando no bot�o \"AVAN�AR\" logo abaixo.<br /><br />
N�o esque�a de voltar a permiss�o do arquivo config.php para <b>644</b><br /><br /><hr />
<center><b>Obrigado por utilizar o Instalador PHP-Nuke.</b><br /><br />N�o deixe de visitar o nosso site: <a href=\"http://www.xnuke.com.br\" target=\"_blank\">XPK_FENIX</a> e <a href=\"http://www.phpnuke.org.br\" target=\"_blank\">aleagi</a>!</center>");
define("_LAN_68","Servidor n�o selecionado.");
define("_LAN_69","Banco de dados n�o selecionado.");
define("_LAN_70","Arquivo SQL n�o existente: ");
define("_LAN_71","Selecione seu Idioma");
define("_LAN_72","Idioma");
define("_LAN_73","Informe o prefixo a ser utilizado pelas tabelas do PHP-Nuke. ( <b>N�o use o padr�o \"nuke\"</b> e nem caracteres especiais. )");
define("_LAN_74","Instala��o PHP-Nuke v1.3 por XPK_FENIX & Aleagi");
define("_LAN_75","ERRO");
define("_LAN_76","Verifique o Usu�rio, Nome do Banco de Dados e a Senha ( Digitadas e fornecidas pelo seu servidor ).");
define("_LAN_77","A V A N � A R");
define("_LAN_78","V O L T A R");
define("_LAN_79","altere");

define("_LAN_80","Localiza��o");
define("_LAN_81","Ajuda Online");
?>