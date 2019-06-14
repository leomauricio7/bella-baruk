<?php

class Unilevel
{

    public static function getTotalUsersAtivos($id)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "ativo"', 'id=' . $id);
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                if (Dados::existePlanoAtivo($id)) {
                    $total += 1;
                }
            }
        }
        return $total;
    }

    public static function getTotalUsersInativos($id)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id', 'id=' . $id);
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                if (!Dados::existePlanoAtivo($id)) {
                    $total += 1;
                }
            }
        }
        return $total;
    }

    public static function getTotalUsersIndicados($id)
    {
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id', 'id=' . $id);
        return $read->getRowCount();
    }

    public static function getTotalUsersMaster()
    {
        $read = new Read();
        $read->ExeRead('users');
        return $read->getRowCount();
    }

    public static function getTotalUsersAtivosMaster()
    {
        $read = new Read();
        $total = 0;
        $read->ExeRead('users', 'where status = "ativo"');
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                if (Dados::existePlanoAtivo($id)) {
                    $total += 1;
                }
            }
        }
        return $total;
    }

    public static function getSaldoTotalComprasPagas()
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where id_status=3');
        $total = 0;
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor;
        }
        return number_format($total, 2, ",", "");
    }

    public static function getTotalProdutos()
    {
        $read = new Read();
        $read->ExeRead('products');
        return $read->getRowCount();
    }

    //pega os dados dos nivel e veifica qual é a comissão correta de acordo com a poisição
    public static function transformHierarquiaNiveisUnilevel($array){
        $new_array = [];
        $indice = 1;
        $total = count($array);
        if($total == 1){
            foreach($array as $value){
                extract($value);
                array_push($new_array, [
                    'indicador' => $indicador,
                    'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel($indice),
                    'nivel'=> $indice
                ]);
                $indice++;
            }
        }else{
            rsort($array);
            foreach($array as $value){
                extract($value);
                array_push($new_array, [
                    'indicador' => $indicador,
                    'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel($indice),
                    'nivel'=> $indice
                ]);
                $indice++;
            }
        }

        return $new_array;
    }
    //retorna os 7 niveis(indicador) de comissoes do meu cadastro
    public static function getHierarquiaComissaoUnilevel($idComprador)
    {
        $my_user = [];
        $my_user[7] = [
            'indicador' => Dados::getIndicador($idComprador),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(7),
            'nivel'=> 7
        ];
        $my_user[6] = [
            'indicador' => Dados::getIndicador($my_user[7]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(6),
            'nivel'=> 6
        ];
        $my_user[5] = [
            'indicador' => Dados::getIndicador($my_user[6]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(5),
            'nivel'=> 5
        ];
        $my_user[4] = [
            'indicador' => Dados::getIndicador($my_user[5]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(4),
            'nivel'=> 4
        ];
        $my_user[3] = [
            'indicador' => Dados::getIndicador($my_user[4]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(3),
            'nivel'=> 3
        ];
        $my_user[2] = [
            'indicador' => Dados::getIndicador($my_user[3]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(2),
            'nivel'=> 2
        ];
        $my_user[1] = [
            'indicador' => Dados::getIndicador($my_user[2]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(1),
            'nivel'=> 1
        ];

        $indicadores = array_filter($my_user, function ($userIndicado) {
            return $userIndicado['indicador'] != null;
        });

        return Unilevel::transformHierarquiaNiveisUnilevel($indicadores);
    }

    public static function comissaoLevelMatriz($level){
        switch($level){
            case 1: return 0; break;
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
            case 7:
                return 5; break;
            case 8: return 15; break;

        }
    }
 
    public static function getHierarquiaComissaoMatriz($idComprador)
    {

        $indicadoresMatriz = Dados::getNivelMatrizUser($idComprador);
        $my_user = [];
        foreach($indicadoresMatriz as $dados){
            extract($dados);
            array_push($my_user,[
                'indicador' => Dados::getIndicador($idComprador),
                'comisao'   => Unilevel::comissaoLevelMatriz($level),
                'nivel' => $level,
            ]);

        }
        
        $indicadores = array_filter($my_user, function ($userIndicado) {
            return $userIndicado['indicador'] != null;
        });
        
        return $indicadores;
    }

    //retorna o valor da porcenta de cada nivel de comissão do unilevel
    public static function getvaluePorcentagemNivelUnilevel($nivel)
    {
        $read = new Read();
        $read->ExeRead('niveis', 'where nivel=:nivel', 'nivel=' . $nivel);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            return $comisao;
        }
    }

    public static function getPocentagemPlanoCarreira($parcial, $total)
    {
        return ($parcial * 100) / $total;
    }
}
