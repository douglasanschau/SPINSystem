<!Doctype html>
<html lang='pt-br'>
   <head>
       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel='stylesheet' href='styles/reset.css'>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel='stylesheet' href='styles/style-entrar.css'>
       <title> Login - Site</title>
   </head>
   <body>
     <header>
         <nav class='nav-principal'>
             <ul>
                <li><a href='./index.php'>Home</a></li>
                <li><a href='./planos.php'>Planos</a></li>
                <li><a href='./contato.php'>Contate-nos</a></li>
             </ul>
             <button class='cadastrese'>Cadastre-se</button>
         </nav>
     </header>

     <main>

        <section class='section-login'>
            <h5>Login</h5>
            <form id='formulario-login' class='formulario-login' action='database/login.php' method='post'>
                <label for='email-login'>Email</label>
                <input type='email' name='email-login' id='email-login' required>

                <label for='senha-login'>Senha</label>
                <input type='password' name='senha-login' id='senha-login' required>

                <button type='button' class='login'>Entrar</button>
                <button type='button' class='esqueci-senha'>Esqueceu Senha?</button>
                <br>
                <div class='sucesso'></div>
                <div class='erro'></div>
            </form>
        </section>  

        <section class='section-nova-senha'>
             <h5>Esqueceu sua senha?</h5>
            <form id='formulario-nova-senha' class='formulario-login' action='database/login.php' method='post'>
                <label for='email-senha'>Email</label>
                <input type='email' name='email-senha' id='email-senha' required>

                <button type='button' class='envia-nova-senha'>Enviar Senha E-mail</button>
                <br>
                <div class='erro'></div>
            </form>
        </section>  
     </main>

     <footer class='footer-site'>
          <p>&copy Todos os direitos reservados a Spin System</p>
     </footer>
   </body>

<?php
    session_start();
    if(isset($_SESSION['senha_alterada'])){
        echo   '<script type="text/JavaScript">
                    $(".sucesso").html("E-mail Enviado!");
                    $(".sucesso").fadeIn(700, function(){
                        window.setTimeout(function(){
                            $(".sucesso").fadeOut();
                        }, 1200);
                    });
                </script>';
    session_destroy();
    };
?>

<?php
    if(isset($_SESSION['usuario_nao_encontrado'])){
      echo   '<script type="text/JavaScript">
                  $(".erro").html("Usuário não encontrado!");
                  $(".erro").fadeIn(700, function(){
                      window.setTimeout(function(){
                          $(".erro").fadeOut();
                      }, 1200);
                  });
              </script>';
             
     session_destroy();
    };
?>


<script type='text/JavaScript'>
 
  $('.esqueci-senha').on('click', function(){
    $('.section-login').hide(500);
    $('.section-nova-senha').show(500);
  });

  $('.envia-nova-senha').on('click', function(){
     $('#formulario-nova-senha').submit();
  });

  $('.login').on('click', function(){
      $('#formulario-login').submit();
  });

  $('.cadastrese').on('click', function(){
    window.location.href= './cadastro.php';
  });

   
</script>
</html>