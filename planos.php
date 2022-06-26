<!Doctype html>
<html lang='pt-br'>
   <head>
       <meta charset='utf-8'>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel='stylesheet' href='styles/reset.css'>
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <link rel='stylesheet' href='./assets/css/style-planos.css'>
       <title> Planos - Site</title>
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
         <section class='planos'>
             <h2>Descubra o Plano Ideal Para sua Empresa!</h2>
             <table class='tabela-valores'>
                 <thead>
                     <tr>
                        <th>Standard</th>
                        <th>Premium</th>
                        <th>Max</th>
                        <th>Benefícios</th>
                     </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <td><i class='material-icons checked'>check</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td>Suporte</td>
                     </tr>
                     <tr>
                        <td><i class='material-icons checked'>check</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td>Cadastro de Produtos/Serviços</td>
                     </tr>
                     <tr>
                        <td><i class='material-icons closed'>close</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td>Gerenciamento de Nível de Acesso</td>
                     </tr>
                     <tr>
                        <td><i class='material-icons closed'>close</i></td>
                        <td><i class='material-icons closed'>close</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td>Controle de Faturamento</td>
                     </tr>
                     <tr>
                        <td><i class='material-icons closed'>close</i></td>
                        <td><i class='material-icons closed'>close</i></td>
                        <td><i class='material-icons checked'>check</i></td>
                        <td>Usuários Ilimitados</td>
                     </tr>
                 </tbody>
                 <tfoot>
                    <td>R$99,00 mês</td>
                    <td>R$129,90 mês</td>
                    <td>R$150,00 mês</td>
                 </tfoot>

             </table>

             <p> Ficou com dúvidas? </p>
             <p> Nosso time de suporte pode auxiliá-lo(a). </p>
             <p> <a href='contatenos.html'>Contate-nos</a> no número de telefone <span class='contato'>(51) 3897-1428 </span></p>
             
         </section>
     </main>

     <footer class='footer-site'>
          <p>&copy Todos os direitos reservados a Spin System</p>
     </footer>
   </body>
<script type='text/JavaScript'>
    $('.cadastrese').on('click', function(){
      window.location.href= './cadastro.php';
    });

    $('.entrar').on('click', function(){
       window.location.href= './entrar.php';
    });

</script>
</html>