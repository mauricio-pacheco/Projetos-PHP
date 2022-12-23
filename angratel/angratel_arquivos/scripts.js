//
//
//
//
//
//
//<!#------------------- MAXIMIZA BROWSER -----------------------#!>
function maximiza(){
top.window.moveTo(0,0);
if (document.all) {
top.window.resizeTo(screen.availWidth,screen.availHeight);
}
else if (document.layers||document.getElementById){
    if (top.window.outerHeight<screen.availHeight||top.window.outerWidth<screen.availWidth){
    top.window.outerHeight = screen.availHeight;
    top.window.outerWidth = screen.availWidth;
    }
 }
}
//<!#------------------- MAXIMIZA BROWSER -----------------------#!>
//
//
//
//
//<!#------------------- STATUS BAR FIXO -----------------------#!>

function clockTick(){
currentTime=new Date();
window.status="....::: Angratel Celulares - Revenda VIVO para todo o Brasil  :::....";
setTimeout("clockTick()",1);
}
clockTick();

//<!#------------------- STATUS BAR FIXO -----------------------#!>
//
//
//
//
//<!#-------------------------- FRAME BARRA GLB -----------------------#!>
b_versao = parseInt(navigator.appVersion);

var frame = null;

function FrameBarraGlb(w,h,nome,URL){

var justPicture = 'TRUE';
var scroll = 'no';

//javascript:FrameBarraGlb(500,400,'GNN','http://www.glb.com.br/clipweb/manchetes/noticias.asp?946448');

if(b_versao>=4){
LeftPosition=(screen.width)?(screen.width-w)/2:0;
TopPosition=(screen.height)?(screen.height-h)/2:0;
}
    if (justPicture) {
    var frame = window.open('', '', 'width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+'');
    frame.document.write(
    

    '<html>\n'
    +'<head>\n'
    +'<title>....::: www.Conectacom.net - Notícias :::....</title>\n'
    +'</head>\n'
    +'<frameset rows="31,*" frameborder="no" border="0" framespacing="0">\n'
    +'<frame src="barra_frame_ultimas_glb.htm" name="barra" scrolling="NO" noresize >\n'
    +'<frame src="'+URL+'" name="mainFrame" scrolling="auto" noresize>\n'
    +'</frameset>\n'
    +'<noframes><body>\n'
    +'</body></noframes>\n'
    +'</html>');
  //     return true;
        }
}
//<!#-------------------------- FRAME BARRA GLB -----------------------#!>
//
//
//
//<!#-------------------------- FRAME BARRA ESTADAO -----------------------#!>
b_versao = parseInt(navigator.appVersion);

var frame = null;

function janela(param,w,h,nome){

var justPicture = 'TRUE';
var scroll = 'no';

if(b_versao>=4){
LeftPosition=(screen.width)?(screen.width-w)/2:0;
TopPosition=(screen.height)?(screen.height-h)/2:0;
}
    if (justPicture) {
    var frame = window.open('', '', 'width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+'');
    frame.document.write(


    '<html>\n'
    +'<head>\n'
    +'<title>....::: www.Conectacom.net - Notícias :::....</title>\n'
    +'</head>\n'
    +'<frameset rows="31,*" frameborder="no" border="0" framespacing="0">\n'
    +'<frame src="barra_frame_ultimas_glb.htm" name="barra" scrolling="NO" noresize >\n'
    +'<frame src="'+param+'" name="mainFrame" scrolling="auto" noresize>\n'
    +'</frameset>\n'
    +'<noframes><body>\n'
    +'</body></noframes>\n'
    +'</html>');
  //     return true;
        }
}
//<!#-------------------------- FRAME BARRA ESTADAO -----------------------#!>
//
//
//
//
//<!#-------------------------- FRAME BARRA HOROSCOPO -----------------------#!>
b_versao = parseInt(navigator.appVersion);
var frame = null;

function abre(url,janela,propriedades){
var justPicture = 'TRUE';
var scroll = 'no';
var janela = 'SIGNO';

    if (justPicture){

    var frame = window.open('', '', propriedades);
    frame.document.write(
    '<html>\n'
    +'<head>\n'
    +'<title>....::: www.Conectacom.net - Horóscopo :::....</title>\n'
    +'</head>\n'
    +'<frameset rows="31,*" frameborder="no" border="0" framespacing="0">\n'
    +'<frame src="barra_frame_ultimas_glb.htm" name="barra" scrolling="NO" noresize >\n'
    +'<frame src="'+url+'" name="mainFrame" scrolling="auto" noresize framespacing="0" frameborder="no" noresize>\n'
    +'</frameset>\n'
    +'<noframes><body>\n'
    +'</body></noframes>\n'
    +'</html>');
        }
}
//<!#-------------------------- FRAME BARRA HOROSCOPO -----------------------#!>
//
//
//
//
//<!#-------------------------- FRAME GAMES ONLINE  -----------------------#!>
b_versao = parseInt(navigator.appVersion);
var frame = null;

function gamesOnline(pagina,nome,w,h,scroll){

var justPicture = 'TRUE';
var scroll = 'no';

if(b_versao>=4){
LeftPosition=(screen.width)?(screen.width-w)/2:0;
TopPosition=(screen.height)?(screen.height-h)/2:0;
}
    if (justPicture) {
    var frame = window.open('', '', 'width='+w+',height='+h+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+'');
    frame.document.write(
    '<html>\n'
    +'<head>\n'
    +'<title>....::: www.Conectacom.net - Games :::....</title>\n'
    +'</head>\n'
    +'<frameset rows="31,*" frameborder="no" border="0" framespacing="0">\n'
    +'<frame src="barra_frame_ultimas_glb.htm" name="barra" scrolling="NO" noresize >\n'
    +'<frame src="'+pagina+'" name="mainFrame" scrolling="auto" noresize framespacing="0" frameborder="no">\n'
    +'</frameset>\n'
    +'<noframes><body>\n'
    +'</body></noframes>\n'
    +'</html>');
    }
}
//<!#-------------------------- FRAME GAMES ONLINE  -----------------------#!>
//
//
//
//
//<!#--------------------- SCRIPT DO SQUIRRELMAIL -----------------#!>
function squirrelmail_loginpage_onload() {
    document.forms[0].js_autodetect_results.value = '1';
    var textElements = 0;
    for (i = 0; i < document.forms[0].elements.length; i++) {
      if (document.forms[0].elements[i].type == "text" || document.forms[0].elements[i].type == "password") {
        textElements++;
        if (textElements == 1) {
          document.forms[0].elements[i].focus();
          break;
        }
      }
    }
  }
//<!#--------------------- CUSTUMER LOGIN CHECANDO FORM -----------------#!>
//
//
//
//
//
//
//<!#------------ CUSTUMER LOGIN CHECANDO FORM ( BARRA TOP )-----------#!>
function barratopcustomerlogin(){

    if (document.barratop.elements[0].value == '') {
    alert('Digite seu login');
    document.barratop.elements[0].focus();
    return false;
    }

    if (document.barratop.elements[1].value == '') {
    alert('Digite sua senha');
    document.barratop.elements[1].focus();
    return false;
    }

    if (document.barratop.elements[0].value.length < 3){
    alert('Digite seu login\ncom pelo menos 3 dígitos');
    document.barratop.elements[0].focus();
    return false;
    }

    if (document.barratop.elements[1].value.length < 3){
    alert('Digite sua senha\ncom pelo menos 3 dígitos');
    document.barratop.elements[1].value = '';
    document.barratop.elements[1].focus();
    return false;
    }

    else {
    document.barratop.submit();
    document.barratop.elements[0].value = '';
    document.barratop.elements[1].value = '';
    }
}

//<!#------------ CUSTUMER LOGIN CHECANDO FORM ( BARRA TOP )-----------#!>
//
//
//
  
//
//
//
//<!#--------------------- CUSTUMER LOGIN CHECANDO FORM -----------------#!>
function customerlogin(){

    if (document.atualizacao.elements[0].value == '') {
    alert('Digite seu login');
    document.atualizacao.elements[0].focus();
    return false;
    }

    if (document.atualizacao.elements[1].value == '') {
    alert('Digite sua senha');
    document.atualizacao.elements[1].focus();
    return false;
    }

    if (document.atualizacao.elements[0].value.length < 3){
    alert('Digite seu login\ncom pelo menos 3 dígitos');
    document.atualizacao.elements[0].focus();
    return false;
    }

    if (document.atualizacao.elements[1].value.length < 3){
    alert('Digite sua senha\ncom pelo menos 3 dígitos');
    document.atualizacao.elements[1].value = '';
    document.atualizacao.elements[1].focus();
    return false;
    }

    else {
    document.atualizacao.submit();
    document.atualizacao.elements[0].value = '';
    document.atualizacao.elements[1].value = '';
    }
}

//<!#--------------------- CUSTUMER LOGIN CHECANDO FORM -----------------#!>
//
//
//
//
//
//
//<!#--------------------- DATA POR EXTENSO (BARRA TOP) -----------------#!>
function databarratop(){
hoje = new Date()

dia = hoje.getDate()
dias = hoje.getDay()
mes = hoje.getMonth()
ano = hoje.getYear()
	if (dia < 10)
		dia = "0" + dia
	if (ano < 2000)
		ano = "19" + ano

function CriaArray (n)
{
this.length = n
}
NomeDia = new CriaArray(7)
NomeDia[0] = "Domingo"
NomeDia[1] = "Segunda"
NomeDia[2] = "Terça"
NomeDia[3] = "Quarta"
NomeDia[4] = "Quinta"
NomeDia[5] = "Sexta"
NomeDia[6] = "Sábado"


//NomeMes = new CriaArray(12)
//NomeMes[0] = "Jan"
//NomeMes[1] = "Fev"
//NomeMes[2] = "Mar"
//NomeMes[3] = "Abr"
//NomeMes[4] = "Mai"
//NomeMes[5] = "Jun"
//NomeMes[6] = "Jul"
//NomeMes[7] = "Ago"
//NomeMes[8] = "Set"
//NomeMes[9] = "Out"
//NomeMes[10] = "Nov"
//NomeMes[11] = "Dez"


NomeMes = new CriaArray(12)
NomeMes[0] = "Janeiro"
NomeMes[1] = "Fevereiro"
NomeMes[2] = "Março"
NomeMes[3] = "Abril"
NomeMes[4] = "Maio"
NomeMes[5] = "Junho"
NomeMes[6] = "Julho"
NomeMes[7] = "Agosto"
NomeMes[8] = "Setembro"
NomeMes[9] = "Outubro"
NomeMes[10] = "Novembro"
NomeMes[11] = "Dezembro"


//document.write (NomeDia[dias] + ", " + dia + " de " + NomeMes[mes] + " de " + ano)
//document.write (NomeDia[dias] + ", " + dia + "/" + mes + "/" + ano)
//document.write (dia + " de " + NomeMes[mes] + " de " + ano)
document.write ("Maricá, " + dia + " " + NomeMes[mes]+ " " + ano)
//document.write (NomeDia[dias] + ", " + dia + " de " + NomeMes[mes] + " " + ano)

}
//<!#--------------------- DATA POR EXTENSO (BARRA TOP) -----------------#!>
//
//
//
//
//
//<!#-------------------------- HORA (BARRA MEIO) ----------------------#!>
function horabarrameio(){
var agora  = new Date();
var hora   = agora.getHours();
var minuto = agora.getMinutes();

    if(minuto < 10)
    document.write(""+hora + ":0" + minuto+"");
    else
    document.write("" + hora + ":" + minuto+"");
}
//<!#-------------------------- HORA (BARRA MEIO) ----------------------#!>
//
//
//
//
//
//<!#-------------------------- HORA (BARRA MEIO) ----------------------#!>
function addbookmark(){
var bookmarkurl="http://www.conectacom.net"
var bookmarktitle=":: Conectacom - Seu provedor de Internet ::"
if (document.all)
window.external.AddFavorite(bookmarkurl,bookmarktitle)

}
//<!#-------------------------- HORA (BARRA MEIO) ----------------------#!>
//
//
//
//
//<!#-------------------------- MENU SWAP COR TD ----------------------#!>
function entrando(src,cor)

{
	if (!src.contains(event.fromElement))
	{
	  src.bgColor = cor;
	  //src.style.cursor = 'hand';
	}
}

function saindo(src,cor)
{
	if (!src.contains(event.toElement))
	{
	  src.bgColor = cor;
	  src.style.cursor = 'default';
	}
}
//<!#-------------------------- MENU SWAP COR TD ----------------------#!>
//
//
//
//
//<!#-------------------------- POPWIN DO CHAT ----------------------#!>


function NewWindow (width, height, myname, url){

var left, top;
  if (screen.width < width)
    left = 0;
  else
    left = (screen.width  - width) / 2;
  if (screen.height < height)
    top = 0;
  else
    top = (screen.height - height) / 4;
  if ( navigator.appName == "Netscape" )
  {  var w = window.open (url, myname, "height="+height+",width="+width+
    ",screenX=" + left + ",screenY=" + top + ",scrollbars=yes,status=no,toolbar=0,menubar=no,location=0,directories=0,resizeble=yes");}
  else{  var w = window.open (url, myname, "height="+height+",width="+width+
    ",left=" + left + ",top=" + top + ",scrollbars=yes,status=no,toolbar=0,menubar=no,location=0,directories=0,resizeble=yes");}
  if (w)
   w.focus ();
}


function chatlogin(nick,sala){

    if (document.chat.nick.value == '') {
    alert('Digite seu apelido');
    document.chat.nick.focus();
    return false;
    }

    if (document.chat.nick.value.length < 3){
    alert('Digite seu Apelido\ncom pelo menos 3 dígitos');
    document.chat.nick.focus();
    return false;
    }

   	else{
    url = 'http://www.glb.com.br/chat/'+sala+'/main.asp?OP=Entrar&Nick='+nick
    NewWindow(640,480,'Chat',url);
	}

}
//<!#-------------------------- POPWIN DO CHAT ----------------------#!>
//
//

//
//
//<!#--------------------------- MULTIBUSCA ------------------------#!>
function NewWindow (width, height, myname, url){

var left, top;
  if (screen.width < width)
    left = 0;
  else
    left = (screen.width  - width) / 2;
  if (screen.height < height)
    top = 0;
  else
    top = (screen.height - height) / 4;
  if ( navigator.appName == "Netscape" )
  {  var w = window.open (url, myname, "height="+height+",width="+width+
    ",screenX=" + left + ",screenY=" + top + ",scrollbars=yes,status=no,toolbar=0,menubar=no,location=0,directories=0,resizeble=yes");}
  else{  var w = window.open (url, myname, "height="+height+",width="+width+
    ",left=" + left + ",top=" + top + ",scrollbars=yes,status=no,toolbar=0,menubar=no,location=0,directories=0,resizeble=yes");}
  if (w)
   w.focus ();
}


function multibusca(palavra,engine){

    if (document.busca.palavra.value == '') {
    alert('Digite sua busca');
    document.busca.palavra.focus();
    return false;
    }

    if (document.busca.palavra.value.length < 3){
    alert('Digite sua busca\ncom pelo menos 3 dígitos');
    document.busca.palavra.focus();
    return false;
    }

    if (document.busca.engine.value == 'google'){url='http://www.google.com/search?q='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'cade'){url='http://br.cade.busca.yahoo.com/search/cade?ei=UTF-8&p='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'altavista'){url='http://www.altavista.com/cgi-bin/query?pg=q&q='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'hotbot'){url='http://www.hotbot.com/?_v=2&amp;RG=NA&amp;act.search=Pesquisar&amp;MT='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'lycos'){url='http://www.lycos.com/cgi-bin/pursuit?query='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'infoseek'){url='http://infoseek.go.com/MSTitles?qt='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'webcrawler'){url='http://webcrawler.com/cgi-bin/WebQuery?searchText='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'yahoo'){url='http://br.busca.yahoo.com/search/br?p='+palavra;open(url);return false;}
    if (document.busca.engine.value == 'radaruol'){url='http://radaruol.uol.com.br/br/index.html?q='+palavra;open(url);return false;}

}
//<!#--------------------------- MULTIBUSCA ------------------------#!>
//
//


//
//
//<!#-------------------------- GAMES ONLINE -----------------------#!>
//b_versao=parseInt(navigator.appVersion);var win=null;function gamesOnline(pagina,nome,w,h,scroll){if(b_versao>=4){LeftPosition=(screen.width)?(screen.width-w)/2:0;TopPosition=(screen.height)?(screen.height-h)/2:0;}else{LeftPosition=100
//TopPosition=100}settings='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',+resizable+'
//win=window.open(pagina,nome,settings)
//if(win.window.focus){win.window.focus();}}
//<!#-------------------------- GAMES ONLINE -----------------------#!>
//
//

//
//
//<!#-------------------------- GIRO CONETCACOM -----------------------#!>
b_versao=parseInt(navigator.appVersion);var win=null;function giroConectacom(pagina,nome,w,h,scroll){if(b_versao>=4){LeftPosition=(screen.width)?(screen.width-w)/2:0;TopPosition=(screen.height)?(screen.height-h)/2:0;}else{LeftPosition=100
TopPosition=100}settings='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',+resizable+'
win=window.open(pagina,nome,settings)
if(win.window.focus){win.window.focus();}}
//<!#-------------------------- GIRO CONETCACOM -----------------------#!>
//
//


//
//
//<!#--------------------- NEWCUSTUMER CHECANDO FORM -----------------#!>

function email_valido(email) {
var formato_errado = "(@.*@)|(\\.\\.)|(@\\.)|(\\.@)|(^\\.)";
var formato_certo = "^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$";
var errado = new RegExp(formato_errado);
var certo = new RegExp(formato_certo);
return (!errado.test(email) && certo.test(email))
}



function aceito1(){
if (document.inscricao.elements[35].value == '') {document.inscricao.elements[35].value = '1';}
else {document.inscricao.elements[35].value = '';}
}


function aceito2(){
if (document.inscricao.elements[36].value == '') {document.inscricao.elements[36].value = '1';}
else {document.inscricao.elements[36].value = '';}
}



function newcustomer(){

    if (document.inscricao.elements[0].value == '') {
    alert('Digite seu Nome.');
    document.inscricao.elements[0].focus();
    return false;
    }


    if (document.inscricao.elements[1].value != '') {
        if (!email_valido(document.inscricao.elements[1].value)){
        alert('E-mail inválido!\nDigite um e-mail válido.');
        document.inscricao.elements[1].focus();
        return false;
        }
    }


    if (document.inscricao.elements[2].value == '') {
    alert('Digite seu Endereço.');
    document.inscricao.elements[2].focus();
    return false;
    }

    if (document.inscricao.elements[3].value == '') {
    alert('Digite o Número do Endereço.');
    document.inscricao.elements[3].focus();
    return false;
    }

    if (document.inscricao.elements[5].value == '') {
    alert('Digite seu Bairro.');
    document.inscricao.elements[5].focus();
    return false;
    }

    if (document.inscricao.elements[6].value == '') {
    alert('Digite sua Cidade.');
    document.inscricao.elements[6].focus();
    return false;
    }

    if (document.inscricao.elements[7].value == '') {
    alert('Escolha seu Estado.');
    document.inscricao.elements[7].focus();
    return false;
    }

    if (document.inscricao.elements[8].value == '') {
    alert('Digite seu CEP.');
    document.inscricao.elements[8].focus();
    return false;
    }

    if (document.inscricao.elements[8].value.length < 5){
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[8].focus();
    return false;
    }

    if (document.inscricao.elements[9].value == '') {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[9].focus();
    return false;
    }

    if (document.inscricao.elements[9].value.length < 3) {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[9].focus();
    return false;
    }

    if (document.inscricao.elements[10].value == '') {
    alert('Digite seu DDD.');
    document.inscricao.elements[10].focus();
    return false;
    }

    if (document.inscricao.elements[10].value.length < 2) {
    alert('Complete seu DDD\ncom 2 digítos.');
    document.inscricao.elements[10].focus();
    return false;
    }

    if (document.inscricao.elements[11].value == '') {
    alert('Digite seu Telefone.');
    document.inscricao.elements[11].focus();
    return false;
    }

    if (document.inscricao.elements[11].value.length < 7) {
    alert('Complete seu Telefone.');
    document.inscricao.elements[11].focus();
    return false;
    }


    if ((document.inscricao.elements[16].value == '') && (document.inscricao.elements[17].value == '')) {
    alert('Digite seu CPF ou CNPJ.');
    document.inscricao.elements[16].focus();
    return false;
    }


    if (document.inscricao.elements[16].value != '') {
        if (document.inscricao.elements[16].value.length < 14){
        alert('Digite seu CPF\ncom 11 dígitos.');
        document.inscricao.elements[16].value = '';
        document.inscricao.elements[16].focus();
        return false;
        }
    }


    if (document.inscricao.elements[17].value != '') {
        if (document.inscricao.elements[17].value.length < 18){
        alert('Digite seu CNPJ\ncom 14 dígitos.');
        document.inscricao.elements[17].focus();
        return false;
        }
    }
    

     if ((document.inscricao.elements[16].value == '111.111.111-11')||
           (document.inscricao.elements[16].value == '222.222.222-22')||
           (document.inscricao.elements[16].value == '333.333.333-33')||
           (document.inscricao.elements[16].value == '444.444.444-44')||
           (document.inscricao.elements[16].value == '555.555.555-55')||
           (document.inscricao.elements[16].value == '666.666.666-66')||
           (document.inscricao.elements[16].value == '777.777.777-77')||
           (document.inscricao.elements[16].value == '888.888.888-88')||
           (document.inscricao.elements[16].value == '999.999.999-99')){
        alert('CPF inválido!\nDigite um CPF válido.');
        document.inscricao.elements[16].value = '';
        document.inscricao.elements[16].focus();
        return false;
        }

        if (!Valida_cpf(document.inscricao.elements[16].value)){
        alert('CPF inválido!\nDigite um CPF válido.');
        document.inscricao.elements[16].value = '';
        document.inscricao.elements[16].focus();
        return false;
        }
        
        
    if (document.inscricao.elements[17].value != '') {

        if (document.inscricao.elements[17].value.length < 18){
        alert('Digite seu CNPJ\ncom 14 dígitos.');
        document.inscricao.elements[17].value = '';
        document.inscricao.elements[17].focus();
        return false;
        }

        if (!Valida_cnpj(document.inscricao.elements[17].value)){
        alert('CNPJ inválido!\nDigite um CNPJ válido.');
        document.inscricao.elements[17].value = '';
        document.inscricao.elements[17].focus();
        return false;
        }
    }


/////////////////////////////////////////////////////////// COBRANCA
    if (document.inscricao.elements[19].value == '') {
    alert('Digite seu Endereço (cobrança).');
    document.inscricao.elements[19].focus();
    return false;
    }

    if (document.inscricao.elements[20].value == '') {
    alert('Digite o Número do Endereço (cobrança).');
    document.inscricao.elements[20].focus();
    return false;
    }

    if (document.inscricao.elements[22].value == '') {
    alert('Digite seu Bairro (cobrança).');
    document.inscricao.elements[22].focus();
    return false;
    }

    if (document.inscricao.elements[23].value == '') {
    alert('Digite sua Cidade (cobrança).');
    document.inscricao.elements[23].focus();
    return false;
    }

    if (document.inscricao.elements[24].value == '') {
    alert('Escolha seu Estado (cobrança).');
    document.inscricao.elements[24].focus();
    return false;
    }

    if (document.inscricao.elements[25].value == '') {
    alert('Digite seu CEP (cobrança).');
    document.inscricao.elements[25].focus();
    return false;
    }

    if (document.inscricao.elements[25].value.length < 5){
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.inscricao.elements[25].focus();
    return false;
    }

    if (document.inscricao.elements[26].value == '') {
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.inscricao.elements[26].focus();
    return false;
    }

    if (document.inscricao.elements[26].value.length < 3) {
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.inscricao.elements[26].focus();
    return false;
    }
/////////////////////////////////////////////////////////// COBRANCA



    if (document.inscricao.elements[27].value == '') {
    alert('Digite seu nome de usuário.');
    document.inscricao.elements[27].focus();
    document.inscricao.elements[27].value.toLowerCase();
    return false;
    }

    if (document.inscricao.elements[27].value.length < 3){
    alert('Digite seu nome de usuário\ncom pelo menos 3 dígitos.');
    document.inscricao.elements[27].focus();
    document.inscricao.elements[27].value.toLowerCase();
    return false;
    }


    if (document.inscricao.elements[28].value == '') {
    alert('Digite sua senha.');
    document.inscricao.elements[28].focus();
    return false;
    t}

    if (document.inscricao.elements[29].value == '') {
    alert('Redigite sua senha.');
    document.inscricao.elements[29].focus();
    return false;
    }


    if ((document.inscricao.elements[28].value.length < 3) || (document.inscricao.elements[29].value.length < 3)){
    alert('As senhas devem ter no mínimo 3 dígitos.');
    document.inscricao.elements[28].value = '';
    document.inscricao.elements[29].value = '';
    document.inscricao.elements[28].focus();
    return false;
    }


    if (document.inscricao.elements[28].value != document.inscricao.elements[29].value){
    alert('As senhas devem ser iguais.');
    document.inscricao.elements[28].value = '';
    document.inscricao.elements[29].value = '';
    document.inscricao.elements[28].focus();
    return false;
    }

    /*
    ///////////////////////////// OPCÕES PARA EMAIL (MAIOR QUE 3 CARACTERES)
    if (document.inscricao.elements[30].value.length < 3){
    alert('Digite as opção para e-mail\ncom pelo menos 3 dígitos');
    document.inscricao.elements[30].focus();
    return false;
    }

    if (document.inscricao.elements[31].value.length < 3){
    alert('Digite as opção para e-mail\ncom pelo menos 3 dígitos');
    document.inscricao.elements[31].focus();
    return false;
    }

    if (document.inscricao.elements[32].value.length < 3){
    alert('Digite as opção para e-mail\ncom pelo menos 3 dígitos');
    document.inscricao.elements[32].focus();
    return false;
    }
    ///////////////////////////// OPCÕES PARA EMAIL (MAIOR QUE 3 CARACTERES)
    */



    ///////////////////////////// OPCÕES PARA EMAIL (2 NOMES DIFERENTES)

    if (document.inscricao.elements[30].value != ''){
        if (document.inscricao.elements[30].value.length < 3){
        alert('O e-mail extra deve ter\nno mínimo 3 dígitos.');
        document.inscricao.elements[30].focus();
        return false;
        }
    }


    if (document.inscricao.elements[31].value != ''){
        if (document.inscricao.elements[31].value.length < 3){
        alert('O e-mail extra deve ter\nno mínimo 3 dígitos.');
        document.inscricao.elements[31].focus();
        return false;
        }
    }


    if ((document.inscricao.elements[30].value != '')||(document.inscricao.elements[31].value != '')){
        if (document.inscricao.elements[30].value == document.inscricao.elements[31].value){
        alert('Digite os dois nomes para e-mail\ndiferentes entre si.');
        document.inscricao.elements[30].focus();                            /// NOMES IGUAIS
        return false;
        }
    }
///////////////////////////// OPCÕES PARA EMAIL (2 NOMES DIFERENTES)


    /*
    ///////////////////////////// OPCÕES PARA EMAIL (3 NOMES DIFERENTES)
    if (document.inscricao.elements[29].value == document.inscricao.elements[30].value){
    alert('Digite 3 nomes para e-mail\ndiferentes entre si');
    //document.inscricao.elements[29].focus();
    return false;
    }

    if (document.inscricao.elements[30].value == document.inscricao.elements[31].value){
    alert('Digite 3 nomes para e-mail\ndiferentes entre si');
    //document.inscricao.elements[29].focus();
    return false;
    }

    if (document.inscricao.elements[29].value == document.inscricao.elements[31].value){
    alert('Digite 3 nomes para e-mail\ndiferentes entre si');
    //document.inscricao.elements[29].focus();
    return false;
    }
    ///////////////////////////// OPCÕES PARA EMAIL (3 NOMES DIFERENTES)
    */

    if ((document.inscricao.elements[32].value == '') && (document.inscricao.elements[33].value == '') && (document.inscricao.elements[34].value == '')) {
    alert('Escolha um plano de adesão.');
    return false;
    }


    if (document.inscricao.elements[36].value == '') {
    alert('Marque a caixa:\nSim, aceito as condições do contrato de adesão\nPara submter o formulário.');
    return false;
    }

    else {


document.inscricao.elements[27].value.toLowerCase(); /// USUARIO EM MINUSCULO
document.inscricao.elements[28].value.toLowerCase(); /// SENHA EM MINUSCULO
document.inscricao.elements[29].value.toLowerCase(); /// RESENHA EM MINUSCULO
document.inscricao.elements[30].value.toLowerCase(); /// EMAIL 1 EM MINUSCULO
document.inscricao.elements[31].value.toLowerCase(); /// EMAIL 2 EM MINUSCULO


    document.inscricao.submit();}   ///// SUBMETENDO FORMULARIO DE INSCRICAO
}

function newcustomerfocus(){
document.inscricao.elements[0].select();
}

//<!#--------------------- NEWCUSTUMER CHECANDO FORM -----------------#!>
//
//



//
//
//<!#-------------- NEWCUSTUMER CHECANDO FORM BANDA LARGA -----------------#!>


function newcustomerbanda(){

    if (document.inscricao.elements[0].value == '') {
    alert('Digite seu Nome.');
    document.inscricao.elements[0].focus();
    return false;
    }


    if (document.inscricao.elements[1].value != '') {
        if (!email_valido(document.inscricao.elements[1].value)){
        alert('E-mail inválido!\nDigite um e-mail válido.');
        document.inscricao.elements[1].focus();
        return false;
        }
    }


    if (document.inscricao.elements[2].value == '') {
    alert('Digite seu Endereço.');
    document.inscricao.elements[2].focus();
    return false;
    }

    if (document.inscricao.elements[3].value == '') {
    alert('Digite o Número do Endereço.');
    document.inscricao.elements[3].focus();
    return false;
    }

    if (document.inscricao.elements[5].value == '') {
    alert('Digite seu Bairro.');
    document.inscricao.elements[5].focus();
    return false;
    }

    if (document.inscricao.elements[6].value == '') {
    alert('Digite sua Cidade.');
    document.inscricao.elements[6].focus();
    return false;
    }

    if (document.inscricao.elements[7].value == '') {
    alert('Escolha seu Estado.');
    document.inscricao.elements[7].focus();
    return false;
    }

    if (document.inscricao.elements[8].value == '') {
    alert('Digite seu CEP.');
    document.inscricao.elements[8].focus();
    return false;
    }

    if (document.inscricao.elements[8].value.length < 5){
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[8].focus();
    return false;
    }

    if (document.inscricao.elements[9].value == '') {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[9].focus();
    return false;
    }

    if (document.inscricao.elements[9].value.length < 3) {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.inscricao.elements[9].focus();
    return false;
    }

    if (document.inscricao.elements[10].value == '') {
    alert('Digite seu DDD.');
    document.inscricao.elements[10].focus();
    return false;
    }

    if (document.inscricao.elements[10].value.length < 2) {
    alert('Complete seu DDD\ncom 2 digítos.');
    document.inscricao.elements[10].focus();
    return false;
    }

    if (document.inscricao.elements[11].value == '') {
    alert('Digite seu Telefone.');
    document.inscricao.elements[11].focus();
    return false;
    }

    if (document.inscricao.elements[11].value.length < 7) {
    alert('Complete seu Telefone.');
    document.inscricao.elements[11].focus();
    return false;
    }


    if ((document.inscricao.elements[16].value == '') && (document.inscricao.elements[17].value == '')) {
    alert('Digite seu CPF ou CNPJ.');
    document.inscricao.elements[16].focus();
    return false;
    }


    if (document.inscricao.elements[16].value != '') {
        if (document.inscricao.elements[16].value.length < 14){
        alert('Digite seu CPF\ncom 11 dígitos.');
        document.inscricao.elements[16].focus();
        return false;
        }
    }


    if (document.inscricao.elements[17].value != '') {
        if (document.inscricao.elements[17].value.length < 18){
        alert('Digite seu CNPJ\ncom 14 dígitos.');
        document.inscricao.elements[17].focus();
        return false;
        }
    }
    
    
         if ((document.inscricao.elements[16].value == '111.111.111-11')||
           (document.inscricao.elements[16].value == '222.222.222-22')||
           (document.inscricao.elements[16].value == '333.333.333-33')||
           (document.inscricao.elements[16].value == '444.444.444-44')||
           (document.inscricao.elements[16].value == '555.555.555-55')||
           (document.inscricao.elements[16].value == '666.666.666-66')||
           (document.inscricao.elements[16].value == '777.777.777-77')||
           (document.inscricao.elements[16].value == '888.888.888-88')||
           (document.inscricao.elements[16].value == '999.999.999-99')){
        alert('CPF inválido!\nDigite um CPF válido.');
        document.inscricao.elements[16].value = '';
        document.inscricao.elements[16].focus();
        return false;
        }

        if (!Valida_cpf(document.inscricao.elements[16].value)){
        alert('CPF inválido!\nDigite um CPF válido.');
        document.inscricao.elements[16].value = '';
        document.inscricao.elements[16].focus();
        return false;
        }


    if (document.inscricao.elements[17].value != '') {

        if (document.inscricao.elements[17].value.length < 18){
        alert('Digite seu CNPJ\ncom 14 dígitos.');
        document.inscricao.elements[17].value = '';
        document.inscricao.elements[17].focus();
        return false;
        }

        if (!Valida_cnpj(document.inscricao.elements[17].value)){
        alert('CNPJ inválido!\nDigite um CNPJ válido.');
        document.inscricao.elements[17].value = '';
        document.inscricao.elements[17].focus();
        return false;
        }
    }

    else {

    document.inscricao.submit();}   ///// SUBMETENDO FORMULARIO DE INSCRICAO
}
//<!#-------------- NEWCUSTUMER CHECANDO FORM BANDA LARGA -----------------#!>
//
//



//
//
//<!#-------------- ATUALIZACAO DE DADOS CHECANDO FORM -------------#!>
function editcustomer(){

    if (document.atualizacao.elements[0].value == '') {
    alert('Digite seu Nome.');
    document.atualizacao.elements[0].focus();
    return false;
    }


    if (document.atualizacao.elements[1].value != '') {
        if (!email_valido(document.atualizacao.elements[1].value)){
        alert('E-mail inválido!\nDigite um e-mail válido.');
        document.atualizacao.elements[1].focus();
        return false;
        }
    }


    if (document.atualizacao.elements[2].value == '') {
    alert('Digite seu Endereço.');
    document.atualizacao.elements[2].focus();
    return false;
    }

    if (document.atualizacao.elements[3].value == '') {
    alert('Digite o Número do Endereço.');
    document.atualizacao.elements[3].focus();
    return false;
    }

    if (document.atualizacao.elements[5].value == '') {
    alert('Digite seu Bairro.');
    document.atualizacao.elements[5].focus();
    return false;
    }

    if (document.atualizacao.elements[6].value == '') {
    alert('Digite sua Cidade.');
    document.atualizacao.elements[6].focus();
    return false;
    }

    if (document.atualizacao.elements[7].value == '') {
    alert('Escolha seu Estado.');
    document.atualizacao.elements[7].focus();
    return false;
    }

    if (document.atualizacao.elements[8].value == '') {
    alert('Digite seu CEP.');
    document.atualizacao.elements[8].focus();
    return false;
    }

    if (document.atualizacao.elements[8].value.length < 5){
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.atualizacao.elements[8].focus();
    return false;
    }

    if (document.atualizacao.elements[9].value == '') {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.atualizacao.elements[9].focus();
    return false;
    }

    if (document.atualizacao.elements[9].value.length < 3) {
    alert('Complete seu CEP\nno formato xxxxx-xxx');
    document.atualizacao.elements[9].focus();
    return false;
    }

    if (document.atualizacao.elements[10].value == '') {
    alert('Digite seu DDD.');
    document.atualizacao.elements[10].focus();
    return false;
    }

    if (document.atualizacao.elements[10].value.length < 2) {
    alert('Complete seu DDD\ncom 2 digítos.');
    document.atualizacao.elements[10].focus();
    return false;
    }

    if (document.atualizacao.elements[11].value == '') {
    alert('Digite seu Telefone.');
    document.atualizacao.elements[11].focus();
    return false;
    }

    if (document.atualizacao.elements[11].value.length < 7) {
    alert('Complete seu Telefone.');
    document.atualizacao.elements[11].focus();
    return false;
    }


    if ((document.atualizacao.elements[16].value == '') && (document.atualizacao.elements[17].value == '')) {
    alert('Digite seu CPF ou CNPJ.');
    document.atualizacao.elements[16].focus();
    return false;
    }


    if (document.atualizacao.elements[16].value != '') {
        if (document.atualizacao.elements[16].value.length < 14){
        alert('Digite seu CPF\ncom 11 dígitos.');
        document.atualizacao.elements[16].focus();
        return false;
        }
    }


    if (document.atualizacao.elements[17].value != '') {
        if (document.atualizacao.elements[17].value.length < 18){
        alert('Digite seu CNPJ\ncom 14 dígitos.');
        document.atualizacao.elements[17].focus();
        return false;
        }
    }


/////////////////////////////////////////////////////////// COBRANCA
    if (document.atualizacao.elements[19].value == '') {
    alert('Digite seu Endereço (cobrança).');
    document.atualizacao.elements[19].focus();
    return false;
    }

    if (document.atualizacao.elements[20].value == '') {
    alert('Digite o Número do Endereço (cobrança).');
    document.atualizacao.elements[20].focus();
    return false;
    }

    if (document.atualizacao.elements[22].value == '') {
    alert('Digite seu Bairro (cobrança).');
    document.atualizacao.elements[22].focus();
    return false;
    }

    if (document.atualizacao.elements[23].value == '') {
    alert('Digite sua Cidade (cobrança).');
    document.atualizacao.elements[23].focus();
    return false;
    }

    if (document.atualizacao.elements[24].value == '') {
    alert('Escolha seu Estado (cobrança).');
    document.atualizacao.elements[24].focus();
    return false;
    }

    if (document.atualizacao.elements[25].value == '') {
    alert('Digite seu CEP (cobrança).');
    document.atualizacao.elements[25].focus();
    return false;
    }

    if (document.atualizacao.elements[25].value.length < 5){
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.atualizacao.elements[25].focus();
    return false;
    }

    if (document.atualizacao.elements[26].value == '') {
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.atualizacao.elements[26].focus();
    return false;
    }

    if (document.atualizacao.elements[26].value.length < 3) {
    alert('Complete seu CEP\nno formato xxxxx-xxx (cobrança).');
    document.atualizacao.elements[26].focus();
    return false;
    }
/////////////////////////////////////////////////////////// COBRANCA

    else {document.atualizacao.submit();}   ///// SUBMETENDO FORMULARIO DE atualizacao
}
//<!#-------------- ATUALIZACAO DE DADOS CHECANDO FORM -------------#!>
//
//

//
//
//<!#--------------------- NEWCUSTUMER COPIANDO ENDEREÇO-----------------#!>

function newcustomercopy(){


    if (document.inscricao.elements[18].value == '1') {
    document.inscricao.elements[19].value = document.inscricao.elements[2].value;
    document.inscricao.elements[20].value = document.inscricao.elements[3].value;
    document.inscricao.elements[21].value = document.inscricao.elements[4].value;
    document.inscricao.elements[22].value = document.inscricao.elements[5].value;
    document.inscricao.elements[23].value = document.inscricao.elements[6].value;
    document.inscricao.elements[24].value = document.inscricao.elements[7].value;
    document.inscricao.elements[25].value = document.inscricao.elements[8].value;
    document.inscricao.elements[26].value = document.inscricao.elements[9].value;
    document.inscricao.elements[18].value = '';
    }

    else {
    document.inscricao.elements[19].value = '';
    document.inscricao.elements[20].value = '';
    document.inscricao.elements[21].value = '';
    document.inscricao.elements[22].value = '';
    document.inscricao.elements[23].value = '';
    document.inscricao.elements[24].value = '';
    document.inscricao.elements[25].value = '';
    document.inscricao.elements[26].value = '';
    document.inscricao.elements[18].value = '1';
    }

}


//<!#--------------------- NEWCUSTUMER COPIANDO ENDEREÇO-----------------#!>
//
//
//
//
//
//<!#--------------------- NEWCUSTUMER COPIANDO ENDEREÇO-----------------#!>

function editcustomercopy(){


    if (document.atualizacao.elements[18].value == '1') {
    document.atualizacao.elements[19].value = document.atualizacao.elements[2].value;
    document.atualizacao.elements[20].value = document.atualizacao.elements[3].value;
    document.atualizacao.elements[21].value = document.atualizacao.elements[4].value;
    document.atualizacao.elements[22].value = document.atualizacao.elements[5].value;
    document.atualizacao.elements[23].value = document.atualizacao.elements[6].value;
    document.atualizacao.elements[24].value = document.atualizacao.elements[7].value;
    document.atualizacao.elements[25].value = document.atualizacao.elements[8].value;
    document.atualizacao.elements[26].value = document.atualizacao.elements[9].value;
    document.atualizacao.elements[18].value = '';
    }

    else {
    document.atualizacao.elements[19].value = '';
    document.atualizacao.elements[20].value = '';
    document.atualizacao.elements[21].value = '';
    document.atualizacao.elements[22].value = '';
    document.atualizacao.elements[23].value = '';
    document.atualizacao.elements[24].value = '';
    document.atualizacao.elements[25].value = '';
    document.atualizacao.elements[26].value = '';
    document.atualizacao.elements[18].value = '1';
    }

}
//<!#--------------------- NEWCUSTUMER COPIANDO ENDEREÇO-----------------#!>
//
//








//
//
//
//<!#------------------- Script simples de validação de CPF  -----------------------#!>

function Valida_cpf(){

var i;
s = document.inscricao.elements[16].value;

 while((cx=s.indexOf("-"))!=-1){
  s = s.substring(0,cx)+s.substring(cx+1);
  }

 while((cx=s.indexOf("."))!=-1){
  s = s.substring(0,cx)+s.substring(cx+1);
  }

var c = s.substr(0,9);
var dv = s.substr(9,2);
var d1 = 0;
for (i = 0; i < 9; i++) {
d1 += c.charAt(i)*(10-i);
}
if (d1 == 0){
//alert("digite seu CPF")
return false;
}
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(0) != d1) {
//alert("CPF com 11 digitos")
return false;
}
d1 *= 2;
for (i = 0; i < 9; i++) {
d1 += c.charAt(i)*(11-i);
}
d1 = 11 - (d1 % 11);
if (d1 > 9) d1 = 0;
if (dv.charAt(1) != d1) {
//alert("CPF Invalido")
return false;
}
return true;
}
//<!#------------------- Script simples de validação de CPF  -----------------------#!>
//
//
//
//
//<!#------------------- Script simples de validação de CNPJ  -----------------------#!>

function Valida_cnpj(){

 var i;

s = document.inscricao.elements[17].value;

/// limpando (- / .) do campo
while((cx=s.indexOf("-"))!=-1){s = s.substring(0,cx)+s.substring(cx+1);}
while((cx=s.indexOf("/"))!=-1){s = s.substring(0,cx)+s.substring(cx+1);}
while((cx=s.indexOf("."))!=-1){s = s.substring(0,cx)+s.substring(cx+1);}

 if (isNaN(s)) {
  return false;
 }

 var c = s.substr(0,12);
 var dv = s.substr(12,2);
 var d1 = 0;
 for (i = 0; i <12; i++){
  d1 += c.charAt(11-i)*(2+(i % 8));
 }
 if (d1 == 0)
  return false;
 d1 = 11 - (d1 % 11);
 if (d1 > 9) d1 = 0;
 if (dv.charAt(0) != d1){
  return false;
 }
 d1 *= 2;
 for (i = 0; i < 12; i++){
  d1 += c.charAt(11-i)*(2+((i+1) % 8));
 }
 d1 = 11 - (d1 % 11);
 if (d1 > 9)
  d1 = 0;
 if (dv.charAt(1) != d1){
  return false;
 }
 return true;
}

//<!#------------------- Script simples de validação de CNPJ  -----------------------#!>
//
//









//
//
///<!#---------------------- ESCREVE INPUT FORMATO CEP -------------------------#!>
function escreve_cep(campo){
	if ((window.event.keyCode < 48) | (window.event.keyCode > 57)){window.event.returnValue = "" ;}
    if ((campo.value.length == 5)){campo.value = campo.value + "-";}
}
///<!#---------------------- ESCREVE INPUT FORMATO CEP -------------------------#!>
//
//
//
//<!#---------------------- ESCREVE INPUT FORMATO CPF -------------------------#!>
function escreve_cpf(campo){
	if ((window.event.keyCode < 47) | (window.event.keyCode > 57)){
window.event.returnValue = "" ;}
else{
if (window.event.keyCode == 47){
if ((campo.value.length == 2) || (campo.value.length == 5)){
campo.value = campo.value + "/";
}
else{ window.event.returnValue = ""; }
} //fechamnto do if
else{
if ((campo.value.length == 3)||(campo.value.length == 7)){
campo.value = campo.value + ".";}

if ((campo.value.length == 11)){
campo.value = campo.value + "-";}
}
}
}
//<!#---------------------- ESCREVE INPUT FORMATO CPF -------------------------#!>
//
//
//
//<!#---------------------- ESCREVE INPUT FORMATO CNPJ ------------------------#!>
function escreve_cnpj(campo){
	if ((window.event.keyCode < 47) | (window.event.keyCode > 57)){
window.event.returnValue = "" ;}
else{
if (window.event.keyCode == 47){
if ((campo.value.length == 2) || (campo.value.length == 6)){
campo.value = campo.value + "/";
}
else{ window.event.returnValue = ""; }
} //fechamnto do if
else{
if ((campo.value.length == 2)||(campo.value.length == 6)){
campo.value = campo.value + ".";}

if ((campo.value.length == 10)){
campo.value = campo.value + "/";}

if ((campo.value.length == 15)){
campo.value = campo.value + "-";}
}
}
}
//<!#---------------------- ESCREVE INPUT FORMATO CNPJ ------------------------#!>
//
//
//
//<!#---------------------- ESCREVE INPUT SO NUMEROS ------------------------#!>
function sonumeros(){
if ( (window.event.keyCode < 48) | (window.event.keyCode > 57) ){
window.event.returnValue = "" ;
}
}
//<!#---------------------- ESCREVE INPUT SO NUMEROS ------------------------#!>
//
//
//
//
//<!#---------------------- ESCREVE INPUT FORMATO CNPJ ------------------------#!>
function escreve_cnpj(campo){
	if ((window.event.keyCode < 47) | (window.event.keyCode > 57)){
window.event.returnValue = "" ;}
else{
if (window.event.keyCode == 47){
if ((campo.value.length == 2) || (campo.value.length == 6)){
campo.value = campo.value + "/";
}
else{ window.event.returnValue = ""; }
} //fechamnto do if
else{
if ((campo.value.length == 2)||(campo.value.length == 6)){
campo.value = campo.value + ".";}

if ((campo.value.length == 10)){
campo.value = campo.value + "/";}

if ((campo.value.length == 15)){
campo.value = campo.value + "-";}
}
}
}
//<!#---------------------- ESCREVE INPUT FORMATO CNPJ ------------------------#!>
//
//

//
//
//<!#---------------- AUTO TAB QUANDO ATINGE O MAXLENGTH-----------------#!>

var isNN = (navigator.appName.indexOf("Netscape")!=-1);
function autoTab(input,len, e) {
var keyCode = (isNN) ? e.which : e.keyCode;
var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
if(input.value.length >= len && !containsElement(filter,keyCode)) {
input.value = input.value.slice(0, len);
input.form[(getIndex(input)+1) % input.form.length].focus();
}
function containsElement(arr, ele) {
var found = false, index = 0;
while(!found && index < arr.length)
if(arr[index] == ele)
found = true;
else
index++;
return found;
}
function getIndex(input) {
var index = -1, i = 0, found = false;
while (i < input.form.length && index == -1)
if (input.form[i] == input)index = i;
else i++;
return index;
}
return true;
}
//<!#---------------- AUTO TAB QUANDO ATINGE O MAXLENGTH-----------------#!>
//
//

//
//
//<!#--------------------- CUSTUMER LOGIN LIMPANDO FORM -----------------#!>
function changecustomerclear(){

    document.change.elements[0].value = '';
    document.change.elements[1].value = '';
    document.change.elements[2].value = '';
    document.change.elements[3].value = '';

    
    document.change.elements[0].focus();
    return false;
}
//<!#--------------------- CUSTUMER LOGIN LIMPANDO FORM -----------------#!>
//
//
//



//
//
//<!#--------------------- CUSTUMER LOGIN CHECANDO FORM -----------------#!>
function changecustomerlogin(){

    if (document.change.elements[0].value == '') {
    alert('Digite seu login');
    document.change.elements[0].focus();
    return false;
    }

    if (document.change.elements[1].value == '') {
    alert('Digite sua senha antiga');
    document.change.elements[1].focus();
    return false;
    }
    
    if (document.change.elements[2].value == '') {
    alert('Digite sua Nova senha');
    document.change.elements[2].focus();
    return false;
    }
    
    if (document.change.elements[3].value == '') {
    alert('Redigite sua Nova senha ');
    document.change.elements[3].focus();
    return false;
    }

    if (document.change.elements[0].value.length < 3){
    alert('Digite seu login\ncom pelo menos 3 dígitos');
    document.change.elements[0].focus();
    return false;
    }

    if (document.change.elements[1].value.length < 3){
    alert('Digite sua senha Antiga\ncom pelo menos 3 dígitos');
    document.change.elements[1].value = '';
    document.change.elements[1].focus();
    return false;
    }
    
    if (document.change.elements[2].value.length < 3){
    alert('Digite sua Nova senha\ncom pelo menos 3 dígitos');
    document.change.elements[2].value = '';
    document.change.elements[2].focus();
    return false;
    }
    
    if (document.change.elements[3].value.length < 3){
    alert('Redigite sua Nova senha\ncom pelo menos 3 dígitos');
    document.change.elements[3].value = '';
    document.change.elements[3].focus();
    return false;
    }
    
    if (document.change.elements[2].value != document.change.elements[3].value){
    alert('As nova senhas devem ser iguais.');
    document.change.elements[2].value = '';
    document.change.elements[3].value = '';
    document.change.elements[2].focus();
    return false;
    }

    else {
    document.change.submit();
    }
}

//<!#--------------------- CUSTUMER LOGIN CHECANDO FORM -----------------#!>
//
//
//

