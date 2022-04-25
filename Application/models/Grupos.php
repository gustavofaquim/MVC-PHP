<?php 
namespace Application\models;

use Application\core\Database;
use PDO;


class Grupos{

    private String $id;
    private String $nome;
    private String $situacao;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public static function buscarPorId($id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM grupos WHERE id = :ID LIMIT 1', array(
            ':ID' => $id
        ));

        $result = $result->fetch(PDO::FETCH_OBJ);
        
        $grupo = new Grupos();
        $grupo->__set('id', $result->id);
        $grupo->__set('nome', $result->nome);
        $grupo->__set('situacao',$result->situacao);
        
        return $grupo;
    } 
}

?>