<div class="modal fade" id="modalAtividades" tabindex="-1" role="dialog" aria-labelledby="TituloModalAtividades" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalAtividades"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form-nova-atividade' class='form-group'>
            <input type="hidden" name="id_atividade" value="">
            <input type="hidden" name="id-negocio" value="<?php echo $_GET['id']?>">
            <div class="row form-atividades">
                <div class="col-md-6">
                <label> Atividade </label>
                    <select class="form-control" name="tipo-atividade" id="tipo-atividade">
                        <option value="C">Ligação</option>
                        <option value="E">E-mail</option>
                        <option value="D">Demonstração</option>
                        <option value="P">Pós-Venda</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label> Data da Atividade </label>
                    <input type="date" name="data-atividade" id="data-atividade" class="form-control">  
                </div>
                <div class="col-md-12">
                    <label> Descrição </label>
                    <textarea class="form-control" name="desc-atividade" id="desc-atividade" rows='3'></textarea>  
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-success btn-registra-atividade">Cadastra Negócio</button>
      </div>
    </div>
  </div>
</div>

<script type="text/JavaScript">
   $('.btn-registra-atividade').on('click', function(){
     atividade = $("#form-nova-atividade").serialize();
     $.ajax({
        url: 'negocio-config.php',
        type: 'post', 
        data: {atividade: decodeURIComponent(atividade)},
        success: function(response){
          console.log(response);
          if(response.trim() == "atividade_atualizada"){
            Swal.fire({
              title: "Atividade Registrada!", 
              text: "Atividade registrada com sucesso!",
              icon: 'success',
            }).then((result) => {
              window.location.reload();
            });
          } else {
            Swal.fire({
              title: "Erro", 
              html: "Algo inesperado aconteceu. <br> Favor, contate nosso time de suporte!",
              icon: 'error',
            });
          }
        }        
     });
   });
</script>