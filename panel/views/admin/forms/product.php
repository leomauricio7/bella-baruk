<div class="card-body">  
    <?php
        if($_POST){
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            var_dump($dados);
        } 
    ?>          
    <form method="post" action="" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-12 col-md-6 mb-3">
                <label>Titulo</label>
                <input type="text" class="form-control" id="text" name="titulo" placeholder="titulo do produto" required>
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="validationServer02">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" placeholder="" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Descrição do Produto</label>
            <textarea class="form-control" name="descricao"required></textarea>
        </div>
        <div class="form-group">
            <label for="inputAddress">Imagens do produto</label>
            <input type="file" class="form-control" name="images[]" multiple required>
        </div>
        <div class="form-row">
            <div class="col-12 col-md-6 mb-3">
                <label for="validationServer03">Preço</label>
                <input type="text" class="form-control" data-mask="#.##0.00" data-mask-reverse="true" name="preco" placelholder="R$ 0.00" required="">
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="validationServer04">Responsavel</label>
                <input type="text" class="form-control" name="id_responsavel" readonly value="54564656546">
            </div>
        </div>
        <button class="btn btn-primary" type="submit" id="x">Cadastrar Produto</button>
    </form>
</div>