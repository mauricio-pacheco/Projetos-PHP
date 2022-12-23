<?php
/***************************************************************************
 *                          lang_main.php [portuguese_br]
 *                              -------------------
 *     begin                : Sat Dec 16 2000
 *     copyright            : (C) 2001 The phpBB Group
 *     email                : support@phpbb.com
 *
 *     $Id: lang_main.php,v 1.1.2.4 2002/11/13 23:28:53 psotfx Exp $
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

$lang['ENCODING'] = 'iso-8859-1';
$lang['DIRECTION'] = 'ltr';
$lang['LEFT'] = 'left';
$lang['RIGHT'] = 'right';
$lang['DATE_FORMAT'] = 'F \d\e Y'; // This should be changed to the default date format for your language, php date() format
$lang['JOINED_DATE_FORMAT'] = 'F \d\e Y'; // Date format of Joined date, php date() format
$lang['TRANSLATION_INFO'] = '';

//
// Common, these terms are used
// extensively on several pages
//
$lang['Forum'] = 'F�rum';
$lang['Category'] = 'Categoria';
$lang['Topic'] = 'T�pico';
$lang['Topics'] = 'T�picos';
$lang['Replies'] = 'Respostas';
$lang['Views'] = 'Exibi��es';
$lang['Post'] = 'Mensagem';
$lang['Posts'] = 'Mensagens';
$lang['Posted'] = 'Enviada';
$lang['Username'] = 'Usu�rio';
$lang['Password'] = 'Senha';
$lang['Email'] = 'Email';
$lang['Poster'] = 'Escritor';
$lang['Author'] = 'Autor';
$lang['Time'] = 'Data';
$lang['Hours'] = 'Horas';
$lang['Message'] = 'Mensagem';

$lang['1_Day'] = '1 dia';
$lang['7_Days'] = '7 dias';
$lang['2_Weeks'] = '2 semanas';
$lang['1_Month'] = '1 m�s';
$lang['3_Months'] = '3 meses';
$lang['6_Months'] = '6 meses';
$lang['1_Year'] = '1 ano';

$lang['Go'] = 'Ir';
$lang['Jump_to'] = 'Ir para';
$lang['Submit'] = 'Enviar';
$lang['Reset'] = 'Restaurar';
$lang['Cancel'] = 'Cancelar';
$lang['Preview'] = 'Prever';
$lang['Confirm'] = 'Confirmar';
$lang['Spellcheck'] = 'Corrigir';
$lang['Yes'] = 'Sim';
$lang['No'] = 'N�o';
$lang['Enabled'] = 'Ativo';
$lang['Disabled'] = 'Inativo';
$lang['Error'] = 'Erro';

$lang['Next'] = 'Pr�ximo';
$lang['Previous'] = 'Anterior';
$lang['Goto_page'] = 'Ir � p�gina';
$lang['Joined'] = 'Registrado em';
$lang['IP_Address'] = 'Endere�o IP';

$lang['Select_forum'] = 'Selecione um F�rum';
$lang['View_latest_post'] = 'Exibir a �ltima mensagem';
$lang['View_newest_post'] = 'Exibir a mensagem mais recente';
$lang['Page_of'] = 'P�gina <b>%d</b> de <b>%d</b>'; // Replaces with: Page 1 of 2 for example
$lang['Print_View'] = 'Exibir p�gina para Impress�o';

$lang['ICQ'] = 'N�mero de ICQ';
$lang['AIM'] = 'Endere�o de AIM';
$lang['MSNM'] = 'MSN Messenger';
$lang['YIM'] = 'Yahoo Messenger';

$lang['Forum_Index'] = '%s - �ndice do F�rum';  // eg. sitename Forum Index, %s can be removed if you prefer

$lang['Post_new_topic'] = 'Novo T�pico';
$lang['Reply_to_topic'] = 'Responder Mensagem';
$lang['Reply_with_quote'] = 'Responder com Cita��o';

$lang['Click_return_topic'] = 'Clique %sAqui%s para voltar ao T�pico'; // %s's here are for uris, do not remove!
$lang['Click_return_login'] = 'Clique %sAqui%s para tentar novamente';
$lang['Click_return_forum'] = 'Clique %sAqui%s para voltar ao F�rum';
$lang['Click_view_message'] = 'Clique %sAqui%s para exibir a sua Mensagem';
$lang['Click_return_modcp'] = 'Clique %sAqui%s para voltar ao Painel de Controle de Moderador';
$lang['Click_return_group'] = 'Clique %sAqui%s para voltar � Informa��o do grupo';

$lang['Admin_panel'] = 'V� ao Painel de Administra��o';

$lang['Board_disable'] = 'Este painel n�o se encontra dispon�vel de momento. Tente novamente mais tarde';


//
// Global Header strings
//
$lang['Registered_users'] = 'Usu�rios Registrados';
$lang['Browsing_forum'] = 'Usu�rios no F�rum:';
$lang['Online_users_zero_total'] = 'N�o h� <b>nenhum</b> usu�rio online :: ';
$lang['Online_users_total'] = 'H� <b>%d</b> usu�rios online :: ';
$lang['Online_user_total'] = 'H� <b>%d</b> usu�rio online :: ';
$lang['Reg_users_zero_total'] = 'nenhum usu�rio registrado, ';
$lang['Reg_users_total'] = '%d usu�rios registrados, ';
$lang['Reg_user_total'] = '%d usu�rio registrado, ';
$lang['Hidden_users_zero_total'] = 'nenhum invis�vel e ';
$lang['Hidden_user_total'] = '%d invis�vel e ';
$lang['Hidden_users_total'] = '%d invis�veis e ';
$lang['Guest_users_zero_total'] = 'nenhum visitante';
$lang['Guest_users_total'] = '%d visitantes';
$lang['Guest_user_total'] = '%d visitante';
$lang['Record_online_users'] = 'Recorde de usu�rios online foi de <b>%s</b> em %s'; // first %s = number of users, second %s is the date.

$lang['Admin_online_color'] = '%sAdministrador%s';
$lang['Mod_online_color'] = '%sModerador%s';

$lang['You_last_visit'] = 'A sua �ltima visita foi em %s'; // %s replaced by date/time
$lang['Current_time'] = 'Data: %s'; // %s replaced by time

$lang['Search_new'] = 'Ler mensagens desde sua �ltima visita';
$lang['Search_your_posts'] = 'Verificar as suas mensagens';
$lang['Search_unanswered'] = 'Ler mensagens sem resposta';

$lang['Register'] = 'Registrar';
$lang['Profile'] = 'Perfil';
$lang['Edit_profile'] = 'Editar o seu Perfil';
$lang['Search'] = 'Pesquisar';
$lang['Memberlist'] = 'Membros';
$lang['FAQ'] = 'FAQ';
$lang['BBCode_guide'] = 'Guia do BBcode';
$lang['Usergroups'] = 'Grupos';
$lang['Last_Post'] = '�ltima Mensagem';
$lang['Moderator'] = 'Moderador';
$lang['Moderators'] = 'Moderadores';


//
// Stats block text
//
$lang['Posted_articles_zero_total'] = 'H� atualmente um total de <b>0</b> mensagens'; // Number of posts
$lang['Posted_articles_total'] = 'Os nossos usu�rios colocaram um total de <b>%d</b> mensagens'; // Number of posts
$lang['Posted_article_total'] = 'Os nossos usu�rios colocaram um total de <b>%d</b> mensagens'; // Number of posts
$lang['Registered_users_zero_total'] = 'N�o temos <b>nenhum</b> usu�rio registrado'; // # registered users
$lang['Registered_users_total'] = 'Temos <b>%d</b> usu�rios registrados'; // # registered users
$lang['Registered_user_total'] = 'Temos <b>%d</b> usu�rios registrados'; // # registered users
$lang['Newest_user'] = 'Nosso mais novo usu�rio: <b>%s%s%s</b>'; // a href, username, /a

$lang['No_new_posts_last_visit'] = 'N�o h� novas mensagens desde a sua �ltima visita';
$lang['No_new_posts'] = 'N�o h� mensagens novas';
$lang['New_posts'] = 'Mensagens novas';
$lang['New_post'] = 'Mensagem nova';
$lang['No_new_posts_hot'] = 'N�o h� mensagens novas [Popular]';
$lang['New_posts_hot'] = 'Mensagens novas [Popular]';
$lang['No_new_posts_locked'] = 'N�o h� mensagens novas [Bloqueadas]';
$lang['New_posts_locked'] = 'Mensagens Novas [Bloqueadas]';
$lang['Forum_is_locked'] = 'F�rum Bloqueado';


//
// Login
//
$lang['Enter_password'] = 'Por favor, escreva o seu nome de Usu�rio e Senha para entrar';
$lang['Login'] = 'Login';
$lang['Logout'] = 'Sair';

$lang['Forgotten_password'] = 'Esqueci-me da senha';

$lang['Log_me_in'] = 'Permanecer Logado automaticamente em cada visita';

$lang['Error_login'] = 'Voc� especificou um nome de usu�rio incorreto ou inativo ou uma senha inv�lida';


//
// Index page
//
$lang['Index'] = '�ndice';
$lang['No_Posts'] = 'N�o h� mensagens';
$lang['No_forums'] = 'Este painel n�o possui f�runs';

$lang['Private_Message'] = 'Mensagem Particular';
$lang['Private_Messages'] = 'Mensagens Particulares';
$lang['Who_is_Online'] = 'Quem est� online';

$lang['Mark_all_forums'] = 'Assinalar todos os f�runs como lidos';
$lang['Forums_marked_read'] = 'Todos os f�runs foram selecionados como lidos';


//
// Viewforum
//
$lang['View_forum'] = 'Exibir F�rum';

$lang['Forum_not_exist'] = 'O f�rum selecionado n�o existe';
$lang['Reached_on_error'] = 'Voc� chegou a esta p�gina por erro';

$lang['Display_topics'] = 'Mostrar t�picos anteriores';
$lang['All_Topics'] = 'Todos os t�picos';

$lang['Topic_Announcement'] = '<b>An�ncio:</b>';
$lang['Topic_Sticky'] = '<b>Fixo:</b>';
$lang['Topic_Moved'] = '<b>Movido:</b>';
$lang['Topic_Poll'] = '<b>[Enquete]</b>';

$lang['Mark_all_topics'] = 'Selecionar todos os t�picos como lidos';
$lang['Topics_marked_read'] = 'Todos os t�picos neste f�rum est�o agora marcados como lidos';

$lang['Rules_post_can'] = 'Enviar Mensagens Novas: <b>Permitido</b>.';
$lang['Rules_post_cannot'] = 'Enviar Mensagens Novas: <b>Proibido</b>.';
$lang['Rules_reply_can'] = 'Responder T�picos: <b>Permitido</b>.';
$lang['Rules_reply_cannot'] = 'Responder T�picos <b>Proibido</b.>';
$lang['Rules_edit_can'] = 'Editar Mensagens: <b>Permitido</b>.';
$lang['Rules_edit_cannot'] = 'Editar Mensagens: <b>Proibido</b>.';
$lang['Rules_delete_can'] = 'Excluir Mensagens: <b>Permitido</b>.';
$lang['Rules_delete_cannot'] = 'Excluir Mensagens: <b>Proibido</b>.';
$lang['Rules_vote_can'] = 'Votar em Enquetes: <b>Permitido</b>.';
$lang['Rules_vote_cannot'] = 'Votar em Enquetes: <b>Proibido</b>.';
$lang['Rules_moderate'] = 'Moderar F�rum: <b>%sPermitido%s</b>.'; // %s replaced by a href links, do not remove!

$lang['No_topics_post_one'] = 'N�o h� mensagens neste f�rum<br/>Clique em <b>Novo T�pico</b> nesta p�gina para adicionar uma Mensagem Nova';


//
// Viewtopic
//
$lang['View_topic'] = 'Exibir t�pico';

$lang['Guest'] = 'Visitante';
$lang['Post_subject'] = 'Assunto';
$lang['View_next_topic'] = 'Exibir pr�xima mensagem';
$lang['View_previous_topic'] = 'Exibir mensagem anterior';
$lang['Submit_vote'] = 'Votar';
$lang['View_results'] = 'Exibir resultados';

$lang['No_newer_topics'] = 'N�o h� t�picos novos neste f�rum';
$lang['No_older_topics'] = 'N�o h� t�picos antigos neste f�rum';
$lang['Topic_post_not_exist'] = 'O t�pico ou mensagem que pretende exibir n�o existe';
$lang['No_posts_topic'] = 'N�o h� mensagens para este t�pico';

$lang['Display_posts'] = 'Mostrar os t�picos anteriores';
$lang['All_Posts'] = 'Todas as mensagens';
$lang['Newest_First'] = 'Recentes primeiro';
$lang['Oldest_First'] = 'Antigas primeiro';

$lang['Back_to_top'] = 'Voltar ao Topo';

$lang['Read_profile'] = 'Ver o perfil de Usu�rios';
$lang['Send_email'] = 'Enviar email ao Usu�rio';
$lang['Visit_website'] = 'Visitar a homepage do Usu�rio';
$lang['ICQ_status'] = 'Status do ICQ';
$lang['Edit_delete_post'] = 'Editar/Remover esta mensagem';
$lang['View_IP'] = 'Ver o IP do Usu�rio';
$lang['Delete_post'] = 'Excluir esta mensagem';

$lang['wrote'] = 'escreveu'; // proceeds the username and is followed by the quoted text
$lang['Quote'] = 'Cita��o'; // comes before bbcode quote output.
$lang['Code'] = 'C�digo'; // comes before bbcode code output.
$lang['PHPCode'] = 'C�digo PHP'; // PHP MOD

$lang['Edited_time_total'] = 'Editado pela �ltima vez por %s em %s, num total de %d vez'; // Last edited by me on 12 Oct 2001, edited 1 time in total
$lang['Edited_times_total'] = 'Editado pela �ltima vez por %s em %s, num total de %d vezes'; // Last edited by me on 12 Oct 2001, edited 2 times in total

$lang['Lock_topic'] = 'Bloquear este T�pico';
$lang['Unlock_topic'] = 'Desbloquear este T�pico';
$lang['Move_topic'] = 'Mover este t�pico';
$lang['Delete_topic'] = 'Excluir este t�pico';
$lang['Split_topic'] = 'Subdividir este t�pico';

$lang['Stop_watching_topic'] = 'Parar de observar este T�pico';
$lang['Start_watching_topic'] = 'Observar respostas a este T�pico';
$lang['No_longer_watching'] = 'Voc� n�o est� mais observando este T�pico';
$lang['You_are_watching'] = 'Voc� agora est� observando este T�pico';

$lang['Total_votes'] = 'Total de Votos';

//
// Posting/Replying (Not private messaging!)
//
$lang['Message_body'] = 'Corpo da messagem';
$lang['Topic_review'] = 'Rever o t�pico';

$lang['No_post_mode'] = 'N�o foi especificada a a��o para esta mensagem'; // If posting.php is called without a mode (newtopic/reply/delete/etc, shouldn't be shown normaly)

$lang['Post_a_new_topic'] = 'Novo T�pico';
$lang['Post_a_reply'] = 'Responder';
$lang['Post_topic_as'] = 'Colocar o t�pico como';
$lang['Edit_Post'] = 'Editar a mensagem';
$lang['Options'] = 'Op��es';

$lang['Post_Announcement'] = 'An�ncio';
$lang['Post_Sticky'] = 'Fixo';
$lang['Post_Normal'] = 'Normal';

$lang['Confirm_delete'] = 'Deseja realmente EXCLUIR esta mensagem?';
$lang['Confirm_delete_poll'] = 'Deseja realmente EXCLUIR esta enquete?';

$lang['Flood_Error'] = 'Voc� n�o pode colocar uma nova mensagem t�o rapidamente, por favor tente novamente daqui a pouco';
$lang['Empty_subject'] = 'Quando se coloca uma mensagem, deve ser especificado um ASSUNTO';
$lang['Empty_message'] = 'A MENSAGEM deve ser escrita';
$lang['Forum_locked'] = 'Este F�rum est� Bloqueado. Voc� n�o pode enviar, responder ou editar mensagens';
$lang['Topic_locked'] = 'Este T�pico est� Bloqueado. Voc� n�o pode editar mensagens ou responder';
$lang['No_post_id'] = 'Deve ser selecionada a Mensagem a ser editada';
$lang['No_topic_id'] = 'Deve ser selecionado o T�pico a responder';
$lang['No_valid_mode'] = 'Voc� pode apenas colocar, responder, editar ou citar mensagens, por favor volte e tente novamente';
$lang['No_such_post'] = 'Essa mensagem n�o existe, por favor volte e tente novamente';
$lang['Edit_own_posts'] = 'Voc� pode editar apenas suas pr�prias mensagens';
$lang['Delete_own_posts'] = 'Voc� apenas pode remover as suas pr�prias mensagens';
$lang['Cannot_delete_replied'] = 'Voc� n�o pode remover mensagens que possuam respostas';
$lang['Cannot_delete_poll'] = 'Voc� n�o pode remover uma Enquete em curso';
$lang['Empty_poll_title'] = 'Voc� deve escrever um T�tulo ou Pergunta para enquete';
$lang['To_few_poll_options'] = 'Dever� mencionar pelo menos duas Op��es de escolha para a enquete';
$lang['To_many_poll_options'] = 'Voc� tentou adicionar op��es demais na Enquete';
$lang['Post_has_no_poll'] = 'Esta mensagem n�o possui Enquete';

$lang['Already_voted'] = 'Voc� j� votou nesta enquete';
$lang['No_vote_option'] = 'Voc� precisa especificar uma op��o ao votar';

$lang['Add_poll'] = 'Adicionar Enquete';
$lang['Add_poll_explain'] = 'Se n�o pretende adicionar uma enquete ao seu t�pico deixe os espa�os abaixo em branco';
$lang['Poll_question'] = 'Pergunta ou T�tulo para a Enquete';
$lang['Poll_option'] = 'Op��o de escolha';
$lang['Add_option'] = 'Adicionar op��o de escolha para a enquete';
$lang['Update'] = 'Atualizar';
$lang['Delete'] = 'Remover';
$lang['Poll_for'] = 'Ativar a enquete por';
$lang['Days'] = 'Dias'; // This is used for the Run poll for ... Days + in admin_forums for pruning
$lang['Poll_for_explain'] = '[Escrever 0 ou deixar em branco para uma enquete sem tempo limite]';
$lang['Delete_poll'] = 'Excluir Enquete';

$lang['Disable_HTML_post'] = 'Desativar HTML nesta mensagem';
$lang['Disable_BBCode_post'] = 'Desativar BBCode nesta mensagem';
$lang['Disable_Smilies_post'] = 'Desativar Smileys nesta mensagem';

$lang['HTML_is_ON'] = 'HTML est� <u>Ativo</u>';
$lang['HTML_is_OFF'] = 'HTML est� <u>Inativo</u>';
$lang['BBCode_is_ON'] = '%sBBCode%s est� <u>Ativo</u>'; // %s are replaced with URI pointing to FAQ
$lang['BBCode_is_OFF'] = '%sBBCode%s est� <u>Inativo</u>';
$lang['Smilies_are_ON'] = 'Smileys est�o <u>Ativos</u>';
$lang['Smilies_are_OFF'] = 'Smileys est�o <u>Inativos</u>';

$lang['Attach_signature'] = 'Adicionar Assinatura (as assinaturas podem ser alteradas em Perfil)';
$lang['Notify'] = 'Notificar-me quando for respondida';
$lang['Delete_post'] = 'Excluir esta mensagem';

$lang['Stored'] = 'A sua mensagem foi enviada com sucesso';
$lang['Deleted'] = 'A sua mensagem foi exclu�da com sucesso';
$lang['Poll_delete'] = 'A sua enquete foi exclu�da com sucesso';
$lang['Vote_cast'] = 'O seu voto foi registrado';

$lang['Topic_reply_notification'] = 'Notifica��o de Resposta a T�pico';

$lang['bbcode_b_help'] = 'Negrito: [b]texto[/b]  (alt+b)';
$lang['bbcode_i_help'] = 'It�lico: [i]texto[/i]  (alt+i)';
$lang['bbcode_u_help'] = 'Sublinhado: [u]texto[/u]  (alt+u)';
$lang['bbcode_q_help'] = 'Cita��o: [quote]texto[/quote]  (alt+q)';
$lang['bbcode_c_help'] = 'C�digo: [code]c�digo[/code]  (alt+c)';
$lang['bbcode_l_help'] = 'Lista: [list]texto[/list] (alt+l)';
$lang['bbcode_o_help'] = 'Lista ordenada: [list=]texto[/list]  (alt+o)';
$lang['bbcode_p_help'] = 'Imagem: [img]http://url_da_imagem[/img]  (alt+p)';
$lang['bbcode_w_help'] = 'Inserir URL: [url]http://url[/url] ou [url=http://url]Texto da URL[/url]  (alt+w)';
$lang['bbcode_a_help'] = 'Fechar todas as tags de bbCode';
$lang['bbcode_s_help'] = 'Cor: [color=red]texto[/color]  Dica: voc� tamb�m pode usar color=#FF0000';
$lang['bbcode_f_help'] = 'Fonte: [size=x-small]texto pequeno[/size]';
$lang['bbcode_h_help'] = 'Sintaxe PHP. [php]<?php code ?>[/php] (alt+h)'; // PHP MOD

$lang['Emoticons'] = 'Emo��es';
$lang['More_emoticons'] = 'Ver mais �cones de emo��es (emoticons)';

$lang['Font_color'] = 'Cor do texto';
$lang['color_default'] = 'Padr�o';
$lang['color_dark_red'] = 'Vermelho Escuro';
$lang['color_red'] = 'Vermelho';
$lang['color_orange'] = 'Laranja';
$lang['color_brown'] = 'Castanho';
$lang['color_yellow'] = 'Amarelo';
$lang['color_green'] = 'Verde';
$lang['color_olive'] = 'Verde oliva';
$lang['color_cyan'] = 'Ciano';
$lang['color_blue'] = 'Azul';
$lang['color_dark_blue'] = 'Azul escuro';
$lang['color_indigo'] = 'Indigo';
$lang['color_violet'] = 'Violeta';
$lang['color_white'] = 'Branco';
$lang['color_black'] = 'Preto';

$lang['Font_size'] = 'Fonte';
$lang['font_tiny'] = 'Min�scula';
$lang['font_small'] = 'Pequena';
$lang['font_normal'] = 'Normal';
$lang['font_large'] = 'Grande';
$lang['font_huge'] = 'Enorme';

$lang['Close_Tags'] = 'Fechar Tags';
$lang['Styles_tip'] = 'Dica: Estilos podem ser aplicados rapidamente ao texto selecionado';


//
// Private Messaging

//
$lang['Private_Messaging'] = 'Mensagem Particular';

$lang['Read_pm'] = 'Ler Mensagem';
$lang['Post_new_pm'] = 'Enviar Mensagem';
$lang['Post_reply_pm'] = 'Responder � Mensagem';
$lang['Post_quote_pm'] = 'Citar Mensagem';
$lang['Edit_pm'] = 'Editar Mensagem';

$lang['Unread_message'] = 'Mensagem Lida';
$lang['Read_message'] = 'Mensagem N�o-Lida';

$lang['Login_check_pm'] = 'Entrar e ver Mensagens Particulares';
$lang['New_pms'] = 'Mensagens Particulares: %d novas'; // You have 2 new messages
$lang['New_pm'] = 'Mensagens Particulares: %d nova'; // You have 1 new message
$lang['No_new_pm'] = 'Mensagens Particulares novas: 0';
$lang['Unread_pms'] = 'Mensagens Particulares: %d n�o lidas';
$lang['Unread_pm'] = 'Mensagens Particulares: %d n�o lida';
$lang['No_unread_pm'] = 'Mensagens Particulares n�o lidas: 0';
$lang['You_new_pm'] = 'Mensagens Particulares novas na Caixa de Entrada: 1';
$lang['You_new_pms'] = 'H� Mensagens Particulares na Caixa de Entrada';
$lang['You_no_new_pm'] = 'Mensagens Particulares novas: 0';

$lang['Inbox'] = 'Caixa de Entrada';
$lang['Outbox'] = 'Caixa de Sa�da';
$lang['Savebox'] = 'Mensagens Salvas';
$lang['Sentbox'] = 'Mensagens Enviadas';
$lang['Flag'] = 'Sinaliza��o';
$lang['Subject'] = 'Assunto';
$lang['From'] = 'De';
$lang['To'] = 'Para';
$lang['Date'] = 'Data';
$lang['Mark'] = 'Selecionar';
$lang['Sent'] = 'Enviado';
$lang['Saved'] = 'Salvo';
$lang['Delete_marked'] = 'Remover selecionados';
$lang['Delete_all'] = 'Remover Tudo';
$lang['Save_marked'] = 'Guardar os assinalados';
$lang['Save_message'] = 'Guardar a Mensagem';
$lang['Delete_message'] = 'Excluir a Mensagem';

$lang['Display_messages'] = 'Exibir Mensagens dos �ltimos'; // Followed by number of days/weeks/months
$lang['All_Messages'] = 'Todas';

$lang['No_messages_folder'] = 'N�o h� mensagens nesta pasta';

$lang['PM_disabled'] = 'As Mensagens Particulares foram desativadas neste painel';
$lang['Cannot_send_privmsg'] = 'O administrador suspendeu a sua permiss�o de envio de Mensagens Particulares';
$lang['No_to_user'] = 'Voc� deve especificar um Usu�rio quando envia uma mensagem';
$lang['No_such_user'] = 'Esse Usu�rio n�o existe';

$lang['Disable_HTML_pm'] = 'Desativar HTML nesta mensagem';
$lang['Disable_BBCode_pm'] = 'Desativar BBCode nesta mensagem';
$lang['Disable_Smilies_pm'] = 'Desativar Smileys nesta mensagem';

$lang['Message_sent'] = 'A sua mensagem foi enviada';

$lang['Click_return_inbox'] = 'Clique %saqui%s para voltar � sua Caixa de Entrada';
$lang['Click_return_index'] = 'Clique %saqui%s para voltar ao �ndice';

$lang['Send_a_new_message'] = 'Enviar nova Mensagem Particular';
$lang['Send_a_reply'] = 'Enviar uma Resposta';
$lang['Edit_message'] = 'Editar Mensagem Particular';

$lang['Notification_subject'] = 'Chegou uma Mensagem Particular nova';

$lang['Find_username'] = 'Encontrar um Usu�rio';
$lang['Find'] = 'Encontrar';
$lang['No_match'] = 'Nenhuma Ocorr�ncia';

$lang['No_post_id'] = 'N�o foi especificado o ID da mensagem';
$lang['No_such_folder'] = 'Essa pasta n�o existe';
$lang['No_folder'] = 'N�o foi especificada a pasta';

$lang['Mark_all'] = 'Selecionar todas';
$lang['Unmark_all'] = 'Deselecionar todas';

$lang['Confirm_delete_pm'] = 'Deseja Realmente excluir esta mensagem?';
$lang['Confirm_delete_pms'] = 'Deseja Realmente excluir estas mensagens?';

$lang['Inbox_size'] = 'A sua Caixa de Entrada est� %d%% cheia'; // eg. Your Inbox is 50% full
$lang['Sentbox_size'] = 'A sua Caixa de Envio est� %d%% cheia';
$lang['Savebox_size'] = 'A sua Caixa de Reserva est� %d%% cheia';

$lang['Click_view_privmsg'] = 'Clique %saqui%s para ir � Caixa de Entrada';


//
// Profiles/Registration
//
$lang['Viewing_user_profile'] = 'Exibir Perfil :: %s'; // %s is username
$lang['About_user'] = 'Tudo sobre de %s'; // %s is username
$lang['User_admin_for'] = 'Administra��o de Usu�rios para %s'; // %s is username

$lang['Preferences'] = 'Prefer�ncias';
$lang['Items_required'] = 'Itens marcados com um * s�o necess�rios exceto quando especificado o contr�rio';
$lang['Registration_info'] = 'Informa��o de Registro';
$lang['Profile_info'] = 'Informa��o de Perfil';
$lang['Profile_info_warn'] = 'Esta informa��o ser� vis�vel publicamente';
$lang['Avatar_panel'] = 'Painel de controle de Avatar';
$lang['Avatar_gallery'] = 'Galeria de Avatar';

$lang['Website'] = 'P�gina/WWW';
$lang['Location'] = 'Localiza��o';
$lang['Contact'] = 'Contato';
$lang['Email_address'] = 'Endere�o de Email';
$lang['Email'] = 'Email';
$lang['Send_private_message'] = 'Enviar Mensagem Particular';
$lang['Hidden_email'] = '[Invis�vel]';
$lang['Search_user_posts'] = 'Procurar mensagens deste Usu�rio';
$lang['Interests'] = 'Interesses';
$lang['Occupation'] = 'Ocupa��o';
$lang['Poster_rank'] = 'Rank do Escritor';

$lang['Total_posts'] = 'Total de Mensagens';
$lang['User_post_pct_stats'] = '%.2f%% do total'; // 1.25% of total
$lang['User_post_day_stats'] = '%.2f mensagens por dia'; // 1.5 posts per day
$lang['Search_user_posts'] = 'Encontrar todas as mensagens de %s'; // Find all posts by username

$lang['No_user_id_specified'] = 'Este Usu�rio n�o existe';
$lang['Wrong_Profile'] = 'Voc� n�o pode modificar um Perfil que n�o lhe pertence.';

$lang['Only_one_avatar'] = 'Apenas tipo de avatar pode ser especificado.';
$lang['File_no_data'] = 'O arquivo da URL fornecida n�o possui dados';
$lang['No_connection_URL'] = 'N�o foi poss�vel estabelecer uma conex�o � URL fornecida';
$lang['Incomplete_URL'] = 'A URL fornecida est� incompleta';
$lang['Wrong_remote_avatar_format'] = 'A URL do avatar remoto n�o � v�lida';
$lang['No_send_account_inactive'] = 'A sua senha n�o pode ser recuperada porque o seu registro encontra-se atualmente Inativo. Por favor, contacte o administrador do f�rum para mais informa��es';

$lang['Always_smile'] = 'Sempre ativar os Smileys';
$lang['Always_html'] = 'Sempre permitir HTML';
$lang['Always_bbcode'] = 'Sempre permitir BBCode';
$lang['Always_add_sig'] = 'Sempre anexar minha assinatura';
$lang['Always_notify'] = 'Sempre notificar-me quando houver respostas';
$lang['Always_notify_explain'] = 'Envia-lhe um email quando algu�m responde a uma mensagem que voc� tenha enviado. Isto pode ser alterado sempre que escrever uma mensagem.';

$lang['Board_style'] = 'Estilo do Painel';
$lang['Board_lang'] = 'L�ngua do Painel';
$lang['No_themes'] = 'Nenhum tema no Banco de Dados';
$lang['Timezone'] = 'Fuso Hor�rio';
$lang['Date_format'] = 'Formato da Data';
$lang['Date_format_explain'] = 'A sintaxe usada � id�ntica � fun��o PHP <a href="http://www.php.net/date" target="_other">date()</a> ';
$lang['Signature'] = 'Assinatura';
$lang['Signature_explain'] = 'Isto � um bloco de texto que pode ser adicionado �s mensagens que voc� enviar. H� um limite de %d caracteres';
$lang['Public_view_email'] = 'Sempre exibir meu endere�o de Email';

$lang['Current_password'] = 'Senha atual';
$lang['New_password'] = 'Senha nova';
$lang['Confirm_password'] = 'Confirmar senha';
$lang['Confirm_password_explain'] = 'Voc� precisa confirmar sua senha atual caso pretenda mud�-la ou alterar o endere�o de email';
$lang['password_if_changed'] = 'Voc� deve apenas fornecer uma nova senha caso pretenda mud�-la';
$lang['password_confirm_if_changed'] = 'Voc� deve apenas confirmar sua nova senha caso a tenha alterado acima';

$lang['Avatar'] = 'Avatar';
$lang['Avatar_explain'] = 'Exibe uma pequena imagem gr�fica abaixo de seus detalhes nas mensagens. Apenas uma imagem pode ser mostrada de cada vez, a largura n�o pode exceder %d pixels, a altura n�o pode ser superior a %d pixels e o tamanho do arquivo n�o pode ser superior a %dkB.'; $lang['Upload_Avatar_file'] = 'Enviar Avatar do seu computador';
$lang['Upload_Avatar_URL'] = 'Enviar Avatar a partir de uma URL';
$lang['Upload_Avatar_URL_explain'] = 'Escrever a URL do local contendo o Avatar, para ser copiado para a p�gina.';
$lang['Pick_local_Avatar'] = 'Selecionar um Avatar da galeria';
$lang['Link_remote_Avatar'] = 'Usar um Avatar fora desta p�gina';
$lang['Link_remote_Avatar_explain'] = 'Escrever a URL do local contendo o Avatar que pretende que seja exibido.';
$lang['Avatar_URL'] = 'URL da imagem Avatar';
$lang['Select_from_gallery'] = 'Selecionar um Avatar da galeria';
$lang['View_avatar_gallery'] = 'Exibir a galeria';

$lang['Select_avatar'] = 'Selecionar um avatar';
$lang['Return_profile'] = 'Cancelar o avatar';
$lang['Select_category'] = 'Selecionar uma categoria';

$lang['Delete_Image'] = 'Remover a imagem';
$lang['Current_Image'] = 'Imagem atual';

$lang['Notify_on_privmsg'] = 'Notificar-me por email quando houver Mensagens Particulares novas';
$lang['Popup_on_privmsg'] = 'Avisar-me em janela pop-up quando houver Mensagens Particulares novas';
$lang['Popup_on_privmsg_explain'] = 'Surgir� uma pequena janela avisando-o caso uma Mensagem Particular seja enviada.';
$lang['Hide_user'] = 'Ocultar meu status Online';

$lang['Profile_updated'] = 'O seu perfil foi atualizado';
$lang['Profile_updated_inactive'] = 'O seu perfil foi atualizado, entretanto voc� alterou detalhes vitais e como tal o seu registo est� Inativo. Verifique o seu email para saber como reativar o registo, ou se for necess�ria a reativa��o pelo administrador aguarde que tal seja feito';
$lang['Already_activated'] = 'Voc� j� ativou sua conta';

$lang['Password_mismatch'] = 'As Senhas digitadas n�o coincidem';
$lang['Current_password_mismatch'] = 'A Senha fornecida n�o � igual � registrada no Banco de Dados';
$lang['Password_long'] = 'A sua Senha n�o pode ter mais que 32 caracteres';
$lang['Username_taken'] = 'Este nome de Usu�rio j� est� em uso';
$lang['Username_invalid'] = 'Este nome de Usu�rio cont�m algum caracter inv�lido, tal como "';
$lang['Username_disallowed'] = 'N�o � permitido o uso deste nome de Usu�rio';
$lang['Email_taken'] = 'Esse endere�o de email j� se encontra registrado por outro Usu�rio';
$lang['Email_banned'] = 'Este endere�o de email encontra-se Banido';
$lang['Email_invalid'] = 'Este endere�o de email � Inv�lido';
$lang['Signature_too_long'] = 'A sua assinatura � muito grande';
$lang['Fields_empty'] = 'Deve preencher os espa�os solicitados';
$lang['Avatar_filetype'] = 'O tipo de arquivo do avatar dever� ser .jpg, .gif ou .png';
$lang['Avatar_filesize'] = 'O tamanho do arquivo do avatar tem que ser inferior a %d kB'; // The avatar image file size must be less than 6 kB
$lang['Avatar_imagesize'] = 'O avatar tem que ser inferior a %d pixels de largura e %d pixels de altura';

$lang['Welcome_subject'] = 'Bem-vindo ao F�rum %s'; // Welcome to my.com forums
$lang['New_account_subject'] = 'Novo Usu�rio Registrado';
$lang['Account_activated_subject'] = 'Registo Ativado';

$lang['Account_added'] = 'Obrigado por ter registrado, o seu registo foi criado. Voc� pode logar-se com o seu nome de Usu�rio e respectiva Senha';
$lang['Account_inactive'] = 'O seu registro foi criado. Este f�rum requer que o seu registro seja ativado, portanto uma senha foi enviada para o endere�o de email fornecido. Por favor verifique o seu email para mais informa��es';
$lang['Account_inactive_admin'] = 'O seu registo foi criado. Contudo este f�rum requer que o mesmo seja ativado pelo administrador. O Pedido foi-lhe enviado e voc� ser� informado quando o seu registo for ativado';
$lang['Account_active'] = 'O seu registro foi ativado. Obrigado por ter se registrado';
$lang['Account_active_admin'] = 'O seu registro agora foi ativado';
$lang['Reactivate'] = 'Reativar Registro!';
$lang['COPPA'] = 'O seu registro foi criado mas deve ser aprovado, por favor verifique o seu email para mais detalhes.';

$lang['Registration'] = 'Condi��es de Aceita��o de Registro';
$lang['Reg_agreement'] = 'Apesar dos administradores e moderadores deste f�rum tentarem remover ou editar qualquer material indesej�vel logo que detectado, � imposs�vel rever todas as mensagens. Como tal voc� reconhece que todas as mensagens eenviadas nos f�runs expressam os pontos de vista e opini�es dos seus respectivos autores e n�o dos administradores, moderadores ou os encarregados das p�ginas (exceto mensagens colocadas por essas pessoas) n�o sendo por tal respons�veis.<br/><br/>Voc� aceita <b>n�o colocar qualquer mensagem abusiva, obscena, vulgar, insultuosa, de �dio, amea�adora, sexualmente tendenciosa ou qualquer outro material que possa violar qualquer lei aplic�vel. Tal acontecendo implicar� em sua expuls�o imediata e permanente</b>. <b>Os endere�os de IP de todas as mensagens s�o registrados para ajudar a implementar essas condi��es.</b> Voc� concorda que quem faz e mant�m estas p�ginas, administradores e moderadores deste f�rum t�m o direito de remover, editar, mover ou encerrar qualquer t�pico em qualquer momento que eles assim o decidam e seja impl�cito. Como Usu�rio voc� aceita que qualquer informa��o que forneceu acima seja guardada num Banco de Dados. Apesar dessa informa��o n�o ser fornecida a terceiros sem a sua autoriza��o, o encarregado das p�ginas, administradores ou moderadores n�o podem assumir a responsabilidade por qualquer tentativa ou ato de \'hacking\', intromiss�o for�ada e ilegal que conduza a exposi��o dessa informa��o.<br/><br/>Este sistema de f�runs usa \'cookies\' para guardar informa��o no seu computador. Esses \'cookies\' n�o poss�em nenhuma das informa��es acima fornecidas, apenas servem para melhorar o seu conforto enquanto visita estes f�runs. O endere�o de email � apenas usado para confirmar a informa��o do seu registro e a Senha (bem como para enviar novas senhas caso se esque�a da que acabou de enviar).<br/><br/>Ao clicar abaixo para prosseguir com o registro voc� concorda em seguir estas condi��es.';

$lang['Agree_under_13'] = 'Aceito estes termos e tenho  <b>menos que</b> 13 anos de idade';
$lang['Agree_over_13'] = 'Aceito estes termos e tenho <b>mais que</b> ou <b>exatamente</b> 13 anos de idade';
$lang['Agree_not'] = 'N�o aceito estes termos';

$lang['Wrong_activation'] = 'A senha de ativa��o fornecida n�o coincide com nenhuma que se encontra no Banco de Dados';
$lang['Send_password'] = 'Envie-me uma nova senha';
$lang['Password_updated'] = 'Uma senha nova foi criada, por favor verifique o seu email para detalhes de como ativ�-la';
$lang['No_email_match'] = 'O endere�o de email fornecido n�o � igual ao que se encontra designado para esse nome de Usu�rio';
$lang['New_password_activation'] = 'Ativa��o de Nova Senha';
$lang['Password_activated'] = 'O seu registro foi reativado. Para logar-se use a senha que foi fornecida no email que recebeu';

$lang['Send_email_msg'] = 'Enviar Email';
$lang['No_user_specified'] = 'N�o foi especificado um Usu�rio';
$lang['User_prevent_email'] = 'Este Usu�rio n�o pretende receber email. Tente enviar-lhe uma Mensagem Particular';
$lang['User_not_exist'] = 'Esse Usu�rio n�o existe';
$lang['CC_email'] = 'Enviar uma c�pia deste email para si pr�prio';
$lang['Email_message_desc'] = 'Esta mensagem ser� enviada em texto, por favor n�o inclua qualquer c�digo HTML ou BBCode. Para o endere�o de devolu��o ser� colocado o seu endere�o de email.';
$lang['Flood_email_limit'] = 'Voc� n�o pode enviar outro email neste momento, tente novamente mais tarde';
$lang['Recipient'] = 'Destinat�rio';
$lang['Email_sent'] = 'O email foi enviado';
$lang['Send_email'] = 'Enviar Email';
$lang['Empty_subject_email'] = 'Voc� deve especificar um assunto para o email';
$lang['Empty_message_email'] = 'Voc� deve escrever uma mensagem a ser enviada no email';


//
// Memberslist
//
$lang['Select_sort_method'] = 'Forma de Ordena��o';
$lang['Sort'] = 'Ordenar por';
$lang['Sort_Top_Ten'] = 'Top 10 autores';
$lang['Sort_Joined'] = 'Data de registro';
$lang['Sort_Username'] = 'Usu�rio';
$lang['Sort_Location'] = 'Localiza��o';
$lang['Sort_Posts'] = 'Total de mensagens';
$lang['Sort_Email'] = 'Email';
$lang['Sort_Website'] = 'Homepage';
$lang['Sort_Ascending'] = 'crescente';
$lang['Sort_Descending'] = 'decrescente';
$lang['Order'] = 'Ordem';


//
// Group control panel
//
$lang['Group_Control_Panel'] = 'Painel de controle de Grupos';
$lang['Group_member_details'] = 'Detalhes de Membros de Grupos';
$lang['Group_member_join'] = 'Entrar no Grupo';

$lang['Group_Information'] = 'Informa��o do Grupo';
$lang['Group_name'] = 'Nome do Grupo';
$lang['Group_description'] = 'Descri��o do Grupo';
$lang['Group_membership'] = 'Membros Registrados';
$lang['Group_Members'] = 'Membros do Grupo';
$lang['Group_Moderator'] = 'Moderador do Grupo';
$lang['Pending_members'] = 'Registros pendentes';

$lang['Group_type'] = 'Tipo de Grupo';
$lang['Group_open'] = 'Grupo Aberto';
$lang['Group_closed'] = 'Grupo Fechado';
$lang['Group_hidden'] = 'Grupo Invis�vel';

$lang['Current_memberships'] = 'Grupos Existentes';
$lang['Non_member_groups'] = 'Grupos de N�o-membros';
$lang['Memberships_pending'] = 'Registo de membro pendente';

$lang['No_groups_exist'] = 'N�o existem Grupos';
$lang['Group_not_exist'] = 'Esse Grupo de Usu�rios n�o existe';

$lang['Join_group'] = 'Entrar no Grupo';
$lang['No_group_members'] = 'Este Grupo n�o possui membros';
$lang['Group_hidden_members'] = 'Este Grupo encontra-se invis�vel, n�o pode ver os seus membros';
$lang['No_pending_group_members'] = 'Este Grupo n�o possui membros pendentes';
$lang["Group_joined"] = 'Voc� inscreveu-se neste Grupo com sucesso.<br/>Voc� ser� notificado quando a sua inscri��o for aprovada pelo Moderador de Grupo';
$lang['Group_request'] = 'Foi feito um pedido para sua inscri��o no Grupo';
$lang['Group_approved'] = 'O seu pedido foi aceito';
$lang['Group_added'] = 'Voc� foi adicionado a este Grupo de Usu�rios';
$lang['Already_member_group'] = 'Voc� j� � membro deste Grupo';
$lang['User_is_member_group'] = 'O Usu�rio j� � membro deste grupo';
$lang['Group_type_updated'] = 'Tipo de Grupo atualizado com sucesso';

$lang['Could_not_add_user'] = 'O Usu�rio selecionado n�o existe';
$lang['Could_not_anon_user'] = 'Voc� n�o pode colocar um An�nimo como Membro de Grupo';

$lang['Confirm_unsub'] = 'Deseja realmente excluir a sua inscri��o deste Grupo?';
$lang['Confirm_unsub_pending'] = 'A sua inscri��o neste Grupo ainda n�o foi aprovada, deseja realmente excluir a sua inscri��o?';

$lang['Unsub_success'] = 'Sua inscri��o neste grupo foi exclu�da.';

$lang['Approve_selected'] = 'Aprovar Selecionados';
$lang['Deny_selected'] = 'Recusar Selecionados';
$lang['Not_logged_in'] = 'Voc� deve estar online para entrar no grupo.';
$lang['Remove_selected'] = 'Remover Selecionados';
$lang['Add_member'] = 'Adicionar um Membro';
$lang['Not_group_moderator'] = 'Voc� n�o � moderador deste Grupo e como tal n�o pode efetuar esta fun��o.';

$lang['Login_to_join'] = 'Logue-se para entrar ou dar manuten��o � lista de membros do Grupo';
$lang['This_open_group'] = 'Este Grupo est� aberto, clique para solicitar ser membro';
$lang['This_closed_group'] = 'Este Grupo est� fechado, n�o s�o aceitos mais Usu�rios.';
$lang['This_hidden_group'] = 'Este Grupo est� invis�vel, n�o s�o permitidas adi��es autom�ticas.';
$lang['Member_this_group'] = 'Voc� � membro deste Grupo';
$lang['Pending_this_group'] = 'O seu registro de membro neste Grupo est� pendente';
$lang['Are_group_moderator'] = 'Voc� � moderador deste Grupo';
$lang['None'] = 'Nenhum';

$lang['Subscribe'] = 'Inscrever';
$lang['Unsubscribe'] = 'Remover Inscri��o';
$lang['View_Information'] = 'Exibir Informa��o';


//
// Search
//
$lang['Search_query'] = 'Termos de Pesquisa';
$lang['Search_options'] = 'Op��es de Pesquisa';

$lang['Search_keywords'] = 'Pesquisar por palavras-chave';
$lang['Search_keywords_explain'] = 'Pode usar os operadores boleanos <u>AND</u> para definir palavras que tenham que constar no resultado, <u>OR</u> para definir palavras que possam constar no resultado e <u>NOT</u> para definir palavras que n�o devam constar no resultado. Pode usar asteriscos \'*\' para obter palavras por aproxima��o';
$lang['Search_author'] = 'Pesquisar por Autor';
$lang['Search_author_explain'] = 'Pode usar asteriscos \'*\' para obter palavras por aproxima��o';

$lang['Search_for_any'] = 'Pesquisar por qualquer dos termos ou como est� descrito';
$lang['Search_for_all'] = 'Pesquisar por todos os termos';
$lang['Search_title_msg'] = 'Pesquisar em t�tulos de t�picos e texto de mensagens';
$lang['Search_msg_only'] = 'Pesquisar apenas em texto de mensagens';

$lang['Return_first'] = 'Mostrar os primeiros'; // followed by xxx characters in a select box
$lang['characters_posts'] = 'caracteres de mensagens';

$lang['Search_previous'] = 'Pesquisar �ltimos'; // followed by days, weeks, months, year, all in a select box

$lang['Sort_by'] = 'Ordenar por';
$lang['Sort_Time'] = 'Data da Mensagem';
$lang['Sort_Post_Subject'] = 'Assunto';
$lang['Sort_Topic_Title'] = 'T�tulo do T�pico';
$lang['Sort_Author'] = 'Autor';
$lang['Sort_Forum'] = 'F�rum';

$lang['Display_results'] = 'Mostrar resultados como';
$lang['All_available'] = 'Todos os dispon�veis';
$lang['No_searchable_forums'] = 'Voc� n�o possui autoriza��o para fazer pesquisa nestas p�ginas';

$lang['No_search_match'] = 'N�o h� t�picos ou mensagens que coincidam com os crit�rios de pesquisa';
$lang['Found_search_match'] = '%d item Encontrado'; // eg. Search found 1 match
$lang['Found_search_matches'] = '%d itens Encontrados'; // eg. Search found 24 matches

$lang['Close_window'] = 'Fechar Janela';


//
// Auth related entries
//
// Note the %s will be replaced with one of the following 'user' arrays
$lang['Sorry_auth_announce'] = 'Apenas %s podem anunciar neste f�rum';
$lang['Sorry_auth_sticky'] = 'Apenas %s podem colocar mensagens fixas neste f�rum';
$lang['Sorry_auth_read'] = 'Apenas %s podem ler t�picos neste f�rum';
$lang['Sorry_auth_post'] = 'Apenas %s podem colocar t�picos neste f�rum';
$lang['Sorry_auth_reply'] = 'Apenas %s podem responder a mensagens neste f�rum';
$lang['Sorry_auth_edit'] = 'Apenas %s podem editar mensagens neste f�rum';
$lang['Sorry_auth_delete'] = 'Apenas %s podem remover mensagens neste f�rum';
$lang['Sorry_auth_vote'] = 'Apenas %s podem votar neste f�rum';

// These replace the %s in the above strings
$lang['Auth_Anonymous_Users'] = '<b>usu�rios an�nimos</b>';
$lang['Auth_Registered_Users'] = '<b>usu�rios registrados</b>';
$lang['Auth_Users_granted_access'] = '<b>usu�rios com acesso especial</b>';
$lang['Auth_Moderators'] = '<b>moderadores</b>';
$lang['Auth_Administrators'] = '<b>administradores</b>';

$lang['Not_Moderator'] = 'Voc� n�o � moderador deste f�rum';
$lang['Not_Authorised'] = 'N�o autorizado';

$lang['You_been_banned'] = 'Voc� foi expulso deste f�rum<br/>Contacte o webmaster ou o administrador para mais informa��es';


//
// Viewonline
//
$lang['Reg_users_zero_online'] = 'N�o h� usu�rios online e '; // There ae 5 Registered and
$lang['Reg_users_online'] = 'H� %d usu�rios online e '; // There ae 5 Registered and
$lang['Reg_user_online'] = 'H� %d usu�rio online e '; // There ae 5 Registered and
$lang['Hidden_users_zero_online'] = 'n�o h� usu�rios em modo invis�vel'; // 6 Hidden users online
$lang['Hidden_users_online'] = '%d usu�rios online em modo invis�vel'; // 6 Hidden users online
$lang['Hidden_user_online'] = '%d usu�rio online em modo invis�vel'; // 6 Hidden users online
$lang['Guest_users_online'] = 'H� %d visitantes online'; // There are 10 Guest users online
$lang['Guest_users_zero_online'] = 'N�o h� visitantes online'; // There are 10 Guest users online
$lang['Guest_user_online'] = 'H� %d visitante online'; // There is 1 Guest user online
$lang['No_users_browsing'] = 'Atualmente n�o h� nenhum usu�rio navegando neste f�rum';

$lang['Online_explain'] = 'Esta informa��o � baseada em Usu�rios Ativos nos �ltimos cinco minutos';

$lang['Forum_Location'] = 'Local do F�rum';
$lang['Last_updated'] = '�ltima Atualiza��o';

$lang['Forum_index'] = '�ndice do F�rum';
$lang['Logging_on'] = 'Online';
$lang['Posting_message'] = 'Colocando mensagens';
$lang['Searching_forums'] = 'Pesquisando os F�runs';
$lang['Viewing_profile'] = 'Verificando Perfil';
$lang['Viewing_online'] = 'Vendo quem se encontra online';
$lang['Viewing_member_list'] = 'Vendo a lista de membros';
$lang['Viewing_priv_msgs'] = 'Vendo Mensagens Particulares';
$lang['Viewing_FAQ'] = 'Vendo FAQ - Quest�es Mais Freq�entes';


//
// Moderator Control Panel
//
$lang['Mod_CP'] = 'Painel de Controle de Moderador';
$lang['Mod_CP_explain'] = 'Usando o formul�rio abaixo voc� pode efetuar opera��es de modera��o em massa neste f�rum. Pode bloquear, desbloquear, mover ou excluir qualquer quantidade de t�picos.';

$lang['Select'] = 'Selecionar';
$lang['Delete'] = 'Excluir';
$lang['Move'] = 'Mover';
$lang['Lock'] = 'Bloquear';
$lang['Unlock'] = 'Desbloquear';

$lang['Topics_Removed'] = 'Os t�picos selecionados foram exclu�dos do banco de dados com sucesso.';
$lang['Topics_Locked'] = 'Os t�picos selecionados foram bloqueados';
$lang['Topics_Moved'] = 'Os t�picos selecionados foram movidos';
$lang['Topics_Unlocked'] = 'Os t�picos selecionados foram desbloqueados';
$lang['No_Topics_Moved'] = 'Nenhum t�pico foi movido';

$lang['Confirm_delete_topic'] = 'Deseja realmente remover o(s) t�pico(s) selecionado(s)?';
$lang['Confirm_lock_topic'] = 'Deseja realmente bloquear o(s) t�pico(s) selecionado(s)?';
$lang['Confirm_unlock_topic'] = 'Deseja realmente desbloquear o(s) t�pico(s) selecionado(s)?';
$lang['Confirm_move_topic'] = 'Deseja realmente mover o(s) t�pico(s) selecionado(s)?';

$lang['Move_to_forum'] = 'Mover para f�rum';
$lang['Leave_shadow_topic'] = 'Deixar um T�pico Fantasma no f�rum anterior.';

$lang['Split_Topic'] = 'Painel de Controle de Subdivis�o de T�pico';
$lang['Split_Topic_explain'] = 'Usando o formul�rio abaixo pode subdividir um t�pico em dois, tanto selecionando as mensagens individualmente como dividindo uma mensagem selecionada';
$lang['Split_title'] = 'T�tulo de T�pico Novo';
$lang['Split_forum'] = 'F�rum para o Novo T�pico';
$lang['Split_posts'] = 'Subdividir as mensagens selecionadas';
$lang['Split_after'] = 'Subdividir a partir das mensagem selecionada';
$lang['Topic_split'] = 'O t�pico selecionado foi subdividido com sucesso';

$lang['Too_many_error'] = 'Voc� selecionou mensagens demais. Voc� pode selecionar apenas uma mensagem para depois subdividir um t�pico!';

$lang['None_selected'] = 'Voc� n�o selecionou nenhum t�pico para efetuar esta opera��o. Por favor volte atr�s e escolha pelo menos um.';
$lang['New_forum'] = 'Novo F�rum';

$lang['This_posts_IP'] = 'IP para esta mensagem';
$lang['Other_IP_this_user'] = 'Outros IP\'s que este Usu�rio usou para colocar mensagens';
$lang['Users_this_IP'] = 'Usu�rios que colocam mensagens a partir deste IP';
$lang['IP_info'] = 'Informa��o de IP';
$lang['Lookup_IP'] = 'Verificar IP';


//
// Timezones ... for display on each page
//
$lang['All_times'] = 'Todos os hor�rios s�o %s'; // eg. All times are GMT - 12 Hours (times from next block)

$lang['-12'] = 'GMT - 12 Hours';
$lang['-11'] = 'GMT - 11 Hours';
$lang['-10'] = 'GMT - 10 Hours';
$lang['-9'] = 'GMT - 9 Hours';
$lang['-8'] = 'GMT - 8 Hours';
$lang['-7'] = 'GMT - 7 Hours';
$lang['-6'] = 'GMT - 6 Hours';
$lang['-5'] = 'GMT - 5 Hours';
$lang['-4'] = 'GMT - 4 Hours';
$lang['-3.5'] = 'GMT - 3.5 Hours';
$lang['-3'] = 'GMT - 3 Hours';
$lang['-2'] = 'GMT - 2 Hours';
$lang['-1'] = 'GMT - 1 Hours';
$lang['0'] = 'GMT';
$lang['1'] = 'GMT + 1 Hour';
$lang['2'] = 'GMT + 2 Hours';
$lang['3'] = 'GMT + 3 Hours';
$lang['3.5'] = 'GMT + 3.5 Hours';
$lang['4'] = 'GMT + 4 Hours';
$lang['4.5'] = 'GMT + 4.5 Hours';
$lang['5'] = 'GMT + 5 Hours';
$lang['5.5'] = 'GMT + 5.5 Hours';
$lang['6'] = 'GMT + 6 Hours';
$lang['6.5'] = 'GMT + 6.5 Hours';
$lang['7'] = 'GMT + 7 Hours';
$lang['8'] = 'GMT + 8 Hours';
$lang['9'] = 'GMT + 9 Hours';
$lang['9.5'] = 'GMT + 9.5 Hours';
$lang['10'] = 'GMT + 10 Hours';
$lang['11'] = 'GMT + 11 Hours';
$lang['12'] = 'GMT + 12 Hours';

// These are displayed in the timezone select box
$lang['tz']['-12'] = 'GMT - 12 Hours';
$lang['tz']['-11'] = 'GMT - 11 Hours';
$lang['tz']['-10'] = 'GMT - 10 Hours';
$lang['tz']['-9'] = 'GMT - 9 Hours';
$lang['tz']['-8'] = 'GMT - 8 Hours';
$lang['tz']['-7'] = 'GMT - 7 Hours';
$lang['tz']['-6'] = 'GMT - 6 Hours';
$lang['tz']['-5'] = 'GMT - 5 Hours';
$lang['tz']['-4'] = 'GMT - 4 Hours';
$lang['tz']['-3.5'] = 'GMT - 3.5 Hours';
$lang['tz']['-3'] = 'GMT - 3 Hours';
$lang['tz']['-2'] = 'GMT - 2 Hours';
$lang['tz']['-1'] = 'GMT - 1 Hours';
$lang['tz']['0'] = 'GMT';
$lang['tz']['1'] = 'GMT + 1 Hour';
$lang['tz']['2'] = 'GMT + 2 Hours';
$lang['tz']['3'] = 'GMT + 3 Hours';
$lang['tz']['3.5'] = 'GMT + 3.5 Hours';
$lang['tz']['4'] = 'GMT + 4 Hours';
$lang['tz']['4.5'] = 'GMT + 4.5 Hours';
$lang['tz']['5'] = 'GMT + 5 Hours';
$lang['tz']['5.5'] = 'GMT + 5.5 Hours';
$lang['tz']['6'] = 'GMT + 6 Hours';
$lang['tz']['6.5'] = 'GMT + 6.5 Hours';
$lang['tz']['7'] = 'GMT + 7 Hours';
$lang['tz']['8'] = 'GMT + 8 Hours';
$lang['tz']['9'] = 'GMT + 9 Hours';
$lang['tz']['9.5'] = 'GMT + 9.5 Hours';
$lang['tz']['10'] = 'GMT + 10 Hours';
$lang['tz']['11'] = 'GMT + 11 Hours';
$lang['tz']['12'] = 'GMT + 12 Hours';

$lang['datetime']['Sunday'] = 'Domingo';
$lang['datetime']['Monday'] = 'Segunda-Feira';
$lang['datetime']['Tuesday'] = 'Ter�a-Feira';
$lang['datetime']['Wednesday'] = 'Quarta-Feira';
$lang['datetime']['Thursday'] = 'Quinta-Feira';
$lang['datetime']['Friday'] = 'Sexta-Feira';
$lang['datetime']['Saturday'] = 'S�bado';
$lang['datetime']['Sun'] = 'Dom';
$lang['datetime']['Mon'] = 'Seg';
$lang['datetime']['Tue'] = 'Ter';
$lang['datetime']['Wed'] = 'Qua';
$lang['datetime']['Thu'] = 'Qui';
$lang['datetime']['Fri'] = 'Sex';
$lang['datetime']['Sat'] = 'S�b';
$lang['datetime']['January'] = 'Janeiro';
$lang['datetime']['February'] = 'Fevereiro';
$lang['datetime']['March'] = 'Mar�o';
$lang['datetime']['April'] = 'Abril';
$lang['datetime']['May'] = 'Maio';
$lang['datetime']['June'] = 'Junho';
$lang['datetime']['July'] = 'Julho';
$lang['datetime']['August'] = 'Agosto';
$lang['datetime']['September'] = 'Setembro';
$lang['datetime']['October'] = 'Outubro';
$lang['datetime']['November'] = 'Novembro';
$lang['datetime']['December'] = 'Dezembro';
$lang['datetime']['Jan'] = 'Jan';
$lang['datetime']['Feb'] = 'Fev';
$lang['datetime']['Mar'] = 'Mar';
$lang['datetime']['Apr'] = 'Abr';
$lang['datetime']['May'] = 'Mai';
$lang['datetime']['Jun'] = 'Jun';
$lang['datetime']['Jul'] = 'Jul';
$lang['datetime']['Aug'] = 'Ago';
$lang['datetime']['Sep'] = 'Set';
$lang['datetime']['Oct'] = 'Out';
$lang['datetime']['Nov'] = 'Nov';
$lang['datetime']['Dec'] = 'Dez';

// Global Announcment MOD
$lang['Topic_global_announcement'] = '<b>An�ncio Global:</b>';
$lang['Post_global_announcement'] = 'An�ncio Global';

$lang['Sort_Level'] = 'N�vel';
$lang['Level'] = 'N�vel';

//
// Language variables for the Real Names Mod
//

$lang['real_name'] = 'Nome Real';
$lang['real_name_viewable'] = '[Isso <b>n�o ser�</b> divulgado publicamente!]';

//
// Errors (not related to a
// specific failure on a page)
//
$lang['Information'] = 'Informa��o';
$lang['Critical_Information'] = 'Informa��o Cr�tica';

$lang['General_Error'] = 'Erro Geral';
$lang['Critical_Error'] = 'Erro Cr�tico';
$lang['An_error_occured'] = 'Ocorreu um Erro';
$lang['A_critical_error'] = 'Ocorreu um Erro Cr�tico';

//add to last visit mod
$lang['Last_logon'] = '�ltima Visita';
$lang['Hidde_last_logon'] = 'Oculto';
$lang['Never_last_logon'] = 'Nunca';
$lang['Users_today_explain'] = 'O(s) seguinte(s) %d usu�rios visitaram o f�rum hoje.';

// add to yellow card mod
$lang['Give_G_card']='Reativar Usu�rio';
$lang['Give_Y_card']='Dar ao usu�rio o %d� aviso';
$lang['Give_R_card']='Expulsar esse Usu�rio agora';
$lang['Ban_update_sucessful'] = 'A lista de expuls�es foi atualizada com �xito';
$lang['Ban_update_green'] = 'O Usu�rio est� reativado';
$lang['Ban_update_yellow'] = 'O Usu�rio recebeu um aviso, e tem agora um total de %d avisos de um m�ximo de %d avisos';
$lang['Ban_update_red'] = 'O usu�rio est� bloqueado';
$lang['Ban_reactivate'] = 'Sua conta foi reativada';
$lang['Ban_warning'] = 'Voc� recebeu um aviso';
$lang['Ban_blocked'] = 'Sua conta est� bloqueada';
$lang['Click_return_viewtopic'] = 'Clique %sAqui%s para retornar ao t�pico';
$lang['Rules_ban_can'] = 'Voc� <b>pode</b> expulsar outros usu�rios nesse f�rum';
$lang['user_no_email'] = 'O usu�rio n�o possui nenhum email, conseq�entemente nenhuma mensagem sobre essa a��o foi enviada, voc� deveria enviar-lhe uma mensagem particular';
$lang['user_already_banned'] = 'O usu�rio selecionado j� est� expulso';
$lang['Ban_no_admin'] ='Esse Usu�rio � um ADMINISTRADOR e conseq�entemente n�o pode ser nem avisado nem expulso';
$lang['Rules_greencard_can'] = 'Voc� <b>pode</b> reativar Usu�rios nesse f�rum';
$lang['Rules_bluecard_can'] = 'Voc� <b>pode</b> avisar t�picos ao moderador nesse f�rum';
$lang['Give_b_card'] = 'Avisar dessa mensagem aos moderadores desse f�rum';
$lang['Clear_b_card'] = 'Essa mensagem possui %d cart�es azuis at� o momento, Se voc� apertar esse bot�o voc� ir� limpar esse contador';
$lang['No_moderators'] ='O f�rum n�o possui moderadores, ent�o nenhuma aviso ser� enviado!';
$lang['Post_repported'] ='Essa mensagem foi avisada a %d moderadores';
$lang['Post_repported_1'] ='Essa Mensagem foi avisada ao moderador';
$lang['Post_repport'] ='Aviso de Mensagem'; //Subject in email notification

// TELL A FRIEND
$lang['Tell_Friend'] = 'Recomende a um Amigo.';
$lang['Tell_Friend_Sender_User'] = 'Seu Nome:';
$lang['Tell_Friend_Sender_Email'] = 'Seu Email:';
$lang['Tell_Friend_Reciever_User'] = 'Nome do Amigo:';
$lang['Tell_Friend_Reciever_Email'] = 'Email do Amigo:';
$lang['Tell_Friend_Msg'] = 'Sua Mensagem:';
$lang['Tell_Friend_Title'] = 'Recomende a um Amigo';

//
// That's all Folks!
// -------------------------------------------------

?>