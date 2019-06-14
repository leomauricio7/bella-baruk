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
        a.no{
           height: 106px !important; padding-top: 15px;
        }
        a.no span{
            font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;
        }
    </style>
</head>

<body>
    <div class="tree" style="margin-left:20%;">

        <ul>

            <li>
                <a class="no">
                    <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                    <span><?php echo $_SESSION['idUser'] ?></span>
                </a>
                    <?php
                        echo $Derramamento->printTree($_SESSION['idUser']);
                    ?>
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
?>