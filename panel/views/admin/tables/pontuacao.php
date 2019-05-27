<div data-toggle="lists" data-lists-values="[&quot;name&quot;]">
    <div class="container-fluid" data-toggle="lists" data-lists-class="listAlias" data-lists-values="[&quot;name&quot;]">
        <div class="row mb-4">
            <div class="col">
                <!-- Form -->
                <form>
                    <div class="input-group input-group-lg input-group-merge">
                        <input type="text" class="form-control form-control-prepended search" placeholder="Buscar nível">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fa fa-search"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-auto">
                <!-- Navigation (button group) -->
                <div class="nav btn-group" role="tablist">
                    <?php if (Validation::getPermisionType($tipoUser)) { ?>
                    <button class="btn btn-lg btn-white active" data-toggle="tab" data-target="#tabPaneOne" role="tab" aria-controls="tabPaneOne" aria-selected="true">
                        <span class="fa fa-grip-vertical"></span>
                    </button>
                    <button class="btn btn-lg btn-white" data-toggle="tab" data-target="#tabPaneTwo" role="tab" aria-controls="tabPaneTwo" aria-selected="false">
                        <span class="fa fa-list"></span>
                    </button>
                    <?php }else{ ?>
                        <button class="btn btn-lg btn-white active" data-toggle="tab" data-target="#tabPaneTwo" role="tab" aria-controls="tabPaneTwo" aria-selected="false">
                        <span class="fa fa-list"></span>
                    </button>
                    <?php } ?>

                </div> <!-- / .nav -->
            </div>
        </div> <!-- / .row -->
        <!-- fim do header -->

        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane fade <?php echo Validation::getPermisionType($tipoUser) ? 'active' : '' ?> show" id="tabPaneOne" role="tabpanel">
                <div class="row listAlias">
                    <?php
                    $read = new Read();
                    $read->ExeRead('nivel_pontuacao');
                    foreach ($read->getResult() as $dados) {
                        extract($dados);
                        ?>
                        <!-- col 6 -->
                        <div class="col-12 col-md-4 col-xl-4">
                            <!-- Card -->
                            <div class="card">
                                <img src="<?php echo Url::getBase() . 'docs/nivel-pontuacao/' . $id . '/' . $avatar ?>" alt="..." class="card-img-top img-nivel <?php echo !Validation::getPermisionType($tipoUser) ? 'opaco' : '' ?>">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title mb-2 name">
                                                <a><?php echo $titulo ?></a>
                                            </h4>
                                            <p class="card-text small text-muted">
                                                <?php echo $descricao ?>
                                            </p>
                                        </div>
                                        <?php if (Validation::getPermisionType($tipoUser)) { ?>
                                            <div class="col-auto">
                                                <!-- Dropdown -->
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="<?php echo Url::getBase() . 'nivel-pontuacao/edit/' . $id ?>" class="dropdown-item">
                                                            Editar
                                                        </a>
                                                        <a href="<?php echo Url::getBase() . '../controllers/delete.php?pag=nivel-pontuacao&tb=nivel_pontuacao&ch=id&value=' . $id ?>" class="dropdown-item">
                                                            Excluir
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div> <!-- / .row -->
                                    <!-- Divider -->
                                    <hr>
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <div class="small mr-2"><?php echo $pontuacao ?> pontos</div>
                                                </div>
                                                <div class="col">
                                                    <!-- Progress
                                                <div class="progress progress-sm">
                                                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div> -->
                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                    </div> <!-- / .row -->
                                </div> <!-- / .card-body -->
                            </div>
                        </div><!-- fim col6 -->
                    <?php } ?>
                </div> <!-- / .row -->
            </div><!-- fim tab-pane -->

            <!-- em list -->
            <div class="tab-pane fade <?php echo Validation::getPermisionType($tipoUser) ? '' : 'active' ?> show" id="tabPaneTwo" role="tabpanel">
                <div class="row list">
                    <?php
                    $read = new Read();
                    $read->ExeRead('nivel_pontuacao');
                    foreach ($read->getResult() as $dados) {
                        extract($dados);
                        ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <!-- Avatar -->
                                            <a href="" class="avatar avatar-lg avatar-4by3 img-nivel-xs">
                                                <img src="<?php echo Url::getBase() . 'docs/nivel-pontuacao/' . $id . '/' . $avatar ?>" alt="..." class="avatar-img rounded <?php echo !Validation::getPermisionType($tipoUser) ? 'opaco' : '' ?>">
                                            </a>
                                        </div>
                                        <div class="col ml-n2">
                                            <h4 class="card-title mb-1 name">
                                                <a href=""><?php echo $titulo ?></a>
                                            </h4>
                                            <p class="card-text small text-muted mb-1">
                                                <time datetime="2018-06-21"><?php echo $descricao ?></time>
                                            </p>
                                            <div class="row align-items-center no-gutters">
                                                <div class="col-auto">
                                                    <div class="small mr-2"><?php echo Unilevel::getPocentagemPlanoCarreira(Dados::getPontuacao($_SESSION['idUser']), $pontuacao) ?>%</div>
                                                </div>
                                                <div class="col">
                                                    <!-- Progress -->
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar" role="progressbar" style="width: <?php echo Unilevel::getPocentagemPlanoCarreira(Dados::getPontuacao($_SESSION['idUser']), $pontuacao) ?>%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <?php echo $pontuacao ?> pontos
                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <?php if (Validation::getPermisionType($tipoUser)) { ?>
                                            <div class="col-auto">
                                                <!-- Dropdown -->
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#!" class="dropdown-item">
                                                            Editar
                                                        </a>
                                                        <a href="#!" class="dropdown-item">
                                                            Excluir
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div> <!-- / .row -->
                                </div> <!-- / .card-body -->
                            </div>
                        </div><!-- fim col-12 -->
                    <?php } ?>
                </div> <!-- / .row -->
            </div> <!-- / .tab-content -->
        </div>
    </div>