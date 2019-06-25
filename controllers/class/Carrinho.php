<?php

require_once '../conf.php';
require_once '../../vendor/autoload.php';

if ($_POST) {

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $idProduct = filter_input(INPUT_POST, 'idProduct', FILTER_SANITIZE_STRING);
    $idPedido = filter_input(INPUT_POST, 'idPedido', FILTER_SANITIZE_STRING);
    $valorPedido = filter_input(INPUT_POST, 'totalPedido', FILTER_SANITIZE_STRING);
    switch ($type) {
            //init session
        case 1:
            initSession();
            break;
            //add product
        case 2:
            addProduct($idProduct);
            break;
            //remove product
        case 3:
            removeProduct($idProduct);
            break;
            //destroy pedido
        case 4:
            destroySession();
            break;
            //remove one product
        case 5:
            removeOneProduct($idProduct);
            break;
            //close pedido
        case 6:
            closePedido($idPedido, $valorPedido);
            break;
            //da baixa
        case 7:
            $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
            if ($payment != null) {
                daBaixa($idPedido, $payment);
            } else {
                daBaixa($idPedido);
            }
            break;
        case 8:
            ativaDesconto();
            break;
            //regra padrão
        default:
            return false;
    }
}

//inicia a sessão
function initSession()
{
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
        echo json_encode(array('status' => 200, 'msg' => 'Sessão iniciada com sucesso'));
    } else {
        echo json_encode(array('status' => 409, 'msg' => 'Sessão já iniciada.'));
    }
}

function ativaDesconto()
{
    $save = new Update();
    $dados = ['status' => 'ativo'];
    $save->ExeUpdate('users', $dados, 'where id=:id', 'id=' . $_SESSION['idUser']);
    if ($save->getResult()) {
        echo json_encode(array('status' => 200, 'msg' => 'Desconto ativado com sucesso'));
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Erro ao ativar descontos.'));
    }
}
//cria um registro de ativação para o usuario
function saveAdesao($user, $qt)
{
    $dias = $qt * 30;
    $save = new Create();
    $start = date('Y/m/d');
    $end = date('Y/m/d', strtotime('+' . $dias . ' days'));
    $dados = ['id_user' => $user, 'data_ativacao' => $start, 'data_validade' => $end];
    $save->ExeCreate('user_adesao', $dados);
    if ($save->getResult()) {
        return true;
    } else {
        return false;
    }
}

//ativa usuario na primeira compra efetuada
function ativaUserAdesao($user)
{
    $update = new Update();
    $dados = ["status" => "ativo", "fisrt_adesao" => true];
    $update->ExeUpdate('users', $dados, 'where id=:id', 'id=' . $user);
    if ($update->getResult()) {
        return true;
    } else {
        return false;
    }
}

//verifica se o usurairo ja fez uma compra no valor de R$150.00
function verificaFirstCompra($user)
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

//pega o id do user do pedido
function getUserPedido($idPedido)
{
    $read = new Read();
    $read->ExeRead('pedidos', 'where idPedido=:id', 'id=' . $idPedido);
    foreach ($read->getResult() as $dados) {
        extract($dados);
        return array('user' => $id_user, 'valor' => $valor);
    }
}
//verifica se o tipo de produto é um plano de ativação
function verificaTipoProduto($id_produto)
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
//verifica se neste pedido existe algum plano de ativação
function verificaSeExisteDePlanoAtivacaoNoPedido($idPedido)
{
    //$totalPlanos = 0;
    $read = new Read();
    $read->ExeRead('produtos_pedido', 'where id_pedido=:id', 'id=' . $idPedido);
    foreach ($read->getResult() as $dados) {
        extract($dados);
        if (verificaTipoProduto($id_produto)) {
            return true;
        }
    }
    return false;
    //return array('status' => $totalPlanos > 0 ? true : false, 'total' => $totalPlanos);
}
//verifica se no pedidos existe mas de uum produto
function verificaSeNoPedidoExisteMasdeUmProduto($idPedido)
{
    $read = new Read();
    $read->ExeRead('produtos_pedido', 'where id_pedido=:id', 'id=' . $idPedido);
    return $read->getRowCount();
}
//seta a pontuacao da compra efetivada
function setPontuacao($user, $pontos)
{
    $update = new Update();
    $newPontos = $pontos + Dados::getPontuacao($user);
    $dados = ["pontuacao" => $newPontos];
    $update->ExeUpdate('users', $dados, 'where id=:id', 'id=' . $user);
    if ($update->getResult()) {
        return true;
    } else {
        return false;
    }
}

