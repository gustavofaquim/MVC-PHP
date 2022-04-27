<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/da47ed77ef.js" crossorigin="anonymous"></script>
  </head>
  <body>

  <?php
    require '../Application/autoload.php';

    //require '../Application/controllers/Login';

    session_start();
    use Application\core\App;
    
    

    //$aut = new Login();
    //$aut->verificarLogado();
    $app = new App();
    
    
    

  ?>
  <script src="/assets/js/jquery.slim.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  </body>
</html>