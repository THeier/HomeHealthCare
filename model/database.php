<?php


/**
 * Description of Database
 * THCapstone 
 * @author Tania Heieer
 */
class Database {
    private static $dsn = 'mysql:host=localhost;dbname=26pw-p2-taniaheier';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    public function __construct() {
        
    }

    public static function getDB() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn, 
                        self::$username, 
                        self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }

}

?>