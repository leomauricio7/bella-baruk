<?php

class Dados {

    //indicados de um usuário master
    public static function getIndicados($user) {
        $read = new Read();
        $read->ExeRead('users', 'where indicador = '.$user);
        return $read->getRowCount();
    }

    //pontuacao de um vendendor
    public static function getPontuacao($user) {
        $pontos = 0;
        $read = new Read();
        $read->ExeRead('users', 'where id = '.$user);
        foreach($read->getResult() as $user){
            extract($user);
            $pontos = $pontuacao;
        }
        return $pontos;
    }

    //commissões de um vendedor
    public static function getSaldo($user) {
        $saldo = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user = '.$user);
        foreach($read->getResult() as $user){
            extract($user);
            $saldo = $valor;
        }
        return $saldo;
    }

    //total de compras de um usuário
    public static function getCompras($user) {
        $read = new Read();
        $read->ExeRead('pedidos','where id_user = '.$user);
        return $read->getRowCount();
    }

    //verifica o status do usuário    
    public static function verificaStatus($user) {
        $st = null;
        $read = new Read();
        $read->ExeRead('users', 'where id = '.$user);
        foreach($read->getResult() as $user){
            extract($user);
            $st = $status;
        }
        if($st == 'inativo'){
            return true;
        }else{
            return false;
        }
    }

    //pegando o valor de um produto
    public static function getValueProduct($id){
        $value = 0;
        $read = new Read();
        $read->ExeRead('products', 'where id=:id', 'id='.$id);
        foreach($read->getResult() as $dados){
            extract($dados);
            $value = $preco;
        }
        return number_format($value,2, ",", "");
    }

}
