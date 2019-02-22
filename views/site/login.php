
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
         
          <h1 class="display-4 text-center mb-3">
            <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-bella-baruk.png" alt=""><br>
          </h1>
          <p class="text-muted text-center mb-5">
            BellaBaruk BackOffice
          </p>
          <?php
            if (isset($_SESSION['logado'])):
                echo '<script>window.location.href="panel/";</script>';
            else:
                unset($_SESSION['logado']);
            endif;
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            if ($_POST) {
                $valida = new Validation();
                if ($valida->verificaRecaptcha($_POST['g-recaptcha-response'])):
                    $valida->setEmail(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
                    $valida->setSenha(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
                    if ($valida->logar()) {
                      echo '<script>window.location.href="panel/";</script>';
                    } else {
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                    }
                else:
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ATENÇÃO</strong> Recaptcha Inválido!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';
                endif;
            }
            ?>
          <form method="post">
            <div class="form-group">
              <label>E-mail</label>
              <input type="text" class="form-control" placeholder="Digite seu email" name="email" required>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <label>Senha</label>
                </div>
                <div class="col-auto">
                  <a href="<?php echo Url::getBase(); ?>password-reset" class="form-text small text-muted">
                   Esqueceu a senha?
                  </a>
                </div>
              </div> <!-- / .row -->
              <div class="input-group input-group-merge">
                <input type="password" class="form-control form-control-appended" name="senha" placeholder="Digite sua senha" required>
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-eye"></i>
                  </span>
                </div>
              </div>
            </div>
            <div class="checkbox mb-3">
                <div class="g-recaptcha" data-sitekey="6Lelv2oUAAAAAKqDbwRpG6W79ppJB1Fs1Int7ca2"></div>
            </div>
            <button class="btn btn-lg btn-block btn-primary mb-3" type="submit">
              Entrar
            </button>
          </form>
        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(assets/img/covers/auth-side-cover.jpg);"></div>
        </div>
      </div> <!-- / .row -->
    </div>