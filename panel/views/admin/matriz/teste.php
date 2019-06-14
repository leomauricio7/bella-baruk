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
    <style>
        a.no {
            height: 106px !important;
            padding-top: 15px;
        }

        a.no span {
            font-size: 27px;
            margin: -5px;
            padding: 0px;
            font-weight: 550;
        }
    </style>
</head>

<body>
    <div class="tree">

        <ul>

            <li>
                <a class="no">
                    <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                    <span><?php echo $_SESSION['idUser'] ?></span>
                </a>
                <!-- nivel 1 -->
                <ul>
                    <?php
                    $level1 = $Derramamento->getBinary(3, 3, 1);
                    foreach ($level1 as $dados) {
                        extract($dados);
                        ?>

                        <li>
                            <a class="no">
                                <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                <span><?php echo $id_user ?></span>
                            </a>
                            <!-- nivel 2 -->
                            <ul>
                                <?php
                                $level2 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 2);
                                foreach ($level2 as $dados) {
                                    extract($dados);
                                    ?>
                                    <li>
                                        <a class="no">
                                            <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                            <span><?php echo $id_user ?></span>
                                        </a>
                                        <!-- nivel 3 -->
                                        <ul>
                                            <?php
                                            $level3 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 3);
                                            foreach ($level3 as $dados) {
                                                extract($dados);
                                                ?>

                                                <li>
                                                    <a class="no">
                                                        <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                        <span><?php echo $id_user ?></span>
                                                    </a>
                                                    <!-- nivel 4 -->
                                                    <ul>
                                                        <?php
                                                        $level4 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 4);
                                                        foreach ($level4 as $dados) {
                                                            extract($dados);
                                                            ?>

                                                            <li>
                                                                <a class="no">
                                                                    <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                    <span><?php echo $id_user ?></span>
                                                                </a>
                                                                <!-- nivel 5 -->
                                                                <ul>
                                                                    <?php
                                                                    $level5 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 5);
                                                                    foreach ($level5 as $dados) {
                                                                        extract($dados);
                                                                        ?>

                                                                        <li>
                                                                            <a class="no">
                                                                                <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                <span><?php echo $id_user ?></span>
                                                                            </a>
                                                                            <!-- nivel 6 -->
                                                                            <ul>
                                                                                <?php
                                                                                $level6 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 6);
                                                                                foreach ($level6 as $dados) {
                                                                                    extract($dados);
                                                                                    ?>

                                                                                    <li>
                                                                                        <a class="no">
                                                                                            <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                            <span><?php echo $id_user ?></span>
                                                                                        </a>
                                                                                        <!-- nivel 7 -->
                                                                                        <ul>
                                                                                            <?php
                                                                                            $level7 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 7);
                                                                                            foreach ($level7 as $dados) {
                                                                                                extract($dados);
                                                                                                ?>

                                                                                                <li>
                                                                                                    <a class="no">
                                                                                                        <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                                        <span><?php echo $id_user ?></span>
                                                                                                    </a>
                                                                                                    <!-- nivel 8 -->
                                                                                                    <ul>
                                                                                                        <?php
                                                                                                        $level8 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 8);
                                                                                                        foreach ($level8 as $dados) {
                                                                                                            extract($dados);
                                                                                                            ?>

                                                                                                            <li>
                                                                                                                <a class="no">
                                                                                                                    <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                                                    <span><?php echo $id_user ?></span>
                                                                                                                </a>

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
    </div>
    <?php
    // $indicados = Unilevel::getHierarquiaComissaoMatriz(31);
    // //echo count($indicados);
    //var_dump(Dados::getUsersIndicados(($_SESSION['idUser'])));
    //$level1 = $Derramamento->getBinary($_SESSION['idUser'],$_SESSION['idUser'],1);
    //var_dump($level1);
    //var_dump(Dados::getUsersMatriz($_SESSION['idUser']));
    //$Derramamento->saveUserAllMatriz(6);
    ?>

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
?>