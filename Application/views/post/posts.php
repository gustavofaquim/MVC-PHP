<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <div class="row">

        <?php
          if(isset($data['aux'])){
            echo"<h2>".$data['posts'][0]->__get('usuario')->__get('nome')." ".$data['posts'][0]->__get('usuario')->__get('sobrenome')."</h2>";
          }
          
          foreach ($data['posts'] as $post) { 

            echo"<div class='card card-post'>";
              echo"<div class='card-body'>";
              if(!isset($data['aux'])){
                echo"<a class='link-autor' href='posts/".$post->__get('usuario')->__get('usuario')."'><span>".$post->__get('usuario')->__get('nome')."</span></a>";

              }
              echo"<span> Publicado a ".$post::calcularData($post->__get('dt_criacao'))." dia(s). </span>";
              echo"<a href='/post/read/".$post->__get('id')."'><h5 class='card-title'>".$post->__get('titulo')."</h5>";
              echo"<p class='card-text'>".substr(strip_tags($post->__get('texto')), 0,300)."... </p></a>";
              echo"</div>";
            echo"</div>";

          }
        
        ?>
      </div>

      
       
      
      
            
      </div>
    </div>
  </div>
</main>