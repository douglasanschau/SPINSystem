<?php  
  // Necessario importar o arquivo 'config.php' antes desta classe
  abstract class Database{
    private static $conn;
    private static $db_name = "paper";
    private static $db_host = "localhost";
    private static $db_user = "root";
    private static $db_pass = "";
    
    public static function conn()
    {
      if (self::$conn == null) {
        self::$conn = new PDO('mysql: host='.self::$db_host .'; dbname='.self::$db_name,self::$db_user,self::$db_pass);
      }
      
      return self::$conn;
    }
  }
?>