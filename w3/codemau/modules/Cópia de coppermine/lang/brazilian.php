<?php
// ------------------------------------------------------------------------- //
//  Coppermine Photo Gallery v1.1 Beta 2                                     //
// ------------------------------------------------------------------------- //
//  Copyright (C) 2002,2003  Gr�gory DEMAR <gdemar@wanadoo.fr>               //
//  http://www.chezgreg.net/coppermine/                                      //
// ------------------------------------------------------------------------- //
//  Based on PHPhotoalbum by Henning St�verud <henning@stoverud.com>         //
//  http://www.stoverud.com/PHPhotoalbum/                                    //
// ------------------------------------------------------------------------- //
//  This program is free software; you can redistribute it and/or modify     //
//  it under the terms of the GNU General Public License as published by     //
//  the Free Software Foundation; either version 2 of the License, or        //
//  (at your option) any later version.                                      //
// ------------------------------------------------------------------------- //
//  Traduzido para o portugu�s-brasileiro por Andras Makkai Neto			 //
//  e-mail: andras.makkai@globo.com											 //
//  website: www.webdicas.com.br											 //
//  demo: http://www.webdicas.com.br/modules.php?name=coppermine			 //
// ------------------------------------------------------------------------- //
//  Alterado para a vers�o v1.2.2b por Marcio Alves de Macedo                //
//  e-mail: malves1982@ig.com.br                                             //
//  website: irados.redservicio.com											 //
// --------------------------------------------------------------------------//
define('PIC_VIEWS', 'Views');//new in 1.2.2nuke
define('PIC_VOTES', 'Votos');//new in 1.2.2nuke
define('PIC_COMMENTS', 'Comentarios');//new in 1.2.2nuke

$lang_translation_info = array(
	'lang_name_english' => 'brazilian', // the name of your language in English, e.g. 'Greek' or 'Spanish'
    'lang_name_native' => 'Portugues', // the name of your language in your mother tongue (for non-latin alphabets, use unicode), e.g. '&#917;&#955;&#955;&#951;&#957;&#953;&#954;&#940;' or 'Espa&ntilde;ol'
    'lang_country_code' => 'br', // the two-letter code for the country your language is most-often spoken (refer to http://www.iana.org/cctld/cctld-whois.htm), e.g. 'gr' or 'es'
    'trans_name' => 'malves1982', // the name of the translator - can be a nickname
    'trans_email' => 'romugem@bol.com.br', // translator's email address (optional)
    'trans_website' => 'http://irados.webcindario.com/', // translator's website (optional)
    'trans_date' => '2004-02-02', // the date the translation was created / last modified
    );

$lang_charset = 'iso-8859-1';
$lang_text_dir = 'ltr'; // ('ltr' da esquerda para a direita, 'rtl' da direita para a esquerda)

// shortcuts for Byte, Kilo, Mega
$lang_byte_units = array('Bytes', 'KB', 'MB');

// Day of weeks and months
$lang_day_of_week = array('Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab');
$lang_month = array('Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez');

// Some common strings
$lang_yes = 'Sim';
$lang_no  = 'N�o';
$lang_back = 'VOLTAR';
$lang_continue = 'CONTINUAR';
$lang_info = 'Informa��o';
$lang_error = 'Erro';

// The various date formats
// See http://www.php.net/manual/en/function.strftime.php to define the variable below
$album_date_fmt =    '%d %B, %Y';
$lastcom_date_fmt =  '%d/%m/%y as %H:%M';
$lastup_date_fmt = '%B %d, %Y';
$register_date_fmt = '%d %B, %Y';
$lasthit_date_fmt = '%d %B, %Y as %I:%M %p';
$comment_date_fmt =  '%d %B, %Y as %I:%M %p';

// For the word censor
$lang_bad_words = array('*fuck*', 'asshole', 'assramer', 'bitch*', 'c0ck', 'clits', 'Cock', 'cum', 'cunt*', 'dago', 'daygo', 'dego', 'dick*', 'dildo', 'fanculo', 'feces', 'foreskin', 'Fu\(*', 'fuk*', 'honkey', 'hore', 'injun', 'kike', 'lesbo', 'masturbat*', 'motherfucker', 'nazis', 'nigger*', 'nutsack', 'penis', 'phuck', 'poop', 'pussy', 'scrotum', 'shit', 'slut', 'titties', 'titty', 'twaty', 'wank*', 'whore', 'wop*');

$lang_meta_album_names = array(
	'random' => 'Imagens aleat�rias',
	'lastup' => '�ltimas imagens incluidas',
	'lastcom' => '�ltimos coment�rios',
	'topn' => 'O mais visto',
	'toprated' => 'Top imagens',
	'lasthits' => '�ltimos vistos',
	'search' => 'Resultado de sua Busca'
);

$lang_meta_album_names = array(
    'random' => 'Imagens aleat�rias',
    'lastup' => '�ltimas imagens incluidas',
    'lastupby' => 'Minhas �ltimas adi��es', // new 1.2.2
    'lastalb' => '�ltimos albuns incluidos',
    'lastcom' => '�ltimos comentarios',
    'lastcomby' => 'Meus �ltimos comentarios', // new 1.2.2
    'topn' => 'Os mais vistos',
    'toprated' => 'Top imagens',
    'lasthits' => '�ltimos vistos',
    'search' => 'Resultado de sua Busca',
    'favpics' => 'Figuras Favoritas' // changed in cpg1.2.0nuke
    );


$lang_errors = array(
	'access_denied' => 'Voc� n�o tem permiss�o para acessar esta p�gina.',
	'perm_denied' => 'Voc� n�o tem permiss�o para desempenhar esta opera��o.',
	'param_missing' => 'Script chamado sem o par�metro requerido(s).',
	'non_exist_ap' => 'O �lbum ou imagem selecionado n�o existe!',
	'quota_exceeded' => 'Espa�o excedido<br /><br />Voc� tem um espa�o de [quota]K, suas imagens j� ocupam [space]K, adicionando esta imagem voc� exceder� sua quota.',
	'gd_file_type_err' => 'Quando usar a biblioteca de imagem do GD os tipos de imagem permitida ser�o somente JPEG e PNG.',
	'invalid_image' => 'A imagem voc� tentou enviar est� corrompida ou n�o pode ser tratada pela biblioteca do GD',
	'resize_failed' => 'Incapaz para criar thumbnail ou reduzir imagem de tamanho.',
	'no_img_to_display' => 'Nenhuma imagem para exibir',
	'non_exist_cat' => 'A categoria selecionada n�o existe',
	'orphan_cat' => 'Uma categoria n�o possui um parente, chame o administrador de categoria para corrigir o problema
.',
	'directory_ro' => 'Directorio \'%s\' n�o est� liberado, as imagens n�o podem ser apagadas',
	'non_exist_comment' => 'O coment�rio selecionado n�o existe.',
	'pic_in_invalid_album' => 'A imagem est� em um �lbum que n�o existe (%s)!?',
    'banned' => 'Voc� foi banido deste site.',
    'not_with_udb' => 'Esta fun��o est� desabilitada no Coppermine porque ela esta integrada com o software do forum. mesmo que voc� esteja tentando sem a configura��o suportar, ou a fun��o deve ser mudada pelo software do forum.',
    'members_only' => 'Esta fun��o e apenas para membros, porfavor cadastre-se.', // changed in cpg1.2.0nuke
    'mustbe_god' => 'Esta fun��o e apenas para os administradores. Voc� deve estar logado como superadmin para acessar esta fun��o',

);

