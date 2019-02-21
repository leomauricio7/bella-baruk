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
            <div data-toggle="quill" data-quill-placeholder="Descrição do produto"></div> 
        </div>
        <div class="form-group">
            <!-- Multiple -->
            <div class="dropzone dropzone-multiple" data-toggle="dropzone" data-dropzone-multiple data-dropzone-url="http://">

                <div class="fallback">
                    <div class="custom-file">
                        <input type="file"name="images[]" class="custom-file-input" id="customFileUploadMultiple" multiple>
                        <label class="custom-file-label" for="customFileUploadMultiple">Selecione a imagem</label>
                    </div>
                </div>

                <ul class="dz-preview dz-preview-multiple list-group list-group-lg list-group-flush">
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar">
                                <img class="avatar-img rounded" src="..." alt="..." data-dz-thumbnail>
                                </div>
                            </div>
                            <div class="col ml-n3">
                                <h4 class="mb-1" data-dz-name>...</h4>
                                <p class="small text-muted mb-0" data-dz-size>...</p>
                            </div>
                            <div class="col-auto">
                                
                                <div class="dropdown">
                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item" data-dz-remove>
                                        Remove
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </li>
                </ul>
            </div>
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