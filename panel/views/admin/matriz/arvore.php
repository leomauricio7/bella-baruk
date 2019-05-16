<div class="table-responsive">
    <div class="tree" style="margin-left: 0px;">
        <ul>
            <li>
                <a href="" id="" class="btDetalhe link-pai" data-toggle="modal" data-target="" style="height: 106px !important; padding-top: 15px;">
                    <img class="img-pai" src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                    <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $_SESSION['idUser'] ?></span>
                </a>
                <!-- 1º nivel-->
                <ul>
                    <?php 
                        $read = new Read();
                        $read->ExeRead('users','where indicador = '.$_SESSION['idUser']);
                        foreach($read->getResult() as $user){
                            extract($user);
                    ?>
                    <li>
                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                        </a>
                        <!-- 2º nivel -->
                        <ul>
                            <?php 
                                $read2 = new Read();
                                $read2->ExeRead('users','where indicador = '.$id);
                                foreach($read2->getResult() as $user2){
                                    extract($user2);
                            ?>
                            <li>
                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                </a>
                                <!-- 3º nivel -->
                                <ul>
                                    <?php 
                                        $read3 = new Read();
                                        $read3->ExeRead('users','where indicador = '.$id);
                                        foreach($read3->getResult() as $user3){
                                            extract($user3);
                                    ?>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                        </a>
                                        <!-- 4º nivel -->
                                        <ul>
                                            <?php 
                                                $read4 = new Read();
                                                $read4->ExeRead('users','where indicador = '.$id);
                                                foreach($read4->getResult() as $user4){
                                                    extract($user4);
                                            ?>
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                </a>
                                                <!-- 5º nivel -->
                                                <ul>
                                                    <?php 
                                                        $read5 = new Read();
                                                        $read5->ExeRead('users','where indicador = '.$id);
                                                        foreach($read5->getResult() as $user5){
                                                            extract($user5);
                                                    ?>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                        </a>
                                                         <!-- 6º nivel -->
                                                        <ul>
                                                            <?php 
                                                                $read6 = new Read();
                                                                $read6->ExeRead('users','where indicador = '.$id);
                                                                foreach($read6->getResult() as $user6){
                                                                    extract($user6);
                                                            ?>
                                                            <li>
                                                                <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                                    <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                                    <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                                </a>
                                                                <!-- 7º nivel -->
                                                                <ul>
                                                                    <?php 
                                                                        $read7 = new Read();
                                                                        $read7->ExeRead('users','where indicador = '.$id);
                                                                        foreach($read7->getResult() as $user7){
                                                                            extract($user7);
                                                                    ?>
                                                                    <li>
                                                                        <a href="#" data-toggle="modal" data-target="" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                                                                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$id.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                                                                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span>
                                                                        </a>
                                                                        <!-- 8º nivel -->
                                                                        <ul>
                                                                            <?php 
                                                                                $read8 = new Read();
                                                                                $read8->ExeRead('users','where indicador = '.$id);
                                                                                foreach($read8->getResult() as $user8){
                                                                                    extract($user8);
                                                                            ?>
                                                                            <li>
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