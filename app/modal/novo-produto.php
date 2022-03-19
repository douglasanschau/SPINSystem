<div class="modal fade" id="modalNovoProduto" tabindex="-1" role="dialog" aria-labelledby="TituloModalProduto" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalProduto"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='form-cadastro-produto' class='form-group'>
            <input type='hidden' id='empresa' name='empresa' value="<?php echo $_SESSION['user']['empresa'] ?>">
            <input type="hidden" id="id_produto" name="id_produto" value="">
            <label for='nome-novo-produto'>Nome </label>
            <input type='text' class='form-control' name='nome-novo-produto' id='nome-novo-produto'>
            <label for='descricao-produto'>Descrição </label>
            <textarea class='form-control' name='descricao-produto' id='descricao-produto'></textarea>
            <label for='valor-novo-produto'>Valor</label>
            <input class='form-control' name='valor-novo-produto' id='valor-novo-produto'>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-info btn-editar-produto">Editar Produto</button>
        <button type="button" class="btn btn-success btn-novo-produto">Cadastra Produto</button>
      </div>
    </div>
  </div>
</div>

<script type="text/JavaScript">


    $(document).ready(function(){
      $('#valor-novo-produto').mask('000.000.000.000.000,00', {reverse: true});
    });

    $('.btn-novo-produto').on('click', function(){
        Swal.fire({
            title:'Cadastrar Produto!',
            text: 'Cadastrar novo produto ?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
        }).then((result) => {
            if(result.value){
                let dados = {'id_empresa': $('#empresa').val(), 'nome' : $("#nome-novo-produto").val(), 'descricao': $("#descricao-produto").val(), 'valor' : $("#valor-novo-produto").val()}; 
                let novo_produto = new Array();
                novo_produto.push(dados);
                $.ajax({
                    url: 'dados-produtos.php',
                    type: 'post',
                    data: {novo_produto : novo_produto},
                    success:function(response){
                       if(response.trim() == 'produto_cadastrado'){
                        Swal.fire({
                            title:'Produto Cadastrado!',
                            text: 'Produto cadastrado com sucesso!',
                            icon: 'success',
                        }).then((result) => {
                            window.location.reload();
                        });
                       } else {
                        Swal.fire({
                            title:'Atenção!',
                            html: 'Foi identificado um problema ao cadastrar seu produto.<br> Contate nosso time de suporte!',
                            icon: 'error',
                        });
                       }
                    } 
                });
            }
        })
    })

    $('.btn-editar-produto').on('click', function(){
      Swal.fire({
            title:'Editar Produto!',
            text: 'Deseja atualizar dados do produto?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
        }).then((result) => {
           if(result.value){
              let produto = new Array();
              let dados = {'id_empresa': $('#empresa').val(), 'id_produto': $('#id_produto').val(), 'nome' : $("#nome-novo-produto").val(), 'descricao': $("#descricao-produto").val(), 'valor' : $("#valor-novo-produto").val()};
              produto.push(dados);
              console.log(produto);
              $.ajax({
                url:'dados-produtos.php',
                type: 'post',
                data: {produto: produto},
                success:function(response){
                   if(response.trim() == 'produto_editado'){
                    Swal.fire({
                        title:'Produto Editado!',
                        text: 'Produto atualizado com sucesso.',
                        icon: 'success',
                    }).then((result) => {
                      window.location.reload();
                    });
                   } else {
                      Swal.fire({
                        title:'Atenção!',
                        html: 'Produto não encontrado.<br>Contate nosso time de suporte!',
                        icon: 'error',
                      });
                   }
                }
              });
           }
        });
    })
</script>