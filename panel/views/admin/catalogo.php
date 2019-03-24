<?php
$read = new Read();
$read->ExeRead('products','ORDER BY id DESC');
foreach($read->getResult() as $product){
  extract($product);
?>
<div class="col-md-3 col-xs-12 col-sm-12">
  <div class="card">
    <div class="card-body">
      <h6 class="text-uppercase text-center text-muted my-4">
      <?php echo $titulo ?>
      </h6>
      <div class="row no-gutters align-items-center justify-content-center">
        <img src="<?php echo Url::getBase().'docs/produtos/'.$id.'/'.Validation::getImagesProdutos($id) ?>" class="avatar-img" alt="">
      </div>
      <div class="mb-3">
        <ul class="list-group list-group-flush">

          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Titulo</small> <small><?php echo $titulo ?></small>
          </li>

          <?php if(Validation::getPermisionType($tipoUser)){ ?>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco, 2, ",", ""); ?></strong></small>
          </li>
          <?php } ?>

          <?php if(!Validation::getPermisionType($tipoUser) && (!Dados::verificaStatus($_SESSION['idUser']))){ ?>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco*0.5, 2, ",", ""); ?></strong></small>
          </li>
          
          <?php }else{?>
            <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Preço</small> <small><strong style="font-size:15px;">R$ <?php echo number_format($preco, 2, ",", ""); ?></strong></small>
          </li>
          <?php } ?>

          <?php if(Validation::getPermisionType($tipoUser)){ ?>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Estoque</small> <small><?php echo $quantidade; ?></small>
          </li>
          <?php } ?>

          <?php if($quantidade == 0){ ?>
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
      <?php if(Validation::getPermisionType($tipoUser)){ ?>
        <a href="<?php echo Url::getBase().'../controllers/delete.php?pag=products&tb=products&ch=id&value='.$id ?>" class="btn btn-block btn-danger">
          <i class="fa fa-trash"></i> Excluir
        </a>
        <a href="#!" class="btn btn-block btn-success">
          <i class="fa fa-eye"></i> Detalhar
        </a>
      <?php }else{ ?>
        <button <?php if($quantidade == 0){ echo 'disabled'; } ?> alt="<?php echo $id ?>" class="btn btn-block btn-outline-dark add-produto">
          <i class="fa fa-cart-plus"></i> Comprar
        </button>
      <?php }?>
    </div>
  </div>
</div>
<?php } ?>