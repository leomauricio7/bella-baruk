<div class="card-body">  
    <?php
        if ($_POST){
            $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
            $dados['senha'] = password_hash('123mudar', PASSWORD_DEFAULT);
            $typeValid = $dados['cpf'] != '' ? $dados['cpf'] : $dados['cnpj'];
            $validaCpf = new ValidaCPFCNPJ($typeValid);
            if ($validaCpf->valida()) {
                $dados['avatar'] = ($_FILES['avatar']['tmp_name'] ? $_FILES['avatar'] : null);
                $file = $_FILES['avatar'];
                $user = new User();
                $user->CreateUser($dados);
    
                if (!$user->getResult()):
                    echo $user->getMsg();
                else:
                    $uploud = new Uploud();
                    $uploud->Imagem($file, 'users/' . $user->getResult() . '/');
                    echo $user->getMsg();
                    unset($dados);
                endif;
                unset($dados);
            }else{
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ATENÇÃO!</strong> CPNF/CNP Inválido.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                </div>';
            }
        }
        if (!empty($_SESSION['msg'])):
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        endif;
    ?>          
    <form method="post" action="" enctype="multipart/form-data" novalidate>
        <div class="form-row">
            <div class="col-12 col-md-3 mb-3">
                <label>Nome</label>
                <input type="text" class="form-control" id="text" name="nome" placeholder="Nome e sobrenome" required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer02">URL</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Tipo Usuário</label>
                <select name="tipo_pessoa" id="tipo_pessoa" required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                    <option value="">SELECIONE</option>
                    <option value="juridica" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/cnpj.png">Juridica</option>
                    <option value="fisica" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/cpf.png">Fisica</option>
                </select>
            </div>

            <div class="col-12 col-md-3 mb-3" id="cpf">
                <label for="validationServer02" >CPF</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cpf" data-mask="000.000.000-00" required>
            </div>
            <div class="col-12 col-md-3 mb-3" id="cnpj">
                <label for="validationServer02">CNPJ</label>
                <input type="text" class="form-control" id="cpf_cnpj" name="cnpj" data-mask="00.000.000/0000-00" required>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Avatar</label>
            <input type="file" class="form-control-file" name="avatar" required>
        </div>
        <!--dados pessoais-->
        <div class="form-row">
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer03">Email</label>
                <input type="email" class="form-control" name="email" placelholder="belabaruk@gmail.com" required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Telefone</label>
                <input type="text" class="form-control" name="telefone" data-mask="(00)00000-0000" required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Sexo</label>
                <select name="sexo" required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                    <option value="">SELECIONE</option>
                    <option value="M" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/masculino.png">Masculino</option>
                    <option value="F" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/feminino.jpg">Feminino</option>
                </select>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Tipo Acesso</label>
                <select name="tipo_user" required class="form-control" data-toggle="select" data-minimum-results-for-search="-1">
                    <option value="">SELECIONE</option>
                    <option value="1" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/admin.png">Administrador</option>
                    <option value="2" data-avatar-src="<?php echo Url::getBase() ?>../assets/img/icons/master.png">Vendedor</option>
                </select>
            </div>
        </div>
        <!--endereço-->
        <div class="form-row">
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer03">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep" data-mask="00000-000" required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">UF</label>
                <input type="text" class="form-control" name="uf" id="uf" readonly required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" readonly required>
            </div>
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer04">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-3 mb-3">
                <label for="validationServer03">Rua</label>
                <input type="text" class="form-control" id="rua" name="rua" required>
            </div>
            <div class="col-12 col-md-1 mb-3">
                <label for="validationServer04">Número</label>
                <input type="number" class="form-control" name="numero" id="numero" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="validationServer04">Complemento</label>
                <input type="text" class="form-control" name="complemento" id="complemento" required>
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="validationServer04">Ponto de Referência</label>
                <input type="text" class="form-control" name="referencia" id="referencia" required>
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="x">Cadastrar Franqueado</button>
    </form>
</div>