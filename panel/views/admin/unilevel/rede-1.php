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
                    <i class="fa fa-money-check-alt"></i> Todas as Comissões
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/user-niveis" class="nav-link <?php echo  Url::getURL(1) == 'user-niveis' ? 'active' : '' ?>">
                    <i class="fa fa-users"></i> Comissão por nível na rede
                </a>
            </li>
        </ul>
        <?php
        if (empty(Url::getURL(1))) {
            require_once 'ornograma.php';
        } else {
            switch (Url::getURL(1)) {
                case 'home':
                    require_once 'ornograma.php';
                    break;
                case 'comissoes':
                    require_once 'comissoes.php';
                    break;
                case 'user-niveis':
                    require_once 'users-niveis.php';
                    break;
                default:
                    require_once 'ornograma.php';
                    break;
            }
        }
        ?>
    </div> <!-- / .card-body -->
</div>
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">
                <!-- Title -->
                <h4 class="card-header-title">
                    Rede UNILEVEL - Usuários por nível
                </h4>
            </div>
        </div> <!-- / .row -->
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-sm nav-overflow">
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/1" class="nav-link <?php echo  Url::getURL(1) != 'indicados' || Url::getURL(3) == '1' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 1º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/2" class="nav-link <?php echo Url::getURL(3) == '2' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 2º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/3" class="nav-link <?php echo Url::getURL(3) == '3' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 3º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/4" class="nav-link <?php echo Url::getURL(3) == '4' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 4º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/5" class="nav-link <?php echo Url::getURL(3) == '5' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 5º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/6" class="nav-link <?php echo Url::getURL(3) == '6' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 6º Nível
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>unilevel/indicados/nivel/7" class="nav-link <?php echo Url::getURL(3) == '7' ? 'active' : '' ?>">
                    <i class="fa fa-list-ol"></i> 7º Nível
                </a>
            </li>

        </ul>
        <?php
            require_once 'indicados-por-niveis.php';
        ?>
    </div> <!-- / .card-body -->
</div>