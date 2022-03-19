<?php 
 
 require_once('database/clients.php');
 
   $id_company = isset($_GET['id_empresa']) ? $_GET['id_empresa'] : null;
   $params = ['ID_COMPANY' => $id_company];
   if(isset($id_company)){

       $clients = new Clients();

       //Dados dos Cards de Situações de Negócios, indicadores gerais
       $activeQuery = 'SELECT count(*) as active from business where id_company = :ID_COMPANY and client = 1';
       $active_business = $clients->getData($activeQuery, $params);

       $openQuery = 'SELECT count(*) as open from business where id_company = :ID_COMPANY and lost = 0';
       $open_business = $clients->getData($openQuery, $params);

       $lostQuery = 'SELECT count(*) as lost from business where id_company = :ID_COMPANY and lost = 1';
       $lost_business = $clients->getData($lostQuery, $params);

       $data['active'] = isset($active_business[0]['active']) ? $active_business[0]['active'] : 0;
       $data['open']   = isset($open_business[0]['open']) ? $open_business[0]['open'] : 0;
       $data['lost']   = isset($lost_business[0]['lost']) ? $lost_business[0]['lost'] : 0;


       //Query Default nome de vendedores 
       $queryNames = 'SELECT id,name from users where id_company = :ID_COMPANY && admin = 0 && inactive = 0';
       $salespeople = $clients->getData($queryNames, $params);
       $data['names'] = $salespeople;
 
       //Dados de atividades do dia  e Indicadores ,por vendedor (Obs: se estivesse usando Laravel o ideal seria um keyBy na consulta e depois ordernar com foreach())
       foreach($salespeople as $person){

          $callsQuery = 'SELECT count(*) as calls from activities 
                          WHERE id_user = '.$person['id'].' && activity = "C" && DATE_FORMAT(activity_date, "%Y-%m-%d") = curdate()';

          $calls_activities  = $clients->getData($callsQuery, null);
          $data['calls'][$person['id']] = $calls_activities[0];

          $demoQuery = 'SELECT count(*) as demonstracao from activities 
                        WHERE id_user = '.$person['id'].' && activity = "D" && DATE_FORMAT(activity_date, "%Y-%m-%d") = curdate()';

          $demo_activities = $clients->getData($demoQuery, null);
          $data['demos'][$person['id']] = $demo_activities[0];

          $emailsQuery = 'SELECT count(*) as mail from activities
                          WHERE id_user = '.$person['id'].' && activity = "E" && DATE_FORMAT(activity_date, "%Y-%m-%d") = curdate()';     

          $emails_activities = $clients->getData($emailsQuery, null);
          $data['emails'][$person['id']] = $emails_activities[0];

          $afterSalesQuery = 'SELECT count(*) as contact from activities
                              WHERE id_user = '.$person['id'].' && activity = "P" && MONTH(activity_date)=MONTH(CURDATE()) AND YEAR(created_at)=YEAR(CURDATE())';     
 
          $after_sales = $clients->getData($afterSalesQuery, null);
          $data['after_sales'][$person['id']] = $after_sales[0];

          $closureQuery = 'SELECT count(*) as closure_amount from business
                            WHERE id_user = '.$person['id'].' && MONTH(closure_date)=MONTH(CURDATE()) AND YEAR(closure_date)=YEAR(CURDATE())';     

          $closure = $clients->getData($closureQuery, null);
          $data['closure'][$person['id']] = $closure[0];

          $lostQuery = 'SELECT count(*) as lost_amount from business
                            WHERE id_user = '.$person['id'].' && MONTH(loss_date)=MONTH(CURDATE()) AND YEAR(loss_date)=YEAR(CURDATE())';     

          $lost = $clients->getData($lostQuery, null);
          $data['loss'][$person['id']] = $lost[0];

       }
       
       echo json_encode($data);

   }  else  {
       $response = ['not_found'];
       echo json_encode($response[0]);
   }

?> 