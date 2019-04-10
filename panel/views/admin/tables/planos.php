<!-- header-->
<div class="pt-7 pb-8 bg-dark bg-ellipses">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <h1 class="display-3 text-center text-white">
                    Planos de ativação
                </h1>
                <p class="lead text-center text-muted">
                    Faça a adesão de um plano de ativação de acordo com seus com seus critérios.
                </p>
            </div>
        </div> <!-- / .row -->
    </div>
</div>
<!-- article -->
<div class="container-fluid">
    <div class="row mt-n7">
        <?php
            $read = new Read();
            $read->ExeRead('products','WHERE id_tipo = 1 ORDER BY id DESC');
            foreach($read->getResult() as $product){
                extract($product);
        ?>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body">
                <h6 class="text-uppercase text-center text-muted my-4">
                    <?php echo $titulo ?>
                </h6>
                <div class="row no-gutters align-items-center justify-content-center">
                    <div class="col-auto">
                    <div class="h2 mb-0">R$</div>
                    </div>
                    <div class="col-auto">
                    <div class="display-2 mb-0"><?php echo number_format($preco, 2, ",", ""); ?></div>
                    </div>
                </div> <!-- / .row --> 
                <!-- Period -->
                <div class="h6 text-uppercase text-center text-muted mb-5">
                    / mês
                </div>
                <!-- Features -->
                <div class="mb-3">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                        <small>Lider de equipe</small> <i class="fa fa-check-circle text-success"></i>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                        <small>Lucros por ativação</small> <i class="fa fa-check-circle text-success"></i>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                        <small>Pontuação por compras</small> <i class="fa fa-check-circle text-success"></i>
                    </li>
                    <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                        <small>Validade</small> <small><?php echo $validade ?> dias</small>
                    </li>
                    </ul>
                </div>
                <?php if(Validation::getPermisionType($tipoUser)){ ?>
                    <a href="<?php echo Url::getBase().'../controllers/delete.php?pag=products&tb=products&ch=id&value='.$id ?>" class="btn btn-block btn-danger">
                        <i class="fa fa-trash"></i> Excluir
                    </a>
                <?php } ?>
                <?php if(!Validation::getPermisionType($tipoUser)){ ?>
                    <!-- Button -->
                    <a href="#!" class="btn btn-block btn-primary">
                        Comprar
                    </a>
                <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div> <!-- / .row -->
</div>