<?php 
  if(!empty(Url::getURL(1)) && Url::getURL(1) === 'admin'){
    require 'restricted.php';
  }else{
    require 'login-all.php';

} 