<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <form action='/user/save' method='post'>
        <div class="form-group">
            <label for="user">Pessoa</label>
            <input type="text" class="form-control" name='user' id="user" aria-describedby="user" placeholder="Nome">
            <br>
            <input type="text" class="form-control" name='sobrenome' id="sobrenome" aria-describedby="sobrenome" placeholder="Sobrenome">
            <br>
            <input type="date" class="form-control" name='nascimento' id="nascimento" aria-describedby="nascimento" placeholder="Data de Nascimento">
            <br>
            <select name="grupo">
              <option value="2" selected>Usuário</option>
              <option value="1">Administrador</option>
            </select>
          </div>
       
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
      <a href="/">Home</a>
      </div>
    </div>
  </div>
</main>