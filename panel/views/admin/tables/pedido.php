<div class="table-responsive" data-toggle="lists" data-lists-values='["tables-row", "tables-first", "tables-last", "tables-handle"]'>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-row">Franqueado</a>
                </th>
                <th scope="col">
                    <a href="#" class="text-muted sort" data-sort="tables-row">ID Pedido</a>
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
                    <a href="#" class="text-muted sort" data-sort="tables-handle"><i class="fa fa-cogs"></i></a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            <?php 
            $read = new Read();
            if(Validation::getPermisionType($tipoUser)){
                $read->ExeRead('pedidos');
            }else{
                $read->ExeRead('pedidos', 'where id_user = '.$_SESSION['idUser']);
            }
            foreach($read->getResult() as $ped){
                extract($ped);
            ?>
            <tr>
                <th scope="row" class="tables-row"><?php echo Validation::getNameUser($id_user) ?></th>
                <th scope="row" class="tables-row"><?php echo $idPedido ?></th>
                <td class="tables-first">R$<?php echo number_format($valor,2,",","") ?></td>
                <td class="tables-first"><?php echo Validation::getTotalProdutosCarrinho($idPedido); ?> produto</td>
                <td class="tables-last"><span class="badge badge-soft-<?php echo Validation::getClassStatus($id_status) ?>"><?php echo Validation::getStatus($id_status) ?></span></td>
                <td class="tables-handle">
                    <a href="./extrato/<?php echo $idPedido?>" class="btn btn-primary btn-sm"><i class="fa fa-file-alt"></i> Extrato</a>
                    <button type="button" data-toggle="modal" data-target="#modal-comprovante<?php echo $id ?>" class="btn btn-success btn-sm"><i class="fa fa-file-upload"></i> Enviar Comprovante</button>
                    <button type="button" data-toggle="modal" data-target="#modal<?php echo $id ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Detalhar</button>
                </td>
            </tr>
            <!------------------------------------------------------------------------------------->
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
                            
                        </div>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
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
              <!------------------------------------------------------------------------------------->
        <?php } ?>
        </tbody>
    </table>
</div>