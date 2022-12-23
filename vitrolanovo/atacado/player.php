<!--
<FORM action="http://vitrolars.com.br/atacado/musicas/<? print $ArquivoMusica; ?>" method=POST id=form1 name=form1 target="_top">
</FORM>

<SCRIPT LANGUAGE=javascript>
	window.document.form1.submit();		
	setTimeout('self.close()',100);
</SCRIPT>-->
<script language="JavaScript">
location.href="<? print $ArquivoMusica;?>";
setTimeout('self.close()',100);
</script>

