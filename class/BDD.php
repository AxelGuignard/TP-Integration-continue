<?php
/**
 * Created by PhpStorm.
 * User: axelg
 * Date: 11/03/2019
 * Time: 09:24
 */

class BDD{

    // specify your own database credentials
    private static $host = "mysql-arkay2.alwaysdata.net";
    private static $db_name = "arkay2_integration";
    private static $username = "arkay2";
    private static $password = "arkay";
    private static $conn;

    // get the database connection
    public static function getConnection(){

        self::$conn = null;
        try{
            self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db_name, self::$username, self::$password);
            self::$conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error : " . $exception->getMessage();
            echo "\nVersion de PHP : ".phpversion();
        }

        return self::$conn;
    }
}
?>