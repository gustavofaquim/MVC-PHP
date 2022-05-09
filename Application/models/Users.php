<?php 

namespace Application\models;

use Application\core\Database;
use PDO;
use Application\models\Grupos;
use Application\models\Situacao;

class Users {
    /* Atributos do usuários */

    private int $id;
    private String $nome;
    private String $sobrenome;
    private String $usuario;
    private String $nascimento;
    private Grupos $grupo; 
    private Situacao $situacao;


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
        $result = $con->executeQuery('Select * from usuario');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $usuarios = array();
        $grupo = new Grupos();
        $situacao = new Situacao();

        foreach($result as $id => $objeto){
            $usuario = new Users();
            //var_dump($objeto);
            //var_dump($objeto->nome);
            $usuario->__set('id', $objeto->id);
            $usuario->__set('nome', $objeto->nome);
            $usuario->__set('sobrenome', $objeto->sobrenome);
            $usuario->__set('usuario', $objeto->user);
            $usuario->__set('nascimento', $objeto->nascimento);
            $grupo = $grupo->buscarPorId($objeto->grupo);
            $situacao = $situacao->buscarPorId($objeto->situacao);
            
            $usuario->__set('grupo', $grupo);
            $usuario->__set('situacao', $situacao);

            $usuarios[] = $usuario;
        }

        return $usuarios;
    }


    public static function buscarPorId(int $id){
        $con = new Database();
        $result = $con->executeQuery('SELECT * FROM usuario WHERE id = :ID LIMIT 1', array(
          ':ID' => $id
        ));

    
        $result = $result->fetch(PDO::FETCH_OBJ);

        $usuario = new Users();
        $grupo = new Grupos();
        $situacao = new Situacao();

        $usuario->__set('id', $result->id);
        $usuario->__set('nome', $result->nome);
        $usuario->__set('usuario', $result->user);
        $usuario->__set('sobrenome', $result->sobrenome);
        $usuario->__set('nascimento', $result->nascimento);
        $situacao = $situacao->buscarPorId($result->situacao);
        $grupo = $grupo->buscarPorId($result->grupo);
        
        $usuario->__set('grupo', $grupo);
        $usuario->__set('situacao', $situacao);

        return $usuario;

    }

    public static function salvar($nome,$sobrenome,$user, $senha, $nascimento,$situacao,$grupo){
        $con = new Database();
        
        $query = 'INSERT INTO usuario (nome, sobrenome, user, senha, nascimento,situacao,grupo) values (:nome, :sobrenome,:user, :senha, :nascimento, :situacao, :grupo)';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':senha', $senha);
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

    public static function atualizar($nome,$sobrenome,$nascimento,$situacao,$grupo,$id){
        $con = new Database();
        
        $query = 'UPDATE usuario SET nome = :nome, sobrenome = :sobrenome, nascimento = :nascimento, grupo = :grupo WHERE id = :id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':grupo', $grupo);
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
        $query = 'DELETE FROM usuario WHERE id = :id';
        $stmt = $con->prepare($query);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }
        
        return $result;
    }


    public static function getIterator($objeto){

        $result = array();

        foreach($objeto as $id => $obj){
            $result[$id] = $obj;
        }

        return $result;
    }
}

?>