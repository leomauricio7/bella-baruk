<?php
$read = new Read();
$read->ExeRead('products');
foreach($read->getResult() as $product){
  extract($product);
?>
<div class="col-3">
  <div class="card">
    <div class="card-body">
      <h6 class="text-uppercase text-center text-muted my-4">
      <?php echo $titulo ?>
      </h6>
      <div class="row no-gutters align-items-center justify-content-center">
        <img src="https://img.freepik.com/vetores-gratis/cosmetico-produto-embalagem-desenho-conceito-topo-marca-escuro-ouro-bokeh-fundo_1017-8194.jpg?size=338&ext=jpg" class="avatar-img" alt="">
      </div>
      <div class="mb-3">
        <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Titulo</small> <small>Tetse Produto</small>
          </li>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Preço</small> <small><i class="fa fa-dollar-sign text-success"></i>22.90</small>
          </li>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Publicado em:</small> <small>20/02/2019</small>
          </li>
          <li class="list-group-item d-flex align-items-center justify-content-between px-0">
            <small>Vendidos</small> <small>0 und</small>
          </li>
        </ul>
      </div>
      <a href="#!" class="btn btn-block btn-primary">
        Comprar
      </a>
    </div>
  </div>
</div>
<?php } ?>