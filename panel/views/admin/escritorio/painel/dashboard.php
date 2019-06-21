<?php if (!Validation::getPermisionTypeVendedor($tipoUser)) { ?>
  <div class="container-fluid">
    <?php
    require_once __DIR__ . '/header.php';
    require_once __DIR__ . '/home.php';
    require_once __DIR__ . '/indicados.php';
    require_once __DIR__ . '/pedidos.php';
    require_once __DIR__ . '/matriz.php';
    require_once __DIR__ . '/unilevel.php';
    require_once __DIR__ . '/comissoes.php';
    require_once __DIR__ . '/transferencias.php';
    require_once __DIR__ . '/saques.php';
    require_once __DIR__ . '/profile.php';
    ?>
  </div>
<?php } else {
  require_once __DIR__ . '../../404.php';
} ?>