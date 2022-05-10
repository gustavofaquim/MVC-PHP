<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <form action='/user/update' method='post'>
          <div class="form-group">
          <?php foreach ($data as $id => $user) { ?>
            <label for="user">ID</label>
            <input type="number" class="form-control" name='id' id="id" aria-describedby="id" value='<?= $user->__get('id') ?>'>
            <br>
            <label for="user">Nome</label>
            <input type="text" class="form-control" name='nome' id="nome" aria-describedby="nome" placeholder="Nome"  value='<?= $user->__get('nome') ?>'>
            <br>
            <label for="user">Sobrenome</label>
            <input type="text" class="form-control" name='sobrenome' id="sobrenome" aria-describedby="sobrenome" placeholder="Sobrenome"  value='<?= $user->__get('sobrenome') ?>'>
            <br>
            <label for="user">Senha</label>
            <label for="user">Nascimento</label>
            <input type="date" class="form-control" name='nascimento' id="nascimento" aria-describedby="nascimento" placeholder="Data de Nascimento"  value='<?= $user->__get('nascimento') ?>'>
            <br>
            <label for="user">Tipo de Usuário</label>
            <br>
            <select name="grupo">
              <?php if($user->__get('grupo')->__get('id') == '2'){ ?>
              <option value="2" selected>Usuário</option>
              <option value="1">Administrador</option>
              <?php } else{ ?> 
                <option value="2">Usuário</option>
                <option value="1" selected>Administrador</option>
              <?php } ?> 
            </select>
            <br>
            <label>Situação</label><br>
            <?php
              
            ?>
            <input type="radio" id='sit' name='sit' value='<?php $user->__get('situacao')->__get('id') ?>'> Ativo 
            
            <?php } ?>
          </div>
       
       
        <button type="submit" class="btn btn-primary">Atualizar</button>
      </form><br>
      <a href="/home/">Home</a>
      </div>
    </div>
  </div>
</main>