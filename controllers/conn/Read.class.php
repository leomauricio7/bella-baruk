<?php

class Read extends Conn {

    private $Select;
    private $Places;
    private $Result;
    private $Read;
    private $Conn;

    public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
        if (!empty($ParseString)) {
            parse_str($ParseString, $this->Places);
        }

        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->Execute();
    }

    public function consultaPermissoes($Termos = null) {
        if (empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT u.id, ut.tipo as tipoUsers, u.id_situacao_permission, p.nome as pagina, p.legenda, p.url,  us.permissao as situacao FROM user_permision u INNER JOIN user_tipo ut ON u.id_user_tipo = ut.id INNER JOIN pages p ON u.id_page = p.id INNER JOIN user_situacao_permission us ON u.id_situacao_permission = us.id ' . $Termos;
        $this->ExecuteSQL();
    }

    public function consulta_pasta($Termos = null) {
        if (empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT c.pasta, m.nome, m.estado, m.brazao, m.data_cadastro,  m.endereco, m.situacao, m.servidor_bd, m.usuario_bd, m.senha_bd, m.nome_bd FROM municipios m INNER JOIN cidades c ON m.cidade = c.cod_cidades ' . $Termos;
        $this->ExecuteSQL();
    }

    public function listarEditais($Termos = null) {
        if (empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT el.tipo, el.pasta, els.situacao, e.id, e.ano, e.lei, e.dataRetirada, e.horaCertame, e.dataCertame, e.descricao, e.link_aviso, e.link_edital, e.termo_adesao, e.contrato, e.created, e.tags, e.dia, e.mes FROM editais e INNER JOIN edital_tipo el ON e.id_tipo = el.id INNER JOIN edital_situacao els ON e.id_situacao = els.id ' . $Termos;
        $this->ExecuteSQL();
    }

    public function getResult() {
        return $this->Result;
    }

    public function getRowCount() {
        return $this->Read->rowCount();
    }

    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($this->Select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }

    private function getSyntax() {
        if ($this->Places):
            foreach ($this->Places as $Vinculo => $Valor):
                if ($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int) $Valor;
                endif;
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor) ? PDO::PARAM_INT : PDO::PARAM_STR));
            endforeach;
        endif;
    }

    private function Execute() {
        $this->Connect();
        try {
            $this->getSyntax();
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' . $e->getMessage();
        }
    }

    private function ExecuteSQl() {
        $this->Connect();
        try {
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' . $e->getMessage();
        }
    }

}
