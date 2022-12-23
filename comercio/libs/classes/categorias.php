<?
/*
Criado por Paulo Roberto Magrini (magrini@smo.com.br)
Alterado por Lyma (lyma@lymas.com.br)
*/

class categorias {
        function mostracategoria($id_categoria) {
                $path_local = "libs/padrao.php";
                include "libs/db.php";
                $seleciona_categorias = mysql_query("SELECT * FROM categorias WHERE pertence_categoria = $id_categoria ORDER BY descri_categoria;");
                while ($res_sc = mysql_fetch_array($seleciona_categorias))
                {
                        $eusou1 = urlencode("$res_sc[1]");
                        $categorias_corpo .= "<a class=link_branco href=index.php?cat_pai=$res_sc[0]&eu_sou=$eusou1>$res_sc[1]</a><br>";
                }
                $categorias_corpo .= "</font>";
                $imprime_categoria = "<font face=verdana size=1 color=white>$categorias_corpo";
        return $imprime_categoria;
        }


        function titulocategorias ($id_categ){
                //$path_local = "../../libs/padrao.php";
                //include "../../libs/db.php";
                // Busca dados no banco
                //$query = "SELECT  cod_categoria,descri_categoria FROM categorias WHERE pertence_categoria = $id_categ ORDER BY descri_categoria;";
                $query = "SELECT  cod_categoria,descri_categoria FROM categorias WHERE pertence_categoria = $id_categ;";
                $result = mysql_query ($query)
                or die ("Query falhou...");

                // imprimindo resultados encontrados em uma tabela
                $quantas = mysql_num_rows($result);
                print " Existem $quantas categorias masters cadastradas.";
                print "<table>\n";
                while ($line = mysql_fetch_row($result)) {
                      print "\t<tr>\n";
                      while(list($nome ,$col_value) = each($line)) {
                            print "\t\t<td>$col_value </td>\n";
                            }
                      print "\t</tr>\n";
                            }
                print "</table>\n";
                return $quantas;

        }

        function menucategorias ($id_categ){
                include "libs/padrao.php";
                //include "../../libs/db.php";
                $query = "SELECT  cod_categoria,descri_categoria FROM categorias WHERE pertence_categoria = $id_categ;";
                $result = mysql_query ($query)
                or die ("Query falhou...");

           while ($dados = mysql_fetch_array($result)) {
             print '<link rel="stylesheet" href="libs/admin/estilo.css"> ';
             print '<table width="98%" border="0" cellspacing="1" cellpadding="0" bgcolor="'.$borda.'" align="center"> ';
             print '<tr bgcolor="'.$sub_barra.'">';
             print '<td>';
             print '<div align="center"><font color="#FFFFFF" size="1" face="Verdana, Arial, Helvetica, sans-serif"><b><font color="#000000">::'.$dados[1].'::</font></b></font></div>';
             print '</td>';
             print '</tr>';
             print '<tr bgcolor="'.$sub_corpo.'">';
             print '<td>';
             $mostracategoria = new categorias;
             $ver = $mostracategoria->mostracategoria("$dados[0]");
             print $ver;

             print '</td>';
             print '</tr>';
             print '</table>';
           };

        }


}

?>
