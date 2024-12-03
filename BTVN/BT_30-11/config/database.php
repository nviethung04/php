<?php
class Database{
    const HOST = 'localhost';
    const DB_NAME = 'CSE485';
    const USERNAME = 'root';
    const PASSWORD = 'quang@12345';

    public static function getConnection()
    {
        try{
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME;
            $connection = new PDO($dsn, self::USERNAME, self::PASSWORD);
            $connection -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        }catch (PDOException $e){
            echo "Failed in connection database. Error: ". $e->getMessage();
            exit();
        }
    }
}
