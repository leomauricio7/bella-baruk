<?php

class Dados
{
    //pega todos os pedidos onde o pagamento foi feito por bonus de comissão
    public static function getBySizePedidos($user)
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where id_user=:user and payment="bonus"', 'user=' . $user);
        return $read->getRowCount();
    }
    //pega os dados de um pedido
    public static function getDadosPedido($id)
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where idPedido=:id', 'id=' . $id);
        return $read->getRowCount() > 0 ? $read->getResult()[0] : null;
    }
    //pega od dados bancarios de um usuário
    public static function getDadosBancarios($user)
    {
        $read = new Read();
        $read->ExeRead('conta_users', 'where id_user = ' . $user);
        return $read->getRowCount() > 0 ? $read->getResult()[0] : null;
    }
    //pega todos os saques de um usuário
    public static function getBySaques($user)
    {
        $read = new Read();
        $read->getSaques('where sq.id_user = ' . $user);
        return $read->getResult();
    }
    //pega todos os saques
    public static function getByAllSaques()
    {
        $read = new Read();
        $read->getSaques();
        return $read->getResult();
    }
    //pega todas as transferencias enviadas de um usuario
    public static function getByTransferencias($user)
    {
        $read = new Read();
        $read->getTransferencias('where id_user_origem = ' . $user);
        return $read->getResult();
    }
    //pega todas as transferencias enviadas de um usuario
    public static function getByTransferenciasRecebidas($user)
    {
        $read = new Read();
        $read->getTransferencias('where id_user_destino = ' . $user);
        return $read->getResult();
    }
    //pega todas as transferencias
    public static function getByAllTransferencias()
    {
        $read = new Read();
        $read->getTransferencias();
        return $read->getResult();
    }
    //pega o total de saques que um usuário efetuou
    public static function getBySizeSaque($user)
    {
        $read = new Read();
        $read->ExeRead('saques', 'where id_user = ' . $user);
        return $read->getRowCount();
    }
    //pega o total de transferências de um usuário
    public static function getBySizeTransferencias($user)
    {
        $in = new Read();
        $out = new Read();
        $in->ExeRead('transacoes', 'where id_user_origem = ' . $user);
        $out->ExeRead('transacoes', 'where id_user_destino = ' . $user);
        return $in->getRowCount() + $out->getRowCount();
    }
    //pega o id do usuário pelo login
    public static function getById($slug)
    {
        $read = new Read();
        $read->ExeRead('users', 'where slug = "' . $slug . '"');

        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                return $id;
            }
        }
    }
    //pega  nivel do usuario namatriz
    public static function getNivelMatrizUser($id)
    {
        $read = new Read();
        $read->ExeRead('matriz', 'where id_user = ' . $id);
        return $read->getResult();
    }
    //pega todos os usuarios pelo id
    public static function getUsersAll($id)
    {
        $read = new Read();
        $read->ExeRead('users', 'where id > ' . $id);
        return $read->getResult();
    }
    //pega todos os usaros do tipo vendedor
    public static function getUsersAllVendedor()
    {
        $read = new Read();
        $read->ExeRead('users', 'where tipo_user = 2');
        return $read->getResult();
    }
    //pega todos os dados de um matriz
    public static function getUsersMatriz($id)
    {
        $read = new Read();
        $read->ExeRead('matriz', 'where id_user_matriz = ' . $id);
        return $read->getResult();
    }
    //função de ppegar os dados de no na matriz
    public static function getByNoMatriz($id, $no, $level)
    {
        $read = new Read();
        $read->ExeRead('matriz', 'where id_user_matriz=:id and id_no=:no and level=:level', 'id=' . $id . '&no=' . $no . '&level=' . $level);
        return $read->getResult();
    }

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
            if ($fisrt_adesao == 1) {
                return true;
            }
            if ($status == "ativo") {
                return true;
            }
        }
        return false;
    }

    public static function calculaDesconto($valor, $desconto)
    {
        $vlr_bruto = $desconto * $valor;
        $desconto = $vlr_bruto / 100;
        return $valor - $desconto;
    }

    public static function getDescriptionProduct($id)
    {
        $read = new Read();
        $read->ExeRead('products', 'where id=:id', 'id=' . $id);
        return $read->getResult()[0]['titulo'];
    }

    public static function getPedidosDistibuidor()
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where responsavel=:user', 'user=' . $_SESSION['idUser']);
        return $read->getResult();
    }

    public static function getVendasOneProduto($produto, $pedido)
    {
        $totalDeProdutosVendidos = 0;
        $read = new Read();
        $read->ExeRead('produtos_pedido', 'where id_produto=:produto and id_pedido=:pedido', 'produto=' . $produto . '&pedido=' . $pedido);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $totalDeProdutosVendidos += $quantidade;
        }
        return $totalDeProdutosVendidos;
    }

    public static function produtoEstoque($produto, $quantidade)
    {
        $vendas = 0;
        $pedidos = Dados::getPedidosDistibuidor();
        foreach ($pedidos as $dados) {
            extract($dados);
            $vendas += Dados::getVendasOneProduto($produto, $idPedido);
        }
        return $quantidade - $vendas;
    }
    //pegando o valor de um produto
    public static function getValueProduct($id, $tipo = null, $user = null)
    {
        $value = 0;
        $read = new Read();
        $read->ExeRead('products', 'where id=:id', 'id=' . $id);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if ($user != null) {
                if (Dados::existePlanoAtivo($user == null ? $_SESSION['idUser'] : $user)) {
                    $value = $preco / 2;
                    return number_format($value, 2, ",", "");
                } else if (isset($_SESSION['carrinho'])) {
                    if (Dados::verificaSeExisteDePlanoAtivacaoNoPedido()) {
                        $value = $preco / 2;
                        return number_format($value, 2, ",", "");
                    } else {
                        $value = $preco;
                        return number_format($value, 2, ",", "");
                    }
                } else {
                    $value = $preco;
                    return number_format($value, 2, ",", "");
                }
            } else if ($tipo == 3) {
                return number_format(Dados::calculaDesconto($preco / 2, 18), 2, ",", "");
            } else if ($tipo == 4) {
                return number_format(Dados::calculaDesconto($preco / 2, 9), 2, ",", "");
            } else if (Dados::existePlanoAtivo($user == null ? $_SESSION['idUser'] : $user)) {
                $value = $preco / 2;
                return number_format($value, 2, ",", "");
            } else if (isset($_SESSION['carrinho'])) {
                if (Dados::verificaSeExisteDePlanoAtivacaoNoPedido()) {
                    $value = $preco / 2;
                    return number_format($value, 2, ",", "");
                } else {
                    $value = $preco;
                    return number_format($value, 2, ",", "");
                }
            } else {
                $value = $preco;
                return number_format($value, 2, ",", "");
            }

            return number_format($value, 2, ",", "");
        }
    }

    ///verifica se existe algum plano de ativação valido
    public static function existePlanoAtivo($user)
    {
        $date = date('Y-m-d');
        $read = new Read();
        $read->ExeRead('user_adesao', 'WHERE id_user=:id', 'id=' . $user);
        //$read->ExeRead('user_adesao', "WHERE id_user=$user AND data_validade >= '$date'");
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                if (strtotime($data_validade) > strtotime($date)) {
                    return true;
                } else if (strtotime($data_validade) == strtotime($date)) {
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
        $dp_pedidos = Dados::totalValorPedidosBonus($user);
        $dp_saques = Dados::totalValorSaques($user);
        $dp_transferencias = Dados::totalValorTransferencias($user);
        $at_transferencias = Dados::getTotalValorTransferencias($user);
        $read->ExeRead('comissoes', 'where id_user_recebedor=:user', 'user=' . $user);
        if ($read->getRowCount() > 0) {
            foreach ($read->getResult() as $dados) {
                extract($dados);
                $total += $valor;
            }
            $total = ($total - ($dp_saques + $dp_transferencias + $dp_pedidos)) + $at_transferencias;
            return number_format($total, 2, ",", "");
        } else {
            $total = ($total - ($dp_saques + $dp_transferencias + $dp_pedidos)) + $at_transferencias;
            return number_format($total, 2, ",", "");
        }
    }

    public static function totalValorTransferencias($user)
    {
        $read = new Read();
        $read->getTransferencias('where id_user_origem = ' . $user);
        $total = 0;
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor_bruto;
        }
        return $total;
    }

    public static function getTotalValorTransferencias($user)
    {
        $read = new Read();
        $read->getTransferencias('where id_user_destino = ' . $user);
        $total = 0;
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor_bruto;
        }
        return $total;
    }

    public static function totalValorSaques($user)
    {
        $read = new Read();
        $read->getSaques('where sq.id_user= ' . $user . ' and sq.status = "aprovado"');
        $total = 0;
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor_bruto;
        }
        return $total;
    }

    public static function totalValorPedidosBonus($user)
    {
        $read = new Read();
        $read->ExeRead('pedidos', 'where id_user= ' . $user . ' and payment = "bonus"');
        $total = 0;
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $total += $valor;
        }
        return $total;
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
    // valdia comissão 
    public static function validaComissao($id_user_recebedor, $id_user_comprador, $valor_send, $tipo)
    {
        $read  = new Read();
        $read->getComisaoUser("where (id_user_comprador = $id_user_comprador) and (id_user_recebedor = $id_user_recebedor) and tipo = '$tipo'");
        if ($read->getRowCount() > 0) {
            $now = date('Y-m-d');
            foreach ($read->getResult() as $dados) {
                extract($dados);
                if ($valor == $valor_send && $data == $now) {
                    return false;
                }
            }
        }
        return true;
    }
    //seta a primeira comissão para usuário que indicou
    public static function setComissao($user, $porcentagem, $compra, $indicador_temp, $value, $tipo)
    {
        $valor = $value == null ? Dados::porcentagem_xn($porcentagem, $compra) : $value;
        $indicador = $indicador_temp == null ? Dados::getIndicador($user) : $indicador_temp;
        if ($valor > 0) {
            if (Dados::existePlanoAtivo($indicador)) {
                if (Dados::validaComissao($indicador, $user, $valor, $tipo)) {
                    $save = new Create();
                    $dados = ['id_user_recebedor' => $indicador, 'id_user_comprador' => $user, 'valor' => $valor, 'tipo' => $tipo];
                    $save->ExeCreate('comissoes', $dados);
                    if ($save->getResult()) {
                        return ['status' => true, 'msg' => 'Comissão setada com sucesso.'];
                    } else {
                        return ['status' => false, 'msg' => 'Error na procesamento da comissão.'];
                    }
                } else {
                    return ['status' => false, 'msg' => 'Duplicate Comissão.'];
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

    public static function verificaSeExistePlanoDeCarreiraAtivo($user, $nivel)
    {
        $read = new Read();
        $read->ExeRead('nivel_pontuacao_user', 'where id_user=:user AND id_nivel=:nivel', 'user=' . $user . '&nivel=' . $nivel);
        return $read->getRowCount() > 0 ? true : false;
    }

    public static function validaURLPageUser($page)
    {
        $read = new Read();
        $read->ExeRead('users', 'WHERE slug=:page', 'page=' . $page);
        return $read->getRowCount() > 0 ? true : false;
    }

    public static function verificaFirstCompra($user)
    {
        $read = new Read();
        $read->ExeRead('users', 'where id=:id', 'id=' . $user);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if ($fisrt_adesao == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function verificaSeExisteDePlanoAtivacaoNoPedido()
    {

        for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
            if (!isset($_SESSION['carrinho'][$i])) {
                $i += 1;
            }
            if (Dados::verificaTipoProduto($_SESSION['carrinho'][$i]['id'])) {
                return true;
            }
        }
        return false;
    }

    public static function verificaTipoProduto($id_produto)
    {
        $read = new Read();
        $read->ExeRead('products', 'where id=:id', 'id=' . $id_produto);
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if ($id_tipo == 1) {
                return true;
            } else {
                return false;
            }
        }
    }

    public static function getABreviateUser($name)
    {
        $string = explode(" ", $name);
        $p1 = substr($string[0], 0, 1);
        $p2 = substr($string[1], 0, 1);
        return strtoupper($p1 . $p2);
    }

    public static function getCor()
    {
        return sprintf("%02X%02X%02X", mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }

    public static function getProdutosEstoque($id_user, $user=null)
    {
        $read = new Read();
        $read->ExeRead('estoque_distribuidor', 'where id_responsavel=:id', 'id=' . $id_user);
        return $read->getResult();
    }

    public static function existeProdutoEstoque($produto, $user)
    {
        $read = new Read();
        $read->ExeRead('estoque_distribuidor', 'where id_produto=:produto and id_responsavel=:id', 'produto=' . $produto . '&id=' . $user);
        return $read->getRowCount() > 0 ? $read->getResult()[0] : null;
    }

    public static function setProdutoEstoque($produto, $user, $quantidade)
    {
        $estoque = Dados::existeProdutoEstoque($produto, $user);
        if ($estoque != null) {
            $save = new Update();
            $dados = [
                'quantidade' => $quantidade + $estoque['quantidade'],
            ];
            $save->ExeUpdate('estoque_distribuidor', $dados, 'where id=:id', 'id=' . $estoque['id']);
        } else {
            $save = new Create();
            $dados = [
                'id_produto' => $produto,
                'quantidade' => $quantidade,
                'id_responsavel' => $user,
            ];
            $save->ExeCreate('estoque_distribuidor', $dados);
        }
    }

    public static function getValuePedidoTemp($tipoUser, $cliente=null)
    {
        $valorPedido = 0;
        if (isset($_SESSION['carrinho'])) {

            for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
                //verifica se o indice é valido
                if (!isset($_SESSION['carrinho'][$i])) {
                    $i += 1;
                }
                if ($tipoUser == 3 || $tipoUser == 4) {
                    $valorPedido += Dados::getValueProduct($_SESSION['carrinho'][$i]['id'], $tipoUser, $cliente) * $_SESSION['carrinho'][$i]['quantidade'];
                } else {
                    $valorPedido += Dados::getValueProduct($_SESSION['carrinho'][$i]['id'], null, $cliente) * $_SESSION['carrinho'][$i]['quantidade'];
                }
            }
        }
        return number_format($valorPedido,2,",","");
    }

    public static function getTotalPedidosDistribuidor($id){
        $read = new Read();
        $read->ExeRead('pedidos', 'where responsavel = ' . $id);
        return $read->getRowCount();
    }
}
