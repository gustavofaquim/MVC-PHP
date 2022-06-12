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
              <p class="card-text"><?= $post->__get('texto') ?></p>
            </div>
          </div>

        </div>

      </div>

            
      </div>
    </div>
  </div>
</main>