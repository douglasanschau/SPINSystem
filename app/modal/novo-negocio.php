<div class="modal fade" id="modalNovoNegocio" tabindex="-1" role="dialog" aria-labelledby="TituloModalNegocio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalNegocio"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form-cadastro-negocio' class='form-group'>
            <input type='hidden' id='id_empresa' name='id_empresa' value="<?php echo $_SESSION['user']['empresa'] ?>">
            <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['user']['id'] ?>">
            <input type="hidden" id="etapa" name="etapa" value="">
            <label for='nome-empresa'>Empresa </label>
            <input type='text' class='form-control' name='nome-empresa' id='nome-empresa'>
            <label for='contato'>Contato </label>
            <input type="text" class='form-control' name='contato' id='contato'>
            <label for='email-contato'>E-mail Contato</label>
            <input class='form-control' name='email-contato' id='email-contato'>
            <label for='telefone-contato'>Telefone Contato</label>
            <input class='form-control' name='telefone-contato' id='telefone-contato'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success btn-novo-negocio">Cadastra Negócio</button>
      </div>
    </div>
  </div>
</div>

<script type="text/JavaScript">


    $('#telefone-contato').mask('(00) 00000-0000', {reverse:false});

    $('.btn-novo-negocio').on('click', function(){
       if($('#nome-empresa').val() == "" || $('#contato').val() == ""){
           campo = $('#nome-empresa').val() == "" ? "empresa" : 'contato';
            Swal.fire({
            title: 'Atenção!',
            text: 'Para prosseguir preencha o campo ' + campo + '.' ,
            icon: 'error',
           });
        } else {
            Swal.fire({
                title: 'Cadastrar Negócio!',
                text: 'Deseja cadastrar novo negócio?',
                icon: 'question',
                showCancelButton: true,
                cancelButtonText: "Não",
                confirmButtonText: "Sim",
                confirmButtonColor: '#5cb85c',
                cancelButtonColor: '#d9534f',
        }).then((result) => {
            if(result.value){
                let formulario_negocio = new Array();
                let dados  = {'id_empresa': $('#id_empresa').val(), 'id_user': $("#id_user").val(), 'etapa': $('#etapa').val(), 'nome-empresa' : $('#nome-empresa').val(), 
                              'contato': $('#contato').val(), 'email-contato': $('#email-contato').val(), 'telefone-contato': $('#telefone-contato').val()};
                formulario_negocio.push(dados);
                console.log(formulario_negocio);
                $.ajax({
                   url: 'negocios.php',
                   type: 'post',
                   data: {novo_negocio : formulario_negocio},
                   success: function(response){
                     window.location.replace(response);
                   }
                });
            }
        });
       }
       
    });


</script>