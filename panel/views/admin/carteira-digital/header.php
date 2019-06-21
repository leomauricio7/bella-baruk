<div class="row">
    <!-- saques -->
    <div class="col-12 col-lg-6 col-xl">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Saques
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            <?php echo Dados::getBySizeSaque($_SESSION['idUser']) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-money-check text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
    <!-- transferencias-->
    <div class="col-12 col-lg-6 col-xl">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Transferências
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            <?php echo Dados::getBySizeTransferencias($_SESSION['idUser']) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-money-bill-alt text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
    <!-- compras -->
    <div class="col-12 col-lg-6 col-xl">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Compras com bônus
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            <?php echo Dados::getBySizePedidos($_SESSION['idUser']) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-cart-arrow-down text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>

    <!-- compras -->
    <div class="col-12 col-lg-6 col-xl">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Saldo
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            R$ <?php echo Dados::getComissao($_SESSION['idUser']) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-dollar-sign text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>

</div>