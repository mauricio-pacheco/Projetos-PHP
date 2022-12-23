<style type="text/css">
a {
	font-size: 11px;
	font-color: #FFFFFF;
}
a:link {
	text-decoration: none;
	font-color: #FFFFFF;
}
a:visited {
	text-decoration: none;
	font-color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	font-color: #FFFFFF;
}
a:active {
	text-decoration: none;
	font-color: #FFFFFF;
}

</style>
<?php
$pasta = $_GET['pasta'];
include('JSON.php');
include('funcoes_red.php');


$result = array();

if (isset($_FILES['photoupload']) )
{	$file = $_FILES['photoupload']['tmp_name'];
	$error = false;
	$size = @getimagesize($file);
	$extensao = strtolower(end(explode('.', $_FILES['photoupload']['name']))); 
	
	// Aqui voce pode escolher as extensões que vão no upload no caso aqui txt doc docx html htm zip rar ou pdf
	$_UP['extensoes'] = array('txt', 'doc', 'docx', 'pdf','htm', 'html', 'zip', 'rar'); 
	
	if (!is_uploaded_file($file) || ($_FILES['photoupload']['size'] > 16 * 1024 * 1024) )
	{
	  echo "Faça upload de arquivos menores que 16Mb!!!";
	  $error = 'Faça upload de arquivos menores que 16Mb!!!';
	} else if (array_search($extensao, $_UP['extensoes']) === false) { 
         echo "Por favor, envie livros com as seguintes extensões: txt, doc, docx<br>Podem ser zipados em zip ou rar"; 
		 $error = 'Por favor, envie livros com as seguintes extensões: txt, doc, docx<br>Podem ser zipados em zip ou rar<br>';
     }
	
	else {
	 
	    		
		$tmp_name = $_FILES['photoupload']['tmp_name'];
		$aux_tipo_imagem = $size['mime'];
			//// Definicao de Diretorios /cloque aqui o diretório que vc quer que vá no caso upload/txt 
            $diretorio = "../ups/edicoes/$pasta/";
            
			move_uploaded_file($_FILES['photoupload']['tmp_name'], "../ups/edicoes/$pasta/".$_FILES['photoupload']['name']);
		chmod("../ups/edicoes/$pasta/".$_FILES['photoupload']['name'], 0777);

$nomedoarquivo = $_FILES['photoupload']['name'];

			//// certifique que seu diretório tenha permissao para escrita (chmod 0777)
			if(!file_exists($diretorio)) {
                mkdir($diretorio);
            }
			
echo "<font color=#ffffff>";			
$zip = zip_open("../ups/edicoes/$pasta/$nomedoarquivo");
if ($zip) {
  while ($zip_entry = zip_read($zip)) {
    $fp = fopen("../ups/edicoes/$pasta/".zip_entry_name($zip_entry), "w");
    if (zip_entry_open($zip, $zip_entry, "r")) {
      $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
      fwrite($fp,"$buf");
      zip_entry_close($zip_entry);
      fclose($fp);
    }
	   }
  zip_close($zip);
}

unlink("../ups/edicoes/$pasta/$nomedoarquivo"); 
echo "</font>";				
			
                                   
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