<?php

class Nivel {

    public $Dados;

    const Entity = 'niveis';

    function CreateNivel(array $Dados) {
        $this->Dados = $Dados;

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg =
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>ATENÇÃO!</strong> Cadastro realizado com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>';
        else:
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

    function getResult() {
        return $this->Result;
    }

    function getMsg() {
        return $this->Msg;
    }

}