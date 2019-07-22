<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
unset($_SESSION['cliente']);
echo json_encode(array('status'=> 200));
// $cliente = $_POST['cliente'];
// echo json_encode(
//     array(
//         'data' => Dados::getProdutosEstoque($_SESSION['idUser'], $cliente)
//     )
// );
