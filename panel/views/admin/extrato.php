<?php
$idPedido = Url::getURL(1);
$pedido = Dados::getDadosPedido($idPedido);
$dadosComprador = Dados::getDadosUser($pedido['id_user'])[0];
$dadosBancario = Dados::getDadosBancarios($pedido['id_user']);
?>
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
						<?php 
							$url = 'pedidos';
							if($tipoUser ==3 || $tipoUser == 4){
								$url = 'vendas';
							}
						?>
							<a href="<?php echo Url::getBase().$url?>" class="btn btn-primary ml-2">
								<i class="fa fa-cart-plus"></i> Pedidos
							</a>
						<?php  ?>

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
						Cliente: <?php echo $dadosComprador['nome'] ?>
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
					<?php if ($tipoUser == 3 || $tipoUser == 4) { ?>
						<p class="text-muted mb-4">
							<strong class="text-body">CONTA</strong><br>
							Nome: <?php echo $dadosBancario['titular'] ?><br>
							Agência: <?php echo $dadosBancario['agencia'] ?><br>
							Conta: <?php echo $dadosBancario['conta'] ?><br>
							Operação: <br>
							Tipo: <?php echo $dadosBancario['tipo_conta'] ?><br>
						</p>
					<?php } else { ?>
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
					<?php } ?>
				</div>
				<div class="col-12 col-md-6 text-md-right">
					<h6 class="text-uppercase text-muted">
						Dados do Comprador
					</h6>
					<p class="text-muted mb-4">
						<strong class="text-body"><?php echo $dadosComprador['nome'] ?></strong> <br>
						<?php
						echo $dadosComprador['bairro'] . '<br>' . $dadosComprador['rua'] . ' - Nº' . $dadosComprador['numero'] . '<br>' . $dadosComprador['cidade'] . '/' . $dadosComprador['uf']
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
								$totalPedido = 0;
								$readItemPedidoExtrato = new Read();
								$readItemPedidoExtrato->ExeRead('produtos_pedido', 'where id_pedido = ' . $idPedido);
								foreach ($readItemPedidoExtrato->getResult() as $dadosExtrato) {
									extract($dadosExtrato);
									?>
									<tr>
										<td class="px-0">
											<?php echo Validation::getNameProduto($id_produto) ?>
										</td>
										<td>
											R$ <?php echo Dados::getValueProduct($id_produto, $tipoUser, $pedido['responsavel'] == null ? null : $dadosComprador['id']) ?>
										</td>
										<td class="px-0">
											<?php echo $quantidade ?> UNID
										</td>
										<td class="px-0 text-right">
											R$ <?php
												$totalPedido += Dados::getValueProduct($id_produto, $tipoUser, $pedido['responsavel'] == null ? null : $dadosComprador['id']) * $quantidade;
												echo number_format((Dados::getValueProduct($id_produto, $tipoUser, $pedido['responsavel'] == null ? null : $dadosComprador['id']) * $quantidade), 2, ",", "")
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
	</div>
</div>