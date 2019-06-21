<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
//pegando os valores enviados do form

$slug = filter_input(INPUT_POST, "id_user_destino", FILTER_SANITIZE_MAGIC_QUOTES);
//trantando os valores dos campos enviados do form
$read = new Read();
$read->ExeRead('users', 'where slug=:slug','slug='.$slug);

if ($read->getRowCount() > 0) {
    echo json_encode(array('status' => 200, 'msg' => $read->getResult()[0]['nome'],'id'=>$read->getResult()[0]['id']));
} else {
    echo json_encode(array('status' => 500, 'msg' => 'Login Invalido.'));
}
