<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<br /><script>

function checkText(e, text){
    try{var element = e.target          }catch(er){};
    try{var element = event.srcElement  }catch(er){};
    
    document.getElementById(text).disabled = !element.checked;
}

                                </script><img src=caixote.gif>&nbsp;
<span class="tahoma10preto"><strong>BELLINO</strong> - Ração para filhotes de cães em fase inicial.</span>
<table width="100%" border="0"><tr>
<td width="9%"><input type="checkbox" name="racao"  value="BELLINO - Ração para filhotes de cães em fase inicial. ( 1 Kg )" id="check" onClick="checkText(event, 'campo')" />
<span class="tahoma10preto">1Kg</span></td><td width="60%"><span class="tahoma10preto">Quantidade:</span>
<strong><span class="tahoma10preto"><input class="formularioDir" id="campo" value="1"  size="6" name="quantidade" disabled/>
</span></strong></td>
</tr></table><br /><img src=caixote.gif>&nbsp;
<span class="tahoma10preto"><strong>BELLINO</strong> - Ração para cães adultos.</span>
<table width="100%" border="0"><tr>
<td width="9%"><input type="checkbox" name="racao2" value="BELLINO - Ração para cães adultos. ( 8 Kg )" id="check" onClick="checkText(event, 'campo2')" />
<span class="tahoma10preto">8Kg</span></td>
<td width="60%"><span class="tahoma10preto">Quantidade:</span><strong><span class="tahoma10preto">
<input class="formularioDir"  size="6" name="quantidade2" value="1" id="campo2" disabled/></span></strong></td></tr>
<tr><td><input type="checkbox" name="racao3" value="BELLINO - Ração para cães adultos. ( 25 Kg )" id="check" onClick="checkText(event, 'campo3')" />
<span class="tahoma10preto">25Kg</span></td><td><span class="tahoma10preto">Quantidade:</span><strong><span class="tahoma10preto">
<input class="formularioDir"  size="6" name="quantidade3" value="1" id="campo3" disabled/></span></strong></td></tr></table><br />
</body>
</html>
