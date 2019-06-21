<?php
    if(isset($_SESSION['log_in_escritorio']) && !empty($_SESSION['log_in_escritorio'])){
        if (Url::getURL(1) == 'home' || empty(Url::getURL(1))) {
            require_once __DIR__.'/usuarios.php';
        }else{
            require_once __DIR__.'/painel.php';
        }
    }else{
       require_once __DIR__.'../../404.php';
    }
