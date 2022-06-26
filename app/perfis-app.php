<!DOCTYPE html>
<html>
    <head>

       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>       
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> 
       <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script> 
       <script type="text/javascript" src="js/bootstrap.js"></script> 
       <link rel='stylesheet' href='styles/reset.css'>
       <link rel='stylesheet' href='styles/app-perfis02.css'>
       <title> Perfis - Spin System </title>
    </head>

    <?php 
     session_start();
    ?>
    <body>

         <header>
             <?php require_once('layouts.fixos/nav-principal.php') ?>
         </header>

         

         <main class='main-app'>
           
           <section class='meu-perfil card'>
               <div class='row'>
                   <div class='col-md-4'>
                        <div class='img-perfil' style='background:url("<?= isset($_SESSION['user']['foto']) ? $_SESSION['user']['foto'] : "" ?>") no-repeat; background-size: 100% 100%;' onclick='incluiImg("input-img");'>
                      
                        </div>
                        <form id='form-foto-usuario' enctype="multipart/form-data">
                            <input type='hidden' name='id_usuario' id='id_usuario' value="<?=json_encode($_SESSION['user']['id']) ?>">
                            <input type='file' id='input-img' name='input-img' style='display:none;' value="">
                        </form>
                    </div>
                    <div class='col-md-8'>
                        <form id='form-usuario-logado' class='form-group'>
                            <div class='row'>
                                <div class='col-md-6'>
                                    <input type='hidden' name='id' id='id' value="<?=json_encode($_SESSION['user']['id']) ?>">
                                    <label for='nome-usuario'>
                                        Nome 
                                    </label>
                                    <input type='text' name='nome-usuario' id='nome-usuario' class='form-control' value="<?php if(isset($_SESSION['user']['nome'])) { echo $_SESSION['user']['nome'];} ?>">
                                    <label for='email-usuario'>
                                        E-mail
                                    </label>
                                    <input type='email' name='email-usuario' id='email-usuario' class='form-control' value="<?php  if(isset($_SESSION['user']['email'])) { echo $_SESSION['user']['email'];}  ?>">
                                    <label for='senha-usuario'>
                                        Nova Senha
                                    </label>
                                    <input type='text' name='senha-usuario' id='senha-usuario' class='form-control'>
                                </div>
                                <div class='col-md-6'>
                                    <label for='telefone-usuario'>
                                        Telefone
                                    </label>
                                    <input type='text' name='telefone-usuario' id='telefone-usuario' class='form-control' value="<?php if(isset($_SESSION['user']['telefone'])) { echo $_SESSION['user']['telefone'];} ?>">
                                    <label for='cpf-usuario'>
                                        CPF
                                    </label>
                                    <input type='text' name='cpf-usuario' id='cpf-usuario' class='form-control' value="<?php if(isset($_SESSION['user']['telefone'])) { echo $_SESSION['user']['cpf'];} ?>">
                                    <label class='confirma-senha' for='confirma-senha-usuario'>
                                        Confirma Senha
                                    </label>
                                    <input type='text' name='confirma-senha-usuario' id='confirma-senha-usuario' class='form-control confirma-senha'>
                                </div>
                            </div>
                            <div class='atualiza-cadastro'>
                                <button type='button' class='btn btn-success float-right btn-atualiza-cadastro'> Atualizar Cadastro </button>
                            </div>
                        </form>
                    </div>
               </div>
           </section>
             
           <?php if(isset($_SESSION['user']['acesso']) && $_SESSION['user']['acesso'] == 1){ ?>
           <section class='tabela-users card'>
             <table class='table table-hover'>
                 <thead>
                     <tr class='text-center'>
                         <th>Usuário</th>
                         <th>E-mail</th>
                         <th>Perfil</th>
                         <th>Ações</th>
                     </tr>
                 </thead>
                 <tbody class='usuarios-cadastrados'> 
                   

                 </tbody>
                 <tfoot>
                 <tr>
                   <td colspan='4'>
                     <button type='button' class='btn btn-success novo-usuario'> Novo Usuário </button>
                   </td>
                 </tfoot>
             </table>
          </section>  
          <?php } ?>
    

        </main>


        <footer>
                <?php  require_once('layouts.fixos/footer.php'); ?>
        </footer>
         
    </body>