// ------------------------------------------------------------------------- //
// File theme.php
// ------------------------------------------------------------------------- //

$lang_main_menu = array(
	'alb_list_title' => 'Ir a Lista de �lbuns',
	'alb_list_lnk' => 'Lista de �lbuns',
	'my_gal_title' => 'Ir a minha galeria pessoal',
	'my_gal_lnk' => 'Minha Galeria',
	'my_prof_lnk' => 'Meu perfil',
	'adm_mode_title' => 'Mudar para Modo do Administrativo',
	'adm_mode_lnk' => 'Modo do Administrativo',
	'usr_mode_title' => 'Mudar para Modo de Usu�rio',
	'usr_mode_lnk' => 'Modo de Usu�rio',
	'upload_pic_title' => 'Enviar imagens para um �lbum',
	'upload_pic_lnk' => 'Enviar Imagens',
	'register_title' => 'Criar uma conta',
	'register_lnk' => 'Registrar',
	'login_lnk' => 'Login',
	'logout_lnk' => 'sair',
	'lastup_lnk' => '�ltimos Uploads',
	'lastcom_lnk' => '�ltimos Coment�rios',
	'topn_lnk' => 'Mais Visto',
	'toprated_lnk' => 'Top Imagens',
	'search_lnk' => 'Buscar',
	'fav_lnk' => 'Minhas Favoritas',

);

$lang_gallery_admin_menu = array(
	'upl_app_lnk' => 'Aprova��o do Upload',
	'config_lnk' => 'Configura��o',
	'albums_lnk' => '�lbuns',
	'categories_lnk' => 'Categorias',
	'users_lnk' => 'Usu�rios',
	'groups_lnk' => 'Grupos',
	'comments_lnk' => 'Coment�rios',
	'searchnew_lnk' => 'Imagens incluidas',
    'util_lnk' => 'Redimensionar Figuras', //not used yet
    'ban_lnk' => 'Ban Users',
);

$lang_user_admin_menu = array(
	'albmgr_lnk' => 'Criar / pedir meus �lbuns',
	'modifyalb_lnk' => 'Modificar meus �lbuns',
	'my_prof_lnk' => 'Meu perfil',
);

$lang_cat_list = array(
	'category' => 'Categoria',
	'albums' => '�lbuns',
	'pictures' => 'Imagens',
);

$lang_album_list = array(
	'album_on_page' => '%d �lbuns em %d p�gina(s)'
);

$lang_thumb_view = array(
	'date' => 'DATA',
	'name' => 'NOME DO ARQUIVO',
	'title' => 'TITULO',
	'sort_da' => 'Classifique por data crescente',
	'sort_dd' => 'Classifique por data decrescente',
	'sort_na' => 'Classifique por nome crescente',
	'sort_nd' => 'Classifique por nome decrescente',
    'sort_ta' => 'Classifique por titulo crescente',
    'sort_td' => 'Classifique por titulo decrescente',
	'pic_on_page' => '%d imagens em %d p�gina(s)',
	'user_on_page' => '%d usu�rios em %d p�gina(s)',
    'sort_ra' => 'Classifique por votos crescente', // new in cpg1.2.0nuke
    'sort_rd' => 'Classifique por votos decrescente', // new in cpg1.2.0nuke
    'rating' => 'RATING', // new in cpg1.2.0nuke
    'sort_title' => 'Classificar as imagens por:', // new in cpg1.2.0nuke
);

$lang_img_nav_bar = array(
	'thumb_title' => 'Voltar para a p�gina de Thumbnails',
	'pic_info_title' => 'Mostrar informa��es da imagem',
	'slideshow_title' => 'Slideshow',
    'slideshow_disabled' => 'e-cards est�o desabilitados', // new in cpg1.2.0nuke
    'slideshow_disabled_msg' => $lang_errors['members_only'], // new in cpg1.2.0nuke
	'ecard_title' => 'Enviar esta imagem como um e-card',
	'ecard_disabled' => 'e-cards est� desabilitado',
	'ecard_disabled_msg' => 'Voc� n�o possui permi��o para enviar e-cards',
	'prev_title' => 'Ver pr�xima imagem',
	'next_title' => 'Ver imagem anterior',
	'pic_pos' => 'IMAGEM %s/%s',
    'no_more_images' => 'N�o h� mais imagens nesta galeria', // new in cpg1.2.0nuke
    'no_less_images' => 'Est� � a primenira imagem desta galeria', // new in cpg1.2.0nuke
);

$lang_rate_pic = array(
	'rate_this_pic' => 'Vote nesta imagem ',
	'no_votes' => '(Nenhum voto ainda)',
	'rating' => '(pontua��o : %s / 5 com %s votos)',
	'rubbish' => 'Lixo',
	'poor' => 'Pobre',
	'fair' => 'Mais ou menos',
	'good' => 'Bom',
	'excellent' => 'Excelente',
	'great' => 'Muito bom',
);

// ---------------------------------------------------------------.---.----- //
// File include/exif.inc.php
// ------------------------------------------------------------------------- //

// void

// ------------------------------------------------------------------------- //
// File include/functions.inc.php
// ------------------------------------------------------------------------- //

$lang_cpg_die = array(
	INFORMATION => $lang_info,
	ERROR => $lang_error,
	CRITICAL_ERROR => 'Erro cr�tico',
	'file' => 'Arquivo: ',
	'line' => 'Linha: ',
);

$lang_display_thumbnails = array(
	'filename' => 'Nome do Arquivo : ',
	'filesize' => 'Tamanho do Arquivo : ',
	'dimensions' => 'Dimens�es : ',
	'date_added' => 'Adicionado em : '
);

$lang_get_pic_data = array(
	'n_comments' => '%s coment�rios',
	'n_views' => '%s views',
	'n_votes' => '(%s votos)'
);

// ------------------------------------------------------------------------- //
// File include/init.inc.php
// ------------------------------------------------------------------------- //

// void

// ------------------------------------------------------------------------- //
// File include/picmgmt.inc.php
// ------------------------------------------------------------------------- //

// void

// ------------------------------------------------------------------------- //
// File include/smilies.inc.php
// ------------------------------------------------------------------------- //

