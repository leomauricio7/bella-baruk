<?php

require_once '../../controllers/conf.inc';
require_once '../../vendor/autoload.php';

function validaRecaptcha(){
    $captcha = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
    $secretKey = "6LdsxpcUAAAAADsyZaXEwHEdmXetYA1C2kT5iOiU";
    $ip = $_SERVER['REMOTE_ADDR'];
  
    // post request to server
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => $secretKey, 'response' => $captcha);
  
    $options = array(
      'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
      )
    );
    $context  = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response,true);
    header('Content-type: application/json');
    if($responseKeys["success"]) {
        return true;
    } else {
      return false;
    }
}
function validaLogin(){
    $valida = new Validation();
    //pegando os valores do formulario
    $login = filter_input(INPUT_POST, "user", FILTER_SANITIZE_MAGIC_QUOTES);
    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_MAGIC_QUOTES);
    //trantando os valores dos campos
    $login = preg_replace('/[^[:alnum:]_.-]/', '', $login);
    $senha = addslashes($senha);
    //setando os valores nos metodos
    $valida->setLogin($login);
    $valida->setSenha($senha);
    //fazendo a validação
    if($valida->logar()):
        return array(
            'status'=>200,
            'paste'=>'panel',
            'msg'=> 'Login validado com sucesso! Aguarde estamos lhe redirecionando.'
        );
    else:
        return array(
            'status'=>404,
            'msg'=>'Usuário ou senha incorretos.'
        );
    endif;
} 

if(validaRecaptcha()){
    $retorno = validaLogin();
}else{
    $retorno = array('status'=> 500, 'msg'=>'Error: The secret parameter is invalid or malformed.');
}

echo json_encode($retorno);