<div class="table-responsive">
    <div class="tree">
        <ul>
            <li>
                <a href="#md-InfoAfiliado" id="<?php echo $_SESSION['idUser'] ?>" class="btDetalhe link-pai" data-toggle="modal" data-target="#md-InfoAfiliado" style="height: 106px !important; padding-top: 15px;">
                    <img class="img-pai" src="<?php echo $_SESSION['avatar'] != null ? Url::getBase() . 'docs/users/' . $_SESSION['idUser'] . '/' . $_SESSION['avatar'] : Url::getBase() . '../assets/img/icons/user.png' ?>" alt=""><br>
                    <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $_SESSION['idUser'] ?></span>
                </a>
                <ul>
                    <?php
                    $read = new Read();
                    $read->ExeRead('users', 'where indicador = ' . $_SESSION['idUser']);
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
                    include 'modal-indicado.php';
                }
                ?>
                </ul>
            </li>
        </ul>
    </div>
</div>