<?php require_once('modal/novo-user.php'); ?>
</html>

<script type='text/JavaScript'>

    $(document).ready(function(){
        let id_empresa = "<?php echo $_SESSION['user']['empresa'] ?>" ;
        usuariosRegistrados(id_empresa);
    });

   function incluiImg(anexo){
       $(`#${anexo}`).trigger('click');
   }

   $("#input-img").on('change', function(){
     if($(this).val() != ""){
        Swal.fire({
            title:'Alterar Foto!',
            text: 'Deseja alterar foto de perfil?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
         }).then((result) => {
              if(result.value){
                  var formData = new FormData();
                  formData.append('id', $('#id_usuario').val());
                  foto = $('#input-img')[0];
                  formData.append('foto', foto.files[0]);
                  console.log(foto.files[0]);
                  $.ajax({
                     url: 'perfil-config.php',
                     type: 'post',                
                     data: formData,
                     cache: false,
                     contentType: false,
                     processData: false,
                     success: function(response){
                        window.location.reload();
                     }
                  });
              }
         });
     }
   });

   $('#cpf-usuario').mask('000.000.000-00', {reverse: true});

   $('#senha-usuario').on('keyup', function(){
       if($(this).val() != ""){
           $('.confirma-senha').show();
       } else{
           $('.confirma-senha').hide();
       }
    });

    $('.btn-atualiza-cadastro').on('click', function(){
        const campo = $('#nome-usuario').val() == "" ? 'nome' : 'email';
        if($('#email-usuario').val() == "" || $('#nome-usuario').val() == ""){
            Swal.fire({
                title:'Atenção!',
                text: "Para prosseguir é necessário preencher o campo "+campo+".",
                icon: 'error',         
            });
        } else if($('#senha-usuario').val() != "" && $('#senha-usuario').val() != $("#confirma-senha-usuario").val()){
                Swal.fire({
                    title:'Atenção!',
                    text: "As senhas informadas não são iguais.",
                    icon: 'error',         
                });
            } else {
             let dados = $('#form-usuario-logado').serialize();
                $.ajax({
                url: 'perfil-config.php',
                type: 'post',
                data: {dados: dados},
                success: function(response){
                    if(response.trim() == "email_false"){
                        Swal.fire({
                            title:'Atenção!',
                            text: "Necessário informar um e-mail válido.",
                            icon: 'error',         
                        });
                    }
                }
                });
        }
    });

    function usuariosRegistrados(id_empresa){
        $.ajax({
          url: 'usuarios-registrados.php',
          type: 'POST', 
          data: {id_empresa: id_empresa},
          dataType:'json',
          success: function(response){
            tabelaUsuarios(response);
          }
        });
    }

    function tabelaUsuarios(usuarios){
        html = "";
        usuarios.forEach(function(usuario){
           if(usuario.admin == 1){
               perfil = "Administrador";
               status_admin = 'selected';
               status_comum = '';
           } else {
               perfil = "Comum";
               status_admin = '';
               status_comum = 'selected';
           }
           if(usuario.inactive == 1){
               btn_color = 'warning';
               btn_title = 'Reativar Perfil';
           } else {
               btn_color = 'danger';
               btn_title     = 'Bloquear Perfil';
           }
           html += `<tr class='text-center user-${usuario.id}'>
                      <td>${usuario.name}</td>
                      <td>${usuario.email}</td>
                      <td>${perfil}</td>
                      <td>
                         <button class='btn btn-sm btn-info edita-usuario' data-toogle='tooltip' rel='show' rel-usuario='${usuario.id}' title='Editar Perfil'>
                           <i class='material-icons'>edit</i>
                         </button>
                         <button class='btn btn-sm btn-${btn_color} btn-desativar-perfil' rel='${usuario.inactive}'  rel-usuario='${usuario.id}' data-tool='tooltip' title='${btn_title}'>
                           <i class='material-icons' style='color:#FFFFFF'>lock</i>
                         </button>
                      </td>
                    </tr>
                    <tr id='edita${usuario.id}'class=' d-none'>
                      <td><input type='text' id='nome-user-${usuario.id}' class='form-control' value='${usuario.name}' style='width:80%; margin-left:15%;'></td>
                      <td><input type='text' id='email-user-${usuario.id}' class='form-control' value='${usuario.email}' style='width:80%; margin-left:15%;'></td>
                      <td>
                        <select class='form-control selectize' id='perfil-user-${usuario.id}' style='width:80%; margin-left:15%;'>
                            <option ${status_admin} value='1'>Administrador</option>
                            <option ${status_comum}  value='0'>Comum</option> 
                       </select>
                      </td>
                      <td>
                       <button class='btn btn-success btn-sm salvar-perfil' rel-usuario='${usuario.id}' style='margin-left:40%;' data-tool='tooltip' title='Salvar Perfil'>
                          <i class='material-icons'>check</i>
                       </button>
                      </td>
                    </tr>`;
        });

        $('.usuarios-cadastrados').html(html);
    }

     $(document).on('click', '.edita-usuario', function(){
       acao = $(this).attr('rel');
       usuario = $(this).attr('rel-usuario');
       if(acao == 'show'){
           $(`#edita${usuario}`).removeClass('d-none');
           $(this).attr('rel', 'hide');
       } else {
           $(`#edita${usuario}`).addClass('d-none');
           $(this).attr('rel', 'show');
       }
     });

     $(document).on('click', '.salvar-perfil', function(){
        id_usuario = $(this).attr('rel-usuario');
        Swal.fire({
            title:'Atualizar Usuário!',
            text: 'Deseja salvar as alterações do usuário?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
         }).then((result) => {
            if(result.value){
                nome_usuario = $(`#nome-user-${id_usuario}`).val();
                email = $(`#email-user-${id_usuario}`).val();
                perfil = $(`#perfil-user-${id_usuario}`).val();
                $.ajax({
                   url: 'usuarios-registrados.php',
                   type: 'POST', 
                   data: {id: id_usuario, nome:nome_usuario, email: email, perfil: perfil},
                   dataType: 'json',
                   success:function(response){
                        if(response == 'nao_encontrado'){
                            Swal.fire({
                                title:'Não Identificado!',
                                text: 'Não foi possível realizar as alterações, pois o usuário não foi identificado.',
                                icon: 'error',
                            });
                        } else {
                            Swal.fire({
                                title:'Usuário Atualizado!',
                                text: 'O usuário foi atualizado com sucesso.',
                                icon: 'success',
                            });
                            $(`.user-${id_usuario} td:nth-child(1)`).html(response.NAME);
                            $(`.user-${id_usuario} td:nth-child(2)`).html(response.EMAIL);
                            if(response.ADMIN == 1){
                                $(`.user-${id_usuario} td:nth-child(3)`).html("Administrador");
                            } else {
                                $(`.user-${id_usuario} td:nth-child(3)`).html("Comum");
                            }                            
                        }
                   }
                });
            } 
         });
     });

     $(document).on('click', '.btn-desativar-perfil', function(){
        let usuario = $(`.user-${$(this).attr('rel-usuario')} td:nth-child(1)`).html();
        let acao = $(this).attr('rel') == 0 ? 'desativar' : 'ativar';
        Swal.fire({
            title:'Atualizar Usuário!',
            text: 'Deseja '+ acao +' o usuário '+ usuario + '?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
         }).then((result) => {
            let usuario_acesso  = new Array();
            let dados = {'id' : $(this).attr('rel-usuario'), 'acao': acao};
            usuario_acesso.push(dados);
            if(result.value){
             $.ajax({
               url: 'usuarios-registrados.php',
               type: 'POST', 
               data: {usuario_acesso: usuario_acesso},
               success: function(response){
                console.log(response);
                Swal.fire({
                    title:'Usuário atualizado!',
                    text: 'O perfil de '+ usuario + ' foi '+ response + ' com sucesso.',
                    icon: 'success',
                }).then((result) => {
                    window.location.reload();
                });
               }
             });
            }
         });
     })


     $('.novo-usuario').on('click', function(){
        jQuery.noConflict();
       $("#modalNovoUsuario").modal('show');
     });

</script>