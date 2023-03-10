<?php

/*********************************************************************************/
/* CNB Your Account: An Advanced User Management System for phpnuke     		*/
/* ============================================                         		*/
/*                                                                      		*/
/* Copyright (c) 2004 by Comunidade PHP Nuke Brasil                     		*/
/* http://dev.phpnuke.org.br & http://www.phpnuke.org.br                		*/
/*                                                                      		*/
/* Contact author: escudero@phpnuke.org.br                              		*/
/* International Support Forum: http://ravenphpscripts.com/forum76.html 		*/
/*                                                                      		*/
/* This program is free software. You can redistribute it and/or modify 		*/
/* it under the terms of the GNU General Public License as published by 		*/
/* the Free Software Foundation; either version 2 of the License.       		*/
/*                                                                      		*/
/*********************************************************************************/
/* CNB Your Account it the official successor of NSN Your Account by Bob Marion	*/
/*********************************************************************************/

/* Translated to Portuguese by: ylhor                   */
/* http://www.netcolony.org                             */
/* Comments/suggestions: ylhor@netcolony.org            */
/********************************************************/
global $ya_config;

/*****************************************************/
/* From file : New for 3.2.0                         */
/*****************************************************/

define("_YA_REGOPTIONS","Op??es de Registo");
define("_YA_MAILOPTIONS","Op??es de Email");
define("_YA_GRAPOPTIONS","Op??es Gr?ficas");
define("_YA_EXPOPTIONS","Op??es de Expira??o");
define("_YA_LMTOPTIONS","Op??es de Limite");
define("_YA_SERVERMAILNOTE","(Somente se o servidor possa enviar email)");

define("_ACCDELETED","A Conta foi desactivada");
define("_ACCESSTO", "Acesso a");
define("_ACCOUNTCREATED","Nova conta de utilizador criada!");
define("_ACCOUNTRESERVED","Nova conta de utilizador reservada!");
define("_ACCSUSPENDED","A conta foi suspensa");
define("_ACCTAPPROVE","Conta Activada");
define("_ACCTCHANGE","Mude as suas<br>Informa??es");
define("_ACCTCOMMENTS","Edi??o de<br>Coment?rios");
define("_ACCTDELETE","Conta Desactivada");
define("_ACCTDENY","Conta Negada");
define("_ACCTEXIT","Logout / Sair");
define("_ACCTHOME","Personalizar<br>P?gina Principal");
define("_ACCTJOURNAL","Os seus<br>Di?rios");
define("_ACCTMODIFY","Conta Modificada");
define("_ACCTREMOVE","Conta Removida");
define("_ACCTRESTORE","Conta Restaurada");
define("_ACCTSUSPEND","Conta Suspendida");
define("_ACCTTHEME","Seleccionar<br>Theme");
define("_ACTALLOWDELETE","Permitir Auto-Desactiva??o:");
define("_ACTALLOWMAIL","Permitir Modifica??o do Email:");
define("_ACTALLOWREG","Permitir o Registo:");
define("_ACTALLOWTHEME","Permitir Selec??o de Themes:");
define("_ACTDISABLED","Esta fun??o foi <b>DESACTIVADA</b> pelo admin do site.");
define("_ACTERROR","Por favor tenha a certeza que a informa??o que introduziu est? correcta ou crie uma nova conta <a href='modules.php?name=Your_Account'><b>aqui</b></a>.");
define("_ACTERROR1","Novo n?mero de verifica??o inv?lido.<br><br>Por favor tenha a certeza de  clicar no link que recebeu por email ou crie uma nova conta <a href='modules.php?name=Your_Account'><b>aqui</b></a>.");
define("_ACTERROR2","N?o existem utilizadores em espera com esta informa??o.<br><br>Pode-se registar no site <a href='modules.php?name=Your_Account'><b>aqui</b></a>.");
define("_ACTIVATEPERSONAL","Activar Menu Pessoal");
define("_ACTIVATIONERROR","Erro na Activa??o de Novo Utilizador");
define("_ACTIVATIONSUB","Activa??o de Conta de Novo Utilizador");
define("_ACTIVATIONYES","Activa??o de Novo Utilizador");
define("_ACTIVEUSERS","Utilizadores Activos");

