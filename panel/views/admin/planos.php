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
                        Planos de Adesão
                    </h1>
                </div>
                <div class="col-auto">
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->
    </div>
</div>
<div class="container-fluid">
    <?php if (Url::getURL(1) == 'create') { ?>
        <div class="alert alert-dark" role="alert">
            <h4 class="alert-heading">ATENÇÃO</h4>
            <p>Nessa página você pode gerenciar os planos de adesão do usuário.</p>
            <hr>
            <p class="mb-0">Cada plano pode ser editado e removido, mas muito cuidado na remoção de um plano.</p>
        </div>
    <?php } ?>

    <div class="row">
        <div class="col">
            <?php
            if ($tipoUser == 1 || $tipoUser == 2) {
                if (Url::getURL(1) == 'create') {
                    if ($tipoUser == 1) {
                        require_once 'forms/plano.php';
                    } else {
                        require_once '404.php';
                    }
                } else if (Url::getURL(1) == null) {
                    require_once 'tables/planos.php';
                } else {
                    require_once '404.php';
                }
            } else {  require_once '404.php'; }
            ?>
        </div>
    </div>
</div>