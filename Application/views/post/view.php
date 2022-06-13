<main>
  <div class="container">
    <div class="row">
      <?php
            $post = $data['post'];
      ?>
      <div class="row">
        <div class='pag-texto'>

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=  $post->__get('titulo') ?></h5>
              <h6 class="card-subtitle mb-2 text-muted"><?= $post->__get('subtitulo') ?></h6>
              <span class='autor'><?php echo $post->__get('usuario')->__get('nome') . " ". $post->__get('usuario')->__get('sobrenome') ?></span><br>
              <span class='dt'><?php echo $post->__get('dt_criacao')?></span>
              <div class="card-text"><?= $post->__get('texto') ?></div>
            </div>
          </div>

        </div>

      </div>

            
      </div>
    </div>
  </div>
</main>