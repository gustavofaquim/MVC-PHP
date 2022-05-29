<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
       
      <form action='/post/save' method='post' id='form-att'>
          <div class="form-group">
            
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name='titulo' id="titulo" aria-describedby="titulo">
            <br>
            <label for="subtitulo">Subtitulo</label>
            <input type="text" class="form-control" name='subtitulo' id="subtitulo" aria-describedby="subtitulo">
            <br>
            <label for='texto'></label>
            <textarea name="texto" id="texto" cols="30" rows="10"></textarea>
            <br>
            
          </div>
       
       
      <button type="submit" name='bt-att' id='bt-att' class="btn btn-primary bt-att">Salvar</button>
      </form><br>
      </div>
    </div>
  </div>

</main>