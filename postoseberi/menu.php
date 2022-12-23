<table width="87%" border="0">
          <tr>
            <td><img src="home_arquivos/bb.gif" width="20" height="250"></td>
            </tr>
          <tr>
            <td align="left"><table width="100%" border="0">
              <tr>
                <td><img src="barramenu.jpg"></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM gestao_conteudo WHERE setor='Menu' ORDER BY titulo ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo ""; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                  <table width="98%" border="0" align="center">
                  <tr>
                    <td width="15%"><img src="home_arquivos/fuel.png"></td>
                    <td width="85%"><a href="conteudo.php?id=<?php echo $y["id"]; ?>"><?php echo $y["titulo"]; ?></a></td>
                  </tr>
                </table>
                <?php
  }
  }
 ?></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><img src="barramenu3.jpg" /></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM gestao_conteudo WHERE setor='Produtos' ORDER BY titulo ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo ""; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                  <table width="98%" border="0" align="center">
                    <tr>
                      <td width="15%"><img src="home_arquivos/fuel.png" /></td>
                      <td width="85%"><a href="conteudo.php?id=<?php echo $y["id"]; ?>"><?php echo $y["titulo"]; ?></a></td>
                    </tr>
                  </table>
                  <?php
  }
  }
 ?></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><img src="barramenu2.jpg" /></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM gestao_conteudo WHERE setor='Serviços' ORDER BY titulo ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo ""; 
   }
else 
   {
while($y = mysql_fetch_array($sql))
   {
   ?>
                  <table width="98%" border="0" align="center">
                    <tr>
                      <td width="15%"><img src="home_arquivos/fuel.png" /></td>
                      <td width="85%"><a href="conteudo.php?id=<?php echo $y["id"]; ?>"><?php echo $y["titulo"]; ?></a></td>
                    </tr>
                  </table>
                  <?php
  }
  }
 ?></td>
              </tr>
            </table>
            <table width="100%" border="0">
              <tr>
                <td><img src="p1.jpg" /></td>
              </tr>
            </table>
            <table width="190" align="center" bgcolor="#EEEEEE" border="0">
              <tr>
                <td align="center"><iframe src="selo1.php" name="centro" height="260px" width="180px" frameborder="0" allowtransparency="yes" scrolling="no"></iframe></td>
              </tr>
            </table>
            <table bgcolor="#EEEEEE" align="center" width="190" border="0">
              <tr>
                <td><table width="100%" border="0">
                  <tr>
                    <td width="3%"><img src="dot.png" /></td>
                    <td width="97%"><span class="tahoma10preto">&nbsp;<a href="selo1.php" class="tahoma10preto" target="centro"><b>Frederico Westphalen</b></a></span></td>
                  </tr>
                  <tr>
                    <td><img src="dot.png" /></td>
                    <td><span class="tahoma10preto">&nbsp;<a href="selo2.php" class="tahoma10preto" target="centro"><b>Seberi</b></a></span></td>
                  </tr>
                  <tr>
                    <td><img src="dot.png" /></td>
                    <td><span class="tahoma10preto">&nbsp;<a href="selo3.php" class="tahoma10preto" target="centro"><b>Ira&iacute;</b></a></span></td>
                  </tr>
                  <tr>
                    <td><img src="dot.png" /></td>
                    <td><span class="tahoma10preto">&nbsp;<a href="selo4.php" class="tahoma10preto" target="centro"><b>Rodeio Bonito</b></a></span></td>
                  </tr>
                  <tr>
                    <td><img src="dot.png" /></td>
                    <td><span class="tahoma10preto">&nbsp;<a href="selo5.php" class="tahoma10preto" target="centro"><b>Palmeira das Miss&otilde;es</b></a></span></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
            </tr>
        </table>