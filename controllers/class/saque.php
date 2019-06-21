<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
//pegando os valores enviados do form
$valor_saque = filter_input(INPUT_POST, "valor_saque", FILTER_SANITIZE_MAGIC_QUOTES);
$id_user = filter_input(INPUT_POST, "id_user", FILTER_SANITIZE_MAGIC_QUOTES);
$limite_disponivel = $senha = filter_input(INPUT_POST, "limite_disponivel", FILTER_SANITIZE_MAGIC_QUOTES);
//trantando os valores dos campos enviados do form
//var_dump($_POST);
$save = new Create();
if (abs($valor_saque) <= abs($limite_disponivel)) {
    $dados = ['id_user'=>$id_user,'valor'=>$valor_saque,'status'=>'em analise'];
    $save->ExeCreate('saques', $dados);
    if($save->getResult()){
        echo json_encode(array('status' => 200, 'msg' => 'A solicitação de saque foi efetivada, aguarde a aprovação do sistema.'));
    }else{
        echo json_encode(array('status' => 500, 'msg' => 'Erro no processamento do saque.'));
    }
} else {
    echo json_encode(array('status' => 500, 'msg' => 'Limite Insuficiente.'));
}
