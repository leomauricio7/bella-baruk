<div class="row">
    <!-- card graficos-->
    <div class="col-12 col-lg-6 col-xl">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Usuários Indicados
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            <?php echo Dados::getIndicados($idEscritorio) ?>
                        </span>

                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-users text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6 col-xl">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Compras
                        </h6>
                        <!-- Heading -->
                        <span class="h2 mb-0">
                            <?php echo Dados::getCompras($idEscritorio) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-cart-plus text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>

    </div>
    <div class="col-12 col-lg-6 col-xl">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <!-- Title -->
                        <h6 class="card-title text-uppercase text-muted mb-2">
                            Pontuação
                        </h6>

                        <div class="row align-items-center no-gutters">
                            <div class="col-auto">
                                <!-- Heading -->
                                <span class="h2 mr-2 mb-0">
                                    <?php echo Dados::getPontuacao($idEscritorio) ?>
                                </span>

                            </div>
                            <div class="col">
                                <!-- Progress -->
                                <div class="progress progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo (Dados::getPontuacao($idEscritorio) * 0.1) ?>%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100%"></div>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-cash-register text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>

    </div>
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
                            R$ <?php echo Dados::getComissao($idEscritorio) ?>
                        </span>
                    </div>
                    <div class="col-auto">
                        <!-- Icon -->
                        <span class="h2 fa fa-money-check-alt text-muted mb-0"></span>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>
    </div>
</div> <!-- / .row -->