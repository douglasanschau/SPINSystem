<!DOCTYPE html>
<?php 
     session_start();
  
?>
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
       <link rel='stylesheet' href='../assets/css/app/reset.css'>
       <link rel='stylesheet' href='../assets/css/app/negocio.css'>
       <title> 
           <?php 
           if(isset($_SESSION['negocio']['nome'])){
                echo $_SESSION['negocio']['nome'];
           }  else {
                echo "Negócio ({$_GET['id']})";
           }
           ?> 
        </title>
    </head>

    
    <body>

         <header>
             <?php require_once('layouts-fixos/nav-principal.php');?>
         </header>

         

         <main class='main-app'>
          <div class="negocio-info">
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-outline-dark btn-status-negocio btn-dark dropdown-toggle"  type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            NEGÓCIO EM ABERTO
                        </button>
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                            <a href="#" class="dropdown-item status-negocio d-none" rel='A'>EM ABERTO</a>
                            <a href="#" class="dropdown-item status-negocio" rel='G'>GANHO</a>
                            <a href="#" class="dropdown-item status-negocio" rel='P'>PERDIDO</a>
                        </div>
                    </div>
                </div>
                <div class='row'>
                <div class='col-md-4'>
                    <div class="dados-empresa">

                        <div class='card card-dados'>
                            <div class="card-header">
                                <div class="icon-empresa">
                                    <i class="material-icons icon-box">account_balance</i> 
                                </div>
                                <h4 class="card-title titulo">
                                    Negócio 
                                </h4>
                                <h6 class='valor-negocio'>
                                    <i class="material-icons" style="font-size:25px; position:relative; top:5px;">monetization_on</i>
                                    <span class='valor-produtos'></span>   
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="dados">
                                    <label for="nome-empresa">Empresa</label>
                                    <input type="text" class='form-control' maxlength="255"  id='nome-empresa' name='nome-empresa' value="">
                                    <label for="razao-social">Razão Social</label>
                                    <input type="text" class='form-control' maxlength="255" id='razao-social' name='razao-social' value="">
                                    <label for="cnpj-empresa">CNPJ</label>
                                    <input type="text" class='form-control'  id='cnpj-empresa' name='cnpj-empresa' value="">
                                </div>
                            </div>
                        </div>

                        <div class='card card-dados'>
                            <div class="card-header">
                                <div class="icon-empresa">
                                    <i class="material-icons icon-box">person</i> 
                                </div>
                                <h4 class="card-title titulo">
                                Contato
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="dados">
                                    <label for="nome-contato">Nome</label>
                                    <input type="text" class='form-control' id='nome-contato' name='nome-contato' value="">
                                    <label for="email-contato">E-mail</label>
                                    <input type="text" class='form-control' id='email-contato' name='email-contato' value="">
                                    <label for="telefone-contato">Telefone</label>
                                    <input type="text" class='form-control' id='telefone-contato' name='telefone-contato' value="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-8">

                        <div class="card card-dados">
                            <div class="barra-etapa">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <h6 class="titulo">Prospeccão</h6>
                                        <div class="progress" rel-etapa='P'>
                                                <div class="progress-bar inactive P D F FE PV" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="titulo">Demonstração</h6>
                                        <div class="progress" rel-etapa='D'>
                                            <div class="progress-bar inactive D F FE PV"   role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="titulo">Foco</h6>
                                        <div class="progress" rel-etapa='F'>
                                            <div class="progress-bar inactive F FE PV" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="titulo">Fechamento</h6>
                                        <div class="progress" rel-etapa='FE'>
                                            <div class="progress-bar inactive FE PV"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <h6 class="titulo">Pós-Venda</h6>
                                        <div class="progress" rel-etapa='PV'>
                                            <div class="progress-bar inactive PV"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                            </div>
                         
                        </div>

                        <div class="card card-dados">

                            <div class='atividades'>
                                <div class="row">
                                    <div class="col-md-8 ml-4">
                                        <h5>Atividades Registradas</h5>
                                    </div>
                                    <div class="col-md-3 text-right text-info">
                                        <small style="cursor:pointer;" class='cadastrar-atividade'>
                                            <i class="material-icons" style="font-size:15px; position:relative; top: 3px;">add_circle</i>
                                            Adicionar Atividade
                                        </small>
                                    </div>
                                </div>

                                <div class="atividades-cadastradas">

                         

                                


                                </div>

                            </div>

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
     <?php 
        require_once('modal/atividade.php');
        require_once('modal/valor-negocio.php');
     ?>
