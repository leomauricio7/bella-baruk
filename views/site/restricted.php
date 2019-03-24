
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

<!-- CONTENT
================================================== -->
<div class="container-fluid">
  <div class="row align-items-center justify-content-center">
    <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-5">
    <div class="alert alert-dark text-center" >
    <i class="fa fa-user-secret"></i><strong> Atenção!</strong> Este acesso é exclusivo para usuários administrativos. Caso não
      seja um usuário com permissões volte para a tela de login.
      </div>
      <h1 class="display-4 text-center mb-3">
        <a href="<?php echo Url::getBase(); ?>">
          <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-bella-baruk.png" alt=""><br>
        </a>
      </h1>
        <?php
          if (isset($_SESSION['logado'])){
              echo '<script>window.location.href="panel/";</script>';
          }else{
              unset($_SESSION['logado']);
          }
          if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
        ?>
        <!-- Allerts msg -->
        <div class="alert alert-danger alert-dismissible" role="alert" id="error" style="display:none; text-align: center;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>ATENÇÃO!</strong><p class="msg"></p>
        </div>
        <div class="alert alert-success alert-dismissible" role="alert" id="success" style="display:none; text-align: center;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>ATENÇÃO!</strong><p class="msg"> <span id="countdown"></span></p>
        </div>
      <form id="form-login">
        <div class="form-group">
          <label>Usuário</label>
          <input type="text" class="form-control" id="user" placeholder="Digite seu usuário" name="user" required>
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
            <input type="password" id="senha" class="form-control form-control-appended" name="senha" placeholder="Digite sua senha" required>
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-eye" id="olho"></i>
              </span>
            </div>
          </div>
        </div>
        <!-- <div class="checkbox mb-3">
            <div class="g-recaptcha" data-sitekey="6Lelv2oUAAAAAKqDbwRpG6W79ppJB1Fs1Int7ca2"></div>
        </div> -->
        <button class="btn btn-lg btn-block btn-dark mb-3" type="submit">
          Entrar
        </button>
      </form>
    </div>
    <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
      <div class="bg-cover vh-100 mt-n1 mr-n3" style="<?php echo 'background-image: url('.Url::getBase().'assets/img/covers/auth-side-cover.jpg)'; ?>"></div>
    </div>
  </div> <!-- / .row -->
</div>