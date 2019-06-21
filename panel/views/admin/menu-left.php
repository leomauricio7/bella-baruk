<?php require_once 'modal/notifications.php'; ?>
<?php require_once 'modal/logout.php'; ?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <img title="<?php echo $_SESSION['user'] ?>" class="img-user-menu" src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'docs/users/' . $_SESSION['idUser'] . '/' . $_SESSION['avatar'] : Url::getBase() . '../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle" alt="...">
    <hr class="navbar-divider my-3">

    <!-- <a class="navbar-brand" href="<?php echo Url::getBase() ?>">
      <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'docs/users/' . $_SESSION['idUser'] . '/' . $_SESSION['avatar'] : Url::getBase() . '../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle" alt="...">
      <img src="<?php echo Url::getBase(); ?>../assets/img/logotipos/logo-bella-baruk.png" class="navbar-brand-img 
            mx-auto" alt="..."> 
    </a> -->
    <!-- User (xs) menu celular-->
    <div class="navbar-user d-md-none">
      <!-- Dropdown -->
      <div class="dropdown">
        <!-- Toggle -->
        <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-sm avatar-online">
            <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'docs/users/' . $_SESSION['idUser'] . '/' . $_SESSION['avatar'] : Url::getBase() . '../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle" alt="...">
          </div>
        </a>
        <!-- Menu -->
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
          <a href="<?php echo Url::getBase() ?>profile/dados-pessoais" class="dropdown-item">Perfil</a>
          <hr class="dropdown-divider">
          <a href="?logout=true" class="dropdown-item">Sair</a>
        </div>
      </div>
    </div>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidebarCollapse">
      <!-- Form -->
      <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Buscar" aria-label="Search">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-search"></span>
            </div>
          </div>
        </div>
      </form>

      <!-- Navigation menu pc-->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo Url::getBase() ?>" role="button">
            <i class="fa fa-home"></i> Página Inical
          </a>
        </li>
        <?php if (Validation::getPermisionType($tipoUser)) { ?>
          <li class="nav-item">
            <a class="nav-link collapsed" href="#users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
              <i class="fa fa-users"></i> Usuários
            </a>
            <div class="collapse " id="users">
              <ul class="nav nav-sm flex-column">

                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>new-user" class="nav-link ">
                    Novo usuário
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>franqueados/ativo" class="nav-link ">
                    Ativos
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>franqueados/inativo" class="nav-link ">
                    Inativos
                  </a>
                </li>
              </ul>
            </div>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link collapsed" href="#user" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
            <i class="fa fa-user"></i> Perfil
          </a>
          <div class="collapse " id="user">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>profile/dados-pessoais" class="nav-link ">
                  Dados Pessoais
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>profile/dados-bancarios" class="nav-link ">
                  Dados Bancarios
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo Url::getBase() ?>profile/endereco" class="nav-link ">
                  Endereço
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item d-md-none">
          <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
            <span class="fa fa-bell"></span> Notificações
          </a>
        </li>
      </ul>

      <!-- Divider -->
      <hr class="navbar-divider my-3">

      <!-- Heading -->
      <h6 class="navbar-heading">
        SERVIÇOS
      </h6>

      <!-- Navigation -->
      <ul class="navbar-nav mb-md-4">
        <?php if (Validation::getPermisionType($tipoUser)) { ?>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
              <i class="fa fa-book-open"></i> Loja
            </a>
            <div class="collapse " id="sidebarComponents">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>new-product" class="nav-link">
                    Novo Produto
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>products" class="nav-link">
                    Produtos
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- pedidos -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="#menu-pedido" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
              <i class="fa fa-cart-plus"></i> Pedidos
              <span class="badge badge-success ml-auto">
                <?php echo Validation::getTotalPedidos() ?>
              </span>
            </a>
            <div class="collapse " id="menu-pedido">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>pedidos/aguardando-pagamento" class="nav-link">
                    Aguardando pagamento
                    <span class="badge badge-warning ml-auto">
                      <?php echo Validation::getTotalPedidos(1) ?>
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>pedidos/em-analise" class="nav-link">
                    Em Análise
                    <span class="badge badge-info ml-auto">
                      <?php echo Validation::getTotalPedidos(2) ?>
                    </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>pedidos/dado-baixa" class="nav-link">
                    Pagos
                    <span class="badge badge-success ml-auto">
                      <?php echo Validation::getTotalPedidos(3) ?>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!--comissões-->
          <li class="nav-item dropdown">
            <a class="nav-link" href="#comissoes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
              <i class="fa fa-restroom"></i> Comissões
            </a>
            <div class="collapse " id="comissoes">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>comissoes/create" class="nav-link">
                    Nova Comissão
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>comissoes" class="nav-link">
                    Comissões
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- adesão -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="#planos" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
              <i class="fa fa-cogs"></i> Planos de Ativação
            </a>
            <div class="collapse" id="planos">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>planos/create" class="nav-link">
                    Novo Plano
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>planos" class="nav-link">
                    Planos
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- pontuação -->
          <li class="nav-item dropdown">
            <a class="nav-link" href="#pnt" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
              <i class="fa fa-level-up-alt"></i> Níveis de Pontuação
            </a>
            <div class="collapse" id="pnt">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>nivel-pontuacao/create" class="nav-link">
                    Novo Nível
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo Url::getBase() ?>nivel-pontuacao" class="nav-link">
                    Níveis
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo Url::getBase() ?>escritorio-virtual" role="button">
              <i class="fa fa-user-secret"></i> Escritório Virtual
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo Url::getBase() ?>saques" role="button">
              <i class="fa fa-money-check-alt"></i> Saques
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="<?php echo Url::getBase() ?>transferencias" role="button">
              <i class="fa fa-exchange-alt"></i> Transferências
            </a>
          </li>
        <?php } ?>

        <?php if (!Validation::getPermisionType($tipoUser)) { ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>unilevel">
              <i class="fa fa-list-alt"></i> Unilevel
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>matriz">
              <i class="fa fa-sitemap"></i> Matriz
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>planos">
              <i class="fa fa-tags"></i> Ativação
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>plano-carreira">
              <i class="fa fa-wallet"></i> Plano de carreira
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>carteira-digital">
              <i class="fa fa-money-check-alt"></i> Carteira Digital
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>products">
              <i class="fa fa-cart-plus"></i> Loja
              <span class="badge badge-success ml-auto">
                <?php echo isset($_SESSION['carrinho']) ? sizeof($_SESSION['carrinho']) : '0' ?>
              </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Url::getBase() ?>meus-pedidos">
              <i class="fa fa-shopping-cart"></i> Meus Pedidos
            </a>
          </li>
        <?php } ?>
      </ul>

      <!-- Push content down -->
      <div class="mt-auto"></div>

      <!-- User (md) -->
      <div class="navbar-user d-none d-md-flex" id="sidebarUser">

        <!-- Icon -->
        <a href="#sidebarModalActivity" class="navbar-user-link" data-toggle="modal">
          <span class="icon">
            <i class="fa fa-bell"></i>
          </span>
        </a>
        <!-- Dropup -->
        <div class="dropup">
          <!-- Toggle -->
          <a href="#" id="sidebarIconCopy" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="avatar avatar-sm avatar-online">
              <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'docs/users/' . $_SESSION['idUser'] . '/' . $_SESSION['avatar'] : Url::getBase() . '../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle" alt="...">
            </div>
          </a>
          <!-- Menu -->
          <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
            <a href="<?php echo Url::getBase() ?>profile/dados-pessoais" class="dropdown-item"><i class="fa fa-user"></i> Perfil</a>
          </div>
        </div>
        <!-- Icon -->
        <a href="#logout" class="navbar-user-link" data-toggle="modal">
          <span class="icon">
            <i class="fa fa-sign-out-alt"></i>
          </span>
        </a>
      </div>
    </div> <!-- / .navbar-collapse -->
  </div>
</nav>