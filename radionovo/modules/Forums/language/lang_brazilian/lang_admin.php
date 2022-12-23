<?php
/***************************************************************************
 *                          lang_admin.php [portuguese_br]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_admin.php,v 1.1.2.4 2002/11/13 23:28:53 psotfx Exp $
 *
 ****************************************************************************/

/****************************************************************************
 * Traduzido por:
 * JuniorZ rs_junior@hotmail.com || http://usuarios.lycos.es/suportephpbb
 ****************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/

//
// Modules, this replaces the keys used
// in the modules[][] arrays in each module file
//
$lang['General'] = 'Admin Geral';
$lang['Users'] = 'Admin Usu�rios';
$lang['Groups'] = 'Admin Grupos';
$lang['Forums'] = 'Admin F�runs';
$lang['Styles'] = 'Admin Estilos';

$lang['Configuration'] = 'Configura��o';
$lang['Permissions'] = 'Permiss�es';
$lang['Manage'] = 'Gerenciar';
$lang['Disallow'] = 'Nomes Proibidos';
$lang['Prune'] = 'Limpar';
$lang['Mass_Email'] = 'Email em Massa';
$lang['Ranks'] = 'Ranks';
$lang['Smilies'] = 'Smileys';
$lang['Ban_Management'] = 'Controle Expuls�es';
$lang['Word_Censor'] = 'Palavras Censuradas';
$lang['Export'] = 'Exportar';
$lang['Create_new'] = 'Criar';
$lang['Add_new'] = 'Adicionar';
$lang['Backup_DB'] = 'Backup BD';
$lang['Restore_DB'] = 'Restaurar BD';


//
// Index
//
$lang['Admin'] = 'Administra��o';
$lang['Not_admin'] = 'Voc� n�o tem autoriza��o para administrar o F�rum de Discuss�o';
$lang['Welcome_phpBB'] = 'Bem-vindo ao F�rum de Discuss�o';
$lang['Admin_intro'] = 'Esta �rea possibilita a visualiza��o global das estat�sticas dos seus f�runs. Voc� poder� voltar aqui clicando em <u>�ndice do Admin</u> no painel esquerdo. Para voltar ao �ndice global dos f�runs clique no logo phpBB. Os outros atalhos lhe d�o acesso aos diversos pain�is de controle dos f�runs, cada um possui instru��es de como us�-lo.';
$lang['Main_index'] = '�ndice do F�rum';
$lang['Forum_stats'] = 'Estat�sticas do F�rum';
$lang['Admin_Index'] = '�ndice do Admin';
$lang['Preview_forum'] = 'Prever F�rum';

$lang['Click_return_admin_index'] = 'Clique %sAqui%s para retornar ao �ndice do Admin';

$lang['Statistic'] = 'Estat�stica';
$lang['Value'] = 'Valor';
$lang['Number_posts'] = 'N�mero de Mensagens';
$lang['Posts_per_day'] = 'Mensagens / Dia';
$lang['Number_topics'] = 'N�mero de T�picos';
$lang['Topics_per_day'] = 'T�picos / Dia';
$lang['Number_users'] = 'N�mero de Usu�rios';
$lang['Users_per_day'] = 'Usu�rios / Dia';
$lang['Board_started'] = 'In�cio dos F�runs';
$lang['Avatar_dir_size'] = 'Pasta de Avatars';
$lang['Database_size'] = 'Tamanho do Banco de Dados';
$lang['Gzip_compression'] = 'Compress�o Gzip';
$lang['Not_available'] = 'N�o Dispon�vel';

$lang['ON'] = 'Habilitado'; // This is for GZip compression
$lang['OFF'] = 'Desabilitado';


//
// DB Utils
//
$lang['Database_Utilities'] = 'Utilit�rios do Banco de Dados (BD)';

$lang['Restore'] = 'Restaurar';
$lang['Backup'] = 'Backup';
$lang['Restore_explain'] = 'Isso executar� uma restaura��o completa de todas as tabelas do phpBB a partir de um arquivo salvo. Caso o seu servidor permita voc� poder� enviar um arquivo de texto compactado em Gzip e ele ser� descompactado automaticamente. <b>ATEN��O:</b> Esta opera��o sobrescrever� qualquer informa��o existente. Dependendo do tamanho de seu Banco de Dados este processo poder� levar algum tempo. N�o saia desta p�gina at� que o processo seja finalizado.';
$lang['Backup_explain'] = 'Aqui voc� pode fazer um backup de todos os dados relacionados ao seu phpBB. Se desejar copiar tabelas adicionais que estejam no Banco de Dados escreva na caixa de texto "Tabelas Adicionais" os nomes das tabelas separados por v�rgulas. Caso o seu servidor permita, voc� poder� compactar o arquivo em gzip de forma a reduzir o seu tamanho antes de copi�-lo.';

$lang['Backup_options'] = 'Op��es de Backup';
$lang['Start_backup'] = 'Iniciar o Backup';
$lang['Full_backup'] = 'Backup Total';
$lang['Structure_backup'] = 'Backup apenas da Estrutura';
$lang['Data_backup'] = 'Backup apenas dos Dados';
$lang['Additional_tables'] = 'Tabelas Adicionais';
$lang['Gzip_compress'] = 'Compactar arquivo com Gzip';
$lang['Select_file'] = 'Selecione um arquivo';
$lang['Start_Restore'] = 'Iniciar a Restaura��o';

$lang['Restore_success'] = 'O Banco de Dados foi restaurado com sucesso.<br/><br/>Os seus f�runs dever�o voltar agora ao estado em que se encontravam no momento em que foram copiados.';
$lang['Backup_download'] = 'A c�pia dever� iniciar em breve. Por favor, aguarde at� que comece.';
$lang['Backups_not_supported'] = 'O seu sistema de Banco de Dados n�o permite que o backup seja realizado';

$lang['Restore_Error_uploading'] = 'Erro ao enviar o arquivo';
$lang['Restore_Error_filename'] = 'Problema no nome do arquivo, por favor tente outro nome';
$lang['Restore_Error_decompress'] = 'N�o � poss�vel descompactar um arquivo Gzip. Por favor, envie uma vers�o texto.';
$lang['Restore_Error_no_file'] = 'Nenhum arquivo foi enviado';


//
// Auth pages
//
$lang['Select_a_User'] = 'Selecione um Usu�rio';
$lang['Select_a_Group'] = 'Selecione um Grupo';
$lang['Select_a_Forum'] = 'Selecione um F�rum';
$lang['Auth_Control_User'] = 'Controle de Permiss�es de Usu�rio';
$lang['Auth_Control_Group'] = 'Controle de Permiss�es de Grupo';
$lang['Auth_Control_Forum'] = 'Controle de Permiss�es de F�rum';
$lang['Look_up_User'] = 'Procurar Usu�rio';
$lang['Look_up_Group'] = 'Procurar Grupo';
$lang['Look_up_Forum'] = 'Procurar F�rum';

$lang['Group_auth_explain'] = 'Aqui voc� pode alterar as permiss�es e o status de moderador de cada Grupo de Usu�rios. N�o se esque�a de que ao alterar as permiss�es de um Grupo, as permiss�es de um Usu�rio ainda podem permitir que ele entre nos f�runs, etc. Voc� ser� avisado caso isto aconte�a.';
$lang['User_auth_explain'] = 'Aqui voc� pode alterar as permiss�es e o status de moderador atribu�do individualmente a cada Usu�rio. N�o se esque�a de que ao mudar as permiss�es de um Usu�rio, as permiss�es de Grupo ainda podem permitir que ele entre nos f�runs, etc. Voc� ser� avisado caso isto aconte�a.';
$lang['Forum_auth_explain'] = 'Aqui voc� pode alterar os n�veis de autoriza��o de cada f�rum. Voc� ter� o m�todo Simples e o Avan�ado para fazer isso, sendo que o Avan�ado oferece maior controle das opera��es de cada f�rum. Lembre-se de que a altera��o do n�vel de permiss�o de seu f�rum afetar� o que cada usu�rio pode fazer e onde ele pode fazer.';

$lang['Simple_mode'] = 'Modo Simples';
$lang['Advanced_mode'] = 'Modo Avan�ado';
$lang['Moderator_status'] = 'Status do Moderador';

$lang['Allowed_Access'] = 'Acesso Permitido';
$lang['Disallowed_Access'] = 'Acesso Proibido';
$lang['Is_Moderator'] = '� Moderador';
$lang['Not_Moderator'] = 'N�o � Moderador';

$lang['Conflict_warning'] = 'Aviso de Conflito de Autoriza��o';
$lang['Conflict_access_userauth'] = 'Este Usu�rio ainda possui direitos de acesso a este f�rum atrav�s do seu registo no Grupo. Voc� talvez queira alterar as permiss�es de Grupo ou remover este Usu�rio deste Grupo para bloquear por completo os seus direitos de acesso. As permiss�es dos Grupos (e os f�runs envolvidos) est�o indicados abaixo:';
$lang['Conflict_mod_userauth'] = 'Este Usu�rio ainda possui direitos de moderador neste f�rum atrav�s do seu registo no Grupo. Voc� talvez queira alterar as permiss�es de Grupo ou remover este Usu�rio desse Grupo para bloquear por completo os seus direitos de acesso. As permiss�es dos Grupos (e os f�runs envolvidos) est�o indicados abaixo:';

$lang['Conflict_access_groupauth'] = 'O seguinte Usu�rio (ou Usu�rios) ainda possuem direitos de acesso a este f�rum atrav�s de sua Configura��o de Permiss�es de Usu�rio. Talvez voc� queira alterar as permiss�es de Usu�rio para bloquear por completo os seus direitos de acesso. As permiss�es dos Usu�rios (e os f�runs envolvidos) est�o indicados abaixo:';

$lang['Conflict_mod_groupauth'] = 'O seguinte Usu�rio (ou Usu�rios) ainda possuem direitos de moderador neste f�rum atrav�s de sua Configura��o de Permiss�es de Usu�rio. Talvez voc� queira alterar as permiss�es de Usu�rio para bloquear por completo os seus direitos de acesso. As permiss�es dos Usu�rios (e os f�runs envolvidos) est�o indicados abaixo:';

$lang['Public'] = 'P�blico';
$lang['Private'] = 'Particular';
$lang['Registered'] = 'Registrados';
$lang['Administrators'] = 'Administradores';
$lang['Hidden'] = 'Oculto';

// These are displayed in the drop down boxes
// mode forum auth, try and keep them short!
$lang['Forum_ALL'] = 'TODOS';
$lang['Forum_REG'] = 'REG';
$lang['Forum_PRIVATE'] = 'PARTICULAR';
$lang['Forum_MOD'] = 'MOD';
$lang['Forum_ADMIN'] = 'ADMIN';

$lang['View'] = 'Ver';
$lang['Read'] = 'Ler';
$lang['Post'] = 'Enviar';
$lang['Reply'] = 'Responder';
$lang['Edit'] = 'Editar';
$lang['Delete'] = 'Remover';
$lang['Sticky'] = 'Nota';
$lang['Announce'] = 'An�ncio';
$lang['Vote'] = 'Votar';
$lang['Pollcreate'] = 'Criar Enquete';

$lang['Permissions'] = 'Permiss�es';
$lang['Simple_Permission'] = 'Permiss�o Simples';

$lang['User_Level'] = 'N�vel de Usu�rio';
$lang['Auth_User'] = 'Usu�rio';
$lang['Auth_Admin'] = 'Administrador';
$lang['Group_memberships'] = 'Membros do Grupo de Usu�rios';
$lang['Usergroup_members'] = 'Este Grupo tem os seguintes Membros';

$lang['Forum_auth_updated'] = 'Permiss�es do F�rum atualizadas';
$lang['User_auth_updated'] = 'Permiss�es de Usu�rio atualizadas';
$lang['Group_auth_updated'] = 'Permiss�es de Grupo atualizadas';

$lang['Auth_updated'] = 'As permiss�es foram atualizadas';
$lang['Click_return_userauth'] = 'Clique %sAqui%s para voltar �s Permiss�es de Usu�rio';
$lang['Click_return_groupauth'] = 'Clique %sAqui%s para voltar �s Permiss�es de Grupo';
$lang['Click_return_forumauth'] = 'Clique %sAqui%s para voltar �s Permiss�es de F�rum';


//
// Banning
//
$lang['Ban_control'] = 'Controle de Expuls�es';
$lang['Ban_explain'] = 'Aqui voc� pode controlar a expuls�o de Usu�rios. Voc� pode expulsar um Usu�rio espec�fico ou um grupo de endere�os de IP ou \'hostnames\'. Estes m�todos impedem os Usu�rios de terem acesso inclusive � p�gina inicial dos f�runs. Para evitar que um Usu�rio se registe com um nome de Usu�rio diferente voc� pode tamb�m banir um endere�o de email espec�fico. Note que ao banir apenas o email n�o impede um Usu�rio de se logar ou colocar mensagens nos f�runs. Voc� deve usar um dos dois m�todos descritos inicialmente.';
$lang['Ban_explain_warn'] = 'Note que ao especificar um grupo de endere�os de IP resultar� no banimento de TODOS os endere�os incluidos nessa sele��o, ou seja, ser�o adicionados � lista de IPs banidos desde o primeiro IP at� ao �ltimo. O sistema do phpBB tenta minimizar o n�mero de endere�os a adicionar ao Banco de Dados empregando automaticamente filtros de sele��o sempre que for poss�vel. Se voc� realmente tiver que mencionar um grupo de IPs tente faz�-lo de forma a abranger uma quantidade reduzida de endere�os ou, melhor ainda, use endere�os espec�ficos.';

$lang['Select_username'] = 'Selecionar um Usu�rio';
$lang['Select_ip'] = 'Selecionar um IP';
$lang['Select_email'] = 'Selecionar um endere�o de Email';

$lang['Ban_username'] = 'Expulsar um ou mais Usu�rios espec�ficos';

$lang['Ban_IP'] = 'Expulsar um ou mais endere�os de IP ou hostnames';
$lang['IP_hostname'] = 'Endere�os de IP ou hostnames';
$lang['Ban_IP_explain'] = 'Quando usar mais do que um IP e \'hostname\' separe cada item com uma v�rgula. Para especificar um grupo de endere�os de IP separe o in�cio do fim com um tra�o (-). Pode tamb�m usar asteriscos (*)';

$lang['Ban_email'] = 'Expulsar um ou mais endere�os de email';
$lang['Ban_email_explain'] = 'Quando usar mais do que um email separe cada item com uma v�rgula. Para especificar um usu�rio qualquer de um certo provedor, utilize asteriscos \'*\', como por exemplo, *@hotmail.com';

$lang['Unban_username'] = 'Remover a expuls�o de um ou mais Usu�rios';
$lang['Unban_username_explain'] = 'Voc� pode remover a expuls�o de v�rios Usu�rios simultaneamente usando a combina��o apropriada de teclas e cliques do mouse no seu computador ou browser.';

$lang['Unban_IP'] = 'Remover a expuls�o de um ou mais endere�os de IP';
$lang['Unban_IP_explain'] = 'Voc� remover a expuls�o de v�rios endere�os de IP simultaneamente usando a combina��o apropriada de teclas e cliques do mouse no seu computador ou browser.';

$lang['Unban_email'] = 'Remover a expuls�o de um ou mais endere�os de email';
$lang['Unban_email_explain'] = 'Voc� remover a expuls�o de v�rios endere�os de email simultaneamente usando a combina��o apropriada de teclas e cliques do mouse no seu computador ou browser.';

$lang['No_banned_users'] = 'N�o h� Nomes de Usu�rios expulsos';
$lang['No_banned_ip'] = 'N�o h� endere�os de IP expulsos';
$lang['No_banned_email'] = 'N�o h� endere�os de email expulsos';

$lang['Ban_update_sucessful'] = 'A lista de expuls�es foi atualizada com sucesso';
$lang['Click_return_banadmin'] = 'Clique %sAqui%s para voltar ao Painel de Controle de Expuls�es';


//
// Configuration
//
$lang['General_Config'] = 'Configura��o Geral';
$lang['Config_explain'] = 'O Formul�rio abaixo permite a personaliza��o de todas as op��es gerais do seu phpBB. Para configura��es de F�runs ou Usu�rios use os respectivos links no painel esquerdo.';

$lang['Click_return_config'] = 'Clique %sAqui%s para voltar � Configura��o Geral';

$lang['General_settings'] = 'Configura��o geral do phpBB';
$lang['Server_name'] = 'Nome do Servidor';
$lang['Server_name_explain'] = 'O nome do Dom�nio em que est� instalado f�rum';
$lang['Script_path'] = 'Diret�rio do Script';
$lang['Script_path_explain'] = 'O diret�rio onde se encontra o phpBB em rela��o ao Dom�nio';
$lang['Server_port'] = 'Porta do Servidor';
$lang['Server_port_explain'] = 'A porta em que o seu servidor est� rodando, normalmente 80 - mude apenas se for diferente';
$lang['Site_name'] = 'Nome do Site';
$lang['Site_desc'] = 'Descri��o do Site';
//Change Lodo MOD | In�cio
$lang['Site_logo'] = 'Logotipo do Site';
$lang['Site_logo_explain'] = 'Essa � a URL do logotipo do seu site (em rela��o ao diret�rio raiz do seu phpBB)';
//Change Lodo MOD | Fim
$lang['Board_disable'] = 'Desativar';
$lang['Board_disable_explain'] = 'Isto torna os f�runs inacess�veis aos Usu�rios. N�o execute logout ap�s Desativar os f�runs sen�o voc� n�o conseguir� entrar novamente.';
$lang['Board_disable_text'] = 'Texto de Desativa��o do F�rum';
$lang['Board_disable_text_explain'] = 'Digite uma justificativa para a desativa��o do F�rum.';

$lang['Acct_activation'] = 'Usar a fun��o de ativa��o de registro';
$lang['Acc_None'] = 'Nenhuma'; // These three entries are the type of activation
$lang['Acc_User'] = 'Usu�rios';
$lang['Acc_Admin'] = 'Administradores';

$lang['Abilities_settings'] = 'Configura��es b�sicas de Usu�rios e F�runs';
$lang['Max_poll_options'] = 'N�mero m�ximo de op��es por Enquete';
$lang['Flood_Interval'] = 'Intervalo de \'Flood\'';
$lang['Flood_Interval_explain'] = 'Tempo em segundos que um Usu�rio deve aguardar entre o envio de mensagens';
$lang['Board_email_form'] = 'Email de Usu�rios via f�rum';
$lang['Board_email_form_explain'] = 'Fun��o que permite Usu�rios enviarem email a outros atrav�s do phpBB';
$lang['Topics_per_page'] = 'N�mero M�ximo de T�picos por p�gina';
$lang['Posts_per_page'] = 'N�mero M�ximo de Mensagens por p�gina';
$lang['Hot_threshold'] = 'N�mero M�ximo de Mensagens para tornar um T�pico Popular';
$lang['Default_style'] = 'Estilo padr�o';
$lang['Override_style'] = 'Substituir estilo do Usu�rio';
$lang['Override_style_explain'] = 'For�a o uso do estilo padr�o em vez do escolhido pelos Usu�rios';
$lang['Default_language'] = 'Idioma padr�o';
$lang['Date_format'] = 'Formato da Data';
$lang['System_timezone'] = 'Fuso Hor�rio do sistema';
$lang['Enable_gzip'] = 'Ativar compress�o GZip';
$lang['Enable_prune'] = 'Ativar Limpeza de F�rum';
$lang['Allow_HTML'] = 'Permitir HTML';
$lang['Allow_BBCode'] = 'Permitir BBCode';
// Anti-Spam MOD | In�cio
$lang['Allow_BBCode_IMG_Post'] = 'Permitir tag [img] nas Mensagens?';
$lang['Allow_BBCode_URL_Post'] = 'Permitir tag [url] nas Mensagens?';
$lang['Allow_BBCode_IMG_Sig'] = 'Permitir tag [img] na Assinatura?';
$lang['Allow_BBCode_URL_Sig'] = 'Permitir tag [url] na Assinatura?';
// Anti-Spam MOD | Fim
$lang['Allowed_tags'] = 'Tags HTML permitidas';
$lang['Allowed_tags_explain'] = 'Separe as Tags com v�rgulas';
$lang['Allow_smilies'] = 'Permitir Smiles';
$lang['Smilies_path'] = 'Pasta dos Smiles';
$lang['Smilies_path_explain'] = 'Pasta sob o diret�rio raiz do seu phpBB (ex: images/smiles)';
$lang['Allow_sig'] = 'Permitir Assinaturas';
$lang['Max_sig_length'] = 'Comprimento M�ximo da Assinatura';
$lang['Max_sig_length_explain'] = 'N�mero m�ximo de caracteres permitidos na assinatura do Usu�rio';
$lang['Allow_name_change'] = 'Permitir mudan�a de Nome de Usu�rio';

$lang['Avatar_settings'] = 'Configura��o de Avatares';
$lang['Allow_local'] = 'Permitir Galeria de Avatares';
$lang['Allow_remote'] = 'Permitir Avatares remotos';
$lang['Allow_remote_explain'] = 'Avatares vinculados a partir de algum outro site';
$lang['Allow_upload'] = 'Permitir o Envio de Avatares';
$lang['Max_filesize'] = 'Tamanho M�ximo do Arquivo de Avatar';
$lang['Max_filesize_explain'] = 'Para arquivos de Avatares Enviados';
$lang['Max_avatar_size'] = 'Dimens�es M�ximas dos Avatares';
$lang['Max_avatar_size_explain'] = '(Altura x Largura em pixels)';
$lang['Avatar_storage_path'] = 'Pasta de armazenamento dos Avatares';
$lang['Avatar_storage_path_explain'] = 'Pasta sob o diret�rio raiz do seu phpBB (ex: images/avatars)';
$lang['Avatar_gallery_path'] = 'Pasta da Galeria de Avatares';
$lang['Avatar_gallery_path_explain'] = 'Pasta sob o diret�rio raiz do seu phpBB (ex: images/avatars/gallery)';

$lang['COPPA_settings'] = 'Configura��o de COPPA';
$lang['COPPA_fax'] = 'Fax para COPPA';
$lang['COPPA_mail'] = 'Endere�o de email para COPPA';
$lang['COPPA_mail_explain'] = 'Este � o endere�o de email para o qual os pais enviar�o os formul�rios de registro de COPPA';

$lang['Email_settings'] = 'Configura��o de Email';
$lang['Admin_email'] = 'Endere�o de Email do Administrador';
$lang['Email_sig'] = 'Assinatura do Email';
$lang['Email_sig_explain'] = 'Este texto ser� anexado a todos os emails enviados pelo f�rum';
$lang['Use_SMTP'] = 'Usar Servidor de SMTP para o envio';
$lang['Use_SMTP_explain'] = 'Selecione SIM caso queira ou tenha que enviar Email atrav�s de um servidor em vez da fun��o mail() do PHP';
$lang['SMTP_server'] = 'Endere�o do servidor de SMTP';
$lang['SMTP_username'] = 'Nome de Usu�rio do SMTP';
$lang['SMTP_username_explain'] = 'S� escreva o nome de Usu�rio se o seu servidor de SMTP assim o exigir';
$lang['SMTP_password'] = 'Senha para o SMTP';
$lang['SMTP_password_explain'] = 'S� escreva a Senha caso o seu servidor de SMTP assim o exigir';

$lang['Disable_privmsg'] = 'Mensagens Particulares';
$lang['Inbox_limits'] = 'N�mero Total de mensagens permitidas na Caixa de Entrada';
$lang['Sentbox_limits'] = 'N�mero Total de mensagens permitidas na Caixa de Sa�da';
$lang['Savebox_limits'] = 'N�mero Total de mensagens permitidas na Caixa de Mensagens Salvas';

$lang['Custom_Footer_and_Header_settings'] = 'Configura��es de Cabe�alhos e Rodap�s Personalizados';
$lang['Custom_Overall_Header'] = 'Cabe�alho Geral Personalizado';
$lang['Custom_Overall_Footer'] = 'Rodap� Geral Personalizado';
$lang['Custom_Simple_Header'] = 'Cabe�alho Simples Personalizado';
$lang['Custom_Simple_Footer'] = 'Rodap� Simples Personalizado';

$lang['Cookie_settings'] = 'Configura��es de Cookies';
$lang['Cookie_settings_explain'] = 'Esses detalhes definem como os cookies ser�o enviados para os navegadores dos seus Usu�rios. Na maioria dos casos os valores padr�o para a configura��o dos cookies dever�o ser suficientes, caso necessite mud�-los fa�a com cuidado pois uma configura��o incorreta poder� impedir os Usu�rios de logarem-se.';
$lang['Cookie_domain'] = 'Dom�nio do Cookie';
$lang['Cookie_name'] = 'Nome do Cookie';
$lang['Cookie_path'] = 'Pasta do Cookie';
$lang['Cookie_secure'] = 'Cookie Seguro [ https:// ]';
$lang['Cookie_secure_explain'] = 'Se o seu servidor estiver rodando atrav�s de SSL ative-o, caso contr�rio deixe-o desligado';
$lang['Session_length'] = 'Tempo da sess�o [ segundos ]';

//
// Forum Management
//
$lang['Forum_admin'] = 'Administra��o dos F�runs';
$lang['Forum_admin_explain'] = 'A partir deste Painel voc� pode adicionar, remover, editar, reordenar e resincronizar Categorias e F�runs.';
$lang['Edit_forum'] = 'Editar F�rum';
$lang['Create_forum'] = 'Criar novo F�rum';
$lang['Create_category'] = 'Criar nova Categoria';
$lang['Remove'] = 'Remover';
$lang['Action'] = 'A��o';
$lang['Update_order'] = 'Atualizar Ordem';
$lang['Config_updated'] = 'A configura��o do F�rum foi atualizada com sucesso!';
$lang['Edit'] = 'Editar';
$lang['Delete'] = 'Remover';
$lang['Move_up'] = 'mover acima';
$lang['Move_down'] = 'mover abaixo';
$lang['Resync'] = 'Resincronizar';
$lang['No_mode'] = 'N�o foi definido nenhum modo!';
$lang['Forum_edit_delete_explain'] = 'O formul�rio abaixo lhe permitir� personalizar todas as Op��es Gerais do phpBB. Para Configura��es de Usu�rios e do F�rum use os atalhos no painel do lado esquerdo.';

$lang['Move_contents'] = 'Mover todo o conte�do';
$lang['Forum_delete'] = 'Remover F�rum';
$lang['Forum_delete_explain'] = 'O formul�rio abaixo lhe permitir� remover um f�rum (ou categoria) e decidir onde pretende colocar todos os t�picos (ou f�runs) existentes.';
$lang['Status_locked'] = 'Trancado';
$lang['Status_unlocked'] = 'Destrancado';

$lang['Forum_settings'] = 'Configura��es Gerais dos F�runs';
$lang['Forum_name'] = 'Nome do F�rum';
$lang['Forum_desc'] = 'Descri��o';
$lang['Forum_status'] = 'Status';
$lang['Forum_pruning'] = 'Auto-limpeza';

$lang['prune_freq'] = 'Verificar o tempo dos t�picos a cada';
$lang['prune_days'] = 'Remover t�picos que n�o tenham sido respondidos em';
$lang['Set_prune_data'] = 'Voc� ativou a fun��o de auto-limpeza para este f�rum mas n�o especificou a freq��ncia ou o n�mero de dias em que o mesmo deve ser limpo. Volte e especifice esse valor';

$lang['Move_and_Delete'] = 'Mover e Remover';

$lang['Delete_all_posts'] = 'Remover todas as mensagens';
$lang['Nowhere_to_move'] = 'N�o h� local para onde mover';

$lang['Edit_Category'] = 'Editar Categoria';
$lang['Edit_Category_explain'] = 'Use este formul�rio para mudar o nome da Categoria.';

$lang['Forums_updated'] = 'Informa��es do F�rum e da Categoria atualizadas com sucesso!';

$lang['Must_delete_forums'] = 'Voc� precisa remover todos os f�runs antes de remover esta categoria';

$lang['Click_return_forumadmin'] = 'Clique %sAqui%s para voltar � Administra��o dos F�runs';


//
// Smiley Management
//
$lang['smiley_title'] = 'Administra��o de Smileys';
$lang['smile_desc'] = 'A partir desta p�gina voc� pode adicionar, remover e editar os \'smileys\' que os Usu�rios poder�o usar nas suas mensagens.';

$lang['smiley_config'] = 'Configura��o de Smileys';
$lang['smiley_code'] = 'C�digo para o Smiley';
$lang['smiley_url'] = 'Arquivo da imagem do Smiley';
$lang['smiley_emot'] = 'Emo��o do Smiley';
$lang['smile_add'] = 'Adicionar um Smiley';
$lang['Smile'] = 'Smiley';
$lang['Emotion'] = 'Emo��o';

$lang['Select_pak'] = 'Selecionar arquivo de pacote (.pak)';
$lang['replace_existing'] = 'Substituir Smiley existente';
$lang['keep_existing'] = 'Manter o Smiley existente';
$lang['smiley_import_inst'] = 'Voc� deve descompactar o pacote de Smileys e colocar todos os arquivos na respectiva pasta da sua instala��o do phpBB. Selecione depois a informa��o correta neste formul�rio para importar o pacote.';
$lang['smiley_import'] = 'Importar pacote';
$lang['choose_smile_pak'] = 'Escolher arquivo de pacote de Smileys (.pak)';
$lang['import'] = 'Importar';
$lang['smile_conflicts'] = 'Em caso de conflitos:';
$lang['del_existing_smileys'] = 'Remova os Smileys existentes antes de importar o pacote';
$lang['import_smile_pack'] = 'Importar Pacote de Smiley';
$lang['export_smile_pack'] = 'Criar Pacote';
$lang['export_smiles'] = 'Para criar um pacote de Smileys a partir dos atualmente instalados, primeiro clique %sAqui%s para fazer download do pacote (smiles.pak). Renomeie este arquivo apropriadamente, mantendo a extens�o (.pak). Ent�o crie um arquivo zip contendo todos as suas imagens de Smiley mais este arquivo de configura��o (.pak).';

$lang['smiley_add_success'] = 'O Smiley foi adicionado com sucesso!';
$lang['smiley_edit_success'] = 'O Smiley foi atualizado com sucesso!';
$lang['smiley_import_success'] = 'O pacote de Smiley foi importado com sucesso!';
$lang['smiley_del_success'] = 'O Smiley foi removido com sucesso!';
$lang['Click_return_smileadmin'] = 'Clique %sAqui%s para voltar � Administra��o de Smileys';


//
// User Management
//
$lang['User_admin'] = 'Ger�ncia de Usu�rios';
$lang['User_admin_explain'] = 'Aqui voc� pode mudar a informa��o dos seus Usu�rios al�m de algumas op��es espec�ficas. Para modificar as permiss�es de Usu�rios use o painel de <b>Permiss�es</b> para Usu�rios e Grupos.';

$lang['Look_up_user'] = 'Perfil do Usu�rio';

$lang['Admin_user_fail'] = 'N�o foi poss�vel Atualizar o perfil do Usu�rio.';
$lang['Admin_user_updated'] = 'O perfil do Usu�rio foi atualizado com sucesso!';
$lang['Click_return_useradmin'] = 'Clique %sAqui%s para voltar � Ger�ncia de Usu�rios';

$lang['User_delete'] = 'Remover este Usu�rio';
$lang['User_delete_explain'] = 'Clique aqui para remover o Usu�rio. Esta opera��o tem efeitos permanentes.';
$lang['User_deleted'] = 'Usu�rio removido com sucesso!';

$lang['User_status'] = 'Usu�rio est� ativo';
$lang['User_allowpm'] = 'Pode enviar Mensagens Privadas';
$lang['User_allowavatar'] = 'Pode mostrar Avatar';

$lang['Admin_avatar_explain'] = 'Aqui voc� pode ver e remover o Avatar atual do Usu�rio.';

$lang['User_special'] = 'Campos especiais apenas para Administradores';
$lang['User_special_explain'] = 'Estes campos n�o podem ser modificados por Usu�rios. Aqui voc� pode especificar o status do usu�rio bem como outras op��es que n�o s�o dadas aos Usu�rios.';
// Added for enhanced user management
$lang['User_lookup_explain'] = 'Voc� pode consultar Usu�rios especificando um ou mais dos crit�rios abaixo. N�o � necess�rio caracteres como (*, ?, etc), eles ser�o adicionados automaticamente.';
$lang['One_user_found'] = 'Foi encontrado apenas um Usu�rio, voc� ser� levado para esse usu�rio';
$lang['Click_goto_user'] = 'Clique %sAqui%s para editar o Perfil desse Usu�rio';
$lang['User_joined_explain'] = 'A Sintaxe usada � id�ntica a fun��o PHP <a href=\"http://www.php.net/strtotime\" target=\"_other\">strtotime()</a>';


//
// Group Management
//
$lang['Group_administration'] = 'Administra��o de Grupos';
$lang['Group_admin_explain'] = 'A partir deste painel voc� pode administrar todos os seus Grupos de Usu�rios, voc� pode: remover, criar e editar Grupos existentes. Voc� pode eleger moderadores, abrir/fechar Grupos e definir Nome e Descri��o de cada grupo.';
$lang['Error_updating_groups'] = 'Houve um erro ao Atualizar os grupos';
$lang['Updated_group'] = 'O grupo foi atualizado com sucesso!';
$lang['Added_new_group'] = 'O novo grupo foi criado com sucesso!';
$lang['Deleted_group'] = 'O grupo foi removido com sucesso!';
$lang['New_group'] = 'Criar um Grupo';
$lang['Edit_group'] = 'Editar o Grupo';
$lang['group_name'] = 'Nome do Grupo';
$lang['group_description'] = 'Descri��o do Grupo';
$lang['group_moderator'] = 'Moderador do Grupo';
$lang['group_status'] = 'Status do Grupo';
$lang['group_open'] = 'Aberto';
$lang['group_closed'] = 'Fechado';
$lang['group_hidden'] = 'Oculto';
$lang['group_delete'] = 'Remover grupo';
$lang['group_delete_check'] = 'Remover este grupo';
$lang['submit_group_changes'] = 'Enviar Altera��es';
$lang['reset_group_changes'] = 'Restaurar Altera��es';
$lang['No_group_name'] = 'Deve ser especificado um nome para este grupo';
$lang['No_group_moderator'] = 'Deve ser especificado um moderador para este grupo';
$lang['No_group_mode'] = 'Deve ser especificado um status para este grupo, aberto ou fechado';
$lang['No_group_action'] = 'Nenhuma a��o foi especificada';
$lang['delete_group_moderator'] = 'Remover o moderador antigo do grupo?';
$lang['delete_moderator_explain'] = 'Se estiver alterando o moderador do grupo assinale aqui para remover o moderador anterior.  Caso contr�rio n�o assinale e o Usu�rio passar� a ser um membro normal do grupo.';
$lang['Click_return_groupsadmin'] = 'Clique %sAqui%s para voltar � Administra��o de Grupos.';
$lang['Select_group'] = 'Selecionar um Grupo';
$lang['Look_up_group'] = 'Procurar Grupo';


//
// Prune Administration
//
$lang['Forum_Prune'] = 'Limpar F�rum';
$lang['Forum_Prune_explain'] = 'Esta opera��o remover� qualquer t�pico que n�o possua resposta dentro do limite de dias especificado. Se n�o for mencionado um n�mero de dias todos os t�picos ser�o removidos. Isto n�o remove t�picos que possuam uma Enquete ativa nem An�ncios. Voc� ter� que remov�-los manualmente.';
$lang['Do_Prune'] = 'Limpar';
$lang['All_Forums'] = 'Todos os F�runs';
$lang['Prune_topics_not_posted'] = 'Remover todos os t�picos sem resposta durante um per�odo de ';
$lang['Topics_pruned'] = 'T�picos Removidos';
$lang['Posts_pruned'] = 'Mensagens Removidas';
$lang['Prune_success'] = 'A otimiza��o dos f�runs foi conclu�da com sucesso';


//
// Word censor
//
$lang['Words_title'] = 'Palavras Censuradas';
$lang['Words_explain'] = 'A partir deste painel de controle voc� pode adicionar, editar e remover palavras que ser�o automaticamente censuradas em seus f�runs. O uso dessas palavras ser� tamb�m interditado no registo de Nomes de Usu�rios. Podem ser usados asteriscos (*) aumentando as possibilidades de abranger varia��es da mesma palavra. Por exemplo, *testa* abranger� detestando, testa* abranger� testando, *testa abranger� detesta.';
$lang['Word'] = 'Palavra';
$lang['Edit_word_censor'] = 'Editar palavra Censurada';
$lang['Replacement'] = 'Substitui��o';
$lang['Add_new_word'] = 'Adicionar nova palavra';
$lang['Update_word'] = 'Atualizar palavra censurada';

$lang['Must_enter_word'] = 'Voc� deve escrever a palavra e o que ir� substitu�-la';
$lang['No_word_selected'] = 'N�o foi escolhida palavra para editar';

$lang['Word_updated'] = 'A palavra censurada foi atualizada com sucesso!';
$lang['Word_added'] = 'A palavra a censurar foi adicionada com sucesso!';
$lang['Word_removed'] = 'A palavra censurada foi removida com sucesso!';

$lang['Click_return_wordadmin'] = 'Clique %sAqui%s para voltar �s Palavras Censuradas';


//
// Mass Email
//
$lang['Mass_email_explain'] = 'A partir daqui voc� pode enviar um email para todos os Usu�rios dos f�runs ou apenas para Usu�rios membros de um certo grupo. Ser� enviada uma mesnagem para o <b>Email Administrativo</b> previamente configurado com uma c�pia oculta para os demais usu�rios. Caso esteja enviando um email para um grande n�mero de pessoas aguarde um pouco ap�s clicar em <b>Email</b> e n�o pare a p�gina durante o processo. � normal que o envio de um email em massa demore um pouco, mas voc� ser� avisado quando o processo for conclu�do.';
$lang['Compose'] = 'Compor';

$lang['Recipients'] = 'Destinat�rios';
$lang['All_users'] = 'Todos os Usu�rios';

$lang['Email_successfull'] = 'A sua mensagem foi enviada!';
$lang['Click_return_massemail'] = 'Clique %sAqui%s para voltar ao Formul�rio de Email em Massa';


//
// Ranks admin
//
$lang['Ranks_title'] = 'Ger�ncia de Rank';
$lang['Ranks_explain'] = 'Usando este formul�rio voc� pode adicionar, editar, ver e remover ranks. Voc� tamb�m pode criar ranks espec�ficos que podem ser atribu�dos aos Usu�rios atrav�s do painel <b>Admin Usu�rios</b>';

$lang['Add_new_rank'] = 'Adicionar um novo Rank';

$lang['Rank_title'] = 'T�tulo do Rank';
$lang['Rank_special'] = 'Rank Especial';
$lang['Rank_minimum'] = 'N�m. M�n. de Mensagens';
$lang['Rank_maximum'] = 'N�m. M�x. de Mensagens';
$lang['Rank_image'] = 'Imagem do Rank (relativo ao diret�rio raiz do phpBB)';
$lang['Rank_image_short'] = 'Imagem do Rank';  //Display Rank Image on Overview MOD
$lang['Rank_image_explain'] = 'Use isto para definir uma pequena imagem associada ao Rank';

$lang['Must_select_rank'] = 'Voc� deve escolher um Rank';
$lang['No_assigned_rank'] = 'N�o foi especificado nenhum Rank Especial';

$lang['Rank_updated'] = 'O Rank foi atualizado com sucesso!';
$lang['Rank_added'] = 'O Rank foi adicionado com sucesso!';
$lang['Rank_removed'] = 'O Rank foi removido com sucesso!';

$lang['Click_return_rankadmin'] = 'Clique %sAqui%s para voltar � Ger�ncia de Ranks';


//
// Disallow Username Admin
//
$lang['Disallow_control'] = 'Controle de Nomes de Usu�rios Proibidos';
$lang['Disallow_explain'] = 'Aqui voc� pode controlar nomes de Usu�rios que n�o ser�o permitidos. Nomes proib�dos podem conter asteriscos \'*\' para abranger um maior n�mero de varia��es da palavra.  Note que n�o podem ser especificados Nomes de Usu�rios que j� se encontrem registrados, devendo primeiro ser removidos e ent�o especificados aqui para n�o mais serem usados.';

$lang['Delete_disallow'] = 'Remover';
$lang['Delete_disallow_title'] = 'Remover um Nome de Usu�rio Proibido';
$lang['Delete_disallow_explain'] = 'Voc� pode remover um Nome de Usu�rio selecionando-o nessa lista e clicando em Remover';

$lang['Add_disallow'] = 'Adicionar';
$lang['Add_disallow_title'] = 'Adicionar um Nome de Usu�rio Proibido';
$lang['Add_disallow_explain'] = 'Use asteriscos \'*\' se necess�rio';

$lang['No_disallowed'] = 'N�o h� Nomes de Usu�rios Proibidos';

$lang['Disallowed_deleted'] = 'O Nome de Usu�rio Proibido foi removido com sucesso!';
$lang['Disallow_successful'] = 'O Nome de Usu�rio Proibido foi adicionado com sucesso!';
$lang['Disallowed_already'] = 'O nome que especificou n�o pode ser proibido. Pode ser que j� exista na lista de Nomes Proibidos, na lista de Palavras Censuradas ou encontre-se atualmente em uso por algum Usu�rio registrado';

$lang['Click_return_disallowadmin'] = 'Clique %sAqui%s para voltar ao Controle de Nomes de Usu�rios Proibidos';


//
// Styles Admin
//
$lang['Styles_admin'] = 'Ger�ncia de Estilos';
$lang['Styles_explain'] = 'Use este painel para adicionar, remover e administrar os estilos (Modelos e Temas) que ficar�o dispon�veis aos Usu�rios.';
$lang['Styles_addnew_explain'] = 'A lista a seguir cont�m todos os Temas dispon�veis para os Modelos que voc� possui. Os itens desta lista ainda n�o se encontram instalados na base de dados do phpBB. Para instalar um tema espec�fico clique em <b>Instalar</b> ao lado desse item.';

$lang['Select_template'] = 'selecionar um Modelo';

$lang['Style'] = 'Estilo';
$lang['Template'] = 'Modelo';
$lang['Install'] = 'Instalar';
$lang['Download'] = 'Download';

$lang['Edit_theme'] = 'Editar Tema';
$lang['Edit_theme_explain'] = 'Configurar o tema selecionado no formul�rio abaixo';

$lang['Create_theme'] = 'Criar Tema';
$lang['Create_theme_explain'] = 'Use o formul�rio abaixo para criar um Tema novo para o Modelo existente. Quando aplicar cores (que devem ser escritas num formato hexadecimal) n�o deve ser inclu�do o # inicial, ou seja, CCCCCC � a forma correta de escrever, #CCCCCC � incorreto.';

$lang['Export_themes'] = 'Exportar Temas';
$lang['Export_explain'] = 'Neste painel voc� poder� exportar os dados de um Tema para um dado Modelo. Escolha um Modelo na lista e ser� automaticamente criado um arquivo de configura��o do tema que ir� ser guardado e instalado na pasta do Modelo selecionado. Caso n�o seja poss�vel salv�-lo ser� dada a op��o para fazer o \'download\'. Para que o arquivo seja salvo deve ser dada permiss�o de escrita ao servidor WEB para a pasta do Modelo selecionado. Para mais informa��o sobre esta opera��o veja o <b>guia de usu�rios phpBB 2</b>.';

$lang['Theme_installed'] = 'O tema selecionado foi instalado com sucesso!';
$lang['Style_removed'] = 'O estilo selecionado foi removido da base de dados. Para remover completamente este estilo do seu sistema apague o estilo apropriado na pasta dos Modelos.';
$lang['Theme_info_saved'] = 'A informa��o do tema para o Modelo selecionado foi salva. Voc� deve agora mudar as permiss�es para \'read-only\' do arquivo theme_info.cfg (e caso aplic�vel na pasta de Modelos)';
$lang['Theme_updated'] = 'O tema selecionado foi atualizado. Voc� deve agora exportar a nova configura��o do tema';
$lang['Theme_created'] = 'Tema criado. Voc� deve agora exportar o tema para o arquivo de configura��o do tema como seguran�a ou usar em outro local';

$lang['Confirm_delete_style'] = 'Tem certeza de que deseja remover este estilo?';

$lang['Download_theme_cfg'] = 'N�o foi poss�vel escrever o arquivo de informa��o do tema. Clique sobre o bot�o abaixo para fazer o \'download\' deste arquivo. Ao terminar o download voc� pode trasferir o arquivo para a pasta que cont�m os arquivos de Modelos. Voc� pode empacotar os arquivos para distribui��o ou usar em outro local, se desejar';
$lang['No_themes'] = 'O Modelo selecionado n�o possui temas anexos. Para criar um tema novo clique em Criar no painel do lado esquerdo';
$lang['No_template_dir'] = 'N�o foi poss�vel abrir a pasta de Modelos. Pode ser que n�o haja possibilidade de ser lido pelo servidor Web ou a pasta n�o exista';
$lang['Cannot_remove_style'] = 'Voc� n�o pode remover o estilo selecionado porque est� em uso no momento. Mude para outro estilo e tente novamente.';
$lang['Style_exists'] = 'O nome para o estilo que selecionou j� existe, volte e escolha um nome diferente.';

$lang['Click_return_styleadmin'] = 'Clique %sAqui%s para voltar � Ger�ncia de Estilos';

$lang['Theme_settings'] = 'Configura��o de Temas';
$lang['Theme_element'] = 'Elemento de Tema';
$lang['Simple_name'] = 'Nome Simples';
$lang['Value'] = 'Valor';
$lang['Save_Settings'] = 'Salvar Configura��o';

$lang['Stylesheet'] = 'CSS Stylesheet';
$lang['Background_image'] = 'Imagem de Fundo';
$lang['Background_color'] = 'Cor de Fundo';
$lang['Theme_name'] = 'Nome do Tema';
$lang['Link_color'] = 'Cor de Atalho';
$lang['Text_color'] = 'Cor de Texto';
$lang['VLink_color'] = 'Cor de Atalho Visitado';
$lang['ALink_color'] = 'Cor de Atalho Ativo';
$lang['HLink_color'] = 'Cor de Atalho Hover';
$lang['Tr_color1'] = 'Cor 1 de Coluna de Tabela';
$lang['Tr_color2'] = 'Cor 2 de Coluna de Tabela';
$lang['Tr_color3'] = 'Cor 3 de Coluna de Tabela';
$lang['Tr_class1'] = 'Classe 1 de Coluna de Tabela';
$lang['Tr_class2'] = 'Classe 2 de Coluna de Tabela';
$lang['Tr_class3'] = 'Classe 3 de Coluna de Tabela';
$lang['Th_color1'] = 'Cor 1 de Cabe�a de Tabela';
$lang['Th_color2'] = 'Cor 2 de Cabe�a de Tabela';
$lang['Th_color3'] = 'Cor 3 de Cabe�a de Tabela';
$lang['Th_class1'] = 'Classe 1 de Cabe�a de Tabela';
$lang['Th_class2'] = 'Classe 2 de Cabe�a de Tabela';
$lang['Th_class3'] = 'Classe 3 de Cabe�a de Tabela';
$lang['Td_color1'] = 'Cor 1 de C�lula de Tabela';
$lang['Td_color2'] = 'Cor 2 de C�lula de Tabela';
$lang['Td_color3'] = 'Cor 3 de C�lula de Tabela';
$lang['Td_class1'] = 'Classe 1 de C�lula de Tabela';
$lang['Td_class2'] = 'Classe 2 de C�lula de Tabela';
$lang['Td_class3'] = 'Classe 3 de C�lula de Tabela';
$lang['fontface1'] = 'Fonte 1';
$lang['fontface2'] = 'Fonte 2';
$lang['fontface3'] = 'Fonte 3';
$lang['fontsize1'] = 'Tamanho 1 de Fonte';
$lang['fontsize2'] = 'Tamanho 2 de Fonte';
$lang['fontsize3'] = 'Tamanho 3 de Fonte';
$lang['fontcolor1'] = 'Cor 1 de Fonte';
$lang['fontcolor2'] = 'Cor 2 de Fonte';
$lang['fontcolor3'] = 'Cor 3 de Fonte';
$lang['span_class1'] = 'Classe 1 - Extens�o';
$lang['span_class2'] = 'Classe 2 - Extens�o';
$lang['span_class3'] = 'Classe 3 - Extens�o';
$lang['img_poll_size'] = 'Tamanho da Imagem da Vota��o [px]';
$lang['img_pm_size'] = 'Tamanho do Status de Mensagem Privada [px]';


// Global announcment MOD
$lang['Globalannounce'] = 'An�ncio Global';

// Last Visit MOD
$lang['Hidde_last_logon'] = 'Ocultar data de �ltima Visita';
$lang['Hidde_last_logon_expain'] = 'Se escolher SIM, a data da �ltima visita do usu�rio permanecer� oculta para os usu�rios exceto para os ADMINISTRADORES';

// Real Name MOD
$lang['Hidde_real_name'] = 'Ocultar Nome Real';
$lang['Hidde_real_name_explainn'] = 'Se escolher SIM, o nome real dos usu�rios permanecer� oculto para os usu�rios exceto para os ADMINISTRADORES.';

// Yellow Card Admin MOD
$lang['Ban'] = 'Banir';
$lang['Max_user_bancard'] = 'N�m. M�x. de cart�es amarelos';
$lang['Max_user_bancard_explain'] = 'Se um usu�rio exceder o limite de cart�es amarelos ser� expulso';
$lang['ban_card'] = 'Cart�es Amarelos';
$lang['ban_card_explain'] = 'O usu�rio ser� expulso quando ele/ela exceder %d cart�es amarelos';
$lang['Greencard'] = 'Cart�o Verde';
$lang['Bluecard'] = 'Cart�o Azul';
$lang['Bluecard_limit'] = 'Intervalo de Cart�es Azuis';
$lang['Bluecard_limit_explain'] = 'Notificar o moderador novamente a cada x cart�es azuis dados a uma mensagem';
$lang['Bluecard_limit_2'] = 'Limite de Cart�es Azuis';
$lang['Bluecard_limit_2_explain'] = 'A primeira notifica��o ser� enviada ao moderador, quando a mensagem receber essa quantidade de cart�es azuis';


//
// Install Process
//
$lang['Welcome_install'] = 'Bem-vindo � Instala��o do phpBB 2';
$lang['Initial_config'] = 'Configura��o B�sica';
$lang['DB_config'] = 'Configura��o do Banco de Dados';
$lang['Admin_config'] = 'Configura��o de Administra��o';
$lang['continue_upgrade'] = 'Assim que terminar o \'download\' do arquivo de configura��o para o seu computador voc� poder� clicar em \"Continuar a Atualiza��o\" para continuar o processo.  Aguarde que seja feito o \'upload\' do arquivo de configura��o at� que o processo de atualiza��o esteja completo.';
$lang['upgrade_submit'] = 'Continuar a Atualiza��o';

$lang['Installer_Error'] = 'Ocorreu um erro durante a instala��o!';
$lang['Previous_Install'] = 'Foi detectada uma instala��o anterior!';
$lang['Install_db_error'] = 'Ocorreu um erro ao tentar Atualizar o banco de dados!';

$lang['Re_install'] = 'A sua instala��o anterior ainda se encontra ativa. <br/><br/>Caso pretenda reinstalar phpBB 2 clique no bot�o Sim abaixo. Note que ao faz�-lo toda a informa��o existente ser� destru�da, n�o sendo feitas c�pias de seguran�a! O Nome de Usu�rio e Senha de administrador que voc� tem usado ser�o recriados ap�s esta reinstala��o, nenhum outro dado de configura��o ser� salvo.<br/><br/>Pense cuidadosamente antes clicar em Sim!';

$lang['Inst_Step_0'] = 'Obrigado por ter escolhido phpBB 2. A fim de completar esta instala��o preencha os detalhes pedidos abaixo. Note que a base de dados onde a informa��o do f�rum ser� instalada j� deve existir. Caso a base de dados use ODBC (ex: MS Access), crie primeiro um DSN.';

$lang['Start_Install'] = 'Come�ar a Instala��o';
$lang['Finish_Install'] = 'Terminar a Instala��o';

$lang['Default_lang'] = 'Idioma padr�o do F�rum';
$lang['DB_Host'] = 'Hostname do Sevidor da Base de Dados / DSN';
$lang['DB_Name'] = 'Nome do Banco de Dados';
$lang['DB_Username'] = 'Nome de Usu�rio no Banco de Dados';
$lang['DB_Password'] = 'Senha no Banco de Dados';
$lang['Database'] = 'Seu Banco de Dados';
$lang['Install_lang'] = 'Escolher o Idioma para a Instala��o';
$lang['dbms'] = 'Tipo de Banco de Dados';
$lang['Table_Prefix'] = 'Prefixo para as tabelas no Banco de Dados';
$lang['Admin_Username'] = 'Nome de Usu�rio do Administrador';
$lang['Admin_Password'] = 'Senha do Administrador';
$lang['Admin_Password_confirm'] = 'Senha do Administrador [Confirmar]';

$lang['Inst_Step_2'] = 'O seu Nome de Usu�rio para Administrador foi criado. A Instala��o B�sica foi conclu�da. Voc� ser� conduzido a um painel onde poder� administrar a sua nova instala��o. Verificar os detalhes de Configura��o Geral e proceder as mudan�as necess�rias. Obrigado por usar phpBB 2.';

$lang['Unwriteable_config'] = 'O seu arquivo de configura��o n�o pode ser escrito neste momento. Ser� feita uma c�pia do arquivo ao clicar no bot�o abaixo. Dever� colocar este arquivo na mesma pasta que o phpBB 2. Uma vez concluido, voc� dever� logar-se usando o Nome de Usu�rio de administrador e respectiva senha que forneceu anteriormente visitando a seguir o Painel de Administra��o (um atalho ir� surgir na parte inferior de cada janela) para verificar a configura��o geral. Obrigado por escolher phpBB 2.';
$lang['Download_config'] = 'Fa�a o \'Download\' da Configura��o';

$lang['ftp_choose'] = 'Escolher um m�todo para Download';
$lang['ftp_option'] = '<br/>Visto as extens�es de FTP se encontrarem ativas nesta vers�o de PHP deve-lhe ter sido tamb�m dada a op��o para primeiro tentar automaticamente o FTP do arquivo de configura��o para o local certo.';
$lang['ftp_instructs'] = 'Escolheu para FTP automaticamente o arquivo para a conta contendo phpBB 2.  Por favor forne�a a informa��o abaixo para facilitar o processo. Note que o \'path\' do FTP dever� ser exatamente o mesmo via ftp para a instala��o do seu phpBB 2 como se estivesse efetuando ftp usando um cliente normal.';
$lang['ftp_info'] = 'Escrever a informa��o do FTP';
$lang['Attempt_ftp'] = 'Tentando FTP o arquivo de configura��o para o local correto';
$lang['Send_file'] = 'Apenas enviar o arquivo para mim e eu farei o FTP manualmente';
$lang['ftp_path'] = 'Path de FTP para o phpBB 2';
$lang['ftp_username'] = 'O seu nome de Usu�rio para o FTP';
$lang['ftp_password'] = 'A sua senha para o FTP';
$lang['Transfer_config'] = 'Iniciar a Transfer�ncia';
$lang['NoFTP_config'] = 'A tentativa de FTP do arquivo de configura��o para o local correto falhou. Por favor, fa�a o download do mesmo e efetue o FTP manualmente.';

$lang['Install'] = 'Instalar';
$lang['Upgrade'] = 'Atualizar';


$lang['Install_Method'] = 'Escolher o seu m�todo de instala��o';

$lang['Install_No_Ext'] = 'A configura��o de php no seu server n�o aceita o tipo de base de dados que escolheu';

$lang['Install_No_PCRE'] = 'O phpBB2 requer o m�dulo para php \'Perl-Compatible Regular Expressions\' cuja configura��o do seu php parece n�o aceitar!';

//
// That's all Folks!
// -------------------------------------------------

?>