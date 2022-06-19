<div class="container">
  <div class="row">
    <div class="col-8 offset-2 text-center" style="margin-top:150px">
      <?php 
       
        if(isset($_SESSION['user'])){
          echo "<h2> Bem-vindo, ".$_SESSION['user']['nome']."</h2>";  
        } 

        echo " <h1>Estrutura MVC PHP</h1>";
      
        
       
      ?>
     

      
     
    </div>
  </div>
</div>