define("_ACTMSG","A sua Conta foi activada. Por favor fa?a o seu login a partir <a href='modules.php?name=Your_Account'><b>deste link</b></a> utilizando o seu Nick e Password.");
define("_ACTMSG2","A sua conta foi activada e ligada ao site.");
define("_ACTMSG3","A sua conta foi criada e ligada ao site.");
define("_ACTNOTIFYADD","Notificar o Admin do Registo de Utilizadores:");
define("_ACTNOTIFYDELETE","Notificar o Admin da Desactiva??o de Utilizadores:");
define("_ADDERROR","ERRO: Hove um problema com a base de dados.");
define("_ADDSUBPERIOD","ADICIONAR Per?odo de Subscri??o:");
define("_ADDUSER","Adicionar um novo utilizador");
define("_ADDUSERBUT","Adicionar utilizador");
define("_AFTEREXPIRATION","Depois de Expira??o");
define("_AIM","N? AIM");
define("_ALLOWBBCODE","Permitir sempre BBCode");
define("_ALLOWEMAILVIEW","Permitir verem o meu endere?o de email");
define("_ALLOWHTMLCODE","Permitir sempre HTML");
define("_ALLOWSMILIES","Permitir sempre Smilies");
define("_ALLOWUSERS","Permitir verem o meu endere?o de email");
define("_ALLREQUIRED","Todos os campos s?o necess?rios");
define("_ALWAYSSHOWEMAIL","Mostrar sempre o meu endere?o de email");
define("_APPLICATIONSUB","Nova Aplica??o da Conta de Utilizador");
define("_APPROVE","Activar");
define("_APPROVEUSER","Activar Utilizador");
define("_ARTICLES","Artigos");
define("_ASREG1","Colocar coment?rios com o seu nome");
define("_ASREG2","Enviar not?cias com o seu nome");
define("_ASREG3","Ter um bloco pessoal na p?gina principal");
define("_ASREG4","Seleccionar quantas not?cias quer ver na p?gina principal");
define("_ASREG5","Personalizar os coment?rios");
define("_ASREG6","Participar activamente nos Foruns do Site");
define("_ASREG7","e muito mais...");
define("_ASREGUSER","Como utilizador registrado voc? pode:");
define("_AT","em");
define("_ATTACHSIG","Adicionar sempre a minha assinatura");
define("_AUTOSUSNOTE","Aplicar somente a contas activas");
define("_AUTOSUSPEND","Suspender contas ap?s:");
define("_AVAILABLEAVATARS","Lista de Avatars Dispon?veis");
define("_AVATAR","Avatar");
define("_AVATARNOTE","Voc? pode seleccionar o seu avatar ap?s ter-se registrado");
define("_AWEBUSERFROM","Um Utilizador Web de");
define("_BBFORUM","Forum");
define("_BESUREACT","Tenha a certeza que activou a sua conta.");
define("_BLANKFORAUTO","Deixe em branco para auto gera??o.");
define("_BROADCAST","Publicar uma mensagem p?blica");
define("_BROADCASTNOTSENT","<b>ERRO:</b> A sua mensagem tipo Broadcast est? vazia ou j? mandou uma mensagem recentemente. Para publicar outra ter? de esperar por volta de 10 minutos.");
define("_BROADCASTSENT","A sua mensagem foi enviada.");
define("_BROADCASTTEXT","Voc? pode exibir uma <i>Mensagem P?blica</i> daqui (m?x. 255 caracteres). Esta mensagem ser? vista por todos os utilizadores ligados nos pr?ximos 10 minutos. Cada utilizador s? ver? somente a sua mensagem uma ?nica vez numa barra vermelha por baixo do logo do site. Os membros poder?o desactivar esta funcionalidade <a href=\"modules.php?name=Your_Account&op=edithome\"><b>aqui</b></a>. Por favor n?o abuse. C?digo HTML n?o ? permitido.");
define("_BROWSEUSERS","Explorar Utilizadores");
define("_BYTESNOTE","bytes (1024 bytes = 1K)");
define("_CANCEL","Cancelar");
define("_CANKNOWABOUT","(m?x. 255 caracteres. Escreva o que outros possam saber sobre voc?)");
define("_CHANGEHOME","A sua P?gina Principal");
define("_CHANGEYOURINFO","Mudar a sua Informa??o");
define("_CHARLONG","caracteres m?x");
define("_CHECKNUM","Activa??o n?");
define("_CHECKTHISOPTION","(Confira esta op??o e o texto descrito aparecer? no site)");
define("_CODEFOR","C?digo de Confirma??o para");
define("_CODEREQUESTED","foi apenas solicitado um c?digo de confirma??o para mudar a senha.");
define("_COMMENTSCONFIG","Configura??o de coment?rios");
define("_COMMENTSWILLIGNORED","Coment?rios abaixo dessa pontua??o ser?o ignorados.");
define("_CONFIGCOMMENTS","Coment?rios");
define("_CONFIRMATIONCODE","C?digo de Confirma??o");
define("_CONTENT","Conte?do");
define("_COOKIEWARNING","Aviso: As prefer?ncias da sua conta s?o baseadas em cookies.");
define("_CREATEJOURNAL", "Crie o seu pr?prio Di?rio");
define("_DELETEACCT","Desactivar<br>Conta");
define("_DELETEREASON","Raz?o da Desactiva??o");
define("_DELETEUSER","Desactivar Utilizador");
define("_DELETEUSERS","Utilizadores Desactivos");
define("_DENY","Negar");
define("_DENYREASON","Raz?o para ter sido negado");
define("_DENYUSER","Negar Utilizador");
define("_DETUSER","Detalhes de Utilizador");
define("_DIRECT1","<p>Depois de ter completado o seu registo de utilizador poder? ligar-se ao site imediatamente. Se n?o o conseguir, contacte o webmaster <a href='mailto:");
define("_DIRECT2","'>aqui</a><br><br>\n");
define("_DISPLAYMODE","Modo de visualiza??o");
define("_DOWNLOAD","Downloads");
define("_EDITUSER","Editar Utilizador");
define("_EDITUSERS","Edit Utilizadores");
define("_EMAIL","Email");
define("_EMAILDIFFERENT","Ambos os emails s?o diferentes. ? necess?rio eles serem id?nticos.");
define("_EMAILNOTPUBLIC","(Este email n?o ser? p?blico mas ? necess?rio, ele ser? usado para enviar a sua password caso a perca)");
define("_EMAILNOTUSABLE","ERRO: O Endere?o de Email n?o ? utiliz?vel");
define("_EMAILPUBLIC","(Este email ser? p?blico. Escreva o que quiser, ? prova de Spam)");
define("_EMAILREGISTERED","ERRO: Endere?o de email j? registado");
define("_EMAILVALIDATE","Valide a mudan?a de email");
define("_ENCYCLOPEDIA","Enciclop?dia");
define("_ERROREMAILSPACES","ERRO: Endere?os de email n?o cont?m espa?os");
define("_ERRORHL","ERRO: Ouve um problema com o feed");
define("_ERRORINVEMAIL","ERRO: Email Invalido");
define("_ERRORINVNICK","ERRO: Nick Invalido");
define("_ERRORREG","Erro de Registo!");
define("_ERRORSQL","ERRO: Ouve um problema na actualiza??o da base de dados.");
define("_EVERYTHING","Quase Tudo");
define("_EXPIRES","expira");
define("_EXTRAINFO","Informa??o Extra");
define("_FAKEEMAIL","Email Falso");
define("_FAQ","Perguntas Frequentas");
define("_FILTERMOSTANON","Filtrar a maior parte de an?nimos");
define("_FINDTBY","Encontrar um utilizador pendente por");
define("_FINDTEMP","Encontrar um utilizador pendente");
define("_FINDUBY","Encontrar um utilizador regular por");
define("_FINDUSER","Encontrar Utilizador Regular");
define("_FINISH","Pronto");
define("_FINISHUSERCONF","O seu pedido para uma nova conta foi processado. Ir? receber um email nos pr?ximos segundos com um link de activa??o que dever? ser visitado nas pr?ximas 24 horas para poder activar a sua conta.");
define("_FINISHUSERCONF2","O seu pedido de uma nova conta foi processado.<br>Voc? pode agora ");
define("_FINISHUSERCONF3","fazer aqui o seu login");
define("_FLAT","Plano");
define("_FOLLOWINGMEM","De Seguida a Informa??o do Membro:");
define("_FORACTIVATION","Tem de completar e submeter este formul?rio para que a sua conta seja activada!");
define("_FORCHANGES","(Somente Para Altera??es)");
define("_FORUMSDATE","Formata da Data nos Foruns");
define("_FORUMSDATEMSG","A sintaxe utilizada ? identica ? fun??o <a href=\"http://www.php.net/date\">date()</a> do PHP");
define("_FORUMSTIME","Zona da Hora do Forum");
define("_FUNCTIONS","Fun??es");
define("_GO","Seleccione");
define("_HASAPPROVE","foi aprovada.");
define("_HASDELETE","foi apagada.");
define("_HASDENY","foi negada.");
define("_HASREMOVE","foi removida.");
define("_HASREQUESTED","pediu para receber esta senha.");
define("_HASRESTORE","foi restaurada.");
define("_HASSUSPEND","foi suspendida.");
define("_HASTHISEMAIL","tem este email associado.");
define("_HEADLINESFROM","Cabe?alhos de");
define("_HIDDESCORES","(Esconder Pontua??o: Com esta aplica??o voc? n?o ver? a pontua??o.)");
define("_HIDEONLINE","Esconder a minha informa??o de ligado");
define("_HIGHEST","Melhores Classifica??es Primeiro");
define("_HOMECONFIG","Configura??o do web site");
define("_ICQ","N? ICQ");
define("_ID","Identifica??o");
define("_IFYOUDIDNOTASK","Se voc? n?o pediu a recep??o deste email, n?o se preocupe. S? voc? est? a ver esta mensagem, mais ningu?m. Se isto foi um erro simplesmente ter? de fazer o login com sua nova senha.");
define("_IFYOUDIDNOTASK2","Se voc? n?o solicitou este Email n?o se preocupe. Apague-o ? vontade");
define("_INTERESTS","Interesses");
define("_LAST10BBPOST","Ultimas 10 mensagens no Forum");
define("_LAST10BBPOSTS","Ultimas 10 mensagens no Forum por");
define("_LAST10BBTOPIC","Ultimos 10 t?picos do Forum");
define("_LAST10BBTOPICS","Ultimos 10 t?picos do Forum come?ados por");
define("_LAST10COMMENT","Ultimos 10 coment?rios");
define("_LAST10COMMENTS","Ultimos 10 coment?rios por");
define("_LAST10DOWNLOAD","Ultimos 10 Downloads");
define("_LAST10DOWNLOADS","Ultimos 10 Downloads por");
define("_LAST10SUBMISSION","Ultimas 10 Submiss?es de Not?cias");
define("_LAST10SUBMISSIONS","Ultimas 10 Submiss?es de Not?cias enviadas por");
define("_LAST10WEBLINK","Ultimos 10 Links Web");
define("_LAST10WEBLINKS","Ultimos 10 Links Web");
define("_LIST","Listar");
define("_LOCATION","Localiza??o");
define("_LOGININCOR","Login Incorrecto! Por favor tente de novo...");
define("_LOGOUTEXIT","Logout / Sair");
define("_MAILBLOCKED","Este site n?o autoriza contas de email de");
define("_MAILDISABLED","O servidor de mail foi <b>DESLIGADO</b> pelo host do site.");
define("_MAILED","Enviado.");
define("_MAX127","(m?x. 127):");
define("_MAXCOMMENT","Tamanho M?x. do Coment?rio");
define("_MEMACT","Activa??o de Membro");
define("_MEMADD","Membro Adicionado");
define("_MEMAPL","Membro Adicionado");
define("_MEMBERGROUPS","Membros de Grupo");
define("_MEMDEL","Membro Apagado");
define("_MESSAGEACTIVATE","Activar as mensagens p?blicas tipo Broadcast?");
define("_MESSAGES","Mensagens");
define("_MODIFY","Modificar");
define("_MSNM","Nome MSNM");
define("_MUSTBEUSER","Voc? deve ligar-se para aceder a esta op??o.");
define("_MYEMAIL","O Meu Email:");
define("_MYHEADLINES","Os Meus Cabe?alhos");
define("_MYHOMEPAGE","A Sua Homepage:");
define("_NAME","Nome");
define("_NAMEERROR","ERRO: Este nome de admin j? est? em uso.");
define("_NAMERESERVED","ERRO: Este nome est? reservado");
define("_NAMERESTRICTED","ERRO: O nome de utilizador que seleccionou cont?m caracteres n?o permitidos.");
define("_NEEDTOCOMPLETE","Voc? precisa de completar todos os campos necess?rios");
define("_NESTED","Alojado(s)");
define("_NEWEST","Novos Primeiro");
define("_NEWSINHOME","N? de Noticias na Pagina Principal");
define("_NEWSLETTER","Newsletter");
define("_NEWUSER","Novo Utilizador");
define("_NEWUSERERROR","Erro na cria??o de novo utilizador!");
define("_NICKNOSPACES","ERRO: N?o podem haver espa?os no nick");
define("_NICKTAKEN","ERRO: Nick j? em uso");
define("_NO","N?o");
define("_NOACTIVEUSERS","N?o existem Utilizadores Activos");
define("_NOCOMMENTS","Sem Coment?rios");
define("_NODELETEUSERS","N?o existem Utilizadores Desactivados");
define("_NOHTML","(C?digo HTML n?o permitido)");
define("_NOINFOFOR","N?o existe informa??o dispon?vel para");
define("_NONE","Nenhum");
define("_NOPOSTSUBJECT","<i>Sem assunto</i>");
define("_NOPROBLEM","N?o se preocupe. Escreva o seu nick e clique para enviar. Receber? assim o seu c?digo de confirma??o, em que enviado juntamente com o seu nick receber? uma nova password .");
define("_NORMALUSERS","Utilizadores Regulares");
define("_NOSCORES","N?o mostrar pontua??es");
define("_NOSUSPENDUSERS","N?o existem Utilizadores Suspendidos");
define("_NOTSET","n?o-expirado");
define("_NOTSUBSCRIBED","N?o est? subscrito ? nossa Newsletter");
define("_NOWAITINGUSERS","N?o existem Utilizadores em Espera");
define("_OCCUPATION","Ocupa??o");
define("_OFFLINE","Desligado");
define("_OK","Ok!");
define("_OLDEST","Antigos Primeiro");
define("_ONLINE","On-line");
define("_OPTION","Op??o");
define("_OPTIONAL","(optional)");
define("_OR","ou");
define("_ORTYPEURL","ou indique o link dos cabe?alhos de um site ? sua escolha:");
define("_PASSDIFFERENT","As senhas digitadas n?o coincidem. Elas precisam ser id?nticas.");
define("_PASSWDNOMATCH","Pedimos desculpa, mas a nova password n?o coincide. Volte atr?s e tente de novo.");
define("_PASSWILLSEND","(A sua senha ? enviada para a conta de Email que nos informou)");
define("_PASSWORD4","Password para");
define("_PASSWORDLOST","Perdeu a sua Password?");
define("_PERMISSIONS","Permiss?es");
define("_PERSONALINFO","Informa??o Pessoal");
define("_PMNOTIFY","Notificar novas Mensagens Privadas por Email");
define("_POPMSGACTIVE","Activar o popup de aviso de Mensagens Privadas?");
define("_POPPM","A quando nova mensagem privada aparecer janela Popup");
define("_POPPMMSG","Ir? abrir uma nova janela popup para o informar quando receber uma nova mensagem privada");
define("_PRIVATEMESSAGES","As suas Mensagens Privadas");
define("_PROMOTE","Promover");
define("_PROMOTEUSER","Promover Utilizador");
define("_READHEADLINES", "Ler os cabe?alhos escolhidos");
define("_READMYJOURNAL","Ler o meu Di?rio");
define("_REALNAME","Nome Verdadeiro");
define("_RECEIVENEWSLETTER","Receber Newsletter por Email?");
define("_REGDATE","Data de Registo");
define("_REGISTERNOW","Registe-se agora! ? gr?tis!");
define("_REGISTRATIONSUB","Registo de Novo Utilizador");
define("_REGNEWUSER","Registo de Novo Utilizador");
define("_REMOVE","Remover");
define("_REMOVEUSER","Remover Utilizador");
define("_REPLYNOTIFY","Notificar-me sempre de respostas");
define("_REPLYNOTIFYMSG","Envia um email quando algu?m responder ao seu t?pico que meteu no Forum. Isto pode ser modificado sempre que voc? meta um t?pico novo");
define("_REQUIREADMIN","Necess?rio Aprova??o do Administrador:");
define("_REQUIRED","(necess?rio)");
define("_REQUIREDNOCHANGE","(necess?rio, n?o poder? ser alterado)");
define("_RESEND","Reenviar");
define("_RESENDMAIL","Reenviar Email de Activa??o");
define("_RESENTMAIL","Email de Activa??o Enviado");
define("_RESTORE","Restaurar");
define("_RESTOREUSER","Restaurar Utilizador");
define("_RETURN","Voltar");
define("_RETURN2","Voltar para a p?gina principal");
define("_RETURNACCOUNT", "Voltar para a p?gina da sua conta");
define("_RETURNPAGE","Voltar para a sua p?gina pessoal");
define("_RETYPEEMAIL","Re-escrever Email");
define("_RETYPEPASSWD","Reescrever Password");
define("_RETYPEPASSWORD","Re-escrever Password");
define("_REVIEWS","Revis?es");
define("_SAVECHANGES","Gravar Modifica??es");
define("_SCORENOTE","Publica??es an?nimas come?am com 0, publica??es de registados come?am com 1. Moderadores somam e subtraem pontos.");
define("_SEARCHUSERS","Procurar Utilizadores");
define("_SECCODEINCOR","C?digo de seguran?a incorrecto. Por Favor volte atr?s e escreva exactamente como indicado...");
define("_SECTIONS","Sec??es");
define("_YA_SECURITYCODE","C?digo de Seguran?a");
define("_SELECTASITE","Seleccione o site de onde quer ver os cabe?alhos:");
define("_SELECTASITE2","Seleccione um site");
define("_SELECTTHEME","Seleccione um Theme");
define("_SELECTTHETHEME","Themes");
define("_SEND","Enviar");
define("_SENDPASSWORD","Enviar Password");
define("_SERVERMAIL","Servidor pode enviar mail?");
define("_SERVERNOMAIL","Este servidor n?o tem acesso a email. Por favor contacte o administrador do site para assist?ncia.");
define("_SHOWMAIL","Mostrar Email");
define("_SIGNATURE","Assinatura");
define("_SOMETHINGWRONG","Algo n?o correu como devia...");
define("_SORRYNOUSERINFO","Desculpe, n?o foi encontrada nenhuma informa??o do utilizador correspondente");
define("_SORRYTO","A sua conta em");
define("_SORTORDER","Ordenar do Tipo");
define("_SUBACTIVATED","Subscri??o Activada!");
define("_SUBCANCEL","Este ? um email autom?tico para o informar que a sua subscri??o ao nosso site foi cancelada.");
define("_SUBCANCELLED","Subscri??o Cancelada");
define("_SUBCANCELREASON","Este ? um email autom?tico para o informar que a sua subscri??o ao nosso site foi cancelada pela seguinte raz?o:");
define("_SUBHOPELIKE","Esperemos que goste deste servi?o...");
define("_SUBNEEDTOAPPLY","Se necessitar/quiser inscrever-se novamente ? subscri??o, por favor visite o seguinte link:");
define("_SUBOPENED","Este ? um email autom?tico para o informar que a sua subscri??o ao nosso site foi activada come?ando agora e ser? v?lida por");
define("_SUBOPENED2","ano(s).\n\nA pr?xima vez que visitar o nosso site, e ligar-se ? sua conta ir? notar que n?o ver? nenhuma publicidade no site, podendo desta maneira fazer uma explora??o no nosso site livre de distrac??es.");
define("_SUBPERIOD","Per?odo da Subscri??o:");
define("_SUBREASON","Raz?o pela desubscri??o:");
define("_SUBSCRIBED","Est? subscrito ? nossa Newsletter");
define("_SUBTHANKSATT","Obrigado pela sua aten??o,");
define("_SUBTHANKSSUPP","Obrigado pelo seu suporte e divirta-se,");
define("_SUBTHANKSSUPP2","Obrigado pelo seu suporte,");
define("_SUBUPDATED","Isto ? um email autom?tico para lhe dar conhecimento que a sua subscri??o no nosso website's foi actualizada e foi adicionado");
define("_SUBUPDATEDSUB","Subscri??o Actualizada");
define("_SUBUSERASK","Utilizador Subscritor?");
define("_SUBUSERS","Utilizadores Subscritores");
define("_SUBVISIBLE","Vis?vel a Subscritores?");
define("_SUBYEARSTOACCOUNT","ano(s) a sua conta.");
define("_SURE2ACTIVATE","Tem a certeza que quer aprovar o utilizador");
define("_SURE2DELETE","Tem a certeza que quer apagar o utilizador");
define("_SURE2DENY","Tem a certeza que quer negar o utilizador");
define("_SURE2PROMOTE","Tem a certeza que quer promover o utilizador");
define("_SURE2REMOVE","Tem a certeza que quer remover o utilizador");
define("_SURE2RESEND","Tem a certeza que quer reenviar o email de activa??o");
define("_SURE2RESTORE","Tem a certeza que quer restaurar o utilizador");
define("_SURE2SUSPEND","Tem a certeza que quer suspender o utilizador");
define("_SUREDELETE","Tem a certeza que quer apagar a sua conta?");
define("_SURVEYS","Inqu?ritos");
define("_SUSPEND","Suspender");
define("_SUSPENDREASON","Raz?o pela suspens?o");
define("_SUSPENDUSER","Utilizador Suspenso");
define("_SUSPENDUSERS","Utilizadores Suspensos");
define("_TEMPNOEXIST","Utilizador em espera n?o existe!");
define("_THANKSAPPL","Obrigado por se inscrever em");
define("_THANKSUSER","Obrigado por se registrar em");
define("_THEMESELECTION","Selecionar um Theme");
define("_THEMETEXT1","Esta op??o mudar? o visual inteiro do site.");
define("_THEMETEXT2","Estas altera??es ser?o v?lidas somente para voc?.");
define("_THEMETEXT3","Cada utilizador pode visualizar o site com um theme diferente.");
define("_THISISYOURPAGE","Esta ? a sua p?gina pessoal");
define("_THREAD","Discuss?o");
define("_THRESHOLD","In?cio");
define("_TOAPPLY","para se inscrever numa conta em");
define("_TOFINISHUSER","Para finalizar o seu processo de registo dever? visitar o link seguinte nas pr?ximas 24 horas para activar a sua conta, se n?o, a sua informa??o ser? automaticamente apagada pelo nosso sistema e dever? registrar-se novamente:");
define("_TOPICS","Topicos");
define("_TOREGISTER","para registar uma conta em");
define("_TRUNCATES","(Encurta coment?rios longos adicionando-lhes um link de Ler Mais.)");
define("_TYPENEWPASSWORD","(escreva uma nova password por duas vezes para a mudar)");
define("_YA_TYPESECCODE","Escreva aqui o c?digo de seguran?a");
define("_UFAKEMAIL","Email Falso");
define("_UNCUT","N?o cortado e n?o editado");
define("_UNICKNAME","-Nome de Utilizador:");
define("_UNSUBUSER","Desubscrever Utilizador?");
define("_UPASSWORD","-Password:");
define("_UPDATEFAILED","N?o foi poss?vel actualizar as suas informa??es. Entre em contacto com o Administrador");
define("_UREALEMAIL","Email Real");
define("_UREALNAME","Nome Real");
define("_URL","Endere?o URL");
define("_USCORE","Pontua??o");
define("_USEACTIVATE","Utilizar Activa??o via email?");
define("_USEGFXCHECK","Utilizar C?digo de Seguran?a?");
define("_USENDPRIVATEMSG","Envie uma mensagem privada para");
define("_USERACCOUNT","A Conta de Utilizador");
define("_USERADMIN","Administra??o de Utilizadores");
define("_USERAPPFINALSTEP","Aplica??o de novo utilizador: Ultimo Passo");
define("_USERAPPLOGIN","Login de Utilizador");
define("_USERCHECKDATA","Por favor verifique a informa??o seguinte. Se tudo estiver correcto poder? proceder ao registo clicando no bot?o \"Pronto\" , sen?o clique em \"Voltar\" e modifique o que for necess?rio.");
define("_USERFINALSTEP","Registo de Novo Utilizador: Ultimo Passo");
define("_USERID","Identifica??o de Utilizador");
define("_USERLOGIN","Login de Utilizador");
define("_USERNAME","Nome de Utilizador");
define("_USERNOEXIST","Utilizador n?o existe!");
define("_USERPASS4","Password de Utilizador para");
define("_USERPASSWORD4","Password de Utilizador para");
define("_USERPROMOTED","Utilizador foi promovido a Administrador.");
define("_USERREGLOGIN","Registo/Login de Utilizador");
define("_USERSCONFIG","Configura??o de Utilizadores");
define("_USERSTATUS","Estatuto Actual do Utilizador");
define("_USERUPDATE","Actualizar Utilizador");
define("_USRNICKNAME","Nick / Nome de Utilizador");
define("_UUSERNAME","Nome do Utilizador");
define("_WAITAPPROVAL","O administrador do site ir? rever a sua aplica??o e ir? enviar-lhe um link de activa??o se for aprovado.");
define("_WAITINGUSER","Utilizador em Espera");
define("_WAITINGUSERS","Utilizadores em Espera");
define("_WEBLINKS","Links Web");
define("_WEBMAIL", "WebMail");
define("_WEBSITE","Web Site");
define("_WEDONTGIVE","N?s n?o venderemos/daremos suas informa??es a terceiros.");
define("_WITHTHISCODE","Com este c?digo voc? pode mudar a sua password em");
define("_YA_1PERLINE","Somente um por linha.");
define("_YA_ACCNOFIND","Conta n?o Encontrada");
define("_YA_ADDTO","foi adicionado a");
define("_YA_ADMINISTRATION","Administra??o Principal");
define("_YA_APLTO","inscreveu-se em");
define("_YA_AVATARFOR","Avatar para");
define("_YA_AVATARGALL","Galeria de Avatares");
define("_YA_AVATARSUCCESS","Seleccionado o Avatar com sucesso!");
define("_YA_AVCOPIED","Adicione o endere?o da localiza??o do avatar que pretende usar e clique no bot?o de submiss?o por baixo, a imagem Avatar ser? copiada para este site.");
define("_YA_AVCP","Painel de Controlo dos Avatares");
define("_YA_AVINF1","Mostra uma pequena imagem por baixo dos seus detalhes nas mensagens do forum e no seu perfil. S? uma imagem pode ser visualizada de cada vez, a sua largura n?o pode ser maior que");
define("_YA_AVINF2","pixels, e a altura n?o pode ser maior que");
define("_YA_AVINF3","pixels, e o tamanho do ficheiro n?o pode ser maior que");
define("_YA_BACKPROFILE","Voltar ao Perfil");
define("_YA_BADMAIL","Dominios de Email Bloquados");
define("_YA_BADNICK","Caracteres bloqueados para o nome de utlizador");
define("_YA_BY","Por");
define("_YA_CA","Verificando em ambos");
define("_YA_CHARS","Caracteres");
define("_YA_CHKAUTOSUS","Suspender contas antigas");
define("_YA_CHNGRISK","Mude o seu Nome de Utilizador se estiver disposto a isso!");
define("_YA_CURRAV","Avatar Actual");
define("_YA_DAY","Dia");
define("_YA_DAYS","Dias");
define("_YA_DEACTIVATE","Desactivar");
define("_YA_DISABLED","Desactivado de momento");
define("_YA_DONE","Feito");
define("_YA_EQUAL","Igual a");
define("_YA_EXPIRING","Contas Tempor?rias expiram depois");
define("_YA_EXPIRINGNOTE","Aplica-se somente a contas por activar");
define("_YA_FIND","Encontrar");
define("_YA_FROM","de");
define("_YA_GD","GDLib n?o instalada");
define("_YA_GO","GO");
define("_YA_LASTVISIT","Ultima Visita");
define("_YA_LC","Somente Login");
define("_YA_LIKE","Tipo");
define("_YA_MATCH","Compativel");
define("_YA_MUSTSUPPLY","Deve indicar o seu <i>nick</i> ou o seu <i>endere?o email</i>.");
define("_YA_NA","N/D");
define("_YA_NC","Sem Verifica??o");
define("_YA_NEWAVATAR","O seu novo avatar");
define("_YA_NICKLENGTH","O Nick deve ter entre ".$ya_config['nick_min']." a ".$ya_config['nick_max']." caracteres.");
define("_YA_NICKMAX","Tamanho m?ximo do nick");
define("_YA_NICKMIN","Tamanho m?nimo do nick");
define("_YA_NONEXPIRE","Nunca");
define("_YA_NOREPLY","N?o responda a esta mensagem!!");
define("_YA_OF","de");
define("_YA_OFFSITE","Fazer Link a um avatar fora do site");
define("_YA_ONCAT","na categoria");
define("_YA_PAGE","P?gina");
define("_YA_PAGES","Paginas");
define("_YA_PASSLENGTH","Password deve ter entre ".$ya_config['pass_min']." a ".$ya_config['pass_max']." caracteres.");
define("_YA_PASSMAX","Tamanho m?ximo da Password");
define("_YA_PASSMIN","Tamanho m?nimo da Password");
define("_YA_PASSWORD","Password");
define("_YA_PERPAGE","n? de utilizadores a listar por p?gina:");
define("_YA_PERPAGENOTE","N?meros Altos ir?o fazer o site mais lento.");
define("_YA_POINTS","Pontos");
define("_YA_QUERY","Nome");
define("_YA_RC","Somente Registos");
define("_YA_REGLUSER","Utilizadores Principais");
define("_YA_SAVED","Gravado!");
define("_YA_SEARCH","Pesquisar");
define("_YA_SELAVGALL","Seleccionar Avatar da galeria");
define("_YA_SELECTPAGE","Seleccionar P?gina");
define("_YA_SHOWGALL","Mostrar Galeria");
define("_YA_SUBMITBUTTON","Adicione o endere?o que cont?m a imagem de avatar desejada e clique no bot?o de submiss?o em baixo.");
define("_YA_TEMPUSER","Utilizadores tempor?rios");
define("_YA_TOSELCTAVAT","Para seleccionar o seu avatar clique nele");
define("_YA_UPLOADAV","Fazer Upload a um Avatar a partir do seu computador");
define("_YA_UPLOADFORUM","Fazer Upload a partir do Perfil do Forum");
define("_YA_UPLOADURL","Fazer Upload a um Avatar a partir de um endere?o URL");
define("_YA_USERS","Utilizadores");
define("_YA_WEEK","Semana");
define("_YA_WEEKS","Semanas");
define("_YAIM","O seu AIM");
define("_YEARS","Anos");
define("_YES","Sim");
define("_YICQ","O seu ICQ");
define("_YIM","N? YIM");
define("_YINTERESTS","Os seus interesses");
define("_YLOCATION","A sua localiza??o");
define("_YMSNM","O seu MSNM");
define("_YOCCUPATION","A sua ocupa??o");
define("_YOUARELOGGEDOUT","Voc? saiu da sua conta!");
define("_YOUAREPENDING","Bem Vindo! A sua aplica??o como novo membro est? pendente. O administrador do site ir? contactar-lhe quando a sua aplica??o for processada.");
define("_YOUAREREGISTERED","Bem Vindo! Voc? ? agora um membro registado.");
define("_YOUBAD","ERRO: Tentou executar uma opera??o ilegal!");
define("_YOUCANCHANGE","Voc? pode mudar isto depois de efectuar o seu login");
define("_YOUCANLOGIN","Em poucos segundos ir? receber um email do nosso sistema com a sua password designada. Depois poder? fazer o seu login <a href=\"modules.php?name=Your_Account\"><b>aqui</b></a>. Lembre-se de mudar a sua password e configurar as suas prefer?ncias de conta. Esperamos que os nossos servi?os lhe agradem.");
define("_YOUCANUSEHTML","(Pode utilizar c?digo HTML para, por exemplo, colocar links por exemplos)");
define("_YOUPASSMUSTBE","A sua Password deve ser");
define("_YOURAVATAR","O seu Avatar");
define("_YOURCODEIS","O seu c?digo de confirma??o ?:");
define("_YOURHOMEPAGE","O seu site web");
define("_YOURNEWPASSWORD","A sua Nova Password ?:");
define("_YOUUSEDEMAIL","Voc? ou outra pessoa usou a sua conta de email");
define("_YOUWILLRECEIVE","Ir? receber um email de confirma??o com um link para uma p?gina que dever? visitar para activar a sua conta nas pr?ximas 24 horas.");
define("_YOUWILLRECEIVE2","Ir? receber um email com a sua informa??o de login.");
define("_YYIM","O seu YIM");

