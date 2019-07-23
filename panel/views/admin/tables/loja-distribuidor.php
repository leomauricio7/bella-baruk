<div id="produtos" style="display:none" class="card" data-toggle="lists" data-options="{valueNames: [orders-order, orders-product, orders-date, orders-total, orders-status, orders-method]}">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <button class="btn btn-sm btn-white" type="button">
                    <i class="fa fa-user"></i> <span id="cliente-info"></span>
                </button>
                <button class="btn btn-sm btn-danger" type="button" id="cancel-pedido">
                    <i class="fa fa-times-circle"></i>Cancelar pedido
                </button>
            </div>
            <div class="col-auto">
                <!--destroy session-->
                <?php
                if (isset($_SESSION['carrinho'])) {
                    ?>
                    <button class="btn btn-danger btn-sm" id="closeSession">
                        <i class="fa fa-trash"></i>Esvaziar carrinho
                    </button>
                    <button class="btn btn-info btn-sm">
                        <i class="fa fa-dollar-sign"></i><?php echo Dados::getValuePedidoTemp($tipoUser, $_SESSION['cliente']) ?>
                    </button>
                <?php } ?>
                <?php
                if (!Validation::getPermisionType($tipoUser) && isset($_SESSION['carrinho'])) {
                    ?>
                    <!-- Button -->
                    <a href="<?php echo Url::getBase() ?>carrinho" class="btn btn-dark btn-sm">
                        <i class="fa fa-shopping-cart" id="icon-carrinho"></i>
                        <span class="badge badge-pill badge-success">
                            <?php echo isset($_SESSION['carrinho']) ? sizeof($_SESSION['carrinho']) : 0 ?>
                        </span>
                    </a>
                <?php } ?>
            </div>
        </div> <!-- / .row -->
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-nowrap card-table">
            <thead>
                <tr>
                    <th>
                    </th>
                    <th>
                        <a href="#" class="text-muted sort" data-sort="orders-order">
                            Cod. Produto
                        </a>
                    </th>
                    <th>
                        <a href="#" class="text-muted sort" data-sort="orders-product">
                            Descrição
                        </a>
                    </th>
                    <th>
                        <a href="#" class="text-muted sort" data-sort="orders-total">
                            Valor Unitário
                        </a>
                    </th>
                    <th>
                        <a href="#" class="text-muted sort" data-sort="orders-status">
                            Estoque
                        </a>
                    </th>
                    <th>
                        <a href="#" class="text-muted sort" data-sort="orders-status">
                            Status
                        </a>
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="list" id="tbody-produtos">
                <?php if (isset($_SESSION['cliente'])) {
                    $data = Dados::getProdutosEstoque($_SESSION['idUser'], $_SESSION['cliente']);
                    $user = $_SESSION['cliente'];
                    if (count($data) > 0) {
                        foreach ($data as $dados) {
                            extract($dados);
                            $status = Dados::produtoEstoque($id_produto, $quantidade) > 0 ? "Disponível" : "Em falta no estoque";
                            ?>
                            <tr>
                                <td class="align-middle"><img style="width:100px; height:100px" src="<?php echo Url::getBase() . 'docs/produtos/' . $id_produto . '/' . Validation::getImagesProdutos($id_produto) ?>" class="avatar-img" alt="" /></td>
                                <td class="orders-order align-middle"><span class="badge badge-secondary"><?php echo $id_produto ?></span></td>
                                <td class="orders-product align-middle"><?php echo Dados::getDescriptionProduct($id_produto) ?></td>
                                <td class="orders-total align-middle">R$ <?php echo Dados::getValueProduct($id_produto, null, $user) ?></td>
                                <td class="orders-total align-middle"><?php echo Dados::produtoEstoque($id_produto, $quantidade) ?></td>
                                <td class="orders-status align-middle">
                                    <div class="badge badge-soft-<?php echo Dados::produtoEstoque($id_produto, $quantidade) > 0 ? 'success' : 'danger' ?>">
                                        <?php echo $status ?>
                                    </div>
                                </td>
                                <td class="text-right align-middle col-auto">
                                    <input type="number" value="1" min="1" class="form-control form-control-sm float-left qtd qtd-<?php echo $id_produto ?>">
                                    <button estoque="<?php echo Dados::produtoEstoque($id_produto, $quantidade) ?>" <?php echo Dados::produtoEstoque($id_produto, $quantidade) > 0 ? '' : 'disabled' ?> tipo="2" class="btn btn-sm btn-<?php echo Dados::produtoEstoque($id_produto, $quantidade) > 0 ? 'bb' : 'danger' ?> add-produto" alt="<?php echo $id_produto ?>"><i class="fa fa-<?php echo Dados::produtoEstoque($id_produto, $quantidade) > 0 ? 'cart-plus' : 'times-circle' ?>"></i> Adicionar no carrinho</button>
                                </td>
                            </tr>
                        <?php
                        }
                    } else { ?>
                        <tr>
                            <td colspan="5">
                                <div class="badge badge-soft-danger">
                                    Sem produtos no estoque.
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal-->
<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msg-modal"></p>
            </div>
        </div>
    </div>
</div>