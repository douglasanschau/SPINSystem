<div class="modal fade" id="modalNovoUsuario" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Cadastrar Novo Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form-cadastro-usuario' class='form-group'>
            <input type='hidden' id='empresa' name='empresa' value="<?php echo $_SESSION['user']['empresa'] ?>">
            <label for='nome-novo-usuario'>Nome </label>
            <input type='text' class='form-control' name='nome-novo-usuario' id='nome-novo-usuario'>
            <label for='email-novo-usuario'>E-mail</label>
            <input type='text' class='form-control' name='email-novo-usuario' id='email-novo-usuario'>
            <label for='perfil-novo-usuario'>Perfil</label>
            <select class='form-control' name='perfil-novo-usuario' id='perfil-novo-usuario'>
              <option value='1'>Administrador</option>
              <option value='0'>Comum</option>
            </select>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success btn-cadastrar-usuario">Cadastrar Usuário</button>
      </div>
    </div>
  </div>
</div>

<script type="text/JavaScript">
    $('.btn-cadastrar-usuario').on('click', function(){
    campo = $('#nome-novo-usuario').val() == "" ? 'nome' : 'email';
    if($('#nome-novo-usuario').val() == "" || $('#email-novo-usuario').val() == ""){
        Swal.fire({
            title: 'Atenção!',
            text: 'Para prosseguir é necessário preencher o campo ' + campo + '.',
            icon: 'error',
        });
    } else {
        Swal.fire({
            title: 'Cadastrar Usuário',
            text: 'Deseja cadastrar novo usuário?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
        }).then((result) => {
            if(result.value){
                let novo_usuario = new Array();
                let dados = {'id_empresa': $("#empresa").val(), 'nome': $("#nome-novo-usuario").val(), 'email': $("#email-novo-usuario").val(), 'perfil': $("#perfil-novo-usuario").val()};
                novo_usuario.push(dados);
                $.ajax({
                    url: 'perfil-config.php',
                    type:'post',
                    data: {novo_usuario : novo_usuario},
                    success:function(response){
                        if(response.trim() == 'usuario_existe'){
                            Swal.fire({
                                title: 'Atenção!',
                                text: 'Já existe um cadastro com o e-mail informado.',
                                icon: 'error',
                            });
                        } else {
                            Swal.fire({
                                title: 'Usuário Cadastrado!',
                                text: 'O usuário ' + response + ' foi cadastrado com sucesso.' ,
                                icon: 'success',
                            }).then((result)=> {
                                window.location.reload();
                            });
                        }
                }
              });
            }
          
        });
    }
    });
</script>