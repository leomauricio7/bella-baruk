<div class="container-fluid">
  <div class="header">
    <div class="card">
      <img src="<?php echo Url::getBase(); ?>../assets/img/covers/back.webp" alt="..." class="card-img-top">
      <div class="card-body text-center">
        <a href="profile-posts.html" class="avatar avatar-xl card-avatar card-avatar-top">
          <img src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" class="avatar-img rounded-circle border border-4 border-card" alt="...">
        </a>
        <h2 class="card-title">
          <a href="profile-posts.html"><?php echo $_SESSION['user'] ?></a>
        </h2>
        <p class="card-text text-muted">
          <small>
          <?php echo Validation::getTipoUsario($_SESSION['idTipo']) ?>
          </small>
        </p>
        <p class="card-text">
          <span class="badge badge-soft-secondary">
            Matriz 2x8
          </span>
          <span class="badge badge-soft-secondary">
          Informações gerais de sua  Matriz 2x8
          </span>
        </p>
        <hr>
        <?php require_once 'unilevel/header.php' ?> 
      </div>
    </div>
  </div>
  <?php require_once 'matriz/index.php' ?> 
</div>