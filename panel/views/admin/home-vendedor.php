<?php if(Validation::getPermisionTypeVendedor($tipoUser)){ ?>
<div class="container-fluid">
<!-- não fez a primeira compra -->
<?php if(!Dados::verificaAdesão($_SESSION['idUser'])){ ?>
  <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO</h4>
                <p>Para ativar seu cadastro efetue uma comprar no valor de RS 160,00  ou acima.</p>
                <hr>
                <p class="mb-0">Seu cadastro se encontra temporariamente <span class="badger badger-danger">inativo</span></p>
                <h2><i class="fa fa-info-circle">
                  </i><a class="badge badge-dark" href="<?php echo Url::getBase() ?>planos">Clique aqui e faça sua ativação para ter nossos descontos.</a></h2>
            </div>
        </div>
    </div>
    <!-- ja fez a primeira compra mas ja se passou 30 dias e não compro ativação -->
<?php }elseif(!Dados::existePlanoAtivo($_SESSION['idUser'])){?>
  <div class="row">
        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> ATENÇÃO!</h4><hr>
                <p class="badge badge-pill" style="font-size: 15px">Seu plano de ativação expirou, compre outro plano para continuar ganhando as comissões da sua equipe.</p>
                <h2><i class="fa fa-info-circle">
                  </i><a class="badge badge-dark" href="<?php echo Url::getBase() ?>planos">Clique aqui e faça sua ativação para ter nossos descontos.</a></h2>
            </div>
        </div>
    </div>
    <!-- ja fez a primeira compra e possui plano ativo -->
<?php }elseif(Dados::existePlanoAtivo($_SESSION['idUser'])){ ?>
  <div class="row">
        <div class="col-12">
            <div class="alert alert-ativacao" role="alert">
                <h1 class="alert-heading"><i class="fa fa-exclamation-triangle"></i>  Ola, <?php echo $_SESSION['user'] ?> seu cadastrado se encontra <span class="badge badge-success">ATIVADO</span></h1><hr>
                <p class="badge badge-pill badge-info" style="font-size: 15px">Seu plano de ativação vence em <?php echo Dados::diasRestantesAtivacao($_SESSION['idUser']) ?> dias.</p>
            </div>
        </div>
    </div>
<?php } ?>

    <div class="row">
        <div class="col-12">
            <div class="alert alert-dark" role="alert">
                <p><i class="fa fa-exclamation-circle"></i> Seja bem vindo a área administratva do sistema, para indicar copie o link abaixo.</p>
                <hr>
                <h2 class="mb-0"><i class="fa fa-anchor">
                  </i><a href="https://bellabaruk.com.br/<?php echo Validation::getURI($_SESSION['idUser']) ?>" id="url"><span class="badge badge-pill badge-primary">https://bellabaruk.com.br/<?php echo Validation::getURI($_SESSION['idUser']) ?></span></a>
                  <button 
                  class="btn btn-sm btn-success"
                  id="copiar"
                  data-clipboard-text=""
                  data-toggle="tooltip-copy"
                  data-placement="top"
                  title="Copiado com sucesso!"
                  >Copiar</button>
                </h2>
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
                      Usuários Indicados
                    </h6> 
                    <!-- Heading -->
                    <span class="h2 mb-0">
                      <?php echo Dados::getIndicados($_SESSION['idUser']) ?>
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
                      Compras
                    </h6>
                    <!-- Heading -->
                    <span class="h2 mb-0">
                    <?php echo Dados::getCompras($_SESSION['idUser']) ?>
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
                          <?php echo Dados::getPontuacao($_SESSION['idUser']) ?>
                        </span>
                        
                      </div>
                      <div class="col">
                        <!-- Progress -->
                        <div class="progress progress-sm">
                          <div class="progress-bar" role="progressbar" style="width: <?php echo (Dados::getPontuacao($_SESSION['idUser'])*0.1) ?>%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100%"></div>
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
                      R$ <?php echo Dados::getComissao($_SESSION['idUser']) ?>
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
    <?php require_once('tables/indicados.php'); ?>
</div>
<?php }else{
    require_once('404.php');
} ?>
