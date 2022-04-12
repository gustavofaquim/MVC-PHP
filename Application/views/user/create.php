<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <form action='/user/save' method='post'>
        <div class="form-group">
            <label for="user">Pessoa</label>
            <input type="text" class="form-control" name='user' id="user" aria-describedby="user" placeholder="Nome de usuário">
            <br>
            <input type="number" min='1' class="form-control" name='idade' id="idade" aria-describedby="idade" placeholder="Idade">
        </div>
       
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
      <a href="/">Home</a>
      </div>
    </div>
  </div>
</main>