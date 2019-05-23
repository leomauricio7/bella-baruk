<?php
    require_once '../../../../controllers/conf.php';
    require_once '../../../../vendor/autoload.php';
    $Derramamento = new Derramamento();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arvore tree View</title>
    <link rel="stylesheet" href="../../../../assets/css/arvore.css">
</head>
<body>
<div class="tree" style="margin-left:20%;">
    <ul>
        <li title="<?php echo $_SESSION['user']?>">
            <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $_SESSION['idUser'] ?></span>
            </a>
            <ul>
                <?php
                    //1º Nível
                    $n1 = Dados::getUsersIndicados($_SESSION['idUser']);
                    $nivel1 = $Derramamento->getFilhos($n1,null);
                    $vetor1 = count($nivel1['n1']) > 0 ? $nivel1['n1'] : $nivel1['n2']; 
                    //$Derramamento->exibeArrayOrigin($vetor1); 
                    foreach($nivel1['n1'] as $user1){
                        extract($user1);
                ?>
                        <li title="<?php echo 'indicado do '.$indicador ?>">
                            <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                                <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                                <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id?></span>
                            </a>
                            <ul>
                            <?php
                                //2º Nível
                                $n2 = Dados::getUsersIndicados($id);
                                $nivel2 = $Derramamento->getFilhos($n2,$nivel1['n2']);
                                $vetor2 = count($nivel2['n1']) > 0 ? $nivel2['n1'] : $nivel2['n2']; 
                                //$Derramamento->exibeArrayOrigin($vetor2); 
                                foreach($vetor2 as $user2){
                                    extract($user2);
                            ?>
                                    <li title="<?php echo 'indiacado do '.$indicador ?>">
                                        <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                                            <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                                            <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id?></span>
                                        </a>
                                        <ul>
                                        <?php
                                            //3º Nível
                                            $n3 = Dados::getUsersIndicados($id);
                                            $nivel3 = $Derramamento->getFilhos($n3,$nivel2['n2']);
                                            $vetor3 = count($nivel3['n1']) > 0 ? $nivel3['n1'] : $nivel3['n2'];
                                            //$Derramamento->exibeArrayOrigin($vetor3); 
                                            foreach($vetor3 as $user3){
                                                extract($user3);
                                        ?>
                                                <li title="<?php echo 'indiacado do '.$indicador ?>">
                                                    <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                                                        <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                                                        <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id?></span>
                                                    </a>
                                                    <ul>
                                                    <?php
                                                        //4º Nível
                                                        $n4 = Dados::getUsersIndicados($id);
                                                        $nivel4 = $Derramamento->getFilhos($n4,$nivel3['n2']);
                                                        $vetor4 = count($nivel4['n1']) > 0 ? $nivel4['n1'] : $nivel4['n2'];
                                                        //$Derramamento->exibeArrayOrigin($vetor3); 
                                                        foreach($vetor4 as $user4){
                                                            extract($user4);
                                                    ?>
                                                            <li title="<?php echo 'indiacado do '.$indicador ?>">
                                                                <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                                                                    <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                                                                    <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id?></span>
                                                                </a>
                                                                <ul>

                                                                </ul>
                                                            </li>
                                                    <?php    
                                                        }
                                                    ?>
                                                    </ul>
                                                </li>
                                        <?php    
                                            }
                                        ?>
                                        </ul>
                                    </li>
                            <?php    
                                }
                            ?>
                            </ul>
                        </li>
                <?php    
                    }
                ?>
            </ul>
        </li>
    </ul>
</body>
</html>
<?php 

// require_once '../../../../controllers/conf.php';
// require_once '../../../../vendor/autoload.php';
// $Derramamento = new Derramamento();

// $n1 = Dados::getUsersIndicados($_SESSION['idUser']);
// echo '<h1>TODOS INDICADOS 1º NIVEL</h1>';
// $Derramamento->exibeArrayOrigin($n1);
// echo '<h1>QUALIFICADORES DO NIVEL 1</h1>';
// $nivel1 = $Derramamento->getFilhos($n1,null);
// $Derramamento->exibeArrayOrigin($nivel1['n1']);
// echo '<h1>RESTANTES DO NIVEL 1</h1>';
// $Derramamento->exibeArrayOrigin($nivel1['n2']);
// echo '<hr>';


// $n1 = array(1,2,3,4,5,6,7,8,9);
// $n2 = array(20,10,11,12,13);
// $n3 = array(30);
// $n4 = array(80);
// $n5 = array(80);
// $n6 = array(80);
// $n7 = array(80);
// $n8 = array(80);
// $nivel1 = $Derramamento->getFilhos($n1,null);
// $nivel2 = $Derramamento->getFilhos($n2,$nivel1['n2']);
// $nivel3 = $Derramamento->getFilhos($n3,$nivel2['n2']);
// $nivel4 = $Derramamento->getFilhos($n4,$nivel3['n2']);
// $nivel5 = $Derramamento->getFilhos($n5,$nivel4['n2']);
// $nivel6 = $Derramamento->getFilhos($n6,$nivel5['n2']);
// $nivel7 = $Derramamento->getFilhos($n7,$nivel6['n2']);
// $nivel8 = $Derramamento->getFilhos($n8,$nivel7['n2']);
// echo '<h1>DERRAMAMENTO DE ARRAYS</h1>';
// $Derramamento->exibeArrayOrigin($n1);
// echo '<h1>NIVEL 1</h1>';
// var_dump($nivel1);
// $Derramamento->exibeArrayOrigin($n2);
// echo '<h1>NIVEL 2</h1>';
// var_dump($nivel2);
// $Derramamento->exibeArrayOrigin($n3);
// echo '<h1>NIVEL 3</h1>';
// var_dump($nivel3);
// $Derramamento->exibeArrayOrigin($n4);
// echo '<h1>NIVEL 4</h1>';
// var_dump($nivel4);
// $Derramamento->exibeArrayOrigin($n5);
// echo '<h1>NIVEL 5</h1>';
// var_dump($nivel5);
// $Derramamento->exibeArrayOrigin($n6);
// echo '<h1>NIVEL 6</h1>';
// var_dump($nivel6);
// $Derramamento->exibeArrayOrigin($n7);
// echo '<h1>NIVEL 7</h1>';
// var_dump($nivel7);
// $Derramamento->exibeArrayOrigin($n8);
// echo '<h1>NIVEL 8</h1>';
// var_dump($nivel8);