// NEW FROM CNB YOUR ACCOUNT 
define("_255CHARMAX","(m?x 255 caracteres. Escreva a sua assinatura com c?digo html)");
define("_YA_COOKIECONFIG","Op??es de Cookie dos Utilizadores");
define("_COOKIETIMELIFE","Tempo de Vida dos Cookies");
define("_COOKIETIMELIFENOTE","O tempo ? a soma deste valor com a hora local");
define("_COOKIEPATHNOTE1","Somente se <i>Desligar quando o computador se desliga</i><br> n?o estiver seleccionado");
define("_COOKIEPATHNOTE2","Deixe em branco para auto gera??o");
define("_YA_AUTOSUSPENDMAINNOTE","Pode deixar o site lento ao carregar. <br> Pode usar somente numa s? visualiza??o.");
define("_YA_SECOND","Segundo");
define("_YA_SECONDS","Segundos");
define("_YA_MINUTE","Minuto");
define("_YA_MINUTES","Minutos");
define("_YA_HOUR","Hora");
define("_YA_HOURS","Horas");
define("_YA_MONTH","M?s");
define("_YA_MONTHS","Meses");
define("_YA_COOKIELOGOUTPAG","Desligar quando o fechar a janela");
define("_YA_COOKIEAUTOLOGOUT","Block Logins");
define("_COOKIEPATH","Local do Cookie");
define("_COOKIEINACTIVITY","Per?odo permitido de inactividade da visualiza??o do site");
define("_YA_COOKIEINACTNOTUSER","Indefinido");
define("_YA_COOKIEDELCOOKIE","Auto desligar na primeira visualiza??o");
define("_AUTOSUSPENDMAIN","Auto suspender utilizador em todas as visualiza??es");
define("_YA_ADDFIELD","Criar campo");
define("_FIELDNAME","Nome do campo");
define("_FIELDVALUE","Valor padr?o");
define("_FIELDSIZE","Tamanho");
define("_FIELDNEED","Situa??o");
define("_FIELDVPOS","Ordem");
define("_ADDFIELD","Gravar Campos");
define("_NEED0","Desactivado");
define("_NEED1","Activo");
define("_NEED2","Mostrar no registo");
define("_NEED3","Necess?rio para o registo");
define("_NAMECOMENT","*Para usar uma constante de linguagem, comece com o caracter <b>_</b>");
define("_VALUECOMENT","**Para criar uma lista, separe as palavras com este s?mbolo <b>::</b>");
define("_FIELDDEL","Apagar");
define("_DELFIELD","Apagar campo");
define("_CONFIRMDELLFIELD","Tem a certeza que quer apagar este campo:");
define("_YA_FILEDNEED1","O campo <b>");
define("_YA_FILEDNEED2","</b> ? necess?rio.");
//define("_CREDITS","Cr?ditos");
//define("_YA_CODESIZE","N? de caract?res (numeros) do c?digo de seguran?a");

