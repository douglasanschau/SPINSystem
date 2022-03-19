<?php 

require_once('database/users.php');
require_once('database/logs.php');

session_start();

$id_company = isset($_POST['id_empresa']) ? $_POST['id_empresa'] : null;
$id_user   = isset($_POST['id']) ? $_POST['id'] : null;
$user_access = isset($_POST['usuario_acesso'][0]) ? $_POST['usuario_acesso'][0] : null;


//Pega todos os usuarios cadastrados
if(isset($id_company)){

   $registered_users = new Users();
   $queryUsers = 'SELECT id, name, email, admin, inactive FROM  users WHERE id_company = :ID_COMPANY';
   $params = ['ID_COMPANY' => $id_company];
   $users =  $registered_users->getData($queryUsers, $params);
    echo json_encode($users);

} 

//Atualiza cadastro de usuários
if(isset($id_user)){
    $name = isset($_POST['nome']) ? $_POST['nome'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $profile = isset($_POST['perfil']) ? $_POST['perfil'] : "";
    $name_admin = $_SESSION['user']['nome'];
    
    $queryUpdateUsers =  'UPDATE users SET name = :NAME, email = :EMAIL, admin = :ADMIN WHERE id = :ID';
    $params = ['NAME' => $name, 'EMAIL' => $email, 'ADMIN' => intval($profile), 'ID' => intval($id_user)];
 

    $update = new Users();
    $result = $update->updateUser($queryUpdateUsers, $params, $id_user);

    $log = new Logs($_SESSION['user']['id']);
    $type = 'A'; 
    $description = "{$name_admin} editou o cadastro de {$name}";
    $log->saveLog($type, $description);

    $return = array();
    
    if($result == true){
        $return = $params;
        echo json_encode($return);
    } else {
        $return = 'nao_encontrado';
        echo json_encode($return);
    }

}

//Ação de  bloquear e desbloquear perfis
if(isset($user_access)){
     
     $acao = $user_access['acao'] == 'desativar' ? 1 : 0; 

     $access = new Users();
     $queryAccessUser = 'UPDATE users set inactive = :INACTIVE where id = :ID';
     $params = ['INACTIVE' => $acao, 'ID' => $user_access['id']];
     $access->updateUser($queryAccessUser, $params, $user_access['id']);


     $log = new Logs($user_access['id']);
     $type = 'A'; 
     if($acao == 1) {
         $retorno = 'desativado';
     } else {
        $retorno = 'reativado';
     }
     $description = 'O perfil de user_name foi '.$retorno.' por '. $_SESSION['user']['nome'];
     $log->saveLog($type, $description);

     echo $retorno;

}

?>