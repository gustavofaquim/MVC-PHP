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


    public function __construct(){
        
    }


    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }


    public static function verificarLogin($user,$senha){
        $con = new Database();
        
        $result = $con->executeQuery('SELECT * FROM usuarios where user = :user and senha = :senha and situacao = 1 LIMIT 1', array(
            ':user' => $user,
            ':senha' => $senha
        ));

        $result = $result->fetch(PDO::FETCH_OBJ);
        if($result){
             //var_dump($result);

            $login = new Login();

            $usuario = new Users();
            $usuario = $usuario::buscarPorId($result->id);

            //var_dump($usuario);

            return $usuario;
        }else{
            return Null;
        }
       
        
    }    
}

?>