<?php
class Derramamento
{
	// print de arvore binaria sem derramamento 
	// função esta com erro de extrapolar o limite de requisições ao servidor
	function printTree($root, $no, $nivel)
	{
		$array = $this->getBinary($root, $no, $nivel);
		$tree = '<ul>';
		foreach ($array as $value) {
			extract($value);
			$tree .= '
				<li>
					<a class="no">
					<img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
						<span>' . $id_user . '</span>
					</a> 
					' . $this->printTree($root, $id_no, $level) . '
				</li>';
		}
		$tree .= "</ul>";
		return $tree;
	}

	function isPar($valor)
	{
		return $valor > 0 ? ($valor % 2) == 0 ? true : false : 0;
	}

	function getBinary($root, $no, $level)
	{
		//filtra os ativos 
		//$filhos = Dados::getFilhos($root);
		//filtra todos os indicados
		//$matriz = Dados::getUsersMatriz($root);
		$matriz = Dados::getByNoMatriz($root, $no, $level);
		return $matriz;
	}

	//funções de montar a matriz individualmente
	function saveUserMatriz($indicado)
	{
		$save = new Create();
		$root = Dados::getIndicador($indicado);
		$root_raiz = Dados::getIndicador($root);
		//verifica se a matriz do usuario que lhe indicou estar preenchida
		$isLivrePositionMatriz = $this->validaLevelMatriz($root);

		if (!$root_raiz) {
			$isLivrePositionMatrizRoot = $this->validaLevelMatriz($root_raiz);
			if ($this->validaLevelMatriz($root_raiz) > 0) {
				if ($isLivrePositionMatrizRoot == 1) {
					$dados = ['id_user_matriz' => $root_raiz, 'id_user' => $indicado, 'level' => $isLivrePositionMatrizRoot, 'id_no' => $root_raiz];
					$save->ExeCreate('matriz', $dados);
				} else if ($this->getByIdNoMatriz($root_raiz, ($isLivrePositionMatrizRoot - 1))['status']) {
					$dados = ['id_user_matriz' => $root_raiz, 'id_user' => $indicado, 'level' => $isLivrePositionMatrizRoot, 'id_no' => $this->getByIdNoMatriz($root_raiz, ($isLivrePositionMatrizRoot - 1))['no']];
					$save->ExeCreate('matriz', $dados);
				}
			}
		}

		//verifica se sua matriz esta preenchida
		if ($isLivrePositionMatriz > 0) {
			if ($isLivrePositionMatriz == 1) {
				$dados = ['id_user_matriz' => $root, 'id_user' => $indicado, 'level' => $isLivrePositionMatriz, 'id_no' => $root];
				$save->ExeCreate('matriz', $dados);
			} else if ($this->getByIdNoMatriz($root, ($isLivrePositionMatriz - 1))['status']) {
				$dados = ['id_user_matriz' => $root, 'id_user' => $indicado, 'level' => $isLivrePositionMatriz, 'id_no' => $this->getByIdNoMatriz($root, ($isLivrePositionMatriz - 1))['no']];
				$save->ExeCreate('matriz', $dados);
			}
		}
	}

	//funções de montar a matriz all
	function saveUserAllMatriz($root)
	{
		$filhos = Dados::getUsersIndicados($root);
		$save = new Create();
		foreach ($filhos as $user) {
			extract($user);
			$isLivrePositionMatriz = $this->validaLevelMatriz($root);
			//verifica se a matriz do usuario que lhe indicou esta preenchida
			$root_raiz = Dados::getIndicador($root);
			$isLivrePositionMatrizRoot = $this->validaLevelMatriz($root_raiz);
			if ($this->validaLevelMatriz($root_raiz) > 0) {
				if ($isLivrePositionMatrizRoot == 1) {
					$dados = ['id_user_matriz' => $root_raiz, 'id_user' => $id, 'level' => $isLivrePositionMatrizRoot, 'id_no' => $root_raiz];
					$save->ExeCreate('matriz', $dados);
				} else if ($this->getByIdNoMatriz($root_raiz, ($isLivrePositionMatrizRoot - 1))['status']) {
					$dados = ['id_user_matriz' => $root_raiz, 'id_user' => $id, 'level' => $isLivrePositionMatrizRoot, 'id_no' => $this->getByIdNoMatriz($root_raiz, ($isLivrePositionMatrizRoot - 1))['no']];
					$save->ExeCreate('matriz', $dados);
				}
			}
			//verifica se sua matriz esta preenchida
			if ($isLivrePositionMatriz > 0) {
				if ($isLivrePositionMatriz == 1) {
					$dados = ['id_user_matriz' => $root, 'id_user' => $id, 'level' => $isLivrePositionMatriz, 'id_no' => $root];
					$save->ExeCreate('matriz', $dados);
				} else if ($this->getByIdNoMatriz($root, ($isLivrePositionMatriz - 1))['status']) {
					$dados = ['id_user_matriz' => $root, 'id_user' => $id, 'level' => $isLivrePositionMatriz, 'id_no' => $this->getByIdNoMatriz($root, ($isLivrePositionMatriz - 1))['no']];
					$save->ExeCreate('matriz', $dados);
				}
			}
		}
	}

