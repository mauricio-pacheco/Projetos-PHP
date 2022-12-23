function activateMenu(nav) {

    /* currentStyle restricts the Javascript to IE only */
	if (document.all && document.getElementById(nav).currentStyle) {  
				
        var navroot = document.getElementById(nav);
        
        /* Get all the list items within the menu */
        var lis=navroot.getElementsByTagName("LI");  
        
        for (var i=0; i<lis.length; i++) {
        	
           /* If the LI has another menu level */
            if(lis[i].lastChild.tagName=="UL"){            	
                /* assign the function to the LI */
             	lis[i].onmouseover=function() {	                  
                   /* display the inner menu */
                   this.lastChild.style.display="block";
                }
                lis[i].onmouseout=function() {                   
                   this.lastChild.style.display="none";
                }
            }
        }
    }
}
function tree (a_items, a_template) {

	this.a_tpl      = a_template;
	this.a_config   = a_items;
	this.o_root     = this;
	this.a_index    = [];
	this.o_selected = null;
	this.n_depth    = -1;
	
	var o_icone = new Image(),
		o_iconl = new Image();
	o_icone.src = a_template['icon_e'];
	o_iconl.src = a_template['icon_l'];
	a_template['im_e'] = o_icone;
	a_template['im_l'] = o_iconl;
	for (var i = 0; i < 64; i++) {
		if (a_template['icon_' + i]) {
			var o_icon = new Image();
			a_template['im_' + i] = o_icon;
			o_icon.src = a_template['icon_' + i];
		}
	}
	this.toggle = function (n_id) {	var o_item = this.a_index[n_id]; o_item.open(o_item.b_opened) };
	this.select = function (n_id) { return this.a_index[n_id].select(); };
	this.mout   = function (n_id) { this.a_index[n_id].upstatus(true) };
	this.mover  = function (n_id) { this.a_index[n_id].upstatus() };

	this.a_children = [];
	for (var i = 0; i < a_items.length; i++)
		new tree_item(this, i);

	this.n_id = trees.length;
	trees[this.n_id] = this;
	
	for (var i = 0; i < this.a_children.length; i++) {
		document.write(this.a_children[i].init());
		this.a_children[i].open();
	}
}
function tree_item (o_parent, n_order) {

	this.n_depth  = o_parent.n_depth + 1;
	this.a_config = o_parent.a_config[n_order + (this.n_depth ? 2 : 0)];
	if (!this.a_config) return;

	this.o_root    = o_parent.o_root;
	this.o_parent  = o_parent;
	this.n_order   = n_order;
	this.b_opened  = !this.n_depth;

	this.n_id = this.o_root.a_index.length;
	this.o_root.a_index[this.n_id] = this;
	o_parent.a_children[n_order] = this;

	this.a_children = [];
	for (var i = 0; i < this.a_config.length - 2; i++)
		new tree_item(this, i);

	this.get_icon = item_get_icon;
	this.open     = item_open;
	this.select   = item_select;
	this.init     = item_init;
	this.upstatus = item_upstatus;
	this.is_last  = function () { return this.n_order == this.o_parent.a_children.length - 1 };
}

function item_open (b_close) {
	var o_idiv = get_element('i_div' + this.o_root.n_id + '_' + this.n_id);
	if (!o_idiv) return;
	
	if (!o_idiv.innerHTML) {
		var a_children = [];
		for (var i = 0; i < this.a_children.length; i++)
			a_children[i]= this.a_children[i].init();
		o_idiv.innerHTML = a_children.join('');
	}
	o_idiv.style.display = (b_close ? 'none' : 'block');
	
	this.b_opened = !b_close;
	var o_jicon = document.images['j_img' + this.o_root.n_id + '_' + this.n_id],
		o_iicon = document.images['i_img' + this.o_root.n_id + '_' + this.n_id];
	if (o_jicon) o_jicon.src = this.get_icon(true);
	if (o_iicon) o_iicon.src = this.get_icon();
	this.upstatus();
}

function item_select (b_deselect) {
	if (!b_deselect) {
		var o_olditem = this.o_root.o_selected;
		this.o_root.o_selected = this;
		if (o_olditem) o_olditem.select(true);
	}
	var o_iicon = document.images['i_img' + this.o_root.n_id + '_' + this.n_id];
	if (o_iicon) o_iicon.src = this.get_icon();
	get_element('i_txt' + this.o_root.n_id + '_' + this.n_id).style.fontWeight = b_deselect ? 'normal' : 'bold';
	
	this.upstatus();
	return Boolean(this.a_config[1]);
}

function item_upstatus (b_clear) {
	//window.setTimeout('window.status="' + (b_clear ? '' : this.a_config[0] + (this.a_config[1] ? ' ('+ this.a_config[1] + ')' : '')) + '"', 10);
}

function item_init () {
	var a_offset = [],
		o_current_item = this.o_parent;
	for (var i = this.n_depth; i >= 1; i--) {
		a_offset[i] = '<img src="' + this.o_root.a_tpl[o_current_item.is_last() ? 'icon_e' : 'icon_l'] + '" border="0" align="absbottom">';
		o_current_item = o_current_item.o_parent;
	}
	
	return '<table cellpadding="0" cellspacing="0" border="0"><tr><td nowrap>' + (this.n_depth>=0 ? a_offset.join('') + (this.a_children.length
		? '<a href="javascript: trees[' + this.o_root.n_id + '].toggle(' + this.n_id + ')" onmouseover="trees[' + this.o_root.n_id + '].mover(' + this.n_id + ')" onmouseout="trees[' + this.o_root.n_id + '].mout(' + this.n_id + ')"><img src="' + this.get_icon(true) + '" border="0" align="absbottom" name="j_img' + this.o_root.n_id + '_' + this.n_id + '"></a>'
		: '<img src="' + this.get_icon(true) + '" border="0" align="absbottom">') : ''+this.n_depth) 
		+ this.a_config[0] + '</td></tr></table>' + (this.a_children.length ? '<div id="i_div' + this.o_root.n_id + '_' + this.n_id + '" style="display:none"></div>' : '');
}

function item_get_icon (b_junction) {
	var icon_number = ((this.n_depth>=0 ? 0 : 32) + (this.a_children.length ? 16 : 0) + (this.a_children.length && this.b_opened ? 8 : 0) + (!b_junction && this.o_root.o_selected == this ? 4 : 0) + (b_junction ? 2 : 0) + (b_junction && this.is_last() ? 1 : 0));
	if(icon_number == 19 && this.n_depth == 0) {
		icon_number = 20;
	} else if(icon_number == 27 && this.n_depth == 0) {
		icon_number = 28;
	}
	
	return this.o_root.a_tpl['icon_' + icon_number];
}

var trees = [];
get_element = document.all ?
	function (s_id) { return document.all[s_id] } :
	function (s_id) { return document.getElementById(s_id) };
	
var TREE_TPL_DEFAULT = {
	'target'  : '_self',	// name of the frame links will be opened in
							// other possible values are: _blank, _parent, _search, _self and _top

	'icon_e'  : '_resources/media/img/tree/empty.gif', // empty image
	'icon_l'  : '_resources/media/img/tree/line.gif',  // vertical line

        'icon_32' : '_resources/media/img/tree/base.gif',   // root leaf icon normal
        'icon_36' : '_resources/media/img/tree/base.gif',   // root leaf icon selected
	
	'icon_48' : '_resources/media/img/tree/empty.gif',   // root icon normal
	'icon_52' : '_resources/media/img/tree/empty.gif',   // root icon selected
	'icon_56' : '_resources/media/img/tree/empty.gif',   // root icon opened
	'icon_60' : '_resources/media/img/tree/empty.gif',   // root icon selected
			
	'icon_16' : '_resources/media/img/tree/empty.gif', // node icon normal
	'icon_20' : '_resources/media/img/tree/empty.gif', // node icon selected
	'icon_24' : '_resources/media/img/tree/empty.gif', // node icon opened
	'icon_28' : '_resources/media/img/tree/empty.gif', // node icon selected opened
		
	'icon_0'  : '_resources/media/img/tree/empty.gif', // leaf icon normal
	'icon_4'  : '_resources/media/img/tree/empty.gif', // leaf icon selected
		
	'icon_2'  : '_resources/media/img/tree/joinbottom.gif', // junction for leaf
	'icon_3'  : '_resources/media/img/tree/join.gif',       // junction for last leaf
	'icon_18' : '_resources/media/img/tree/plusbottom.gif', // junction for closed node
	'icon_19' : '_resources/media/img/tree/plus.gif',       // junctioin for last closed node
	'icon_20' : '_resources/media/img/tree/plusroot.gif',       // junctioin for last closed node
	'icon_26' : '_resources/media/img/tree/minusbottom.gif',// junction for opened node
	'icon_27' : '_resources/media/img/tree/minus.gif',       // junctioin for last opended node
	'icon_28' : '_resources/media/img/tree/minusroot.gif'       // junctioin for last opended node
};
/*
	Lightbox JS: Fullsize Image Overlays 
	by Lokesh Dhakar - http://www.huddletogether.com

	For more information on this script, visit:
	http://huddletogether.com/projects/lightbox/

	Licensed under the Creative Commons Attribution 2.5 License - http://creativecommons.org/licenses/by/2.5/
	(basically, do anything you want, just leave my name and link)
	
	Table of Contents
	-----------------
	Configuration
	
	Functions
	- getPageScroll()
	- getPageSize()
	- pause()
	- getKey()
	- listenKey()
	- showLightbox()
	- hideLightbox()
	- initLightbox()
	- addLoadEvent()
	
	Function Calls
	- addLoadEvent(initLightbox)

*/



//
// Configuration
//

// If you would like to use a custom loading image or close button reference them in the next two lines.
var loadingImage = '/_resources/media/img/loading.gif';		
var closeButton = '/_resources/media/img/close.gif';		





//
// getPageScroll()
// Returns array with x,y page scroll values.
// Core code from - quirksmode.org
//
function getPageScroll(){

	var yScroll;

	if (self.pageYOffset) {
		yScroll = self.pageYOffset;
	} else if (document.documentElement && document.documentElement.scrollTop){	 // Explorer 6 Strict
		yScroll = document.documentElement.scrollTop;
	} else if (document.body) {// all other Explorers
		yScroll = document.body.scrollTop;
	}

	arrayPageScroll = new Array('',yScroll) 
	return arrayPageScroll;
}



//
// getPageSize()
// Returns array with page width, height and window width, height
// Core code from - quirksmode.org
// Edit for Firefox by pHaez
//
function getPageSize(){
	
	var xScroll, yScroll;
	
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	
	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	
	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){	
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}


	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
	return arrayPageSize;
}


//
// pause(numberMillis)
// Pauses code execution for specified time. Uses busy code, not good.
// Code from http://www.faqts.com/knowledge_base/view.phtml/aid/1602
//
function pause(numberMillis) {
	var now = new Date();
	var exitTime = now.getTime() + numberMillis;
	while (true) {
		now = new Date();
		if (now.getTime() > exitTime)
			return;
	}
}

//
// getKey(key)
// Gets keycode. If 'x' is pressed then it hides the lightbox.
//

function getKey(e){
	if (e == null) { // ie
		keycode = event.keyCode;
	} else { // mozilla
		keycode = e.which;
	}
	key = String.fromCharCode(keycode).toLowerCase();
	
	if(key == 'x'){ hideLightbox(); }
}


//
// listenKey()
//
function listenKey () {	document.onkeypress = getKey; }
	

