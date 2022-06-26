<?php 

require_once('clients.php');

class Logs extends PDO{

    private $id_user;
    private $conn;


    public function __construct($id){
        $this->id_user = $id; 
        $this->conn = new PDO('mysql:dbname=uniasselvi;host=localhost', 'root', 'root');
    }

    private function getUser(){
        $search = $this->conn->prepare('SELECT * from users where id = :ID');
        $search->bindParam(':ID', $this->id_user);
        $search->execute();
        $user  = $search->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }

    public function saveLog($type, $description, $id_user_action = null){
        $user = $this->getUser();
        $description = str_replace('user_name', $user[0]['name'], $description);
        $connection = $this->conn->prepare('INSERT INTO logs (id_user, action, description) VALUES (:ID_USER, :TYPE, :DESCRIPTION)');
        $connection->bindParam(':ID_USER', $this->id_user); $connection->bindParam(':TYPE', $type); $connection->bindParam(':DESCRIPTION', $description);
        $connection->execute();
    }


}



?>