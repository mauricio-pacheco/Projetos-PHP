<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
  <p align="center">
    <?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
//só para teste mas auterem essa parte para pegar os dados via post $_POST
$email     = "mandrymaster@bol.com.br";
$veiculo      = $_POST["veiculo"];  
$nome      = $_POST["nome"];  
$cidade    = $_POST["cidade"]; 
$estado    = $_POST["estado"]; 
$cep       = $_POST["cep"]; 
$telefone = $_POST["telefone"]; 
$celular = $_POST["celular"]; 
$email2     = $_POST["email2"]; 
$mensagem  = $_POST["mensagem"]; 

$anexos    = 0;
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens  = "--$boundary\n";    
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; 

$mens .= "<font face='verdana'>";
$mens .= "..:: FORMULÁRIO DE PEDIDO DO SITE DN Imports ::..";
$mens .= "<BR><BR>";
$mens .= "Nome do Veículo: ";
$mens .= "$veiculo";
$mens .= "<BR><BR>";
$mens .= "Nome: ";
$mens .= "$nome";
$mens .= "<br><br>";
$mens .= "Cidade: ";
$mens .= "$cidade";
$mens .= " - ";
$mens .= "$estado";
$mens .= "<br><br>";
$mens .= "CEP: ";
$mens .= "$cep";
$mens .= "<br><br>";
$mens .= "Telefone: ";
$mens .= "$telefone";
$mens .= "<br><br>";
$mens .= "Celular: ";
$mens .= "$celular";
$mens .= "<br><br>";
$mens .= "E-mail: ";
$mens .= "$email2";
$mens .= "<br>";
$mens .= "<br>";
$mens .= "Mensagem: ";
$mens .= "<br><br>";
$mens .= "$mensagem\n";
$mens .= "--$boundary\n";

for($i = 0; $i < count($_FILES["file"]["name"]); $i++)
{
    if(is_uploaded_file($_FILES["file"]["tmp_name"][$i])){
        $fp = fopen($_FILES["file"]["tmp_name"][$i], "rb");
        $anexo = chunk_split(base64_encode(fread($fp, $_FILES["file"]["size"][$i])));         
        fclose($fp);

        $mens .= "Content-Type: ".$_FILES["file"]["type"][$i]."\n name=\"".$_FILES["file"]["name"][$i]."\"\n";
        $mens .= "Content-Disposition: attachment; filename=\"".$_FILES["file"]["name"][$i]."\"\n";        
        $mens .= "Content-transfer-encoding:base64\n\n"; 
        $mens .= $anexo."\n";
        
        if($i + 1 == count($_FILES["file"]["name"])) 
            $mens.= "--$boundary--"; 
        else 
            $mens.= "--$boundary\n"; 
        
        if($_FILES["file"]['error'][$i] == 0) {
            $anexos++;
        }        
    }    
}

$headers  = "MIME-Version: 1.0\n";
$headers .= "Date: ".date("D, d M Y H:i:s O")."\n";
$headers .= "From: \"Formulario Contato Site DN Imports\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?><?
									  
									  if(mail($email, $nome, $mens, $headers)){
    echo "<br><br>O formulário foi enviado com sucesso, $anexos anexos";
} else {
    echo "<br><br>Não foi possivel enviar o formulário";
}    
} ?>
  </p>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>