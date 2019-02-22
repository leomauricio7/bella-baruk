
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10 col-xl-8">
      <br>
        <h1 class="display-4 text-center mb-3">
            <img class="brand-login" src="<?php echo Url::getBase(); ?>assets/img/logotipos/logo-bella-baruk.png" alt=""><br>
          </h1>
        <div class="header">
            <div class="header-body">
                <h6 class="header-pretitle">
                Formulario de Indicação
                </h6>
                <h1 class="header-title">
                Dados Pessoais
                </h1>
            </div>
        </div>

        <!-- Form -->
        <form class="mb-4">
          <div class="row">
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" id="text" class="form-control" required>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>URI</label>
                <input type="text" name="slug" id="slug" class="form-control" required readonly>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label class="mb-1">Email</label>
                <small class="form-text text-muted">
                  Informe um email valido para o sistema.
                </small>
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="text" name="telefone" class="form-control mb-3" placeholder="(___)___-____" data-mask="(00) 00000-0000" autocomplete="on" maxlength="14" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label>Indicador</label>
                <input type="text" class="form-control" name="indicador" readonly="readonly" value="<?php echo Validation::getNameIndicador(Url::getURL(1)) ?>">
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
                    <li>Letras maiusculas e minusculas</li>
                  </ul>

                </div>
              </div>

            </div>
            <div class="col-12 col-md-6">
              <!-- New password -->
              <div class="form-group">
                <label> Senha</label>
                <input type="password" class="form-control" name="senha" required>
              </div>

              <!-- Confirm new password -->
              <div class="form-group">
                <label>Confirma senha</label>
                <input type="password" class="form-control" name="confirm_senha" required>
              </div>

              <!-- Submit -->
              <button type="submit" class="btn btn-primary">
                Finalizar cadastro
              </button>
              <a href="<?php echo Url::getBase() ?>" class="btn btn-danger">
                Cancelar
                </a>
              
            </div>
          </div> <!-- / .row -->
        </form>
      </div>
    </div>
</div>