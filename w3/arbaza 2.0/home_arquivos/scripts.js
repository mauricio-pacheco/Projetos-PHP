function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
window.open(theURL,winName,features);
}

/*XXXXXXXXXX AUMENTAR E DIMINUIR FONTE XXXXXXXXXXXXXXXXXXX*/
//Specify affected tags. Add or remove from list:
var tgs = new Array( 'div' );

//Specify spectrum of different font sizes:
var szs = new Array( 'xx-small','x-small','small','medium','large','x-large','xx-large' );
var startSz = 2;

function ts( trgt,inc ) {
if (!document.getElementById) return
var d = document,cEl = null,sz = startSz,i,j,cTags;
sz += inc;
if ( sz < 0 ) sz = 0;
if ( sz > 6 ) sz = 6;
startSz = sz;
if ( !( cEl = d.getElementById( trgt ) ) ) cEl = d.getElementsByTagName( trgt )[ 0 ];

cEl.style.fontSize = szs[ sz ];

for ( i = 0; i < tgs.length; i++ ) {
cTags = cEl.getElementsByTagName( tgs[ i ] );
for ( j = 0; j < cTags.length; j++ ) cTags[ j ].style.fontSize = szs[ sz ];
}
}

/*XXXXXXXXXXXXXXXXXXX OPEN / CLOSE INFO XXXXXXXXXXXXXXXXXX*/

//here you place the ids of every element you want.
var ids=new Array('a1','a2','a3','a4');

function switchid(id){	
	hideallids();
	showdiv(id);
}

function hideallids(){
	//loop through the array and hide each element by id
	for (var i=0;i<ids.length;i++){
		hidediv(ids[i]);
	}		  
}

function hidediv(id) {
	//safe function to hide an element with a specified id
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(id).style.display = 'none';
	}
	else {
		if (document.layers) { // Netscape 4
			document.id.display = 'none';
		}
		else { // IE 4
			document.all.id.style.display = 'none';
		}
	}
}

function showdiv(id) {
	//safe function to show an element with a specified id
		  
	if (document.getElementById) { // DOM3 = IE5, NS6
		document.getElementById(id).style.display = 'block';
	}
	else {
		if (document.layers) { // Netscape 4
			document.id.display = 'block';
		}
		else { // IE 4
			document.all.id.style.display = 'block';
		}
	}
}

/*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/


/*XXXXXXXXXXXXXXXXXXX OPEN / CLOSE INFO XXXXXXXXXXXXXXXXXX*/

function mostra(item){
if (item.style.display=='none'){
item.style.display='';
}
else{
item.style.display='none'
}
}
		
/*XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/



/****************************************************************************
* Flash Tag Write Object v1.2b - by Lucas Fererira - www.lucasferreira.com	*
* Info and Usage: www.lucasferreira.com/flashtag							*
* bugs/reports: contato@lucasferreira.com									*
****************************************************************************/

if(Browser == undefined){
	var Browser = {
		isIE: function(){ return (window.ActiveXObject && document.all && navigator.userAgent.toLowerCase().indexOf("msie") > -1  && navigator.userAgent.toLowerCase().indexOf("opera") == -1) ? true : false; }
	}
}

var Flash = function(movie, id, width, height, initParams){

	this.html = "";
	this.attributes = this.params = this.variables = null;
	
	this.variables = new Array();
	this.attributes = {
		"classid": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000",
		"codebase": "http://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab#version=8,0,22,0",
		"type": "application/x-shockwave-flash"
	}
	this.params = { "pluginurl": "http://www.macromedia.com/go/getflashplayer_br" };
	
	if(movie) {
		this.addAttribute("data", movie);
		this.addParameter("movie", movie);
	}
	
	if(id && id != null) this.addAttribute("id", id);
	if(width) this.addAttribute("width", width);
	if(height) this.addAttribute("height", height);
	
	if(initParams != undefined){
		for(var i in initParams){
			this.addParameter(i.toString(), initParams[i]);
		}
	}
	
}
Flash.version = "1.2b";
Flash.getObjectByExceptions = function(obj, excep){
	var tempObj = {};
	for(var i in obj){
		var inclui = true;
		for(var j=0; j<excep.length; j++)
			if(excep[j] == i.toString()) { inclui = false; break; };
		if(inclui) tempObj[i] = obj[i];
	}
	return tempObj;
}
Flash.prototype.addAttribute = function(prop, val){ this.attributes[prop] = val; }
Flash.prototype.addParameter = function(prop, val){ this.params[prop] = val; }
Flash.prototype.addVariable = function(prop, val){ this.variables.push([prop, val]); }
Flash.prototype.getFlashVars = function(){
	var tempString = new Array();
	
	for(var i=0; i<this.variables.length; i++)
		tempString.push(this.variables[i].join("="));
		
	return tempString.join("&");
}
Flash.prototype.toString = function(){
	
	this.params.flashVars = this.getFlashVars();
	if(Browser.isIE()){
		//IE
		this.html = "<ob" + "ject";
		var attr = Flash.getObjectByExceptions(this.attributes, ["type", "data"]);
		for(var i in attr) if(i.toString() != "extend") this.html += " " + i.toString() + " = \"" + attr[i] + "\"";
		this.html += "> ";
		var params = Flash.getObjectByExceptions(this.params, ["pluginurl", "extend"]);
		for(var i in params) if(i.toString() != "extend") this.html += "<param name=\"" + i.toString() + "\" value=\"" + params[i] + "\" /> ";
		this.html += " </obj" + "ect>";
	} else {
		//non-IE
		this.html = "<!--[if !IE]> <--> <obj" + "ect";
		var attr = Flash.getObjectByExceptions(this.attributes, ["classid", "codebase"]);
		for(var i in attr) if(i.toString() != "extend") this.html += " " + i.toString() + " = \"" + attr[i] + "\"";
		this.html += "> ";
		var params = Flash.getObjectByExceptions(this.params, ["extend"]);
		for(var i in params) if(i.toString() != "extend") this.html += "<param name=\"" + i.toString() + "\" value=\"" + params[i] + "\" /> ";
		this.html += " </obj" + "ect> <!--> <![endif]-->";
	}

	return this.html;
	
}
Flash.prototype.write = Flash.prototype.outIn = Flash.prototype.writeIn = function(w){
	if(typeof w == "string" && document.getElementById) var w = document.getElementById(w);
	if( w != undefined && w ) w.innerHTML = this.toString();
	else document.write( this.toString() );
}

/***************************************************************************/

/*
ON READY: Resize iframe #grade
*/
$(function(){
	set_h = function (e) {
		var p = e.contentDocument || e.contentWindow.document;
		e.height = $(p.body).height() + 35;
	};
	
	$('#grade').each(function(){
		$(this).load(function(){
			set_h(this);
		});
		set_h(this);
	});

	/*
	Change CSS Input
	*/
	
	var fields = $('#col_direita :input');
	
	fields.focus(function(){
		var t = $(this);
		if (t.val() == '') {
			t.addClass('focus');
		}
	}).blur(function(){
		var t = $(this);
		if (t.val() == '') {
			t.removeClass('focus');
		}
	});
	
	fields.filter('[@value]').addClass('focus');
	
});	
	
	
/********************************************************/


