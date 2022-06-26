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
       <link rel='stylesheet' href='styles/app-produtos.css'>
       <title> Produtos- Spin System </title>
    </head>

    <?php 
     session_start();
    ?>
    <body>

         <header>
             <?php require_once('layouts-fixos/nav-principal.php') ?>
         </header>

         

         <main class='main-app'>

           <div class='card'>
              <div class='card card-secondary'>
                  <h5 style="padding-left:25px;" class='card-header'>Cadastro de Produtos</h5>
                  <div class='card-body'>
                    <table  class='table table-hover' style='width:100%' id='tabela-produtos'>
                        <thead>
                            <tr>
                                <th style='width:35%;'>Produto</th>
                                <th style='width:50%;'>Descrição</th>
                                <th style='width:15%;'>Preço</th>
                                <th style='width:20%;'>Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr class='card-footer'>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td  class='float-right mt-4'>
                                    <button  style='position:relative; right: 10px; bottom: 12px;' colspan='12'  class='btn btn-success btn-cadastrar-produto'>Cadastrar Produto</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                  </div>
              </div>
           </div>
    
        </main>


        <footer>
                <?php  require_once('layouts-fixos/footer.php'); ?>
        </footer>
    </body>
    <?php require_once('modal/novo-produto.php'); ?>
</html>

<script type='text/JavaScript'>
    $(document).ready(function(){
        produtosRegistrados(<?php echo $_SESSION['user']['empresa'] ?>);
    });

    $('.btn-cadastrar-produto').on('click', function(){
           jQuery.noConflict();
           $("#modalNovoProduto #TituloModalProduto").html("Cadastrar Novo Produto");
           $('#modalNovoProduto #nome-novo-produto').val("");
           $('#modalNovoProduto #descricao-produto').val("");
           $('#modalNovoProduto #valor-novo-produto').val("");
           $('#modalNovoProduto .btn-editar-produto').hide();
           $('#modalNovoProduto .btn-novo-produto').show();
           $("#modalNovoProduto").modal('show');
    });

    function produtosRegistrados(id_empresa){
       let produtos = new Array();
       produtos.push({'id_empresa': id_empresa});
       $.ajax({
         url: 'dados-produtos.php',
         type: 'post', 
         dataType: 'json',
         data: {produtos : produtos},
         success: function(response){
           response.forEach(function(r){
             listaProduto(r);
           });
         }
       });
    }

    function listaProduto(produto){
        preco = produto.value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        let html = `<tr class='produto-${produto.id}'>
                      <td>${produto.name}</td>
                      <td>${produto.description}</td>
                      <td>${preco}</td>
                      <td>
                        <button data-tool='tooltip' title='Editar' rel-produto='${produto.id}' class='btn btn-info editar-produto'>
                           <i class='material-icons'>edit</i>
                        </button>
                        <button data-tool='tooltip' title='Excluir' rel-produto='${produto.id}' class='btn btn-danger excluir-produto'>
                           <i class='material-icons'>clear</i>
                        </button>
                      </td>
                    </tr>`;
        $('#tabela-produtos').append(html);
    }

    $(document).on('click','.editar-produto', function(){
        jQuery.noConflict();
        $("#modalNovoProduto #TituloModalProduto").html("Editar Produto");
        $('#modalNovoProduto #nome-novo-produto').val($(".produto-" + $(this).attr('rel-produto') + " td:nth-child(1)").text());
        $('#modalNovoProduto #descricao-produto').val($(".produto-" + $(this).attr('rel-produto') + " td:nth-child(2)").text());
        preco = $(".produto-" + $(this).attr('rel-produto') + " td:nth-child(3)").text();
        $('#modalNovoProduto #valor-novo-produto').val(preco.replace('R$', ""));
        $('#modalNovoProduto #id_produto').val($(this).attr('rel-produto'));
        $('#modalNovoProduto .btn-novo-produto').hide();
        $('#modalNovoProduto .btn-editar-produto').show();
        $("#modalNovoProduto").modal('show');
    });

    $(document).on('click','.excluir-produto', function(){
        Swal.fire({
            title: 'Atenção!',
            text: 'Deseja excluir o produto ' + $('.produto-'+$(this).attr('rel-produto')+ ' td:nth-child(1)').text() + '?',
            icon: 'question',
            showCancelButton:true,
            cancelButtonText:'Não',
            confirmButtonText:'Sim!',
            confirmButtonColor: '#5cb85c',
            cancelButtonColor: '#d9534f',
        }).then((result) => {
           if(result.value){
               linha = $('.produto-'+$(this).attr('rel-produto'));
               $.ajax({
                   url: 'dados-produtos.php',
                   type: 'post',
                   data: {excluir_produto : $(this).attr('rel-produto')},
                   success:function(response){
                     if(response.trim() == 'produto_excluido'){
                        Swal.fire({
                            title: 'Produto Excluído!',
                            text: 'Produto excluído com sucesso.',
                            icon: 'success',                           
                        });
                        linha.remove();
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
    });
  
  
</script>
