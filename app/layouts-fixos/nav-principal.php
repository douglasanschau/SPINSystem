<ul class="nav nav-home justify-content-end">
  <li class="nav-item">
     <?php if(isset($_SESSION['user']['acesso']) && $_SESSION['user']['acesso'] == 1) { ?>
        <a class="nav-link active" href="/faculdade/seminario/app/home-app.php">
          <i class='material-icons icon-nav'>domain</i>
            Home
        </a>
      <?php } ?>
  </li>
  <li class="nav-item">
        <a class="nav-link" href="/faculdade/seminario/app/negocios-app.php">
            <i class='material-icons icon-nav'>attach_money</i>
            Negócios
        </a>
  </li>
  <li class="nav-item">
        <a class="nav-link" href="#">
            <i class='material-icons icon-nav'>phone_forwarded</i>
            Agendamentos
        </a>
  </li>
  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
            <i class='material-icons icon-nav'>build</i>
            Configurações
        </a>
        <div class="dropdown-menu dropdown-configs">
            <?php if(isset($_SESSION['user']['acesso']) &&  $_SESSION['user']['acesso'] == 1) { ?>
               <a class="dropdown-item" href="/faculdade/seminario/app/perfis-app.php">Gerenciar Perfis</a>
            <?php  } else {  ?>
              <a class="dropdown-item" href="/faculdade/seminario/app/perfis-app.php">Gerenciar Perfil</a>
            <?php } ?>
            <?php if(isset($_SESSION['user']['acesso']) &&  $_SESSION['user']['acesso'] == 1) { ?>
              <a class="dropdown-item" href="/faculdade/seminario/app/produtos-app.php">Produtos</a>
            <?php } ?>
            <a class="dropdown-item log-out" href="logout.php">Log Out</a>
         </div>
  </li>
</ul>

