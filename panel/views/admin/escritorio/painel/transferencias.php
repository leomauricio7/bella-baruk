<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="header-body">
            <div class="row align-items-center">
                    <div class="col">
                        <h6 class="header-pretitle">
                            Transferências
                        </h6>
                        <h1 class="header-title">
                           Minhas Transferências
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                        foreach (Dados::getByTransferencias($idEscritorio) as $dados) {
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
<!-- transferencias recebidas -->
<div class="col">
    <div class="card">
        <div class="card-header">
            <div class="header-body">
            <div class="row align-items-center">
                    <div class="col">
                        <h6 class="header-pretitle">
                            Transferências
                        </h6>
                        <h1 class="header-title">
                           Transferências Recebidas
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
                        foreach (Dados::getByTransferenciasRecebidas($idEscritorio) as $dados) {
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