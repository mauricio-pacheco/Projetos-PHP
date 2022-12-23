<?
/*
  cotacaoDolar.php - script usado para extrair a cotação atual do dólar junto ao 
  banco central do governo federal

  Autor: Fábio Berbert de Paula <fabio@vivaolinux.com.br>
  http://www.vivaolinux.com.br
*/

error_reporting(15);

// o fopen também funciona para arquivos da rede, uau !
if(!$fp=fopen("http://www.bc.gov.br/htms/infecon/taxas/taxas.htm" ,"r" )) { 
    echo "Erro ao abrir a página de cotação" ; 
    exit ;
} 
   
$conteudo = '';
while(!feof($fp)) { // leia o conteúdo da página
   $conteudo .= fgets($fp,1024); 
}
fclose($fp); 

/*
  Na expressão regular abaixo pego os dois números que tem o seguinte formato:
  9,9999 (ex.: 2,8182)
  O primeiro número é a taxa de compra e o segunda, taxa de venda
*/
eregi("([0-9],[0-9]{1,}).*([0-9],[0-9]{1,})",$conteudo,$saida);
list($lixo,$taxaCompra,$taxaVenda) = $saida;

echo "
<h3>Cotação atual do dólar</h3>
Taxa de compra: <b>$taxaCompra</b><br>
Taxa de venda : <b>$taxaVenda</b><br>
</pre>";
?> 