<?php
if ($_POST) {
    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
    $dados['comprovante'] = ($_FILES['comprovante']['tmp_name'] ? $_FILES['comprovante'] : null);
    $file = $_FILES['comprovante'];
    $update = new Update();
    $dadosUpdate = ['id_status' => 2, 'comprovante' => $dados['comprovante']['name']];
    $update->ExeUpdate('pedidos', $dadosUpdate, 'where id=:id', 'id=' . $dados['idPedido']);
    if ($update->getResult()) {
        $uploud = new Uploud();

        if (Validation::existComprovante($dados['idPedido'])) {
            @$uploud->ImagemEdit($file, 'comprovantes/' . $dados['idPedido'] . '/');
        } else {;
            @$uploud->Imagem($file, 'comprovantes/' . $dados['idPedido'] . '/');
        }
        echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Atenção</strong> Comprovante enviado com sucesso! Aguarde a liberação do seu pedido.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
            ';
    } else {
        echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Atenção</strong> Erro no processamento dos dados.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
            ';
    }
    unset($dados);
}
?>
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
                <?php if (Validation::getPermisionType($tipoUser)) { ?>
                    <th scope="col">
                        <a href="#" class="text-muted sort" data-sort="tables-handle"><i class="fa fa-cogs"></i></a>
                    </th>
                <?php } ?>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-handle"><i class="fa fa-cogs"></i></a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            <?php
            $type = null;
            $read = new Read();
            if (Validation::getPermisionType($tipoUser)) {
                if (Url::getURL(1) != null) {
                    switch (Url::getURL(1)) {
                        case 'aguardando-pagamento':
                            $type = 1;
                            break;
                        case 'em-analise':
                            $type = 2;
                            break;
                        case 'dado-baixa':
                            $type = 3;
                            break;
                        case 'disponivel':
                            $type = 4;
                            break;
                        case 'em-disputa':
                            $type = 5;
                            break;
                        case 'devolvido':
                            $type = 6;
                            break;
                        case 'cancelado':
                            $type = 7;
                            break;
                        case 'pendente':
                            $type = 8;
                            break;
                    }
                    $read->ExeRead('pedidos', 'where id_status = ' . $type);
                } else {
                    $read->ExeRead('pedidos');
                }
            } else {
                $read->ExeRead('pedidos', 'where id_user = ' . $_SESSION['idUser']);
            }
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
                    <?php if (Validation::getPermisionType($tipoUser)) { ?>
                        <td class="tables-handle">
                            <button title="Comprovante" <?php echo $comprovante == null ? 'disabled' : '' ?> type="button" data-toggle="modal" data-target="#modal-comprovante<?php echo $id ?>" class="btn btn-success btn-sm"><i class="fa fa-file-upload"></i></button>
                            <?php if (Url::getURL(1) != 'dado-baixa') { ?>
                                <button title="Dar baixar" <?php echo $comprovante == null ? 'disabled' : '' ?> alt="<?php echo $idPedido ?>" class="btn btn-danger btn-sm da-baixa"><i class="fa fa-save"></i></button>
                            <?php } ?>
                            <button type="button" data-toggle="modal" data-target="#modal-del<?php echo $id ?>" class=" btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </td><?php } ?>
                    <td class="tables-handle">
                        <?php if (Dados::getComissao($_SESSION['idUser']) > $valor && $dado_baixa == 'nao') { ?>
                            <button title="Pagar com bônus" alt="<?php echo $idPedido ?>" class="btn btn-warning btn-sm pg-bonus"><i class="fa fa-money-check-alt"></i></button>
                        <?php } ?>
                        <a title="visualizar extrato" href="<?php echo Url::getBase() . 'extrato/' . $idPedido ?>" class="btn btn-primary btn-sm"><i class="fa fa-file-alt"></i></a>
                        <?php if (!Validation::getPermisionType($tipoUser) && $dado_baixa == 'nao') { ?>
                            <button title="Enviar comprovante" type="button" data-toggle="modal" data-target="#modal-comprovante<?php echo $id ?>" class="btn btn-success btn-sm"><i class="fa fa-file-upload"></i></button>
                        <?php } ?>
                        <button title="visualizar detalhes" type="button" data-toggle="modal" data-target="#modal<?php echo $id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
                    </td>
                </tr>
                <!-- modal delete-->
                <!-- Modal -->
                <div class="modal fade" id="modal-del<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="header">
                                    <div class="header-body">
                                        <h4 class="header-pretitle text-center">
                                            Tem certeza que deseja remover esse pedido?
                                        </h4>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                                <a href="<?php echo Url::getBase() . '../controllers/delete.php?pag=pedidos&tb=pedidos&ch=id&value=' . $id ?>" class="btn btn-danger">SIM</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal comprovante-->
                <div class="modal fade" id="modal-comprovante<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 align="center" class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i> Comprovante - Pedido Nº <?php echo $idPedido ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php if (!Validation::getPermisionType($tipoUser)) { ?>
                                    <form enctype="multipart/form-data" method="post" action="">
                                        <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $id ?>" />
                                        <input type="file" name="comprovante" id="comprovante" class="form-control" required>
                                        <br><button type="submit" class="btn btn-white">
                                            Enviar comprovante
                                        </button>
                                    </form>
                                <?php } else { ?>
                                    <img class="avatar-img rounded" src="<?php echo Url::getBase() . 'docs/comprovantes/' . $id . '/' . $comprovante ?>" alt="">
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
                <!-- modal detalhes-->
                <div class="modal fade" id="modal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 align="center" class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle"></i>Detalhes - Pedido Nº <?php echo $idPedido ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <?php require 'view-pedido.php' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            <?php } ?>
        </tbody>
    </table>
</div>
<!--toast do pedido -->
<div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
    <!-- Then put toasts within -->
    <div id="alert-toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
        <div class="toast-header">
            <img src="<?php echo Url::getBase(); ?>../assets/img/icons/alert.gif" width="30" class="rounded mr-2" alt="...">
            <strong class="mr-auto">Atenção</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <p id="msg-toast"></p>
        </div>
    </div>
</div>