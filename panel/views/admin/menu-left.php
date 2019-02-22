<?php require_once 'modal/notifications.php'; ?>
<?php require_once 'modal/logout.php'; ?>
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">
          <!-- Toggler -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Brand -->
          <a class="navbar-brand" href="<?php echo Url::getBase() ?>">
            <img src="<?php echo Url::getBase(); ?>../assets/img/logotipos/logo-bella-baruk.png" class="navbar-brand-img 
            mx-auto" alt="...">
          </a>
          <!-- User (xs) menu celular-->
          <div class="navbar-user d-md-none">
            <!-- Dropdown -->
            <div class="dropdown">
              <!-- Toggle -->
              <a href="#" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-sm avatar-online">
                  <img 
                  src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>"
                  class="avatar-img rounded-circle"
                  alt="..."
                  >
                </div>
              </a>
              <!-- Menu -->
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                <a href="<?php echo Url::getBase() ?>profile" class="dropdown-item">Perfil</a>
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
              <?php if(Validation::getPermisionType($tipoUser)){ ?>
                <li class="nav-item">
                  <a class="nav-link collapsed" href="#users" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
                    <i class="fa fa-users"></i> Franqueados
                  </a>
                  <div class="collapse " id="users">
                    <ul class="nav nav-sm flex-column">

                      <li class="nav-item">
                        <a href="<?php echo Url::getBase() ?>new-user" class="nav-link ">
                          Cadastrar
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo Url::getBase() ?>franqueados" class="nav-link ">
                          Listar
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
              <?php } ?>
              <?php if(Validation::getPermisionType($tipoUser)){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase() ?>niveis">
                  <i class="fa fa-restroom"></i> Nivéis 
                </a>
              </li>
              <?php } ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase() ?>profile">
                  <i class="fa fa-user"></i> Meus Dados
                </a>
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
            <?php if(Validation::getPermisionType($tipoUser)){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#sidebarComponents" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarComponents">
                  <i class="fa fa-book-open"></i> Produtos
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
                        Cátalogo
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase() ?>pedidos">
                  <i class="fa fa-cart-plus"></i> Pedidos
                </a>
              </li>
              <?php } ?>

              <?php if(!Validation::getPermisionType($tipoUser)){ ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo Url::getBase() ?>products">
                  <i class="fa fa-cart-plus"></i> Loja
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
                    <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle" alt="...">
                  </div>
                </a>
                <!-- Menu -->
                <div class="dropdown-menu" aria-labelledby="sidebarIconCopy">
                  <a href="<?php echo Url::getBase() ?>profile" class="dropdown-item"><i class="fa fa-user"></i> Perfil</a>
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