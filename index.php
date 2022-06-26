<!Doctype html>
<html lang='pt-br'>
   <head>
       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel='stylesheet' href='styles/reset.css'>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel='stylesheet' href='./assets/css/style.css'>
       <link rel='stylesheet' href='./assets/css/style-home.css'>
       <title> Home - Site</title>
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
     <main >
        <section class='sobre-nos'>
            <img src='./assets/img/cliente-img1.png' class='img-sobre-nos' alt='Imagem representativa de relação cliente-fornecedore com advento da tecnologia.'>

            <h2 class='titulos'>Sobre nós</h2>

            <p> A Spin System é uma plataforma de manutenção e gestão de cadastro de clientes,
                que com eficiência tem administrado carteiras de clientes por todo Brasil.  </p>

            
            <p> Participe ativamente dos seus negócios e triplique o número de vendas por período.  </p>
            
            <h3 class='aumente-vendas'>Aumente Suas Vendas em 98% com a Spin System</h3>

            <p> Faça parte dos times que mais crescem no Brasil, com a Spin System você consegue adicionar clientes 
                e acompanhar desenvolvimento de seus negócios. </p>

        </section>
        <hr>

        <section class='beneficios'>
            <img src='./assets/img/cliente-img2.png' class='img-beneficios' alt='Imagem mostra a construção de um relacionamento efetivo com o cliente.'>

            <h2 class='titulos'>Benefícios</h2>

            <ul>
                <i class='material-icons star'>star_border</i>
                <li>Qualidade de Atendimento</li>
                <i class='material-icons star'>star_border</i>
                <li>Gestão Eficiente de Contatos</li>
                <i class='material-icons star'>star_border</i>
                <li>Indicadores de Vendas no Período</li>
                <i class='material-icons star'>star_border</i>
                <li>Adminsitração de Carteiras Complexas em Poucos Cliques</li>
            </ul>

        </section>
     </main>

     <footer class='footer-site'>
          <p>&copy Todos os direitos reservados a Spin System</p>
     </footer>
   </body>
<script type='text/JavaScript'>
    $(document).ready(function(){
        $('.beneficios').show(600);
        $('.sobre-nos').show(600);
    });

    $('.cadastrese').on('click', function(){
      window.location.href= './cadastro.php';
    });

    $('.entrar').on('click', function(){
       window.location.href= './entrar.php';
    });

    $('.aumente-vendas').on('click', function(){
        window.location.href= './cadastro.php';
    });
</script>
</html>