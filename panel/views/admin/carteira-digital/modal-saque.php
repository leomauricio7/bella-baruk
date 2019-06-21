<!-- Modal -->
<div class="modal fade" id="modal-saque" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-info-circle"></i> SOLICITAÇÃO DE SAQUE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="div-saque">
                <p class="text-center" id="div-load-saque">
                    <img width="100" src="<?php echo Url::getBase().'../assets/img/icons/load.gif' ?>" alt=""><br>
                    carregando...
                </p>
                <p class="text-center" id="div-img-top-saque"><img width="100" src="<?php echo Url::getBase().'../assets/img/icons/saque.png' ?>" alt=""></p>
                <form class="form" id="form-saque" method="POST" style="display:none">
                    <input type="hidden" name="limite_disponivel" value="<?php echo Dados::getComissao($_SESSION['idUser']) ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['idUser'] ?>">
                    <div class="form-group">
                        <label for="valor_saque">Digite o valor do saque</label>
                        <input type="text" class="form-control  form-control-rounded moeda" name="valor_saque" placeholder="Valor do saque. Ex: R$ 5.00, 25.50, 100" required autofocus>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-wallet"></i> Solicitar Saque</button>
                </form>
            </div>
        </div>
    </div>
</div>