<div class="card">
    <div class="card-header">
        <div class="header-body">
            <h6 class="header-pretitle">
                Comissões
            </h6>

            <h1 class="header-title">
                Minhas Comissoes
            </h1>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-user", "tables-valor", "tables-data"]'>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-row">#</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-user">Nome</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-valor">Valor</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-data">Data</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-data">Origem</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $total = 0;
                    foreach (Dados::getComissaoAll($idEscritorio) as $dados) {
                        extract($dados);
                        $total += $valor;
                        ?>
                        <tr>
                            <th scope="row" class="tables-row"><?php echo $id ?></th>
                            <td class="tables-user"><?php echo Validation::getIndicador($id_user_comprador) ?></td>
                            <td class="tables-valor"><span class="badge badge-success"><i class="fa fa-money-check-alt"></i>R$ <?php echo number_format($valor, 2, ",", "") ?></span></td>
                            <td class="tables-data"><?php echo date('d/m/Y', strtotime($created)) ?></td>
                            <td class="tables-data"><?php echo $tipo ?></td>
                        </tr>
                    <?php } ?>
                    <tr scope="col">
                        <th colspan="4" scope="col">TOTAL</th>
                        <th colspan="1"><span class="badge badge-info"><i class="fa fa-money-check-alt"></i>R$ <?php echo number_format($total, 2, ",", "") ?></span></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>