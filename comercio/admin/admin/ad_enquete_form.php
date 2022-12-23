<?php include ('auth.php') ?>
<html>
<head>
<title>Cadastro de Enquete</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="libs/admin/estilo.css">
<Script LANGUAGE=JavaScript>
function recarregaenquete(link){
var sele = link.form.elements['qtdcampos'].value;
if (sele == "2")
window.location.href = "?qtdcampos=2";
if (sele == "3")
window.location.href = "?qtdcampos=3";
if (sele == "4")
window.location.href = "?qtdcampos=4";
if (sele == "5")
window.location.href = "?qtdcampos=5";
else if (sele == "6")
window.location.href = "?qtdcampos=6";
}
</Script>
</head>
<?
$path_local = "../padrao.php";
include "../db.php";
if($acao == "inserir"){
         $zeros = 0;
         for ($i=1; $i < count($campo); $i++) {
             $zeros .= ',0';
         }
         $valor=explode(",",$zeros);
         $campos = implode("|",$campo);
         $valorcampos = implode ("|",$valor);
         if(!(mysql_query("INSERT INTO enquete (descricao, qtdcampos, campos, valorcampos, ativa) VALUES ('$descricao', '$qtdcampos', '$campos', '$valorcampos', '$ativa')") or die("Erro em sql"))){
                        print "Erro de acesso ao banco de dados ao tentar criar nova enquete...";
         } else {
           $texto = '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
                     <table width="100%" border="0" cellpadding="0" cellspacing="0">
                     <tr>
                     <td>
                       <table width="100%" border="0" cellspacing="0" cellpadding="0">
                       <tr>
                       <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
                         Criando nova enquete.</font></b></font></td>
                       <td width="16%">
                     <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
                     </td>
                     </tr>
                     </table>
                     </td>
                     </tr>
                     </table>
                     <table width="100%" border="0" cellspacing="0" cellpadding="0">';
           $texto2 = "<tr bgcolor=\"$barra\">
                     <td><font size=\"1\" color=\"$barra\" face=\"Verdana, Arial, Helvetica, sans-serif\">-</font></td>
                     </tr>";
           print $texto.$texto2 ;
           print "<tr><td><br><br><p> A enquete \"$descricao\" foi criada com sucesso! </p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p></tr></td><br>" . $texto2 . "</table>";
           }
               // para fechar a Janela Automaticamente em 5 segundos...

                   print "<script Language=\"JavaScript\">";
                   print "window.opener.location.href = \"./\";";
                   print 'function closeWindow(){';
                   print '  window.close();}';
                   print '  setTimeout("closeWindow()", 5000);';
                   print "</script>";
                   exit;
}
?>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="84%"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">
            Criando nova enquete.</font></b></font></td>
          <td width="16%">
            <div align="right"><font size="1"><b><font face="Verdana, Arial, Helvetica, sans-serif">::</font></b></font></div>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="<? print "$barra";?>">
    <td><font size="1" color="<? print "$barra";?>" face="Verdana, Arial, Helvetica, sans-serif">-</font></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>
      <form enctype="multipart/form-data" method="post" action="ad_enquete_form.php?acao=inserir">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
               <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Quantas respostas:</b></font></td>
            <td width="87%"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>
              <?
              if (!$qtdcampos){
                    print '              <SELECT name=qtdcampos onchange="javascript:recarregaenquete(this);" >';
                    print '                  <option value="">Escolha um valor</option>';
                    print '                  <OPTION value="2">2 Campos</OPTION>';
                    print '                  <OPTION value="3">3 Campos</OPTION>';
                    print '                  <OPTION value="4">4 Campos</OPTION>';
                    print '                  <OPTION value="5">5 Campos</OPTION>';
                    print '                  <OPTION value="6">6 Campos</OPTION>';
                    print '              </SELECT>';
              } else {
                    print $qtdcampos;
                        print "<input type=hidden value=\"$qtdcampos\" name=\"qtdcampos\">";
              }
               ?>
              </b></font></td>
          </tr>

          <?
          if ($qtdcampos != "") {
                        print '          <tr>';
                        print '            <td width="13%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>Pergunta:</b></font></td>';
                        print '            <td width="87%"> <font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b>';
                        print '              <input type="text" name="descricao" size="45">';
                        print '              </b></font></td>';
                        print '          </tr>';
                        for ($i=0; $i < $qtdcampos;$i++) {
                                   $i2 = $i+1;
                                   print '          <tr>';
                                   print "            <td width=\"20%\"><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\"><b>Resposta $i2:</b></font></td>";
                                   print '            <td width="80%"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#FF0000">';
                                   print "              <input type=\"text\" name=\"campo[$i2]\" size=\"45\">";
                                   print '              </font></b></font></td>';
                                   print '          </tr>';
                        }
             }

           ?>
           <tr>
            <td width="13%"></td>
            <td width="87%">
                <input type=hidden value="1" name="ativa">
            </td>
          </tr>
         </table>
        <p><font size="1"><font face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit" value="Criar a Enquete">
          </font> </font> </p>
        </form>
      <p>&nbsp;</p>
    </td>
  </tr>
  <tr bgcolor="<? print "$barra";?>">
    <td height="2"><img src="../../no_existe.gif" width="1" height="1"></td>
  </tr>
</table>
</body>
</html>