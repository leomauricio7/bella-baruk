<?php if (Validation::getPermisionTypeVendedor($tipoUser)) { ?>
    <div class="header">
        <div class="container-fluid">
            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">
                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Início
                        </h6>
                        <!-- Title -->
                        <h1 class="header-title">
                            Carrinho
                        </h1>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo Url::getBase() ?>products" class="btn btn-success">
                            <i class="fa fa-shopping-cart"></i> Continuar Comprando
                        </a>
                        <?php
                        if (isset($_SESSION['carrinho']) && sizeof($_SESSION['carrinho']) > 0) {
                            $valorPedido = 0;
                            for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
                                //verifica se o indice é valido
                                if (!isset($_SESSION['carrinho'][$i])) {
                                    $i += 1;
                                }
                                $valorPedido += number_format(Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) * $_SESSION['carrinho'][$i]['quantidade'], 2, ",", "");
                            }
                            ?>
                            <button class="btn btn-dark <?php echo $valorPedido < 160 ? 'disabled' : '' ?>" id="<?php echo $valorPedido < 160 ? '' : 'close-pedido' ?>">
                                <i class="fa fa-save"></i> Finalizar pedido
                            </button>
                        <?php } ?>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->
        </div>
    </div>
    <div class="container-fluid">
        <?php if (Dados::verificaFirstCompra($_SESSION['idUser'])) {
            ?>
            <div class="alert alert-dark" role="alert">
                <p><i class="fa fa-exclamation-circle"></i> Nessa página você pode visualizar os produtos adicionados no carrinho.</p>
            </div>
        <?php } else {
            $valorPedido = 0;
            for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
                //verifica se o indice é valido
                if (!isset($_SESSION['carrinho'][$i])) {
                    $i += 1;
                }
                $valorPedido += number_format(Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) * $_SESSION['carrinho'][$i]['quantidade'], 2, ",", "");
            }
            ?>
            <div class="alert alert-dark" role="alert">
                <?php if ($valorPedido < 160) { ?>
                    <p><i class="fa fa-exclamation-circle"></i><strong>Atenção!</strong> Para ter acesso ao nossos descontos, faça um pedido no valor minimo de <span class="badge badge-danger">R$ 160.00</span></p>
                <?php } else { ?>
                    <p><i class="fa fa-exclamation-circle"></i><strong>Atenção!</strong> Seu pedido ja esta com o valor minimo de <span class="badge badge-success">R$ 160.00</span>, finalize seu pedido e tenha acesso aos nossos descontos.</p>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="row">
            <?php require_once 'tables/carrinho.php'; ?>
        </div>
    </div>
    <!--toast do pedido -->
    <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
        <!-- Then put toasts within -->
        <div id="alert-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header">
                <img src="<?php echo Url::getBase(); ?>../assets/img/icons/alert.gif" width="30" class="rounded mr-2" alt="...">
                <strong class="mr-auto">Atenção</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <p id="msg-toast"></p>
                <p> Clique <a href="<?php echo Url::getBase() ?>meus-pedidos">aqui para visualizar seus pedidos.</p>
            </div>
        </div>
    </div>

<?php } else {
    require_once('404.php');
} ?>