//
// showLightbox()
// Preloads images. Pleaces new image in lightbox then centers and displays.
//
function showLightbox(objLink)
{
	// prep objects
	var objOverlay = document.getElementById('overlay');
	var objLightbox = document.getElementById('lightbox');
	var objCaption = document.getElementById('lightboxCaption');
	var objImage = document.getElementById('lightboxImage');
	var objLoadingImage = document.getElementById('loadingImage');
	var objLightboxDetails = document.getElementById('lightboxDetails');

	
	var arrayPageSize = getPageSize();
	var arrayPageScroll = getPageScroll();

	// center loadingImage if it exists
	if (objLoadingImage) {
		objLoadingImage.style.top = (arrayPageScroll[1] + ((arrayPageSize[3] - 35 - objLoadingImage.height) / 2) + 'px');
		objLoadingImage.style.left = (((arrayPageSize[0] - 20 - objLoadingImage.width) / 2) + 'px');
		objLoadingImage.style.display = 'block';
	}

	// set height of Overlay to take up whole page and show
	objOverlay.style.height = (arrayPageSize[1] + 'px');
	objOverlay.style.display = 'block';

	// preload image
	imgPreload = new Image();

	imgPreload.onload=function(){
		objImage.src = objLink.href;

		// center lightbox and make sure that the top and left values are not negative
		// and the image placed outside the viewport
		var lightboxTop = arrayPageScroll[1] + ((arrayPageSize[3] - 35 - imgPreload.height) / 2);
		var lightboxLeft = ((arrayPageSize[0] - 20 - imgPreload.width) / 2);
		
		objLightbox.style.top = (lightboxTop < 0) ? "0px" : lightboxTop + "px";
		objLightbox.style.left = (lightboxLeft < 0) ? "0px" : lightboxLeft + "px";


		objLightboxDetails.style.width = imgPreload.width + 'px';
		
		if(objLink.getAttribute('title')){
			objCaption.style.display = 'block';
			//objCaption.style.width = imgPreload.width + 'px';
			objCaption.innerHTML = objLink.getAttribute('title');
		} else {
			objCaption.style.display = 'none';
		}
		
		// A small pause between the image loading and displaying is required with IE,
		// this prevents the previous image displaying for a short burst causing flicker.
		if (navigator.appVersion.indexOf("MSIE")!=-1){
			pause(250);
		} 

		if (objLoadingImage) {	objLoadingImage.style.display = 'none'; }

		// Hide select boxes as they will 'peek' through the image in IE
		selects = document.getElementsByTagName("select");
        for (i = 0; i != selects.length; i++) {
                selects[i].style.visibility = "hidden";
        }

	
		objLightbox.style.display = 'block';

		// After image is loaded, update the overlay height as the new image might have
		// increased the overall page height.
		arrayPageSize = getPageSize();
		objOverlay.style.height = (arrayPageSize[1] + 'px');
		
		// Check for 'x' keypress
		listenKey();

		return false;
	}

	imgPreload.src = objLink.href;
	
}





//
// hideLightbox()
//
function hideLightbox()
{
	// get objects
	objOverlay = document.getElementById('overlay');
	objLightbox = document.getElementById('lightbox');

	// hide lightbox and overlay
	objOverlay.style.display = 'none';
	objLightbox.style.display = 'none';

	// make select boxes visible
	selects = document.getElementsByTagName("select");
    for (i = 0; i != selects.length; i++) {
		selects[i].style.visibility = "visible";
	}

	// disable keypress listener
	document.onkeypress = '';
}




//
// initLightbox()
// Function runs on window load, going through link tags looking for rel="lightbox".
// These links receive onclick events that enable the lightbox display for their targets.
// The function also inserts html markup at the top of the page which will be used as a
// container for the overlay pattern and the inline image.
//
function initLightbox()
{
	
	if (!document.getElementsByTagName){ return; }
	var anchors = document.getElementsByTagName("a");

	// loop through all anchor tags
	for (var i=0; i<anchors.length; i++){
		var anchor = anchors[i];

		if (anchor.getAttribute("href") && (anchor.getAttribute("rel") == "lightbox")){
			anchor.onclick = function () {showLightbox(this); return false;}
		}
	}

	// the rest of this code inserts html at the top of the page that looks like this:
	//
	// <div id="overlay">
	//		<a href="#" onclick="hideLightbox(); return false;"><img id="loadingImage" /></a>
	//	</div>
	// <div id="lightbox">
	//		<a href="#" onclick="hideLightbox(); return false;" title="Click anywhere to close image">
	//			<img id="closeButton" />		
	//			<img id="lightboxImage" />
	//		</a>
	//		<div id="lightboxDetails">
	//			<div id="lightboxCaption"></div>
	//			<div id="keyboardMsg"></div>
	//		</div>
	// </div>
	
	var objBody = document.getElementsByTagName("body").item(0);
	
	// create overlay div and hardcode some functional styles (aesthetic styles are in CSS file)
	var objOverlay = document.createElement("div");
	objOverlay.setAttribute('id','overlay');
	objOverlay.onclick = function () {hideLightbox(); return false;}
	objOverlay.style.display = 'none';
	objOverlay.style.position = 'absolute';
	objOverlay.style.top = '0';
	objOverlay.style.left = '0';
	objOverlay.style.zIndex = '90';
 	objOverlay.style.width = '100%';
	objBody.insertBefore(objOverlay, objBody.firstChild);
	
	var arrayPageSize = getPageSize();
	var arrayPageScroll = getPageScroll();

	// preload and create loader image
	var imgPreloader = new Image();
	
	// if loader image found, create link to hide lightbox and create loadingimage
	imgPreloader.onload=function(){

		var objLoadingImageLink = document.createElement("a");
		objLoadingImageLink.setAttribute('href','#');
		objLoadingImageLink.onclick = function () {hideLightbox(); return false;}
		objOverlay.appendChild(objLoadingImageLink);
		
		var objLoadingImage = document.createElement("img");
		objLoadingImage.src = loadingImage;
		objLoadingImage.setAttribute('id','loadingImage');
		objLoadingImage.style.position = 'absolute';
		objLoadingImage.style.zIndex = '150';
		objLoadingImageLink.appendChild(objLoadingImage);

		imgPreloader.onload=function(){};	//	clear onLoad, as IE will flip out w/animated gifs

		return false;
	}

	imgPreloader.src = loadingImage;

	// create lightbox div, same note about styles as above
	var objLightbox = document.createElement("div");
	objLightbox.setAttribute('id','lightbox');
	objLightbox.style.display = 'none';
	objLightbox.style.position = 'absolute';
	objLightbox.style.zIndex = '100';	
	objBody.insertBefore(objLightbox, objOverlay.nextSibling);
	
	// create link
	var objLink = document.createElement("a");
	objLink.setAttribute('href','#');
	objLink.setAttribute('title','');
	objLink.onclick = function () {hideLightbox(); return false;}
	objLightbox.appendChild(objLink);

	// preload and create close button image
	var imgPreloadCloseButton = new Image();

	// if close button image found, 
	imgPreloadCloseButton.onload=function(){

		var objCloseButton = document.createElement("img");
		objCloseButton.src = closeButton;
		objCloseButton.setAttribute('id','closeButton');
		objCloseButton.style.position = 'absolute';
		objCloseButton.style.zIndex = '200';
		objLink.appendChild(objCloseButton);

		return false;
	}

	imgPreloadCloseButton.src = closeButton;

	// create image
	var objImage = document.createElement("img");
	objImage.setAttribute('id','lightboxImage');
	objLink.appendChild(objImage);
	
	// create details div, a container for the caption and keyboard message
	var objLightboxDetails = document.createElement("div");
	objLightboxDetails.setAttribute('id','lightboxDetails');
	objLightbox.appendChild(objLightboxDetails);

	// create caption
	var objCaption = document.createElement("div");
	objCaption.setAttribute('id','lightboxCaption');
	objCaption.style.display = 'none';
	objLightboxDetails.appendChild(objCaption);

}




//
// addLoadEvent()
// Adds event to window.onload without overwriting currently assigned onload functions.
// Function found at Simon Willison's weblog - http://simon.incutio.com/
//
function addLoadEvent(func)
{	
	var oldonload = window.onload;
	if (typeof window.onload != 'function'){
    	window.onload = func;
	} else {
		window.onload = function(){
		oldonload();
		func();
		}
	}

}



addLoadEvent(initLightbox);	// run initLightbox onLoad
/*
* lib_xcore.js
*
* (C) Copyright 2006 Rits. All rights reserved.
* Use is subject to license terms.
*/

/**
 * Cross-Browser DHTML library
 *
 * @author Michael Foster
 * @author Juciano Araujo
 * @version 3.15.2
 */

/* version */
var xVersion='3.15.2',xNN4,xOp7,xOp5or6,xIE4Up,xIE4,xIE5,xMac,xUA=navigator.userAgent.toLowerCase();
if (window.opera){
	xOp7=(xUA.indexOf('opera 7')!=-1 || xUA.indexOf('opera/7')!=-1);
	if (!xOp7) 
		xOp5or6=(xUA.indexOf('opera 5')!=-1 || xUA.indexOf('opera/5')!=-1 || xUA.indexOf('opera 6')!=-1 || xUA.indexOf('opera/6')!=-1);
} else if (document.all && xUA.indexOf('msie')!=-1) {
	xIE4Up=parseInt(navigator.appVersion)>=4;
	xIE4=xUA.indexOf('msie 4')!=-1;
	xIE5=xUA.indexOf('msie 5')!=-1;
} else if (document.layers) {
	xNN4=true;
}
xMac=xUA.indexOf('mac')!=-1;

/**
  * Get element by Id
  *
  * @param string Element name
  * @return object Element object
  */
function xGetElementById(e) {
	if(typeof(e)!='string') 
		return e;
	if(document.getElementById) 
		e=document.getElementById(e);
	else if(document.all) 
		e=document.all[e];
	else 
		e=null;
	return e;
}

/**
  * Get parent
  *
  * @param string Element name
  * @param boolean Node
  * @return object Parent object
  */
function xParent(e,bNode){
	if (!(e=xGetElementById(e))) return null;
	var p=null;
	if (!bNode && xDef(e.offsetParent)) p=e.offsetParent;
	else if (xDef(e.parentNode)) p=e.parentNode;
	else if (xDef(e.parentElement)) p=e.parentElement;
	return p;
}

/**
  * Verifies if defined
  * 
  * @param mixed
  * @return boolean
  */
function xDef() {
	for(var i=0; i<arguments.length; ++i){
		if(typeof(arguments[i])=='undefined') 
			return false;
	}
	return true;
}

/**
  * Verifies if string
  *
  * @param mixed
  * @return boolean
  */
function xStr(s) {
	for(var i=0; i<arguments.length; ++i){
		if(typeof(arguments[i])!='string') 
			return false;
	}
	return true;
}

/**
  * Verifies if number
  *
  * @param mixed
  * @return boolean
  */
function xNum(n) {
	for(var i=0; i<arguments.length; ++i){
		if(typeof(arguments[i])!='number') 
			return false;
	}
	return true;
}

/**
  * Shows element
  *
  * @param string Element name
  */
function xShow(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.visibility)) 
		e.style.visibility='visible';
}

/**
  * Hides element
  *
  * @param string Element name
  */
function xHide(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.visibility)) 
		e.style.visibility='hidden';
}

/**
  * Sets z index
  *
  * @param string Element name
  * @param int Z index
  * @return int Z index
  */
