<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
$dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
$dados['status'] = 'inativo';
$typeValid = $dados['cpf'];
$validaCpf = new ValidaCPFCNPJ($typeValid);
if ($validaCpf->valida()) {
    if (!Valida::isExistCPF($dados['cpf'])) {
        if (!Valida::isExistEmail($dados['email'])) {
            $user = new User();
            $user->CreateUser($dados);
            if ($user->getResult()) :
                echo json_encode(array('status' => 200, 'msg' => $user->getMsg()));
            else :
                echo json_encode(array('status' => 500, 'msg' => $user->getMsg()));
            endif;
        } else {
            echo json_encode(array('status' => 500, 'msg' => '<div class="alert alert-danger">Email já está sendo usado por outro usuário.</div>'));
        }
    } else {
        echo json_encode(array('status' => 500, 'msg' => '<div class="alert alert-danger">CPF já está sendo usado por outro usuário.</div>'));
    }
} else {
    echo json_encode(array('status' => 500, 'msg' => '<div class="alert alert-danger">CPF Inválido.</div>'));
}