if (defined('SMILIES_PHP')) $lang_smilies_inc_php = array(
	'Exclamation' => 'Exclama��o',
	'Question' => 'Quest�o',
	'Very Happy' => 'Muito Feliz',
	'Smile' => 'Sorrindo',
	'Sad' => 'Triste',
	'Surprised' => 'Surpriso',
	'Shocked' => 'Chocado',
	'Confused' => 'Confuso',
	'Cool' => 'Fresco',
	'Laughing' => 'Risonho',
	'Mad' => 'Louco',
	'Razz' => 'Normal',
	'Embarassed' => 'Embarassado',
	'Crying or Very sad' => 'Chorando de t�o triste',
	'Evil or Very Mad' => 'Mau ou Muito Louco',
	'Twisted Evil' => 'Mau amado',
	'Rolling Eyes' => 'Rolando os olhos',
	'Wink' => 'Pestanejando',
	'Idea' => 'Id�ia',
	'Arrow' => 'Seta',
	'Neutral' => 'Neutral',
	'Mr. Green' => 'Mr. Green',
);

// ------------------------------------------------------------------------- //
// File addpic.php
// ------------------------------------------------------------------------- //

// void

// ------------------------------------------------------------------------- //
// File admin.php
// ------------------------------------------------------------------------- //

if (defined('ADMIN_PHP')) $lang_admin_php = array(
	0 => 'Deixando o modo adiministrativo...',
	1 => 'Entrando no modo adiministrativo...',
);

// ------------------------------------------------------------------------- //
// File albmgr.php
// ------------------------------------------------------------------------- //

if (defined('ALBMGR_PHP')) $lang_albmgr_php = array(
	'alb_need_name' => '�lbuns precis�o ter um nome!',
	'confirm_modifs' => 'Est� certo de que quer fazer estas modifica��es?',
	'no_change' => 'Voc� n�o fez qualquer mudan�a!',
	'new_album' => 'Novo �lbum',
	'confirm_delete1' => 'Voc� est� certo de que quer apagar este �lbum?',
	'confirm_delete2' => '\nTodas as imagens e coment�rios que possui ser�o perdidas !',
	'select_first' => 'Selecionar um �lbum primeiro',
	'alb_mrg' => 'Administrador de �lbum',
	'my_gallery' => '* Minha Galeria *',
	'no_category' => '* Sem Categorias *',
	'delete' => 'Apagar',
	'new' => 'Novo',
	'apply_modifs' => 'Aplicar modifica��es',
	'select_category' => 'Selecionar categorias',
);

// ------------------------------------------------------------------------- //
// File catmgr.php
// ------------------------------------------------------------------------- //

if (defined('CATMGR_PHP')) $lang_catmgr_php = array(
	'miss_param' => 'Par�metros requeridos para \'%s\'opera��o n�o fornecidos!',
	'unknown_cat' => ' Categoria Selecionada n�o existe em banco de dados',
	'usergal_cat_ro' => ' Categoria de galerias do Usu�rio n�o pode ser apagada!',
	'manage_cat' => 'Administre categorias',
	'confirm_delete' => ' Voc� seguro que quer APAGAR esta categoria',
	'category' => 'Categoria',
	'operations' => 'Opera��es',
	'move_into' => 'Mover para',
	'update_create' => 'Atualizar/Criar categoria',
	'parent_cat' => 'Categoria Parente',
	'cat_title' => 'T�tulo da Categoria',
	'cat_desc' => 'Descri��o da Categoria'
);

// ------------------------------------------------------------------------- //
// File config.php
// ------------------------------------------------------------------------- //

if (defined('CONFIG_PHP')) $lang_config_php = array(
	'title' => 'Configura��o',
	'restore_cfg' => 'Restaure defaults de f�brica',
	'save_cfg' => 'Salvar nova configura��o',
	'notes' => 'Notas',
	'info' => 'Informa��o',
	'upd_success' => 'A configura��o est� Atualizada',
	'restore_success' => 'Coppermine restaurado',
	'name_a' => 'Nome ascendente',
	'name_d' => 'Nome descendente',
    'title_a' => 'Titulo ascendente',
    'title_d' => 'Titulo descendente',
	'date_a' => 'Data ascendente',
	'date_d' => 'Data descendente',
	'rating_a' => 'Rating ascendente', // new in cpg1.2.0nuke
    'rating_d' => 'Rating descendente', // new in cpg1.2.0nuke
    'th_any' => 'Max Aspect',
    'th_ht' => 'Height',
    'th_wd' => 'Width',
);

