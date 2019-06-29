<?php 
include_once './conf.php';
include_once '../vendor/autoload.php';
// $userRecebedoresMatriz = array_filter(Unilevel::getHierarquiaComissaoMatriz(6), function($userIndicado){
//     return $userIndicado['indicador'] != null;
// });

// $userRecebedoresUnilevel = array_filter(Unilevel::getHierarquiaComissaoUnilevel(6), function($userIndicado){
//     return $userIndicado['indicador'] != null;
// });

// // var_dump($userRecebedoresMatriz);
// // var_dump($userRecebedoresUnilevel);

// foreach ($userRecebedoresMatriz as $matriz) {
//     extract($matriz);
//     echo $indicador.' - '.$comisao;
// }

// foreach ($userRecebedoresUnilevel as $unilevel) {
//     extract($unilevel);
//     echo $indicador.' - '.$comisao;
// }
$save = new Derramamento();
if($_POST){
    $save->saveUserMatriz($_POST['user']);
    var_dump($_POST);
    echo $save->getByIdNoIndicador(Dados::getIndicador($_POST['user']),$_POST['user']);
}
?>
<form method="post">
    <input type="number" name="user">
    <input type="submit" value="Inserir">
</form>