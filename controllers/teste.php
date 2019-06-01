<?php 
include_once './conf.php';
include_once '../vendor/autoload.php';

echo '<h1>Teste</h1>';
$userRecebedoresMatriz = array_filter(Unilevel::getHierarquiaComissaoMatriz(6), function($userIndicado){
    return $userIndicado['indicador'] != null;
});

$userRecebedoresUnilevel = array_filter(Unilevel::getHierarquiaComissaoUnilevel(6), function($userIndicado){
    return $userIndicado['indicador'] != null;
});

// var_dump($userRecebedoresMatriz);
// var_dump($userRecebedoresUnilevel);

foreach ($userRecebedoresMatriz as $matriz) {
    extract($matriz);
    echo $indicador.' - '.$comisao;
}

foreach ($userRecebedoresUnilevel as $unilevel) {
    extract($unilevel);
    echo $indicador.' - '.$comisao;
}