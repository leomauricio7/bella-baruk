<div class="card-body">  
    <?php 
        $data = array();
        function getNivel(){
            $read = new Read();
            $read->ExeRead('nivel_pontuacao','where id = :id', 'id='.Url::getURL(2));
            foreach($read->getResult() as $nivel){
                extract($nivel);
                $data = [
                    'titulo'=>ltrim($titulo),
                    'pontuacao'=>ltrim($pontuacao),
                    'avatar'=>ltrim($avatar),
                    'descricao'=>ltrim($descricao)
                ];               
            }
        }
        if(Url::getURL(1) == 'edit'){ 
            $read = new Read();
            $read->ExeRead('nivel_pontuacao','where id = :id', 'id='.Url::getURL(2));
            foreach($read->getResult() as $nivel){
                extract($nivel);
                $data = [
                    'titulo'=>ltrim($titulo),
                    'pontuacao'=>ltrim($pontuacao),
                    'avatar'=>ltrim($avatar),
                    'descricao'=>ltrim($descricao)
                ];               
            }   
        }
        if ($_POST) {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $dados['avatar'] = ($_FILES['avatar']['tmp_name'] ? $_FILES['avatar'] : null);
            $file = $_FILES['avatar'];
            if(count($data) > 0){
                $update = new Update();
                if($dados['avatar'] != null){
                    $file = $_FILES['avatar'];
                    $uploud = new Uploud();
                    $uploud->ImagemEdit($file, 'nivel-pontuacao/' . Url::getURL(2) . '/');
                    $request = ['avatar'=> $_FILES['avatar']['name']];
                }
                $request = ['titulo'=>$dados['titulo'],'pontuacao'=>$dados['pontuacao'],'descricao'=>$dados['descricao']];
                $update->ExeUpdate('nivel_pontuacao', $request, 'where id = :id', 'id='.Url::getURL(2));
                if (!$update->getResult()):
                    include_once('alert/error.php');
                else:
                    include_once('alert/success.php');
                endif;
            }else{
                $pontuacao = new Pontuacao();
                $pontuacao->createNivelPontuacao($dados);
                if (!$pontuacao->getResult()):
                    echo $pontuacao->getMsg();
                else:
                    $uploud = new Uploud();
                    $uploud->Imagem($file, 'nivel-pontuacao/' . $pontuacao->getResult() . '/');
                    echo $pontuacao->getMsg();
                    unset($dados);
                endif;
            }
            unset($dados);
        }
    ?>       
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-12 col-md-4 mb-3">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" value="<?php if(count($data) > 0) {echo $data['titulo'];}?>"
                 placeholder="Titulo do nível" required>
            </div>
            <div class="col-12 col-md-2 mb-3">
                <label for="validationServer02">Pontuação</label>
                <input type="number" class="form-control" name="pontuacao"
                value="<?php if(count($data) > 0) {echo $data['pontuacao'];}?>"
                 placeholder="Total de pontos" required>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="inputAddress">Imagem do Nível</label>
                <input type="file" class="form-control" name="avatar" 
                <?php echo count($data) > 0 ? '' : 'required' ?> >
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-12 mb-3">
                <label for="inputAddress">Descrição</label>
                <textarea class="form-control" name="descricao" required><?php if(count($data) > 0){echo $data['descricao'];}?></textarea>
            </div>
        </div>
        <button class="btn btn-<?php echo count($data) > 0 ? 'warning' : 'primary' ?>" type="submit">
        <?php echo count($data) > 0 ? 'Salvar Alterações' : 'Salvar Nível' ?> 
        </button>
    </form>
</div>