if (defined('CONFIG_PHP')) $lang_config_data = array(
	'General settings',
	array('Nome da Galeria', 'gallery_name', 0),
	array('Descri��o da Galeria ', 'gallery_description', 0),
	array('E-mail do administrador da Galeria', 'gallery_admin_email', 0),
	array('Target e-mail para \'Ver mais imagens\' no e-cards', 'ecards_more_pic_target', 0),
	array('Linguagem', 'lang', 5),
	array('Tema', 'theme', 6),
    array('Titulo especifico da pagina ao inves de>Coppermine', 'nice_titles', 1),
    array('Mostrar blocks a direita', 'right_blocks', 1), // new 1.2.2


	'Album list view',
	array('Largura da tabela principal (pixeis ou %)', 'main_table_width', 0),
	array('N�mero de n�veis de categorias para exibir', 'subcat_level', 0),
	array('N�mero de �lbuns para exibir', 'albums_per_page', 0),
	array('N�mero de colunas � lista de �lbum', 'album_list_cols', 0),
	array('Tamanho de thumbnails em pixels', 'alb_list_thumb_size', 0),
	array('O conte�do da p�gina principal', 'main_page_layout', 0),
    array('Mostra o primeiro nivel de thumbnails nas categorias', 'first_level', 1), 


	'Thumbnail view',
	array('N�mero de colunas em p�gina do thumbnail', 'thumbcols', 0),
	array('N�mero de filas em p�gina do thumbnail', 'thumbrows', 0),
	array('N�mero de M�ximo de tabula��es para exibir', 'max_tabs', 0),
	array('Exibir capta��o da imagem (al�m de t�tulo) baixo o thumbnail', 'caption_in_thumbview', 1),
	array('Exiba n�mero de coment�rios baixo o thumbnail', 'display_comment_count', 1),
	array('Classifica��o default para a ordena��o das imagens', 'default_sort_order', 3),
	array('N�mero de M�nimo de votos para uma imagem para aparecer na \'top-rated\'(lista dos mais votados)', 'min_votes_for_rating', 0),
    array('Alts and title tags of thumbnail show title and keyword instead of picinfo', 'seo_alts', 1), // new in cpg1.2.0nuke


	'Image view &amp; Comment settings',
	array('Largura da tabela para display de gravura (pixeis ou %)', 'picture_table_width', 0),
	array('Informa��o de Gravura s�o vis�vel por default', 'display_pic_info', 1),
	array('Filtro palavras ruins em coment�rios', 'filter_bad_words', 1),
	array('Permita smilles em coment�rios', 'enable_smilies', 1),
    array('Permitir comentarios cunsecutivos de um mesmo usuario numa mesma figura', 'disable_flood_protection', 1), // new in cpg1.2.0nuke
    array('Enviar notifica��o ao Email do administrador a cada envio de comentario' , 'comment_email_notification', 1), // new in cpg1.2.0nuke
	array('Comprimento m�ximo para uma descri��o de imagem', 'max_img_desc_length', 0),
	array('N�mero m�ximo de caracteres em uma palavra', 'max_com_wlength', 0),
	array('N�mero m�ximo de linhas em um coment�rio', 'max_com_lines', 0),
	array('Comprimento M�ximo de um coment�rio', 'max_com_size', 0),
	array('Exibir film strip(imagem de um filme atraz dos thumbnails)', 'display_film_strip', 1),
    array('Numero de itens no film strip', 'max_film_strip_items', 0),
    array('Permitir que usuarios anonimos visualizem figuras em tamanho real', 'allow_anon_fullsize', 1), // new in cpg1.2.0nuke
	array('Numero de dias para estar apto a votar na mesma imagem','keep_votes_time',0), // new in cpg1.2.2c nuke

	'Pictures and thumbnails settings',
	array('Qualidade para arquivos JPEG', 'jpeg_qual', 0),
	array('Largura m�xima ou altura de um thumbnail <b>*</b>', 'thumb_width', 0),
	array('Dimens�o util ( width ou height ou Max aspect para o thumbnail )<b>*</b>', 'thumb_use', 7),
	array('Crie imagens intermedi�rias','make_intermediate',1),
	array('Largura m�xima ou altura de uma imagem intermedi�ria <b>*</b>', 'picture_width', 0),
	array('Tamanho m�ximo para gravuras enviadas (KB)', 'max_upl_size', 0),
	array('Largura m�xima ou altura para imagens enviadas (pixels)', 'max_upl_width_height', 0),

	'User settings',
	array('Permita novos registros do usu�rio', 'allow_user_registration', 1),
	array('Registro do Usu�rio requer confirma��o de email', 'reg_requires_valid_email', 1),
	array('Permita dois usu�rios com o mesmo endere�o de email', 'allow_duplicate_emails_addr', 1),
	array('Usu�rios podem podem ter �lbuns particulares', 'allow_private_albums', 1),

	'Custom fields for image description (leave blank if unused)',
	array('Campo 1 nome', 'user_field1_name', 0),
	array('Campo 2 nome', 'user_field2_name', 0),
	array('Campo 3 nome', 'user_field3_name', 0),
	array('Campo 4 nome', 'user_field4_name', 0),

	'Pictures and thumbnails advanced settings',
	array('Mostrar icone de album privado aos usuarios n�o logados', 'show_private', 1),
	array('Caracteres proibidos em nomes de arquivos', 'forbiden_fname_char',0),
	array('Extens�es aceitaveis de arquivo para imagens que enviarem', 'allowed_file_extensions',0),
	array('M�todo para dimensionar imagens','thumb_method',2),
	array('Caminho ao ImageMagick \'convertido\'utilit�rio (exemplo /usr/bin/X11/)', 'impath', 0),
	array('Permitido tipos de imagem (unicamente v�lidos ao ImageMagick)', 'allowed_img_types',0),
	array('Comande op��es de linha ao ImageMagick', 'im_options', 0),
	array('Leia dados do EXIF em arquivos JPEG', 'read_exif_data', 1),
	array('Leia dados do IPTC em arquivos JPEG', 'read_iptc_data', 1), // new in cpg1.2.0nuke
	array('O diret�rio de �lbum <b>*</b>', 'fullpath', 0),
	array('O diret�rio para imagens do usu�rio <b>*</b>', 'userpics', 0),
	array('O prefixo para imagens intermedi�rias <b>*</b>', 'normal_pfx', 0),
	array('O prefixo para thumbnails <b>*</b>', 'thumb_pfx', 0),
	array('Default mode para diret�rios', 'default_dir_mode', 0),
	array('Default mode para imagens', 'default_file_mode', 0),
	array('Picinfo mostrar o nome do arquivo', 'picinfo_display_filename', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar o nome do album', 'picinfo_display_album_name', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar o tamanho do arquivo', 'picinfo_display_file_size', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar dimens�es do arquivo', 'picinfo_display_dimensions', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar o numero de visualiza��es', 'picinfo_display_count_displayed', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar URL', 'picinfo_display_URL', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar URL como link para Bookmark', 'picinfo_display_URL_bookmark', '1'), // new in cpg1.2.0nuke
    array('Picinfo mostrar link para adicionar ao album-favoritos', 'picinfo_display_favorites', '1'), // new in cpg1.2.0nuke

	'Cookies &amp; Charset settings',
	array('Nome do cookie usado pelo script', 'cookie_name', 0),
	array('Path do cookie usado pelo script', 'cookie_path', 0),
	array('Codifica��o de Caracter', 'charset', 4),

	'Miscellaneous settings',
	array('Habilite modo do debug', 'debug_mode', 1),
    array('Habilite modo do debug avan�ado', 'advanced_debug_mode', 1), // new in cpg1.2.0nuke
    array('Mostrar Alerta de Update para o Administrador', 'showupdate', 1), // new 1.2.2

	
	'<br /><div align="center">(*) Campos marcados com * n�o devem mudar se voc� j� tem imagens em sua galeria</div><br />'
);

// ------------------------------------------------------------------------- //
// File db_input.php
// ------------------------------------------------------------------------- //

if (defined('DB_INPUT_PHP')) $lang_db_input_php = array(
	'empty_name_or_com' => 'Voc� necessita digitar seu nome e um coment�rio',
	'com_added' => 'Seu coment�rio foi incluido',
	'alb_need_title' => 'Voc� tem fornecer um t�tulo ao �lbum!',
	'no_udp_needed' => 'Nenhuma atualiza��o necessitada.',
	'alb_updated' => 'O �lbum foi atualizado',
	'unknown_album' => ' �lbum Selecionado n�o existe ou voc� n�o tem permiss�o para enviar a este �lbum',
	'no_pic_uploaded' => 'Nenhuma imagem enviada !<br /><br />Se voc� tenha realmente selecionado uma imagem para enviar, cheque se servidor permite uploads de arquivo...',
	'err_mkdir' => 'Falha ao criar diret�rio %s !',
	'dest_dir_ro' => 'Diret�rio de Destino %s n�o est� avaliado para escrita !',
	'err_move' => 'Imposs�vel mover %s para %s !',
	'err_fsize_too_large' => 'O tamanho de imagem que voc� quer enviar� grande (m�ximo permitido � %s x %s) !',
	'err_imgsize_too_large' => 'O tamanho do arquivo voc� quer enviar est� grande (m�ximo permitido � %s KB) !',
	'err_invalid_img' => 'O arquivo que voc� enviou n�o � uma imagem v�lida!',
	'allowed_img_types' => 'Voc� pode unicamente enviar %s imagens.',
	'err_insert_pic' => 'A imagem \'%s\' n�o pode ser inserida no �lbum ',
	'upload_success' => 'Sua imagem foi enviada com sucesso<br /><br />Estar� dispon�vel depois aprova��o do admin.',
	'info' => 'Informa��o',
	'com_added' => 'Coment�rio incluido',
	'alb_updated' => 'Album atualizado',
	'err_comment_empty' => 'Seu coment�rio est� vazio!',
	'err_invalid_fext' => 'Somente arquivo com as seguintes extens�es s�o aceitadas : <br /><br />%s.',
	'no_flood' => 'Desculpe, mas voc� j� � o autor do �ltimo coment�rio postado para esta imagem<br /><br />Edite o coment�rio que voc� postou caso queira modificar.',
	'redirect_msg' => 'Voc� est� sendo redirecionado.<br /><br /><br />Click \'CONTINUE\' se a p�gina n�o atualizar automaticamente',
	'upl_success' => 'Sua imagem foi incluida com sucesso',
);

