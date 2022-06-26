<?php 
    require_once '../../database/database.class.php';


    class DatabaseApp extends PDO{
        private $conn;

        public function __construct(){
            $this->conn = Database::conn();
        }

        public function Sql($sql, $params, $getId = null){
            $response = $this->conn->prepare($sql);
            $this->params($response, $params);
            $response->execute();
            if(isset($getId)){
                return $this->conn->lastInsertId();
            }
            return $response;
        }

        private function params($sql, $params){
            foreach($params as $key => $param){
                $sql->bindValue(":{$key}", $param);
            }
        }
    }
?> 