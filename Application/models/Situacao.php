<?php 
namespace Application\models;

use Application\core\Database;
use PDO;


class Situacao{

    private String $id;
    private String $descricao;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public static function buscarPorId($id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM situacao WHERE id = :ID LIMIT 1', array(
            ':ID' => $id
        ));

        $result = $result->fetch(PDO::FETCH_OBJ);
      
        $situacao = new Situacao();
        $situacao->__set('id', $result->id);
        $situacao->__set('descricao', $result->descricao);
        
        return $situacao;
    } 
}

?>