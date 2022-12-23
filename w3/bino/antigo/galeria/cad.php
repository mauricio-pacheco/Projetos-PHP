<?
echo '<link href="estilo.css" rel="stylesheet" type="text/css">';
   if($acao == "gravar")

   {
   
   		$nomearquivo = date("YmdHis");
		$status = move_uploaded_file($file,"imagens"."/"."$nomearquivo.jpg");
				
		$fotos= "<?php\n";
		$fotos.="\$coment ='$coment_a';\n";			
		$fotos.="\$imagem ='imagens/$nomearquivo.jpg';\n";
		$fotos.="?>";

		$arquivo=date("Hisdm");

		$fp=fopen("arqs/$arquivo.php", "w");
		fputs($fp, $fotos);
		fclose($fp);
		
        die("
<p align=center>Sua Foto Foi Cadastrada com Sucesso !!!<br>
  <a href=cad.php>Voltar</a></p>
<p>"); } ?>
<body bgcolor="#ffffff" background="../imagens/bg_fundo.gif" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div align="center">
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
    <tr>
      <td height="40" align="center"><strong><font size="3" face="Verdana, Arial, Helvetica, sans-serif">Cadastro</font></strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><form method="post" action="cad.php?acao=gravar" enctype="multipart/form-data">
        <div align="center">
            <blockquote>
              <blockquote>
                <p align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Use
                  somente arquivos com formatos <font color="#CC0000"><strong><font color="#000000">JPG</font></strong></font><font color="#000000"> ou <strong>GIF de 640x480 PX</strong></font></font>.<br>
                  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">A descri&ccedil;&atilde;o ter&aacute; o m&aacute;ximo de 150 caracteres</font>.</p>
              </blockquote>
            </blockquote>
            <table width="90%" border="0" align="center" cellpadding="0" cellspacing="3">
              <tr>
                <td align="center" colspan="2"><div align="left"><font face="Verdana, Arial, Helvetica, sans-serif" size="1"> &nbsp;</font></div>                </td>
              </tr>
              <tr>
                <td width="146" align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Descri&ccedil;&atilde;o: </font></td>
                <td align="left">
                  <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
                  <input name="coment_a" id="sonho" size="80" maxlength="150" type="text">
                </font> </tr>
              <tr>
                <td align="right"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">Foto: </font></td>
                <td align="left">
                  <font face="Verdana, Arial, Helvetica, sans-serif" size="1">
                  <input type="File" name="file" size="30">
                </font> </tr>
              <tr align="left">
                <td colspan="2"> <font face="Verdana, Arial, Helvetica, sans-serif" size="1"><br>
                      <input type="Submit" name="salvar" value="Cadastrar">
                      <input type="Reset" name="limpar" value="Limpar">
                </font></td>
              </tr>
            </table>
        </div>
      </form></td>
    </tr>
    <tr>
      <td><p>&nbsp;</p></td>
    </tr>
  </table>
</div>
</body>
