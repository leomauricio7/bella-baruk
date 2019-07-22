<?php

class User
{

    public $Titulo;
    public $Conteudo;
    public $Dados;

    const Entity = 'users';

    function createUser(array $Dados)
    {
        $this->Dados = $Dados;
        $this->Dados['avatar'] = isset($this->Dados['avatar']) ? $this->Dados['avatar']['name'] : null;

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()) :
            if (!Valida::isDev()) {
                $this->enviaEmail($this->Dados['nome'], $this->Dados['email']);
            }
            $this->Result = $create->getResult();
            $this->Msg =
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>ATENÇÃO!</strong> Cadastro realizado com sucesso.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>';
        else :
            $this->Result = $create->getResult();
            $this->Msg =
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>ATENÇÃO!</strong> Error no cadastro.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
        endif;
    }

    public function enviaEmail($user, $email)
    {
        // emails para quem será enviado o formulário
        $from = "suporte@bellabaruk.com.br";
        $assunto = "Seja bem vindo a plataforma BellaBaruk";
        $destino = $email;
        // É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "De: $from";
        $msg = '
            <h4>Ola, ' . $user . ', obrigado por seu cadastro na Bella Baruk. </h4>
            <p>
                A Bella Baruk tem a honra de contar com você nesta caminhada de sucesso, que só é possível porque Deus é Fiel.<br>
                Mantenha sempre seu cadastro ativo.<br> 
                Você iniciou esta viagem com a Bella Baruk e vamos nos encontrar na Estação do Sucesso.<br>
                Fale sobre a Bella Baruk com seus amigos, em suas redes sociais, em sua vizinhança, enfim, em todos os lugares.<br> 
                Abençoe a todos que estão em sua volta, afinal esta empresa é Bella, é Abençoadora.<br>
                Vidas serão transformadas, então forme sua equipe e receba o que Deus preparou para nós.<br>
                Vamos em frente.<br>
                Bella Baruk, pensando em você!!!<br>
                Deus te abençoe.<br>
                Atenciosamente:<br>
                Diretoria Bella Baruk.
            </p>
        ';
        $enviaremail = mail($destino, $assunto, $msg, $headers);

        if ($enviaremail) {
            return true;
        } else {
            return false;
        }
    }

    function getResult()
    {
        return $this->Result;
    }

    function getMsg()
    {
        return $this->Msg;
    }
}
