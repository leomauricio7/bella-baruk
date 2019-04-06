<div class="container-fluid">
    <div class="row">
        <?php
            if ($_POST && $_POST['save-edit']){
                    $dados = Validation::limpaDados(filter_input_array(INPUT_POST, FILTER_DEFAULT));
                    $user = new Update();
                    $request = [
                        'cep'=>$dados['cep'],
                        'uf'=>$dados['uf'],
                        'cidade'=>$dados['cidade'],
                        'bairro'=>$dados['bairro'],
                        'rua'=>$dados['rua'],
                        'numero'=>$dados['numero'],
                        'complemento'=>$dados['complemento'],
                        'referencia'=>$dados['referencia'],
                    ];
                    $user->ExeUpdate('users',$request, 'where id = :id', 'id='.$_SESSION['idUser']);
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
            <?php 
                $read = new Read();
                $read->ExeRead('users', 'where id = '.$_SESSION['idUser']);
                foreach($read->getResult() as $dados){
                    extract($dados);
            ?>
            <!--endereço-->
            <div class="form-row">
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer03">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $cep ?>" data-mask="00000-000" disabled required>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer04">UF</label>
                    <input type="text" class="form-control" name="uf" value="<?php echo $uf ?>" id="uf" readonly disabled required>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer04">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade ?>" readonly disabled required>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer04">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $bairro ?>" disabled required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer03">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" value="<?php echo $rua ?>" disabled required>
                </div>
                <div class="col-12 col-md-2 mb-3">
                    <label for="validationServer04">Número</label>
                    <input type="number" class="form-control" name="numero" id="numero" value="<?php echo $numero ?>" disabled required>
                </div>
                <div class="col-12 col-md-3 mb-3">
                    <label for="validationServer04">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento" value="<?php echo $complemento ?>" disabled required>
                </div>
                <div class="col-12 col-md-4 mb-3">
                    <label for="validationServer04">Ponto de Referência</label>
                    <input type="text" class="form-control" name="referencia" id="referencia" value="<?php echo $referencia ?>" disabled required>
                </div>
            </div>
            <?php } ?>

            <div class="row">
                <div class="col-12 col-md-6">
                  <div class="form-group">
                    <label class="mb-1">Endereço</label>
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
                          Habilitar edição do endereço
                        </small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Salvar" name="save-edit" disabled>
        </form>
    </div> <!-- / .row -->
</div>