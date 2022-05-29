<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <div class="row">

        <?php
        
          foreach ($data['posts'] as $post) { 
            echo"<div class='col-sm-6'>";
              echo"<div class='card'>";
                echo"<div class='card-body'>";
                  echo"<h5 class='card-title'>".$post->__get('titulo')."</h5>";
                  echo"<p class='card-text'>".$post->__get('texto')."</p>";
                  echo"<a href='#' class='btn btn-primary'>Visitar</a>";
                echo"</div>";
              echo"</div>";
            echo"</div>";

          }
        
        ?>
      </div>

      
       
      
      
            
      </div>
    </div>
  </div>
</main>