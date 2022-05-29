<?php 

use Application\core\Controller;
use Application\controllers\Home;
use Application\models\Users;


class Post extends Controller{

    public function index(){
        $posts = $this->model('Posts'); // é retornado o model Users()
        $data = $posts::listarTodos(); // lista todos os usuários
        
        $this->view('post/index', ['posts' => $data]);
    }

    public function posts(){
        $posts = $this->model('Posts'); // é retornado o model Users()
        $data = $posts::listarTodos(); // lista todos os usuários
        
        $this->view('post/posts', ['posts' => $data]);
    }

   public function create(){
        $this->view('post/create');
   }

    public function edit($id){
        if(isset($id)){
            $post = $this->model('Posts');
            $data = $post::buscarPorId($id);

            $this->view('post/edit', ['post' => $data]);
        }
    }

    public function save(){
        if(isset($_POST['titulo']) && isset($_POST['subtitulo']) && isset($_POST['texto'])){
            $post = $this->model('Posts');
            
            $user = new Users();
            $user = $user->buscarPorId($_SESSION['user']['id']);

            $post->__set('titulo', $_POST['titulo']);
            $post->__set('subtitulo', $_POST['subtitulo']);
            $post->__set('texto', $_POST['texto']);
            $post->__set('usuario', $user);

          

            $data = $post::salvar($post);
        }
    }

    public function update($id){
        if(isset($id) && isset($_POST['titulo']) && isset($_POST['subtitulo']) && isset($_POST['texto'])){
            $post = $this->model('Posts');
            $titulo = $_POST['titulo'];
            $subtitulo = $_POST['subtitulo'];
            $texto = $_POST['texto'];
            
            $post->__set('titulo', $_POST['titulo']);
            $post->__set('subtitulo',$_POST['subtitulo']);
            $post->__set('texto', $_POST['texto']);
            $post->__set('id', $id);

            $data = $post::atualizar($post);

            if($data){
                $this->home();
            }
            else{
                $this->view('post/edit', ['post' => $data]);
            }
        }
    }

}