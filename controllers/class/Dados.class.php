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
    //verifica se o usuario ja fez a primeira compra
    public static function verificaAdesão($user) {
        $st = null;
        $read = new Read();
        $read->ExeRead('users', 'where id = '.$user);
        foreach($read->getResult() as $user){
            extract($user);
            $st = $fisrt_adesao;
        }
        if($st == 0){
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

    ///verifica se existe algum plano de ativação vaido
    public static function existePlanoAtivo($user){
        $date = date('Y/m/d');
        $read = new Read();
        $read->ExeRead('user_adesao', 'where id_user=:id AND data_validade >= :date', 'id='.$user.'&date='.$date);
        if($read->getRowCount() > 0){
            return true;
        }else{
            return false;
        }
            
    }
    //pega os dias restantes do plano ativo
    public static function diasRestantesAtivacao($user){
        $inicio = null;
        $fim = null;
        $date = date('Y/m/d');
        $read = new Read();
        $read->ExeRead('user_adesao', 'where id_user=:id AND data_validade >= :date', 'id='.$user.'&date='.$date);
        foreach($read->getResult() as $dados){
            extract($dados);
            $inicio = new DateTime($data_ativacao);
            $fim = new DateTime($data_validade);
        }
        $intval = $inicio->diff($fim);
        return $intval->days;
    }

}
