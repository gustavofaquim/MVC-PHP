<?php 

namespace Application\models;

use Application\core\Database;
use PDO;
use Application\models\Situacao;

class Grupos{

    private String $id;
    private String $nome;
    private Situacao $situacao;

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public static function buscarPorId($id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM grupo WHERE id = :ID LIMIT 1', array(
            ':ID' => $id
        ));

        $result = $result->fetch(PDO::FETCH_OBJ);
        
        $grupo = new Grupos();
        $situacao = new Situacao();

        $grupo->__set('id', $result->id);
        $grupo->__set('nome', $result->nome);
        $situacao = $situacao->buscarPorId($result->situacao);
        $grupo->__set('situacao', $situacao);
        
        return $grupo;
    } 
}

?>