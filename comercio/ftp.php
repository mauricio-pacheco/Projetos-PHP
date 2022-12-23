<?
//////////////////////////////////////////////////////////////////////////////////////
// Arquivo: ftp.php
// Adaptado para  usar as variaveis Superglobals $_FILES
// Requerido php versao 4.1.0 ou superior.
// No PHP anterior a versao 4.1.0, use $HTTP_POST_FILES ao invés de $_FILES.
// Em 17/09/2003 by Lyma
//////////////////////////////////////////////////////////////////////////////////////

include "$path_local";
echo ('Conectando ');
echo ("<img src=\"$base[url]/imagens/progresso.gif\" alt=\"Carregando\"><br>");
echo str_repeat(" ", 256);
flush();

$arquivo_icones="$ftp[icones]/$n_arquivo";
$arquivo_imagem="$ftp[imagens]/$n_arquivo";

switch($upload)
{
	case "icone":
		if ($remove_ftp)
		{
			$s=unlink("$arquivo_icones");
			if($s){
			echo "icone apagado com sucesso";}
		}
		if (is_uploaded_file( $_FILES['icone_form']['tmp_name'])) {
		    $t=copy($_FILES['icone_form']['tmp_name'], $arquivo_icones);
			if($t){
                echo "icone colocado com sucesso";
   			   } else {
                echo "Falha na copia do arquivo, verifique permissoes de pastas/arquivos";
             }

         break;
	
		} else {
		    echo "Possivel ataque de upload. Arquivo: " . $_FILES['icone_form']['name'];
		}

       
	   
	case "tumbnail":
	   if ($remove_ftp)
		{
			$u=unlink("$arquivo_imagem");
			if($u){
			echo "imagem apagada com sucesso";}
		}
		if (is_uploaded_file($_FILES['arquivo_form']['tmp_name'])) {
		    $v=copy($_FILES['arquivo_form']['tmp_name'], $arquivo_imagem);
			if($v){
			   echo "Imagem colocado com sucesso";
		   } else {
               echo "Falha na copia do arquivo, verifique permissoes de pastas/arquivos";
           }
			break;
	
		} else {
		    echo "Possivel ataque de upload. Arquivo: " . $_FILES['arquivo_form']['name'];
		}
	
	case "deletar":
		if ($remove_ftp)
		{
			unlink("$remove_ftp");
		}
	break;
}
?>
