<?php

class Unilevel {

    public static function getTotalUsersAtivos($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "ativo"','id='.$id);
        return $read->getRowCount();
    }

    public static function getTotalUsersInativos($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "inativo"','id='.$id);
        return $read->getRowCount();
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
        $read->ExeRead('users', 'where status = "ativo"');
        return $read->getRowCount();
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