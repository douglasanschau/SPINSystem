<?php

require_once('database/database-app.php');
require_once('database/logs.php');

session_start();

if(isset($_POST['perfis'][0]['id_empresa'])){
   
   $id_user = isset($_SESSION['perfis']['id']) ? $_SESSION['perfis']['id'] : $_SESSION['user']['id'];
   $queryProfiles = 'SELECT id, name, photo FROM users WHERE id_company = :ID_COMPANY && inactive = 0 && id != :ID_USER ORDER BY name';
   $param = ['ID_COMPANY' => intval($_POST['perfis'][0]['id_empresa']), 'ID_USER' => $id_user];

   $db = new DatabaseApp();
   $profiles = $db->Sql($queryProfiles, $param);
   $profiles = $profiles->fetchAll(PDO::FETCH_ASSOC);
    
   $html = "";
   foreach($profiles as $p){
     $html .= " <a class='dropdown-item muda-perfil' href='#' ref-id='{$p['id']}'>{$p['name']}</a>";
   }

   echo json_encode($html);
  
}

if(isset($_POST['negocios'][0]['id_empresa'])){
  $id_user = isset($_SESSION['perfis']['id']) ? $_SESSION['perfis']['id'] : $_SESSION['user']['id'];
  $queryBusiness = 'SELECT id, company, value, stage, id_user FROM business WHERE id_company = :ID_COMPANY && id_user = :ID_USER && lost != 1';
  $param = ['ID_COMPANY' => $_POST['negocios'][0]['id_empresa'], 'ID_USER' => $id_user];

  $db = new DatabaseApp();
  $business = $db->Sql($queryBusiness, $param);
  $business = $business->fetchAll(PDO::FETCH_ASSOC);

  $html = array();
  foreach($business as $b){
        array_push($html, $b);
  }

   echo json_encode($html);

}

if(isset($_POST['altera_perfil'])){

   $queryProfile = 'SELECT name, photo FROM users WHERE id = :ID_USER';
   $param = ['ID_USER' => intval($_POST['altera_perfil'])];

   $db = new DatabaseApp();
   $profile = $db->Sql($queryProfile, $param);
   $profile = $profile->fetch();

   $_SESSION['perfis']['id'] = $_POST['altera_perfil'];
   $_SESSION['perfis']['nome'] = isset($profile['name']) ? $profile['name'] : "";
   $_SESSION['perfis']['foto'] = isset($profile['photo']) ? $profile['photo'] : "" ;


   echo "sessao_atualizada";

}

if(isset($_POST['novo_negocio'][0])){
   $new_business = $_POST['novo_negocio'][0];


    $client = $new_business['etapa'] == 'pos-venda' ? 1: 0;

    $queryNewBusiness = 'INSERT INTO business (id_company, id_user, company, stage, contact, email, phone, client) VALUES (:ID_COMPANY, :ID_USER, :COMPANY, :STAGE, :CONTACT, :EMAIL,  :PHONE, :CLIENT)';


    $parameters =  ['ID_COMPANY' => intval($new_business['id_empresa']), 'ID_USER' => intval($new_business['id_user']), 'COMPANY' => $new_business['nome-empresa'], 'STAGE' => $new_business['etapa'],
                    'CONTACT' => $new_business['contato'], 'EMAIL' => $new_business['email-contato'], 'PHONE' => $new_business['telefone-contato'], 'CLIENT' => intval($client)];


    $db = new DatabaseApp();
    $business = $db->Sql($queryNewBusiness, $parameters, true);


    $log = new Logs($new_business['id_user']);
    $type = "C";
    $description = "user_name cadastrou a empresa {$new_business['nome-empresa']}";
    $log->saveLog($type, $description);



    $_SESSION['negocio']['nome'] = $new_business['nome-empresa'];


    $url = "http://localhost/faculdade/seminario/app/negocio.php?id={$business}";

    echo $url;
    
}

if(isset($_POST['id_negocio'])){

    $id = intval($_POST['id_negocio']);
    $_SESSION['negocio']['nome']  = isset($_POST['company']) ?  $_POST['company'] : null;

    $url = "http://localhost/faculdade/seminario/app/negocio.php?id={$id}";

    echo $url;
}







?>