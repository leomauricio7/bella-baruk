<?php

class Unilevel {

    public static function getTotalUsersAtivos($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "ativo"','id='.$id);
        return $read->getRowCount();
    }

    public static function getTotalUsersInativos($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id AND status = "inativo"','id='.$id);
        return $read->getRowCount();
    }

    public static function getTotalUsersIndicados($id){
        $read = new Read();
        $read->ExeRead('users', 'where indicador=:id','id='.$id);
        return $read->getRowCount();
    }

}