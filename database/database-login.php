<?php
 require_once '../database/database.class.php';

    class DatabaseLogin extends PDO {

        private $conn;

        public function __construct(){
            $this->conn = Database::conn();
        }

        public function newAdm($company, $email, $name, $password){
        $admin = $this->verifyUser($email);
        if($admin){
            return false;
        } 
            //Cadastro Empresa 
            $register = $this->conn->prepare('INSERT INTO company (name, user, email, password) VALUES (:COMPANY, :USER, :EMAIL, :PASSWORD)');
            $password = md5($password);
            $register->bindParam(':COMPANY', $company); $register->bindParam(':USER', $name);
            $register->bindParam(':EMAIL', $email);$register->bindParam(':PASSWORD', $password);
            $register->execute();
            //Cadastro Usuário
            $this->newUser($name, $email, $password);
            return true;
        
        }

        private function newUser($name, $email, $password){
            $id = $this->verifyUser($email);
            $register_user = $this->conn->prepare('INSERT INTO users(id_company, name, email, password, admin) VALUES (:ID_COMPANY, :NAME, :EMAIL, :PASSWORD, 1)');
            $register_user->bindParam(':ID_COMPANY', $id['id']); $register_user->bindParam(':NAME', $name);
            $register_user->bindParam(':EMAIL', $email);$register_user->bindParam(':PASSWORD', $password);
            $register_user->execute();
            return $register_user;
        }

        private function verifyUser($email){
        $user = $this->conn->query('SELECT id from company WHERE email = '. $this->conn->quote($email));
        $user->execute();
        $result = $user->fetch();
        return $result;
        }

        public function newPassword($email){
            $user = $this->verifyUser($email);
            if(!$user){
                return false;
            }
            $new_password = md5('1234'); $id = intval($user['id']);
            $password = $this->conn->prepare("UPDATE company SET password = :PASSWORD  WHERE id = :ID");
            $password->bindParam(':PASSWORD', $new_password); 
            $password->bindParam(':ID', $id);
            $password->execute();
            return true;
        }

        private function verifyUserAccess($email, $password){
            $user = $this->conn->prepare('SELECT id_company as id, id as id_user, name, email, admin, photo, phone, cpf
                                        FROM users        
                                        WHERE email = :EMAIL && password = :PASSWORD');
            $user->bindParam(':PASSWORD', $password);  $user->bindParam(':EMAIL', $email); 
            $user->execute();
            $result = $user->fetch();
            return $result;
        }

        public function Access($email, $password){
            $user = $this->verifyUserAccess($email, $password);
            if(!$user){
                return false;
            }
            return $user;
        }

    }
?>