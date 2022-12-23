<?php include("head.php"); ?>
</HEAD>
<style type="text/css">
<!--
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; }
.style7 {color: #333333}
.style12 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #333333;}
.style13 {color: #FFFFFF}
-->
</style>
<BODY topmargin="0">
<TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <?php include("cabecalho.php"); ?>
  <TR>
    <TD height=308>&nbsp;</TD>
    <TD vAlign=top align=middle width=605 background=home_arquivos/bg.jpg 
    height=308>
      <TABLE height="100%" cellSpacing=0 cellPadding=0 width=800 align=center 
      border=0>
        <TBODY>
        <TR>
          <?php include("esquerdo.php"); ?>
          <TD vAlign=top>
            <TABLE cellSpacing=0 cellPadding=0 width=568 align=center 
              border=0><TBODY><TR>
                <TD><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td bgcolor="#7CC329"><img src="blank.gif" height="6"><div align="center"><img src="home_arquivos/banner.jpg" width="564" height="110"></div><img src="blank.gif" height="6"></td>
                  </tr>
                </table></TD>
              </TR>
              <TR>
                <TD height=28 align=left vAlign=center background="home_arquivos/ladrilho.jpg">
                 <div >
                   <div align="center" class="style12 style13">FALE CONSOCO&nbsp;&nbsp;</div>
                 </div></TD></TR>
              <TR>
                <TD vAlign=center align=middle height=109><table width="100%" border="0">
                  <tr>
                    <td><p align="center" class="style6"><br>
                        <img src="home_arquivos/calculadora.jpg" width="213" height="143"></p>
                      <p align="center" class="style6"><span class="style7">Seu or&ccedil;amento foi enviado com sucesso!</span></p>
                      <table width="96%" border="0" align="center">
                        <tr>
                          <td width="50%"><div align="center"><span class="texto">
                            <?php
if (getenv("REQUEST_METHOD") == "POST")
{

set_time_limit(0);
//só para teste mas auterem essa parte para pegar os dados via post $_POST
$email     = "mandrymaster@gmail.com";
$nome      = $_POST["nome"];  
$empresa      = $_POST["empresa"];  
$cidade    = $_POST["cidade"]; 
$estado    = $_POST["estado"]; 
$cep       = $_POST["cep"]; 
$telefone = $_POST["telefone"]; 
$email2     = $_POST["email2"]; 
$mensagem  = $_POST["mensagem"]; 
$quantidade  = $_POST["quantidade"];
$tamanho  = $_POST["tamanho"]; 
$n_vias  = $_POST["n_vias"]; 
$quant_cores  = $_POST["quant_cores"]; 
$papel  = $_POST["papel"]; 

$anexos    = 0;
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens  = "--$boundary\n";    
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; 

$mens .= "<font face='verdana'>";
$mens .= "..:: OR&Ccedil;AMENTO DO SITE GRAFIMAR ::..";
$mens .= "<BR><BR>";
$mens .= "Responsável: ";
$mens .= "$nome";
$mens .= "<br><br>";
$mens .= "Empresa: ";
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
$mens .= "E-mail: ";
$mens .= "$email2";
$mens .= "<br>";
$mens .= "<br>";
$mens .= "Mensagem: ";
$mens .= "<br><br>";
$mens .= "$mensagem\n";
$mens .= "<br><br>";
$mens .= "Quantidade: ";
$mens .= "$quantidade";
$mens .= "<br><br>";
$mens .= "Tamanho: ";
$mens .= "$tamanho";
$mens .= "<br><br>";
$mens .= "N&ordm; de Vias: ";
$mens .= "$n_vias";
$mens .= "<br><br>";
$mens .= "Quantidade de Cores: ";
$mens .= "$quant_cores";
$mens .= "<br><br>";
$mens .= "Papel: ";
$mens .= "$papel";
$mens .= "<br>";
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
$headers .= "From: \"Or&ccedil;amento do Site Grafimar\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?>
                            <?
									  
									  if(mail($email, $nome, $mens, $headers)){
    echo "O formul&aacute;rio foi enviado com sucesso, $anexos anexos";
} else {
    echo "Nao foi possivel enviar o formul&aacute;rio";
}    
} ?></span></div></td>
                          </tr>
                      </table>                      </td>
                  </tr>
                </table></TD>
              </TR></TABLE></TD>
          <TD width=67>&nbsp;</TD></TR></TABLE></TD>
    <TD height=308>&nbsp;</TD></TR><?php include("cabecalhobaxo.php"); ?></TBODY></TABLE>
</BODY></HTML>
