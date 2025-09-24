<?php
declare(strict_types=1);

use App\Core\Database;

require_once __DIR__ . '/index.php'; // bootstraps DB + classes

$pdo = Database::pdo();

// Shared password
$password = 'Password@123';
$hash = password_hash($password, PASSWORD_ARGON2ID);

// Seed users (Admin, Lecturer, Student)
$users = [
    ['admin@example.com',    $hash, 'Admin User',    'admin'],
    ['lecturer@example.com', $hash, 'Lecturer User', 'lecturer'],
    ['student@example.com',  $hash, 'Student User',  'student'],
];

foreach ($users as $u) {
    [$email, $pw, $name, $role] = $u;

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->fetch()) {
        echo "User already exists: $email<br>";
    } else {
        $ins = $pdo->prepare("INSERT INTO users (email, password_hash, full_name, role) VALUES (?,?,?,?)");
        $ins->execute([$email, $pw, $name, $role]);
        echo "Seeded user: $email ($role)<br>";
    }
}

echo "<hr>";
echo "All users seeded with password: <strong>$password</strong>";
