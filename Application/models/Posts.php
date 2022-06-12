<?php 

namespace Application\models;

use Application\core\Database;
use PDO;
use Application\models\Users;

class Posts{

    private String $id;
    private String $titulo;
    private String $subtitulo;
    private String $texto;
    private Users $usuario; //-> Isso aqui não faz o menor sentido...


    public function __construct(){
        
    }

    public function __get($atributo){
        return $this->$atributo;
    }
    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    //public function salvar($titulo, $subtitulo, $texto, $user){
    public static function salvar(Posts $post){
        $con = new Database();
        
        $query = 'INSERT INTO post (titulo, subtitulo, texto, usuario) VALUES (:titulo, :subtitulo, :texto, :usuario);';
        $stmt = $con->prepare($query);

        $titulo = $post->__get('titulo');
        $subtitulo = $post->__get('subtitulo');
        $texto = $post->__get('texto');
        $usuario = $post->__get('usuario')->__get('id');

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':subtitulo', $subtitulo);
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':usuario', $usuario);

        $result = $stmt->execute();

        if (!$result){
            var_dump( $stmt->errorInfo() );
            exit;
        }


        return $result;

    }

    public static function listarTodos(){
        $con = new Database();
        $result = $con->executeQuery('Select * from post');

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $posts = array();
        $usuario = new Users();

        foreach($result as $id => $objeto){
            
            $post = new Posts();
            

            $post->__set('id', $objeto->id);
            $post->__set('titulo', $objeto->titulo);
            $post->__set('subtitulo', $objeto->subtitulo);
            $post->__set('texto', $objeto->texto);
            
            $user = $usuario::buscarPorId($objeto->usuario);
            //var_dump($user);
            $post->__set('usuario', $user);

            $posts[] = $post;
        }

        return $posts;
    }


    public static function listarPorUser($user){
        $con = new Database();
    
        $usuario = new Users();
        $id =  $usuario->buscarPorUser($user)->__get('id');
       
        $result = $con->executeQuery('SELECT * FROM post WHERE usuario = :ID', array(
            'ID' => $id
        ));

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        $posts = array();
        

        foreach($result as $id => $objeto){
            
            $post = new Posts();
        
            $post->__set('id', $objeto->id);
            $post->__set('titulo', $objeto->titulo);
            $post->__set('subtitulo', $objeto->subtitulo);
            $post->__set('texto', $objeto->texto);
            
            $user = $usuario::buscarPorId($objeto->usuario);
            //var_dump($user);
            $post->__set('usuario', $user);

            $posts[] = $post;
        }

        return $posts;
    }

    public static function buscarPorId($id){
        $con = new Database();

        $result = $con->executeQuery('SELECT * FROM post WHERE ID = :ID LIMIT 1',array(
            ':ID' => $id
        ));

        $objeto = $result->fetch(PDO::FETCH_OBJ);
        $result = $result->fetch(PDO::FETCH_OBJ);

        $post = new Posts();
        $usuario = new Users();

        $post->__set('id', $objeto->id);
        $post->__set('titulo', $objeto->titulo);
        $post->__set('subtitulo', $objeto->subtitulo);
        $post->__set('texto', $objeto->texto);

        $user = $usuario::buscarPorId($objeto->usuario);
        $post->__set('usuario', $user);

        return $post;
    }


    //public static function atualizar($id, $titulo, $subtitulo, $texto){
    public static function atualizar(Posts $post){
        $con = new Database();
        
        $query = 'UPDATE post SET titulo = :titulo, subtitulo = :subtitulo, texto = :texto WHERE id = :id';
        
        $stmt = $con->prepare($query);
        
        $titulo = $post->__get('titulo');
        $subtitulo = $post->__get('subtitulo');
        $texto = $post->__get('texto');
        $id = $post->__get('id');

        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam('subtitulo',$subtitulo );
        $stmt->bindParam(':texto', $texto);
        $stmt->bindParam(':id',$id);

        $result = $stmt->execute();

        if (!$result){
            //var_dump( $stmt->errorInfo() );
            return False;
            exit;
        }

        return True;
    }



}