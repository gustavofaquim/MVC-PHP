<?php 

function message(String $conteudo, String $tipo){

    $_SESSION['msg_body'] = $conteudo;
    $_SESSION['msg_type'] = $tipo;

}


?>