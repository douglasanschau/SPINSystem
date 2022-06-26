<?php 


class Clients extends PDO {
   
   private $conn;
   
   public function __construct() {
     $this->conn = new PDO('mysql:dbname=uniasselvi;host=localhost', 'root', 'root');
   }

   public function newClient($id_company, $company, $contact, $email, $phone){
      $new_client = $this->conn->prepare('INSERT INTO business (id_company, company, contact, email, phone) VALUES (:ID_COMPANY, :COMPANY, :CONTACT, :EMAIL, :PHONE)');
      $params = ['ID_COMPANY' => $id_company, 'COMPANY' => $company, 'CONTACT' => $contact, 'EMAIL' => $email, 'PHONE' => $phone];
      $this->setParams($new_client, $params);
      $new_client->execute();
   }
   
   private function setParams($statment, $parameters){
       foreach($parameters as $key => $value){
           $statment->bindValue(":{$key}", $value);
       }
   }

   public function getData($rawQuery, $parameters = null){
     $query = $this->conn->prepare($rawQuery);
     if($parameters != null){
      $this->setParams($query, $parameters);
     }
     $query->execute();
     return $query->fetchAll(PDO::FETCH_ASSOC);
   }

}