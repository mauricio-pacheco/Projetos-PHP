Shadowbox.init({handleOversize: "drag",modal: true});
var openShadowboxItem = function(id){Shadowbox.open(document.getElementById(id));}
var PNGclassses = '.main-shadow-left,'+'.main-shadow-right,'+'.orkut,'+'.facebook,'+'.youtube,'+'.twitter,'+'.caption,'+'.item-top-button,'+'.top-over-button,'+'.title,'+'.footer,'+'.png,'+'h1,'+'.main-top-border'+'';
loadSliderCaption = function(){$('#banner-caption-text').html(this.rel);$('#banner-caption-text').show();}
onlyNumbers = function(evt) {evt = (evt) ? evt : window.event;var charCode = (evt.which) ? evt.which : evt.keyCode;if (charCode > 31 && (charCode < 48 || charCode > 57)){return false;}return true;}
function checkdate( m, d, y ){return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();}
verificaFormCadastro = function() {var retorno = true;var nome = $('input[name="nome"]');var email = $('input[name="email"]');var dia = $('input[name="dia"]');var mes = $('input[name="mes"]');var ano = $('input[name="ano"]');var estado = $('#select-estado');var cidade = $('#select-cidade');var senha = $('input[name="senha"]');var senha_confirm = $('input[name="senha-confirm"]');var mensagem = '';if(nome.length > 0) {if(nome.val() == '') {retorno = false;nome.parent().css('color', '#ff0000');mensagem = mensagem+'Preenchimento do campo Nome é obrigatório!<br />';} else {nome.parent().css('color', '#848484');}}if(email.length > 0) {var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;if(email.val() == '' || email.val().search(emailRegEx) == -1) {retorno = false;email.parent().css('color', '#ff0000');mensagem = mensagem+'Email inválido!<br />';} else {email.parent().css('color', '#848484');}}var dataOk = true;if(dia.length > 0) {if(dia.val() == '' || parseInt(dia.val(),10) > 31) {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if(mes.length > 0) {if(mes.val() == '' || parseInt(mes.val(),10) > 12) {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if(ano.length > 0) {if(ano.val() == '') {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if( dataOk ) {dataOk = checkdate(mes.val(), dia.val(), ano.val());}if( dataOk ) {dia.parent().css('color', '#848484');} else {mensagem = mensagem+'Data inválida!<br />';dia.parent().css('color', '#ff0000');}if(estado.length > 0) {if(estado.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione um estado!<br />';estado.parent().css('color', '#ff0000');} else {estado.parent().css('color', '#848484');}}if(cidade.length > 0) {if(cidade.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione uma cidade!<br />';cidade.parent().css('color', '#ff0000');} else {cidade.parent().css('color', '#848484');}}if(senha.length > 0) {if(senha.val() == '') {retorno = false;senha.parent().css('color', '#ff0000');} else {senha.parent().css('color', '#848484');}}if(senha_confirm.length > 0) {if(senha_confirm.val() == '' || senha_confirm.val() != senha.val()) {retorno = false;mensagem = mensagem+'Senha e confirmação não preenchidas corretamente!<br />';senha_confirm.parent().css('color', '#ff0000');} else {senha_confirm.parent().css('color', '#848484');}}if(mensagem!=''){$('#error-form').html(mensagem);}return retorno;}
verificaFormContato = function() {var retorno = true;var nome = $('input[name="nome"]');var email = $('input[name="email"]');var dia = $('input[name="dia"]');var mes = $('input[name="mes"]');var ano = $('input[name="ano"]');var msg = $('textarea[name="mensagem"]');var regiao = $('#select-contato-regiao');var area = $('#select-contato-area');var mensagem = '';if(nome.length > 0) {if(nome.val() == '') {retorno = false;nome.parent().css('color', '#ff0000');mensagem = mensagem+'Preenchimento do campo Nome é obrigatório!<br />';} else {nome.parent().css('color', '#848484');}}if(msg.length > 0) {if(nome.val() == '') {retorno = false;msg.parent().css('color', '#ff0000');mensagem = mensagem+'Preenchimento do campo Mensagem é obrigatório!<br />';} else {msg.parent().css('color', '#848484');}}if(email.length > 0) {var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;if(email.val() == '' || email.val().search(emailRegEx) == -1) {retorno = false;email.parent().css('color', '#ff0000');mensagem = mensagem+'Email inválido!<br />';} else {email.parent().css('color', '#848484');}}var dataOk = true;if(dia.length > 0 && mes.length > 0 && ano.length > 0) {if(dia.val() != '' && mes.val() != '' && ano.val() != '') {dataOk = checkdate(mes.val(), dia.val(), ano.val());}}if( dataOk ) {dia.parent().css('color', '#848484');} else {mensagem = mensagem+'Data inválida!<br />';dia.parent().css('color', '#ff0000');}if(regiao.length > 0) {if(regiao.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione uma Região!<br />';regiao.parent().css('color', '#ff0000');} else {regiao.parent().css('color', '#848484');}}if(area.length > 0) {if(area.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione uma área!<br />';area.parent().css('color', '#ff0000');} else {area.parent().css('color', '#848484');}}if(mensagem!=''){$('#error-form').html(mensagem);}return retorno;}
verificaFormEdit = function() {var retorno = true;var nome = $('input[name="nome"]');var email = $('input[name="email"]');var dia = $('input[name="dia"]');var mes = $('input[name="mes"]');var ano = $('input[name="ano"]');var estado = $('#select-estado');var cidade = $('#select-cidade');var senha = $('input[name="senha"]');var senha_confirm = $('input[name="senha-confirm"]');var mensagem = '';if(nome.length > 0) {if(nome.val() == '') {retorno = false;nome.parent().css('color', '#ff0000');mensagem = mensagem+'Preenchimento do campo Nome é obrigatório!<br />';} else {nome.parent().css('color', '#848484');}}if(email.length > 0) {var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;if(email.val() == '' || email.val().search(emailRegEx) == -1) {retorno = false;email.parent().css('color', '#ff0000');mensagem = mensagem+'Email inválido!<br />';} else {email.parent().css('color', '#848484');}}var dataOk = true;if(dia.length > 0) {if(dia.val() == '' || parseInt(dia.val(),10) > 31) {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if(mes.length > 0) {if(mes.val() == '' || parseInt(mes.val(),10) > 12) {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if(ano.length > 0) {if(ano.val() == '') {retorno = false;dataOk = ( dataOk && false );} else {dataOk = ( dataOk && true );}}if( dataOk ) {dataOk = checkdate(mes.val(), dia.val(), ano.val());}if( dataOk ) {dia.parent().css('color', '#848484');} else {mensagem = mensagem+'Data inválida!<br />';dia.parent().css('color', '#ff0000');}if(estado.length > 0) {if(estado.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione um estado!<br />';estado.parent().css('color', '#ff0000');} else {estado.parent().css('color', '#848484');}}if(cidade.length > 0) {if(cidade.val() == '-1') {retorno = false;mensagem = mensagem+'Selecione uma cidade!<br />';cidade.parent().css('color', '#ff0000');} else {cidade.parent().css('color', '#848484');}}if(senha.length > 0 && senha_confirm.length > 0) {if(senha_confirm.val() != senha.val()) {retorno = false;mensagem = mensagem+'Senha e confirmação não preenchidas corretamente!<br />';senha_confirm.parent().css('color', '#ff0000');} else {senha_confirm.parent().css('color', '#848484');}}if(mensagem!=''){$('#error-form').html(mensagem);}return retorno;}
selectPeriodoTop10 = function(codigo){if(codigo != '-1'){$('#select-periodo').submit();}}
$(document).ready(function() {
var controle = 0;
if($('#twitter_update_list li').length > 0) {
$('#twitter_update_list li').each(
function() {
if( controle == 0 ) {
$(this).addClass('alt');
controle = 1;
} else {
controle = 0;
}
}
);
}
$('.gallery a').lightBox({
fixedNavigation:true
});
if($('#main-menu').length > 0) {
var dockOptions = {
align: 'bottom',
labels: 'bc',
size: 28,
coefficient: 0.7,
distance: 60
};
$('#main-menu').jqDock(dockOptions);
}
if($('#images').length > 0) {
$('#images').cycle({
fx:     'scrollLeft',
speed:  800,
timeout:  10000,
pager: '#slider-nav',
after: loadSliderCaption,
before: function() {
$('#banner-caption-text').hide()
}
});
}

if($('#estacao-container').length > 0) {
$('#estacao-container').cycle({
fx:     'scrollLeft',
speed:  800,
timeout:  10000
});
$('#estacao-container').show();
}
if($('#aniversario-roll').length > 0) {
$('#aniversario-roll').cycle({
fx:     'scrollLeft',
speed:  800,
timeout:  10000
});
$('#aniversario-roll').show();
}
if($('#password-label').length > 0 ) {
$('#password-label').focus(
function() {
$('#password-label').hide();
$('#password').show();
$('#password').focus();
}
);
$('#password').focus(
function() {
$('#password-label').hide();
}
);
$('#password').blur(
function() {
if($(this).val() == '') {
$('#password').hide();
$('#password-label').show();
}
}
);
}
if($('#select-estado').length > 0) {
$('#select-estado').change(
function() {
if($(this).val() != '-1' ) {
$.ajax({
url: "/cadastro/get-cidades/codigo/"+$(this).val(),
success: function(data) {
$('#select-cidade').attr('disabled', false);
$('#select-cidade').html(data);
}
});
} else {
$('#select-cidade').html('<option value="-1">Selecione um estado</option>');
$('#select-cidade').attr('disabled', true);
}
}
);
}
if($('#select-contato-regiao').length > 0) {
$('#select-contato-regiao').change(
function() {
if($(this).val() != '-1' ) {
$.ajax({
url: "/fale-conosco/get-contatos/codigo/"+$(this).val(),
success: function(data) {
$('#select-contato-area').attr('disabled', false);
$('#select-contato-area').html(data);
}
});
} else {
$('#select-contato-area').html('<option value="-1">Selecione uma região</option>');
$('#select-contato-area').attr('disabled', true);
}
}
);
}
if($('.link-musica-artista').length > 0) {
$('.link-musica-artista').click(
function() {
$('#videos-container').html('Carregando...');
var id_video = $(this).find('input').val();
var id_artista = $('#artista-id').val();
$.ajax({
url: "/meu-artista/get-video/id/"+id_video+"/artista/"+id_artista,
success: function(data) {
$('#videos-container').html(data);
}
});
}
);
}
}
);