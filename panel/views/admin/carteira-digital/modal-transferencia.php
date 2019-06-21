<!-- Modal -->
<div class="modal fade" id="modal-transferencia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> TRANSFERÊNCIA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="div-transferencia">
                <p class="text-center" id="div-load-transferencia">
                    <img width="100" src="<?php echo Url::getBase() . '../assets/img/icons/load.gif' ?>" alt=""><br>
                    carregando...
                </p>
                <p class="text-center" id="div-img-top-transferencia"><img width="100" src="<?php echo Url::getBase() . '../assets/img/icons/transferencia.svg' ?>" alt=""></p>
                <form class="form" id="form-transferencia" method="POST" style="display:none">
                    <input type="hidden" name="limite_disponivel" value="<?php echo Dados::getComissao($_SESSION['idUser']) ?>">
                    <input type="hidden" name="id_user_origem" value="<?php echo $_SESSION['idUser'] ?>">
                    <input type="hidden" name="id_user_recebedor">
                    <div class="form-group">
                        <label for="">Login do usuário recebedor</label>
                        <input type="text" class="form-control  form-control-rounded" name="id_user_destino" id="id_user_destino" placeholder="Login do usuário recebedor" required autofocus>
                        <div id="status-user"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Valor a ser transferido</label>
                        <input type="text" class="form-control  form-control-rounded moeda" name="valor_transferencia" id="valor_transferencia" placeholder="Valor do transferência. Ex: R$ 5.00, 25.50, 100" required disabled>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-outline-primary btn-block" disabled id="btn-transferencia"><i class="fa fa-wallet"></i> Transferir</button>
                </form>
            </div>
        </div>
    </div>
</div>