// ------------------------------------------------------------------------- //
// File delete.php
// ------------------------------------------------------------------------- //

if (defined('DELETE_PHP')) $lang_delete_php = array(
	'caption' => 'Capta��o',
	'fs_pic' => 'Imagem de tamanho normal',
	'del_success' => 'Apagado com successo',
	'ns_pic' => 'Imagem intermediaria',
	'err_del' => 'N�o pode ser apagada',
	'thumb_pic' => 'Thumbnail',
	'comment' => 'Coment�rio',
	'im_in_alb' => 'Imagem em �lbum',
	'alb_del_success' => '�lbum \'%s\' apagado',
	'alb_mgr' => ' Administrador De �lbum',
	'err_invalid_data' => 'Dados Inv�lidos recebidos em \'%s\'',
	'create_alb' => 'Criando �lbum \'%s\'',
	'update_alb' => 'Atualizando �lbum \'%s\' com t�tulo \'%s\' e �ndice \'%s\'',
	'del_pic' => 'Apagar imagem',
	'del_alb' => 'Apagar �lbum',
	'del_user' => 'Apagar usu�rio',
	'err_unknown_user' => 'O usu�rio selecionado n�o existe!',
	'comment_deleted' => 'Coment�rio apagado com sucesso',
);

// ------------------------------------------------------------------------- //
// File displayecard.php
// ------------------------------------------------------------------------- //

// Void

// ------------------------------------------------------------------------- //
// File displayimage.php
// ------------------------------------------------------------------------- //

if (defined('DISPLAYIMAGE_PHP')){

$lang_display_image_php = array(
	'confirm_del' => 'Voc� seguro voc� de que deseja APAGAR esta imagem? \\nComent�rios tamb�m ser�o apagados.',
	'del_pic' => 'APAGAR ESTA IMAGEM	',
	'size' => '%s x %s pixels',
	'views' => '%s times',
	'slideshow' => 'Slideshow',
	'stop_slideshow' => 'PARAR SLIDESHOW',
	'view_fs' => 'Pressione ver imagem de tamanho real',
	'edit_pic' => 'EDITAR PICTURE INFO', // new in cpg1.2.0nuke
);

$lang_picinfo = array(
	'title' =>'Informa��o da imagem',
	'Filename' => 'Nome do arquivo',
	'Album name' => 'Nome do �lbum',
	'Rating' => 'Rating (%s votos)',
	'Keywords' => 'Palavras-chaves',
	'File Size' => 'Tamanho do arquivio',
	'Dimensions' => 'Dimens�es',
	'Displayed' => 'Exibido',
	'Camera' => 'C�mera',
	'Date taken' => 'Data tomada',
	'Aperture' => 'Abertura',
	'Exposure time' => 'Tempo de Exposi��o',
	'Focal length' => 'Comprimento do Focal',
	'Comment' => 'Coment�rios',
	'addFav' => 'Adicionar ao Album-Favoritos',//different in 1.2.0nuke
    'addFavPhrase' => 'Favoritos', // new in cpg1.2.0different in 1.2.0nuke
    'remFav' => 'Remover do Album-Favoritos',
    'iptcTitle' => 'Titulo do IPTC', // new in cpg1.2.0nuke
    'iptcCopyright' => 'IPTC Copyright', // new in cpg1.2.0nuke
    'iptcKeywords' => 'IPTC Keywords', // new in cpg1.2.0nuke
    'iptcCategory' => 'Categoria IPTC', // new in cpg1.2.0nuke
    'iptcSubCategories' => 'Sub Categorias IPTC', // new in cpg1.2.0nuke
    'bookmark_page' => 'Bookmark Image', // new in cpg1.2.0nuke
);

$lang_display_comments = array(
	'OK' => 'OK',
	'edit_title' => 'Editar este comment�rio',
	'confirm_delete' => 'Tem certeza de que quer APAGAR este coment�rio?',
	'add_your_comment' => 'Incluir seu coment�rio',
	'name' => 'Nome',
    'comment' => 'Comentario',
	'your_name' => 'Seu nome',
);

$lang_fullsize_popup = array('click_to_close' => 'Click na imagem para fechar esta janela',
);

}

// ------------------------------------------------------------------------- //
// File ecard.php
// ------------------------------------------------------------------------- //

if (defined('ECARDS_PHP') || defined('DISPLAYECARD_PHP')) $lang_ecard_php =array(
	'title' => 'Enviar um e-card',
	'invalid_email' => '<b>Alerta</b> : Endere�o de e-mail inv�lido!',
	'ecard_title' => 'Um e-card de %s para vo�',
	'view_ecard' => 'Se o seu e-card n�o for exibido corretamente, clique neste link para v�-lo',
	'view_more_pics' => 'Clique no link para ver mais imagens!',
	'send_success' => 'Seu e-card foi enviado',
	'send_failed' => 'Desculpe, mas o servidor n�o pode enviar seu e-card...',
	'from' => 'Para',
	'your_name' => 'Seu nome',
	'your_email' => 'Seu email',
	'to' => 'Para',
	'rcpt_name' => 'Nome do Destinat�rio',
	'rcpt_email' => 'Email do Destinat�rio',
	'greetings' => 'Greetings',
	'message' => 'Mensagem',
);

// ------------------------------------------------------------------------- //
// File editpics.php
// ------------------------------------------------------------------------- //

if (defined('EDITPICS_PHP')) $lang_editpics_php = array(
	'pic_info' => 'Informa��o da Imagem',
	'album' => '�lbum',
	'title' => 'T�tulo',
	'desc' => 'Descri��o',
	'keywords' => 'Palavras-chaves',
	'pic_info_str' => '%sx%s - %sKB - %s visto - %s votos',
	'approve' => 'Aprovar imagem',
	'postpone_app' => 'Adiar aprova��o',
	'del_pic' => 'Apagar imagem',
	'read_exif' => 'Ler EXIF info novamente', // new in cpg1.2.0nuke
	'reset_view_count' => 'Resetar contador de visualiza��es',
	'reset_votes' => 'Resetar votos',
	'del_comm' => 'Deletar coment�rios',
	'upl_approval' => 'Enviar Aprova��o',
	'edit_pics' => 'Editar imagems',
	'see_next' => 'Ver pr�ximas imagens',
	'see_prev' => 'Ver imagens anteriores',
	'n_pic' => '%s imagens',
	'n_of_pic_to_disp' => 'N�mero de imagens visto na tela',
	'apply' => 'Aplicar modifica��es'
);

