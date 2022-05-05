<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
      <?php 
        use Application\plugins\Message;
    
        $msg = new Message();
        
        $msg->flash("greeting", "Hi there", FLASH_SUCCESS); 

      
        $userC = new User();
      ?> 
      
      <table class="table" id='table-user'>
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Usuário</th>
              <th scope="col">Idade</th>
              <th scope="col">Grupo</th>
              <th scope="col">Editar</th>
              <th scope="col">Apagar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user->__get('id') ?></td>
              <td><?= $user->nome ?></td> <!--  Isso não deveria funcionar, deveria ser privado  --> 
              <td><?= $user->__get('usuario') ?></td> 
              <td><?= $userC::calculaIdade($user->__get('nascimento')) ?></td>
              <td><?= $user->__get('grupo')->__get('nome') ?></td>
              <td><a href="/user/edit/<?= $user->__get('id') ?>"><i class="fa-solid fa-pen"></a></td>
              <td><a href="/user/delete/<?= $user->__get('id') ?>"><i class="fa-solid fa-ban"></i></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <a class="btn btn-primary" href="/home/" role="button">Home</a>
      </div>
    </div>
  </div>
</main>