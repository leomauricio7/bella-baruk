<?php
    if(Validation::getPermisionType($tipoUser)){
        if (empty(Url::getURL(1))) {
            require_once __DIR__.'/cd/index.php';
        }
    }else{
       require_once __DIR__.'../../404.php';
    }
