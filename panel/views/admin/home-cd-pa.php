<div class="container-fluid">
    <div class="row ">
        <div class="col-6">
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-12 col-md-10 col-xl-8">
                        <!-- Image -->
                        <img src="<?php echo Url::getBase() . '../assets/img/covers/escritorio.png' ?>" alt="..." class="img-fluid mt-n5 mb-4" style="max-width: 272px;">
                        <!-- Title -->
                        <h1>
                            Ola, <?php echo $_SESSION['user'] ?>
                        </h1>
                        <!-- Content -->
                        <p class="text-muted">
                            Seja bem vindo ao seu <strong><?php echo $tipoUser == 3 ? 'centro de distribuição (CD)' : 'ponto de apoio (PA)' ?></strong>, aqui você pode realizar compras, revender e acompanhar o desenvolvimento de sua loja virtual.
                        </p>
                    </div>
                </div> <!-- / .row -->
            </div>
        </div>

        <div class="col card justify-content-center" style="background-color: #f3f3f3">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <!-- Title -->
                                        <h6 class="card-title text-uppercase text-muted mb-2">
                                            Vendas realizadas
                                        </h6>
                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                            <?php echo Dados::getTotalPedidosDistribuidor($_SESSION['idUser']) ?>
                                        </span>
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
                                           Pedidos realizados
                                        </h6>
                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                        <?php echo Dados::getCompras($_SESSION['idUser']) ?>
                                        </span>
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
                                            Produtos em estoque
                                        </h6>
                                        <div class="row align-items-center no-gutters">
                                            <div class="col-auto">
                                                <!-- Heading -->
                                                <span class="h2 mr-2 mb-0">
                                                   <?php echo count(Dados::getProdutosEstoque($_SESSION['idUser'])) ?>
                                                </span>
                                            </div>
                                        </div> <!-- / .row -->
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <!-- Card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center text-center">
                                    <div class="col">
                                        <!-- Title -->
                                        <h6 class="card-title text-uppercase text-muted mb-2">
                                           Nesse painel você pode visualizar os detalhes do seu escritório virtual, além de poder lançar novos pedidos para clientes cadastardos e não cadastrados.
                                        </h6>
                                        <!-- Heading -->
                                        <span class="h2 mb-0">
                                           <a href="<?php echo Url::getBase().'novo-pedido' ?>" class="btn btn-dark btn-sm"><i class="fa fa-cart-plus"></i> Lançar novo pedido</a>
                                        </span>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>