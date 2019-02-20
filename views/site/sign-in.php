
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
          <form>
            <div class="form-group">
              <label>Usuário</label>
              <input type="text" class="form-control" placeholder="Digite seu usuário">
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
                <input type="password" class="form-control form-control-appended" placeholder="Digite sua senha">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-eye"></i>
                  </span>
                </div>
              </div>
            </div>
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Entrar
            </button>
            <p class="text-center">
              <small class="text-muted text-center">
               Não possui conta? <a href="<?php echo Url::getBase() ?>sign-up">cadastre-se agora</a>.
              </small>
            </p>  
          </form>
        </div>
        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(assets/img/covers/auth-side-cover.jpg);"></div>
        </div>
      </div> <!-- / .row -->
    </div>