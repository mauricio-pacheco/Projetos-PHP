<?php
$idpuxado = $_GET['idpuxado'];
include('JSON.php');
include('funcoes_red.php');
$result = array();


function removerCaracter($string){  
$newstring = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));return $newstring;  
}  



if (isset($_FILES['photoupload']) )
{	$file = $_FILES['photoupload']['tmp_name'];
	$error = false;
	$size = @getimagesize($file);
	$extensao = strtolower(end(explode('.', $_FILES['photoupload']['name']))); 
	
	// Aqui voce pode escolher as extensões que vão no upload no caso aqui txt doc docx html htm zip rar ou pdf
	$_UP['extensoes'] = array('txt', 'doc', 'docx', 'pdf','htm', 'html', 'zip', 'rar', 'cdr', 'psd', 'jpg', 'png', 'gif'); 
	
	if (!is_uploaded_file($file) || ($_FILES['photoupload']['size'] > 100 * 1024 * 1024) )
	{
	  echo "Faça upload de arquivos menores que 100Mb!!!";
	  $error = 'Faça upload de arquivos menores que 100Mb!!!';
	} else if (array_search($extensao, $_UP['extensoes']) === false) { 
         echo "Por favor, envie livros com as seguintes extensões: txt, doc, docx<br>Podem ser zipados em zip ou rar"; 
		 $error = 'Por favor, envie livros com as seguintes extensões: txt, doc, docx<br>Podem ser zipados em zip ou rar<br>';
     }
	
	else {
	 
	    		
		$tmp_name = $_FILES['photoupload']['tmp_name'];
				$aux_tipo_imagem = $size['mime'];
			//// Definicao de Diretorios /cloque aqui o diretório que vc quer que vá no caso upload/txt 
            $diretorio = "../ups/arquivos/";
            
			move_uploaded_file($_FILES['photoupload']['tmp_name'], '../ups/arquivos/'.removerCaracter($_FILES['photoupload']['name']));
			$nomefoto = $_FILES['photoupload']['name'];
			$nomefoto = removerCaracter($nomefoto);
		// chmod('upload/txt'.$_FILES['photoupload']['name'], 0777);
		


include "../conexao.php";
$data = date ("j/m/Y");
$hora = date ("H:i:s");
$sql = "INSERT INTO cw_anexosarquivos (arquivo, idcliente, data, hora) VALUES ('$nomefoto', '$idpuxado', '$data', '$hora')";


mysql_query($sql);


			//// certifique que seu diretório tenha permissao para escrita (chmod 0777)
			if(!file_exists($diretorio)) {
                mkdir($diretorio);
            }
                                   
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
		$result['size'] = "Upload feito com Sucesso !!!! Obrigado por nos enviar o arquivo!!<br>";
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