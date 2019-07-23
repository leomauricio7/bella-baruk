<?php
if ($tipoUser == 3 || $tipoUser == 4) { ?>
    <div class="header">
        <div class="container-fluid">
            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">
                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Loja Virtual
                        </h6>
                        <!-- Title -->
                        <h1 class="header-title">
                            Lançamento de pedido
                        </h1>
                    </div>
                    <div class="col-auto">
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->
        </div>
    </div>
    <div class="container-fluid">
        <div class="alert alert-dark" role="alert">
            Aqui você pode lançar novos pedidos para usuários cadastrados e não cadastrados
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">
                            <i class="fa fa-info-circle"></i>Pedido
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-md-center">
                            <div class="col-md-auto card bg-person" id="form-mod-user">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"><i class="fa fa-user"></i> Cliente</label>
                                        <input type="hidden" name="id_cliente" id="id_cliente">
                                        <input type="text" class="form-control form-control-rounded" id="user-cliente-pedido" placeholder="Login do cliente" required autofocus><br>
                                        <small class="form-text" id="status-user-cliente"></div>
                                    <small id="emailHelp" class="form-text text-muted">Não possui cadastro? <a href="#!" data-toggle="modal" data-target="#modal-new-user" class="btn btn-success btn-sm"><i class="fa fa-user-plus"></i> Cadastre agora</a>.</small>
                                </div>
                                <hr>
                                <button class="btn btn-primary btn-sm btn-block" disabled id="btn-modal-new-user">Iniciar pedido</button>
                            </div>
                        </div><!-- .form -->
                        <?php require_once __DIR__ . '/tables/loja-distribuidor.php' ?>
                    </div><!-- .card-body -->
                </div><!-- .card -->
            </div>
        </div>
    </div><!-- .container-fluid -->
    <?php require_once __DIR__ . '/modal/modal-user.php' ?>
<?php } else {
    require_once '404.php';
}
?>