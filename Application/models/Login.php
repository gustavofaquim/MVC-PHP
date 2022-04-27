<?php 

namespace Application\models;

use Application\core\Database;
use PDO;
use Application\models\Users;


class Login {
    /* Atributos do usuários */

    //private int $sessao;
    //private int $ativo;
    private Users $user;
    private bool $resultado = false;


    public function __construct(){
        
    }


    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


    public static function logar($users,$senha){
        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM usuarios where user = :user and senha = :senha and situacao = 1 LIMIT 1', array(
            ':user' => $users,
            ':senha' => $senha
        ));

        $result = $result->fetch(PDO::FETCH_OBJ);
        if($result){
            //$login = new Login();
            $usuario = new Users();
            
            $usuario = $usuario::buscarPorId($result->id);

            return $usuario;
        }else{
            return Null;
        }
       
        
    }    
}

?>