// ------------------------------------------------------------------------- //
// File groupmgr.php
// ------------------------------------------------------------------------- //

if (defined('GROUPMGR_PHP')) $lang_groupmgr_php = array(
	'group_name' => 'Nome do Grupo',
	'disk_quota' => 'Quota no Disco',
	'can_rate' => 'Pode votar nas imagems',
	'can_send_ecards' => 'Pode enviar e-cards',
	'can_post_com' => 'Pode enviar coment�rios',
	'can_upload' => 'Pode enviar imagens',
	'can_have_gallery' => 'Pode ter uma galeria pessoal',
	'apply' => 'Aplicar modifica��es',
	'create_new_group' => 'Criar um novo grupo',
	'del_groups' => 'Apagar grupo(s) selecionado(s)',
	'confirm_del' => 'Aviso, quando voc� apaga um grupo, usu�rios que pertencem para este grupo ser�o transferidos � \'Registrada\'grupo !\n\nVoc� deseja continuar?',
	'title' => 'Administre grupos do usu�rio',
	'approval_1' => 'Aprova��o de Upload Publico (1)',
	'approval_2' => 'Aprova��o de Upload Privado (2)',
	'note1' => '<b>(1)</b> Uploads em um �lbum p�blico necessitam aprova��o do admin',
	'note2' => '<b>(2)</b> Uploads em um �lbum que pertence a usu�rios necessitam de aprova��o do admin',
	'notes' => 'Notas'
);

// ------------------------------------------------------------------------- //
// File index.php
// ------------------------------------------------------------------------- //

if (defined('INDEX_PHP')){

$lang_index_php = array(
	'welcome' => 'Bemvindo !'
);

$lang_album_admin_menu = array(
	'confirm_delete' => 'Tem certeza de que quer APAGAR este �lbum? \\nTodas as imagens e coment�rios pertencentes a este �lbum tamb�m ser�o apagadas.',
	'delete' => 'APAGAR',
	'modify' => 'PROPRIEDADES',
	'edit_pics' => 'EDITAR IMAGENS',
);

$lang_list_categories = array(
	'home' => 'Principal',
	'stat1' => '<b>[pictures]</b> imagens em <b>[albums]</b> �lbuns e <b>[cat]</b> categorias com <b>[comments]</b> coment�rios vistos <b>[views]</b> veses',
	'stat2' => '<b>[pictures]</b> imagens em <b>[albums]</b> �lbuns vistos <b>[views]</b> times',
	'xx_s_gallery' => '%s\'s Galerias',
	'stat3' => '<b>[pictures]</b> imagens em  <b>[albums]</b> �lbuns com <b>[comments]</b> coment�rios vistos <b>[views]</b> times'
);

$lang_list_users = array(
	'user_list' => 'Lista de usu�rios',
	'no_user_gal' => 'N�o h� usu�rios que s�o permitidos ter �lbuns',
	'n_albums' => '%s �lbum(s)',
	'n_pics' => '%s imagem(s)'
);

$lang_list_albums = array(
	'n_pictures' => '%s imagems',
	'last_added' => ', �ltimo adicionado em %s'
);

}

// ------------------------------------------------------------------------- //
// File login.php
// ------------------------------------------------------------------------- //

if (defined('LOGIN_PHP')) $lang_login_php = array(
	'login' => 'Login',
	'enter_login_pswd' => 'Digite sua senha e login para entrar',
	'username' => 'Login',
	'password' => 'Senha',
	'remember_me' => 'Esqueci minha senha',
	'welcome' => 'Benvindo %s ...',
	'err_login' => '*** N�o foi poss�vel log�-lo. Tente outra vez ***',
	'err_already_logged_in' => 'Voc� j� est� registrado!',
);

// ------------------------------------------------------------------------- //
// File logout.php
// ------------------------------------------------------------------------- //

if (defined('LOGOUT_PHP')) $lang_logout_php = array(
	'logout' => 'Sai',
	'bye' => 'At� mais %s ...',
	'err_not_loged_in' => 'Voc� n�o est� logado!',
);

// ------------------------------------------------------------------------- //
// File modifyalb.php
// ------------------------------------------------------------------------- //

if (defined('MODIFYALB_PHP')) $lang_modifyalb_php = array(
	'upd_alb_n' => 'Atualizar �lbum %s',
	'general_settings' => 'Configura��o Geral',
	'alb_title' => 'T�tulo do �lbum',
	'alb_cat' => 'Categoria do �lbum',
	'alb_desc' => 'Descri��o do �lbum',
	'alb_thumb' => 'Thumbnail do �lbum',
	'alb_perm' => 'Permiss��es para este �lbum',
	'can_view' => 'Este �lbum pode ser visto por',
	'can_upload' => 'Visitantes podem enviar imagens',
	'can_post_comments' => 'Visitantes podem postar comment�rios',
	'can_rate' => 'Visitors podem votar na imagem',
	'user_gal' => 'Galeria de usu�rio',
	'no_cat' => '* Sem Categoria *',
	'alb_empty' => 'O �lbum est� bloqueado',
	'last_uploaded' => '�ltima atualiza��o',
	'public_alb' => 'Todos (�lbum p�blico)',
	'me_only' => 'Unicamente meu',
	'owner_only' => '�nico dono do �lbum (%s)',
	'groupp_only' => 'Membros dos \'%s\' grupo',
	'err_no_alb_to_modify' => 'Nenhum �lbum voc� pode modificar no banco de dados.',
	'update' => 'Atualizar �lbum'
);

// ------------------------------------------------------------------------- //
// File ratepic.php
// ------------------------------------------------------------------------- //

if (defined('RATEPIC_PHP')) $lang_rate_pic_php = array(
	'already_rated' => 'Desculpe, mas voc� j� votou nesta imagem',
	'rate_ok' => 'Seu voto foi aceito',
);

// ------------------------------------------------------------------------- //
// File register.php & profile.php
// ------------------------------------------------------------------------- //

