<?php include("verifica.php"); ?>
<?php include("meta.php"); ?>
<style type="text/css">
@import url("dn.css");
</style>
<link rel="stylesheet" href="dns.css" type="text/css" media="print" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">
<!--
.style2 {color: #333333}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
</head>
<body>
<div id="conteudo">
<div id="ultratopo"></div>
<fieldset id="pagina">
  <div id="esquerda"></div>
<?php include("centro2.php"); ?>
<style type="text/css">
<!--
.style4 {color: #006600}
.style6 {font-size: 12px}
.style7 {color: #666666}
.style8 {color: #FF0000}
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
}
-->
</style>
<div id="centro">
<div class="centro_titulo">
<div class="tflash">
  <div align="left"></div>
</div>
</div>

<div class="centro_cont">
<div class="centro_cont_fundo">
<div id="texto">
 <?php include("menu.php"); ?>
<p>
<p></p>
</div>

</div>
<table width="100%" border="0" align="center" class="login">
  <tr>
    <td align="center"><table width="96%" border="0" align="center">
      <tr>
        <td>
          
                   <form action="cadimgveiculos.php" method="post" name="form1" id="form1" enctype="multipart/form-data">
          <table width="100%" border="0" align="center"><?php
		include "conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM cadastro WHERE id='$id' ORDER BY id");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center><b>N&atilde;o existe galerias cadastradas!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {	
		?>
            <tr>
              <td class="rodape"><table width="100%" border="0">
                <tr>
                  <td width="6%"><img src="veiculointro/<?php echo $n["foto"]; ?>" /></td>
                  <td width="94%" valign="top">&nbsp;Ve&iacute;culo: <font color="#0000FF"><?php echo $n["nome"]; ?></font><br>
                    &nbsp;Pre&ccedil;o:<font color="#008000">&nbsp;R$</font> <font color="#2D2D2D"><?php echo $n["preco"]; ?></font><br>
                    &nbsp;
                    <input type="hidden" name="idveiculo" value="<?php echo $n["id"]; ?>" />
                    <?php
  }
  }
 ?></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td class="rodape"><table width="100%" border="0">
                <tr>
                  <td>Foto 1: <span class="style15">
                    <input type="file" name="foto0" id="foto0" class="texto2" />
                  </span></td>
                  <td>Foto 11: <span class="style15">
                    <input type="file" name="foto10" id="foto1" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 2: <span class="style15">
                    <input type="file" name="foto1" id="foto2" class="texto2" />
                  </span></td>
                  <td>Foto 12: <span class="style15">
                    <input type="file" name="foto11" id="foto11" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 3: <span class="style15">
                    <input type="file" name="foto2" id="foto2" class="texto2" />
                  </span></td>
                  <td>Foto 13: <span class="style15">
                    <input type="file" name="foto12" id="foto12" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 4: <span class="style15">
                    <input type="file" name="foto3" id="foto3" class="texto2" />
                  </span></td>
                  <td>Foto 14: <span class="style15">
                    <input type="file" name="foto13" id="foto13" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 5: <span class="style15">
                    <input type="file" name="foto4" id="foto4" class="texto2" />
                  </span></td>
                  <td>Foto 15: <span class="style15">
                    <input type="file" name="foto14" id="foto14" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 6: <span class="style15">
                    <input type="file" name="foto5" id="foto5" class="texto2" />
                  </span></td>
                  <td>Foto 16: <span class="style15">
                    <input type="file" name="foto15" id="foto15" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 7: <span class="style15">
                    <input type="file" name="foto6" id="foto6" class="texto2" />
                  </span></td>
                  <td>Foto 17: <span class="style15">
                    <input type="file" name="foto16" id="foto16" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 8: <span class="style15">
                    <input type="file" name="foto7" id="foto7" class="texto2" />
                  </span></td>
                  <td>Foto 18: <span class="style15">
                    <input type="file" name="foto17" id="foto17" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 9: <span class="style15">
                    <input type="file" name="foto8" id="foto8" class="texto2" />
                  </span></td>
                  <td>Foto 19: <span class="style15">
                    <input type="file" name="foto18" id="foto18" class="texto2" />
                  </span></td>
                </tr>
                <tr>
                  <td>Foto 10: <span class="style15">
                    <input type="file" name="foto9" id="foto9" class="texto2" />
                  </span></td>
                  <td>Foto 20: <span class="style15">
                    <input type="file" name="foto19" id="foto19" class="texto2" />
                  </span></td>
                </tr>
              </table></td>
            </tr>
            <tr>
              <td class="rodape"><span style="MARGIN: 0px">
                <input name="submit" class="texto2" type="submit" style="FONT-SIZE: 10px" value="CADASTRAR FOTOS" />
              </span></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</div>

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