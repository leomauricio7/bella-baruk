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

    // //commissões de um vendedor
    // public static function getSaldo($user) {
    //     $saldo = 0;
    //     $read = new Read();
    //     $read->ExeRead('comissoes', 'where id_user = '.$user);
    //     foreach($read->getResult() as $user){
    //         extract($user);
    //         $saldo = $valor;
    //     }
    //     return $saldo;
    // }

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

    ///verifica se existe algum plano de ativação valido
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

    public static function getStatus($user){
        if(!Dados::verificaAdesão($user)){
            if(Dados::existePlanoAtivo($user)){
                return  "<span class='badge badge-soft-success'>Ativo</span>";
            }else{
                return  "<span class='badge badge-soft-danger'>Inativo</span>";
            }
        }else{
            return  "<span class='badge badge-soft-danger'>Inativo</span>";
        }
    }

    public static function getComissao($user){
        $total = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user_recebedor=:user', 'user='.$user);
        if($read->getRowCount() > 0){
            foreach($read->getResult() as $dados){
                extract($dados);
                $total+=$valor;
            }
            return number_format($total, 2, ",","");
        }else{
            return number_format($total, 2, ",","");
        }
    }
    //caculo de porcentagem
    public static function porcentagem_xn($porcentagem,$total){
        return ( $porcentagem / 100 ) * $total;
    }
    //pega o id do usuario que lhe indicou
    public static function getIndicador($user){
        $read = new Read();
        $read->ExeRead('users', 'where id=:id', 'id='.$user);
        if($read->getRowCount() > 0){
            foreach($read->getResult() as $dados){
                extract($dados);
                return $indicador;
            }
        }else{
            return false;
        }
    }
    //seta a primeira comissão para usuário que indicou
    public static function setComissao($user, $porcentagem, $compra, $indicador_temp){
        $valor = Dados::porcentagem_xn($porcentagem,$compra);
        $indicador = $indicador_temp == null ? Dados::getIndicador($user) : $indicador_temp;
        if(Dados::existePlanoAtivo($indicador)){
            $save = new Create();
            $dados = ['id_user_recebedor'=>$indicador, 'id_user_comprador'=>$user, 'valor'=>$valor];
            $save->ExeCreate('comissoes',$dados);
            if($save->getResult()){
                return ['status'=>true, 'msg'=> 'Comissão setda com sucesso.'];
            }else{
                return ['status'=>false, 'msg'=> 'Error na procesamento da comissão.'];
            }
        }else{
            return ['status'=>false, 'msg'=> 'User indicator is not active.'];
        }

    }

    public static function getFilhos($indicador,$derramamento = null){
        $array = [];
        $read = new Read();
        $read->ExeRead('users','where indicador = '.$indicador.' AND status = "ativo" ');
        $filhos = $read->getResult();
        return $filhos;
    }

    public static function montaNivel($data){
        $qualificadores= [];
        $restantes =[];
        if(count($data) > 2){
            for ($i = 0; $i < 2; $i++) {
               array_push($qualificadores, $data[$i]);
               unset($data[$i]);
            }
            return ['qualificadores'=>$qualificadores,'restantes'=>$data];
        }
        return ['qualificadores'=>$data,'restantes'=>[]];
       
    }
}