if (defined('REGISTER_PHP') || defined('PROFILE_PHP')) {

$lang_register_disclamer = <<<EOT
Os administradores do {SITE_NAME} tem todo o direito de remover ou edita qualquer material que seja considerado abusivo a outras pessoas, por isso informo que toda e qualquer imagem enviada para n�s ficara aguardando libera��o do adminstrador num per�odo m�ximo de 24 horas.<br />
<br />
Voc� concorda em n�o postar qualquer assunto que seja detest�vel, caluniador, vulgar, obsceno, abusivo, amea�ador, sexualmente-orientado ou qualquer outro material que pode viola quaisquer leis aplic�veis. Voc� concorda que o webmaster, administrador e moderadores do {SITE_NAME} tem o direito de remover ou edita qualquer conte�do em qualquer tempo sem autoriza��o do usu�rio. Como um usu�rio, voc� concorda que toda e qualquer informa��o sua s� ter� exist�ncia armazenada em um banco de dados. Tais informa��es n�o ser�o reveladas para terceiros sem seu consentimento. O webmaster e o administrador n�o podem ser responsabilizados por qualquer dano que seja causado em nosso banco de dados.<br />
<br />
Este site usa cookies para armazenar informa��o em seu computador local. Esses cookies servem unicamente para melhorar sua navegabilidade. O endere�o de email � utilizado unicamente por confirmar seu registro detalhado e senha.<br />
<br />
Por pressionar 'I agree' baixo voc� concorda unir por essas condi��es.
EOT;

$lang_register_php = array(
	'page_title' => 'Registro de usu�rios',
	'term_cond' => 'Termos e condi��es',
	'i_agree' => 'Eu aceito',
	'submit' => 'Enviar me registro',
	'err_user_exists' => 'O login que voc� escolheu j� existe, por favor escolha um diferente',
	'err_password_mismatch' => 'As duas senhas n�o s�o id�nticas, por favor tente outra vez',
	'err_uname_short' => 'O login deve possuir o m�nimo de 2 caracteres',
	'err_password_short' => 'A senha deve possuir o m�nimo de 2 caracteres',
	'err_uname_pass_diff' => 'O login e senha deve ser diferente',
	'err_invalid_email' => 'Email inv�lido',
	'err_duplicate_email' => 'Outro usu�rio j� est� registrado com o email fornecido',
	'enter_info' => ' Informa��o de registro de entrada',
	'required_info' => 'Informa��o Requerida',
	'optional_info' => 'Informa��o Opcional',
	'username' => 'Login',
	'password' => 'Senha',
	'password_again' => 'Repita a senha',
	'email' => 'Email',
	'location' => 'Locaza��o',
	'interests' => 'Interesses',
	'website' => 'Website',
	'occupation' => 'Ocupa��o',
	'error' => 'ERRO',
	'confirm_email_subject' => '%s - Confirma��o de Registro',
	'information' => 'Informa��o',
	'failed_sending_email' => 'O email de confirma��o de registro n�o pode ser enviado!',
	'thank_you' => 'Obrigado por registra-se.<br /><br />Um email com informa��o de ativa��o sua conta foi enviado o email fornecido.',
	'acct_created' => 'Sua conta j� foi criada, agora voc� pode logar-se com seu login e senha',
	'acct_active' => 'Sua conta j� foi ativada, agora voc� pode logar-se com seu login e senha',
	'acct_already_act' => 'Sua conta est� j� ativa !',
	'acct_act_failed' => 'Esta conta n�o pode ser ativada!',
	'err_unk_user' => 'Usu�rio Selecionado n�o existe!',
	'x_s_profile' => '%s\'s perfil',
	'group' => 'Grupo',
	'reg_date' => 'Unido',
	'disk_usage' => 'Uso de Disco',
	'change_pass' => 'Mudar senha',
	'current_pass' => 'Senha atual',
	'new_pass' => 'Nova senha',
	'new_pass_again' => 'Repita a nova senha',
	'err_curr_pass' => 'Senha digitada est� incorreta',
	'apply_modif' => 'Aplicar modifica��es',
	'change_pass' => 'Mudar minha senha',
	'update_success' => 'Seu perfil foi atualizado',
	'pass_chg_success' => 'Sua senha foi alterada',
	'pass_chg_error' => 'N�o foi poss�vel alterar sua senha',
);

$lang_register_confirm_email = <<<EOT
Obrigado por registrar em {SITE_NAME}

Seu login � : "{USER_NAME}"
Sua senha � : "{PASSWORD}"

Para ativar sua conta, voc� necessita clicar no link abaixo
ou copiar e colar isto em seu navegador.

{ACT_LINK}

Cumprimentos,

A administra��o do {SITE_NAME}

EOT;

}

// ------------------------------------------------------------------------- //
// File reviewcom.php
// ------------------------------------------------------------------------- //

if (defined('REVIEWCOM_PHP')) $lang_reviewcom_php = array(
	'title' => 'Rever coment�rios',
	'no_comment' => 'N�o h� coment�rio para rever',
	'n_comm_del' => '%s coment�rio(s) apagado',
	'n_comm_disp' => 'N�mero de coment�rios para exibir',
	'see_prev' => 'Ver pr�ximo',
	'see_next' => 'Ver anterior',
	'del_comm' => 'Apagar os comment�rios selecionados',
);


// ------------------------------------------------------------------------- //
// File search.php - OK
// ------------------------------------------------------------------------- //

if (defined('SEARCH_PHP')) $lang_search_php = array(
	0 => 'Pesquise a cole��o de imagem',
);

// ------------------------------------------------------------------------- //
// File searchnew.php
// ------------------------------------------------------------------------- //

if (defined('SEARCHNEW_PHP')) $lang_search_new_php = array(
	'page_title' => 'Buscar nova imagem',
	'select_dir' => 'Selecionar diret�rio',
	'select_dir_msg' => 'Esta fun��o permite voc� para adicionar um lote de imagens para enviar em seu servidor por FTP.<br /><br />Selecione o diret�rio onde voc� deseja enviar suas imagens',
	'no_pic_to_add' => 'Sem imagens para adicionar',
	'need_one_album' => 'Voc� necessita ao menos de um �lbum para usar esta fun��o',
	'warning' => 'Aviso',
	'change_perm' => 'O Script n�o p�de escrever neste diret�rio, voc� necessita mudar seu Chmod do diret�rio para 755 ou 777 antes tentar adicionar as suas imagens!',
	'target_album' => '<b>Colocado imagens de &quot;</b>%s<b>&quot; dentro </b>%s',
	'folder' => 'Folder',
	'image' => 'Imagem',
	'album' => '�lbum',
	'result' => 'Resultado',
	'dir_ro' => 'Sem escrever. ',
	'dir_cant_read' => 'Ileg�vel. ',
	'insert' => 'Adicionando novas imagens � galeria',
	'list_new_pic' => 'Lista de novas imagens',
	'insert_selected' => 'Inserir imagens selecionadas',
	'no_pic_found' => 'Nenhuma nova imagem foi encontrada',
	'be_patient' => 'Por Favor seja paciente, o script necessita um tempo para adicionar as imagens',
	'notes' =>  '<ul>'.
				'<li><b>OK</b> : quer dizer que a figura foi adicionada com sucesso'.
				'<li><b>DP</b> : quer dizer que a figura esta duplicada ent�o ela j� existe no database'.
				'<li><b>PB</b> : quer dizer que a figura n�o pode ser adicionada, cheque sua configura��o e a permiss�o dos diretorios onde as figuras est�o localizadas'.
				'<li>Se os \'simbolos\' OK, DP, PB n�o aparecerem click no X da figura para ver alguma mensagem de erro produzida pelo PHP'.
				'<li>Se seu browser mostrou a mensagem de timeout, click no bot�o atualizar'.
				'</ul>',
	'select_album' => 'Selecione um album', // new in nuke
    'no_album' => 'Nenhum nome de album foi selecionado, click em Voltar e selecione um album para colocar suas figuras',
);


