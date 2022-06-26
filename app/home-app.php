<!DOCTYPE html>
<html>
    <head>

       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>       <link rel='stylesheet' href='styles/reset.css'>
       <title> Home - Spin System </title>
       <link rel='stylesheet' href='styles/app-home01.css'>


    </head>

    <?php 
     session_start();
    ?>
    <body>

         <header>
             <?php require_once('layouts-fixos/nav-principal.php') ?>
         </header>

         

         <main class='main-app'>

             <section class='dashboards'>
                <div class='row'>

                   <div class='col-md-4'>
                       <div class='card card-bordered cards-dash'>
                        <h5 class='card-title text-success'>
                        <i class='material-icons icons-dash'>monetization_on</i>
                                Negócios Ativos
                        </h5>
                        <div class='card-body text-success'>
                            <b class='negocios-ativos'></b>
                        </div>
                       </div>
                   </div>

                   <div class='col-md-4'>
                       <div class='card card-bordered cards-dash'>
                        <h5 class='card-title text-info'>
                        <i class='material-icons icons-dash '>person_add</i>
                          Negócios Abertos
                        </h5>
                        <div class='card-body text-info'>
                            <b class='negocios-abertos'></b>
                        </div>
                       </div>
                   </div>

                   <div class='col-md-4'>
                       <div class='card card-bordered cards-dash'>
                        <h5 class='card-title text-danger'>
                        <i class='material-icons icons-dash'>sentiment_very_dissatisfied</i>
                              Negócios Perdidos
                        </h5>
                        <div class='card-body text-danger'>
                            <b class='negocios-perdidos'></b>
                        </div>
                       </div>
                   </div>

                </div>

            </section>

            <section class='infos-home'>

                 <div class='row'>
                     <div class='coluna-atividades border'>
                        <h3 style='margin: 3% 20%;'>ATIVIDADES DO DIA</h3>

                        <h5 class='text-info'> 
                        <i class='material-icons icons-info'>phone_forwarded</i>
                          LIGAÇÕES 
                        </h5>

                        <div class='atividades atividades-ligacao'> 
                         
                        </div>

                        <h5 class='text-secondary'> 
                        <i class='material-icons icons-info'>personal_video</i>
                          DEMONSTRAÇÕES
                        </h5>
                        <div class='atividades atividades-demo'> 
                        
                        </div>

                        <h5 class='text-warning'> 
                        <i class='material-icons icons-info'>mail</i>
                          EMAILS
                        </h5>
                        <div class='atividades atividades-emails'> 
                  
                        </div>
                     </div>

                     <div class='coluna-atividades border'>
                        <h3 style='margin: 3% 6%; text-transform: uppercase;'>Indicadores de
                          <?php 
                            //Muda Localização Para Imprimir Mês Atual
                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                            date_default_timezone_set('America/Sao_Paulo');
                            $data = strftime('%#B', strtotime('today'));
                            //Imprimi valor
                            echo utf8_encode($data); 
                          ?> 
                        </h3>

                        <h5 class='text-dark'> 
                        <i class='material-icons icons-info'>work</i>
                          PÓS VENDA
                        </h5>
                        <div class='atividades atividades-pos-venda'> 
                          
                        </div>

                        <h5 class='text-success'> 
                        <i class='material-icons icons-info'>attach_money</i>
                          FECHAMENTOS
                        </h5>
                        <div class='atividades atividades-fechamentos'> 
                        
                        </div>

                        <h5 class='text-danger'> 
                        <i class='material-icons icons-info'>remove_circle</i>
                          NEGÓCIOS PERDIDOS
                        </h5>
                        <div class='atividades atividades-perdidos'> 
                                                
                         
                        </div>
                     </div>
                     </div>
                </div>

           </section>

        </main>

        
        <footer>
                <?php  require_once('layouts-fixos/footer.php'); ?>
        </footer>
         
    </body>
</html>

<script type='text/JavaScript'>
    $(document).ready(function(){
       let id_empresa = "<?php echo $_SESSION['user']['empresa'] ?>" ;
       dashboardsHome(id_empresa);
    });

    function dashboardsHome(id_empresa){
      $.ajax({
        url: 'http://localhost/faculdade/seminario/app/dados_dashboard.php',
        type: 'get',
        data: {id_empresa: id_empresa},
        dataType:'json',
        success: function(response){
          if(response == 'not_found'){
           console.log("Não encontrado");
          } else {
            cardsGerais(response.active, response.open, response.lost);
            cardsAtividades(response.names, response.calls, response.demos, response.emails);
            cardIndicadores(response.names, response.after_sales, response.closure, response.loss);
          }
        }
      })
    }


    function cardsGerais(active, open, lost){
        $('.negocios-ativos').html(active);
        $('.negocios-abertos').html(open);
        $('.negocios-perdidos').html(lost);
    }


    function cardsAtividades(names, calls, demos, emails){
       html_calls = "";
       html_demos = "";
       html_emails = "";

       names.forEach(function(name){
           width = (calls[name.id].calls * 100 / 20).toFixed(2);
           html_calls += `<h5> ${name.name} </h5>
                          <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${calls[name.id].calls}</div>
                        </div>`;

           width = (demos[name.id].demonstracao * 100 / 7).toFixed(2);
           html_demos += `<h5> ${name.name} </h5>
                          <div class="progress">
                            <div class="progress-bar bg-secondary" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${demos[name.id].demonstracao}</div>
                          </div>`;

            width = (emails[name.id].mail * 100 / 10).toFixed(2);
            html_emails += `<h5> ${name.name} </h5>
                          <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${emails[name.id].mail}</div>
                          </div>`;
       });

       $('.atividades-ligacao').html(html_calls);
       $('.atividades-demo').html(html_demos);
       $('.atividades-emails').html(html_emails);

    }


    function cardIndicadores(names, after_sales, closure, lost) {
      html_pos_venda = "";
      html_fechamentos = "";
      html_perdidos = "";
      
      names.forEach(function(name){
        width = (after_sales[name.id].contact * 100 / 5).toFixed(2);
           html_pos_venda += `<h5> ${name.name} </h5>
                          <div class="progress">
                            <div class="progress-bar bg-dark" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${after_sales[name.id].contact}</div>
                          </div>`;

           width = (closure[name.id].closure_amount * 100 / 5).toFixed(2);
           html_fechamentos += `<h5> ${name.name} </h5>
                              <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${closure[name.id].closure_amount}</div>
                              </div>`;

           width = (lost[name.id].lost_amount * 100 / 5).toFixed(2);
           html_perdidos += `<h5> ${name.name} </h5>
                              <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar"  aria-valuenow="25" style='width:${width}%;'; aria-valuemin="0" aria-valuemax="100%">${lost[name.id].lost_amount}</div>
                              </div>`;
      });



      $('.atividades-pos-venda').html(html_pos_venda);
      $('.atividades-fechamentos').html(html_fechamentos);
      $('.atividades-perdidos').html(html_perdidos);

    }


</script>
