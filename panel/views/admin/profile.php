<div class="header">
  <img src="<?php echo Url::getBase(); ?>../assets/img/covers/profile-cover-1.jpg" class="header-img-top" alt="..."/>
  <!-- container-menu -->
  <div class="container-fluid">
  <!-- menu header -->
    <div class="header-body mt-n5 mt-md-n6">
	<!-- capa menu profile -->
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
	<!---- fim capa menu profile -->
	<!--menu links -->
      <div class="row align-items-center">
        <div class="col">
          <ul class="nav nav-tabs nav-overflow header-tabs">
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>profile/dados-pessoais" class="nav-link <?php echo Url::getURL(1) == 'dados-pessoais' ? 'active' : '' ?>">
                Dados Pessoais
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>profile/dados-bancarios" class="nav-link <?php echo Url::getURL(1) == 'dados-bancarios' ? 'active' : '' ?>">
              Dados Bancarios
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>profile/endereco" class="nav-link <?php echo Url::getURL(1) == 'endereco' ? 'active' : '' ?>">
              Endereço
              </a>
            </li>
          </ul>
        </div>
      </div>
	<!-- fim menu links -->  
    </div>
	<!-- fim menu header-->
  </div>
  <!-- fim container-menu-->
</div>
<?php 
if(Url::getURL(1) != null){
  switch(Url::getURL(1)){
    case 'dados-bancarios': require_once 'profile/dados-bancarios.php'; break;
    case 'endereco': require_once 'profile/dados-endereco.php'; break;
    case 'dados-pessoais':
    default: require_once 'profile/dados-pessoais.php'; break;
  }
}
?>