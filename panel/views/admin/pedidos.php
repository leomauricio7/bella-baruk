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
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">ATENÇÃO</h4>
        <p>Nessa página você pode visualizar os pedidos dos franqueados.</p>
        <hr>
        <p class="mb-0">Cada pedido pode detalhado.</p>
    </div>
    <div class="row">
        <?php require_once 'tables/pedido.php'; ?>
    </div>
</div>