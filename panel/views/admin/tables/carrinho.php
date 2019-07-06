<div class="col-12">
    <div class="card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Title -->
                    <h4 class="card-header-title">
                        <i class="fa fa-cart-plus"></i> Total de produtos no carrinho: <?php echo isset($_SESSION['carrinho']) ? sizeof($_SESSION['carrinho']) : 'vazio' ?>
                    </h4>  
                </div>
            </div> <!-- / .row -->
        </div>
        <div class="card-header">
            <!-- Form -->
            <form>
            <div class="input-group input-group-flush input-group-merge">
                <input type="search" class="form-control form-control-prepended search" placeholder="Pesquisar produto">
                <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-search"></span>
                </div>
                </div>
            </div>
            </form>
        </div>
        <div class="card-body">
            <!-- List group -->
            <ul class="list-group list-group-flush list my-n3">
            <?php
            if(isset($_SESSION['carrinho'])){
                for($i = 0; $i < sizeof($_SESSION['carrinho']); $i++){
                    //verifica se o indice é valido
                    if(!isset($_SESSION['carrinho'][$i])){$i+=1;}
            ?>
                <li class="list-group-item px-0">
                    <div class="row align-items-center">
                        <div class="col-auto">   
                            <!-- Avatar -->
                            <a href="profile-posts.html" class="avatar">
                            <img src="<?php echo Url::getBase().'docs/produtos/'.$_SESSION['carrinho'][$i]['id'].'/'.Validation::getImagesProdutos($_SESSION['carrinho'][$i]['id']) ?>" alt="..." class="avatar-img rounded-circle">
                            </a>
                        </div>
                        <div class="col ml-n2">
                            <!-- Title -->
                            <h3 class="mb-1 name">
                            <?php echo Validation::getNameProduto($_SESSION['carrinho'][$i]['id']) ?>
                            </h3>
                            
                            <div class="row align-items-center">
                                <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Valor Unitário
                                </h6>
                                <span class="h2 mb-0">
                                R$ <?php echo Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) ?>
                                </span>
                                </div>
                                <!-- col -->
                                <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Quantidade
                                </h6>
                                <span class="h2 mb-0">
                                    <?php echo $_SESSION['carrinho'][$i]['quantidade'] ?>
                                </span>
                                </div>
                                <!-- col -->
                                <div class="col">
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Valor Total
                                </h6>
                                <span class="h2 mb-0">
                                R$ <?php echo number_format(Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) * $_SESSION['carrinho'][$i]['quantidade'],2, ",", "") ?>
                                </span>
                                </div>
                            </div> <!-- / .row -->
                            
                        </div>
                        <div class="col-auto">

                            <button <?php echo $_SESSION['carrinho'][$i]['quantidade'] == 0 ? 'disabled': '' ?> alt="<?php echo $_SESSION['carrinho'][$i]['id'] ?>" class="btn btn-sm btn-info remove-one-product"><i class="fa fa-minus-square"></i> -1</button>  
                            
                            <button alt="<?php echo $_SESSION['carrinho'][$i]['id'] ?>" class="btn btn-sm btn-success add-produto"><i class="fa fa-plus-square"></i> +1</button>  
                            <!-- Button -->
                            <button alt="<?php echo $_SESSION['carrinho'][$i]['id'] ?>" class="btn btn-sm btn-danger remove-product">
                                <i class="fa fa-times-circle"></i> Remover produto
                            </button>
                        </div>
                    </div> <!-- / .row -->
                </li>
            <?php } } ?>
            </ul>
        </div>
    </div>
</div>

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
<!--modal close pedido-->
<div class="modal fade" id="modal-close-pedido" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Extrato de pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php require_once 'extrato.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-outline-primary" id="submit-pedido" style="display:none">Confirmar pedido</button>
      </div>
    </div>
  </div>
</div>
<!--loading-->
<div class="loading" id="loading">Loading&#8230;</div>