define("_CREDITS","Créditos");
define("_YA_PUBLIC","Publico");
define("_YA_PRIVATE","Privado");
define("_YA_CODESIZE","Tamanho do código de segurança");
define("_YA_SUBAVT","Gravar avatar");
define("_SUPERUSER","Super utilizador");
 
// NEW FROM CNB YOUR ACCOUNT 4.4 beta1
define("_COOKIECHECKNOTE","Activar o CookieCheck (beta)");
define("_COOKIECHECKNOTE2","Verificar se o browser aceita cookies");
define("_YA_COOKIETEST","Testar Browser Cookie");
define("_YA_COOKIEOK","OK!");
define("_YA_COOKIEFAIL","FALHOU!");
define("_YA_COOKIENO","Os Cookies parecem estar desactivados.<br> Altere as definições do seu browser!");
define("_YA_COOKIEYES","O seu browser passou no teste dos cookies sem problemas!");
define("_YA_DELCOOKIEINFO1","If you have problems with this website's authentiction (loggin in as a member), it is possible that your cookies have become corrupt. Here you can safely delete all cookies that are set by this website. Once you log in again, new cookies will be set automatically.");
define("_YA_CURRENTCOOKIE","Current Cookie Information:");
define("_YA_COOKIENOCUR1","No cookies are set by this website.");
define("_YA_COOKIENOCUR2","No cookies were set by this website.");
define("_YA_COOKIENAME","Cookie Name:");
define("_YA_COOKIEVAL","Cookie Value:");
define("_YA_COOKIESTAT","Cookie Status:");
define("_YA_COOKIEDEL1","The folowing cookies have been deleted:");
define("_YA_COOKIEDEL2","deleted");
define("_YA_COOKIEDELTHESE","Delete these Cookies");
define("_YA_COOKIEDELALL","Delete All Cookies");
define("_YA_COOKIESHOWALL","Show Current Cookies");
define("_LOGIN","Login");

