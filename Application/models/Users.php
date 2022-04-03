<?php 

namespace Application\models;

use Application\core\Database;
use PDO;

class Users{
    /* Atributos do usuários */



    /**
    * Este método busca todos os usuários armazenados na base de dados
    *
    * @return   array
    */
    public static function listarTodos(){
        $con = new Database();
        $result = $con->executeQuery('Select * from users');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }


    public static function buscarPorId(int $id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM users WHERE id = :ID LIMIT 1', array(
          ':ID' => $id
        ));
    
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>