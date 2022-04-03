<?php 

use Application\core\Controller;

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
}

?>