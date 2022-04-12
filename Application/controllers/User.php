<?php 

use Application\core\Controller;
use Application\controllers\Home;

class User extends Controller{

    public function index(){
        $Users = $this->model('Users'); // é retornado o model Users()
        $data = $Users::listarTodos(); // lista todos os usuários
        $this->view('user/index', ['users' => $data]);
    }


    public function show($id = null){
      if (is_numeric($id)) {
        $Users = $this->model('Users');
        $data = $Users::buscarPorId($id);
        $this->view('user/show', ['user' => $data]);
      } else {
        $this->pageNotFound();
      }
    }

    public function create(){
      $this->view('user/create');
    }

    public function save(){
      if(isset($_POST['user']) && isset($_POST['idade'])){
        $users = $this->model('Users');
        $data = $users::salvar($_POST['user'],$_POST['idade']);
       
        $this->view('home/index');
       
      }
    }

    public function edit($id){
      if(isset($id)){
        $users = $this->model('Users');
        $data = $users::buscarPorId($id);

        $this->view('user/edit', ['user' => $data]);
      }
    }

    public function update(){
      if(isset($_POST['user']) && isset($_POST['idade']) && isset($_POST['id'])){
        $users = $this->model('Users');
        $data = $users::atualizar($_POST['user'], $_POST['idade'], $_POST['id']);
      }
      $this->home();
      
    }
    
    //Save
}

?>