<?php 


$id_user = isset($_POST['id']) ? $_POST['id'] : null;
$photo = isset($_FILES['foto']) ? $_FILES['foto'] : null;
$data = isset($_POST['dados']) ? $_POST['dados']: null;
$new_user = isset($_POST['novo_usuario'][0]) ?  $_POST['novo_usuario'][0] : null;

 require_once('database/users.php');
 require_once('database/logs.php');

 $connection = new Users();
 session_start();

//Altera foto de perfil de usuário e registra log
 if(isset($photo)){
    $new_name = $photo['name'];
    $dir = __DIR__.'/photos/';
    if(!is_dir($dir)){
        mkdir($dir);
    }  

    $id = $_SESSION['user']['id'];

    $addPhotoUser = 'UPDATE users set photo = :PHOTO where id = :ID';
    $params = ['ID' => $id, 'PHOTO' => 'photos/'.$new_name];   
    $connection->updateUser($addPhotoUser, $params, $id); 

    try{
      move_uploaded_file($photo['tmp_name'], $dir.$new_name);
    }catch(\Exception $e){
       var_dump($e->getMessage());die();
    }

    $log = new Logs($id);
    $type = 'A'; $description = "user_name alterou sua foto de perfil.";
    $log->saveLog($type, $description);
    
    $_SESSION['user']['foto'] = 'photos/'.$new_name;

    return  true;
 }

//Atualiza perfil de usuário e registra log
 if(isset($data)){
    $data = explode('&', $data);
    $user = array();
    foreach($data as $d){
        $value = explode('=', $d);
        $user[$value[0]] = str_replace('%20', " ", $value[1]);
    }

    $validate_email = validateEmail($user['email-usuario']);
    if(!$validate_email){
        echo 'email_false';
    }
    
    $queryUpdateUser = 'UPDATE users set name = :NAME, email = :EMAIL, phone = :PHONE, cpf = :CPF, password = :PASSWORD WHERE id= :ID';
    $params = ['NAME' => $user['nome-usuario'], 'EMAIL' => $validate_email, 'PHONE'  => $user['telefone-usuario'], 'CPF' => $user['cpf-usuario'], 'PASSWORD' => $user['senha-usuario'], 'ID' => $user['id']];
    $connection->updateUser($queryUpdateUser, $params, $user['id']); 

    $log = new Logs($user['id']);
    $type = 'A'; $description = "user_name alterou suas informações de cadastro.";
    $log->saveLog($type, $description);

    $_SESSION['user']['nome'] = $user['nome-usuario']; 
    $_SESSION['user']['email'] = $validate_email;  
    $_SESSION['user']['cpf'] = $user['cpf-usuario'];
    $_SESSION['user']['telefone'] = $user['telefone-usuario'];

    return true;

 }

 //Cadastra novo perfil e registra log
 if(isset($new_user)){

   $user = $connection->newUser(intval($new_user['id_empresa']), $new_user['nome'], $new_user['email'], null, intval($new_user['perfil']));

   if($user == false){
      echo 'usuario_existe';
   }

   $log = new Logs($_SESSION['user']['id']);
   $type = "C"; $description = "user_name cadastrou na base {$new_user['nome']}.";
   $log->saveLog($type, $description);

   echo $new_user['nome'];

 }

 function validateEmail($email){
    $email = str_replace('%40', '@', $email);
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    if(preg_match($regex, $email)){
       return $email;
    } else {
       return false;
    }
 }
  


?> 