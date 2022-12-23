$(document).ready(function(){
	$('#busca').example(palavra_chave);
    $('#boletim').example(digite_email);
    $('#boletim').keyup(function(){ $.cookie('email', $(this).val(), { path: '/', expires: 600 });   });
    $('#por-palavra-chave').example(palavra_chave);
	$('#por-modelo').example(por_modelo);
    $(".bt-player a img").pngfix();
    $(".novaJanela").click(function() {
    	var aux = $(this).attr("lang").split("x");
    	abre_popup($(this).attr("href"),aux[0],aux[1]);
    	return false;
    });
    $('.sifr-azul').sifr({
        font: live_site+'extension/ezflow/design/weg/flash/HelveticaNeueLT_Pro_45_Lt',
        textAlign: 'left'
    });
    $('.sifr-cinza').sifr({
        font: live_site+'extension/ezflow/design/weg/flash/HelveticaNeueLT_Pro_67_MdCn',
        textAlign: 'left'
    });
});

$(function(){
	$('ul#menu').jdMenu({	onShow: loadMenu });
});

var MENU_COUNTER = 1;
function loadMenu() {}

$(document).ready(function() {
    $('.menu').mouseover(function() {
        var img = $(this).find('a').find('img');
        var src = img.attr('src');
        img.attr('src', src.replace("-"+vinativo+".jpg", "-"+vativo+".jpg"));
    });
    $('.menu').mouseout(function() {
        var img = $(this).find('a').find('img');
        var src = img.attr('src');
        img.attr('src', src.replace("-"+vativo+".jpg", "-"+vinativo+".jpg"));
    });
    var tam = 11;
    $('.mais,.menos').click(function() {
         var cls = $(this).attr('class');
         tam = (((cls == 'menos' && tam > 9)?tam-1:(cls == 'mais'&& tam < 15)?tam+1:tam));
         atualizaFonte();
    });
    function atualizaFonte() {
        $('.texto').each(function() {
             $(this).css('font-size', tam+'px');
			 $(this).find("p").css('font-size', tam+'px');
			 $(this).find("ul").css('font-size', tam+'px');
			 $(this).find("ul").find("li").css('font-size', tam+'px');
        });
    }
});

function abre_edicao(url){
	abre_popup(url,796,528);
}

function abre_popup(url,largura,altura){
	w = screen.width;
	h = screen.height;
	meio_w = w/2;
	meio_h = h/2;
	altura2 = altura/2;
	largura2 = largura/2;
	meio1 = meio_h-altura2;
	meio2 = meio_w-largura2;
	window.open(url,'WEG','height=' + altura + ', width=' + largura + ',top='+meio1+', left='+meio2+',status=no,toolbar=no,menubar=no,location=no,scrollbars=yes,resizable=yes');
}

function abre_edicao_anterior(url){
	window.open(url,'_blank');
}