<?php $idPedido = Url::getURL(1); ?>
<div class="row justify-content-center">
  <div class="col-12 col-lg-10 col-xl-8"> 
	<!-- Header -->
	<div class="header mt-md-5">
	  <div class="header-body">
		<div class="row align-items-center">
		  <div class="col">
			<!-- Pretitle -->
			<h6 class="header-pretitle">
			  Pedido
			</h6>
			<!-- Title -->
			<h1 class="header-title">
			  Nº <?php echo $idPedido ?>
			</h1>
		  </div>
		  <div class="col-auto">	
			<!-- Buttons -->
			<button class="btn btn-white" onclick="window.print();">
			  <i class="fa fa-print"></i> Imprimir
			</button>
			<a href="<?php echo Url::getBase() ?>meus-pedidos" class="btn btn-primary ml-2">
			  <i class="fa fa-cart-plus"></i> Meus pedidos
			</a>
		  </div>
		</div> <!-- / .row -->
	  </div>
	</div>

	<div class="card card-body p-5" id="printable">
		<div class="row">
			<div class="col text-right">
				<!-- Badge -->
				<!-- <div class="badge badge-danger">
					Comprovante
				</div> -->
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
				Extrato Pedido Nº <?php echo $idPedido ?>
				</p>
			</div>
		</div> <!-- / .row -->
		<div class="row">
			<div class="col-12 col-md-6">
				<h6 class="text-uppercase text-muted">
				Dados da conta do recebedor
				</h6>
				<p class="text-muted mb-4">
				<strong class="text-body">Leonardo Mauricio</strong> <br>
				Conta: 00827400-9 <br>
				OP: 121 <br>
				Tipo: Poupança<br>
				</p>
				<h6 class="text-uppercase text-muted">
				Ceára Mirim - RN
				</h6>
			</div>
			<div class="col-12 col-md-6 text-md-right">
				<h6 class="text-uppercase text-muted">
				Dados do Comprador
				</h6>
				<p class="text-muted mb-4">
				<strong class="text-body"><?php echo $_SESSION['user'] ?></strong> <br>
				Acquisitions at Themers <br>
				236 Main St., #201 <br>
				Los Angeles, CA
				</p>
				<h6 class="text-uppercase text-muted">
				Due date
				</h6>
				<p class="mb-4">
				<time datetime="2018-04-23">Apr 23, 2018</time>
				</p>
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
							$totalPedido = 0;
							$readItemPedidoExtrato = new Read();
							$readItemPedidoExtrato->ExeRead('produtos_pedido', 'where id_pedido = '.$idPedido);
							foreach($readItemPedidoExtrato->getResult() as $dadosExtrato){
								extract($dadosExtrato);
						?>
						<tr>
							<td class="px-0">
								<?php echo Validation::getNameProduto($id_produto) ?>
							</td>
							<td>
								R$ <?php echo Dados::getValueProduct($id_produto) ?>
							</td>
							<td class="px-0">
								<?php echo $quantidade ?> UNID
							</td>
							<td class="px-0 text-right">
							R$ <?php 
								$totalPedido+=Dados::getValueProduct($id_produto) * $quantidade;
								echo number_format((Dados::getValueProduct($id_produto) * $quantidade), 2, ",", "") 
							?>
							</td>
						</tr>
						<?php }  ?>
						<tr>
							<td class="px-0 border-top border-top-2">
							<strong>Total</strong>
							</td>
							<td colspan="3" class="px-0 text-right border-top border-top-2">
							<span class="h3">
								R$ <?php echo number_format($totalPedido,2,",",""); ?>
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
  </div>
</div>