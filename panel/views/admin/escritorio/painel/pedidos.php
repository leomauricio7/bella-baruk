<div class="card">
    <div class="card-header">
        <div class="header-body">

            <h6 class="header-pretitle">
                Pedidos
            </h6>

            <h1 class="header-title">
                Pedidos realizados
            </h1>

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-first", "tables-last", "tables-handle"]'>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-row">ID Pedido</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-row">Franqueado</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-first">Valor</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-first">QT Produtos</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-last">Status</a>
                        </th>
                        <th scope="col">
                            <a href="#" class="text-muted sort" data-sort="tables-last">Dado Baixa</a>
                        </th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php
                    $type = null;
                    $read = new Read();

                    $read->ExeRead('pedidos', 'where id_user = ' . $idEscritorio);

                    foreach ($read->getResult() as $ped) {
                        extract($ped);
                        ?>
                        <tr>
                            <th scope="row" class="tables-row"><?php echo $idPedido ?></th>
                            <th scope="row" class="tables-row"><?php echo Validation::getNameUser($id_user) ?></th>
                            <td class="tables-first">R$<?php echo number_format($valor, 2, ",", "") ?></td>
                            <td class="tables-first"><?php echo Validation::getTotalProdutosCarrinho($idPedido); ?> produto</td>
                            <td class="tables-last"><span class="badge badge-soft-<?php echo Validation::getClassStatus($id_status) ?>"><?php echo Validation::getStatus($id_status) ?></span></td>
                            <td class="tables-last"><span class="badge badge-soft-<?php echo Validation::getClassStatus($id_status) ?>"><?php echo ucfirst($dado_baixa) ?></span></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>