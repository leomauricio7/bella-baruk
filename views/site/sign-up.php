<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-10 col-xl-8">
            <div class="header">
                <div class="header-body">
                    <h6 class="header-pretitle">
                    Formulario de Indicação
                    </h6>
                    <h1 class="header-title">
                   Formulario
                    </h1>
                </div>
            </div>

            <!-- Form -->
            <form class="mb-4">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>Nome</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>Sobrenome</label>
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label class="mb-1">Email</label>
                    <small class="form-text text-muted">
                      Informe um email valido para o sistema.
                    </small>
                    <input type="email" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="text" class="form-control mb-3" placeholder="(___)___-____" data-mask="(000) 000-0000" autocomplete="off" maxlength="14">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label>Indicador</label>
                    <input type="text" class="form-control" readonly="readonly" value="indicador">
                  </div>
                </div>
              </div> <!-- / .row -->

              <!-- Divider -->
              <hr class="mt-4 mb-5">
              <div class="row">
                <div class="col-12 col-md-6 order-md-2">
                  <div class="card bg-light border ml-md-4">
                    <div class="card-body">
                      
                      <p class="mb-2">
                        Requerimentos da senha
                      </p>

                      <p class="small text-muted mb-2">
                        Para criar sua senha, você deve seguir esses observações:
                      </p>

                      <ul class="small text-muted pl-4 mb-0">
                        <li>Minimo 8 caracteres</li>
                        <li>Caracteres especial</li>
                        <li>Número</li>
                        <li>Letras maisculas e minusculas</li>
                      </ul>

                    </div>
                  </div>

                </div>
                <div class="col-12 col-md-6">
                  <!-- New password -->
                  <div class="form-group">
                    <label> Senha</label>
                    <input type="password" class="form-control">
                  </div>

                  <!-- Confirm new password -->
                  <div class="form-group">
                    <label>Confirma senha</label>
                    <input type="password" class="form-control">
                  </div>

                  <!-- Submit -->
                  <button type="submit" class="btn btn-primary">
                   Finalizar cadastro
                  </button>
                  <a href="<?php echo Url::getBase() ?>" class="btn btn-lg btn-success header-title">
                    Voltar à página inicial
                    </a>

                  
                </div>
              </div> <!-- / .row -->
            </form>
          </div>
        </div>
    </div>