
<div class="table-responsive">
    <div class="tree" style="margin-left:20%;">
        <ul>
            <li title="<?php echo $_SESSION['user']?>">
                <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                    <img class="img-pai" src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                    <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $_SESSION['idUser'] ?></span>
                </a>
                <!-- 1º nivel-->
                <ul>
                    <?php 
                        foreach(Dados::montaNivel(Dados::getFilhos($_SESSION['idUser']))['qualificadores'] as $user){
                            extract($user);
                    ?>
                    <li title="<?php echo $nome?>">
                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                        </a>
                        <!-- 2º nivel -->
                        <ul>
                            <?php 
                                foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user2){
                                    extract($user2);
                            ?>
                            <li title="<?php echo $nome?>">
                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                </a>
                                <!-- 3º nivel -->
                                <ul>
                                    <?php 
                                        foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user3){
                                            extract($user3);
                                    ?>
                                    <li title="<?php echo $nome?>">
                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                        </a>
                                        <!-- 4º nivel -->
                                        <ul>
                                            <?php 
                                                foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user4){
                                                    extract($user4);
                                            ?>
                                            <li title="<?php echo $nome?>">
                                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                </a>
                                                <!-- 5º nivel -->
                                                <ul>
                                                    <?php 
                                                        foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user5){
                                                            extract($user5);
                                                    ?>
                                                    <li title="<?php echo $nome?>">
                                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                        </a>
                                                         <!-- 6º nivel -->
                                                        <ul>
                                                            <?php 
                                                                foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user6){
                                                                    extract($user6);
                                                            ?>
                                                            <li title="<?php echo $nome?>">
                                                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                                </a>
                                                                <!-- 7º nivel -->
                                                                <ul>
                                                                    <?php 
                                                                        foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user7){
                                                                            extract($user7);
                                                                    ?>
                                                                    <li title="<?php echo $nome?>">
                                                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                                        </a>
                                                                        <!-- 8º nivel -->
                                                                        <ul>
                                                                            <?php 
                                                                                foreach(Dados::montaNivel(Dados::getFilhos($id))['qualificadores'] as $user8){
                                                                                    extract($user8);
                                                                            ?>
                                                                            <li title="<?php echo $nome?>">
                                                                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                                                </a>
                                                                            </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </li>
                                                            <?php } ?>
                                                        </ul>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </li>
        </ul>
    </div>
</div>