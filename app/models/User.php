<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class User {
    public static function findByEmail(string $email): ?array {
        $stmt = Database::pdo()->prepare('SELECT * FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $row = $stmt->fetch(); return $row ?: null;
    }
    public static function updateLastLogin(int $id): void {
        $stmt = Database::pdo()->prepare('UPDATE users SET last_login = NOW() WHERE id = ?');
        $stmt->execute([$id]);
    }
    public static function create(string $email, string $password, string $name, string $role='student'): int {
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        $stmt = Database::pdo()->prepare('INSERT INTO users(email,password_hash,full_name,role) VALUES (?,?,?,?)');
        $stmt->execute([$email,$hash,$name,$role]);
        return (int) Database::pdo()->lastInsertId();
    }
}
