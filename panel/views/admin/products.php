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
            Produtos
          </h1>
        </div>
        <div class="col-auto">
          <!--destroy session-->
          <?php
          if (isset($_SESSION['carrinho'])) {
            ?>
            <button class="btn btn-danger" id="closeSession">
              <i class="fa fa-times-circle"></i>Cancelar pedido
            </button>
          <?php } ?>
          <?php
          if (!Validation::getPermisionType($tipoUser) && isset($_SESSION['carrinho'])) {
            ?>
            <!-- Button -->
            <a href="<?php echo Url::getBase() ?>carrinho" class="btn btn-outline-dark">
              <i class="fa fa-shopping-cart" id="icon-carrinho"></i>
              <span class="badge badge-pill badge-soft-secondary">
                <?php echo isset($_SESSION['carrinho']) ? sizeof($_SESSION['carrinho']) : 0 ?>
              </span>
            </a>
          <?php } ?>
        </div>
      </div> <!-- / .row -->
    </div> <!-- / .header-body -->

  </div>
</div>
<div class="container-fluid">
  <?php if (Dados::verificaFirstCompra($_SESSION['idUser'])) { ?>
    <?php if ($tipoUser == 3 || $tipoUser == 4) { ?>
      <div class="alert alert-dark" role="alert">
        <p><i class="fa fa-exclamation-circle"></i> Nessa página você pode visualizar os produto da loja ofical do Bella Baruk.</p>
        <hr>
        <p class="mb-0">Paea realizar um pedido, o valor  minimo é de <span class="badge badge-success">R$ 3.000</span></p>
      </div>
    <?php } else { ?>

      <div class="alert alert-dark" role="alert">
        <p><i class="fa fa-exclamation-circle"></i> Nessa página você pode visualizar os produto da loja.</p>
        <hr>
        <p class="mb-0">Cada produto pode detalhado e comprado caso você deseje.</p>
      </div>

    <?php }
  } else if ($tipoUser == 3 || $tipoUser == 4) { ?>

    <div class="alert alert-dark" role="alert">
      <p><i class="fa fa-exclamation-circle"></i><strong>Atenção!</strong> Você ainda não realizou a sua primeira compra no sistema, faça já seu pedido para ter acesso aos nossos descontos, o valor minimo do pedido para a adesão é de <span class="badge badge-danger">R$ <?php echo $tipoUser == 3 ? '10.000' : '3.000' ?></span></p>
    </div>

  <?php } else { ?>
    <div class="alert alert-dark" role="alert">
      <p><i class="fa fa-exclamation-circle"></i><strong>Atenção!</strong> Para ter acesso ao nossos descontos, faça um pedido no valor minimo de <span class="badge badge-danger">R$ 160.00</span></p>
    </div>
  <?php } ?>

  <div class="row">
    <?php require_once 'catalogo.php'; ?>
  </div>
</div>
<div class="loading" id="loading">Loading&#8230;</div>
<!-- Modal-->
<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="msg-modal"></p>
      </div>
    </div>
  </div>
</div>