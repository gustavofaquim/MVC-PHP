<?php 

use Application\core\Controller;
use Application\controllers\Home;
use Application\models\Situacao;

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
      if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['senha'])  && isset($_POST['nascimento']) &&  isset($_POST['grupo'])){
        $users = $this->model('Users');
        $user = strtolower($_POST['nome'] . ".". $_POST['sobrenome']);
        $data = $users::salvar($_POST['nome'],$_POST['sobrenome'], $user, $_POST['senha'], $_POST['nascimento'], 1, $_POST['grupo']);
        
        $this->home();
       
      }
    }

    public function edit($id){
      if(isset($id)){
        $users = $this->model('Users');
        $data = $users::buscarPorId($id);
        $sit = new Situacao();
        $lista = $sit::listarTodos();
        $this->view('user/edit', ['user' => $data, 'list' => $lista]);
      }
    }
    
    public function update(){
      
      if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['nascimento']) &&  isset($_POST['grupo']) && isset($_POST['id'])){
        echo "SIT: ". $_POST['sit'];
        $users = $this->model('Users');
        $id = $_POST['id'];
        
        $data = $users::atualizar($_POST['nome'],$_POST['sobrenome'], $_POST['nascimento'], 1, $_POST['grupo'], $id);
        
      }
      $this->home();
      
    }

    public function delete($id){
      if(isset($id)){
        $users = $this->model('Users');
        $data = $users::apagar($id);
      }
      $this->home();
    }
    
    public function calculaIdade($data){
      $idade = 0;

      $data_nascimento = date('Y-m-d', strtotime($data));

      $data = explode('-', $data_nascimento);
      $anoNasc = $data[0];
      $mesNasc = $data[1];
      $diaNasc = $data[2];

      $anoAtual = date("Y");
      $mesAtual = date("m");
      $diaAtual = date("d");

      $idade = $anoAtual - $anoNasc;

      if ($mesAtual < $mesNasc){
        $idade -= 1;
      } 
      elseif (($mesAtual == $mesNasc) && ($diaAtual <= $diaNasc)){
        $idade -= 1;
      }
      return $idade;
    }
}

?>