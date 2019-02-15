<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-center">
        <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
          <h1 class="display-4 text-center mb-3">
          <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-teste.png" alt=""><br>
            <span class="title-p1">RESETAR</span><span class="title-p2"> SENHA!</span>
          </h1>
          <p class="text-muted text-center mb-5">
            Informe um email cadastrado.
          </p>
          <form>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" placeholder="name@address.com">
            </div>
            <button class="btn btn-lg btn-block btn-primary mb-3">
              Recupuperar senha
            </button>
            <div class="text-center">
              <small class="text-muted text-center">
                Relembro-me minha senha? <a href="<?php echo Url::getBase() ?>">Login</a>.
              </small>
            </div>
          </form>
        </div>

        <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
          <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(assets/img/covers/auth-side-cover.jpg)"></div>
        </div>
        
      </div> <!-- / .row -->
    </div>