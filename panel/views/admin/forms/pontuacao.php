<div class="card-body">  
    <?php 
        if ($_POST) {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $dados['avatar'] = ($_FILES['avatar']['tmp_name'] ? $_FILES['avatar'] : null);
            $file = $_FILES['avatar'];
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
            unset($dados);

        }
    ?>       
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-12 col-md-4 mb-3">
                <label>Titulo</label>
                <input type="text" class="form-control" name="titulo" placeholder="Titulo do nível" required>
            </div>
            <div class="col-12 col-md-2 mb-3">
                <label for="validationServer02">Pontuação</label>
                <input type="number" class="form-control" name="pontuacao" placeholder="Total de pontos" required>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="inputAddress">Imagem do Nível</label>
                <input type="file" class="form-control" name="avatar" required>
            </div>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-12 mb-3">
                <label for="inputAddress">Descrição</label>
                <textarea class="form-control" name="descricao" required></textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Salvar Nível</button>
    </form>
</div>