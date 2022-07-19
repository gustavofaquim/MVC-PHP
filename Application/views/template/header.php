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

    <nav class="nav justify-content-center top-menu">
      <?php 
      session_start();

      if(isset($_SESSION['logado'])){
        if($_SESSION['logado'] == True){
          echo "<a class='nav-link' href='/'>Home</a>";
          echo "<a class='nav-link' href='/user/'>Usuários</a>";
          echo "<a class='nav-link' href='/post/'>Minhas Publicações</a>";
          echo "<a class='nav-link' href='/post/create/'>+</a>";
          echo "<a class='nav-link btn-login' href='/login/logout'>Sair</a>";
        }else{
          echo "<a class='nav-link' href='/'>Home</a>";
          echo "<a class='nav-link' href='/post/'>Post</a>";
          echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
          
      }
      }else{
          echo "<a class='nav-link' href='/'>Home</a>";
          echo "<a class='nav-link' href='/post/'>Post</a>";
          echo "<a class='nav-link btn-login' href='/login'>Entrar</a>";
         
      }
      
      ?>

    </nav>
