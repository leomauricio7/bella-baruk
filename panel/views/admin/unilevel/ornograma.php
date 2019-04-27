<div id="organogram_pai" class="rede" style="overflow: auto;padding-bottom: 40px;min-height: 160px;width: 100%;padding-top: 40px;">
    <div id="Multilevelredemultilevel">
        <ul id="organogram_infinity" style="width: auto; padding-bottom: 25px; zoom: 100%;">
                                 
            <li id="afiliados_<?php echo $_SESSION['idUser'] ?>">
                <a href="#md-InfoAfiliado" id="<?php echo $_SESSION['idUser'] ?>" class="btDetalhe" data-toggle="modal" data-target="#md-InfoAfiliado" style="width: 120px !important; height: 106px !important; padding-top: 15px;">
                    <img class="img-pai" src="<?php echo $_SESSION['avatar'] != null ? Url::getBase().'docs/users/'.$_SESSION['idUser'].'/'.$_SESSION['avatar'] : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                    <span style="font-size: 27px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $_SESSION['idUser'] ?></span>
                </a>   
                <ul>
                <?php 
                    $read = new Read();
                    $read->ExeRead('users','where indicador = '.$_SESSION['idUser']);
                    foreach($read->getResult() as $user){
                        extract($user);
                ?>	
                    <li id="afiliados_<?php echo $id ?>">
                        <a href="#md-InfoAfiliado" data-toggle="modal" data-target="#modalDemo" id="<?php echo $id ?>" class="btDetalhe" style="width: 70px !important; height: auto !important; padding-top: 15px;">
                            <img class="img-filho" src="<?php echo $avatar != null ? Url::getBase().'docs/users/'.$idUser.'/'.$avatar : Url::getBase().'../assets/img/icons/user.png' ?>" alt=""><br>
                            <br><span style="font-size: 16px; margin:-5px;  padding: 0px;  font-weight: 550;"><?php echo $id ?></span></a>     
                    </li>

                    <?php } ?>
                    <?php include 'modal-indicado.php'?>
                </ul>		      
            </li>
        </ul>
    </div>
</div>