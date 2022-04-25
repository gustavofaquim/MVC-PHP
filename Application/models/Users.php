<?php 

namespace Application\models;

use Application\core\Database;
use PDO;
use Application\models\Grupos;

class Users {
    /* Atributos do usuários */

    private int $id;
    private String $nome;
    private String $sobrenome;
    private String $nascimento;
    private Grupos $grupo; 


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
        $result = $con->executeQuery('Select * from usuarios');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $usuarios = array();
        $grupo = new Grupos();

        foreach($result as $id => $objeto){
            $usuario = new Users();
            //var_dump($objeto);
            //var_dump($objeto->nome);
            $usuario->__set('id', $objeto->id);
            $usuario->__set('nome', $objeto->nome);
            $usuario->__set('sobrenome', $objeto->sobrenome);
            $usuario->__set('nascimento', $objeto->nascimento);
            $usuario->__set('situacao', $objeto->situacao);
            $grupo = $grupo->buscarPorId($objeto->grupo);
            
            $usuario->__set('grupo', $grupo);

            $usuarios[] = $usuario;
        }

        return $usuarios;
    }


    public static function buscarPorId(int $id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM usuarios WHERE id = :ID LIMIT 1', array(
          ':ID' => $id
        ));

    
        $result = $result->fetch(PDO::FETCH_OBJ);

        $usuario = new Users();
        $grupo = new Grupos();

        $usuario->__set('id', $result->id);
        $usuario->__set('nome', $result->nome);
        $usuario->__set('sobrenome', $result->sobrenome);
        $usuario->__set('nascimento', $result->nascimento);
        $usuario->__set('situacao', $result->situacao);
        $grupo = $grupo->buscarPorId($result->grupo);
        
        $usuario->__set('grupo', $grupo);

        return $usuario;

    }

    public static function salvar($nome,$sobrenome,$nascimento,$situacao,$grupo){
        $con = new Database();
        
        $query = 'INSERT INTO usuarios (nome, sobrenome,nascimento,situacao,grupo) values (:nome, :sobrenome, :nascimento, :situacao, :grupo)';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':situacao', $situacao);
        $stmt->bindParam(':grupo', $grupo);

        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }


        return $result;
    }

    public static function atualizar($nome,$idade,$id){
        $con = new Database();

        $query = 'UPDATE usuarios SET nome = :nome, idade = :idade WHERE id = :id';
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

    public static function apagar($id){
        $con = new Database();
        $query = 'DELETE FROM usuarios WHERE id = :id';
        $stmt = $con->prepare($query);
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