<?php 

namespace Application\models;

use Application\core\Database;
use PDO;

class Users {
    /* Atributos do usuários */

    private String $nome;
    private Int $idade;


    public function __construct(){
        
    }
    
    /*
    
    Aparetemente o PHP não aceita sobrecarga de métodos
    
    public function __construct($nome,$idade){
        $this->nome = $name;
        $this->idade = $idade;
    }*/


    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

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

    public static function salvar($nome,$idade){
        $con = new Database();
        
        $query = 'INSERT INTO users (nome, idade) values (:nome, :idade)';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);

        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }


        return $result;
    }

    public static function atualizar($nome,$idade,$id){
        $con = new Database();

        $query = 'UPDATE users SET nome = :nome, idade = :idade WHERE id = :id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':idade', $idade);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }

        return $result;
    }
}

?>