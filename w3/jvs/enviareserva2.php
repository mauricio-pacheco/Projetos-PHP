<?php include("meta.php"); ?>
<style type="text/css">
@import url("dn.css");
</style>
<link rel="stylesheet" href="dns.css" type="text/css" media="print" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #333333}
-->
</style>
</head>
<body>
<div id="conteudo">
<div id="ultratopo"></div>
<div id="topo">
<div id="topo_direita"><SCRIPT src="carrega.js"></SCRIPT><SCRIPT language=javascript>
     carregaFlash('flash/acima8.swf','764','180'); // Depois só descrever o caminho, largura, altura do SWF.
    </SCRIPT></div></div>	
<div id="menu_horiz">
  <script type="text/javascript">
AC_FL_RunContent( 'codebase','http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0','width','764','height','38','src','flash/botoes','quality','high','pluginspage','http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash','movie','flash/botoes' ); //end AC code
</script><noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0" width="764" height="38">
    <param name="movie" value="flash/botoes.swf">
    <param name="quality" value="high">
    <embed src="flash/botoes.swf" quality="high" pluginspage="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" width="764" height="38"></embed>
  </object>
</noscript></div>

<fieldset id="pagina">
<div id="esquerda"></div>
<?php include("centro2.php"); ?>
<div id="centro">
<div class="centro_venda">
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
$email     = "contato@jvsturismo.com.br";
$nome      = $_POST["nome"];  
$lugares    = $_POST["lugares"]; 
$categoria    = $_POST["categoria"]; 
$bancada      = $_POST["bancada"]; 
$condicionado = $_POST["condicionado"]; 
$modelo = $_POST["modelo"]; 
$descricao    = $_POST["descricao"]; 
$reserva  = $_POST["reserva"]; 
$preco  = $_POST["preco"]; 

$anexos    = 0;
$boundary = "XYZ-" . date("dmYis") . "-ZYX";
$mens  = "--$boundary\n";    
$mens .= "Content-Transfer-Encoding: 8bits\n";
$mens .= "Content-Type: text/html; charset=\"ISO-8859-1\"\n\n"; 

$mens .= "<font face='verdana'>";
$mens .= "..:: FORMULÁRIO DE COMPRA DE VIAGENS DO SITE JVS TRANSPORTE E TURISMO ::..";
$mens .= "<BR><BR>";
$mens .= "<font color=#008000>DESCRIÇÃO DO VEÍCULO:</font><br><br> ";
$mens .= "Nome: ";
$mens .= "$nome";
$mens .= "<br><br>";
$mens .= "Preço: ";
$mens .= "R$ $preco";
$mens .= "<br><br>";
$mens .= "Lugares: ";
$mens .= "$lugares";
$mens .= "<br><br>";
$mens .= "Categoria: ";
$mens .= "$categoria";
$mens .= "<br><br>";
$mens .= "Bancada: ";
$mens .= "$bancada";
$mens .= "<br><br>";
$mens .= "Condicionado: ";
$mens .= "$condicionado";
$mens .= "<br><br>";
$mens .= "Modelo: ";
$mens .= "$modelo";
$mens .= "<br><br>";
$mens .= "Descrição: ";
$mens .= "$descricao";
$mens .= "<br><br>";
$mens .= "<font color=#0066CC>DESCRIÇÃO DO COMPRADOR:</font><br><br> ";
$mens .= "$reserva";
$mens .= "<br>";
$mens .= "<br>";

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
$headers .= "From: \"COMPRAS NO SITE -  JVS Transporte e Turismo\"\r\n";
$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"\r\n";


?><?
									  
									  if(mail($email, $nome, $mens, $headers)){
    echo "<br><br>O formulário foi enviado com sucesso";
} else {
    echo "<br><br>Não foi possivel enviar o formulário";
}    
} ?>
  </p>
  <p align="center">Em breve estaremos entrando em contato.</p>
</div>
</div></div>

<div class="centro_rodape"></div>
</div>

</fieldset>

<div id="rodape">
<div id="coor">
  <?php include("baixo.php"); ?> 
</div>
</div></div>
</body>
</html>