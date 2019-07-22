<div class="container-fluid">
<?php
    if(Validation::getPermisionType($tipoUser)){
        include_once __DIR__.'/pa/header.php';
        if (empty(Url::getURL(1))) {
            require_once __DIR__.'/pa/index.php';
        }else if(Url::getURL(1) == 'create'){
            require_once __DIR__.'/pa/create.php';
        }else if(Url::getURL(1) == 'update'){
            require_once __DIR__.'/pa/updated.php';
        }
    }else{
       require_once __DIR__.'/404.php';
    }
?>
</div>
