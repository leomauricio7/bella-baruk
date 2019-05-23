<?php 
class Derramamento {
	//função de exibir o array original
	public function exibeArrayOrigin($array){
		for($i = 0; $i < count($array); $i++){
			if(isset($array[$i])){
				echo $array[$i]['id'].'=>'.$array[$i]['nome'].'<br>';
			}
		}
	}

	public function getFilhos($n1,$n2){
		//array q vai ser preenchido com os novos dados
		$array = array();
		$array['n1'] = [];
		$array['n2'] = [];
		
		$n = count($n1);
		//verifica se exite um array com dados restantes
		//veirifca se o array atual possui menos de 2 posições
		if(count($n2) > 0 && count($n1) < 2){
			$indice = 0;
			//percorre o array com os dados restantes e acrescenta no 1º array que possui menos de duas posições
			for($i = 0; $i < count($n2); $i++){
				//pegando a primeira do 1º array
				if($i==0){
					if(isset($n1[$i])){
						$array['n1'][0]=$n1[$i];
					}
				}
				//pega a 2º posição do 1ºarray
				$array['n1'][$i] = $n2[$i];
				//verifica se o array ja está com as duas posições preenchidas
				if(count($array['n1']) == 2){
					//percorre o array com os dados para preecher os dados que sobraram do array de restantes
					for($j = $n === 0 ? 0 : 1; $j <= count($n2); $j++){
						//verifica se o indice do array é valido
						if(isset($n2[$j]))
							$array['n2'][$indice]=$n2[$j];
						$indice++;
					}
					break;		
				}
			}
		}else{
			
			$indice = 0;
			//so entra nesse else se o 1º array possuir mas de duas posições
			//percorre o array e seta as duas primeiras posições
			for($i = 0; $i < count($n1); $i++){	
				//preenchendo o aaray com os novos dados
				$array['n1'][$i] = $n1[$i];
				//verifica se o array ja está com as duas posições preenchidas
				if($i==1){
					//percorre o 1º array com os dados para preecher os dados que sobraram do 1º array
					for($j = count($array['n1']); $j < count($n1); $j++){
						//seta os valores que sobraram do 1ª array
						$array['n2'][$indice]=$n1[$j];
						$indice++;
					}
					//percorre 2ª array que possui os valores que sobraram do 1º array
					for($k = 0; $k < count($n2); $k++){
						//verifica se o indice do array é valido
						if(isset($n2[$k]))
							$array['n2'][$indice]=$n2[$k];
						$indice++;
					}
					break;
				}
			}
		}
		//retorna o array que foi montado
		return $array;
	}
}
