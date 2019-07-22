<?php if($tipoUser == 3 || $tipoUser == 4){ ?>
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
                    Pedidos
                </h1>
                </div>
                <div class="col-auto">                
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->
    </div>
</div>
<div class="container-fluid">
    <div class="alert alert-dark" role="alert">
        <p><i class="fa fa-exclamation-circle"></i> Nessa página você pode visualizar todas as suas vendas.</p>
        <hr>
        <p class="mb-0">Cada pedido pode ser detalhado.</p>
    </div>
    <div class="row">
        <?php require_once 'tables/pedido-distribuido.php'; ?>
    </div>
</div>
<?php }else{
    require_once('404.php');
} ?>