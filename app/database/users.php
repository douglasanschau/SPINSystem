<?php

class Users  extends PDO{
    private $conn;

    public function __construct(){
       $this->conn = new PDO('mysql:dbname=uniasselvi;host=localhost', 'root', '');
    }

    public function newUser($id_company, $name, $email, $cpf = null, $admin){
      $exists = $this->verifyUser(null, $email);
      if(count(array_filter($exists)) > 0){
        return false;
    } 
      $new_user = $this->conn->prepare('INSERT INTO users(id_company, name, email, cpf, password, admin) VALUES(:ID_COMPANY, :NAME, :EMAIL, :CPF, :PASSWORD, :ADMIN)');
      $value = rand(1, 9999);
      $password = md5($value);
      $parameters = ['ID_COMPANY' => $id_company, 'NAME' => $name, 'EMAIL' => $email, 'CPF' => $cpf, 'PASSWORD' => $password, 'ADMIN' => $admin];
      $this->setParams($new_user, $parameters);
      $new_user->execute();
      return $new_user;
    } 


    public function updateUser($query, $parameters, $id){
        $verify = $this->verifyUser($id,null);
        if(count(array_filter($verify)) == 0){
            return false;
        } 
        $update = $this->conn->prepare($query);
        if(isset($parameters)){
            $this->setParams($update, $parameters);
        }
        $update->execute();
        return true;

    }

    private function setParams($statment, $parameters){
        foreach($parameters as $key => $value){
            $statment->bindValue(":{$key}", $value);
        }
    }

    private function verifyUser($id = null, $email = null){
         if(isset($id)){
            $verify = $this->conn->prepare('SELECT * FROM users WHERE id = :ID');
            $params = ['ID' => $id];
         } else {
            $verify = $this->conn->prepare('SELECT * FROM users WHERE email = :EMAIL');
            $params = ['EMAIL' => $email];
         }
         $this->setParams($verify,$params);
         $verify->execute();
         $result = $verify->fetchAll(PDO::FETCH_ASSOC);    
         return $result;
    }

    public function getData($query, $parameters = null){
        $query = $this->conn->prepare($query);
        if(isset($parameters)){
            $this->setParams($query, $parameters);
        }
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }




}



?> 