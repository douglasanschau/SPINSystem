<style>
  #modalValorNegocio input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
  }
</style>
<div class="modal fade" id="modalValorNegocio" tabindex="-1" role="dialog" aria-labelledby="TituloModalValorNegocio" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalValorNegocio">Valor Negócio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_negocio" value="<?php echo $_GET['id']?>">
        <input type="hidden" id="id_empresa" value="<?php echo $_SESSION['user']['empresa']?>">
        <table style="width:100% !important;" id="tabela_produtos" class="table table-hover">
            <thead>
                <th style="width:40%;"> Produto </th>
                <th style="width:10%;"> Quantidade </th>
                <th style="width:15%;"> Valor </th>
                <th style="width:15%;"> Total</th>
                <th style="width:20%;"> Ações </th>
            </thead>
            <tbody style="cursor:pointer;">
                <tr class="novo-produto d-none">
                   <td>
                     <select class="form-control" name="nome-produto" id="nome-produto">
                     </select>
                   </td>
                   <td>
                     <input type="number" class="form-control" min='1' max='100' name="quantidade-produto" id="quantidade-produto">
                   </td>
                   <td>
                      <input type="text" class="form-control" disabled name="preco-produto" id="preco-produto">
                   </td>
                   <td>
                      <input type="text" class="form-control" disabled name="total-produto" id="total-produto">
                   </td>
                   <td>
                    <button class="btn btn-sm btn-success btn-novo-produto" title="Salvar Produto">
                        <i class="material-icons">check</i>
                    </button>
                    <button class="btn btn-sm btn-default btn-cancelar" title="Voltar">
                        <i class="material-icons">keyboard_return</i>
                    </button>
                   </td>
                </tr>
                <tfooter>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="float-right mr-4">
                      <button title="Novo Produto" data-toogle="tooltip" class="btn btn-sm btn-info add-produtos">
                        <i class="material-icons">add_shopping_cart</i>
                      </button>
                    </td>
                  </tr>
                </tfooter>
            </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/JavaScript">
     $(document).ready(function($){

       let id = $("#modalValorNegocio #id_negocio").val();
       let produtos = new Array();
       produtos.push({'id_empresa': $("#modalValorNegocio #id_empresa").val()});

       $.ajax({
           url: 'negocio-config.php',
           type: 'GET', 
           dataType: 'json',
           data: {id_company : id},
           success:function(produto){
             let valor = 0;
             let produtos = new Array();
             if(produto != 0){
              produto.forEach(function(p){
                 produtosNegocio(p);
              })
             }
           }
       })
        
       $.ajax({
          url: 'dados-produtos.php',
          type: 'POST',
          dataType: 'json',
          data: {produtos:produtos},
          success:function(response){
             selectProdutos(response);
          }
       });

       $(document).on('focus', '.money_mask',function(){
        $('.money_mask').mask('000.000.000,00',{reverse:true});
       });


     });


     function selectProdutos(produtos){
        let html = "";
        produtos.forEach(function(produto){
           html += `<option rel='${produto.value}' value="${produto.id}">${produto.name}</option>"`; 
        });
        $("#modalValorNegocio #nome-produto").append(html);
     }

  
     function produtosNegocio(produto){
          let preco = 0;
          if(produto.value != undefined){
             preco = produto.quantity * produto.value.toFixed(2);
          }
          html = `<tr class="produto-${produto.id}">
                     <td rel='${produto.id}'>${produto.product}</td>
                     <td rel='${produto.id}' class="text-center">${produto.quantity}</td>
                     <td rel='${produto.id}' >R$${produto.value}</td>
                     <td rel='${produto.id}' >R$${preco}</td>
                     <td rel='${produto.id}' class="btn-actions">
                      <button class="btn btn-sm btn-info btn-edit-produto" title="Editar Produto" rel='${produto.id}' rel-product="${produto.id_product}">
                              <i class="material-icons">edit</i>
                      </button>
                      <button class="btn btn-sm btn-danger btn-delete"  title="Excluir Produto" rel="${produto.id}" rel-product="${produto.id_product}">
                              <i class="material-icons">delete</i>
                      </button>
                    <td>
                   </tr>`;
          $("#tabela_produtos .novo-produto").before(html);
     }

     $(document).on('click', '.btn-edit-produto', function(){
       produto  = $(`.produto-${$(this).attr('rel')} td:nth-child(1)`).text().trim();
       quantidade = $(`.produto-${$(this).attr('rel')} td:nth-child(2)`).text().trim();
       preco = $(`.produto-${$(this).attr('rel')} td:nth-child(3)`).text().trim();
       total = $(`.produto-${$(this).attr('rel')} td:nth-child(4)`).text().trim();
       select = $(".novo-produto td:nth-child(1)").html();
       $(`.produto-${$(this).attr('rel')} td:nth-child(1)`).html(select);
       $(`.produto-${$(this).attr('rel')} #nome-produto`).val($(`option:contains(${produto})`).val());
       $(`.produto-${$(this).attr('rel')} td:nth-child(2)`).html(`<input type="number" min='1' max='100' class="form-control" id="quantidade-produto" name="quantidade-produto" value="${quantidade}">`);
       $(`.produto-${$(this).attr('rel')} td:nth-child(3)`).html(`<input type="text" class="form-control" disabled id="preco-produto" name="total-produto" value="${preco}">`);
       $(`.produto-${$(this).attr('rel')} td:nth-child(4)`).html(`<input type="text" class="form-control" disabled id="total-produto" name="total-produto" value="${total}">`);
       html = `<div class="btn-actions">
                  <button class="btn btn-sm btn-success btn-atualizar-produto" title="Salvar Produto" rel="${$(this).attr('rel')}" rel-product="${$(this).attr('rel-product')}">
                      <i class="material-icons">check</i>
                  </button>
                  <button class="btn btn-sm btn-default btn-voltar" title="Voltar" rel="${$(this).attr('rel')}" rel-product="${$(this).attr('rel-product')}">
                      <i class="material-icons">keyboard_return</i>
                  </button>
                </div>`;
       $(`.produto-${$(this).attr('rel')} .btn-actions`).html(html);
     });



     $(document).on('click','.btn-voltar', function(){
      produto = $(`.produto-${$(this).attr('rel')} #nome-produto option:selected`).text().trim();
      quantidade = $(`.produto-${$(this).attr('rel')} #quantidade-produto`).val();
      preco = $(`.produto-${$(this).attr('rel')} #preco-produto`).val();
      total = $(`.produto-${$(this).attr('rel')} #total-produto`).val();
      $(`.produto-${$(this).attr('rel')} td:nth-child(1)`).html(produto);
      $(`.produto-${$(this).attr('rel')} td:nth-child(2)`).html(quantidade);
      $(`.produto-${$(this).attr('rel')} td:nth-child(3)`).html('R$'+preco.replace('R$', ""));
      $(`.produto-${$(this).attr('rel')} td:nth-child(4)`).html('R$'+total.replace('R$', ""));
      html = `  <button class="btn btn-sm btn-info btn-edit-produto"  title="Editar Produto" rel="${$(this).attr('rel')}" rel-product="${$(this).attr('rel-product')}">
                            <i class="material-icons">edit</i>
                    </button>
                    <button class="btn btn-sm btn-danger btn-delete"  title="Excluir Produto" rel="${$(this).attr('rel')}" rel-product="${$(this).attr('rel-product')}">
                            <i class="material-icons">delete</i>
                    </button>`;
        $(`.produto-${$(this).attr('rel')} .btn-actions`).html(html);
     });

     $('.add-produtos').on('click', function(){
        $(this).addClass('d-none');
        price = $(".novo-produto #nome-produto option:selected").attr('rel');
        $(".novo-produto #preco-produto").val(numberFormat(parseFloat(price)).toFixed(2));
        $('.novo-produto').removeClass('d-none');
     });

     $(document).on('change', '#nome-produto', function(){
        id = $(this).parent().attr("rel");
        $("#quantidade-produto").val('');
        if(id != undefined){
          price = $(`.produto-${id} #nome-produto option:selected`).attr('rel');
          $(`.produto-${id} #preco-produto`).val("R$" + numberFormat(parseFloat(price)).toFixed(2));
          $(`.produto-${id} #total-produto`).val("R$" + numberFormat(parseFloat(price)).toFixed(2));
        } else {
          price = $(".novo-produto #nome-produto option:selected").attr('rel');
          $(".novo-produto #preco-produto").val(numberFormat(parseFloat(price)).toFixed(2));
          $(".novo-produto #total-produto").val(numberFormat(parseFloat(price)).toFixed(2));
        }
     });

     $(document).on('keyup', '#quantidade-produto', function(){
      id = $(this).parent().attr("rel");
      if(id != undefined){
          quantity = parseInt($(`.produto-${id} #quantidade-produto`).val());
          if(isFinite(quantity)){
            price = $(`.produto-${id} #preco-produto`).val().replace("R$", "");
            price = quantity * parseFloat(price);
            $(`.produto-${id} #total-produto`).val("R$" + numberFormat(price).toFixed(2));
          } else {
            $(`.produto-${id} #total-produto`).val("");
          }
      } else {
          quantity = parseInt($(this).val());
          if(isFinite(quantity)){
            price = $(`.novo-produto #preco-produto`).val().replace("R$", "");
            price = quantity * parseFloat(price);
            $(".novo-produto #total-produto").val(numberFormat(parseFloat(price)).toFixed(2));
          } else {
            $(".novo-produto #total-produto").val("");
          }
        }
     });

     $('.btn-cancelar').on('click', function(){
       $('.novo-produto').addClass('d-none');
       $('.add-produtos').removeClass('d-none');
     })

     $('.btn-novo-produto').on('click', function(){
       dados = {'id_produto' : $('.novo-produto #nome-produto option:selected').val(), 'id_empresa': $('#modalValorNegocio #id_empresa').val(),
                'preco': $(`.novo-produto #total-produto`).val(), 'quantidade': $(`.novo-produto #quantidade-produto`).val()};
       $.ajax({
          url: 'negocio-config.php',
          type: 'POST',
          dataType:'json',
          data: {novo_produto: dados},
          success:function(response){
            if(response.success){
                Swal.fire({
                  title: 'Produto Cadastrado!',
                  text: 'Produto cadastrado com sucesso',
                  icon: 'success'
                });
              valor = numberFormat(response.value[0]).toFixed(2);
              $('.valor-produtos').html(valor);
              produtosNegocio(response.product[0]);
            } else if(response.atualizar){
                window.location.reload();
            } else {
              Swal.fire({
                  title: 'Atenção!',
                  html: 'Não possível cadastrar o produto. <br> Favor, contatar o time de suporte!',
                  icon: 'erro'
              });
            }
          }
       });
     });

     $(document).on('click', '.btn-atualizar-produto', function(){
        id = $(this).attr('rel');
        dados = {'id_produto': $(`.produto-${id} #nome-produto`).val(), 'quantidade': $(`.produto-${id} #quantidade-produto`).val(),
                'preco' :  $(`.produto-${id} #total-produto`).val(), 'id': id, 'id_empresa': $('#modalValorNegocio #id_empresa').val()};
        $.ajax({
           url: "negocio-config.php",
           type: "POST",
           data: {edita_produto: dados},
           dataType: 'json',
           success:function(response){
             if(response.success){
               Swal.fire({
                  title: 'Produto Editado!',
                  text: 'Produto editado com sucesso.',
                  icon: 'success'
               });
               valor = numberFormat(response.value[0]).toFixed(2);
               $('.valor-produtos').html(valor);
               $('.btn-voltar').trigger('click');
             } else {
              Swal.fire({
                  title: 'Atenção!',
                  html: 'Não possível cadastrar o produto. <br> Favor, contatar o time de suporte!',
                  icon: 'erro'
              });
             }
           }
      });  
     });

     $(document).on('click', '.btn-delete', function(){
       id = $(this).attr('rel');
       $.ajax({
         url: 'negocio-config.php',
         type: 'POST', 
         data: {delete : id, id_empresa : $('#modalValorNegocio #id_empresa').val()},
         dataType:'json',
         success:function(response){
            if(response.success){
              Swal.fire({
                  title: 'Produto Excluído!',
                  text: 'Produto excluído com sucesso.',
                  icon: 'success'
               });
               $(`.produto-${id}`).remove();
               valor = numberFormat(response.value[0]).toFixed(2);
               $('.valor-produtos').html(valor);
            }
         }
       })
     });
</script>