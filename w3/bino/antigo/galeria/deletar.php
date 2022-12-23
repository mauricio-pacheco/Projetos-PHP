<link href="estilo.css" rel="stylesheet" type="text/css"> <?
include("arqs/$arquivo");
		
		$img = $imagem;
	
		unlink ("$img");		
		unlink ("arqs/$arquivo");

		     die("<p align=center>Apagado com Sucesso !!!<br> 
		 	 <a href=del_alt.php>Voltar</a></p>");
		
?>