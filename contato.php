<!Doctype html>
<html lang='pt-br'>
   <head>
       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel='stylesheet' href='styles/reset.css'>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel='stylesheet' href='styles/style-contatenos.css'>
       <title> Contate-nos- Site</title>
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
             <button class='entrar'>Entrar</button>
         </nav>
     </header>

     <main>

        <img src='imgs/suporte.png' class='imagem-suporte' alt='Imagem representando uma atendente de suporte para auxiliar em dúvidas.'>

      <section class='contatenos'>
        <h2> Quer agendar uma Demonstração? </h2>    
        <p> Nossos especialistas aguardam seu contato para mostrarem o sistema.</p> 

        <form id='form-demo' class='form-demo' action='agendar-demo.php' action='post'>
            <label for='nome-demo'>Nome</label>
            <input type='text' id='nome-demo' name='nome-demo'>

            <label form='email-demo'>Email</label>
            <input type='email' id='email-demo' name='email-demo'>

            <label for='hora-demo'>Horário</label>
            <input type='datetime-local' name='hora-demo' id='hora-demo'>

            <button class='cadastrar'>Enviar</button>
        </form>
        <br>
        <div class='erro'></div>

        <div class='dados-contato'>
            <p>Caso prefira entrar em contato, abaixo nosso contatos: </p>
            <p>Email: <span class='contato'>suporte@gerardtool.com</span></p>
            <p>Telefone: <span class='contato'>(51) 3897-1428</span></p>
        </div>

      </section>
     </main>

     <footer class='footer-site'>
          <p>&copy Todos os direitos reservados a Spin System</p>
     </footer>
   </body>
<script type='text/JavaScript'>
    $('.cadastrese').on('click', function(){
      window.location.href= 'cadastrese.php';
    });

    $('.entrar').on('click', function(){
       window.location.href= 'entrar.php';
    });


    $('.cadastrar').on('click', function(event){
        event.preventDefault();
        data = new Date();
        atual = new Date($('#hora-demo').val());
        if(atual.getTime() <= data.getTime()){
            $('.erro').html('Não é possível agendar em período retroativo.');
            $(".erro").fadeIn(700, function(){
                window.setTimeout(function(){
                    $('.erro').fadeOut();
                }, 1200);
            });
        } else {
            $('#form-demo').submit();
        };
    });
</script>
</html>