function xZIndex(e,uZ) {
	if(!(e=xGetElementById(e))) 
		return 0;
	if(e.style && xDef(e.style.zIndex)) {
		if(xNum(uZ)) 
			e.style.zIndex=uZ;
		uZ=parseInt(e.style.zIndex);
	}
	return uZ;
}

/**
  * Sets element color
  *
  * @param string Element name
  * @param string Color
  * @return string Color
  */
function xColor(e,sColor) {
	if(!(e=xGetElementById(e))) 
		return '';
	var c='';
	if(e.style && xDef(e.style.color)) {
		if(xStr(sColor)) 
			e.style.color=sColor;
		c=e.style.color;
	}
	return c;
}

/**
  * Sets element background
  *
  * @param string Element name
  * @param string Color
  * @param string Image url
  * @return string Background
  */
function xBackground(e,sColor,sImage) {
	if(!(e=xGetElementById(e))) 
		return '';
	var bg='';
	if(e.style) {
		if(xStr(sColor)) {
			if(!xOp5or6) 
				e.style.backgroundColor=sColor;
			else e.style.background=sColor;
		}
		if(xStr(sImage)) 
			e.style.backgroundImage=(sImage!='')? 'url('+sImage+')' : null;
		if(!xOp5or6) 
			bg=e.style.backgroundColor;
		else 
			bg=e.style.background;
	}
	return bg;
}

/**
  * Move element
  *
  * @param string Element name
  * @param int X
  * @param int Y
  */
function xMoveTo(e,iX,iY) {
	xLeft(e,iX);
	xTop(e,iY);
}

/**
  * Sets element left position
  *
  * @param string Element name
  * @param int X
  * @return int X
  */
function xLeft(e,iX) {
	if(!(e=xGetElementById(e))) 
		return 0;
	var css=xDef(e.style);
	if (css && xStr(e.style.left)) {
		if(xNum(iX)) 
			e.style.left=iX+'px';
		else {
			iX=parseInt(e.style.left);
			if(isNaN(iX)) 
				iX=0;
		}
	} else if(css && xDef(e.style.pixelLeft)) {
		if(xNum(iX)) 
			e.style.pixelLeft=iX;
		else 
			iX=e.style.pixelLeft;
	}
	return iX;
}

/**
  * Sets element top position
  *
  * @param string Element name
  * @param int Y
  * @return int Y
  */
function xTop(e,iY) {
	if(!(e=xGetElementById(e))) 
		return 0;
	var css=xDef(e.style);
	if(css && xStr(e.style.top)) {
		if(xNum(iY)) 
			e.style.top=iY+'px';
		else {
			iY=parseInt(e.style.top);
			if(isNaN(iY)) 
				iY=0;
		}
	} else if(css && xDef(e.style.pixelTop)) {
		if(xNum(iY)) 
			e.style.pixelTop=iY;
		else 
			iY=e.style.pixelTop;
	}
	return iY;
}

/**
  * Gets page X
  *
  * @param string Element name
  * @return int X
  */
function xPageX(e) {
	if (!(e=xGetElementById(e))) 
		return 0;
	var x = 0;
	while (e) {
		if (xDef(e.offsetLeft)) 
			x += e.offsetLeft;
		e = xDef(e.offsetParent) ? e.offsetParent : null;
	}
	return x;
}

/**
  * Gets page Y
  *
  * @param string Element name
  * @return int Y
  */
function xPageY(e) {
	if (!(e=xGetElementById(e))) 
		return 0;
	var y = 0;
	while (e) {
		if (xDef(e.offsetTop)) 
			y += e.offsetTop;
		e = xDef(e.offsetParent) ? e.offsetParent : null;
	}
	//  if (xOp7) return y - document.body.offsetTop; // v3.14, temporary hack for opera bug 130324
	return y;
}

/**
  * Gets offset left
  *
  * @param string Element name
  * @return int Offset
  */
function xOffsetLeft(e) {
	if (!(e=xGetElementById(e))) 
		return 0;
	if (xDef(e.offsetLeft)) 
		return e.offsetLeft;
	else return 0;
}

/**
  * Gets offset top
  *
  * @param string Element name
  * @return int Offset
  */
function xOffsetTop(e) {
	if (!(e=xGetElementById(e))) 
		return 0;
	if (xDef(e.offsetTop)) 
		return e.offsetTop;
	else return 0;
}

/**
  * Scrolls to left
  *
  * @param string Element name
  * @return int Offset
  */
function xScrollLeft(e) {
	var offset=0;
	if (!(e=xGetElementById(e))) {
		if(document.documentElement && document.documentElement.scrollLeft) 
			offset=document.documentElement.scrollLeft;
		else if(document.body && xDef(document.body.scrollLeft)) 
			offset=document.body.scrollLeft;
	} else { 
		if (xNum(e.scrollLeft)) 
			offset = e.scrollLeft; 
	}
	return offset;
}

/**
  * Scrolls to top
  *
  * @param string Element name
  * @return int Offset
  */
function xScrollTop(e) {
	var offset=0;
	if (!(e=xGetElementById(e))) {
		if(document.documentElement && document.documentElement.scrollTop) 
			offset=document.documentElement.scrollTop;
		else if(document.body && xDef(document.body.scrollTop)) 
			offset=document.body.scrollTop;
	} else { 
		if (xNum(e.scrollTop)) 
			offset = e.scrollTop; 
	}
	return offset;
}

/**
  * Checks if has point
  *
  * @param string Element name
  * @param int Left
  * @param int Top
  * @param int Clip top
  * @param int Clip right
  * @param int Clip bottom
  * @param int Clip left
  * @return boolean
  */
function xHasPoint(ele, iLeft, iTop, iClpT, iClpR, iClpB, iClpL) {
	if (!xNum(iClpT)){
		iClpT=iClpR=iClpB=iClpL=0;
	} else if (!xNum(iClpR)){
		iClpR=iClpB=iClpL=iClpT;
	} else if (!xNum(iClpB)){
		iClpL=iClpR; iClpB=iClpT;
	}
	var thisX = xPageX(ele), thisY = xPageY(ele);
	return (iLeft >= thisX + iClpL && iLeft <= thisX + xWidth(ele) - iClpR && iTop >=thisY + iClpT && iTop <= thisY + xHeight(ele) - iClpB );
}

/**
  * Resizes element
  *
  * @param string Element name
  * @param int Width
  * @param int Height
  */
function xResizeTo(e,uW,uH) {
	xWidth(e,uW);
	xHeight(e,uH);
}

/**
  * Sets element width
  *
  * @param string Element name
  * @param int Width
  * @return int Width
  */
function xWidth(e,uW) {
	if(!(e=xGetElementById(e))) 
		return 0;
	if (xNum(uW)) {
		if (uW<0) 
			uW = 0;
		else 
			uW=Math.round(uW);
	} else 
		uW=-1;
	var css=xDef(e.style);
	if(css && xDef(e.offsetWidth) && xStr(e.style.width)) {
		if(uW>=0) 
			xSetCW(e, uW);
		uW=e.offsetWidth;
	} else if(css && xDef(e.style.pixelWidth)) {
		if(uW>=0) 
			e.style.pixelWidth=uW;
		uW=e.style.pixelWidth;
	}
	return uW;
}

/**
  * Sets element height
  *
  * @param string Element name
  * @param int Height
  * @return int Height
  */
function xHeight(e,uH) {
	if(!(e=xGetElementById(e))) 
		return 0;
	if (xNum(uH)) {
		if (uH<0) 
			uH = 0;
		else 
			uH=Math.round(uH);
	} else 
		uH=-1;
	var css=xDef(e.style);
	if(css && xDef(e.offsetHeight) && xStr(e.style.height)) {
		if(uH>=0) 
			xSetCH(e, uH);
		uH=e.offsetHeight;
	} else if(css && xDef(e.style.pixelHeight)) {
		if(uH>=0) 
			e.style.pixelHeight=uH;
		uH=e.style.pixelHeight;
	}
	return uH;
}

/**
  * Gets computed style
  *
  * @param string Element name
  * @param string Property
  * @return int Computed style
  */
function xGetCS(ele,sP){
	return parseInt(document.defaultView.getComputedStyle(ele,'').getPropertyValue(sP));
}

/**
  * Sets CS Width
  *
  * @param string Element name
  * @param int Width  
  */
function xSetCW(ele,uW){
	var pl=0,pr=0,bl=0,br=0;
	if(xDef(document.defaultView) && xDef(document.defaultView.getComputedStyle)){
		pl=xGetCS(ele,'padding-left');
		pr=xGetCS(ele,'padding-right');
		bl=xGetCS(ele,'border-left-width');
		br=xGetCS(ele,'border-right-width');
	}else if(xDef(ele.currentStyle,document.compatMode)){
		if(document.compatMode=='CSS1Compat'){
			pl=parseInt(ele.currentStyle.paddingLeft);
			pr=parseInt(ele.currentStyle.paddingRight);
			bl=parseInt(ele.currentStyle.borderLeftWidth);
			br=parseInt(ele.currentStyle.borderRightWidth);
		}
	} else if(xDef(ele.offsetWidth,ele.style.width)){ // ?
		ele.style.width=uW+'px';
		pl=ele.offsetWidth-uW;
	}
	if(isNaN(pl)) 
		pl=0; 
	if(isNaN(pr)) 
		pr=0; 
	if(isNaN(bl)) 
		bl=0; 
	if(isNaN(br)) 
		br=0;
		
	var cssW=uW-(pl+pr+bl+br);
	if(isNaN(cssW)||cssW<0) 
		return;
	else 
		ele.style.width=cssW+'px';
}

/**
  * Sets CS Height
  *
  * @param string Element name
  * @param int Height  
  */
function xSetCH(ele,uH){
	var pt=0,pb=0,bt=0,bb=0;
	if(xDef(document.defaultView) && xDef(document.defaultView.getComputedStyle)){
		pt=xGetCS(ele,'padding-top');
		pb=xGetCS(ele,'padding-bottom');
		bt=xGetCS(ele,'border-top-width');
		bb=xGetCS(ele,'border-bottom-width');
	} else if(xDef(ele.currentStyle,document.compatMode)){
		if(document.compatMode=='CSS1Compat'){
			pt=parseInt(ele.currentStyle.paddingTop);
			pb=parseInt(ele.currentStyle.paddingBottom);
			bt=parseInt(ele.currentStyle.borderTopWidth);
			bb=parseInt(ele.currentStyle.borderBottomWidth);
		}
	} else if(xDef(ele.offsetHeight,ele.style.height)){ // ?
		ele.style.height=uH+'px';
		pt=ele.offsetHeight-uH;
	}
	
	if(isNaN(pt)) 
		pt=0; 
	if(isNaN(pb)) 
		pb=0; 
	if(isNaN(bt)) 
		bt=0; 
	if(isNaN(bb)) 
		bb=0;
	var cssH=uH-(pt+pb+bt+bb);
	if(isNaN(cssH)||cssH<0) 
		return;
	else 
		ele.style.height=cssH+'px';
}

/**
  * Sets clip
  *
  * @param string Element name
  * @param int Top
  * @param int Right
  * @param int Bottom
  * @param int Left
  */
function xClip(e,iTop,iRight,iBottom,iLeft) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style) {
		if (xNum(iLeft)) 
			e.style.clip='rect('+iTop+'px '+iRight+'px '+iBottom+'px '+iLeft+'px)';
		else 
			e.style.clip='rect(0 '+parseInt(e.style.width)+'px '+parseInt(e.style.height)+'px 0)';
	}
}

/**
  * Gets client width
  *
  * @return int Width
  */
