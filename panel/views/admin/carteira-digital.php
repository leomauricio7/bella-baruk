<?php if(!Validation::getPermisionType($tipoUser)){ ?>
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
                    Carteira Digital
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
        <p><i class="fa fa-exclamation-circle"></i> Nessa página você pode visualizar os seus bônus, fazer transferências e saques.</p>
    </div>
    <?php require_once __DIR__.'/carteira-digital/index.php'; ?>
</div>
<?php }else{
    require_once('404.php');
} ?>