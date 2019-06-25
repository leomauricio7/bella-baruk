<?php
if ($_SESSION['idTipo'] == 1) { ?>
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
                            <?php 
                                $idEscritorio = Dados::getById(Url::getURL(1));
                                if(isset($_SESSION['log_in_escritorio']) && !empty($_SESSION['log_in_escritorio']) && Dados::validaURLPageUser(Url::getURL(1)) && !empty($idEscritorio)){
                                    echo 'Escritório Virtual - ' . Validation::getIndicador($idEscritorio);
                                }else{
                                    echo 'Escritório Virtual';
                                }
                            ?>
                            
                        </h1>
                    </div>
                    <div class="col-auto">
                        <?php if (isset($_SESSION['log_in_escritorio']) && !empty($_SESSION['log_in_escritorio'])) { ?>
                            <a class="btn btn-light mb-2" href="javascript:history.back()"><i class="fa fa-angle-double-left"></i> Pagina Anterior</a>
                            <a class="btn btn-light mb-2" href="<?php echo Url::getBase() . 'views/admin/escritorio/logout.php' ?>">Sair <i class="fa fa-sign-out-alt"></i></a>
                        <?php } ?>
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->
        </div>
    </div>
    <!-- modal loading -->
    <div class="modal fade modal-loading" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img id="load" src="https://m.camarapiracicaba.sp.gov.br/Content/Imagens/loading.gif" alt="">
                    <div id="text-load" class="animate-bottom">
                        <h2 class="text-status"></h2>
                        <button id="success" class="btn btn-primary btn-facebook">Ir para o Escritório virtual</button>
                        <button id="error" class="btn btn-danger btn-facebook" data-dismiss="modal">Tente novamente</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <?php
            if (Url::getURL(0) == 'escritorio-virtual' && empty(Url::getURL(1))) {
                require_once 'escritorio/login.php';
            }

            if (Url::getURL(0) == 'escritorio-virtual' && !empty(Url::getURL(1))) {
                require_once 'escritorio/index.php';
            }
            ?>
        </div>
    </div>
<?php } ?>