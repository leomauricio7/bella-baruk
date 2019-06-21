<div class="card">
    <div class="card-header">
        <div class="header-body">
            <h6 class="header-pretitle">
                Unilevel
            </h6>

            <h1 class="header-title">
                Rede Unilevel
            </h1>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="tree">
                <ul>
                    <li>
                        <a href="#md-InfoAfiliado" id="<?php echo $idEscritorio ?>" class="btDetalhe link-pai" data-toggle="modal" data-target="#md-InfoAfiliado" style="height: 106px !important; padding-top: 15px;">
                            <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" alt=""><br>
                            <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $idEscritorio ?></span>
                        </a>
                        <ul>
                            <?php
                            $read = new Read();
                            $read->ExeRead('users', 'where indicador = ' . $idEscritorio);
                            foreach ($read->getResult() as $user) {
                                extract($user);
                                ?>
                                <li>
                                    <a href="#!" data-toggle="modal" data-target="#modal-view<?php echo $id ?>" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                        <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase() . 'docs/users/' . $id . '/' . $avatar : Url::getBase() . '../assets/img/icons/user.png' ?>" alt=""><br>
                                        <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                    </a>
                                </li>
                            <?php
                        }
                        ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>