<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Idade</th>
              <th scope="col">Editar</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data['users'] as $user) { ?>
            <tr>
              <td><?= $user['id'] ?></td>
              <td><?= $user['nome'] ?></td>
              <td><?= $user['idade'] ?></td>
              <td><a href='/user/edit/<?= $user['id'] ?>'>Editar</a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <a href="/">Home</a>
      </div>
    </div>
  </div>
</main>