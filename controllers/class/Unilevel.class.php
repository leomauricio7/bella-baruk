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

}