<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

session_start();

//dev
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BD', 'bella_baruk');

//prod
//define('HOST', 'localhost');
//define('USER', 'u342005186_root');
//define('PASS', '123mudar');
//define('BD', 'u342005186_root');
