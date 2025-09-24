<?php
namespace App\Controllers;

use App\Core\Session;
use App\Core\Auth;
use App\Models\User;

class AuthController {
    public function showLogin(): void {
        $csrf = Session::csrfToken();
        require dirname(__DIR__,1)."/views/auth/login.php";
    }

    public function login(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !Session::verifyCsrf($_POST['_csrf'] ?? null)) {
            http_response_code(400); exit('Bad request');
        }
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = $email ? User::findByEmail($email) : null;
        if (!$user || !password_verify($password, $user['password_hash'])) {
            Session::flash('error','Invalid credentials');
            header('Location: /public/index.php?route=login'); exit;
        }
        // Success → single identity per session:
        Auth::login($user);
        User::updateLastLogin($user['id']);

        // role-based landing:
        $role = $user['role'];
        switch ($role) {
            case 'admin':
                $dest = '/public/index.php?route=admin.dashboard';
                break;
            case 'lecturer':
                $dest = '/public/index.php?route=lecturer.dashboard';
                break;
            case 'student':
                $dest = '/public/index.php?route=student.dashboard';
                break;
            default:
                $dest = '/public/index.php';
                break;
        }
        header("Location: $dest"); exit;
    }

    public function logout(): void {
        Auth::logout();
        header('Location: /public/index.php?route=login'); exit;
    }
}
