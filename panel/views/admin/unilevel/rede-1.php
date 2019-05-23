<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col"> 
            <!-- Title -->
            <h4 class="card-header-title">
                Rede UNILEVEL
            </h4>
            </div>
        </div> <!-- / .row -->
    </div>
    <div class="card-body">
    <ul class="nav nav-tabs nav-tabs-sm nav-overflow">
        <li class="nav-item">
            <a href="<?php echo Url::getBase() ?>unilevel/home" class="nav-link <?php echo  Url::getURL(1) == 'home' || Url::getURL(1) == '' ? 'active' : '' ?>">
            <i class="fa fa-tasks"></i> Minha Rede
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo Url::getBase() ?>unilevel/comissoes" class="nav-link <?php echo  Url::getURL(1) == 'comissoes' ? 'active' : '' ?>">
            <i class="fa fa-money-check-alt"></i> Comissões
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo Url::getBase() ?>unilevel/user-niveis" class="nav-link <?php echo  Url::getURL(1) == 'user-niveis' ? 'active' : '' ?>">
            <i class="fa fa-users"></i> Usuários por nível na rede
            </a>
        </li>
    </ul>
        <?php 
        if(empty(Url::getURL(1))){
            require_once 'ornograma.php';
        }else{
            switch(Url::getURL(1)){
                case 'home': require_once 'ornograma.php'; break;
                case 'comissoes': require_once 'comissoes.php'; break;
                case 'user-niveis': require_once 'users-niveis.php'; break;
                default: require_once 'ornograma.php'; break;
              }
        }
        ?>
    </div> <!-- / .card-body -->
</div>