<div class="card card-body p-5">
    <div class="row">
        <div class="col-12">
            <img src="<?php echo Url::getBase() . '../assets/img/logotipos/correios.png' ?>" alt="" class="img-fluid mx-auto d-block" width="200">
        </div><br>

        <div class="col">
            <div class="form-group">
                <label for="exampleInputEmail1">Digite Seu CEP</label>
                <input type="text" class="form-control" id="cep" placeholder="Seu cep">
                <small class="form-text text-muted"><a href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCepEndereco.cfm" target="_blank">Não sei meu CEP</a></small>
            </div>
            <button class="btn btn-success calcular-frete">Calcular</button>
        </div>
        <div class="col" id="retorno" style="display:none"> 
            <div class="form-group"> 
                <label for="exampleInputEmail1">Informações</label>
                <input type="text" class="form-control" readonly id="frete">
                <small class="form-text text-muted">Prazo de entrega: <span id="prazo"></span></small>
            </div>
            <button class="btn btn-dark confirma-frete">Confirmar Frete?</button>
        </div>
    </div>
    <div class="card card-body p-5 extrato" style="display:none">
        <div class="row">
            <div class="col text-right">
                <!-- Badge -->
                <div class="badge badge-danger">
                    Comprovante
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col text-center">
                <!-- Logo -->
                <img src="<?php echo Url::getBase(); ?>../assets/img/logotipos/logo-bella-baruk.png" alt="..." class="img-fluid mb-4" style="max-width: 2.5rem;">
                <!-- Title -->
                <h2 class="mb-2">
                    <?php echo $_SESSION['user'] ?>
                </h2>
                <!-- Text -->
                <p class="text-muted mb-6">
                    <input type="hidden" id="id-pedido" value="<?php echo random_int(999999, 999999999) ?>">
                    Pedido Nº <?php echo random_int(999999, 999999999) ?>
                </p>
            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-md-6">

                <h6 class="text-uppercase text-muted">
                    Dados da conta do recebedor
                </h6>

                <p class="text-muted mb-4">
                    <strong class="text-body">CEF</strong><br>
                    Nome: Mauricio do Carmo Amaro<br>
                    Agência: 1026<br>
                    Conta: 00022590-3 <br>
                    Operação: 001 <br>
                    Tipo: Conta Corrente<br>
                </p>
                <p class="text-muted mb-4">
                    <strong class="text-body">Itáu</strong><br>
                    Nome: Mauricio do Carmo Amaro<br>
                    Agência: 5604<br>
                    Conta: 05633-2-3 <br>
                    Tipo: Conta Corrente<br>
                </p>
            </div>
            <div class="col-12 col-md-6 text-md-right">

                <h6 class="text-uppercase text-muted">
                    Dados do Comprador
                </h6>

                <p class="text-muted mb-4">
                    <strong class="text-body"><?php echo $dadosUser['nome'] ?></strong> <br>
                    <?php
                    echo $dadosUser['bairro'] . '<br>' . $dadosUser['rua'] . ' - Nº' . $dadosUser['numero'] . '<br>' . $dadosUser['cidade'] . '/' . $dadosUser['uf']
                    ?>
                </p>
                <h6 class="text-uppercase text-muted">
                    Data <?php echo date('d/m/Y') ?>
                </h6>
            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12">

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table my-4">
                        <thead>
                            <tr>
                                <th class="px-0 bg-transparent border-top-0">
                                    <span class="h6">Produto</span>
                                </th>
                                <th class="px-0 bg-transparent border-top-0">
                                    <span class="h6">Valor Unitario</span>
                                </th>
                                <th class="px-0 bg-transparent border-top-0">
                                    <span class="h6">Quantidade</span>
                                </th>
                                <th class="px-0 bg-transparent border-top-0 text-right">
                                    <span class="h6">Valor Total</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['carrinho'])) {
                                $totalPedido = 0;
                                for ($i = 0; $i < sizeof($_SESSION['carrinho']); $i++) {
                                    ?>
                                    <tr>
                                        <td class="px-0">
                                            <?php echo Validation::getNameProduto($_SESSION['carrinho'][$i]['id']) ?>
                                        </td>
                                        <td>
                                            R$ <?php echo Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) ?>
                                        </td>
                                        <td class="px-0">
                                            <?php echo $_SESSION['carrinho'][$i]['quantidade'] ?> UNID
                                        </td>
                                        <td class="px-0 text-right">
                                            R$ <?php
                                                $totalPedido += Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) * $_SESSION['carrinho'][$i]['quantidade'];
                                                echo number_format(Dados::getValueProduct($_SESSION['carrinho'][$i]['id']) * $_SESSION['carrinho'][$i]['quantidade'], 2, ",", "")
                                                ?>
                                        </td>
                                    </tr>
                                <?php }
                            } ?>

                            <tr>
                                <td class="px-0 border-top border-top-2">
                                    <strong>Total</strong>
                                </td>
                                <td colspan="3" class="px-0 text-right border-top border-top-2">
                                    <input type="hidden" id="total-pedido" value="<?php echo $totalPedido ?>">
                                    <span class="h3">
                                        R$ <?php echo number_format($totalPedido, 2, ",", ""); ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr class="my-5">

                <!-- Title -->
                <h6 class="text-uppercase">
                    Atenção
                </h6>

                <!-- Text -->
                <p class="text-muted mb-0">
                    Para comprovar o pagamento desse pedido, clique no botão confirmar logo abaixo, após isso faça a transferência ou realize o depósito para a conta acima supracitada. Depois dessa etapa vá na aba pedidos e envie o comprovante de transferência ou depósito bancario.
                </p>

            </div>
        </div> <!-- / .row -->
    </div>