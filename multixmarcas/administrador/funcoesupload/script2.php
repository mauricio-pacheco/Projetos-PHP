<?php
$idpuxado = $_GET['id'];
include('JSON.php');
include('funcoes_red.php');
$result = array();
if (isset($_FILES['photoupload']) )
{	
$file = $_FILES['photoupload']['tmp_name'];
	$error = false;
	$size = false;
	if (!is_uploaded_file($file) || ($_FILES['photoupload']['size'] > 10 * 1024 * 1024) )
	{
		$error = 'Fa&ccedil;a upload de arquivos menores que 2Mb!!! ';
	}
	elseif (!$error && !($size = @getimagesize($file) ) )
	{
		$error = 'Fa&ccedil;a o upload apenas de imagens, outros arquivos n&atilde;o s&atilde;o suportados.';
	}
	elseif (!$error && ($size[0] < 25) || ($size[1] < 25))
	{
		$error = 'Fa&ccedil;a o upload de uma imagem maior que 25px.';
	}
	else {

		/* move_uploaded_file($_FILES['photoupload']['tmp_name'], 'upload/'.$_FILES['photoupload']['name']);
		chmod('upload/'.$_FILES['photoupload']['name'], 0777); */

		$tmp_name = $_FILES['photoupload']['tmp_name'];
		$aux_tipo_imagem = $size['mime'];
			//// Definicao de Diretorios / 
            $diretorio = "../ups/fotosgaleria/";
            $diretorio_g = "../ups/fotosgaleria/g/";
            $diretorio_p = "../ups/fotosgaleria/p/";
            ///// certifique que seu diretório tenha permissao para escrita (chmod 0777)
			if(!file_exists($diretorio)) {
                mkdir($diretorio);
            }
            if(!file_exists($diretorio_g)) {
                mkdir($diretorio_g);
            }
            if(!file_exists($diretorio_p)) {
                mkdir($diretorio_p);
            }
            
				// declarar as variaveis para as fotos
				// foto grande
					$ft_nome = "imagem_".date('dmy').time()."";
					$ft_nome2 = "imagem_".date('dmy').time().".jpg";
					$larg_ft = 700;
					$altu_ft = 525;
				// foto minuatura
					$tb_nome = "thumb_".date('dmy').time()."";	
					$tb_nome2 = "thumb_".date('dmy').time().".jpg";	
					$larg_tb = 160;
					$altu_tb = 120;
				
            if ($aux_tipo_imagem == "image/jpeg") {				
				$nome_foto  = "$ft_nome.jpg";
				$nome_thumb = "$tb_nome.jpg";
                reduz_imagem_jpg($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_jpg($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }         
            if ($aux_tipo_imagem == "image/gif") {
                $nome_foto  = "$ft_nome.gif";
                $nome_thumb = "$tb_nome.gif";
                reduz_imagem_gif($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_gif($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }
            if ($aux_tipo_imagem == "image/png") {
                $nome_foto  = "$ft_nome.png";
                $nome_thumb = "$tb_nome.png";
                reduz_imagem_png($tmp_name, $larg_ft , $altu_ft , $diretorio_g.$nome_foto);
                reduz_imagem_png($tmp_name, $larg_tb , $altu_tb , $diretorio_p.$nome_thumb);
            }
			// fim do redimensionamento e criacao das miniaturas ... 
	}
	$addr = gethostbyaddr($_SERVER['REMOTE_ADDR']);
 	$log = fopen('script.log', 'a');
	fputs($log, ($error ? 'FAILED' : 'SUCCESS') . ' - ' . preg_replace('/^[^.]+/', '***', $addr) . ": {$_FILES['photoupload']['name']} - {$_FILES['photoupload']['size']} byte\n" );
		fclose($log);
 
	if ($error)
	{
		$result['result'] = 'failed';
		$result['error'] = $error;
	}
	else
	{

		$result['result'] = 'success';
		$result['size'] = "IMAGEM ENVIADA COM SUCESSO!!!";
		include "../conexao.php";
		$sql = "INSERT INTO cw_fotos (foto, fotomenor, idgaleria) VALUES ('$ft_nome2','$tb_nome2','$idpuxado')";
		mysql_query($sql);
	}
 
}
else
{
	$result['result'] = 'error';
	$result['error'] = 'Arquivo ausente ou erro interno!';
}
 
if (!headers_sent() )
{
	header('Content-type: application/json');
}
 
echo json_encode($result);

?>