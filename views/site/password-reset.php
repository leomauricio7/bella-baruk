<!-- verifica se existe tokenm de recuperação e senha-->
<?php 
$_token = addslashes(filter_input(INPUT_GET, "_token", FILTER_DEFAULT));
if(isset($_token) && !empty($_token)){
    if(Validation::verificaToken($_token)){
?>
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
          <h1 class="display-4 text-center mb-3">
            <a href="<?php echo Url::getBase();?>">
              <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-bella-baruk.png" alt=""><br>
            </a>
          </h1>
          <p class="text-muted text-center mb-5">
            Recuperação de senha.
          </p>
          <?php                    
              /*###########################################################################*/
              if ($_POST):
                  $valida = new Validation();
                  //pegando os valores do formulario
                  $novaSenha = addslashes(filter_input(INPUT_POST, "novaSenha", FILTER_SANITIZE_MAGIC_QUOTES));
                  //fazendo a validação
                  if($valida->updateSenha($_token, $novaSenha)){
                    $_SESSION['msg'] = 
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>ATENÇÃO: </strong>Senha alterada com sucesso.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';
                      echo '<script>window.location.href="'.Url::getBase().'"</script>';
                  }
              endif;               
          ?>
          <form method="post">

            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label>Nova Senha</label>
                </div>
              </div> <!-- / .row -->
              <div class="input-group input-group-merge">
                <input type="password" id="senha" class="form-control form-control-appended" name="novaSenha" placeholder="Digite sua senha" required>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-eye" id="olho"></i>
                  </span>
                </div>
              </div>
            </div>
           <!-- Confirm new password -->
            <div class="form-group">
              <label>Confirma senha</label>
              <input type="password" class="form-control" id="confirm_senha" required>
            </div>

            <button class="btn btn-lg btn-block btn-primary mb-3">
              Alterar senha
            </button>
            <div class="text-center">
              <small class="text-muted text-center">
                Ja possui cadastro? <a href="<?php echo Url::getBase() ?>">Clique aqui</a>.
              </small>
            </div>
          </form>
        </div>

        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(assets/img/covers/auth-side-cover.jpg)"></div>
        </div>
        
      </div> <!-- / .row -->
    </div>
<?php
    }else{
      $_SESSION['msg'] = 
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>ATENÇÃO: </strong> token de recuperação de senha expirado ou não existe.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
          </button>
      </div>';
        echo '<script>window.location.href="'.Url::getBase().'"</script>';
    }
  }else{

?>
<!-- se não existe tokem vai pro form de recuperação de senha -->
<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
          <h1 class="display-4 text-center mb-3">
            <a href="<?php echo Url::getBase();?>">
              <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-bella-baruk.png" alt=""><br>
            </a>
          </h1>
          <p class="text-muted text-center mb-5">
            Informe um email cadastrado.
          </p>
          <?php                    
              /*###########################################################################*/
              if ($_POST):
                  $valida = new Validation();
                  //pegando os valores do formulario
                  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_MAGIC_QUOTES);
                  //setando os valores nos metodos
                  $valida->setEmail($email);
                  if($valida->validaEmail()){
                      //fazendo a validação
                      $valida->recuperaSenha();
                      echo $valida->getMsg();
                  }else{
                    echo $valida->getMsg();
                  }

              endif;               
          ?>
          <form method="post">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" placeholder="name@address.com" required>
            </div>
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Recuperar senha
            </button>
            <div class="text-center">
              <small class="text-muted text-center">
                Ja possui cadastro? <a href="<?php echo Url::getBase() ?>">Clique aqui</a>.
              </small>
            </div>
          </form>
        </div>

        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(assets/img/covers/auth-side-cover.jpg)"></div>
        </div>
        
      </div> <!-- / .row -->
    </div>
<?php } ?>