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
        
        
        if($_FILES['img-fto']['size'] > 1){
          

          //validações  
          $tamanhoMax = 3000000;
          $permitido = array("jpg", "png", "jpeg");
          $extensao = pathinfo($_FILES['img-fto']['name'], PATHINFO_EXTENSION);
          var_dump($_FILES['img-fto']['size']);

          $msg = '';
         

           //Verificar o tamanho
           if($_FILES['img-fto']['size'] > $tamanhoMax){
            $msg = 'Tamanho máximo de 2MB. Não foi possível autalizar.';
          }else{

            echo "<br>";
            var_dump("Entrouuu");
            echo "<br>";
            

              // Verificar se a extensão é permitida
              if(in_array($extensao, $permitido)){
                
                $pasta = 'imagens/';

                //Verificando se o diretório de imagem existe
                if(!is_dir($pasta)){
                  mkdir($pasta,0755);
                }

                $tmp = $_FILES['img-fto']['tmp_name'];
                $novoNome = uniqid().".$extensao";

                if(move_uploaded_file($tmp,$pasta.$novoNome)){
                  $msg = 'Imagem atualziada com sucesso.';
                }else{
                 $msg = 'Imagem não atualizada.';
                }

              }else{
                $msg = "Erro: Extensão ($extensao) não permitda";
                $att_img = False;
              }
          }
        }


        //Verificando oq vai ser passado na variavel foto.
        if(isset($novoNome)){
          $foto = $novoNome;
         
        }else{
          $foto = Null;
        }
        
         //Chamando metodo de salvar
        $users = $this->model('Users');
        $user = strtolower($_POST['nome'] . ".". $_POST['sobrenome']);
        $data = $users::salvar($_POST['nome'],$_POST['sobrenome'], $user, $_POST['senha'], $_POST['nascimento'], 1, $_POST['grupo'], $foto);
        
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
    
    public function update($id){
      if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['nascimento']) &&  isset($_POST['grupo']) && isset($id) && isset($_POST['situacao'])){
        
      
        if($_FILES['img-fto']['size'] > 1){  

          //validações
          $tamanhoMax = 200000;
          $permitido = array("jpg", "png", "jpeg");
          $extensao = pathinfo($_FILES['img-fto']['name'], PATHINFO_EXTENSION);
          var_dump($_FILES['img-fto']['size']);

          $msg = '';


           //Verificar o tamanho
          if($_FILES['img-fto']['size'] >= $tamanhoMax){
            $msg = 'Tamanho máximo de 2MB. Não foi possível autalizar.';
          }else{

              // Verificar se a extensão é permitida
              if(in_array($extensao, $permitido)){
                
                $pasta = 'imagens/';

                //Verificando se o diretório de imagem existe
                if(!is_dir($pasta)){
                  mkdir($pasta,0755);
                }

                $tmp = $_FILES['img-fto']['tmp_name'];
                $novoNome = uniqid().".$extensao";

                if(move_uploaded_file($tmp,$pasta.$novoNome)){
                  $msg = 'Imagem atualziada com sucesso.';
                }else{
                 $msg = 'Imagem não atualizada.';
                }

              }else{
                $msg = "Erro: Extensão ($extensao) não permitda";
                $att_img = False;
              }
          }
        }


        //Verificando oq vai ser passado na variavel foto.
        if(isset($novoNome)){
          $foto = $novoNome;
        }else if($_POST['img-atual']){
          $foto = $_POST['img-atual'];
        }else{
          $foto = Null;
        }

        //Chamando metodo de atualização
        $users = $this->model('Users');
        $data = $users::atualizar($_POST['nome'],$_POST['sobrenome'], $_POST['nascimento'], 1, $_POST['grupo'], $id, $_POST['situacao'], $foto);
        
        
      
        if($data){
          $retorno = array('codigo' => 1, 'mensagem' => 'Atualizado');
          echo json_encode($retorno);
          exit();
        }else{
          $retorno = array('codigo' => 0, 'mensagem' => 'Não atualizado');
          echo json_encode([$retorno]);
          exit();
        }
      }
      
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