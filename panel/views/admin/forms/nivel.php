<div class="card-body">
    <!-- cadastro de niveis-->
    <?php
        if ($_POST):
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if($dados['type'] == 'update'){
                $update = new Update();
                $dados = ['nivel' => $dados['nivel'], 'comisao' => $dados['comisao']];
                $update->ExeUpdate('niveis', $dados, 'WHERE id = :id', 'id=' . Url::getURL(1) . '');
                if ($update->getResult()){
                    include_once('alert/success.php');
                }else{
                    include_once('alert/error.php');
                }
                unset($dados);
            }elseif($dados['type'] == 'add'){
                unset($dados['type']);
                $nivel = new Nivel();
                $nivel->CreateNivel($dados);
                if (!$nivel->getResult()):
                    echo $nivel->getMsg();
                else:
                    echo $nivel->getMsg();
                    unset($dados);
                endif;
                unset($dados);
            }
        endif;

        if (!empty($_SESSION['msg'])):
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        endif;
    ?>
    <!-- cadastro -->
    <?php if(!Url::getURL(1)){ ?>
        <!-- Title -->
        <h2 class="header-title">
            Novo Nível
        </h2><hr>
        
        <form method="POST" action="">
            <input type="hidden" name="type" value="add"> 
            <div class="form-group">
                <label for="">Nível</label>
                <input type="number" class="form-control" placeholder="Nível" name="nivel" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Comissão</label>
                <input type="number" class="form-control" placeholder="Informe a comissão em %" name="comisao" required>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Nível</button>
        </form>
    <?php }else{ 
        $read = new Read();
        $read->ExeRead('niveis','where id = :id', 'id='.Url::getURL(1));
        foreach($read->getResult() as $nivel){
            extract($nivel);
    ?>
        <!-- edição -->
        <!-- Title -->
        <h2 class="header-title">
            Edição
        </h2><hr>
        
        <form method="POST" action="">
            <input type="hidden" name="type" value="update"> 
            <div class="form-group">
                <label for="">Nível</label>
                <input type="number" class="form-control" placeholder="Nível" name="nivel" value="<?php echo $nivel ?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Comissão</label>
                <input type="number" class="form-control" placeholder="Informe a comissão em %" value="<?php echo $comisao ?>" name="comisao" required>
            </div>
            <button type="submit" class="btn btn-warning">Salvar Alterações</button>
        </form>
    <?php } } ?>
</div>