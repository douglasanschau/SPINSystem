<?php 

require_once('database-login.php');
   
class Login {
    private $email;
    private $password;

    public function sendNewPassword($email){
      $new_password = new DatabaseLogin();
      $response = $new_password->newPassword($email);
      if($response){
        session_start();
        $_SESSION['senha_alterada'] = true;
        header('Location:https://localhost/seminario/entrar.php');
      } else {
        session_start();
        $_SESSION['usuario_nao_encontrado'] = true;
        header('Location:https://localhost/seminario/entrar.php');
      }
    }

    public function logIn($email, $password){
      $login = new DatabaseLogin();
      $access = $login->Access($email, $password);
      if(isset($access) && $access != false){
          session_start();
          $_SESSION['user'] = ['nome' => $access['name'], 'email' => $email, 'empresa' => $access['id'], 'acesso' =>  $access['admin'], 'id' => $access['id_user'], 
                               'foto' => $access['photo'], 'telefone' => $access['phone'], 'cpf' => $access['cpf']];

          header('Location:http://localhost/faculdade/seminario/app/home-app.php');
      } else {
        session_start();
        $_SESSION['usuario_nao_encontrado'] = true;
        header('Location:http://localhost/faculdade/seminario/entrar.php');
      }
    }

}

 $email = isset($_POST['email-login']) ? $_POST['email-login'] : $_POST['e-mail-senha'];
 $password = isset($_POST['senha-login']) ? $_POST['senha-login'] : null;

 if(is_null($password)){
    $new_password = new Login();
    $new_password->sendNewPassword($email);

 } else {
    $login  = new Login();
    $login->logIn($email, $password);
 } 

 

?>