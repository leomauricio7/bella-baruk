<?php

require_once '../conf.php';
require_once '../../vendor/autoload.php';

if ($_POST) {
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    switch ($type) {
        case 1:
            getTotalFiliados();
            break;
        case 2:
            getFiliados();
            break;
        default:
            return false;
    }
}


function getTotalFiliados()
{
    $read = new Read();
    $read->ExeRead('users');
    echo json_encode(array('status' => 200, 'total' =>$read->getRowCount()));
}

function getFiliados()
{
    $ativos = 0; $inativos = 0;
    $read = new Read();
    $read->ExeRead('users');
    foreach($read->getResult() as $dados){
        extract($dados);
        if($status == 'ativo' && Dados::existePlanoAtivo($id)){
            $ativos++;
        }else{
            $inativos++;
        }
    }
    echo json_encode(array('status' => 200, 'ativos' => $ativos, 'inativos' => $inativos));
}

