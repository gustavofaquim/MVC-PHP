<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>MVC</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/da47ed77ef.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
  </head>
  <body>

   
      <?php 
      session_start();
     

      if(isset($_SESSION['logado'])){
        if($_SESSION['logado'] == True){
          // echo "<nav class='navbar nav justify-content-center top-menu'>";
          echo "<nav class='navbar navbar-expand-lg top-menu'>";
          //navbar navbar-expand-lg navbar-light bg-light
          echo"<div class='collapse navbar-collapse'>";
            echo"<ul class='nav justify-content-center'>";
              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/'>Home</a>";
              echo"</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/user/'>Usuários</a>";
              echo"</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/posts/".$_SESSION['user']['usuario']."'>Minhas Publicações</a>";
              echo"</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='/post/create/'>+</a>";
              echo"</li>";

              echo "<li class='nav-item'>";
                echo "<a class='nav-link btn-login' href='/login/logout'>Sair</a>";
              echo"</li>";
            echo"</ul>";
          echo"</div>";

          echo "<a class='nav-link link-fto' href='/user/edit/".$_SESSION['user']['id']."'>";
            echo"<img src='/imagens/".$_SESSION['user']['img']."'  class='rounded-circle fto-menu'>";
          echo"</a>";
        echo"</nav>";
        }else{
          echo " <nav class='nav justify-content-center top-menu'>";
            echo "<a class='nav-link' href='/'>Home</a>";
            echo "<a class='nav-link' href='/post/'>Post</a>";
            echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
          echo"</nav>";
          
      }
      }else{
        echo " <nav class='nav justify-content-center top-menu'>";
          echo "<a class='nav-link' href='/'>Home</a>";
          echo "<a class='nav-link' href='/post/'>Post</a>";
          echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
        echo"</nav>";
         
      }
      
      ?>

    
