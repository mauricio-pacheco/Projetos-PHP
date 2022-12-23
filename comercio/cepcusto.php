<?PHP
/*

Created by Roberto Berto (berto@que.com.br)
Readaptado por Paulo Roberto Magrini
Function/Funcao:
Return a value from a file DB with the value of SEDEX 
Retorna um valor de um arquivo de banco de dados com o valor do sedex

*/

class cepcusto {
	/*
	array(UF,VALOR,[CEP INICIAL],[CEP FINAL] read_database($file);
	file = uma linha por registro contendo
	UF VALOR [CEP INICIAL] [CEP FINAL]
	o CEP INICIAL e FINAL podem ser omitidos para estipular o padrao.
	
	
	OBS: os ceps NAO tem - no meio
	*/
	
	function read_database ($c) {
		$dados = file($c);
		$data = array();
		while (list($a,$b) = each($dados)) {
			if (preg_match("/(\w{2}) (\d+\#\d{0,0})(.*)/",$b,$p)) {
				if ($p[3]) { preg_match("/(\d+) (\d+)/",$p[3],$q); }
				
				array_push($data,array($p[1],$p[2],$q[1],$q[2]));
				
				unset($p);
				unset($q);
			}			
		}
		
		return $data;
	}
	
	# int valor(array dados, string estado, int [cep]);
	function valor($data,$estado,$cep = NULL) {
		while (list($a,$b) = each($data)) {
			unset($uf);unset($va);unset($ci);unset($cf);
			list($uf,$va,$ci,$cf) = $b;
			if (!$ci) {
				$d[$uf] = $va;
			}
			
			if (!$cep && !$ci && $estado == $uf) {
				return $va;
			}
			elseif($cep && $estado == $uf && $cep >= $ci && $cep <= $cf) {
				return $va;
			}
		}
		
		return $d[$estado];
	}

}

?>
