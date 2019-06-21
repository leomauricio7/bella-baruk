<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
//pegando os valores enviados do form
$valor_transferencia = filter_input(INPUT_POST, "valor_transferencia", FILTER_SANITIZE_MAGIC_QUOTES);
$id_user_origem = filter_input(INPUT_POST, "id_user_origem", FILTER_SANITIZE_MAGIC_QUOTES);
$id_user_destino = filter_input(INPUT_POST, "id_user_recebedor", FILTER_SANITIZE_MAGIC_QUOTES);
$limite_disponivel = $senha = filter_input(INPUT_POST, "limite_disponivel", FILTER_SANITIZE_MAGIC_QUOTES);
//trantando os valores dos campos enviados do form
//var_dump($_POST);
$save = new Create();
if (abs($valor_transferencia) <= abs($limite_disponivel)) {
    $dados = ['id_user_origem'=>$id_user_origem, 'id_user_destino'=>$id_user_destino,'valor'=>$valor_transferencia];
    $save->ExeCreate('transacoes', $dados);
    if($save->getResult()){
        echo json_encode(array('status' => 200, 'msg' => 'Transferência realizada com sucesso.'));
    }else{
        echo json_encode(array('status' => 500, 'msg' => 'Erro no processamento da transferência.'));
    }
} else {
    echo json_encode(array('status' => 500, 'msg' => 'Limite Insuficiente.'));
}
