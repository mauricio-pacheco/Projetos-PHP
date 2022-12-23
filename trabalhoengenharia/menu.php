<style type="text/css">
<!--
.style1 {
	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
 <style type="text/css">
* html img/**/ {
filter:expression(
  this.alphaxLoaded ? "" :
  (
    this.src.substr(this.src.length-4)==".png"
    ?
    (
    (!this.complete)
    ? "" :
      this.runtimeStyle.filter=
      ("progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+this.src+"')")+
      (this.onbeforeprint="this.runtimeStyle.filter='';this.src='"+this.src+"'").substr(0,0)+
      String(this.alphaxLoaded=true).substr(0,0)+
      (this.src="blank.gif").substr(0,0)
    )
    :
    this.runtimeStyle.filter=""
  )
  );
}
</style>
 <p align="center"><a href="sair.php"><img src="sair.jpg" width="400" height="30" border="0" /></a></p>
<table width="720" border="0" align="center">
  <tr>
    <td width="20%"><div align="center"><a href="index.php"><img border="0" src="c1.png" width="58" height="61" /></a></div></td>
    <td width="20%"><div align="center"><a href="listar.php"><img border="0" src="c2.png" width="55" height="58" /></a></div></td>
    <td width="20%"><div align="center"><a href="clientes.php"><img border="0" src="c4.png" width="56" height="62" /></a></div></td>
    <td width="20%"><div align="center"><a href="listao.php"><img border="0" src="c3.png" width="56" height="56" /></a></div></td>
  </tr>
  <tr>
    <td width="20%"><div align="center"><span class="style1"><a href="index.php">Cadastrar Contribuinte</a></span></div></td>
    <td width="20%"><div align="center"><span class="style1"><a href="listar.php">Listar Contribuintes</a></span></div></td>
    <td width="20%"><div align="center"><span class="style1"><a href="clientes.php">Cadastrar Fornecedor</a></span></div></td>
    <td width="20%"><div align="center"><span class="style1"><a href="listao.php">Listar Fornecedores</a></span></div></td>
  </tr>
</table>
