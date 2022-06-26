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
       <link rel='stylesheet' href='styles/app-negocios02.css'>
       <title> Negócios - Spin System </title>
    </head>

    <?php 
     session_start();
     if(!isset($_SESSION['perfis']['foto'])){
         $_SESSION['perfis']['foto'] = $_SESSION['user']['foto'];
     }
     if(!isset($_SESSION['perfis']['nome'])){
        $_SESSION['perfis']['nome'] = $_SESSION['user']['nome'];
    }
    if(!isset($_SESSION['perfis']['id'])){
        $_SESSION['perfis']['id'] = $_SESSION['user']['id'];
    }
     require_once('database/database-app.php');
    ?>
    <body>

         <header>
             <?php require_once('layouts-fixos/nav-principal.php') ?>
         </header>

         

         <main class='main-app'>
         
            <div class='card'>
                <div class="card-header">
                    <h3 class='card-title'> Painel de Negócios 
                     <?php if(isset($_SESSION['user']['acesso']) && $_SESSION['user']['acesso'] == 1) { ?>
                      <div class='perfis-usuarios'>
                        <button class="btn btn-outline-secondary dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           <img  src="<?= isset($_SESSION['perfis']['foto']) ? $_SESSION['perfis']['foto'] : "" ?>" height="40" width="" style="border-radius:50%;" >
                           <?= isset($_SESSION['perfis']['nome']) ? $_SESSION['perfis']['nome'] : "" ?>
                        </button>
                        <div class="dropdown-menu select-perfis" aria-labelledby="dropdownMenuButton">
                           
                        </div>  
                      </div>
                     <?php } ?>
                    </h3>
                </div>
                <div class='card-body'>
                    <div class='row'>
                        <div class='card-business'>
                            <div class='etapa'>
                                <div class='text-center'>
                                    <h4 class='card-title'>Prospecção</h4>
                                </div>
                            </div>
                            <div class="prospeccao">
                                
                            </div>
                            <div class='add-business' rel='P' >
                                <i style="font-size: 30px; margin: 10px;" class="material-icons">add</i>
                            </div>
                        </div>
                        <div class='card-business'>
                            <div class='etapa'>
                                <div class='text-center'>
                                    <h4 class='card-title'>Demonstração</h4>
                                </div>
                            </div>
                            <div class="demonstracao">
                                
                            </div>
                            <div class='add-business' rel='D'>
                                <i style="font-size: 30px; margin: 10px;" class="material-icons">add</i>
                            </div>
                        </div>
                        <div class='card-business'>
                            <div class='etapa'>
                                <div class='text-center'>
                                    <h4 class='card-title'>Foco</h4>
                                </div>
                            </div>
                            <div class="foco">
                                
                            </div>
                            <div class='add-business' rel='F'>
                                <i style="font-size: 30px; margin: 10px;" class="material-icons">add</i>
                            </div>
                        </div>
                        <div class='card-business'>
                        <div class='etapa'>
                                <div class='text-center'>
                                    <h4 class='card-title'>Fechamento</h4>
                                </div>
                            </div>
                            <div class="fechamento">
                                
                            </div>
                            <div class='add-business' rel='FE'>
                                <i style="font-size: 30px; margin: 10px;" class="material-icons">add</i>
                            </div>
                        </div>
                        <div class='card-business'>
                        <div class='etapa'>
                                <div class='text-center'>
                                    <h4 class='card-title'>Pós Venda</h4>
                                </div>
                            </div>
                            <div class="pos-venda">
                                
                            </div>
                            <div class='add-business' rel='PV'>
                                <i style="font-size: 30px; margin: 10px;" class="material-icons">add</i>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>

        </main>


        <footer>
                <?php  require_once('layouts-fixos/footer.php'); ?>
        </footer>
    </body>

    <?php require_once('modal/novo-negocio.php'); ?>
</html>

<script type="text/JavaScript">
   $(document).ready(function(){
      let id_empresa = <?php echo json_encode($_SESSION['user']['empresa']) ?>;
      negocios(id_empresa);
      perfis(id_empresa);

   });

   function perfis(id_empresa){
       perfis = new Array();
       perfis.push({'id_empresa': id_empresa})
       $.ajax({
         url: 'negocios.php',
         type: 'POST', 
         data: {perfis : perfis},
         dataType:'json',
         success: function(response){
            $('.select-perfis').append(response);
         }
       });
   }
   

   function negocios(id_empresa){
    negocios = new Array();
    negocios.push({'id_empresa': id_empresa})
    $.ajax({
         url: 'negocios.php',
         type: 'POST',
         dataType:'json', 
         data: {negocios : negocios},
         success: function(response){
             console.log(response);
             response.forEach(function(negocio){
                atualizaNegocios(negocio);
             });
         }
    });
   }

   function atualizaNegocios(negocio){
    let valor = negocio.value != null ? numberFormat(negocio.value) : 0;
    $html = `<div class='negocio card'>
               <a href='#' class='acessa-negocio' rel-id='${negocio.id}' rel-company="${negocio.company}" style='text-decoration:none;'>
                    <h5 class='card-title text-dark'>
                        <i class='material-icons' style='font-size:25px; position:relative; top:4px;'>domain</i>
                        ${negocio.company}
                    </h5>
                    <p class='negocio-valor text-success'>
                        <i class='material-icons' style='font-size:25px; position:relative; top:5px;'>attach_money</i>
                         ${valor}
                     </p>
                </a>
            </div>`;

    if(negocio.stage == "P"){etapa = 'prospeccao';}
    if(negocio.stage == "D"){etapa = 'demonstracao';}
    if(negocio.stage == "F"){etapa = 'foco';}
    if(negocio.stage == "FE"){etapa = 'fechamento';}
    if(negocio.stage == "PV"){etapa = 'pos-venda';}

    $(`.${etapa}`).append($html);

   }

   function numberFormat(number){
       parseFloat(number).toFixed(2);
       return number;
   }

   $(document).on('click', '.muda-perfil', function(){
    $.ajax({
         url: 'negocios.php',
         type: 'POST', 
         data: {altera_perfil : $(this).attr('ref-id')},
         success: function(response){
            if(response.trim() == 'sessao_atualizada'){
                window.location.reload();
            }
         }
    });
   });

   $(document).on('click', '.acessa-negocio', function(){
       id = $(this).attr('rel-id');
       company = $(this).attr('rel-company');
       $.ajax({
           url: 'negocios.php',
           type: 'POST',
           data: {id_negocio : id, company : company},
           success: function(response){
              window.location.replace(response);
           }
       });
   })

   $('.add-business').on('click', function(){
       $('#modalNovoNegocio #etapa').val($(this).attr('rel'));  
       $('#modalNovoNegocio #nome-empresa').val('');
       $('#modalNovoNegocio #contato').val('');
       $('#modalNovoNegocio #email-contato').val('');
       $('#modalNovoNegocio #telefone-contato').val('');
       jQuery.noConflict();
       $('#modalNovoNegocio #TituloModalNegocio').html('Novo Negócio');
       $('#modalNovoNegocio').modal('show');
   });


</script>