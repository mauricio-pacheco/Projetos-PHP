<style type="text/css">
<!--
.style110 {font-size: 11px}
-->
</style>
<TABLE width="207" border=0 align=center cellPadding=0 cellSpacing=0>
              <TBODY>
              <TR>
                <TD vAlign=top align=left>
                                    <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD><div align="center"></div></TD>
                    </TR>
                    <TR>
                      <TD><div align="center"><span class="style110" style="COLOR: #ffffff">E=mail cadastrado com sucesso!<? 
include "../conexao.php";


$data = date ("j/m/Y");
$hora = date ("H:i:s");
$email = $_POST["email"];
$email = strip_tags($email);
$email = mysql_escape_string($email);

$sql = "INSERT INTO cadastro (email, data, hora) VALUES ('$email', '$data', '$hora')";

?></span></div></TD>
                    </TR>
                    <TR>
                      <TD>
                        <TABLE cellSpacing=0 cellPadding=0 width="100%" 
border=0>
                          <TBODY>
                          <TR>
                            <TD><div align="center"><span class="style110" style="COLOR: #ffffff">Em breve novidades no seu e-mail.<br /></span></div></TD>
                          </TR>
                          <TR>
                           <TD><div align="center"><img src="blank.gif" width="1" height="6"></div></TD>
                          </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
                  </TD></TR></TBODY></TABLE>