<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
      <?php 
        use Application\plugins\Message;
    
        $msg = new Message();
        
        $msg->flash("greeting", "Hi there", FLASH_SUCCESS); 
      ?>  
      <table class="table" id='table-user'>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Idade</th>
              <th scope="col">Editar</th>
              <th scope="col">Apagar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              <td><?= $user['idade'] ?></td>
              <td><a href='/user/edit/<?= $user['id'] ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
              <td><a href='/user/delete/<?= $user['id'] ?>'><i class="fa-solid fa-ban"></i></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="/" role="button">Home</a>
      </div>
    </div>
  </div>
</main>