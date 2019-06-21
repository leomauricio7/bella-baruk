<div class="card">
    <div class="card-header">
        <div class="header-body">
            <h6 class="header-pretitle">
                Perfil
            </h6>

            <h1 class="header-title">
                Meu Perfil
            </h1>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <?php
                if ($_POST && $_POST['save']) {
                    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
                    $user = new Update();
                    $request = [
                        'nome' => $dados['nome'],
                        'slug' => $dados['slug'],
                        'cpf' => $dados['cpf'] != '' ? $dados['cpf'] : '',
                        'cnpj' => $dados['cnpj'] != '' ? $dados['cnpj'] : '',
                        'sexo' => $dados['sexo'],
                        'tipo_pessoa' => $dados['tipo_pessoa'],
                        'email' => $dados['email'],
                        'telefone' => $dados['telefone'],
                        'tipo_user' => $dados['tipo_user'],
                    ];
                    $dados['avatar'] = ($_FILES['avatar']['tmp_name'] ? $_FILES['avatar'] : null);
                    if ($dados['avatar'] != null) {
                        $request['avatar'] = $_FILES['avatar']['name'];
                        $file = $_FILES['avatar'];
                        $uploud = new Uploud();
                        @$uploud->Imagem($file, 'users/' . $idEscritorio . '/');
                    }
                    $user->ExeUpdate('users', $request, 'where id = :id', 'id=' . $idEscritorio);
                    if (!$user->getResult()) :
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Alterações não foram salvas.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                    else :
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Sucesso!</strong> Alterações foram salvas.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>';
                        unset($dados);
                    endif;
                    unset($dados);
                }
                ?>
                <form class="mb-4" method="post" action="" enctype="multipart/form-data" novalidate>
                    <?php
                    $read = new Read();
                    $read->ExeRead('users', 'where id = ' . $idEscritorio);
                    foreach ($read->getResult() as $dados) {
                        extract($dados);
                        ?>
                        <div class="form-row">
                            <div class="col-12 col-md-3 mb-3">
                                <label>Nome</label>
                                <input type="text" class="form-control" id="text" name="nome" value="<?php echo $nome ?>" placeholder="Nome e sobrenome" disabled required>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer02">Login</label>
                                <input type="text" class="form-control" name="slug" value="<?php echo $slug ?>" disabled required>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer04">Tipo Usuário</label>
                                <select name="tipo_pessoa" id="tipo_pessoa" disabled required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                                    <option value="">SELECIONE</option>
                                    <option <?php echo $tipo_pessoa == "juridica" ? 'selected' : '' ?> value="juridica" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/cnpj.png">Juridica</option>
                                    <option <?php echo $tipo_pessoa == "fisica" ? 'selected' : '' ?> value="fisica" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/cpf.png">Fisica</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-3 mb-3" id="cpf">
                                <label for="validationServer02">CPF</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf" value="<?php echo $cpf ?>" data-mask="000.000.000-00" disabled required>
                            </div>
                            <div class="col-12 col-md-3 mb-3" id="cnpj">
                                <label for="validationServer02">CNPJ</label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cnpj" value="<?php echo $cnpj ?>" data-mask="00.000.000/0000-00" disabled required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Avatar</label>
                            <input type="file" class="form-control-file" name="avatar" disabled required>
                        </div>
                        <!--dados pessoais-->
                        <div class="form-row">
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer03">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $email ?>" placelholder="belabaruk@gmail.com" disabled required>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer04">Telefone</label>
                                <input type="text" class="form-control" name="telefone" value="<?php echo $telefone ?>" data-mask="(00)00000-0000" disabled required>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer04">Sexo</label>
                                <select name="sexo" disabled required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                                    <option value="">SELECIONE</option>
                                    <option <?php echo $sexo == "M" ? 'selected' : '' ?> value="M" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/masculino.png">Masculino</option>
                                    <option <?php echo $sexo == "F" ? 'selected' : '' ?> value="F" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/feminino.jpg">Feminino</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3 mb-3">
                                <label for="validationServer04">Tipo Acesso</label>
                                <select name="tipo_user" disabled required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                                    <option value="">SELECIONE</option>
                                    <?php if (Validation::getPermisionType($tipoUser)) { ?>
                                        <option <?php echo $tipo_user == "1" ? 'selected' : '' ?> value="1" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/admin.png">Administrador</option>
                                    <?php } ?>
                                    <option <?php echo $tipo_user == "2" ? 'selected' : '' ?> value="2" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/master.png">Vendedor</option>
                                </select>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="mb-1">Dados Pessoais</label>
                                <small class="form-text text-muted">
                                    Habile a opção abaixo para poder fazer alterações no perfil.
                                </small>
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchOne">
                                            <label class="custom-control-label" for="switchOne" id="on-edit"></label>
                                        </div>
                                    </div>
                                    <div class="col ml-n2">
                                        <small class="text-muted">
                                            Habilitar edição
                                        </small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar" name="save" disabled>
                </form>
            </div> <!-- / .row -->
        </div>
    </div>
</div>