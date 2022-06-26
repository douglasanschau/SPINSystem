<!Doctype html>
<html lang='pt-br'>
   <head>
       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel='stylesheet' href='styles/reset.css'>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel='stylesheet' href='styles/style-cadastrese.css'>
       <title> Cadastre-se - Site</title>
   </head>
   <body>
     <header>
         <nav class='nav-principal'>
             <ul>
                 <li><a href='./index.php'>Home</a></li>
                 <li><a href='./planos.php'>Planos</a></li>
                 <li><a href='./contato.php'>Contate-nos</a></li>
             </ul>
             <button class='entrar'>Entrar</button>
         </nav>
     </header>
     <main>
       <section class='section-formulario'>
             <h2>Cadastre-se Gratuitamente Agora Mesmo! </h2>
            <form id='formulario-cadastro' class='formulario-cadastro' action='database/cadastro.php' method='post'>
                <label for='nome-user'>Nome</label>
                <input type='text' name='nome-user' id='nome-user' required>

                <label for='empresa-user'>Empresa</label>
                <input type='text' name='empresa-user' id='empresa-user' required>

                <label for='email-user'>Email</label>
                <input type='email' name='email-user' id='email-user' required>

                <label for='senha-user'>Senha</label>
                <input type='password' name='senha-user' id='senha-user' required>

                <label for='senha2-user'>Repetir Senha</label>
                <input type='password' name='senha2-user' id='senha2-user' required>
                <br>
                <button type='button' class='cadastrar'>Cadastrar</button>
                <br>
                <div class='erro'></div>
            </form>
       </section>

       <section class='section-infos'> 
          <img class='imagem-experimente' src='imgs/experiment.png' alt='Imagem representa as dúvidas, satisfações e insatisfações da relação cliente-empresa.'>

          <p>Durante o período de experimente você tem 10 dias para conhecer as funcionalidades da nossa plataforma.</p>

          <p>Caso tenha alguma dúvida nosso time de suporte ficará a disposição para te auxiliar.</p>

          <p>Nos contate no e-mail: <span class='contato'>suporte@gerardtool.com</span>.</p>
          <p>Ou no telefone: <span class='contato'>(51) 3897-1428.</span>.</p>


       </section> 

     </main>

     <footer class='footer-site'>
          <p>&copy Todos os direitos reservados a Spin System</p>
     </footer>
   </body>

<?php
  session_start();
  if(isset($_SESSION['user-cadastrado'])){
    echo   '<script type="text/JavaScript">
                $(".erro").html("Usuário já cadastrado!");
                $(".erro").fadeIn(700, function(){
                    window.setTimeout(function(){
                        $(".erro").fadeOut();
                    }, 1200);
                });
            </script>';
  };
  session_destroy();
?>

<script type='text/JavaScript'>
    $('.cadastrar').on('click', function(event){
        event.preventDefault();
        if($('#senha-user').val() != $('#senha2-user').val()){
            $('.erro').html('Senhas Diferentes!');
            $(".erro").fadeIn(700, function(){
                window.setTimeout(function(){
                    $('.erro').fadeOut();
                }, 1200);
            });
        } else {
            $('#formulario-cadastro').submit();
        };
    });

    $(".entrar").on('click', function(){
        window.location.href= './entrar.php';
    });
</script>
</html>