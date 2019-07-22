<ul class="list-group list-group-flush list my-n3">
    <?php
    $readItemPedido = new Read();
    $readItemPedido->ExeRead('produtos_pedido', 'where id_pedido = '.$idPedido);
    foreach($readItemPedido->getResult() as $dadosView){
        extract($dadosView);
    ?>
    <li class="list-group-item px-0">
        <div class="row align-items-center">
            <div class="col-auto">   
                <!-- Avatar -->
                <a href="profile-posts.html" class="avatar">
                <img src="<?php echo Url::getBase().'docs/produtos/'.$id_produto.'/'.Validation::getImagesProdutos($id_produto) ?>" alt="..." class="avatar-img rounded-circle">
                </a>
            </div>
            <div class="col ml-n2">
                <!-- Title -->
                <h3 class="mb-1 name">
                    <strong>Produto:</strong> <?php echo Validation::getNameProduto($id_produto) ?>
                </h3><hr>
                
                <div class="row align-items-center">
                    <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-2">
                        Valor Unitário
                    </h6>
                    <span class="h2 mb-0">
                    R$ <?php echo Dados::getValueProduct($id_produto, null, $id_user) ?>
                    </span>
                    </div>
                    <!-- col -->
                    <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-2">
                        Quantidade
                    </h6>
                    <span class="h2 mb-0">
                        <?php echo $quantidade ?>
                    </span>
                    </div>
                    <!-- col -->
                    <div class="col">
                    <h6 class="card-title text-uppercase text-muted mb-2">
                        Valor Total
                    </h6>
                    <span class="h2 mb-0">
                    R$ <?php echo number_format(Dados::getValueProduct($id_produto, null, $id_user) * $quantidade) ?>
                    </span>
                    </div>
                </div> <!-- / .row -->
                
            </div>
        </div> <!-- / .row -->
    </li>
<?php }  ?>
</ul>