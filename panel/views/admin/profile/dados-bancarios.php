<div class="container-fluid">
    <div class="row">
        <?php
            if ($_POST && $_POST['save']){
                    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
                    if(!Validation::existeContaUser($_SESSION['idUser'])){
                        $user = new Create();
                        unset($dados['save']);
                        $dados['id_user'] = $_SESSION['idUser'];
                        $user->ExeCreate('conta_users', $dados);
                    }else{
                        $user = new Update();
                        $request = [
                            'titular'=>$dados['titular'],
                            'cpf_titular'=>$dados['cpf_titular'],
                            'conta'=>$dados['conta'],
                            'tipo_conta'=>$dados['tipo_conta'],
                            'agencia'=>$dados['agencia'],
                            'banco'=>$dados['banco'],
                        ];
                        $user->ExeUpdate('conta_users',$request, 'where id_user = :id', 'id='.$_SESSION['idUser']);
                    }
                    if (!$user->getResult()):
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> Alterações não foram salvas.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                            </button>
                        </div>';
                    else:
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
        <!-- verifica se existe uma conta cadastrada para o usuario -->
            <?php
                $read = new Read();
                $read->ExeRead('conta_users', 'where id_user = '.$_SESSION['idUser']);
                if($read->getRowCount() == 0 ){
                    echo '<div class="alert alert-warning" role="alert">
                        <i class="fa fa-info-circle"></i> Dados bancarios não cadastrados, habilite a edição e preencha os dados abaixo e clique em salvar para finalizar o cadastro.
                    </div>';
                    require_once 'form-banco.php';
                }else{
                //se existe uma conta cadastrada para o usuário logado
                foreach($read->getResult() as $dados){
                    extract($dados);
                        require_once 'form-banco.php';
                }
            }
            ?>

            <div class="row">
                <div class="col-12 col-md-12">
                  <div class="form-group">
                    <label class="mb-1">Dados Bancarios</label>
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
                          Habilitar edição dos dadso bancarios
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