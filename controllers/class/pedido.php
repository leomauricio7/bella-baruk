<?php
require_once '../conf.php';
require_once '../../vendor/autoload.php';
//pegando os valores enviados do form
$type = filter_input(INPUT_GET, "type", FILTER_SANITIZE_MAGIC_QUOTES);
$id = filter_input(INPUT_GET, "saque", FILTER_SANITIZE_MAGIC_QUOTES);

$save = new Update();
$save->ExeUpdate('saques', ['status'=>$type], 'where id=:id', 'id='.$id);
echo '<script>javascript:history.back()</script>';