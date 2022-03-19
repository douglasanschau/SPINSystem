<?php 

require_once('database-app.php');

class Product {
   private $name;
   private $description;
   private $value; 
   private $id_company; 

   public function __construct($name, $description, $value, $id_company){
       $this->id_company  = $id_company;
       $this->name        = $name;
       $this->description = $description;
       $this->value       = $value;
   }

   public function newProduct(){
       $sql_insert = 'INSERT INTO products (id_company, name, description, value) VALUES (:ID_COMPANY, :NAME, :DESCRIPTION, :VALUE)';
       $params = ['ID_COMPANY' => $this->id_company, 'NAME' => $this->name, 'DESCRIPTION' => $this->description, 'VALUE' => $this->value];
       $product = new DatabaseApp();
       $product->Sql($sql_insert, $params);
       return $product;
   }

   public function editProduct($id_product){
       $verify = $this->verifyProduct($id_product);
       if($verify['number'] == 0){
           return false;
       }
       $sql_update = 'UPDATE products SET name = :NAME, description = :DESCRIPTION, value =  :VALUE WHERE id = :ID_PRODUCT';
       $params = ['NAME' => $this->name, 'DESCRIPTION' => $this->description, 'VALUE' => $this->value, 'ID_PRODUCT' => $id_product];
       $product = new DatabaseApp();
       $product->Sql($sql_update, $params);
       return $product;
   }

   public function deleteProduct($id_product){
       $verify = $this->verifyProduct($id_product);
       if($verify['number'] == 0){
          return false;
       }
       $sql_delete = 'DELETE FROM products WHERE id = :ID_PRODUCT';
       $param = ['ID_PRODUCT' => $id_product];
       $delete = new DatabaseApp();
       $delete->Sql($sql_delete, $param);
       return $delete;
   }

   public function getProducts(){
       $sql_get = 'SELECT * from products where id_company = :ID_COMPANY';
       $param   = ['ID_COMPANY' => $this->id_company];
       $products = new DatabaseApp();
       $data = $products->Sql($sql_get, $param);
       return $data->fetchAll(PDO::FETCH_ASSOC);
   }

   public function verifyProduct($id){
       $sql_verify = 'SELECT count(*) as number from products where id = :ID';
       $param = ['ID' => $id];
       $conn = new DatabaseApp();
       $result = $conn->Sql($sql_verify, $param);
       return $result->fetch(PDO::FETCH_ASSOC);
   }


}

?>