//da baixa no pedido
function daBaixa($idPedido, $payment = null)
{
    $update = new Update();
    $dados = ["dado_baixa" => "sim", "id_status" => 3, 'payment' => $payment != null ? $payment : 'dinheiro'];
    $update->ExeUpdate('pedidos', $dados, 'where idPedido=:id', 'id=' . $idPedido);
    if ($update->getResult()) {
        $user = getUserPedido($idPedido)['user'];
        $valor = getUserPedido($idPedido)['valor'];
        if (setPontuacao($user, $valor)) {
            //setando pontuacao unilevel
            $userRecebedoresUnilevel = Unilevel::getHierarquiaComissaoUnilevel($user);
            foreach ($userRecebedoresUnilevel as $unilevel) {
                extract($unilevel);
                setPontuacao($indicador, $valor);
            }

            if (verificaFirstCompra($user)) {
                //comissão matriz
                if (verificaSeExisteDePlanoAtivacaoNoPedido($idPedido)) {
                    saveAdesao($user, 1);
                    $userRecebedoresMatriz = Unilevel::getHierarquiaComissaoMatriz($user);
                    foreach ($userRecebedoresMatriz as $matriz) {
                        extract($matriz);
                        Dados::setComissao($user, null, null, $indicador, $comisao, 'matriz');
                    }
                }

                if (verificaSeNoPedidoExisteMasdeUmProduto($idPedido) > 0) {
                    //comissão unilevel
                    $userRecebedoresUnilevel = Unilevel::getHierarquiaComissaoUnilevel($user);
                    $valor_bruto = verificaSeExisteDePlanoAtivacaoNoPedido($idPedido) ? $valor - 50 : $valor;
                    foreach ($userRecebedoresUnilevel as $unilevel) {
                        extract($unilevel);
                        Dados::setComissao($user, $comisao, $valor_bruto, $indicador, null, 'unilevel');
                    }
                }

                echo json_encode(
                    array(
                        'status'    => 200,
                        'msg'       => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> O usuário ja efetuou a primeira compra, foi setada as comissões.'
                    )
                );
            } else {
                if ($valor >= 150) {
                    if (!verificaFirstCompra($user)) {
                        $ativo = ativaUserAdesao($user);
                        if ($ativo) {
                            $adesao = saveAdesao($user, 1);
                            if ($adesao) {
                                $Derramento = new Derramamento();
                                $Derramento->saveUserMatriz($user);
                                $statusComissao = Dados::setComissao($user, 25, $valor - 50, null, null, 'unilevel');
                                if ($statusComissao['status']) {
                                    $userRecebedoresMatriz = Unilevel::getHierarquiaComissaoMatriz($user);
                                    foreach ($userRecebedoresMatriz as $matriz) {
                                        extract($matriz);
                                        Dados::setComissao($user, null, null, $indicador, $comisao, 'matriz');
                                    }
                                    echo json_encode(array('status' => 200, 'msg' => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> O usuário foi ativado com sucesso.'));
                                } else {
                                    echo json_encode(array('status' => 200, 'msg' => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> O usuário foi ativado com sucesso, mas a comissão não foi setada entre em contato com o suporte. ERROR:' . $statusComissao['msg']));
                                }
                            }
                        }
                    } else {
                        echo json_encode(array('status' => 200, 'msg' => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> Usuário ja efetuou a adesão.'));
                    }
                } else {
                    echo json_encode(array('status' => 200, 'msg' => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> Não houve checagem se a primeira compra foi realizada, devido ao valor do pedido ser menor que R$150,00.'));
                }
            }
        } else {
            echo json_encode(array('status' => 200, 'msg' => 'Pedido dado baixa com sucesso.<br><strong>OBS:</strong> ocorreram erros ao setar a pontuaçao, entre em contato com o suporte.'));
        }
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Internal serve error.'));
    }
}

function closePedido($idPedido, $valorPedido)
{
    $savePedido = new Create();
    $saveItemPedido = new Create();

    $dadosPedido = [
        'idPedido' => $idPedido,
        'id_user' => $_SESSION['idUser'],
        'id_status' => 1,
        'valor' => $valorPedido,
        'dado_baixa' => 'nao',
    ];

    $savePedido->ExeCreate('pedidos', $dadosPedido);

    if ($savePedido->getResult()) {
        for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
            $dadosItemPedido = [
                'id_produto' => $_SESSION['carrinho'][$i]['id'],
                'id_pedido' => $idPedido,
                'quantidade' => $_SESSION['carrinho'][$i]['quantidade'],
            ];
            $saveItemPedido->ExeCreate('produtos_pedido', $dadosItemPedido);
        }
        unset($_SESSION['carrinho']);
        echo json_encode(array('status' => 200, 'msg' => 'Pedido finalizado com sucesso.'));
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Internal serve error.'));
    }
}

function existProduct($idProduct)
{
    $read = new Read();
    $read->ExeRead('products', 'where id=:id', 'id=' . $idProduct);
    if ($read->getResult()) {
        return true;
    } else {
        return false;
    }
}

function existProductCarrinho($idProduct)
{
    for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
        if ($_SESSION['carrinho'][$i]['id'] == $idProduct) {
            $_SESSION['carrinho'][$i] = ['id' => $idProduct, 'quantidade' => $_SESSION['carrinho'][$i]['quantidade'] + 1];
            return true;
            break;
        }
    }
    return false;
}

function removeProductCarrinho($idProduct)
{
    for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
        if (!isset($_SESSION['carrinho'][$i])) {
            $i += 1;
        }
        if ($_SESSION['carrinho'][$i]['id'] == $idProduct) {
            unset($_SESSION['carrinho'][$i]);
            break;
        }
    }
}

function removeOneProductCarrinho($idProduct)
{
    for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
        if (!isset($_SESSION['carrinho'][$i])) {
            $i += 1;
        }
        if ($_SESSION['carrinho'][$i]['id'] == $idProduct) {
            $_SESSION['carrinho'][$i] = ['id' => $idProduct, 'quantidade' => $_SESSION['carrinho'][$i]['quantidade'] - 1];
            break;
        }
    }
}

function addProduct($idProduct)
{
    if (existProduct($idProduct)) {
        if (!existProductCarrinho($idProduct)) {
            $_SESSION['carrinho'][] = ['id' => $idProduct, 'quantidade' => 1];
        }
        echo json_encode(array('status' => 200, 'msg' => 'Produto adicionado ao carrinho.', 'carrinho' => $_SESSION['carrinho']));
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Produto não encontrado.'));
    }
}

function removeProduct($idProduct)
{
    if (existProduct($idProduct)) {
        removeProductCarrinho($idProduct);
        echo json_encode(array('status' => 200, 'msg' => 'Produto removido do carrinho.', 'carrinho' => $_SESSION['carrinho']));
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Produto não encontrado.'));
    }
}

function removeOneProduct($idProduct)
{
    if (existProduct($idProduct)) {
        removeOneProductCarrinho($idProduct);
        echo json_encode(array('status' => 200, 'msg' => '1 Produto removido do carrinho.', 'carrinho' => $_SESSION['carrinho']));
    } else {
        echo json_encode(array('status' => 500, 'msg' => 'Produto não encontrado.'));
    }
}

function destroySession()
{
    unset($_SESSION['carrinho']);
    echo json_encode(array('status' => 200, 'msg' => 'Carrinho removido com sucesso'));
}
