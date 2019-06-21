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
                        Transferências
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
        <p>Nessa página você pode visualizar todas as transferências realizadas no sistema.</p>
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
                            Transferências
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
                                        <th scope="col">Origem</th>
                                        <th scope="col">Destinatário</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach (Dados::getByAllTransferencias() as $dados) {
                                        extract($dados);
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $id ?></th>
                                            <td><?php echo Validation::getIndicador($id_user_origem) ?></td>
                                            <td><?php echo Validation::getIndicador($id_user_destino) ?></td>
                                            <td><?php echo $valor ?></td>
                                            <td><?php echo $data ?></td>
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