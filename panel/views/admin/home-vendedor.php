
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark" role="alert">
                <h4 class="alert-heading">ATENÇÃO</h4>
                <p>Seja bem vindo a área administratva do sistema, para indicar copie o link abaixo.</p>
                <hr>
                <h2 class="mb-0"><i class="fa fa-anchor"></i><a href="http://localhost:8080/bella-baruk/new-user/<?php echo Validation::getURI($_SESSION['idUser']) ?>"><span class="badge badge-pill badge-primary">http://localhost:8080/bella-baruk/new-user/<?php echo Validation::getURI($_SESSION['idUser']) ?></span></a></h2>
            </div>
        </div>
    </div>

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
                      1000
                    </span>
                    <!-- Badge -->
                    <span class="badge badge-soft-success mt-n1">
                      85
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
                      60
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
                      Pontuação
                    </h6>

                    <div class="row align-items-center no-gutters">
                      <div class="col-auto">
                        <!-- Heading -->
                        <span class="h2 mr-2 mb-0">
                          20
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
                      R$85.50
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
</div>