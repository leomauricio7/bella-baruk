<?php if(Validation::getPermisionType($tipoUser)){ ?>
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
                    Niveis
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
        <p>Nessa página você pode gerenciar os niveis e comissões dos franquiados.</p>
        <hr>
        <p class="mb-0">Cada nível pode ser editado e removido, mas muito cuidado na remoção de um nivel.</p>
    </div>
    <div class="row">
        <div class="col">
            <?php require_once 'forms/nivel.php'; ?>
        </div>
        <div class="col">
            <?php require_once 'tables/nivel.php' ?>
        </div>
    </div>
</div>
<?php }else{
    require_once('404.php');
} ?>