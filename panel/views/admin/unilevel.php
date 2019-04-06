<div class="header">
  <img src="<?php echo Url::getBase(); ?>../assets/img/covers/profile-rede.jpg" class="header-img-top" alt="..."/>
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
              <a href="<?php echo Url::getBase() ?>unilevel/1" class="nav-link <?php echo Url::getURL(1) == '1' ? 'active' : '' ?>">
               1º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/2" class="nav-link <?php echo Url::getURL(1) == '2' ? 'active' : '' ?>">
             2º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/3" class="nav-link <?php echo Url::getURL(1) == '3' ? 'active' : '' ?>">
             3º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/4" class="nav-link <?php echo Url::getURL(1) == '4' ? 'active' : '' ?>">
             4º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/5" class="nav-link <?php echo Url::getURL(1) == '5' ? 'active' : '' ?>">
             5º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/6" class="nav-link <?php echo Url::getURL(1) == '6' ? 'active' : '' ?>">
             6º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/7" class="nav-link <?php echo Url::getURL(1) == '7' ? 'active' : '' ?>">
             7º Nivel
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::getBase() ?>unilevel/8" class="nav-link <?php echo Url::getURL(1) == '8' ? 'active' : '' ?>">
             8º Nivel
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
    require_once 'unilevel/niveis.php';
}
?>