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
                   <i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?>
                </h1>
                </div>
                <div class="col-auto">                
                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->
    </div>
</div>
<?php 
    if(Validation::getPermisionType($tipoUser)){
        require_once 'graficos.php';
    }else{
        require_once 'home-vendedor.php';
    }
 ?>