// ------------------------------------------------------------------------- //
// File thumbnails.php
// ------------------------------------------------------------------------- //

// Void


// ------------------------------------------------------------------------- //
// File upload.php
// ------------------------------------------------------------------------- //

if (defined('UPLOAD_PHP')) $lang_upload_php = array(
	'title' => 'Enviar imagem',
	'max_fsize' => 'O Tamanho M�ximo permitido  de arquivo � %s KB',
	'album' => '�lbum',
	'picture' => 'Imagem',
	'pic_title' => 'T�tulo da imagem',
	'description' => 'Descri��o da imagem',
	'keywords' => 'Palavras-chaves (separe com espa�os)',
	'err_no_alb_uploadables' => 'Desculpe, n�o h� �lbum com permi��o para voc� enviar esta imagem',
);

// ------------------------------------------------------------------------- //
// File usermgr.php
// ------------------------------------------------------------------------- //

if (defined('USERMGR_PHP')) $lang_usermgr_php = array(
	'title' => 'Administra��o usu�rios',
	'name_a' => 'Nome ascendente',
	'name_d' => 'Nome descendente',
	'group_a' => 'Grupo ascendente',
	'group_d' => 'Grupo descendente',
	'reg_a' => 'Reg date ascendente',
	'reg_d' => 'Reg date descendente',
	'pic_a' => 'Pic count ascendente',
	'pic_d' => 'Pic count descendente',
	'disku_a' => 'Disco usado ascendente',
	'disku_d' => 'Disco usado descendente',
	'sort_by' => 'Classifique usu�rios por',
	'err_no_users' => 'A tabela do Usu�rio est� vazia!',
	'err_edit_self' => 'Voc� n�o pode editar seu perfil, usando o \'Meu perfil\' para isso',
	'edit' => 'EDITAR',
	'delete' => 'DELETAR',
	'name' => 'Nome de usu�rio',
	'group' => 'Grupo',
	'inactive' => 'Inativo',
	'operations' => 'Opera��es',
	'pictures' => 'Imagens',
	'disk_space' => 'Espa�o usado / Quota',
	'registered_on' => 'Registrado em',
	'u_user_on_p_pages' => '%d usu�rios em %d p�gina(s)',
	'confirm_del' => 'Realmente quer APAGAR este usu�rio? \\nTodas as imagens e �lbum relacionadas a ele ser�o apagadas tamb�m.',
	'mail' => 'MAIL',
	'err_unknown_user' => 'O usu�rio selecionado n�o existe!',
	'modify_user' => 'Modificar usu�rio',
	'notes' => 'Notas',
	'note_list' => '<li>Se voc� n�o deseja mudar a sua senha, deixe o campo "senha" em branco',
	'password' => 'Senha',
	'user_active_cp' => 'O Usu�rio est� ativo',
	'user_group_cp' => 'Grupo',
	'user_email' => 'Email',
	'user_web_site' => 'Website do Usu�rio',
	'create_new_user' => 'Criar uma nova conta',
	'user_from' => 'Localiza��o',
	'user_interests' => 'Interesses',
	'user_occ' => 'Ocupa��o',
);
// ------------------------------------------------------------------------- //
// File util.php
// ------------------------------------------------------------------------- //
if (defined('UTIL_PHP')) $lang_util_php = array(
		'title' => 'Redimensionar figuras',
        'what_it_does' => 'What it does',
        'what_update_titles' => 'Updates titulo do nome do arquivo',
        'what_delete_title' => 'Deletar titulos',
        'what_rebuild' => 'Reconstruir thumbnails e redimencionar figuras',
        'what_delete_originals' => 'Deletar figuras originais trocando-as pelas vers�es redimencionadas',
        'file' => 'Arquivo',
        'title_set_to' => 'title set to',
        'submit_form' => 'submit',
        'updated_succesfully' => 'update executado com sucesso',
        'error_create' => 'ERRO criando',
        'continue' => 'Envie mais imagens',
        'main_success' => 'O arquivo %s foi perfeitamente usado como figura principal',
        'error_rename' => 'Erro renomeando %s para %s',
        'error_not_found' => 'O arquivo %s n�o foi encontrado',
        'back' => 'voltar para main',
        'thumbs_wait' => 'Updating thumbnails e/ou imagens redimensionadas, porfavor espere...',
        'thumbs_continue_wait' => 'Continuando os updates dos thumbnails e/ou imagens redimensionadas...',
        'titles_wait' => 'Updating titulos, porfavor espere...',
        'delete_wait' => 'Deletando titulos, porfavor espere...',
        'replace_wait' => 'Deletando originais e trocando-os pelas imagens redimensionadas, porfavor espere..',
        'instruction' => 'Instru��es rapidas',
        'instruction_action' => 'Selecione uma a��o',
        'instruction_parameter' => 'Configure os parametros',
        'instruction_album' => 'Selecione um album',
        'instruction_press' => 'Pressione %s',
        'update' => 'Update thumbs e/ou fotos redimensionadas',
        'update_what' => 'O que deve ser updated',
        'update_thumb' => 'Somente thumbnails',
        'update_pic' => 'Somente figures redimensionadas',
        'update_both' => 'Both thumbnails and resized pictures',
        'update_number' => 'Numero de imagens processadas por click',
        'update_option' => '(Tente selecionar esta op��o com baixos valores se voc� tiver problemas de timeout)',
        'filename_title' => 'Nomedoarquivo &rArr; Titulo da figura',
        'filename_how' => 'Como o Nome do arquivo deveria ser modificado',
        'filename_remove' => 'Remova o final .jpg troque-o por _ (underscore) com espa�os',
        'filename_euro' => 'Mude 2003_11_23_13_20_20.jpg para 23/11/2003 13:20',
        'filename_us' => 'Mude 2003_11_23_13_20_20.jpg para 11/23/2003 13:20',
        'filename_time' => 'Mude 2003_11_23_13_20_20.jpg para 13:20',
        'delete' => 'Delete os titulos das figuras ou as figuras originais',
        'delete_title' => 'Delete os titulos das figuras',
        'delete_original' => 'Delete as figuras originais',
        'delete_replace' => 'Delete as imagens originais trocando-as pelas ver��es redimensionadas',
        'select_album' => 'Selecione um album',
        );
// ------------------------------------------------------------------------- //
// File pagetitle.inc.php
// ------------------------------------------------------------------------- //
$lang_pagetitle_php = array(// new in cpg1.2.0nuke    'divider' => '>',
    'viewing' => 'Vendo Photo',
    'usr' => "'s Photo Gallery",
    'photogallery' => 'Photo Gallery',
    );

?>
