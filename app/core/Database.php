<?php
namespace App\Core;

use PDO, PDOException;

class Database {
    private static ?PDO $pdo = null;

    public static function pdo(): PDO {
        if (self::$pdo) return self::$pdo;
        $dsn = "mysql:host=".Config::env('DB_HOST','127.0.0.1').";port=".Config::env('DB_PORT',3306).";dbname=".Config::env('DB_NAME').";charset=utf8mb4";
        $user = Config::env('DB_USER'); $pass = Config::env('DB_PASS');
        $opts = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try { self::$pdo = new PDO($dsn, $user, $pass, $opts); }
        catch (PDOException $e) { http_response_code(500); exit('DB connection failed.'); }
        return self::$pdo;
    }
}
