<div class="container-fluid">
  <div class="row">
    <!-- card graficos-->
    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Usuários
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                <?php echo Unilevel::getTotalUsersMaster() ?>
              </span>
              <!-- Badge -->
              <span class="badge badge-soft-success mt-n1">
                <?php echo Unilevel::getTotalUsersAtivosMaster() ?>
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fa fa-users text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>

    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Vendas
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                <?php echo Validation::getTotalPedidos() ?>
              </span>
              <!-- Badge -->
              <span class="badge badge-soft-success mt-n1">
                <?php echo Validation::getTotalPedidos(3) ?>
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fa fa-cart-plus text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>

    </div>
    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Produtos
              </h6>

              <div class="row align-items-center no-gutters">
                <div class="col-auto">
                  <!-- Heading -->
                  <span class="h2 mr-2 mb-0">
                    <?php echo Unilevel::getTotalProdutos() ?>
                  </span>

                </div>
                <div class="col">
                  <!-- Progress -->
                  <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div> <!-- / .row -->
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fa fa-cash-register text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>

    </div>
    <div class="col-12 col-lg-6 col-xl">
      <!-- Card -->
      <div class="card">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h6 class="card-title text-uppercase text-muted mb-2">
                Saldo
              </h6>
              <!-- Heading -->
              <span class="h2 mb-0">
                R$<?php echo Unilevel::getSaldoTotalComprasPagas() ?>
              </span>
            </div>
            <div class="col-auto">
              <!-- Icon -->
              <span class="h2 fa fa-money-check-alt text-muted mb-0"></span>
            </div>
          </div> <!-- / .row -->
        </div>
      </div>
    </div>
  </div> <!-- / .row -->

  <div class="row">
    <div class="col-12 col-xl-12">

      <!-- Orders -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h4 class="card-header-title">
                Filiados por regiões
              </h4>
            </div>
          </div> <!-- / .row -->
        </div>
        <div class="card-body">
        <div id="regions_div" style="width: 900px; height: 500px;"></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-6">
      <!-- Devices -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h4 class="card-header-title">
                Filiados Ativos e inativos %
              </h4>
            </div>
          </div> <!-- / .row -->
        </div>
        <div class="card-body">
          <div id="piechart"></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-6">
      <!-- Devices -->
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col">
              <!-- Title -->
              <h4 class="card-header-title">
                Filiados ativos e inativos *Quantidade
              </h4>
            </div>
          </div> <!-- / .row -->
        </div>
        <div class="card-body">
          <div id="columnchart_values"></div>
        </div>
      </div>
    </div>

  </div> <!-- / .row -->
</div>