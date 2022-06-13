<?php



if(isset($_SESSION['logado'])){
    if($_SESSION['logado'] == True){
        echo "Logado";
    }
    else{
        header('Location: '.'/login/');
        die();
    }
}else{
    header('Location: '.'/login/');
    die();
}
