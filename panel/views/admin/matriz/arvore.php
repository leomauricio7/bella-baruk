<div class="table-responsive">
    <div class="tree">
        <ul style="min-width: 1500px;">
            <li>
                <a class="no">
                    <img class="img-pai" src="https://image.flaticon.com/icons/png/512/306/306473.png" width="50px" alt=""><br>
                    <span><?php echo $_SESSION['idUser'] ?></span>
                </a>
                <!-- nivel 1 -->
                <ul>
                    <?php
                    $Derramamento = new Derramamento();
                    $level1 = $Derramamento->getBinary($_SESSION['idUser'], $_SESSION['idUser'], 1);
                    foreach ($level1 as $dados) {
                        extract($dados);
                        ?>

                        <li>
                            <a class="no">
                                <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                <span><?php echo $id_user ?></span>
                            </a>
                            <!-- nivel 2 -->
                            <ul>
                                <?php
                                $level2 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 2);
                                foreach ($level2 as $dados) {
                                    extract($dados);
                                    ?>
                                    <li>
                                        <a class="no">
                                            <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                            <span><?php echo $id_user ?></span>
                                        </a>
                                        <!-- nivel 3 -->
                                        <ul>
                                            <?php
                                            $level3 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 3);
                                            foreach ($level3 as $dados) {
                                                extract($dados);
                                                ?>

                                                <li>
                                                    <a class="no">
                                                        <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                        <span><?php echo $id_user ?></span>
                                                    </a>
                                                    <!-- nivel 4 -->
                                                    <ul>
                                                        <?php
                                                        $level4 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 4);
                                                        foreach ($level4 as $dados) {
                                                            extract($dados);
                                                            ?>

                                                            <li>
                                                                <a class="no">
                                                                    <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                    <span><?php echo $id_user ?></span>
                                                                </a>
                                                                <!-- nivel 5 -->
                                                                <ul>
                                                                    <?php
                                                                    $level5 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 5);
                                                                    foreach ($level5 as $dados) {
                                                                        extract($dados);
                                                                        ?>

                                                                        <li>
                                                                            <a class="no">
                                                                                <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                <span><?php echo $id_user ?></span>
                                                                            </a>
                                                                            <!-- nivel 6 -->
                                                                            <ul>
                                                                                <?php
                                                                                $level6 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 6);
                                                                                foreach ($level6 as $dados) {
                                                                                    extract($dados);
                                                                                    ?>

                                                                                    <li>
                                                                                        <a class="no">
                                                                                            <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                            <span><?php echo $id_user ?></span>
                                                                                        </a>
                                                                                        <!-- nivel 7 -->
                                                                                        <ul>
                                                                                            <?php
                                                                                            $level7 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 7);
                                                                                            foreach ($level7 as $dados) {
                                                                                                extract($dados);
                                                                                                ?>

                                                                                                <li>
                                                                                                    <a class="no">
                                                                                                        <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                                        <span><?php echo $id_user ?></span>
                                                                                                    </a>
                                                                                                    <!-- nivel 8 -->
                                                                                                    <ul>
                                                                                                        <?php
                                                                                                        $level8 = $Derramamento->getBinary($_SESSION['idUser'], $id_user, 8);
                                                                                                        foreach ($level8 as $dados) {
                                                                                                            extract($dados);
                                                                                                            ?>

                                                                                                            <li>
                                                                                                                <a class="no">
                                                                                                                    <img class="img-pai" src="https://www.shareicon.net/download/2016/05/24/770136_man_512x512.png" width="50px" alt=""><br>
                                                                                                                    <span><?php echo $id_user ?></span>
                                                                                                                </a>

                                                                                                            </li>
                                                                                                        <?php
                                                                                                    }
                                                                                                    ?>
                                                                                                    </ul>
                                                                                                </li>
                                                                                            <?php
                                                                                        }
                                                                                        ?>
                                                                                        </ul>
                                                                                    </li>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            </ul>
                                                                        </li>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </ul>
                                                            </li>
                                                        <?php
                                                    }
                                                    ?>
                                                    </ul>
                                                </li>
                                            <?php
                                        }
                                        ?>
                                        </ul>
                                    </li>
                                <?php
                            }
                            ?>
                            </ul>
                        </li>
                    <?php
                }
                ?>
                </ul>
            </li>

        </ul>
    </div>
</div>