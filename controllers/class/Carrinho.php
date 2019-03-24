<?php

require_once '../conf.inc';
require_once '../../vendor/autoload.php';

if($_POST){

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $idProduct = filter_input(INPUT_POST, 'idProduct', FILTER_SANITIZE_STRING);
    $idPedido = filter_input(INPUT_POST, 'idPedido', FILTER_SANITIZE_STRING);
    $valorPedido = filter_input(INPUT_POST, 'totalPedido', FILTER_SANITIZE_STRING);

    switch($type){
        //init session
        case 1: initSession(); break;
        //add product
        case 2: addProduct($idProduct); break;
        //remove product
        case 3: removeProduct($idProduct); break;
        //destroy pedido
        case 4:  destroySession(); break;
        //remove one product
        case 5: removeOneProduct($idProduct); break;
        //close pedido
        case 6: closePedido($idPedido, $valorPedido); break;
        //da baixa
        case 7: dabaixa($idPedido); break;
        //regra padrão
        default: return false;
    }
}

function initSession(){
    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
        echo json_encode(array('status'=>200,'msg'=>'Sessão iniciada com sucesso'));
    }else{
        echo json_encode(array('status'=>409,'msg'=>'Sessão já iniciada.'));
    }
}

function daBaixa($idPedido){
    $update = new Update();
    $dados = ['dado_baixa'=>'sim','id_status'=>3];
    $update->ExeUpdate('pedidos', $dados, 'where id=:id', 'id='.$idPedido);
    if($update->getResult()){
        echo json_encode(array('status'=>200, 'msg'=>'Pedido dado baixa com sucesso..'));
    }else{
        echo json_encode(array('status'=>500, 'msg'=>'Internal serve error.'));
    }

}
function closePedido($idPedido, $valorPedido){
    $savePedido = new Create();
    $saveItemPedido = new Create();

    $dadosPedido = [
        'idPedido'=>$idPedido,
        'id_user'=> $_SESSION['idUser'],
        'id_status'=>1,
        'valor'=>$valorPedido,
        'dado_baixa'=> 'nao',
    ];

    $savePedido->ExeCreate('pedidos', $dadosPedido);

    if($savePedido->getResult()){
        for($i = 0; $i < sizeof($_SESSION['carrinho']); $i++){
            $dadosItemPedido = [
                'id_produto'=>$_SESSION['carrinho'][$i]['id'],
                'id_pedido'=>$idPedido,
                'quantidade'=>$_SESSION['carrinho'][$i]['quantidade'],
            ];
            $saveItemPedido->ExeCreate('produtos_pedido', $dadosItemPedido);
        }
        unset($_SESSION['carrinho']);
        echo json_encode(array('status'=>200, 'msg'=>'Pedido finalizado com sucesso.'));
    }else{
        echo json_encode(array('status'=>500, 'msg'=>'Internal serve error.'));
    }
}

function existProduct($idProduct){
    $read = new Read();
    $read->ExeRead('products', 'where id=:id', 'id='.$idProduct);
    if($read->getResult()){
        return true;
    }else{
        return false;
    }
}

function existProductCarrinho($idProduct){
    for($i = 0; $i < sizeof($_SESSION['carrinho']); $i++){
        if($_SESSION['carrinho'][$i]['id'] == $idProduct){
            $_SESSION['carrinho'][$i] = ['id'=> $idProduct, 'quantidade'=> $_SESSION['carrinho'][$i]['quantidade']+1];
            return true;
            break;
        }
    }
    return false;
}

function removeProductCarrinho($idProduct){
    for($i = 0; $i < sizeof($_SESSION['carrinho']); $i++){
        if($_SESSION['carrinho'][$i]['id'] == $idProduct){
            unset($_SESSION['carrinho'][$i]);
            break;
        }
    }
}

function removeOneProductCarrinho($idProduct){
    for($i = 0; $i < sizeof($_SESSION['carrinho']); $i++){
        if($_SESSION['carrinho'][$i]['id'] == $idProduct){
            $_SESSION['carrinho'][$i] = ['id'=> $idProduct, 'quantidade'=> $_SESSION['carrinho'][$i]['quantidade']-1];
            break;
        }
    }
}

function addProduct($idProduct){
    if(existProduct($idProduct)){
        if(!existProductCarrinho($idProduct)){
            $_SESSION['carrinho'][] = ['id'=> $idProduct, 'quantidade'=> 1];
        }
        echo json_encode(array('status'=>200,'msg'=>'Produto adicionado ao carrinho.','carrinho'=>$_SESSION['carrinho']));
    }else{
        echo json_encode(array('status'=>500,'msg'=>'Produto não encontrado.'));
    }
}

function removeProduct($idProduct){
    if(existProduct($idProduct)){
        removeProductCarrinho($idProduct);
        echo json_encode(array('status'=>200,'msg'=>'Produto removido do carrinho.','carrinho'=>$_SESSION['carrinho']));
    }else{
        echo json_encode(array('status'=>500,'msg'=>'Produto não encontrado.'));
    }
}

function removeOneProduct($idProduct){
    if(existProduct($idProduct)){
        removeOneProductCarrinho($idProduct);
        echo json_encode(array('status'=>200,'msg'=>'Produto removido do carrinho.','carrinho'=>$_SESSION['carrinho']));
    }else{
        echo json_encode(array('status'=>500,'msg'=>'Produto não encontrado.'));
    }
}

function destroySession(){
    unset($_SESSION['carrinho']);
    echo json_encode(array('status'=>200,'msg'=>'Carrinho removido com sucesso'));
}