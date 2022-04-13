<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <form action='/user/update' method='post' >
        <div class="form-group">
            <label for="user">Pessoa</label>
            <?php foreach ($data['user'] as $user) { ?>
            <input type="text" class="form-control" name='user' id="user" aria-describedby="user" placeholder="Nome de usuário" value='<?= $user['nome'] ?>'>
            <br>Idade<br>
            <input type="number" min='1' class="form-control" name='idade' id="idade" aria-describedby="idade" placeholder="Idade" value='<?= $user['idade'] ?>'>
            <input type="hidden" name='id' id="id" value='<?= $user['id'] ?>'>
        <?php  }?>
        </div>
       
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form><br>
      <a href="/">Home</a>
      </div>
    </div>
  </div>
</main>