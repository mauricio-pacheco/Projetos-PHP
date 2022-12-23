<?
function cadastro(){
print "<Script LANGUAGE=JavaScript>";
print "window.open('cadastro.php','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=450, height=460')";
print "</Script>";
}
function boletim()
{
        $path_local = "./libs/padrao.php";
        Global $nome, $email;
		include("libs/db.php");
		//valida a entrada do e-mail
		if (($email) && (ereg("^([0-9,a-z,A-Z]+)([.,_]([0-9,a-z,A-Z]+))*[@]([0-9,a-z,A-Z]+)([.,_,-]([0-9,a-z,A-Z]+))*[.]([0-9,a-z,A-Z]){2}([0-9,a-z,A-Z])?$", $email)) ){
		
			$sql = mysql_query("SELECT * FROM boletim WHERE email = '$email'");
			while($res = mysql_fetch_array($sql)){
				$existe = $res[0];
			}

        } else {
			$existe='email incorreto';
		}
		if($existe){
			$mensagem = '<table width=100% border=0 cellspacing=0 cellpadding=0><tr bgcolor="$barra"><td><b>Aten&ccedil;&atilde;o!</b></td></tr><tr valign=top><td height=208><br>';
			$mensagem .= 'Este e-mail já está cadastrado em nossos sistemas.<br><br>Utilize outro e-mail, ou verifique com o adminstrador do  sistema se voc&ecirc; j&aacute; est&aacute; cadastrado.<br><br>Obrigado!<br></td></tr></table>';
			print "<Script LANGUAGE=JavaScript>";
			print "window.open('mensagens.php?mensagem=$mensagem','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=350, height=250')";
			print "</Script>";
		} 
		else {

        mysql_query("INSERT INTO boletim (nome,email) VALUES ('$nome','$email')") OR DIE("Erro ao cadastrar boletim.");
		print "<Script LANGUAGE=JavaScript>";
		print "window.open('boletim.php','Janela', 'top=0,left=0,toolbar=no, location=no, status=no, scrollbar=no,resizable=yes,width=350, height=250')";
		print "</Script>";
		}
}

// Includes primários necessários
require("libs/padrao.php");
require("libs/classes/categorias.php");
// Verifica se a session pode ser aberta senão seta conforme possibilidade
unset($id_usuario);
session_start();
if(!$id_usuario){
        // Se existir cookie loga o cara, porém não confirma a senha
        if ($cookie_comercio){
        session_register("id_usuario","nome_usuario","estado_usuario");
        $id_usuario                = $cookie_comercio[id];
        $nome_usuario        = $cookie_comercio[nome];
        $estado_usuario        = $cookie_comercio[uf];
        }
}
/// Define a categoria se for zero para 1
if(!$cat_pai){
$cat_pai = "1";
$pagina = "principal";
}
print "<!--\n";
print "'*************************************************'\n";
print "'**     CopyLeft - Paulo Roberto Magrini        **'\n";
print "'**     e lymas.com.br                             **'\n";
print "'**     http://lymas.com.br                        **'\n";
print "'*************************************************'\n";
print "-->";
///
/// Esta parte é responsável pelo funcionamento correto do script, favor mantê-la
///
$cat_pai2 = $cat_pai;
$path_local = "libs/padrao.php";
include "libs/db.php";
/// Se a categoria for maior que a principal tenta paginar Produtos.
if (!$cat_pai OR $cat_pai == "0"){ $cat_pai = "1"; }
if ($cat_pai > "0"){
$cat_pai = "1";
/// Incia paginação
$sql_paginacao = "SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai2 AND p.id = pc.cod_produto ORDER BY nome_produto ASC LIMIT $inicio,$max";
$sql_paginacao_1 = "SELECT * FROM produto p, produto_categoria pc WHERE pc.cod_categoria = $cat_pai2 AND p.id = pc.cod_produto ORDER BY nome_produto ASC";
$max = $qtde_p_p_p;
include ("paginacao.php");
/// Termina paginação
}
if($cadastro){ cadastro(); }
if($setor == "boletim"){ boletim(); }
?>
