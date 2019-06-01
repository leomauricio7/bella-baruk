<?php

class Dados
{

    //indicados de um usuário master
    public static function getIndicados($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where indicador = ' . $user);
        return $read->getRowCount();
    }

    public static function getUsersIndicados($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where indicador = ' . $user);
        return $read->getResult();
    }
    //function depegar os dados de um usuário
    public static function getDadosUser($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where id = ' . $user);
        return $read->getResult();
    }

    //pontuacao de um vendendor
    public static function getPontuacao($user)
    {
        $pontos = 0;
        $read = new Read();
        $read->ExeRead('users', 'where id = ' . $user);
        foreach ($read->getResult() as $user) {
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
    public static function getCompras($user)
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where id_user = ' . $user);
        return $read->getRowCount();
    }

    //verifica o status do usuário    
    public static function verificaStatus($user)
    {
        $st = null;
        $read = new Read();
        $read->ExeRead('users', 'where id = ' . $user);
        foreach ($read->getResult() as $user) {
            extract($user);
            $st = $status;
        }
        if ($st == 'inativo') {
            return true;
        } else {
            return false;
        }
    }
    //verifica se o usuario ja fez a primeira compra
    public static function verificaAdesão($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where id = ' . $user);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if($fisrt_adesao == 1){
                return true;
            }
            if($status == "ativo"){
                return true;
            }
        }
        return false;

    }

    //pegando o valor de um produto
    public static function getValueProduct($id)
    {
        $value = 0;
        $read = new Read();
        $read->ExeRead('products', 'where id=:id', 'id=' . $id);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if (Dados::verificaAdesão($_SESSION['idUser'])) {
                $value = $preco / 2;
            } else {
                $value = $preco;
            }
        }
        return number_format($value, 2, ",", "");
    }

    ///verifica se existe algum plano de ativação valido
    public static function existePlanoAtivo($user)
    {
        $date = date('Y-m-d');
        $read = new Read();
        $read->ExeRead('user_adesao', 'WHERE id_user=:id', 'id='.$user);
        //$read->ExeRead('user_adesao', "WHERE id_user=$user AND data_validade >= '$date'");
        if ($read->getRowCount() > 0) {
            foreach($read->getResult() as $dados){
                extract($dados);
               if(strtotime($data_validade) > strtotime($date)){
                    return true;
               }else if(strtotime($data_validade) == strtotime($date)){
                   return true;
               }
            }
            return false;
        } else {
            return false;
        }
    }
    //pega os dias restantes do plano ativo
    public static function diasRestantesAtivacao($user)
    {
        $inicio = null;
        $fim = null;
        $date = date('Y-m-d');
        $read = new Read();
        $read->ExeRead('user_adesao', "where id_user= $user AND data_validade >= '$date'");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $inicio = new DateTime(date('d-m-Y'));
            $fim = new DateTime($data_validade);
        }
        $intval = $inicio->diff($fim);
        return $intval->days;
    }

    public static function getStatus($user)
    {
        if (Dados::verificaAdesão($user)) {
            if (Dados::existePlanoAtivo($user)) {
                return  "<span class='badge badge-soft-success'>Ativo</span>";
            } else {
                return  "<span class='badge badge-soft-danger'>Inativo</span>";
            }
        } else {
            return  "<span class='badge badge-soft-danger'>Inativo</span>";
        }
    }

    public static function getComissao($user)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user_recebedor=:user', 'user=' . $user);
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                $total += $valor;
            }
            return number_format($total, 2, ",", "");
        } else {
            return number_format($total, 2, ",", "");
        }
    }

    public static function getComissaoComprador($recebedor, $comprador)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user_recebedor = ' . $recebedor . ' AND id_user_comprador=' . $comprador);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor;
        }
        return number_format($total, 2, ",", "");
    }

    public static function getComissoesComprador($recebedor, $comprador)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user_recebedor = ' . $recebedor . ' AND id_user_comprador=' . $comprador);
        return $read->getResult();
    }

    public static function getComissaoAll($user)
    {
        $total = 0;
        $read = new Read();
        $read->ExeRead('comissoes', 'where id_user_recebedor=:user', 'user=' . $user);
        return $read->getResult();
    }
    //caculo de porcentagem
    public static function porcentagem_xn($porcentagem, $total)
    {
        return ($porcentagem / 100) * $total;
    }
    //pega o id do usuario que lhe indicou
    public static function getIndicador($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where id=:id', 'id=' . $user);
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                return $indicador;
            }
        } else {
            return false;
        }
    }
    //seta a primeira comissão para usuário que indicou
    public static function setComissao($user, $porcentagem, $compra, $indicador_temp, $value, $tipo)
    {
        $valor = $value == null ? Dados::porcentagem_xn($porcentagem, $compra) : $value;
        $indicador = $indicador_temp == null ? Dados::getIndicador($user) : $indicador_temp;
        if($valor > 0){
            if (Dados::existePlanoAtivo($indicador)) {
                $save = new Create();
                $dados = ['id_user_recebedor' => $indicador, 'id_user_comprador' => $user, 'valor' => $valor, 'tipo'=>$tipo];
                $save->ExeCreate('comissoes', $dados);
                if ($save->getResult()) {
                    return ['status' => true, 'msg' => 'Comissão setada com sucesso.'];
                } else {
                    return ['status' => false, 'msg' => 'Error na procesamento da comissão.'];
                }
            } else {
                return ['status' => false, 'msg' => 'Usuário indicador esta inativo ou não existe usuário raiz.'];
            }
        }

    }

    public static function getFilhos($indicador, $derramamento = null)
    {
        $array = [];
        $read = new Read();
        $read->ExeRead('users', 'where indicador = ' . $indicador . ' AND status = "ativo" ');
        $filhos = $read->getResult();
        return $filhos;
    }

    public static function montaNivel($data)
    {
        $qualificadores = [];
        $restantes = [];
        if (count($data) > 2) {
            for ($i = 0; $i < 2; $i++) {
                array_push($qualificadores, $data[$i]);
                unset($data[$i]);
            }
            return ['qualificadores' => $qualificadores, 'restantes' => $data];
        }
        return ['qualificadores' => $data, 'restantes' => []];
    }

    public static function getComissaoNiveis($idRecebedor)
    {
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        $t4 = 0;
        $t5 = 0;
        $t6 = 0;
        $t7 = 0;
        $c1 = 0;
        $c2 = 0;
        $c3 = 0;
        $c4 = 0;
        $c5 = 0;
        $c6 = 0;
        $c7 = 0; //comissão de usuarios por níveis
        foreach (Dados::getUsersIndicados($idRecebedor) as $raiz) {
            //1º nivel
            extract($raiz);
            $c1 += Dados::getComissaoComprador($idRecebedor, $id);
            $t1++;
            //2º nível
            $n2 = Dados::getUsersIndicados($id);
            for ($i = 0; $i < count($n2); $i++) {
                $c2 += Dados::getComissaoComprador($idRecebedor, $n2[$i]['id']);
                $t2++;
                //3º nível
                $n3 = Dados::getUsersIndicados($n2[$i]['id']);
                for ($j = 0; $j < count($n3); $j++) {
                    $c3 += Dados::getComissaoComprador($idRecebedor, $n3[$j]['id']);
                    $t3++;
                    //4º nível
                    $n4 = Dados::getUsersIndicados($n3[$j]['id']);
                    for ($k = 0; $k < count($n4); $k++) {
                        $c4 += Dados::getComissaoComprador($idRecebedor, $n4[$k]['id']);
                        $t4++;
                        //5º nível
                        $n5 = Dados::getUsersIndicados($n4[$k]['id']);
                        for ($l = 0; $l < count($n5); $l++) {
                            $c5 += Dados::getComissaoComprador($idRecebedor, $n5[$l]['id']);
                            $t5++;
                            //6º nível
                            $n6 = Dados::getUsersIndicados($n5[$l]['id']);
                            for ($m = 0; $m < count($n6); $m++) {
                                $c6 += Dados::getComissaoComprador($idRecebedor, $n6[$m]['id']);
                                $t6++;
                                //7º nível
                                $n7 = Dados::getUsersIndicados($n6[$m]['id']);
                                for ($n = 0; $n < count($n7); $n++) {
                                    $c7 += Dados::getComissaoComprador($idRecebedor, $n7[$n]['id']);
                                    $t7++;
                                }
                            }
                        }
                    }
                }
            }
        }

        return array(
            array('nivel' => 1, 'total' => $t1, 'comissao' => number_format($c1, 2, ",", "")),
            array('nivel' => 2, 'total' => $t2, 'comissao' => number_format($c2, 2, ",", "")),
            array('nivel' => 3, 'total' => $t3, 'comissao' => number_format($c3, 2, ",", "")),
            array('nivel' => 4, 'total' => $t4, 'comissao' => number_format($c4, 2, ",", "")),
            array('nivel' => 5, 'total' => $t5, 'comissao' => number_format($c5, 2, ",", "")),
            array('nivel' => 6, 'total' => $t6, 'comissao' => number_format($c6, 2, ",", "")),
            array('nivel' => 7, 'total' => $t7, 'comissao' => number_format($c7, 2, ",", ""))
        );
    }

    public static function getUsersNiveis($idRecebedor, $nivel)
    {
        $nivel1 = array();
        $nivel2 = array();
        $nivel3 = array();
        $nivel4 = array();
        $nivel5 = array();
        $nivel6 = array();
        $nivel7 = array();
        foreach (Dados::getUsersIndicados($idRecebedor) as $raiz) {
            //1º nivel
            extract($raiz);
            array_push(
                $nivel1,
                [
                    'id' => $id,
                    'nome' => $nome,
                    'slug' => $slug,
                    'indicador' => $indicador,
                    'email' => $email,
                    'status' => $status,
                    'telefone' => $telefone,
                    'created' => $created
                ]
            );
            //2º nível
            $n2 = Dados::getUsersIndicados($id);
            for ($i = 0; $i < count($n2); $i++) {
                array_push($nivel2, $n2[$i]);
                //3º nível
                $n3 = Dados::getUsersIndicados($n2[$i]['id']);
                for ($j = 0; $j < count($n3); $j++) {
                    array_push($nivel3, $n3[$j]);
                    //4º nível
                    $n4 = Dados::getUsersIndicados($n3[$j]['id']);
                    for ($k = 0; $k < count($n4); $k++) {
                        array_push($nivel4, $n4[$k]);
                        //5º nível
                        $n5 = Dados::getUsersIndicados($n4[$k]['id']);
                        for ($l = 0; $l < count($n5); $l++) {
                            array_push($nivel5, $n5[$l]);
                            //6º nível
                            $n6 = Dados::getUsersIndicados($n5[$l]['id']);
                            for ($m = 0; $m < count($n6); $m++) {
                                array_push($nivel6, $n6[$m]);
                                //7º nível
                                $n7 = Dados::getUsersIndicados($n6[$m]['id']);
                                for ($n = 0; $n < count($n7); $n++) {
                                    array_push($nivel7, $n7[$n]);
                                }
                            }
                        }
                    }
                }
            }
        }
        switch ($nivel) {
            case 1:
                return $nivel1;
                break;
            case 2:
                return $nivel2;
                break;
            case 3:
                return $nivel3;
                break;
            case 4:
                return $nivel4;
                break;
            case 5:
                return $nivel5;
                break;
            case 6:
                return $nivel6;
                break;
            case 7:
                return $nivel7;
                break;
        }
    }

    public static function verificaSeExistePlanoDeCarreiraAtivo($user,$nivel){
        $read = new Read();
        $read->ExeRead('nivel_pontuacao_user', 'where id_user=:user AND id_nivel=:nivel','user='.$user.'&nivel='.$nivel);
        return $read->getRowCount() > 0 ? true : false;
    }

    public static function validaURLPageUser($page){
        $read = new Read();
        $read->ExeRead('users', 'WHERE slug=:page', 'page='.$page);
        return $read->getRowCount() > 0 ? true : false;
    }
}
