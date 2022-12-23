<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML lang=pt-br xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" 
xmlns:web = "urn:schemas-microsoft-com/web"><HEAD><TITLE>Jornal Folha do Noroeste</TITLE>
<META http-equiv=X-UA-Compatible content=IE=7>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META 
content="Descrição" 
name=description>
<META 
content="Palavras, Chave" 
name=keywords>
<STYLE type=text/css>@import url( home_arquivos/gtl_sitegeneric.css );
@import url( home_arquivos/02.css );
@import url( home_arquivos/css.css );
@import url( home_arquivos/pollservice.css );
@import url( home_arquivos/flashdownlevelall.css );
@import url( home_arquivos/oneflash.css );
@import url( home_arquivos/ticker.css );
@import url( home_arquivos/channels.css );
@import url( home_arquivos/csstabmoney.css );
@import url( home_arquivos/theme02.css );
@import url( menu.css );
</STYLE>
<!--[if IE]>
<STYLE type=text/css>@import url( home_arquivos/ie.css );
@import url( home_arquivos/css_ie.css );
@import url( home_arquivos/mni_longhorizontal_ie.css );
</STYLE>
<![endif]--><!--[if IE 6]><style type="text/css">@import url("home_arquivos/ie6.css");@import url("home_arquivos/css_ie6.css");</style><![endif]--><!--[if lt IE 5.5000]><style type="text/css">@import url("home_arquivos/ie5.css");</style><![endif]--><!--[if !IE]>--><script type="text/javascript" src="home_arquivos/mozcompat.js"></script><!--<![endif]-->
<script language="JavaScript" type="text/javascript">
function horas(){
	var now = new Date();
	var hours = now.getHours();
	var minutes = now.getMinutes();
	var seconds = now.getSeconds()
	if (hours <=9)
hours="0"+hours;
	if (minutes<=9)
minutes="0"+minutes;
	if (seconds<=9)
seconds="0"+seconds;
	var cdate="Hora Certa: "+hours+":"+minutes+":"+seconds+" "+"Hs" 
	clock.innerHTML= cdate;
setTimeout("horas()",1000);
}
  </script>
<SCRIPT src="home_arquivos/core.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/report.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/jquery-1.3.2.min.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/navigation.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/dap.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/js.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/flashdownlevelall.js" type=text/javascript></SCRIPT>
<SCRIPT src="home_arquivos/oneflash.js" type=text/javascript></SCRIPT>
<SCRIPT type=text/javascript>/*<![CDATA[*/(function($){function isNumber(obj,min,max){return(typeof obj=="number")&&(isNumber(min)?obj>=min:true)&&(isNumber(max)?obj<=max:true)}
function isString(obj,minLength){return(typeof obj=="string")&&(isNumber(minLength)?obj.length>=minLength:true);}
var $isArray=$.isArray;var urlRegExp=/^((ht|f)tps?\:\/\/)((([a-z0-9\-]+\.)+[a-z]{2,4})|((\d{1,3}\.){3}\d{1,3})(:[0-9]+)?)(\/([a-z0-9\-_\.\?!~\*\'\(\);\/\?:@&=\+\$,%#])*|\/?)$/i;function getObjectWithNamespace(objName){var ns=objName.split('.'),o=window,i,len=ns.length;for(i=0;i<len;i++){o=o[ns[i]];if(o==null)
return null;}
return o;}
$.extend({isNumber:isNumber,isString:isString,isAbsoluteUrl:function(obj){return isString(obj)&&urlRegExp.test(obj);},isObject:function(obj){return(typeof obj=="object")&&(obj!==null);},isDefined:function(obj){return(typeof obj!="undefined");},isArray:function(obj,minLength){return $isArray(obj)&&(isNumber(minLength)?obj.length>=minLength:true);},getObjectWithNamespace:getObjectWithNamespace});})(jQuery);(function($){var defaults={timeout:250};var pending={};var pollList=[];var timerId;var $isString=$.isString;var $isFunction=$.isFunction;var w=window;function async(test,action,url){var canary;if($isString(test,1)&&(canary=(this[test])||$.getObjectWithNamespace(test))){if($isFunction(action)){action.apply(this);}
else if($isFunction(canary)){if($.isArray(action)){canary.apply(this,action);}
else if(!$.isDefined(action)){canary.apply(this);}}}
else if($isString(url)){var testQueue=pending[url];if(testQueue){testQueue.push(new testItem(test,action,this));}
else{pending[url]=[new testItem(test,action,this)];$.ajax({url:url,dataType:"script",cache:1,success:function(){testQueue=pending[url];for(var item,ndx=0;(item=testQueue[ndx]);++ndx){retryTest(item);}}});}}
else if($isString(test,1)){pollList.push(new testItem(test,action,this));if(!timerId){timerId=w.setTimeout(pollCallback,defaults.timeout);}}}
function pollCallback(){var list=pollList;pollList=[];for(var item,ndx=0;(item=list[ndx]);++ndx){retryTest(item);}
timerId=(pollList.length==0?0:w.setTimeout(pollCallback,defaults.timeout));}
function retryTest(item){async.call(item.callee,item.test,item.action);}
function testItem(test,action,callee){this.test=test;this.action=action;this.callee=callee;}
$.async=$.fn.async=w.async=async;$.async.defaults=defaults;})(jQuery);//]]></SCRIPT>
<SCRIPT type=text/javascript>
/*<![CDATA[*/jQuery.async(0,0,"home_arquivos/ticker.js");jQuery.async(0,0,"home_arquivos/js-async.js");//]]>
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</SCRIPT>
<META content="MSHTML 6.00.6001.18000" name=GENERATOR></HEAD>