// YA Private Messages Extended
define("_YAMESSAGES","Messages Summary");
define("_YAPM","Inbox");
define("_YAUNREAD","New");
define("_YAREAD","Read");
define("_YASAVED","Saved");
define("_YATT","Total");
define("_YAOUTBOX","Outbox");
/* YA COPPA HACK */
define("_ACTIVATECOPPA","COPPA Compliance Required");
define("_YACOPPA1","<h2>Children's Online Privacy Protection</h2>");
define("_YACOPPA2","You must be <b>13</b> or over, or have parental permission to register for membership here.<br><br>Are you age <b>13</b> or above?");
define("_YACOPPA3","<small>Please answer yes or no and click submit.</small>");
define("_YACOPPA4","<h1>We're Sorry!</h1> You must be <b>13</b> or have parents send a signed letter of consent to our site admin. Please contact our site admin for details by clicking <a href=\"./modules.php?name=Feedback\">here</a>.");
define("_YACOPPAFAX","Sorry no fax's accepted.");
/* YA TOS HACK */
define("_ACTIVATETOS","Must Agree to Terms of Service");
define("_YATOS1","Terms of Service");
define("_YATOS2","Our Terms of Service will be soon be published here.");
define("_YATOS3","I have read and agree to abide by these Terms.");
define("_YATOS4","New members must agree to our Terms of Service.");

