<?php
$read = new Read();
$read->ExeRead('products', 'where id_tipo is NULL ORDER BY id DESC');
foreach ($read->getResult() as $product) {
  extract($product);
  ?>
  <div class="col-md-3 col-xs-12 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h6 class="text-uppercase text-center text-muted my-4">
          <?php echo $titulo ?>
        </h6>
        <div class="row no-gutters align-items-center justify-content-center">
          <img src="<?php echo Url::getBase() . 'docs/produtos/' . $id . '/' . Validation::getImagesProdutos($id) ?>" class="avatar-img" alt="">
        </div>
        <div class="mb-3">
          <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
              <small>Produto</small> <small><?php echo $titulo ?></small>
            </li>

            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
              <small>Codigo Produto</small> <small><?php echo $id ?></small>
            </li>

            <!-- <?php if (Validation::getPermisionType($tipoUser)) { ?>
                              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                                <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco, 2, ",", ""); ?></strong></small>
                              </li>
                    <?php } ?> -->

            <?php if ($tipoUser == 3 || $tipoUser == 4) { ?>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo Dados::getValueProduct($id, $tipoUser); ?></strong></small>
              </li>
            <?php } else if (Dados::existePlanoAtivo($_SESSION['idUser'])) { ?>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco * 0.5, 2, ",", ""); ?></strong></small>
              </li>
            <?php } elseif (isset($_SESSION['carrinho'])) { ?>
              <?php if (Dados::verificaSeExisteDePlanoAtivacaoNoPedido($_SESSION['carrinho'])) { ?>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                  <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco * 0.5, 2, ",", ""); ?></strong></small>
                </li>
              <?php } else{ ?>
                <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                  <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo Dados::getValueProduct($id, $tipoUser); ?></strong></small>
                </li>
              <?php } ?>
            <?php } else { ?>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo Dados::getValueProduct($id, $tipoUser); ?></strong></small>
              </li>
            <?php } ?>

            <?php if (Validation::getPermisionType($tipoUser)) { ?>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small>Estoque</small> <small><?php echo $quantidade; ?></small>
              </li>
            <?php } ?>

            <?php if ($quantidade == 0) { ?>
              <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                <small style="color: red; font-weight: bold;"><i class="fa fa-info"></i> Produto em falta no Estoque.</small>
              </li>
            <?php } ?>

            <!-- <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                      <small>Publicado em:</small> <small><?php echo date('d/m/Y', strtotime($created)) ?></small>
                    </li> -->
            <!-- <li class="list-group-item d-flex align-items-center justify-content-between px-0">
                    <small>Vendidos</small> <small>0 und</small>
                  </li> -->
          </ul>
        </div>
        <?php if (Validation::getPermisionType($tipoUser)) { ?>
          <a href="<?php echo Url::getBase() . '../controllers/delete.php?pag=products&tb=products&ch=id&value=' . $id ?>" class="btn btn-block btn-danger">
            <i class="fa fa-trash"></i> Excluir
          </a>
          <a href="#!" class="btn btn-block btn-success">
            <i class="fa fa-eye"></i> Detalhar
          </a>
        <?php } else if($tipoUser == 2 || $tipoUser == 3 || $tipoUser == 4){ ?>
          <div class="col-auto">
            <input type="number" value="1" min="1" class="form-control form-control-sm float-left qtd qtd-<?php echo $id ?>">
            <button title="adicionar no carrinho" <?php if ($quantidade == 0) {
                      echo 'disabled';
                    } ?> alt="<?php echo $id ?>" class="btn btn-bb btn-sm add-produto float-right" tipo="0">
              <i class="fa fa-cart-plus"></i> Comprar
            </button>
          </div>

        <?php } ?>
      </div>
    </div>
  </div>
<?php } ?>