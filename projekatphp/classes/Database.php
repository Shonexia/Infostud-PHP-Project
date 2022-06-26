<?php

class Database
{

    public static string $server_name = 'localhost';
    public static string $user = 'root';
    public static string $password = '';
    public static string $database = 'anubis';

    public static function db_connection()
    {
        $connection = new mysqli(self::$server_name, self::$user, self::$password, self::$database);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
}
