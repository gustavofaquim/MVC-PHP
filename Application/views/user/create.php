<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">

      <form action='/user/save' method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="user">Pessoa</label>
            <input type="text" class="form-control" name='nome' id="nome" aria-describedby="nome" placeholder="Nome">
            <br>
            <input type="text" class="form-control" name='sobrenome' id="sobrenome" aria-describedby="sobrenome" placeholder="Sobrenome">
            <br>
            <input type="password" class="form-control" name='senha' id="senha" aria-describedby="Senha" placeholder="Senha">
            <br>
            <input type="password" class="form-control" name='ConfirSenha' id="ConfirSenha" aria-describedby="ConfirSenha" placeholder="Senha">
            <br>
            <input type="date" class="form-control" name='nascimento' id="nascimento" aria-describedby="nascimento" placeholder="Data de Nascimento">
            <br>
            <select name="grupo">
              <option value="2" selected>Usuário</option>
              <option value="1">Administrador</option>
            </select>

            <div class="mb-3">
              <label for="img-fto" class="form-label">Escolha um arquivo</label>
              <input class="form-control" name='img-fto' type="file" id="img-fto">
            </div> <br>

            <img src="" alt="" id='img-pre'>  

          </div>
       
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    
      </div>
    </div>
  </div>

<script>

$('document').ready(function(){
    // Carrega a imagem selecionada no elemento <img>
    $("input[type=file]").on("change", function(){
          var files = !!this.files ? this.files : [];
          if (!files.length || !window.FileReader) return;
  
          if (/^image/.test( files[0].type)){
              var reader = new FileReader();
              reader.readAsDataURL(files[0]);
  
              reader.onload = function(){
                  $("#img-pre").attr('src', this.result);
          }
        }
    }); 
  
  }); 

</script>
</main>