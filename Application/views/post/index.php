<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
    
      
      <table class="table" id='table-user'>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Titulo</th>
              <th scope="col">Usuário</th>
              <th scope="col">Editar</th>
              <th scope="col">Apagar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['posts'] as $post) { ?>
            <tr>
              <td><?= $post->__get('id') ?></td>
              <td><?= $post->__get('titulo') ?></td> <!--  Isso não deveria funcionar, deveria ser privado  --> 
              <td><?= $post->__get('usuario')->__get('nome') ?></td> 
              <td><a href="/post/edit/<?= $post->__get('id') ?>"><i class="fa-solid fa-pen"></a></td>
              <td><a href="/post/delete/<?= $post->__get('id') ?>"><i class="fa-solid fa-ban"></i></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>