</html>

<script type="text/JavaScript">
    $(document).ready(function() {
        id_negocio = <?= $_GET['id'] ?>;
        infosNegocio(id_negocio);
    })

    $('.barra-etapa .progress').hover( function(){
            etapa = $(this).attr('rel-etapa');
             $(`.${etapa}`).css('background-color', '#3A3A97');
             $(`.${etapa}`).css('width', '100%');
             $(`.${etapa}`).css('opacity', '0.4');
    }, function(){
            $(`.${etapa}`).css('opacity', '1.0');
            $(".inactive").css('width', '0%');
    });


    $("#cnpj-empresa").mask('000.000.000.0000/00', {reverse:false});
    $("#telefone-contato").mask('(00) 00000-0000', {reverse:false});


    function numberFormat(number){
       number.toLocaleString('pt-BR');
       return number;
    }

    $('.status-negocio').on('click', function(){
        status = $(this).attr('rel');
        texto = $(this).text();
        $('.status-negocio').removeClass('d-none');
        $(this).addClass('d-none');
        $('.btn-status-negocio').html(`NEGÓCIO ${texto}`);
    
    });

    function infosNegocio(id){
        $.ajax({
          url: 'negocio-config.php',
          type: 'POST', 
          data: {id: id},
          dataType: 'json',
          success: function(response){
            dadosNegocio(response.business[0]);
            $(".atividades-cadastradas").html(response.activities);
          }
        });
    }

    function dadosNegocio(negocio){
       $('#nome-empresa').val(negocio.trade_name);
       $('#razao-social').val(negocio.company);
       $('#cnpj-empresa').val(negocio.cnpj);
       $('#nome-contato').val(negocio.contact);
       $('#email-contato').val(negocio.email);
       $('#telefone-contato').val(negocio.phone);
       $(`.${negocio.stage}`).css('background-color', '#3A3A97');
       $(`.${negocio.stage}`).css('width', '100%');
       $(`.${negocio.stage}`).removeClass('inactive');
       $(`.${negocio.stage}`).addClass('active');
       if(negocio.lost == 1){
         $(".valor-negocio").addClass('text-danger');
       } else{
         $(".valor-negocio").addClass('text-success');
       }
       if(negocio.value != undefined){
        $('.valor-produtos').html(numberFormat(negocio.value));
       }
    }

    $('.valor-negocio').on('click', function(){
      jQuery.noConflict();
      $('#modalValorNegocio').modal('show');
    })


   $('.progress').on('click', function(){
     nova_etapa = $(this).attr('rel-etapa');
     $.ajax({
       url: 'negocio-config.php',
       type: 'POST',
       data: {etapa : nova_etapa, id_negocio: id_negocio}, 
       success: function(){
           $('.progress-bar').addClass('inactive');
           $(`.${nova_etapa}`).removeClass('inactive');
           $(`.${nova_etapa}`).addClass('active');
           $('.progress-bar').css('width', '0%');
           $(`.${nova_etapa}`).css('width', '100%'); 
       }
     });
   });

   $('.cadastrar-atividade').on('click', function(){
      $('#modalAtividades h5').html('Registrar Atividade');
      $('#modalAtividades #tipo-atividade').val("");
      $("#modalAtividades #data-atividade").val("");
      $("#modalAtividades #desc-atividade").val("");
      $("#modalAtividades .btn-registra-atividade").html('Cadastrar Negócio')
      jQuery.noConflict();
      $('#modalAtividades').modal('show');
   });

   $(document).on('click', '.atividade', function(){
     let id_atividade = $(this).attr('rel');
     $('#modalAtividades h5').html('Editar Atividade');
     $('#modalAtividades input[name="id_atividade"]').val(id_atividade);
     $.ajax({
       url: 'negocio-config.php',
       type:'GET',
       dataType: 'json',
       data: {id_atividade: id_atividade},
       success: function(response){
         if(response[0]){
            $('#modalAtividades #tipo-atividade').val(response[0].activity);
            $("#modalAtividades #data-atividade").val(response[0].date);
            $("#modalAtividades #desc-atividade").val(response[0].description);
            $("#modalAtividades .btn-registra-atividade").html('Editar Negócio')
            jQuery.noConflict();
            $("#modalAtividades").modal('show');
         } else {
             Swal.fire({
                 title: "Erro!",
                 text: "Atividade não encontrada.",
                 icon: "error",
             })
         }
       }
     });
   });

    
</script>