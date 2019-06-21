<?php

//pegando os valores enviados do form
$login = filter_input(INPUT_POST, "login_escritorio", FILTER_SANITIZE_MAGIC_QUOTES);
$senha = filter_input(INPUT_POST, "senha_escritorio", FILTER_SANITIZE_MAGIC_QUOTES);
//trantando os valores dos campos enviados do form
$login = preg_replace('/[^[:alnum:]_.-]/', '', $login);
$senha = addslashes($senha);
//hash de validação 
//*bella763
$hash = '$2y$10$EKB4lajNsd.meBD8b3hxMuIhLM5vRUBCOyPNEH68cNmco4ky8uezy';
if (password_verify($senha, $hash) && $login == 'bella763') {
    session_start();
    $_SESSION['log_in_escritorio'] = true;
    echo json_encode(array('status' => 200, 'msg' => 'Escritório destravado com sucesso.'));
} else {
    echo json_encode(array('status' => 500, 'msg' => 'Login ou senha incorretos.'));
}
