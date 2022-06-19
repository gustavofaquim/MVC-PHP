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
 
   <!-- <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>!-->
   <script src="/assets/vendor/ckeditor5/build/ckeditor.js"></script>
   <script>ClassicEditor
				.create( document.querySelector( '#texto' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: wweuf6q3753a-hdq8uexdvlds' );
					console.error( error );
				} );
		</script>
  


</main>