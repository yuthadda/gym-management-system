<?php


    class Database{

        static $host="localhost";
        static $username="root";
        static $password="";
        static $dbname='gymsystemdb';
        static $connection;
        public static function connect()
        {
            try{
                if(self::$connection==null)
                {
                    self::$connection = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$username,self::$password);
                    return self::$connection;
                }
                return self::$connection;
               
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
            
            
        }

        public static function disconnect()
        {
            self::$connection=null;
        }
    }


?>