<table width="100%" height="30" border="0">
                                      <tr>
                                        <td width="100%" class=tahomafonte><img src="buscar.jpg"></td>
                                      </tr>
                                    </table>
                                      <table width="100%" height="30" border="0">
                                        <tr>
                                          <td width="100%" class=tahomafonte> <FORM style="MARGIN: 0px" name=form_busca action=busca.php 
                  method=post><INPUT onClick="this.value=''" class=texto style="WIDTH: 114px" 
                  name=palavra value="Palavra Chave"> 
                    <input name="submit" type=submit class=texto style="FONT-SIZE: 10px" value=ok>
                    Dep.:<select class=texto name="departamento">
                      <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM departamentos ORDER BY nomedep ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                      <option value="<?php echo $n["nomedep"]; ?>"><?php echo $n["nomedep"]; ?></option>
                      <?
  }
  }
 ?>
                    </select>
<BR>
                  </FORM></td>
                                        </tr>
                                      </table>
                                      <table width="100%" height="30" border="0">
                                        <tr>
                                          <td width="100%" class=tahomafonte><img src="menu.jpg"></td>
                                        </tr>
                                      </table>
                                      <table width="100%" height="30" border="0">
                                        <tr>
                                          <td width="14%"><img src="roda.gif"></td>
                                          <td width="86%" class=tahomafonte>&nbsp;<font class="tahoma_preta_11"><a href="index.php">P&aacute;gina Inicial</a></font></td>
                                        </tr>
                                      </table>
                                      <?php

include "administrador/conexao.php";

$sql = mysql_query("SELECT * FROM departamentos ORDER BY nomedep ASC");
$contar = mysql_num_rows($sql); 

if ($contar < 1)  
   {echo "<div align=center class=tahomafonte><b>N&atilde;o existe departamentos cadastrados!</b></div>"; 
   }
else 
   {
while($n = mysql_fetch_array($sql))
   {
   ?>
                                      <table width="100%" height="30" border="0">
                                        <tr>
                                          <td width="14%"><img src="estrela.gif"></td>
                                          <td width="86%" class=tahomafonte>&nbsp;<font class="tahoma_preta_11"><a href="detalhes.php?id=<?php echo $n["id"]; ?>"><?php echo $n["nomedep"]; ?></a></font></td>
                                        </tr>
                                      </table>
                                    <?
  }
  }
 ?>