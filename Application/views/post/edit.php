<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     
    <?php 
    
    $post = $data['post'];
    

    ?>
      <form action='/post/update/<?= $post->__get('id') ?>' method='post' id='form-att'>
          <div class="form-group">
         
            
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control" name='titulo' id="titulo" aria-describedby="titulo" value='<?= $post->__get('titulo') ?>'>
            <br>
            <label for="subtitulo">Subtitulo</label>
            <input type="text" class="form-control" name='subtitulo' id="subtitulo" aria-describedby="subtitulo" value='<?= $post->__get('subtitulo') ?>'>
            <br>
            <label for='texto'></label>
            <textarea name="texto" id="texto" cols="30" rows="10"><?= $post->__get('texto') ?></textarea>
            <br>
            <label for="user"></label>
            <input type="text" disabled class="form-control" name='user' id="user" aria-describedby="user" value='<?= $post->__get('usuario')->__get('nome') ?>'>
            <br>
           
          </div>
       
       
      <button type="submit" name='bt-att' id='bt-att' class="btn btn-primary bt-att" >Atualizar</button>
      </form><br>
      </div>
    </div>
  </div>

  <!-- <script>

    $('document').ready(function(){
    
      $("#bt-att").click(function(){
        var data = $("#form-att").serialize();
        //alert(data);

        var id = "<?=$data['user']->__get('id')?>";
          
        $.ajax({
          type : 'POST',
          url  : '/user/update/' + id,
          data : data,
          dataType: 'html',
          beforeSend: function()
          {	
            $("#bt-att").html('Validando ...');
          },
          success : function(response){						
            if(response.codigo == "1"){	
              $("#bt-att").html('Atualizar');
              alert(response.mensagem);//$("#login-alert").css('display', 'none')
              window.location.href = "home.php";
            }
            else{			
              $("#bt-att").html('Atualizar');
              alert(response.retorno);
              //$("#login-alert").css('display', 'block')
              //$("#mensagem").html('<strong>Erro! </strong>' + response.mensagem);
            }
            }
        });
      });
    
    });
      
  </script> -- >
</main>