	//função que chama a função de checar ha algum nivel livre da matriz
	function validaLevelMatriz($root)
	{
		for ($i = 1; $i <= 8; $i++) {
			if ($this->geCountUserstLevel($root, $i)) {
				return $i;
				break;
			}
		}
		return 0;
	}

	//função que verifica se o nivel esta com posição disponiveis ou não
	function geCountUserstLevel($root, $level)
	{
		$read = new Read();
		$read->ExeRead('matriz', 'where id_user_matriz=:root and level=:level', 'root=' . $root . '&level=' . $level);
		$totalMaximo = 0;
		switch ($level) {
			case 1:
				$totalMaximo = 2;
				break;
			case 2:
				$totalMaximo = 4;
				break;
			case 3:
				$totalMaximo = 8;
				break;
			case 4:
				$totalMaximo = 16;
				break;
			case 5:
				$totalMaximo = 32;
				break;
			case 6:
				$totalMaximo = 64;
				break;
			case 7:
				$totalMaximo = 128;
				break;
			case 8:
				$totalMaximo = 256;
				break;
		}
		if ($read->getRowCount() < $totalMaximo) {
			return true;
		} else {
			return false;
		}
	}

	//função para pegar o id do no ques ta com posições livres
	function getByIdNoMatriz($root, $level)
	{
		$read = new Read();
		$read->ExeRead('matriz', 'where id_user_matriz=:root and level=:level', 'root=' . $root . '&level=' . $level);
		if ($read->getRowCount() > 0) {
			$noss = '';
			foreach ($read->getResult() as $nos) {
				extract($nos);
				if ($this->isvalidNo($root, $id_user)['status']) {
					return array('status' => true, 'no' => $id_user);
				}
				$noss .= ' ' . $id_user . '=>' . $this->isvalidNo($root, $id_user)['msg'];
			}
			return array('status' => false, 'no' => 'undefined', 'nos_encontrados' => $noss);
		}
	}

	//função para valida no 
	function isvalidNo($root, $no)
	{
		$read = new Read();
		$read->ExeRead('matriz', 'where id_user_matriz=:root and id_no=:no', 'root=' . $root . '&no=' . $no);
		if ($read->getRowCount() < 2) {
			return array('status' => true, 'msg' => 'level possui posições livres');
		} else {
			return array('status' => false, 'msg' => 'esse no ja posicionou duas pessoas');;
		}
	}

	//função de exibir o array original
	public function exibeArrayOrigin($array)
	{
		for ($i = 0; $i < count($array); $i++) {
			if (isset($array[$i])) {
				echo $array[$i]['id'] . '=>' . $array[$i]['nome'] . '<br>';
			}
		}
	}

	public function getFilhos($n1, $n2)
	{
		//array q vai ser preenchido com os novos dados
		$array = array();
		$array['n1'] = [];
		$array['n2'] = [];

		$n = count($n1);
		//verifica se exite um array com dados restantes
		//veirifca se o array atual possui menos de 2 posições
		if (count($n2) > 0 && count($n1) < 2) {
			$indice = 0;
			//percorre o array com os dados restantes e acrescenta no 1º array que possui menos de duas posições
			for ($i = 0; $i < count($n2); $i++) {
				//pegando a primeira do 1º array
				if ($i == 0) {
					if (isset($n1[$i])) {
						$array['n1'][0] = $n1[$i];
					}
				}
				//pega a 2º posição do 1ºarray
				$array['n1'][$i] = $n2[$i];
				//verifica se o array ja está com as duas posições preenchidas
				if (count($array['n1']) == 2) {
					//percorre o array com os dados para preecher os dados que sobraram do array de restantes
					for ($j = $n === 0 ? 0 : 1; $j <= count($n2); $j++) {
						//verifica se o indice do array é valido
						if (isset($n2[$j]))
							$array['n2'][$indice] = $n2[$j];
						$indice++;
					}
					break;
				}
			}
		} else {

			$indice = 0;
			//so entra nesse else se o 1º array possuir mas de duas posições
			//percorre o array e seta as duas primeiras posições
			for ($i = 0; $i < count($n1); $i++) {
				//preenchendo o aaray com os novos dados
				$array['n1'][$i] = $n1[$i];
				//verifica se o array ja está com as duas posições preenchidas
				if ($i == 1) {
					//percorre o 1º array com os dados para preecher os dados que sobraram do 1º array
					for ($j = count($array['n1']); $j < count($n1); $j++) {
						//seta os valores que sobraram do 1ª array
						$array['n2'][$indice] = $n1[$j];
						$indice++;
					}
					//percorre 2ª array que possui os valores que sobraram do 1º array
					for ($k = 0; $k < count($n2); $k++) {
						//verifica se o indice do array é valido
						if (isset($n2[$k]))
							$array['n2'][$indice] = $n2[$k];
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
