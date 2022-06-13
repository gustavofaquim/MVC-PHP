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
          
            <textarea name="texto" id="texto" ></textarea>
            
          </div>
       
       
      <button type="submit" name='bt-att' id='bt-att' class="btn btn-primary bt-att">Salvar</button>
      </form><br>
      </div>
    </div>
  </div>
 
  <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
  <!-- <script src="/Application/vendor/ckeditor5/src/ckeditor.js"></script>!-->
  <script>

    ClassicEditor
      .create(document.querySelector('#texto'),{
        toolbar: [ 'heading', '|', 'bold', 'italic', '', 'bulletedList', 'numberedList', 'blockQuote', 'link','uploadImage']
      })
      .catch(error => {
         console.error(error)
      })
  </script>

  


</main>