// NEW FROM CNB YOUR ACCOUNT 4.4 beta2
define("_YACONFIGSAVED"," Configuration Saved.");
define("_DOUBLECHECKEMAIL","Doublecheck email at registration");
define("_DOUBLECHECKEMAILNOTE","Let users input their email adres twice");
define("_ACTIVATECOPPANOTE","Users have to be 13 years or older");
define("_COOKIECONFIG","Cookie Configuration");
define("_COOKIECLEANERNOTE1","Activate the CookieCleaner");
define("_COOKIECLEANERNOTE2","Shows the option to delete all cookies set by this site");

define("_YATOS5","All members need to accept these Terms of Service [TOS].");
define("_ACTIVATETOSNOTE","Force new members to agree when they register:");
define("_ACTIVATETOSALL","Show TOS to members as well:");
define("_ACTIVATETOSALLNOTE","If Terms of Service are new or changed");
define("_YATOSINTRO1","Hello! Our Terms of Service have been changed.<br>To continue your membership we enquire you to agree with our Terms of Service (TOS). If you choose not to agree your account will not expire but you will not be able to login until you do.");
define("_YATOSINTRO2","Hello! Welcome as a new member of this website!<br>To apply for a membership you will have to agree with our Terms of Service.");

define("_YA_CONTINUE","Continue");
define("_YA_GOBACK","Go Back");

