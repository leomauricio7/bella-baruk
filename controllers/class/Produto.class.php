<?php

class Produto {

    public $Nome;
    public $Conteudo;
    public $Dados;
    private $Folder;

    const Entity = 'products';

    function CreateProduto(array $Dados) {
        $this->Dados = $Dados;
        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-check-circle'></i></strong> O produto <strong>{$this->Dados['titulo']}</strong> foi cadastrado com sucesso.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        else:
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-warning'></i></strong> O produto <strong>{$this->Dados['titulo']}</strong> não foi cadastrado.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        endif;
    }

    public function uploudMultiplo($File, $idProduto){ 
        $Folder = 'docs/produtos/'.$idProduto;

        if(!file_exists($Folder) && !is_dir($Folder)):
            mkdir($Folder, 0777); 
        endif;

        $create = new Create();
        if (isset($File) && !empty($File['name'][0])){
            $total = count($File['name']);
            for ($i = 0; $i < $total; $i++){
                move_uploaded_file($File['tmp_name'][$i], $Folder . '/' . $File['name'][$i]);
                $Dados = ['id_product' => $idProduto, 'url_image' => $File['name'][$i]];
                $create->ExeCreate('image_products', $Dados);
            }
        }
    }

    function getResult() {
        return $this->Result;
    }

    function getMsg() {
        return $this->Msg;
    }

}