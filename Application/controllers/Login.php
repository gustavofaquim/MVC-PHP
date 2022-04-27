<?php 

//namespace Application\controllers;


use Application\core\Controller;
use Application\controllers\Home;

class Login extends Controller{

  public function index(){
       $this->view('login/login');
  }

  public function logar(){
       if(isset($_POST['email']) && isset($_POST['senha'])){
          $email= $_POST['email'];
          $senha = $_POST['senha'];
          
          $aut = $this->model('Login');
          $data = $aut::logar($email,$senha);
          
          if($data){
              $_SESSION['msg'] = 'Usuários logado com sucesso';
              $_SESSION['logado'] = True;
              $_SESSION['user'] = $data;
              $this->home();
              
          }else{
              $_SESSION['msg']  = 'Usuário não encontrado';
              $this->index();
          }
       }
  }

  public function logout(){
    session_destroy(); 
    $this->index();
  }

  public function verificarLogado(){

    if(isset($_SESSION['logado'])){
      if($_SESSION['logado'] == True){
        return True;
        $app = new App();
      }else{
        $this->index();
        
      }
    }else{
      $this->index();
    }
    
  }
  
}

?>