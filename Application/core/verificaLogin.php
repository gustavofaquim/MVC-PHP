<?php



if(isset($_SESSION['logado'])){
    if($_SESSION['logado'] == True){
        $a = '';
    }
    else{
        header('Location: '.'/login/');
        exit();
    }
}else{
    header('Location: '.'/login/');
    exit();
}
