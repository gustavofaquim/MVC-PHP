<?php 

require '../controllers/User.php';

if(isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['nascimento']) &&  isset($_POST['grupo']) && isset($id) && isset($_POST['situacao'])){
    
    $usuario = array();
    $usuario['nome'] = $_POST['nome'];
    $usuario['sobrenome'] = $_POST['sobrenome'];
    $usuario['nascimento'] = $_POST['nascimento'];
    $usuario['grupo'] = $_POST['grupo'];
    $usuario['sit'] = $_POST['sit'];

    var_dump($usuario);

    $userC = new User();

    //$userC::update();
}


?>