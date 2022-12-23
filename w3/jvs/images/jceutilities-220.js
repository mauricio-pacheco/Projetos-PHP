/*
* JCE Utilities 2.2.0
*
* @version $Id$
* @package JCE Utilites
* @copyright Copyright (C) 2006-2009 Ryan Demmer. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*
*/
window.extend({getWidth:function(){return document.documentElement.clientWidth||document.body.clientWidth||this.innerWidth||0;},getHeight:function(){return document.documentElement.clientHeight||document.body.clientHeight||this.innerHeight||0;},getScrollHeight:function(){return document.documentElement.scrollHeight||document.body.scrollHeight||0;},getScrollWidth:function(){return document.documentElement.scrollWidth||document.body.scrollWidth||0;},getScrollTop:function(){return document.documentElement.scrollTop||this.pageYOffset||document.body.scrollTop||0;}});var JCETips=new Class({getOptions:function(){return{classname:'tooltip',opacity:1,speed:150,position:'br',offsets:{'x':16,'y':16}};},initialize:function(elements,options){this.setOptions(this.getOptions(),options);$$(elements).addEvents({'mouseover':this.show.bindWithEvent(this),'mousemove':this.locate.bindWithEvent(this),'mouseout':this.hide.bindWithEvent(this),'mousedown':this.hide.bindWithEvent(this),'blur':this.hide.bindWithEvent(this)});},show:function(e){var el=e.target,text=el.title||'',title='';if(/::/.test(text)){var parts=text.split('::');title=parts[0].trim();text=parts[1].trim();}var cls=el.className.replace(/(jce_?)tooltip/gi,'');this.tip=new Element('div').addClass(cls).addClass(this.options.classname).setStyles({'position':'absolute','visibility':'hidden'}).injectInside($E('body'));this.tip.title=el.title;$(el).setProperty('title','');if(title){new Element('h4').setHTML(title).injectInside($(this.tip));}new Element('p').setHTML(text).injectInside($(this.tip));new Fx.Style(this.tip,'opacity',{duration:this.options.speed}).start(0,this.options.opacity);this.exists=true;},locate:function(e){if(this.exists){var o=this.options.offsets;var page=e.page;var tip={'x':this.tip.offsetWidth,'y':this.tip.offsetHeight};var pos={'x':page.x+o.x,'y':page.y+o.y};switch(this.options.position){case'tl':pos.x=(page.x-tip.x)-o.x;pos.y=(page.y-tip.y)-o.y;break;case'tr':pos.x=page.x+o.x;pos.y=(page.y-tip.y)-o.y;break;case'tc':pos.x=(page.x-Math.round((tip.x/2)))+o.x;pos.y=(page.y-tip.y)-o.y;break;case'bl':pos.x=(page.x-tip.x)-o.x;pos.y=(page.y+tip.y)-o.y;break;case'br':pos.x=page.x+o.x;pos.y=page.y+o.y;break;case'bc':pos.x=(page.x-Math.round((tip.x/2)))+o.x;pos.y=(page.y+tip.y)-o.y;break;}$(this.tip).setStyles({top:pos.y+'px',left:pos.x+'px'});}},hide:function(e){if(this.exists){$(e.target).setProperty('title',this.tip.title);new Fx.Style(this.tip,'opacity',{duration:this.options.speed,onComplete:function(){$(this.tip).remove();}.bind(this)}).start(this.options.opacity,0);}this.exists=false;}});JCETips.implement(new Events,new Options);var JCEUtilities=new Class({getOptions:function(){return{popup:{legacy:0,overlay:1,overlayopacity:0.8,overlaycolor:'#000000',resize:1,icons:1,fadespeed:500,scalespeed:500,theme:'standard',themecustom:'',themepath:'plugins/system/jceutilities/themes',hideobjects:1,scrollpopup:1,onclose:Class.empty},tooltip:{className:'tooltip',showDelay:150,hideDelay:150,offsets:{x:16,y:16}},pngfix:1,wmode:0,imgpath:'plugins/system/jceutilities/img'};},getSite:function(){$ES('script[src$=jceutilities-220.js], script[src$=jceutilities-220-src.js]').each(function(el){s=el.src;});s=s.substring(0,s.lastIndexOf('plugins/system/jceutilities/js'))||'';if(/:\/\//.test(s)){s=s.match(/.*:\/\/[^\/]+(.*)/)[1];}return s;},initialize:function(options){this.setOptions(this.getOptions(),options);this.popup();this.tooltip();if(this.options.pngfix==1&&window.ie6){this._pngFix();}return this;},_pngFix:function(){var s,bg,site=this.getSite();$ES('img[src$=.png]',$E('body')).each(function(el){$(el).setStyle('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+el.src+"', sizingMethod='')");el.src=site+'plugins/system/jceutilities/img/blank.gif';});$ES('*',$E('body')).each(function(el){s=$(el).getStyle('background-image');if(s&&/\.png/i.test(s)){bg=/url\("(.*)"\)/.exec(s)[1];$(el).setStyle('background-image','none');$(el).setStyle('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+bg+"',sizingMethod='')");}});},_wmodeFix:function(){$ES('object').each(function(el){if(el.classid.toLowerCase()=='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'||el.type.toLowerCase()=='application/x-shockwave-flash'){if(!el.wmode||el.wmode.toLowerCase()=='window'){el.wmode='opaque';if(typeof el.outerHTML=='undefined'){$(el).replaceWith($(el).clone(true));}else{el.outerHTML=el.outerHTML;}}}});$ES('embed[type=application/x-shockwave-flash]').each(function(el){var wm=$(el).getProperty('wmode');if(!wm||wm.toLowerCase()=='window'){$(el).setProperty('wmode','opaque');if(typeof el.outerHTML=='undefined'){$(el).replaceWith($(el).clone(true));}else{el.outerHTML=el.outerHTML;}}});},tooltip:function(){new JCETips($ES('.jcetooltip, .jce_tooltip'),this.options.tooltip);},convert:function(){this.site=this.getSite();$ES('a[href^=jce]').each(function(el){var p,s;s=this._cleanEvent($(el).getProperty('onclick')).replace(/&amp;/g,'&').replace(/&#39;/g,"'").split("'");p=this._params(s[1]);img=p['img'];if(!/http:\/\//.test(img)){if(img.charAt(0)=='/'){img=img.substr(1);}img=this.site.replace(/http:\/\/([^\/]+)/,'')+img;}el.setProperties({'href':img,'title':p['title'].replace(/_/,' '),'onclick':''}).addClass('jcepopup').removeProperty('onclick');}.bind(this));},popup:function(){var t=this;this.popups=[];this.theme='';this.site=this.getSite();if(this.options.popup.legacy==1){this.convert();}$ES('.jcebox, .jcelightbox, .jcepopup').each(function(el){if(this.options.popup.icons==1&&el.nodeName=='A'&&!/(noicon|icon-none)/.test(el.className)){this._zoom(el);}if(!el.hasClass('nopopup')){var title=el.title||'';if(title&&/(\[.*\])/.test(title)){p=this._params(title);$(el).setProperty('rel',title+';group['+el.rel+']');$(el).setProperty('title',p.title||'');}this.popups.push(el);$(el).addEvent('click',function(e){e=new Event(e);e.stop();return this._start(el);}.bind(this))}}.bind(this));var theme=this.options.popup.theme=='custom'?this.options.popup.themecustom:this.options.popup.theme;new Ajax(this.site+this.options.popup.themepath+'/'+theme+'/theme.html',{method:'get',onComplete:function(data){var re=/<!-- THEME START -->([\s\S]*?)<!-- THEME END -->/;if(re.test(data)){data=re.exec(data)[1];}this.theme=data;}.bind(this)}).request();this.scrollbarWidth=this._getScrollbarWidth();},_getScrollbarWidth:function(){var inner=new Element('div').setStyles({width:'100%',height:200,border:0,margin:0,padding:0});var outer=new Element('div').setStyles({position:'absolute',visibility:'hidden',width:200,height:200,border:0,margin:0,padding:0,overflow:'hidden'}).injectInside(document.body).adopt(inner);var w1=parseInt(inner.offsetWidth);outer.style.overflow='scroll';var w2=parseInt(inner.offsetWidth);if(w1==w2){w2=parseInt(outer.clientWidth);}outer.remove();return(w1-w2);},_cleanEvent:function(s){return s.replace(/^function\s+anonymous\(\)\s+\{\s+(.*)\s+\}$/,'$1');},_params:function(s){var p={},x=s.split(/;/g)||s.split(/\&/g);x.each(function(n){v=n.match(/^(.+)\[(.*)\]$|^(.+)=(.*)$|^(.+):(.*)$/);if(v){if(!/[^0-9]/.test(v[2])){v[2]=parseInt(v[2]);}p[v[1]]=v[2];}}.bind(this));return p;},_png:function(el){var s;if(el.nodeName=='IMG'){s=el.src;if(/\.png$/i.test(s)){$(el).setProperty('src',this.site+'plugins/system/jceutilities/img/blank.gif').setStyle('filter','progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\''+s+'\'');}}else{s=$(el).getStyle('background-image');if(/\.png/i.test(s)){var bg=/url\("(.*)"\)/.exec(s)[1];$(el).setStyles({'background-image':'none','filter':"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+bg+"')"});}}},_zoom:function(el){var s,m,x,y;var child=$E('img',el);var zoom=new Element('span');if(child){var w=$(child).getProperty('width')||$(child).getStyle('width')||0;var h=$(child).getProperty('height')||$(child).getStyle('height')||0;var align=$(child).getProperty('align');var vspace=$(child).getProperty('vspace');var hspace=$(child).getProperty('hspace');var styles={width:parseInt(w),height:parseInt(h)};if(align){$extend(styles,{'float':/left|right/.test(align)?align:'','text-align':/top|middle|bottom/.test(align)?align:''});}if(vspace){$extend(styles,{'margin-top':vspace+'px','margin-bottom':vspace+'px'});}if(hspace){$extend(styles,{'margin-left':hspace+'px','margin-right':hspace+'px'});}function _buildIcon(el,zoom,child,styles){var lft,top,w=styles.width,h=styles.height;var span=new Element('span').setStyles($(child).style.cssText).setStyles(styles).adopt(child).adopt(zoom);$each(['style','align','border','hspace','vspace'],function(s){child.removeProperty(s);});if(parseInt(span.getStyle('border-width'))==0)child.setStyle('border',0);m=el.className.match(/icon-(top-right|top-left|bottom-right|bottom-left|left|right)/)||['icon-right','right'];switch(m[1]){case'top-right':lft=w-20;top=-h;break;case'top-left':lft=0;top=-h;break;default:case'right':case'bottom-right':lft=w-20;top=-20;break;case'left':case'bottom-left':lft=0;top=-20;break;}$(zoom).setStyles({'margin-left':lft,'margin-top':top}).addClass('zoom-image');el.adopt(span);}if(/^(0|auto)/.test(w)||/^(0|auto)/.test(h)){x=new Image();x.src=$(child).src;x.onload=function(){$extend(styles,{width:parseInt(x.width),height:parseInt(x.height)});_buildIcon(el,zoom,child,styles);}}else{_buildIcon(el,zoom,child,styles);}}else{$(zoom).addClass('zoom-link');if(/icon-left/.test(el.className)){$(zoom).injectTop(el);}else{$(zoom).injectInside(el);}}if(window.ie6){s=$(zoom).getStyle('background-image');if(s&&/\.png/i.test(s)){s=/url\("(.+)"\)/.exec(s)[1];$(zoom).setStyle('background-image','none');$(zoom).setStyle('filter',"progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+s+"')");}}else{$(zoom).setStyle('position','relative');}},open:function(s,t,d){var link={};if(typeof s=='string'){link={'href':s,'title':t||'','type':d||''};}return this._start(link);},_group:function(s){var p;if(/(\[.*\])/.test(s)){p=this._params(s);return p.group||'';}else{return s;}},_styles:function(o){var v,s,x=[];if(!o)return{};o.split(';').each(function(s){s=s.replace(/(.*):(.*)/,function(a,b,c){return"'"+b+"':'"+c+"'";});x.push(s);});return Json.evaluate('{'+x.join(',')+'}');},_build:function(){var t=this;this.page=new Element('div',{id:'jcepopup-page'}).injectInside(document.body);if(this.options.popup.overlay==1){this.overlay=new Element('div',{'id':'jcepopup-overlay',styles:{opacity:'0','background-color':this.options.popup.overlaycolor},events:{click:function(){this.close();}.bind(this)}}).injectInside(this.page);}this.frame=new Element('div',{id:'jcepopup-frame'}).injectInside(this.page);if(window.ie6){$(this.overlay).setStyle('height',window.getScrollHeight());$(this.page).setStyle('position','absolute').setStyle('top',window.getScrollTop());}if(!this.theme){this.theme='<div id="jcepopup-container">';this.theme+='<div id="jcepopup-loader"></div>';this.theme+='<div id="jcepopup-content"></div>';this.theme+='<a id="jcepopup-closelink" href="javascript:;" title="Close"></a>';this.theme+='<div id="jcepopup-info">';this.theme+='<div id="jcepopup-caption"></div>';this.theme+='<div id="jcepopup-nav">';this.theme+='<a id="jcepopup-prev" href="javascript:;" title="Previous"></a>';this.theme+='<a id="jcepopup-next" href="javascript:;" title="Next"></a>';this.theme+='<span id="jcepopup-numbers"></span>';this.theme+='</div>';this.theme+='</div>';this.theme+='</div>';}this.theme=this.theme.replace(/<!--(.*?)-->/g,'');$(this.frame).adopt(new Element('div',{id:'jcepopup-body'}).setHTML(this.theme));['body','container','content','loader','closelink','cancellink','info-top','info-bottom','caption','next','prev','numbers'].each(function(s){if($('jcepopup-'+s))t[s]=$('jcepopup-'+s).setStyle('display','none');});if(this.closelink){$(this.closelink).addEvent('click',function(){this.close();}.bind(this));}if(this.cancellink){$(this.cancellink).addEvent('click',function(){this.close();}.bind(this));}if(this.next){$(this.next).addEvent('click',function(){this._next();}.bind(this));}if(this.prev){$(this.prev).addEvent('click',function(){this._previous();}.bind(this));}if(window.ie6){this._png(this.body);$ES('*',this.body).each(function(el){if(el.id=='jcepopup-content')return;this._png(el);}.bind(this));}},_start:function(link){var t=this,n=0,items=[];this._build();if(link.nodeName=='undefined'){items.push(link);}else if(link.nodeName=='AREA'||/(^[\[\]]+)|group\[.+\]|\w+/.test(link.rel)){if(/nogroup/.test(link.className)){items.push(link);}else{if(link.nodeName=='AREA'){$(link).parent('map').children('area').each(function(i,el){items.push(el);if(el.href==link.href){n=i;}});}else{var i=0;this.popups.each(function(el){if(el.rel){if(t._group(el.rel)==t._group(link.rel)){items.push(el);if(el.href==link.href){n=i;}i++;}}});}}}else{items.push(link);}return this._open(items,n);},_open:function(items,n){var t=this;this.items=items;this._bind(true);$(this.body).setStyle('display','').setStyle('top',(window.getHeight()-this._outerHeight(this.body))/2);if(this.options.popup.overlay==1&&$(this.overlay)){new Fx.Style(this.overlay,'opacity',{duration:this.options.popup.fadespeed}).start(0,this.options.popup.overlayopacity);}return this._change(n);},_bind:function(open){var t=this;if(window.ie6){$ES('select').each(function(el){if(open){el.tmpStyle=el.style.visibility;}el.setStyle('visibility',open?'hidden':el.tmpStyle);}.bind(this));}if(this.options.popup.hideobjects){$ES('object,embed').each(function(el){if(el.id=='jcepopup-object')return;if(open){el.tmpStyle=el.style.visibility;}el.style.visibility=open?'hidden':el.tmpStyle;}.bind(this));}if(open){$(document).addEvent('keydown',function(e){e=new Event(e);this._listener(e);}.bind(this));if(window.ie6){window.addEvent('scroll',function(){$(this.overlay).setStyle('height',window.getScrollHeight());}.bind(this));window.addEvent('resize',function(){$(this.overlay).setStyle('width',window.getScrollWidth());}.bind(this));}}else{if(window.ie6){window.removeEvent('scroll');window.removeEvent('resize');}$(document).removeEvent('keydown');}},_listener:function(e){switch(e.code){case 27:case 88:case 67:this.close();break;case 37:case 80:this._previous();break;case 39:case 78:this._next();break;}},_media:function(c){var ci,cb,mt;switch(c){case'director':case'application/x-director':ci='166b1bca-3f9c-11cf-8075-444553540000';cb='http://download.macromedia.com/pub/shockwave/cabs/director/sw.cab#version=8,5,1,0';mt='application/x-director';break;case'windowsmedia':case'mplayer':case'application/x-mplayer2':ci='6bf52a52-394a-11d3-b153-00c04f79faa6';cb='http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=5,1,52,701';mt='application/x-mplayer2';break;case'quicktime':case'video/quicktime':ci='02bf25d5-8c17-4b23-bc80-d3488abddc6b';cb='http://www.apple.com/qtactivex/qtplugin.cab#version=6,0,2,0';mt='video/quicktime';break;case'real':case'realaudio':case'audio/x-pn-realaudio-plugin':ci='cfcdaa03-8be4-11cf-b84b-0020afbbccfa';cb='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0';mt='audio/x-pn-realaudio-plugin';break;case'divx':case'video/divx':ci='67dabfbf-d0ab-41fa-9c46-cc0f21721616';cb='http://go.divx.com/plugin/DivXBrowserPlugin.cab';mt='video/divx';break;default:case'flash':case'application/x-shockwave-flash':ci='d27cdb6e-ae6d-11cf-96b8-444553540000';cb='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,124,0';mt='application/x-shockwave-flash';break;}return{'classid':ci,'codebase':cb,'mediatype':mt};},_local:function(s){return(!/:\/\//.test(this.active.src)||this.active.src.indexOf(this.site)!=-1);},_outerWidth:function(n){var i,x=0;['padding-left','padding-right','border-left','border-right','width'].each(function(s){i=parseInt($(n).getStyle(s));i=/[^0-9]/.test(i)?0:i;x=x+i;});return x;},_outerHeight:function(n){var i,x=0;['padding-top','padding-bottom','border-top','border-bottom','height'].each(function(s){i=parseInt($(n).getStyle(s));i=/[^0-9]/.test(i)?0:i;x=x+i;});return x;},_frameWidth:function(){var w=0;['left','right'].each(function(s){w=w+parseInt($(this.frame).getStyle('padding-'+s));}.bind(this));return parseInt($(this.frame).clientWidth)-w;},_frameHeight:function(){var h=0;['top','bottom'].each(function(s){h=h+parseInt($(this.frame).getStyle('padding-'+s));}.bind(this));h=h+(window.ie6?this.scrollbarWidth:0);return parseInt(window.getHeight())-h;},_width:function(){return this._frameWidth()-this.scrollbarWidth;},_height:function(){var h=0;['top','bottom'].each(function(s){if(this['info-'+s]){h=h+parseInt(this._outerHeight(this['info-'+s]));}}.bind(this));return this._frameHeight()-(h+this.scrollbarWidth);},_next:function(){if(this.items.length==1)return false;var n=this.index+1;if(n<0||n>=this.items.length){return false;}return this._queue(n);},_previous:function(){if(this.items.length==1)return false;var n=this.index-1;if(n<0||n>=this.items.length){return false;}return this._queue(n);},_queue:function(n){var fs=this.options.popup.fadespeed,ss=this.options.popup.scalespeed;var t=this;var changed=false;['top','bottom'].each(function(s){var el=$(this['info-'+s]);if(el){var h=this._outerHeight(el);var m=s=='top'?'bottom':'top';el.setStyle('z-index',-1);new Fx.Style(el,m,{duration:ss,onComplete:function(){if(!changed){changed=true;return this._change(n);}}.bind(this)}).start(-h);}}.bind(this));},_info:function(){if(this.caption){var title=this.active.title||'',caption='';if(/:\/\//.test(title)){title='<a href="'+title+'" target="_blank">'+title+'</a>';}caption='<p>'+title+'</p>';if(/::/.test(title)){var parts=title.split('::');caption='<h4>'+parts[0]+'</h4>';if(parts[1]){caption+='<p>'+parts[1]+'</p>';}}$(this.caption).setHTML(caption).setStyle('display','');}var html='',i,len=this.items.length;if(len>1){for(i=0;i<len;i++){var n=i+1;html+='<a href="javascript:;"';if(this.index==i){html+=' class="active"';}html+='>'+n+'</a>';}if(this.prev){if(this.index>0){$(this.prev).setStyle('display','');}else{$(this.prev).setStyle('display','none');}}if(this.next){if(this.index<len-1){$(this.next).setStyle('display','');}else{$(this.next).setStyle('display','none');}}}if(this.numbers){$(this.numbers).setHTML(html).getChildren().each(function(el){if(el.nodeName=='A'){if(!$(el).hasClass('active')){$(el).addEvent('click',function(){this._queue(parseInt($(el).getText())-1);}.bind(this));}$(el).setStyle('display','');}}.bind(this));$(this.numbers).setStyle('display','');}['top','bottom'].each(function(s){if(this['info-'+s]){$(this['info-'+s]).setStyles({'display':'','visibility':'hidden'});}}.bind(this));if(this.closelink){$(this.closelink).setStyle('display','');}},_change:function(n){var t=this,p={},s,i,w,h;if(n<0||n>=this.items.length){return false;}this.index=n;this.active={};$(this.container).setStyle('display','');if(this.loader){$(this.loader).setStyle('display','');}if(this.cancellink){$(this.cancellink).setStyle('display','');}if(this.object){this.object=null;}$(this.content).empty();i=this.items[n];function getParams(t,i){if(i.rel&&/(\[.*\])/.test(i.rel)){return t._params(i.rel);}else if(i.title&&/(\[.*\])/.test(i.title)){return t._params(i.title);}else{s=i.href;if(/\?/.test(s)){s=s.replace(/^[^\?]+\??/,'').replace(/&amp;/gi,'&');}return t._params(s);}}p=getParams(this,i);$extend(this.active,{'src':i.href,'title':p.title||i.title||'','type':i.type||i.className||'','params':p,'width':p.width||0,'height':p.height||0});this._info();if(/(youtube|videoplay|googleplayer|metacafe|vimeo|\.swf)/i.test(this.active.src)){this.active.type='flash';}if(/\.(jpg|jpeg|png|gif|bmp|tif)$/i.test(this.active.src)){this.active.type='image';this.img=new Image();this.img.onload=function(){return t._setup();};this.img.src=this.active.src;}else if(/(flash|director|shockwave|mplayer|windowsmedia|quicktime|realaudio|real|divx)/i.test(this.active.type)){p.src=this.active.src;var base=/:\/\//.test(p.src)?'':this.site;this.object='';w=this._width();h=this._height();if(/youtube(.+)\/(watch\?v=|v\/)(.+)/.test(p.src)){p.src=p.src.replace(/watch\?v=/,'v/');w=this.active.width||425;h=this.active.height||344;}if(/google(.+)\/(videoplay|googleplayer\.swf)\?docid=(.+)/.test(p.src)){p.src=p.src.replace(/videoplay/,'googleplayer.swf');w=this.active.width||425;h=this.active.height||326;}if(/metacafe(.+)\/(watch|fplayer)\/(.+)/.test(p.src)){var s=p.src.trim();if(!/\.swf/i.test(s)){if(s.charAt(s.length-1)=='/'){s=s.substring(0,s.length-1);}s=s+'.swf';}p.src=s.replace(/watch/i,'fplayer');w=this.active.width||400;h=this.active.height||345;}if(/vimeo.com\/([0-9]+)/.test(p.src)){p.src=p.src.replace(/vimeo.com\/([0-9]+?)/,'vimeo.com/moogaloop.swf?clip_id=$1');w=this.active.width||400;h=this.active.height||300;}var mt=this._media(this.active.type);if(this.active.type=='flash'){p.wmode='transparent';p.base=base;}if(/(mplayer|windowsmedia)/i.test(this.active.type)){p.baseurl=base;if(window.ie){p.url=p.src;delete p.src;}}delete p.title;delete p.group;p.width=this.active.width=p.width||w;p.height=this.active.height=p.height||h;this.object='<object id="jcepopup-object" ';if(/flash/i.test(this.active.type)){this.object+='type="'+mt.mediatype+'" data="'+p.src+'" ';}else{this.object+='codebase="'+mt.codebase+'" classid="clsid:'+mt.classid+'" ';}for(n in p){if(p[n]!==''){if(/(id|name|width|height|style)$/.test(n)){t.object+=n+'="'+p[n]+'"';}}}this.object+='>';for(n in p){if(p[n]!==''){if(!/(id|name|width|height|style)$/.test(n)){t.object+='<param name="'+n+'" value="'+p[n]+'">';}}}if(!window.ie&&!/flash/i.test(this.active.type)){this.object+='<object type="'+mt.mediatype+'" data="'+p.src+'" ';for(n in p){if(p[n]!==''){t.object+=n+'="'+p[n]+'"';}}this.object+='></object>';}this.object+='</object>';this.active.type='media';this._setup();}else{p=getParams(this,i);this.active.title=p.title;this.active.src=this.active.src.replace(/(&|\?)(width|height|bw|bh)=[0-9]+/gi,'');this.active.width=parseInt(p.bw)||parseInt(p.width)||this._width();this.active.height=parseInt(p.bh)||parseInt(p.height)||this._height();var local=false;if(this._local(this.active.src)){if(!/tmpl=component/i.test(this.active.src)){this.active.src+=/\?/.test(this.active.src)?'&tmpl=component':'?tmpl=component';}local=true;}if((this.active.type=='ajax'||/text\/(xml|html|htm)/i.test(this.active.type)&&local)){this.active.type='ajax';this.ajax=new Element('div',{id:'jcepopup-ajax',styles:$merge(this._styles(p.styles),{display:'none'})}).injectInside($(this.content));new Ajax(this.active.src,{onComplete:function(data){var html=data,re=/<body[^>]*>([\s\S]*?)<\/body>/;if(re.test(data)){html=re.exec(data)[1];}this.ajax.innerHTML=html;if(this.loader){$(this.loader).setStyle('display','none');}$ES('a',$(this.content)).each(function(el){el.addEvent('click',function(){if(el.href&&el.href.indexOf('#')==-1){this.close();}}.bind(this))}.bind(this));return this._setup();}.bind(this)}).request();}else{this.active.type='iframe';this._setup();}}return false;},_setup:function(){var t=this,w,h;if(this.active.type=='image'){w=this.active.width||this.img.width;h=this.active.height||this.img.height;if(this.options.popup.resize==1){var x=this._width();var y=this._height();if(w>x){h=h*(x/w);w=x;if(h>y){w=w*(y/h);h=y;}}else if(h>y){w=w*(y/h);h=y;if(w>x){h=h*(x/w);w=x;}}}w=Math.round(w);h=Math.round(h);$(this.content).setStyles({display:'none',width:w,height:h}).setHTML('<img src="'+this.active.src+'" title="'+this.active.title+'" width="'+w+'" height="'+h+'" />');}else{$(this.content).setStyles({width:this.active.width,height:this.active.height,display:'none'});}return this._animate();},_animate:function(){var t=this,ss=this.options.popup.scalespeed,fs=this.options.popup.fadespeed;var cw=this._outerWidth(this.content);var ch=this._outerHeight(this.content);var ih=0;['top','bottom'].each(function(s){if(this['info-'+s]){ih=ih+this._outerHeight(this['info-'+s]);}}.bind(this));new Fx.Styles(this.body,{duration:ss,onComplete:function(){$(this.content).setStyles({'display':'','opacity':0});if(this.active.type=='ajax'){$(this.ajax).setStyle('display','');}['top','bottom'].each(function(s){var el=$(this['info-'+s]);if(el){var h=this._outerHeight(el);var m=s=='top'?'bottom':'top';el.setStyle('z-index',-1);el.setStyle(m,-h);el.setStyle('visibility','visible');new Fx.Style(el,m,{duration:ss,onComplete:function(){el.setStyle('z-index',0);}.bind(this)}).start(0);}}.bind(this));new Fx.Style(this.content,'opacity',{duration:fs,onComplete:function(){if(this.loader){$(this.loader).setStyle('display','none');}if(this.active.type=='media'&&this.object){$(this.content).setHTML(this.object);}$(this.content).setStyle('display','');if(this.active.type=='iframe'){new Element('iframe',{id:'jcepopup-iframe',frameBorder:0,scrolling:this.active.params.scrolling||'auto',allowTransparency:true,styles:{width:this.active.width,height:this.active.height}}).injectInside($(this.content)).setProperty('src',this.active.src);}}.bind(this)}).start(0,1);}.bind(this)}).start({height:ch,top:(this._frameHeight()/2)-((ch+ih)/2),width:cw});},close:function(){['img','object','iframe','ajax'].each(function(o){this[o]=null;});if(this.closelink){$(this.closelink).setStyle('display','none');}$(this.content).empty();['top','bottom'].each(function(s){if(this['info-'+s]){$(this['info-'+s]).setStyle('display','none');}}.bind(this));$(this.page).remove();if(this.overlay){if(window.ie6){this._bind();$(this.overlay).remove();}else{new Fx.Style(this.overlay,'opacity',{duration:this.options.popup.fadespeed,onComplete:function(){this._bind();$(this.overlay).remove();}.bind(this)}).start(this.options.popup.overlayopacity,0);}}this.options.popup.onclose.call(this);return false;}});JCEUtilities.implement(new Options,new Events);