function xClientWidth() {
	var w=0;
	if(xOp5or6) w=window.innerWidth;
	else if(!window.opera && document.documentElement && document.documentElement.clientWidth)
	w=document.documentElement.clientWidth;
	else if(document.body && document.body.clientWidth)
	w=document.body.clientWidth;
	else if(xDef(window.innerWidth,window.innerHeight,document.height)) {
		w=window.innerWidth;
		if(document.height>window.innerHeight) w-=16;
	}
	return w;
}

/**
  * Gets client height
  *
  * @return int Height
  */
function xClientHeight() {
	var h=0;
	if(xOp5or6) h=window.innerHeight;
	else if(!window.opera && document.documentElement && document.documentElement.clientHeight)
	h=document.documentElement.clientHeight;
	else if(document.body && document.body.clientHeight)
	h=document.body.clientHeight;
	else if(xDef(window.innerWidth,window.innerHeight,document.width)) {
		h=window.innerHeight;
		if(document.width>window.innerWidth) h-=16;
	}
	return h;
}

/**
  * Sets inner html
  *
  * @param string Element name
  * @param string Html
  * @return string Html
  */
function xInnerHtml(e, sHtml) {
	if(!(e=xGetElementById(e))) 
		return '';
	if (xStr(e.innerHTML)) {
		if (xStr(sHtml)) 
			e.innerHTML = sHtml;
		else 
			return e.innerHTML;
	}
}

/**
  * Displays element
  *
  * @param string Element name
  */
function xDisplay(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.display)) 
		e.style.display = 'inline';
}

/**
  * Displays element
  *
  * @param string Element name
  */
function xDisplay2(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.display)) 
		e.style.display = '';
}

/**
  * Changes element display
  *
  * @param string Element name
  */
function xChangeDisplay(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.display)) {
		if(e.style.display == 'none')
			e.style.display = 'inline';
		else
			e.style.display = 'none';
	}
}

/**
  * Hides an element
  *
  * @param string Element name
  */
function xNoDisplay(e) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.style && xDef(e.style.display)) 
		e.style.display='none';
}

/**
  * Changes Image source
  *
  * @param string Element name
  * @param string Image src
  */
function xChangeImageSrc(e, source) {
	if(!(e=xGetElementById(e))) 
		return;
	if(e.src) 
		e.src=source;
}

/**
  * Displays element
  *
  * @param string Element name
  */
function xDisplayPos(e, e2, x, y) {
	if(!(e=xGetElementById(e)))
	return;

	if(e.style && xDef(e.style.display))
	e.style.display='';

	var left = xPageX(e2) + x;
	var top = xPageY(e2) + y;

	xLeft(e, left);
	xTop(e, top)
}/*
 * lib_flash.js
 *
 * (C) Copyright 2006 Rits. All rights reserved.
 * Use is subject to license terms.
 */

/**
 * Flash library
 *
 * @author Juciano Araujo
 * @version 0.1
 */

/* flash version */
var flashVersion = 6;

/* flash release version */
var flashRelease = "6,0,67,0";

/**
  * Detects if is flash compatible
  *
  * @return boolean
  */
function isFlashCompatible() {
	var pluginVersion;
	if(navigator.plugins && navigator.mimeTypes.length){
		var words = navigator.plugins["Shockwave Flash"].description.split(" ");		
		for (var i = 0; i < words.length; ++i) {
			if (isNaN(parseInt(words[i])))
				continue;
			pluginVersion = words[i];
		}
	}else{
		try{
			var axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
			for (var i=3; axo!=null; i++) {
				axo = new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+i);
				pluginVersion = i;
			}
		}catch(e){
		}
	}
	
	return pluginVersion >= flashVersion;
}

/**
  * Writes the flash code
  * 
  * @param string swf
  * @param string flashVarString
  * @param int width
  * @param int height
  * @param string bgcolor
  * @param string menu
  * @param string mode
  * @param string q
  * @param string id
  */
function writeFlash(swf,flashVarString,w,h,bgcolor,menu,mode,q,id) {
  if (isFlashCompatible()) {
     document.write('<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" '
     +'codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version='+flashRelease+'" '
     +'width="'+w+'" height="'+h+'" id="'+id+'" align="" />'
     +'<param name="movie" value="'+swf+'" />'
     +'<param name="menu" value="'+menu+'" /> '
     +'<param name="quality" value="'+q+'" /> '
     +'<param name="wmode" value="'+mode+'" /> '
     +'<param name="bgcolor" value="'+bgcolor+'" /> '
     +'<param name="flashvars" value="'+flashVarString+'" /> '
     +'<embed src="'+swf+'" flashvars="'+flashVarString+'" menu="'+menu+'" quality="'+q+'" wmode="'+mode+'" '
     +' bgcolor="'+bgcolor+'"  width="'+w+'" height="'+h+'" name="'+swf+'" '
     +' align=""  type="application/x-shockwave-flash" '
     +' pluginspage="http://www.macromedia.com/go/getflashplayer"></embed></object> ');     
  } else {
     //behaviour for if there is no flash player
     document.write('You require Flash Player '+flashVersion+' or later to use this site. ');
     document.write('<em><a href="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" target="_blank">');
     document.write('Click here to install it now.</a></em>');

     //this can be replaced by anything you want
     //e.g. document.location.replace("text.html");
  }
}
/*
 * lib_validation.js
 *
 * (C) Copyright 2006 Rits. All rights reserved.
 * Use is subject to license terms.
 */

/**
 * Form validation library
 *
 * @author Juciano Araujo
 * @version 0.1
 */

/**
  * Verifies if it's empty
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isEmpty(value) {
	return ((value == null) || (value.length == 0));
}

/**
  * Verifies if it's whitespaces only
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isWhitespace(value) {
	if(isEmpty(value)) return true;
	
	for(i=0; i<value.length; i++) {
		if(value.charAt(i) != ' ') {
			return false;
		}
	}
	return true;
}

/**
  * Verifies if it's a number
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isNumber(value) {
	if(isEmpty(value)) return false;

	var reg = new RegExp('^[0-9]{1,15}(\,[0-9]{1,2}){0,1}$');
	if(value.match(reg))
		return true;
	return false;
}

/**
  * Verifies if it's digits only
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isDigits(value) {
	if(isEmpty(value)) return false;

	var reg = new RegExp('^[0-9]+$');
	if(value.match(reg))
		return true;
	return false;
}

/**
  * Verifies if it's a phone
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isPhone(value) {
	if(isEmpty(value)) return false;
	
	var reg = new RegExp('^[0-9]{3,4}[\-]{1}[0-9]{4}$');
	if(value.match(reg))
		return true;
	if(isDigits(value) && (value.length == 7 || value.length == 8))
		return true;
	return false;
}

/**
  * Verifies if it's a CEP
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isCep(value) {
	if(isEmpty(value)) return false;
	
	var reg = new RegExp('^[0-9]{5}[\-]{1}[0-9]{3}$');
	if(value.match(reg))
		return true;
	if(isDigits(value) && value.length == 8)
		return true;
	return false;
}

/**
  * Verifies if it's a email
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isEmail(value) {
	if(isEmpty(value)) return false;
	var reg = new RegExp('^([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$');
	if(value.match(reg))
		return true;
	return false;
}

/**
  * Verifies if it's a URL
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isUrl(value) {
	if(isEmpty(value)) return false;

	var reg = new RegExp('^(http|https|ftp)\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(:[a-zA-Z0-9]*)?/?([a-zA-Z0-9\-\._\?\,\'/\\\+&%\$#\=~])*[^\.\,\)\(\s]$');
	if(value.match(reg))
		return true;
	return false;
}

/**
  * Verifies if it's a date
  *
  * @param strin Value to be tested
  * @return boolean
  */
function isDate(value) {
	if(isEmpty(value)) return false;
	var reg = new RegExp('^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$');
	var data;
	var a_data;
	if(value.match(reg)) {
		a_data = value.split('/');
	} else {
		reg = new RegExp('^[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}$');
		if(value.match(reg)) {
			a_data = value.split('-');
		} else {
			return false;
		}
	}
	a_data[0] = parseInt(a_data[0]);
	a_data[1] = parseInt(a_data[1]) - 1;
	a_data[2] = parseInt(a_data[2]);
	data = new Date(a_data[2],a_data[1],a_data[0]);
	if(data.getMonth() == a_data[1])
		return true;
	return false;
}
/*
 * lib_util.js
 *
 * (C) Copyright 2006 CCCCorp. All rights reserved.
 * Use is subject to license terms.
 */

/**
 * Utility library
 *
 * @author Juciano Araujo
 * @version 0.1
 */

var undefined;
var index = 1;

/**
  * Submits a form
  *
  * @param string Fuseaction
  * @param object Form object
  */
function formSubmit (go, form) {
	if(go != '') {
		form.go.value = go;
	}

	form.submit();
}

/**
  * Cancels a form
  */
function formCancel() {
	if (window.history.length) {
		history.back();
	} else if (window.opener && !window.opener.closed) {
		self.close();
	}
}

/**
  * Gets a cookie
  *
  * @param string Cookie name
  * @return string Cookie value
  */
function getCookie(name) {
	if (document.cookie.length > 0) {
		var begin = document.cookie.indexOf(name+"=");
		if (begin != -1) {
			begin += name.length+1;
			var end = document.cookie.indexOf(";", begin);
			if (end == -1) end = document.cookie.length;
			return unescape(document.cookie.substring(begin, end));
		}
	}
	return null;
}

/**
  * Sets a cookie
  *
  * @param string Cookie name
  * @param string Cookie value
  */
function setCookie(name, value, expiredays) {
	var ExpireDate = new Date ();
	ExpireDate.setTime(ExpireDate.getTime() + (expiredays * 24 * 3600 * 1000));
	document.cookie = name + "=" + escape(value) + ((expiredays == null) ? "" : "; expires=" + ExpireDate.toGMTString());
}

/**
  * Removes a cookie
  *
  * @param string Cookie name
  */
function delCookie (name) {
	document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
}

/**
  * Sets the windows status
  *
  * @param string Message
  */
function setStatus(message) {
	window.status = message;
}

/**
  * Updates parent
  */
function updateParent() {
	if (window.opener && !window.opener.closed) {
		window.opener.location.href = window.opener.document.URL;
	}
	self.close();
}

/**
  * Opens a popup window
  *
  * @param string url
  * @param int width
  * @param int height
  * @param boolean scroll
  * @param string name
  */
function hrefPopup(url, width, height, scroll, name) {

   var win  = null;
   var winl = (screen.width - width)/2;
   var wint = (screen.height - height)/2;

   settings = 'height='+height+',width='+width+',top='+wint+',left='+winl+',scrollbars='+scroll+',toolbar=no,location=no,status=no,menubar=no,resizable=no,dependent=yes'

   if (name == '') {
      name = '_window';
   }

   win = window.open (''+url+'', ''+name+'', settings);
   if (parseInt(navigator.appVersion) >= 4) {
      win.window.focus();
   }
}

/**
  * Reloads a window
  */
function reload() {
	window.location.reload();
}

/**
  * Sets a refresh
  *
  * @param int time
  */
function refresh(time) {
	setTimeout("reload()", time);
}

/**
  * Counts the number of chars in input
  *
  * @param object Field
  * @param object Count Field
  * @param int Maximum number of chars
  */
function textCounter(field, countfield, maxlimit) {
   if (field.value.length > maxlimit) {
      field.value = field.value.substring(0, maxlimit);
   } else {
      countfield.value = maxlimit - field.value.length;
   }
}

