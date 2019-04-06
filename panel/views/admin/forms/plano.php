<div class="card-body">  
    <?php 
        if ($_POST) {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $dados['id_tipo'] = 1;//produto do tipo plano de adesão
            $dados['quantidade'] = 100;
            $produto = new Produto();
            $produto->createProduto($dados);
            if (!$produto->getResult()):
                echo $produto->getMsg();
            else:
                $produto->uploudMultiplo($_FILES['images'], $produto->getResult());
                echo $produto->getMsg();
                unset($dados);
            endif;
        }
    ?>       
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-12 col-md-6 mb-3">
                <label>Titulo do Plano</label>
                <input type="text" class="form-control" id="text" name="titulo" placeholder="titulo do plano" required>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="validationServer02">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="" readonly required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Descrição do plano</label>
            <textarea class="form-control" name="descricao"required></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Imagem do plano</label>
            <input type="file" class="form-control" name="images[]" multiple required>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-4 mb-3">
                <label for="validationServer03">Preço do plano</label>
                <input type="text" class="form-control" data-mask="#.##0.00" data-mask-reverse="true" name="preco" placelholder="R$ 0.00" required="">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="validationServer03">Valdidade do plano/dias</label>
                <input type="number" class="form-control" name="validade" required="">
            </div>
            <div class="col-12 col-md-4 mb-3">
                <label for="validationServer04">Responsavel</label>
                <input type="hidden" class="form-control" name="id_responsavel" readonly value="<?php echo $_SESSION['idUser'] ?>">
                <input type="text" class="form-control" readonly value="<?php echo Validation::getIndicador($_SESSION['idUser']) ?>">
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="x">Salvar Plano</button>
    </form>
</div>