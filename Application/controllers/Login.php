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
          echo "Entrouuuuu";
          $email= $_POST['email'];
          $senha = $_POST['senha'];
          
          $aut = $this->model('Login');
          $data = $aut::verificarLogin($email,$senha);
          
          var_dump("Entrouuuu");
          
          if($data){
              $msg = 'Usuários logado com sucesso';
              $_SESSION['logado'] = True;
              echo $msg;
              $this->home();
          }else{
              $msg = 'Usuário não encontrado';
              echo $msg;
          }
       }
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