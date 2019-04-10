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
                    Niveis de Pontuação
                </h1>
                </div>
                <div class="col-auto">                
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->
    </div>
</div>
<div class="container-fluid">
    <div class="row">

        <div class="col">
            <?php 
            if(Url::getURL(1) == 'create' || Url::getURL(1) == 'edit'){
                require_once 'forms/pontuacao.php';
            }
            if(Url::getURL(1) == null){
                require_once 'tables/pontuacao.php';
            }
             ?>
        </div>

    </div>
</div>