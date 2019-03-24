<div class="header">
  <img src="<?php echo Url::getBase(); ?>../assets/img/covers/profile-cover-1.jpg" class="header-img-top" alt="...">
  <div class="container-fluid">
    <div class="header-body mt-n5 mt-md-n6">
      <div class="row align-items-end">

        <div class="col-auto">
          <div class="avatar avatar-xxl header-avatar-top">
            <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" alt="..." class="avatar-img rounded-circle border border-4 border-card">
          </div>
        </div>

        <div class="col mb-3 ml-n3 ml-md-n2">
          <h6 class="header-pretitle">
          <?php echo Validation::getTipoUsario($_SESSION['idTipo']) ?>
          </h6>
          <h1 class="header-title">
            <?php echo $_SESSION['user'] ?>
          </h1>
        </div>
      </div>

      <div class="row align-items-center">
        <div class="col">
          
          <ul class="nav nav-tabs nav-overflow header-tabs">

            <li class="nav-item">
              <a href="profile-groups.html" class="nav-link active">
                Franqueados
              </a>
            </li>
            <li class="nav-item">
              <a href="profile-projects.html" class="nav-link">
                Dados Pessoais
              </a>
            </li>
            <li class="nav-item">
              <a href="profile-files.html" class="nav-link">
              Dados Bancarios
              </a>
            </li>
            <li class="nav-item">
              <a href="profile-subscribers.html" class="nav-link">
              Endereço
              </a>
            </li>
          </ul>

        </div>
      </div>
    </div>

  </div>
</div>