<div class="container">
  <div class="row">
    <div class="col-8 offset-2 text-center" style="margin-top:150px">
      <?php 
       
        if(isset($_SESSION['user'])){
          echo "<h2> Bem-vindo, ".$_SESSION['user']->nome."</h2>";  
        } 
       
      ?>
      <h1>Estrutura MVC PHP</h1>
      <a href="/user/index">Usuários</a>
      <a href="/user/create/">Novo</a>
      <a href="/login/">Login</a>
      <a href="/login/logout">Sair</a>
    </div>
  </div>
</div>