<?php require("verifica.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7"/> 
<LINK rel="stylesheet" type="text/css" href="classes/estilos.css">
<title>Módulo Administrativo</title>
<SCRIPT language=JavaScript>
var MS=navigator.appVersion.indexOf("MSIE")
window.isIE4 =(MS>0) && ((parseInt(navigator.appVersion.substring(MS+5,MS+6)) >= 4) && (navigator.appVersion.indexOf("MSIE"))>0)
function checkExpand() {
    if (""!=event.srcElement.id) {
      var ch = event.srcElement.id + "Child"
      var el = document.all[ch] 
      if (null!=el) el.style.display = "none" == el.style.display ? "" : "none"
      event.returnValue=false
    }
  }
</SCRIPT>
</head>

<body onclick='checkExpand()' topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0">