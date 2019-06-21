<?php if(Validation::getPermisionType($tipoUser)){ ?>
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
                        Saques
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
        <h4 class="alert-heading">ATENÇÃO</h4>
        <p>Nessa página você pode visualizar todos os saques realizadas no sistema.</p>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="header-body">
                        <h6 class="header-pretitle">
                            Carteira Digital
                        </h6>

                        <h1 class="header-title">
                            Saques
                        </h1>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-condensed table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col"><i calss="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach (Dados::getByAllSaques() as $dados) {
                                        extract($dados);
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id ?></th>
                                            <td><?php echo $user ?></td>
                                            <td><?php echo $valor ?></td>
                                            <td><?php echo $data ?></td>
                                            <td>
                                                <span class="badge badge-pill badge-<?php echo $status == 'em analise' ? 'warning' : $status == 'reprovado' ? 'danger' : 'success' ?>"><?php echo $status ?></span>
                                            </td>
                                            <td>
                                                <a href="<?php echo Url::getBase().'../controllers/class/pedido.php?type=aprovado&saque='.$id?>" class="btn btn-sm btn-success"><i class="fa fa-user-check"></i> Aprovar</a>
                                                <a href="<?php echo Url::getBase().'../controllers/class/pedido.php?type=reprovado&saque='.$id?>" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reprovar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }else{
    require_once('404.php');
} ?>