<?php require("verifica.php"); ?>
<?php require_once "cuteeditor/cuteeditor_files/include_CuteEditor.php" ?>    
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Luz e Alegria - Publicidades</title>
<style type="text/css">
<!--
.manchete_texto {
	font-family: Verdana, Geneva, sans-serif; font-size:10px
}

-->
</style>
</head>

<body>
<table width="100%" border="0" align="center">
  <tr>
    <td align="center"><p><img src="complexo.jpg" width="560" height="88" /></p>
    <p><a href="principal.php"><font color="#000000">CADASTRAR BANNER</font></a> ---- <a href="admbanners.php"><font color="#000000">APAGAR BANNERS</font></a></p><br /></td>
  </tr>
</table>
<table width="98%" border="0" align="center">
  <tr>
    <td><table width="100%" border="0" align="center">
      <tr>
        <td>
         <?php

include "conexao.php";

$id = $_GET['id'];
$sql = mysql_query("SELECT * FROM publicidades WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe noticias cadastradas!</b></div>"; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
        <form action="updatebanner.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
          <table width="100%" border="0" align="center">
            <tr>
              <td class="manchete_texto" align="left"><b><span class="rodape">
                <input type="hidden" name="id" value="<?php echo $y["id"]; ?>" />
              </span></b>Selecione o Banner: 
                <input name="banner" type="radio" id="radio" value="cima" <?php if 
									  ($y["banner"] == "cima") { echo "checked"; } else { }  ?> />
                BANNER CIMA 
                <input type="radio" name="banner" id="radio" value="baixo" <?php if 
									  ($y["banner"] == "baixo") { echo "checked"; } else { }  ?> />
BANNER BAIXO 
<input type="radio" name="banner" id="radio" value="cima2" <?php if 
									  ($y["banner"] == "cima2") { echo "checked"; } else { }  ?> />
BANNER CIMA 2
<input type="radio" name="banner" id="radio" value="baixo2" <?php if 
									  ($y["banner"] == "baixo2") { echo "checked"; } else { }  ?> />
BANNER BAIXO 2</td>
            </tr>
            <tr>
              <td class="manchete_texto" align="left">Título: <span class="style15">
              <input name="titulo" type="text" class="fontebaixo2" size="60" value="<?php echo $y["titulo"]; ?>" />
              </span></td>
            </tr>
            <tr>
              <td class="manchete_texto" align="left">Link do Banner: <span class="style15">
                <input name="link" type="text" class="fontebaixo2" value="<?php echo $y["link"]; ?>" size="60" />
              </span></td>
            </tr>
            <tr>
              <td class="manchete_texto" align="left">Imagem do Banner:
                <input type="file" name="foto" id="foto" class="fontebaixo2" />
                <span class="fontetabela">(caso n&atilde;o deseje editar a foto deixe   em branco)
                <input type="hidden" name="foto" value="<?php echo $y["foto"]; ?>" />
                </span><br /><b>Tamanho do Banner:</b> 172 px ( Largura ) X 250 px ( Altura )</td>
            </tr>
            <tr>
              <td class="manchete_texto" align="left"><span class="style25">
               <?php    
             	
				//Step 2: Create Editor object.    
                $editor=new CuteEditor("texto");    
                $editor->Text="$y[texto]";
				$editor->Width="950";
                $editor->Height="900";
                //Step 3: Set a unique ID to Editor    
                $editor->ID="texto"; 
			    //Step 4: Render Editor    
                $editor->Draw();    
            ?>
              </span></td>
            </tr>
            <tr>
              <td class="manchete_texto" align="left"><span style="MARGIN: 0px">
                <input name="submit" class="fontebaixo2" type="submit" style="FONT-SIZE: 10px" value="EDITAR BANNER" />
                </span></td>
            </tr>
          </table>
        </form><?php
  }
  }
 ?></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>