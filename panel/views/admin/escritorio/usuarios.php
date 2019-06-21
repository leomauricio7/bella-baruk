<div data-toggle="lists" data-lists-values="[&quot;name&quot;]">
    <div class="container-fluid" data-toggle="lists" data-lists-class="listAlias" data-lists-values="[&quot;name&quot;]">
        <div class="row mb-4">
            <div class="col">
                <!-- Form -->
                <form>
                    <div class="input-group input-group-lg input-group-merge">
                        <input type="text" class="form-control form-control-prepended search" placeholder="Buscar usuário">
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
                    <button class="btn btn-lg btn-white active" data-toggle="tab" data-target="#tabPaneOne" role="tab" aria-controls="tabPaneOne" aria-selected="true">
                        <span class="fa fa-grip-vertical"></span>
                    </button>
                </div> <!-- / .nav -->

            </div>
        </div> <!-- / .row -->

        <!-- Tab content -->
        <div class="tab-content">
            <div class="tab-pane fade active show" id="tabPaneOne" role="tabpanel">
                <div class="row listAlias">
                    <?php
                    foreach (Dados::getUsersAllVendedor() as $dados) {
                        extract($dados);
                        ?>
                        <div class="col-12 col-md-3 col-xl-2">
                            <!-- Card -->
                            <div class="card text-center">
                                <a href="<?php echo Url::getBase() . 'escritorio-virtual/' . $slug ?>">
                                    <img src="<?php echo $avatar != null ? Url::getBase() . 'docs/users/' . $id . '/' . $avatar : Url::getBase() . '../assets/img/icons/user.png' ?>" alt="..." class="card-img-top" style="width: 121px; height:121px;">
                                </a>
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <!-- Title -->
                                            <h4 class="card-title mb-2 name">
                                                <a><?php echo $nome ?></a>
                                            </h4>
                                            <!-- Subtitle -->
                                            <p class="card-text small text-muted">
                                                <?php echo $email ?>
                                            </p>
                                        </div>
                                    </div> <!-- / .row -->
                                </div> <!-- / .card-body -->
                            </div>
                        </div>
                    <?php } ?>
                </div> <!-- / .row -->
            </div>
        </div> <!-- / .tab-content -->
    </div>
</div>