/**
  * Changes array of checkbox
  *
  * @param object Checkbox
  * @param object Form
  * @param string Field name
  */
function changeCheck(check, form, name) {
	var field = form.elements[name];
	if(!field) return;
	if(!field.length) {
		field.checked = check.checked;
	} else {
		for(var i=0; i<field.length; i++) {
			field[i].checked = check.checked;
		}
	}
}

function anyChecked(form, name, msg) {
	var field = form.elements[name];
	if(!field) return;
	if(!field.length) {
		if(field.checked) {
			return true;
		}
	} else {
		for(var i=0; i<field.length; i++) {
			if(field[i].checked) {
				return true;
			}
		}
	}

	if(msg.length) {
		alert(msg);
	}
	return false;

}

function selected(name) {
	var select = xGetElementById(name);
	return select.options[select.selectedIndex].value;
}

function list_limit(select) {
	var limit = select.options[select.selectedIndex].value;
	var url = location.href;

	if(url.indexOf('&limit=') != -1) {
		url = url.replace(/limit=[0-9]*/, 'limit=' + limit);
	} else {
		url = url + '&limit=' + limit;
	}
	location.href = url;
}

function list_search(form) {

	var search = xGetElementById('SEARCH');
	var ssel = form.elements['SEARCH_SELECT[]'];
	var schk = form.elements['SEARCH_CHECK[]'];

	var url = location.href;

	if(search) {
		if(url.indexOf('&search=') != -1) {
			url = url.replace(/search=[^&]*/, 'search=' + escape(search.value));
		} else {
			url = url + '&search=' + escape(search.value);
		}

		if(ssel) {
			if(ssel.selectedIndex != undefined) {
				if(url.indexOf('&ssel1=') != -1) {
					url = url.replace(/ssel1=[^&]*/, 'ssel1=' + ssel.options[ssel.selectedIndex].value);
				} else {
					url = url + '&ssel1=' + ssel.options[ssel.selectedIndex].value;
				}
			} else {

				for(var i=0; i<ssel.length; i++) {
					if(url.indexOf('&ssel' + (i+1) + '=') != -1) {
						url = url.replace("&ssel"+(i+1)+'=', '&ssel0=');
						url = url.replace(/ssel0=[^&]*/, 'ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value);
					} else {
						url = url + '&ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value;
					}
				}
			}
		}

		if(schk) {
			if(!schk.length) {
				if(url.indexOf('&schk1=') != -1) {
					url = url.replace(/schk1=[^&]*/, (schk.checked ? 'schk1=' + schk.value : ''));
				} else {
					url = url + (schk.checked ? '&schk1=' + schk.value : '');
				}
			} else {

				for(var i=0; i<schk.length; i++) {
					if(url.indexOf('&schk' + (i+1) + '=') != -1) {
						url = url.replace("&schk"+(i+1)+'=', '&schk0=');
						url = url.replace(/schk0=[^&]*/, (schk[i].checked ? 'schk' + (i+1) + '=' + schk[i].value : ''));
					} else {
						url = url + (schk[i].checked ? '&schk' + (i+1) + '=' + schk[i].value : '');
					}
				}
			}
		}

	}
	location.href = url;
}

function list_search_default(form) {

	var ssel = form.elements['SEARCH_SELECT[]'];
	var schk = form.elements['SEARCH_CHECK[]'];
	var stex = form.elements['SEARCH_TEXT[]'];

	var url = location.href;

	if(form.elements['URL']) {
		url = form.elements['URL'].value;
	}
	if(ssel) {
		if(ssel.selectedIndex != undefined) {
			if(url.indexOf('&ssel1=') != -1) {
				url = url.replace(/ssel1=[^&]*/, 'ssel1=' + ssel.options[ssel.selectedIndex].value);
			} else {
				url = url + '&ssel1=' + ssel.options[ssel.selectedIndex].value;
			}
		} else {

			for(var i=0; i<ssel.length; i++) {
				if(url.indexOf('&ssel' + (i+1) + '=') != -1) {
					url = url.replace("&ssel"+(i+1)+'=', '&ssel0=');
					url = url.replace(/ssel0=[^&]*/, 'ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value);
				} else {

					url = url + '&ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value;
				}
			}
		}
	}

	if(schk) {
		if(!schk.length) {
			if(url.indexOf('&schk1=') != -1) {
				url = url.replace(/schk1=[^&]*/, (schk.checked ? 'schk1=' + schk.value : ''));
			} else {
				url = url + (schk.checked ? '&schk1=' + schk.value : '');
			}
		} else {

			for(var i=0; i<schk.length; i++) {
				if(url.indexOf('&schk' + (i+1) + '=') != -1) {
					url = url.replace("&schk"+(i+1)+'=', '&schk0=');
					url = url.replace(/schk0=[^&]*/, (schk[i].checked ? 'schk' + (i+1) + '=' + schk[i].value : ''));
				} else {
					url = url + (schk[i].checked ? '&schk' + (i+1) + '=' + schk[i].value : '');
				}
			}
		}
	}
	if(stex) {

		if(!stex.length) {
			if(url.indexOf('&stex1=') != -1) {
				url = url.replace(/stex1=[^&]*/, 'stex1=' + escape(stex.value));
			} else {
				url = url + '&stex1=' + escape(stex.value);
			}
		} else {
			for(var i=0; i<stex.length; i++) {
				if(url.indexOf('&stex' + (i+1) + '=') != -1) {
					url = url.replace("&stex"+(i+1)+'=', '&stex0=');
					url = url.replace(/stex0=[^&]*/, 'stex' + (i+1) + '=' + escape(stex[i].value));
				} else {
					url = url + '&stex' + (i+1) + '=' + stex[i].value;
				}
			}
		}
	}

	location.href = url;
}

function list_search_default_url(form, link) {

	var ssel = form.elements['SEARCH_SELECT[]'];
	var schk = form.elements['SEARCH_CHECK[]'];
	var stex = form.elements['SEARCH_TEXT[]'];

	var url = location.href;

	if(form.elements['URL']) {
		url = form.elements['URL'].value;
	}
	if(ssel) {
		if(ssel.selectedIndex != undefined) {
			if(url.indexOf('&ssel1=') != -1) {
				url = url.replace(/ssel1=[^&]*/, 'ssel1=' + ssel.options[ssel.selectedIndex].value);
			} else {
				url = url + '&ssel1=' + ssel.options[ssel.selectedIndex].value;
			}
		} else {

			for(var i=0; i<ssel.length; i++) {
				if(url.indexOf('&ssel' + (i+1) + '=') != -1) {
					url = url.replace("&ssel"+(i+1)+'=', '&ssel0=');
					url = url.replace(/ssel0=[^&]*/, 'ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value);
				} else {

					url = url + '&ssel' + (i+1) + '=' + ssel[i].options[ssel[i].selectedIndex].value;
				}
			}
		}
	}

	if(schk) {
		if(!schk.length) {
			if(url.indexOf('&schk1=') != -1) {
				url = url.replace(/schk1=[^&]*/, (schk.checked ? 'schk1=' + schk.value : ''));
			} else {
				url = url + (schk.checked ? '&schk1=' + schk.value : '');
			}
		} else {

			for(var i=0; i<schk.length; i++) {
				if(url.indexOf('&schk' + (i+1) + '=') != -1) {
					url = url.replace("&schk"+(i+1)+'=', '&schk0=');
					url = url.replace(/schk0=[^&]*/, (schk[i].checked ? 'schk' + (i+1) + '=' + schk[i].value : ''));
				} else {
					url = url + (schk[i].checked ? '&schk' + (i+1) + '=' + schk[i].value : '');
				}
			}
		}
	}
	if(stex) {

		if(!stex.length) {
			if(url.indexOf('&stex1=') != -1) {
				url = url.replace(/stex1=[^&]*/, 'stex1=' + escape(stex.value));
			} else {
				url = url + '&stex1=' + escape(stex.value);
			}
		} else {
			for(var i=0; i<stex.length; i++) {
				if(url.indexOf('&stex' + (i+1) + '=') != -1) {
					url = url.replace("&stex"+(i+1)+'=', '&stex0=');
					url = url.replace(/stex0=[^&]*/, 'stex' + (i+1) + '=' + escape(stex[i].value));
				} else {
					url = url + '&stex' + (i+1) + '=' + stex[i].value;
				}
			}
		}
	}
	url = url.substring(url.indexOf("&"));

	location.href = link + url;
}

function list_orderby(name) {
	var url = location.href;

	if(url.indexOf('&order=') != -1) {
		url = url.replace(/order=[^&]*/, 'order=' + escape(name));
	} else {
		url = url + '&order=' + escape(name);
	}

	location.href = url;
}

function OpenFile( fileUrl ) {
	window.top.opener.SetUrl( fileUrl ) ;
	window.top.close() ;
	window.top.opener.focus() ;
}

function showImage(s_arquivo, n_largura, n_altura, s_titulo, s_id) {
	var n_left = xPageX(s_id);
	var n_top  = xPageY(s_id);

	xWidth('box_image_window', n_largura + 14);
	xHeight('box_image_window', n_altura + 14 + 20);
	xWidth('box_image', n_largura);
	xHeight('box_image', n_altura);
	xWidth('box_image_title', n_largura);
	xLeft('box_image_window', n_left);
	xTop('box_image_window', n_top);

	xInnerHtml('box_image','<a href="javascript:void(0)" onclick="javascript:closeImage()"><img src="' + s_arquivo + '" width="' + n_largura + '" height="' + n_altura + '" hspace="0" border="0" id="imgAlbumBig" /></a>');
	if (s_titulo) {
		xInnerHtml('box_image_title', s_titulo);
	} else {
		xHide('box_image_title');
	}

	xShow('box_image_window');
	scrollTo(n_left, n_top);
}

function closeImage() {
   xHide('box_image_window');
}

function preloadImages() {
	var d=document; if(d.images){ if(!d.p) d.p=new Array();
	var i,j=d.p.length,a=preloadImages.arguments; for(i=0; i<a.length; i++)
	if (a[i].indexOf("#")!=0){ d.p[j]=new Image; d.p[j++].src=a[i];}}
}

function showMenu(id, file) {
	xGetElementById(id).src='/_resources/media/img/'+ file;
}

function selectTab(id) {

	if (id == 'box_ini_D100') {

		xNoDisplay('box_ini_ilimitado');
		xDisplay2('box_ini_D100');
		xNoDisplay('box_ini_D300');
		xNoDisplay('box_ini_D500');
		xNoDisplay('box_ini_D700');
		xNoDisplay('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home_on.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D300') {

		xNoDisplay('box_ini_ilimitado');
		xNoDisplay('box_ini_D100');
		xDisplay2('box_ini_D300');
		xNoDisplay('box_ini_D500');
		xNoDisplay('box_ini_D700');
		xNoDisplay('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100_on.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D500') {
		xNoDisplay('box_ini_ilimitado');
		xNoDisplay('box_ini_D100');
		xNoDisplay('box_ini_D300');
		xDisplay2('box_ini_D500');
		xNoDisplay('box_ini_D700');
		xNoDisplay('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300_on.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D700') {

		xNoDisplay('box_ini_ilimitado');
		xNoDisplay('box_ini_D100');
		xNoDisplay('box_ini_D300');
		xNoDisplay('box_ini_D500');
		xDisplay2('box_ini_D700');
		xNoDisplay('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500_on.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D1000') {

		xNoDisplay('box_ini_ilimitado');
		xNoDisplay('box_ini_D100');
		xNoDisplay('box_ini_D300');
		xNoDisplay('box_ini_D500');
		xNoDisplay('box_ini_D700');
		xDisplay2('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700_on.gif';

	} else if (id == 'box_ini_ilimitado') {
		xDisplay2('box_ini_ilimitado');
		xNoDisplay('box_ini_D100');
		xNoDisplay('box_ini_D300');
		xNoDisplay('box_ini_D500');
		xNoDisplay('box_ini_D700');
		xNoDisplay('box_ini_D1000');

		xGetElementById('aba_ilimitado').src = '/_resources/media/img/aba_d1000_on.gif';
		xGetElementById('aba_d100').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d300').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d500').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d700').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d1000').src = '/_resources/media/img/aba_d700.gif';

	}
	
	// Funções para Html e PHP - Planos
	
	if (id == 'box_ini_D1') {

		xNoDisplay('box_ini_D6');
		xDisplay2('box_ini_D1');
		xNoDisplay('box_ini_D2');
		xNoDisplay('box_ini_D3');
		xNoDisplay('box_ini_D4');
		xNoDisplay('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home_on.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D2') {

		xNoDisplay('box_ini_D6');
		xNoDisplay('box_ini_D1');
		xDisplay2('box_ini_D2');
		xNoDisplay('box_ini_D3');
		xNoDisplay('box_ini_D4');
		xNoDisplay('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100_on.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D3') {
		xNoDisplay('box_ini_D6');
		xNoDisplay('box_ini_D1');
		xNoDisplay('box_ini_D2');
		xDisplay2('box_ini_D3');
		xNoDisplay('box_ini_D4');
		xNoDisplay('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300_on.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700.gif';

	} else if (id == 'box_ini_D4') {

		xNoDisplay('box_ini_D6');
		xNoDisplay('box_ini_D1');
		xNoDisplay('box_ini_D2');
		xNoDisplay('box_ini_D3');
		xDisplay2('box_ini_D4');
		xNoDisplay('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500_on.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700.gif';
		
	} else if (id == 'box_ini_D5') {

		xNoDisplay('box_ini_D6');
		xNoDisplay('box_ini_D1');
		xNoDisplay('box_ini_D2');
		xNoDisplay('box_ini_D3');
		xNoDisplay('box_ini_D4');
		xDisplay2('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700_on.gif';

	} else if (id == 'box_ini_D6') {
		xDisplay2('box_ini_D6');
		xNoDisplay('box_ini_D1');
		xNoDisplay('box_ini_D2');
		xNoDisplay('box_ini_D3');
		xNoDisplay('box_ini_D4');
		xNoDisplay('box_ini_D5');

		xGetElementById('aba_d6').src = '/_resources/media/img/aba_d1000_on.gif';
		xGetElementById('aba_d1').src = '/_resources/media/img/aba_home.gif';
		xGetElementById('aba_d2').src = '/_resources/media/img/aba_d100.gif';
		xGetElementById('aba_d3').src = '/_resources/media/img/aba_d300.gif';
		xGetElementById('aba_d4').src = '/_resources/media/img/aba_d500.gif';
		xGetElementById('aba_d5').src = '/_resources/media/img/aba_d700.gif';

	}

	// Funções para JSP, Java, Servlets - Planos
	
	if (id == 'box_ini_J1') {

		xDisplay2('box_ini_J1');
		xNoDisplay('box_ini_J2');
		xNoDisplay('box_ini_J3');
		xNoDisplay('box_ini_J4');

		xGetElementById('aba_j1').src = '/_resources/media/img/aba_jstarter_on.gif';
		xGetElementById('aba_j2').src = '/_resources/media/img/aba_jsilver.gif';
		xGetElementById('aba_j3').src = '/_resources/media/img/aba_jdeluxe.gif';
		xGetElementById('aba_j4').src = '/_resources/media/img/aba_jgold.gif';
		

	} else if (id == 'box_ini_J2') {

		xNoDisplay('box_ini_J1');
		xDisplay2('box_ini_J2');
		xNoDisplay('box_ini_J3');
		xNoDisplay('box_ini_J4');

		xGetElementById('aba_j1').src = '/_resources/media/img/aba_jstarter.gif';
		xGetElementById('aba_j2').src = '/_resources/media/img/aba_jsilver_on.gif';
		xGetElementById('aba_j3').src = '/_resources/media/img/aba_jdeluxe.gif';
		xGetElementById('aba_j4').src = '/_resources/media/img/aba_jgold.gif';

	} else if (id == 'box_ini_J3') {
		xNoDisplay('box_ini_J1');
		xNoDisplay('box_ini_J2');
		xDisplay2('box_ini_J3');
		xNoDisplay('box_ini_J4');

		xGetElementById('aba_j1').src = '/_resources/media/img/aba_jstarter.gif';
		xGetElementById('aba_j2').src = '/_resources/media/img/aba_jsilver.gif';
		xGetElementById('aba_j3').src = '/_resources/media/img/aba_jdeluxe_on.gif';
		xGetElementById('aba_j4').src = '/_resources/media/img/aba_jgold.gif';

	} else if (id == 'box_ini_J4') {

		xNoDisplay('box_ini_J1');
		xNoDisplay('box_ini_J2');
		xNoDisplay('box_ini_J3');
		xDisplay2('box_ini_J4');

		xGetElementById('aba_j1').src = '/_resources/media/img/aba_jstarter.gif';
		xGetElementById('aba_j2').src = '/_resources/media/img/aba_jsilver.gif';
		xGetElementById('aba_j3').src = '/_resources/media/img/aba_jdeluxe.gif';
		xGetElementById('aba_j4').src = '/_resources/media/img/aba_jgold_on.gif';

	} 
	
	// Funções para ColdFusion - Planos
	
	if (id == 'box_ini_C1') {

		xDisplay2('box_ini_C1');
		xNoDisplay('box_ini_C2');
		xNoDisplay('box_ini_C3');
		xNoDisplay('box_ini_C4');

		xGetElementById('aba_c1').src = '/_resources/media/img/aba_cfstarter_on.gif';
		xGetElementById('aba_c2').src = '/_resources/media/img/aba_cfdeluxe.gif';
		xGetElementById('aba_c3').src = '/_resources/media/img/aba_cfgold.gif';
		xGetElementById('aba_c4').src = '/_resources/media/img/aba_cfplatinum.gif';

	} else if (id == 'box_ini_C2') {

		xNoDisplay('box_ini_C1');
		xDisplay2('box_ini_C2');
		xNoDisplay('box_ini_C3');
		xNoDisplay('box_ini_C4');

		xGetElementById('aba_c1').src = '/_resources/media/img/aba_cfstarter.gif';
		xGetElementById('aba_c2').src = '/_resources/media/img/aba_cfdeluxe_on.gif';
		xGetElementById('aba_c3').src = '/_resources/media/img/aba_cfgold.gif';
		xGetElementById('aba_c4').src = '/_resources/media/img/aba_cfplatinum.gif';

	} else if (id == 'box_ini_C3') {
		xNoDisplay('box_ini_C1');
		xNoDisplay('box_ini_C2');
		xDisplay2('box_ini_C3');
		xNoDisplay('box_ini_C4');

		xGetElementById('aba_c1').src = '/_resources/media/img/aba_cfstarter.gif';
		xGetElementById('aba_c2').src = '/_resources/media/img/aba_cfdeluxe.gif';
		xGetElementById('aba_c3').src = '/_resources/media/img/aba_cfgold_on.gif';
		xGetElementById('aba_c4').src = '/_resources/media/img/aba_cfplatinum.gif';

	} else if (id == 'box_ini_C4') {

		xNoDisplay('box_ini_C1');
		xNoDisplay('box_ini_C2');
		xNoDisplay('box_ini_C3');
		xDisplay2('box_ini_C4');

		xGetElementById('aba_c1').src = '/_resources/media/img/aba_cfstarter.gif';
		xGetElementById('aba_c2').src = '/_resources/media/img/aba_cfdeluxe.gif';
		xGetElementById('aba_c3').src = '/_resources/media/img/aba_cfgold.gif';
		xGetElementById('aba_c4').src = '/_resources/media/img/aba_cfplatinum_on.gif';

	} 

	// Funções para Ruby on Rails - Planos
	
	if (id == 'box_ini_R1') {

		xDisplay2('box_ini_R1');
		xNoDisplay('box_ini_R2');
		xNoDisplay('box_ini_R3');
		xNoDisplay('box_ini_R4');

		xGetElementById('aba_r1').src = '/_resources/media/img/aba_rorstarter_on.gif';
		xGetElementById('aba_r2').src = '/_resources/media/img/aba_rorsilver.gif';
		xGetElementById('aba_r3').src = '/_resources/media/img/aba_rordeluxe.gif';
		xGetElementById('aba_r4').src = '/_resources/media/img/aba_rorgold.gif';
		

	} else if (id == 'box_ini_R2') {

		xNoDisplay('box_ini_R1');
		xDisplay2('box_ini_R2');
		xNoDisplay('box_ini_R3');
		xNoDisplay('box_ini_R4');

		xGetElementById('aba_r1').src = '/_resources/media/img/aba_rorstarter.gif';
		xGetElementById('aba_r2').src = '/_resources/media/img/aba_rorsilver_on.gif';
		xGetElementById('aba_r3').src = '/_resources/media/img/aba_rordeluxe.gif';
		xGetElementById('aba_r4').src = '/_resources/media/img/aba_rorgold.gif';

	} else if (id == 'box_ini_R3') {
		xNoDisplay('box_ini_R1');
		xNoDisplay('box_ini_R2');
		xDisplay2('box_ini_R3');
		xNoDisplay('box_ini_R4');

		xGetElementById('aba_r1').src = '/_resources/media/img/aba_rorstarter.gif';
		xGetElementById('aba_r2').src = '/_resources/media/img/aba_rorsilver.gif';
		xGetElementById('aba_r3').src = '/_resources/media/img/aba_rordeluxe_on.gif';
		xGetElementById('aba_r4').src = '/_resources/media/img/aba_rorgold.gif';

	} else if (id == 'box_ini_R4') {

		xNoDisplay('box_ini_R1');
		xNoDisplay('box_ini_R2');
		xNoDisplay('box_ini_R3');
		xDisplay2('box_ini_R4');

		xGetElementById('aba_r1').src = '/_resources/media/img/aba_rorstarter.gif';
		xGetElementById('aba_r2').src = '/_resources/media/img/aba_rorsilver.gif';
		xGetElementById('aba_r3').src = '/_resources/media/img/aba_rordeluxe.gif';
		xGetElementById('aba_r4').src = '/_resources/media/img/aba_rorgold_on.gif';

	} 
	
	// Funções para flash media - Planos
	
	if (id == 'box_ini_F1') {

		xNoDisplay('box_ini_F6');
		xDisplay2('box_ini_F1');
		xNoDisplay('box_ini_F2');
		xNoDisplay('box_ini_F3');
		xNoDisplay('box_ini_F4');
		xNoDisplay('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10_on.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100.gif';

	} else if (id == 'box_ini_F2') {

		xNoDisplay('box_ini_F6');
		xNoDisplay('box_ini_F1');
		xDisplay2('box_ini_F2');
		xNoDisplay('box_ini_F3');
		xNoDisplay('box_ini_F4');
		xNoDisplay('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20_on.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100.gif';

	} else if (id == 'box_ini_F3') {
		xNoDisplay('box_ini_F6');
		xNoDisplay('box_ini_F1');
		xNoDisplay('box_ini_F2');
		xDisplay2('box_ini_F3');
		xNoDisplay('box_ini_F4');
		xNoDisplay('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30_on.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100.gif';

	} else if (id == 'box_ini_F4') {

		xNoDisplay('box_ini_F6');
		xNoDisplay('box_ini_F1');
		xNoDisplay('box_ini_F2');
		xNoDisplay('box_ini_F3');
		xDisplay2('box_ini_F4');
		xNoDisplay('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50_on.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100.gif';
		
	} else if (id == 'box_ini_F5') {

		xNoDisplay('box_ini_F6');
		xNoDisplay('box_ini_F1');
		xNoDisplay('box_ini_F2');
		xNoDisplay('box_ini_F3');
		xNoDisplay('box_ini_F4');
		xDisplay2('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100_on.gif';

	} else if (id == 'box_ini_F6') {

		xDisplay2('box_ini_F6');
		xNoDisplay('box_ini_F1');
		xNoDisplay('box_ini_F2');
		xNoDisplay('box_ini_F3');
		xNoDisplay('box_ini_F4');
		xNoDisplay('box_ini_F5');

		xGetElementById('aba_f6').src = '/_resources/media/img/aba_fcs150_on.gif';
		xGetElementById('aba_f1').src = '/_resources/media/img/aba_fcs10.gif';
		xGetElementById('aba_f2').src = '/_resources/media/img/aba_fcs20.gif';
		xGetElementById('aba_f3').src = '/_resources/media/img/aba_fcs30.gif';
		xGetElementById('aba_f4').src = '/_resources/media/img/aba_fcs50.gif';
		xGetElementById('aba_f5').src = '/_resources/media/img/aba_fcs100.gif';
		
	}
	
	// Funções para Windows media - Planos
	
	if (id == 'box_ini_VM1') {

		xNoDisplay('box_ini_VM6');
		xDisplay2('box_ini_VM1');
		xNoDisplay('box_ini_VM2');
		xNoDisplay('box_ini_VM3');
		xNoDisplay('box_ini_VM4');
		xNoDisplay('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1_on.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5.gif';

	} else if (id == 'box_ini_VM2') {

		xNoDisplay('box_ini_VM6');
		xNoDisplay('box_ini_VM1');
		xDisplay2('box_ini_VM2');
		xNoDisplay('box_ini_VM3');
		xNoDisplay('box_ini_VM4');
		xNoDisplay('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2_on.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5.gif';

	} else if (id == 'box_ini_VM3') {

		xNoDisplay('box_ini_VM6');
		xNoDisplay('box_ini_VM1');
		xNoDisplay('box_ini_VM2');
		xDisplay2('box_ini_VM3');
		xNoDisplay('box_ini_VM4');
		xNoDisplay('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3_on.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5.gif';

	} else if (id == 'box_ini_VM4') {

		xNoDisplay('box_ini_VM6');
		xNoDisplay('box_ini_VM1');
		xNoDisplay('box_ini_VM2');
		xNoDisplay('box_ini_VM3');
		xDisplay2('box_ini_VM4');
		xNoDisplay('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4_on.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5.gif';
		
	} else if (id == 'box_ini_VM5') {

		xNoDisplay('box_ini_VM6');
		xNoDisplay('box_ini_VM1');
		xNoDisplay('box_ini_VM2');
		xNoDisplay('box_ini_VM3');
		xNoDisplay('box_ini_VM4');
		xDisplay2('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5_on.gif';

	} else if (id == 'box_ini_VM6') {

		xDisplay2('box_ini_VM6');
		xNoDisplay('box_ini_VM1');
		xNoDisplay('box_ini_VM2');
		xNoDisplay('box_ini_VM3');
		xNoDisplay('box_ini_VM4');
		xNoDisplay('box_ini_VM5');

		xGetElementById('aba_wm6').src = '/_resources/media/img/aba_wm6_on.gif';
		xGetElementById('aba_wm1').src = '/_resources/media/img/aba_wm1.gif';
		xGetElementById('aba_wm2').src = '/_resources/media/img/aba_wm2.gif';
		xGetElementById('aba_wm3').src = '/_resources/media/img/aba_wm3.gif';
		xGetElementById('aba_wm4').src = '/_resources/media/img/aba_wm4.gif';
		xGetElementById('aba_wm5').src = '/_resources/media/img/aba_wm5.gif';
		
	}

	// Funções para Hospedagem Windows
	
	if (id == 'box_ini_windows1') {

		xNoDisplay('box_ini_windows6');
		xDisplay2('box_ini_windows1');
		xNoDisplay('box_ini_windows2');
		xNoDisplay('box_ini_windows3');
		xNoDisplay('box_ini_windows4');
		xNoDisplay('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1_on.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5.gif';

	} else if (id == 'box_ini_windows2') {

		xNoDisplay('box_ini_windows6');
		xNoDisplay('box_ini_windows1');
		xDisplay2('box_ini_windows2');
		xNoDisplay('box_ini_windows3');
		xNoDisplay('box_ini_windows4');
		xNoDisplay('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2_on.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5.gif';

	} else if (id == 'box_ini_windows3') {

		xNoDisplay('box_ini_windows6');
		xNoDisplay('box_ini_windows1');
		xNoDisplay('box_ini_windows2');
		xDisplay2('box_ini_windows3');
		xNoDisplay('box_ini_windows4');
		xNoDisplay('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3_on.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5.gif';

	} else if (id == 'box_ini_windows4') {

		xNoDisplay('box_ini_windows6');
		xNoDisplay('box_ini_windows1');
		xNoDisplay('box_ini_windows2');
		xNoDisplay('box_ini_windows3');
		xDisplay2('box_ini_windows4');
		xNoDisplay('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4_on.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5.gif';
		
	} else if (id == 'box_ini_windows5') {

		xNoDisplay('box_ini_windows6');
		xNoDisplay('box_ini_windows1');
		xNoDisplay('box_ini_windows2');
		xNoDisplay('box_ini_windows3');
		xNoDisplay('box_ini_windows4');
		xDisplay2('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5_on.gif';

	} else if (id == 'box_ini_windows6') {

		xDisplay2('box_ini_windows6');
		xNoDisplay('box_ini_windows1');
		xNoDisplay('box_ini_windows2');
		xNoDisplay('box_ini_windows3');
		xNoDisplay('box_ini_windows4');
		xNoDisplay('box_ini_windows5');

		xGetElementById('aba_windows6').src = '/_resources/media/img/aba_windows6_on.gif';
		xGetElementById('aba_windows1').src = '/_resources/media/img/aba_windows1.gif';
		xGetElementById('aba_windows2').src = '/_resources/media/img/aba_windows2.gif';
		xGetElementById('aba_windows3').src = '/_resources/media/img/aba_windows3.gif';
		xGetElementById('aba_windows4').src = '/_resources/media/img/aba_windows4.gif';
		xGetElementById('aba_windows5').src = '/_resources/media/img/aba_windows5.gif';
		
	}
	
	// Funções para Hospedagem Linux
	
	if (id == 'box_ini_linux1') {

		xNoDisplay('box_ini_linux6');
		xDisplay2('box_ini_linux1');
		xNoDisplay('box_ini_linux2');
		xNoDisplay('box_ini_linux3');
		xNoDisplay('box_ini_linux4');
		xNoDisplay('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1_on.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5.gif';

	} else if (id == 'box_ini_linux2') {

		xNoDisplay('box_ini_linux6');
		xNoDisplay('box_ini_linux1');
		xDisplay2('box_ini_linux2');
		xNoDisplay('box_ini_linux3');
		xNoDisplay('box_ini_linux4');
		xNoDisplay('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2_on.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5.gif';

	} else if (id == 'box_ini_linux3') {

		xNoDisplay('box_ini_linux6');
		xNoDisplay('box_ini_linux1');
		xNoDisplay('box_ini_linux2');
		xDisplay2('box_ini_linux3');
		xNoDisplay('box_ini_linux4');
		xNoDisplay('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3_on.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5.gif';

	} else if (id == 'box_ini_linux4') {

		xNoDisplay('box_ini_linux6');
		xNoDisplay('box_ini_linux1');
		xNoDisplay('box_ini_linux2');
		xNoDisplay('box_ini_linux3');
		xDisplay2('box_ini_linux4');
		xNoDisplay('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4_on.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5.gif';
		
	} else if (id == 'box_ini_linux5') {

		xNoDisplay('box_ini_linux6');
		xNoDisplay('box_ini_linux1');
		xNoDisplay('box_ini_linux2');
		xNoDisplay('box_ini_linux3');
		xNoDisplay('box_ini_linux4');
		xDisplay2('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5_on.gif';

	} else if (id == 'box_ini_linux6') {

		xDisplay2('box_ini_linux6');
		xNoDisplay('box_ini_linux1');
		xNoDisplay('box_ini_linux2');
		xNoDisplay('box_ini_linux3');
		xNoDisplay('box_ini_linux4');
		xNoDisplay('box_ini_linux5');

		xGetElementById('aba_linux6').src = '/_resources/media/img/aba_linux6_on.gif';
		xGetElementById('aba_linux1').src = '/_resources/media/img/aba_linux1.gif';
		xGetElementById('aba_linux2').src = '/_resources/media/img/aba_linux2.gif';
		xGetElementById('aba_linux3').src = '/_resources/media/img/aba_linux3.gif';
		xGetElementById('aba_linux4').src = '/_resources/media/img/aba_linux4.gif';
		xGetElementById('aba_linux5').src = '/_resources/media/img/aba_linux5.gif';
		
	}

	// Funções para vps
	
	if (id == 'box_ini_virtual1') {


		xDisplay2('box_ini_virtual1');
		xNoDisplay('box_ini_virtual2');
		xNoDisplay('box_ini_virtual3');

		xGetElementById('aba_virtual1').src = '/_resources/media/img/aba_virtual1_on.gif';
		xGetElementById('aba_virtual2').src = '/_resources/media/img/aba_virtual2.gif';
		xGetElementById('aba_virtual3').src = '/_resources/media/img/aba_virtual3.gif';


	} else if (id == 'box_ini_virtual2') {

		xNoDisplay('box_ini_virtual1');
		xDisplay2('box_ini_virtual2');
		xNoDisplay('box_ini_virtual3');
		xNoDisplay('box_ini_virtual4');
		xNoDisplay('box_ini_virtual5');

		xGetElementById('aba_virtual1').src = '/_resources/media/img/aba_virtual1.gif';
		xGetElementById('aba_virtual2').src = '/_resources/media/img/aba_virtual2_on.gif';
		xGetElementById('aba_virtual3').src = '/_resources/media/img/aba_virtual3.gif';

	} else if (id == 'box_ini_virtual3') {

		xNoDisplay('box_ini_virtual1');
		xNoDisplay('box_ini_virtual2');
		xDisplay2('box_ini_virtual3');

		xGetElementById('aba_virtual1').src = '/_resources/media/img/aba_virtual1.gif';
		xGetElementById('aba_virtual2').src = '/_resources/media/img/aba_virtual2.gif';
		xGetElementById('aba_virtual3').src = '/_resources/media/img/aba_virtual3_on.gif';
		
	}

	
	// Funções para registro de dominio	
	if (id == 'box_ini_registro1') {

		xDisplay2('box_ini_registro1');
		xNoDisplay('box_ini_registro2');		

		xGetElementById('aba_registro1').src = '/_resources/media/img/aba_registronacional_on.gif';
		xGetElementById('aba_registro2').src = '/_resources/media/img/aba_registrointernacional.gif';


	} else if (id == 'box_ini_registro2') {

		xNoDisplay('box_ini_registro1');
		xDisplay2('box_ini_registro2');

		xGetElementById('aba_registro1').src = '/_resources/media/img/aba_registronacional.gif';
		xGetElementById('aba_registro2').src = '/_resources/media/img/aba_registrointernacional_on.gif';		

	}
	
	// Funções para licença pc seguro	
	if (id == 'box_ini_licenca1') {

		xDisplay2('box_ini_licenca1');
		xNoDisplay('box_ini_licenca2');		

		xGetElementById('aba_licenca1').src = '/_resources/media/img/aba_licencapc_on.gif';
		xGetElementById('aba_licenca2').src = '/_resources/media/img/aba_licencaadicional.gif';


	} else if (id == 'box_ini_licenca2') {

		xNoDisplay('box_ini_licenca1');
		xDisplay2('box_ini_licenca2');

		xGetElementById('aba_licenca1').src = '/_resources/media/img/aba_licencapc.gif';
		xGetElementById('aba_licenca2').src = '/_resources/media/img/aba_licencaadicional_on.gif';		

	}
	
}

function changeTestimonial()
{
	tes1 = (tes1 + 1) % tes_size;

	xGetElementById('desc_tes1').innerHTML		= desc_tag[tes1];

	setTimeout("changeTestimonial()", 20000);
}

function changeType(id, flag)
{
	iden = xGetElementById(id);
	type = xGetElementById('FOR_TYPE');
	form = xGetElementById('form_contrato');
	ext  = xGetElementById('FOR_SDM_DOMINIO_EXT');

 	b_cnpj = 1;

 	if (flag == 0) {
		if (ext.value == 'com' || ext.value == 'net' || ext.value == 'org' || ext.value == 'edu' || ext.value == 'info' || ext.value == 'us' || ext.value == 'ws' || ext.value == 'cc' || ext.value == 'bz' || ext.value == 'tv' || ext.value == 'biz' || ext.value == 'ato.br' || ext.value == 'cim.br' || ext.value == 'adm.br' || ext.value == 'adv.br' || ext.value == 'arq.br' || ext.value == 'bio.br' || ext.value == 'blog.br' || ext.value == 'cng.br' || ext.value == 'cnt.br' || ext.value == 'ecn.br' || ext.value == 'eng.br' || ext.value == 'eti.br' || ext.value == 'fnd.br' || ext.value == 'far.br' || ext.value == 'flog.br' || ext.value == 'fot.br' || ext.value == 'fst.br' || ext.value == 'ggf.br' || ext.value == 'imb.br' || ext.value == 'jor.br' || ext.value == 'lel.br' || ext.value == 'mat.br' || ext.value == 'med.br' || ext.value == 'mus.br' || ext.value == 'nom.br' || ext.value == 'not.br' || ext.value == 'ntr.br' || ext.value == 'odo.br' || ext.value == 'ppg.br' || ext.value == 'pro.br' || ext.value == 'psc.br' || ext.value == 'qsl.br' || ext.value == 'slg.br' || ext.value == 'srv.br' || ext.value == 'trd.br' || ext.value == 'vet.br' || ext.value == 'vlog.br' || ext.value == 'wiki.br' || ext.value == 'zlg.br' || ext.value == 'com.br') {
			b_cnpj = 0;
		}
 		
		if (type.value == '1' || (form.elements['FOR_SDM_SITUACAO'][0].checked && b_cnpj == 1)) {
			iden.style.display = 'inline';
		} else {
			iden.style.display = 'none';
		}
	} else {
		if (type.value == '1') {
			iden.style.display = 'inline';
		} else {
			iden.style.display = 'none';
		}	
	}
}

function changeType2(id, flag)
{
	iden = xGetElementById(id);
	type = xGetElementById('FOW_TYPE');
	form = xGetElementById('form_registro');
	ext  = xGetElementById('FOW_SDM_DOMINIO_EXT');

 	b_cnpj = 1;

 	if (flag == 0) {
		if (ext.value == 'com' || ext.value == 'net' || ext.value == 'org' || ext.value == 'edu' || ext.value == 'info' || ext.value == 'us' || ext.value == 'ws' || ext.value == 'cc' || ext.value == 'bz' || ext.value == 'tv' || ext.value == 'biz' || ext.value == 'ato.br' || ext.value == 'cim.br' || ext.value == 'adm.br' || ext.value == 'adv.br' || ext.value == 'arq.br' || ext.value == 'bio.br' || ext.value == 'blog.br' || ext.value == 'cng.br' || ext.value == 'cnt.br' || ext.value == 'ecn.br' || ext.value == 'eng.br' || ext.value == 'eti.br' || ext.value == 'fnd.br' || ext.value == 'far.br' || ext.value == 'flog.br' || ext.value == 'fot.br' || ext.value == 'fst.br' || ext.value == 'ggf.br' || ext.value == 'imb.br' || ext.value == 'jor.br' || ext.value == 'lel.br' || ext.value == 'mat.br' || ext.value == 'med.br' || ext.value == 'mus.br' || ext.value == 'nom.br' || ext.value == 'not.br' || ext.value == 'ntr.br' || ext.value == 'odo.br' || ext.value == 'ppg.br' || ext.value == 'pro.br' || ext.value == 'psc.br' || ext.value == 'qsl.br' || ext.value == 'slg.br' || ext.value == 'srv.br' || ext.value == 'trd.br' || ext.value == 'vet.br' || ext.value == 'vlog.br' || ext.value == 'wiki.br' || ext.value == 'zlg.br' || ext.value == 'com.br') {
			b_cnpj = 0;
		}
 		
		if (type.value == '1' || b_cnpj == 1) {
			iden.style.display = 'inline';
		} else {
			iden.style.display = 'none';
		}
	} else {
		if (type.value == '1') {
			iden.style.display = 'inline';
		} else {
			iden.style.display = 'none';
		}	
	}
}


function copyValues1() {
	xGetElementById('FOR_DMT_RESPONSAVEL').value = xGetElementById('FOR_DOM_RESPONSAVEL').value;
	xGetElementById('FOR_DMT_CPF').value = xGetElementById('FOR_DOM_CPF').value;
	xGetElementById('FOR_DMT_EMAIL').value = xGetElementById('FOR_DOM_EMAIL').value;
	xGetElementById('FOR_DMT_EMAIL_ALT').value = xGetElementById('FOR_DOM_EMAIL_ALT').value;
	xGetElementById('FOR_DMT_DDDTEL1').value = xGetElementById('FOR_DOM_DDDTEL1').value;
	xGetElementById('FOR_DMT_TEL1').value = xGetElementById('FOR_DOM_TEL1').value;
	xGetElementById('FOR_DMT_DDDTEL2').value = xGetElementById('FOR_DOM_DDDTEL2').value;
	xGetElementById('FOR_DMT_TEL2').value = xGetElementById('FOR_DOM_TEL2').value;
}

function copyValues2() {
	xGetElementById('FOR_DMF_RESPONSAVEL').value = xGetElementById('FOR_DOM_RESPONSAVEL').value;
	xGetElementById('FOR_DMF_CPF').value = xGetElementById('FOR_DOM_CPF').value;
	xGetElementById('FOR_DMF_EMAIL').value = xGetElementById('FOR_DOM_EMAIL').value;
	xGetElementById('FOR_DMF_EMAIL_ALT').value = xGetElementById('FOR_DOM_EMAIL_ALT').value;
	xGetElementById('FOR_DMF_DDDTEL1').value = xGetElementById('FOR_DOM_DDDTEL1').value;
	xGetElementById('FOR_DMF_TEL1').value = xGetElementById('FOR_DOM_TEL1').value;
	xGetElementById('FOR_DMF_DDDTEL2').value = xGetElementById('FOR_DOM_DDDTEL2').value;
	xGetElementById('FOR_DMF_TEL2').value = xGetElementById('FOR_DOM_TEL2').value;
}

function move(fbox, tbox) {
	var arrFbox = new Array();
	var arrTbox = new Array();
	var arrLookup = new Array();
	var i;
	for (i = 0; i < tbox.options.length; i++) {
		arrLookup[tbox.options[i].text] = tbox.options[i].value;
		arrTbox[i] = tbox.options[i].text;
	}
	var fLength = 0;
	var tLength = arrTbox.length;
	for(i = 0; i < fbox.options.length; i++) {
		arrLookup[fbox.options[i].text] = fbox.options[i].value;
		if (fbox.options[i].selected && fbox.options[i].value != "") {
			arrTbox[tLength] = fbox.options[i].text;
			tLength++;
		}
		else {
			arrFbox[fLength] = fbox.options[i].text;
			fLength++;
		}
	}
	
	arrFbox.sort();
	arrTbox.sort();

	fbox.length = 0;
	tbox.length = 0;
	var c;
	for(c = 0; c < arrFbox.length; c++) {
		var no = new Option();
		no.value = arrLookup[arrFbox[c]];
		no.text = arrFbox[c];
		fbox[c] = no;
	}
	for(c = 0; c < arrTbox.length; c++) {
		var no = new Option();
		no.value = arrLookup[arrTbox[c]];
		no.text = arrTbox[c];
		tbox[c] = no;
	}
}

function moveAll(fbox, tbox) {
	var arrFbox = new Array();
	var arrTbox = new Array();
	var arrLookup = new Array();
	var i;
	for (i = 0; i < tbox.options.length; i++) {
		arrLookup[tbox.options[i].text] = tbox.options[i].value;
		arrTbox[i] = tbox.options[i].text;
	}
	var fLength = 0;
	var tLength = arrTbox.length;
	for(i = 0; i < fbox.options.length; i++) {
		arrLookup[fbox.options[i].text] = fbox.options[i].value;
		arrTbox[tLength] = fbox.options[i].text;
		tLength++;
		fLength = 0;
	}

	arrFbox.sort();
	arrTbox.sort();

	fbox.length = 0;
	tbox.length = 0;
	var c;
	for(c = 0; c < arrFbox.length; c++) {
		var no = new Option();
		no.value = arrLookup[arrFbox[c]];
		no.text = arrFbox[c];
		fbox[c] = no;
	}
	for(c = 0; c < arrTbox.length; c++) {
		var no = new Option();
		no.value = arrLookup[arrTbox[c]];
		no.text = arrTbox[c];
		tbox[c] = no;
	}
}

function allSelect2(tbox, form)
{
	for (i=0; i < tbox.options.length; i++)
	{
		tbox.options[i].selected = true;
	}
	
	form.submit();
}

function displayField() {
	file = xGetElementById('file_' + index);
	
	index++;
	
	if (index == 10) {
		xNoDisplay(xGetElementById('mais'));
	}
	if (index <= 10) {
		xDisplay2(file);
	}
	
}

function changePagamento() {	
	plano = xGetElementById('FOR_PLA_ROOT_ID').value;
	
	if (plano == 49 || plano == 50) {
		xDisplay2(xGetElementById('pagamento1'));
		xNoDisplay(xGetElementById('pagamento2'));
		xDisplay2(xGetElementById('restricao'));
		xGetElementById('FOR_PLA_PAGAMENTO1').value = 4;
		xGetElementById('FOR_PLA_PAGAMENTO2').value = 4;
	} else {
		xDisplay2(xGetElementById('pagamento2'));
		xNoDisplay(xGetElementById('pagamento1'));
		xNoDisplay(xGetElementById('restricao'));
		xGetElementById('FOR_PLA_PAGAMENTO1').value = 1;
		xGetElementById('FOR_PLA_PAGAMENTO2').value = 1;
	}
	
}