<?php

require_once('database-login.php');

class Register {

    private $name; 
    private $company;
    private $email;
    private $password;

    public function __construct(){
       $this->name = $_POST['nome-user'];
       $this->company = $_POST['empresa-user'];
       $this->email = $_POST['email-user'];
       $this->password = md5($_POST['senha-user']);
    }

    public function getName(){
        return $this->name;
    }

    public function getCompany(){
        return $this->company;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function register(){
        $database = new DatabaseLogin();
        $register = $database->newAdm($this->company, $this->email, $this->name, $this->password);
        return $register;
    }

    public function verifyUserAccess(){
        $database = new DatabaseLogin();
        $access = $database->Access($this->email, $this->password);
        return $access;
    }


}

    $register_admin = new Register();
    $new_user = $register_admin->register();
    if($new_user == false){
        session_start();
        $_SESSION['user-cadastrado'] = true;
        header('Location:../cadastro.php');
    } else{
        $user = $register_admin->verifyUserAccess();
        session_start();
        $_SESSION['user'] = ['nome' => $access['name'], 'email' => $email, 'empresa' => $access['id'], 'acesso' =>  $access['admin'], 'id' => $access['id_user']];
        header('Location:../app/index.php');
    }
?>