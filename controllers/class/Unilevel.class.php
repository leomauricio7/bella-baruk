<?php

class Unilevel {

    public static function getTotalUsersAtivos($id){
        $total = 0;
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "ativo"','id='.$id);
        if($read->getRowCount() > 0){
            foreach($read->getResult() as $dados){
                extract($dados);
                if(Dados::existePlanoAtivo($id)){
                    $total+=1;
                }
            }
        }
        return $total;
    }

    public static function getTotalUsersInativos($id){
        $total = 0;
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id','id='.$id);
        if($read->getRowCount() > 0){
            foreach($read->getResult() as $dados){
                extract($dados);
                if(!Dados::existePlanoAtivo($id)){
                    $total+=1;
                }
            }
        }
        return $total;
    }

    public static function getTotalUsersIndicados($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id','id='.$id);
        return $read->getRowCount();
    }

    public static function getTotalUsersMaster(){
        $read = new Read();
        $read->ExeRead('users');
        return $read->getRowCount();
    }

    public static function getTotalUsersAtivosMaster(){
        $read = new Read();
        $total = 0;
        $read->ExeRead('users', 'where status = "ativo"');
        if($read->getRowCount() > 0){
            foreach($read->getResult() as $dados){
                extract($dados);
                if(Dados::existePlanoAtivo($id)){
                    $total+=1;
                }
            }
        }
        return $total;
    }

    public static function getSaldoTotalComprasPagas(){
        $read = new Read();
        $read->ExeRead('pedidos', 'where id_status=3');
        $total = 0;
        foreach($read->getResult() as $dados){
            extract($dados);
            $total+=$valor;
        }
        return number_format($total,2, ",", "");
    }

    public static function getTotalProdutos(){
        $read = new Read();
        $read->ExeRead('products');
        return $read->getRowCount();
    }
    //retorna os 7 niveis(indicador) de comissoes do meu cadastro
    public static function getHierarquiaComissaoUnilevel($idComprador){
        $read = new Read();
        $my_user = [];
        $my_user[7]=[
            'indicador' => Dados::getIndicador($idComprador),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(7)
        ];
        $my_user[6]=[
            'indicador' => Dados::getIndicador($my_user[7]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(6)
        ];
        $my_user[5]=[
            'indicador' => Dados::getIndicador($my_user[6]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(5)
        ];
        $my_user[4]=[
            'indicador' => Dados::getIndicador($my_user[5]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(4)
        ];
        $my_user[3]=[
            'indicador' => Dados::getIndicador($my_user[4]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(3)
        ];
        $my_user[2]=[
            'indicador' => Dados::getIndicador($my_user[3]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(2)
        ];
        $my_user[1]=[
            'indicador' => Dados::getIndicador($my_user[2]['indicador']),
            'comisao'   => Unilevel::getvaluePorcentagemNivelUnilevel(1)
        ];
        return $my_user;
    } 

    //retorna o valor da porcenta de cada nivel de comissão do unilevel
    public static function getvaluePorcentagemNivelUnilevel($nivel){
        $read = new Read();
        $read->ExeRead('niveis', 'where nivel=:nivel', 'nivel='.$nivel);
        foreach($read->getResult() as $dados){
            extract($dados);
            return $comisao;
        }
    }
     

}