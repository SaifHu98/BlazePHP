<?php
namespace Core;

use PDO;
use PDOException;

class DB {
    private static $pdo;

    public static function connect() {
        if (!self::$pdo) {
            $host = 'localhost';
            $dbname = 'blazephp';
            $user = 'root';
            $pass = '';
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die('Database Connection Failed: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
