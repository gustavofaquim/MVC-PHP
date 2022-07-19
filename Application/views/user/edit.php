<main>
  <div class="container">
    <div class="row">
      <div class="col-8 offset-2" style="margin-top:100px">
     
                                                         
      <form action='/user/update/' method='post' enctype="multipart/form-data" id='form-att'>
          <div class="form-group">
          <?php  $user = $data['user'];?>
            
            <img src="" alt="" id='img-fto'>
            <input type="file" class="custom-file-input" name="img-fto" aria-describedby="img-fto">
            <label class="custom-file-label" for="img-fto">Escolher arquivo</label>

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
            <select name='situacao' id='sit'>
              <?php foreach ($data['list'] as $id => $list){  ?>
                <option value='<?php echo $list->__get('id') ?>' <?php if($list->__get('id') == $user->__get('situacao')->__get('id')){ echo 'selected';} ?>  > <?php echo $list->__get('descricao') ?></option>
              <?php }  ?>
            </select>
            
           
          </div>
       
       
      <button type="button" name='bt-att' id='bt-att' class="btn btn-primary bt-att" >Atualizar</button>
      </form><br>
      </div>
    </div>
  </div>

  <script>

    $('document').ready(function(){
    
      $("#bt-att").click(function(){
        var data = $("#form-att").serialize();

        // Captura os dados do formulário
        var formulario = document.getElementById('form-att');

        // Instância o FormData passando como parâmetro o formulário
        var formData = new FormData(formulario);

        alert(data);

        var id = "<?=$data['user']->__get('id')?>";
          
        $.ajax({
          type : 'POST',
          url  : '/user/update/' + id,
          //data : data,
          //dataType: 'html',
          data: formData,
          dataType: 'json',
          processData: false,  
		      contentType: false,
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


      // Carrega a imagem selecionada no elemento <img>
      $("input[type=file]").on("change", function(){
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return;
    
            if (/^image/.test( files[0].type)){
                var reader = new FileReader();
                reader.readAsDataURL(files[0]);
    
                reader.onload = function(){
                    $("#img-fto").attr('src', this.result);
                }
            }
        }); 
    
    });
      
  </script>
</main>