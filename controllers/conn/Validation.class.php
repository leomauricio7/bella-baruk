<?php

class Validation extends Conn {

    private $login;
    private $senha;
    private $email;
    private $cpf;
    private $Msg;

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setLogin($login) {
        $this->login = addslashes($login);
    }

    public function setSenha($senha) {
        $this->senha = addslashes($senha);
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getEmail() {
        return $this->email;
    }

    public function validaEmail(){
        $read = new Read();
        $email_validate = $this->getEmail();
        $read->ExeRead('users', "where email= '$email_validate'");
        if($read->getRowCount() > 0){
            return true;
        }else{
            $this->Msg = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ATENÇÃO</strong> Email não cadastrado no sistema.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';
            return false;
        }
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function logar() {
        $pdo = parent::getConn();
        $logar = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $logar->bindValue(1, $this->getEmail());
        $logar->execute();
        if ($logar->rowCount() == 1) {
            $dados = $logar->fetch(PDO::FETCH_ASSOC);
            if (password_verify($this->getSenha(), $dados['senha'])) {
                $_SESSION['user'] = $dados['nome'];
                $_SESSION['email'] = $dados['email'];
                $_SESSION['cpf'] = $dados['cpf'];
                $_SESSION['cnpj'] = $dados['cnpj'];
                $_SESSION['senha'] = $this->getSenha();
                $_SESSION['avatar'] = $dados['avatar'];
                $_SESSION['idTipo'] = $dados['tipo_user'];
                $_SESSION['idUser'] = $dados['id'];
                $_SESSION['logado'] = true;
                $_SESSION["sessiontime"] = time() + 60 * 20;
                return true;
            } else {
                $_SESSION['msg'] = 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ATENÇÃO</strong> Senha incorreta
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
                return false;
            }
        } else {
            $_SESSION['msg'] = 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ATENÇÃO</strong> Email não cadastrado no sistema
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>';
            return false;
        }
    }

    /* Função de recuperar senha */
    public function recuperaSenha() {
        $pdo = parent::getConn();

        $rec = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $rec->bindValue(1, $this->getEmail());
        $rec->execute();
        if ($rec->rowCount() == 1):
            $_token = hash("sha256", md5(uniqid())); //gerando uma senha aletória para o usuário
            $dados = $rec->fetch(PDO::FETCH_ASSOC);
            $this->setEmail($dados['email']); //pegando o email do usuario
            //if ($this->enviaEmail($_token, $dados['nome'])) {//enviando o email com a nova senha
            $update = $pdo->prepare("UPDATE users SET _token = :_token WHERE email = :email");
            $update->execute(array(
                ':email' => $this->getEmail(),
                ':_token' => $_token
            ));
            $this->Msg = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><strong>ATENÇÃO: </strong>
                        Foi enviado para o email: <strong>'.$this->getEmail().'</strong>,
                        um link para recuperação de sua senha. Verifique sua caixa de entrada,
                        caso não tenha chegado, verifique se estar em spam.<br> Link de teste: <a href="?_token='.$_token.'">Clique aqui!</a></p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>';
            return true;
        // } else {
        //    $_SESSION['erro'] = '<div class="alert alert-danger"><h5 align="center"><i class="fa fa-warning"></i> Erro ao enviar o email.</h5></div>';
        //    return false;
        // }
        else:
            $this->Msg = '<div class="alert alert-danger"><h5 align="center"><i class="fa fa-warning"></i> Email incorreto.</h5></div>';
            return false;
        endif;
    }

    /* Função de enviar Email */

    public function enviaEmail($_token, $user) {
        // emails para quem será enviado o formulário
        $from = "suporte@bellabaruk.com.br";
        $assunto = "Solicitação de Recuperação de Senha";
        $destino = $this->getEmail();
        // É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "De: $from";
        $msg = 'corpo do email';
        $enviaremail = mail($destino, $assunto, $msg, $headers);

        if ($enviaremail) {
            return true;
        } else {
            return false;
        }
    }

    public static function ForceHTTPS() {
        if (!isset($_SERVER['HTTPS'])) {
            $url = $_SERVER['SERVER_NAME'];
            $new_url = "https://" . $url . $_SERVER['REQUEST_URI'];
            header("Location: $new_url");
            exit;
        }
    }

    public static function deslogar() {
        if (isset($_SESSION['logado'])):
            unset($_SESSION['logado']);
            session_destroy();
            echo '<script>window.location.href="../login";</script>';
        endif;
    }

    public static function validaSession() {
        if (!isset($_SESSION['logado'])):
            $_SESSION['msg'] = 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ATENÇÃO</strong> Área Restrita para usuários cadastrados
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>';
            echo '<script>window.location.href="../login";</script>';
        else:
            $pdo = parent::getConn();
            $sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
            $sql->bindValue(1, $_SESSION['email']);
            $sql->execute();
            if ($sql->rowCount() == 1):
                $dados = $sql->fetch(PDO::FETCH_ASSOC);
                if (!password_verify($_SESSION['senha'], $dados['senha'])) :
                    unset($_SESSION['cpf']);
                    unset($_SESSION['email']);
                    unset($_SESSION['cnpj']);
                    unset($_SESSION['senha']);
                    unset($_SESSION['logado']);
                    unset($_SESSION['user']);
                    unset($_SESSION['avatar']);
                    unset($_SESSION['idTipo']);
                    unset($_SESSION['idUser']);
                    $_SESSION['msg'] = '<div class="alert alert-danger"><i class="fa fa-warning"><h5 align="center"></i> Area restrita para usuários cadastrados</h5></div>';
                    echo '<script>window.location.href="../login";</script>';
                endif;
            else:
                unset($_SESSION['cpf']);
                unset($_SESSION['email']);
                unset($_SESSION['cnpj']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                unset($_SESSION['avatar']);
                unset($_SESSION['idTipo']);
                unset($_SESSION['idUser']);
                $_SESSION['msg'] = 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ATENÇÃO</strong> Área Restrita para usuários cadastrados
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
                echo '<script>window.location.href="../login";</script>';
            endif;
        endif;
    }

    public static function expiraSession() {
        if (isset($_SESSION["sessiontime"])) {
            if ($_SESSION["sessiontime"] < time()) {
                session_unset();
                unset($_SESSION['cpf']);
                unset($_SESSION['email']);
                unset($_SESSION['cnpj']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                unset($_SESSION['avatar']);
                unset($_SESSION['idTipo']);
                unset($_SESSION['idUser']);
                $_SESSION['msg'] = 
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ATENÇÃO</strong> Sesão expirou!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
                echo '<script>window.location.href="../login";</script>';
            } else {
                $_SESSION["sessiontime"] = time() + 60 * 10;
            }
        } else {
            session_unset();
            unset($_SESSION['cpf']);
            unset($_SESSION['email']);
            unset($_SESSION['cnpj']);
            unset($_SESSION['senha']);
            unset($_SESSION['logado']);
            unset($_SESSION['user']);
            unset($_SESSION['avatar']);
            unset($_SESSION['idTipo']);
            unset($_SESSION['idUser']);
            $_SESSION['msg'] = 
            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>ATENÇÃO</strong> Sesão encerrada!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>';
            echo '<script>window.location.href="../login";</script>';
        }
    }

    public function verificaRecaptcha($key) {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $respon = $key;

        $data = array('secret' => "6Lelv2oUAAAAAPko-GnVwLV9YdWke5QK9e01Kbkt", 'response' => $respon);

        $options = array(
            'http' => array(
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $jsom = json_decode($result);

        if ($jsom->success) {
            return true;
        } else {
            return false;
        }
    }

    public static function getTipoUsario($idTipo) {
        $tipoUser = null;
        $read = new Read();
        $read->ExeRead("tipo_users", "WHERE id = $idTipo");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $tipoUser = $tipo;
        }
        return $tipoUser;
    }

    public static function getURI($id) {
        $URL= null;
        $read = new Read();
        $read->ExeRead("users", "WHERE id = $id");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $URL = $slug;
        }
        return $URL;
    }

    public static function getNameIndicador($slug) {
        $name = null;
        $read = new Read();
        $read->ExeRead("users", "WHERE slug = '$slug'");

        foreach ($read->getResult() as $dados) {
            extract($dados);
            $name = $nome;
        }
        return $name;
    }

    public static function getIndicador($id) {
        $name = null;
        $read = new Read();
        $read->ExeRead("users", "WHERE id = '$id'");

        foreach ($read->getResult() as $dados) {
            extract($dados);
            $name = $nome;
        }
        return $name;
    }

    public static function getIdIndicador($name) {
        $id_user = null;
        $read = new Read();
        $read->ExeRead("users", "WHERE nome = '$name'");

        foreach ($read->getResult() as $dados) {
            extract($dados);
            $id_user = $id;
        }
        return $id_user;
    }

    public static function getSituacaoUsario($id_situacao) {
        $situacaoUser = null;
        $read = new Read();
        $read->ExeRead("user_situacao", "WHERE id = $id_situacao");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $situacaoUser = $situacao;
        }
        return $situacaoUser;
    }

    public static function geraPermisao($idPagina) {
        $read = new Read();
        $create = new Create();
        $read->ExeRead("user_tipo");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            $Dados = [
                'id_user_tipo' => $id,
                'id_situacao_permission' => 0,
                'id_page' => $idPagina
            ];
            $create->ExeCreate("user_permision", $Dados);
        }
    }

    public static function verificaPermisao($id_tipo, $url) {
        $read = new Read();
        $read->consultaPermissoes("WHERE u.id_user_tipo = $id_tipo AND p.url = '$url'");
        foreach ($read->getResult() as $dados) {
            extract($dados);
            if ($id_situacao_permission == 0) {
                return false;
            } else {
                return true;
            }
        }
    }

    public static function getPermisionType($id_tipo) {
        if ($id_tipo == 1) {//administrador
            return true;
        } else {//vendedor
            return false;
        }   
    }

    public static function getPermisionTypeVendedor($id_tipo) {
        if ($id_tipo == 1) {//administrador
            return false;
        } else {//vendedor
            return true;
        }   
    }

    public static function limpaDados(array $dados) {
        foreach ($dados as $indice => $value) {
            $dados[$indice] = addslashes($dados[$indice]);
        }
        return $dados;
    }

    public static function verificaToken($token){
        $read = new Read();
        $read->ExeRead('users',"WHERE _token = '$token'");
        if($read->getResult()){
            return true;
        }else{
            return false;
        }
    }
    
    public static function updateSenha($token, $novaSenha){
        $pdo = parent::getConn();
        $update = $pdo->prepare("UPDATE users SET _token = :token, senha = :novaSenha WHERE _token = :_token");
        $update->execute(array(
            ':novaSenha' => password_hash($novaSenha, PASSWORD_DEFAULT),
            ':_token' => $token,
            ':token' => NULL
        ));
        return true;
    }
    
    function getMsg() {
        return $this->Msg;
    }

}