define("_YA_APPROVE","Approve");
define("_YA_APPROVE2","Approved");
define("_YA_APPROVEUSER","Approve User");
define("_YA_APPROVED","You have approved the membership of:");
define("_YA_APPROVENOTE","'Approve' will aprove the membership and send the activation email");
define("_YA_ACTIVATE","Activate");
define("_YA_ACTIVATEUSER","Activate User");
define("_YA_ACTIVATED","The user account is activated. The user will be able to login now");
define("_YA_ACTIVATENOTE","'Activate' will activate the membership immediately and send a welcome email");
define("_YA_ACTIVATEWARN1","Warning! If you activate this user now, the emailadres will not be verified to be valid");
define("_YA_ACTIVATEWARN2","We recommend you to 'approve' this user instead. An activation email will then be send to the users email adres");
define("_YA_SENDMAIL","An activation email has been sent to the users email adres");

define("_YA_REALNAMENOTE", "Please enter both your first and last name");
define("_YA_NOREALNAME","You forgot to enter your realname (both first and last name)");

define("_CHANGEMAIL1","You or someone else has used your account to change your registered email address from");
define("_CHANGEMAIL2"," to ");
define("_CHANGEMAIL3"," in site ");
define("_CHANGEMAILFIN","To confirm the email change process you should visit the following link:");
define("_CHANGEMAILSUB","Change Email Account");
define("_CHANGEMAILTITLE","Change mail");
define("_CHANGEMAILOK","Your registered email address has been changed.");
define("_CHANGEMAILNOT","ERROR: Something wrong has happened in the changing pf your registered email!!<br> Try Again.");
define("_CHANGEMAILNOTUSER","ERROR: You need to login to confirm your new email address.");
define("_YA_UPDATEYOUTABLE","<b>ERROR: YOU NEED TO UPDATE YOU DATA BASE TABLE NOW!!</b><br>Run cnbya.php from the root of your phpnuke installation, update the database tables, and delete the file afterwards!<br>The version of the module is ");
define("_YA_UPDATEYOUTABLE1"," and the version of your data base table is ");

?>