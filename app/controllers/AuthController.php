<?php
namespace App\Controllers;

use App\Core\Session;
use App\Core\Auth;
use App\Core\Url;      // base-safe URLs & redirects
use App\Models\User;

class AuthController
{
    public function showLogin(): void
    {
        $csrf = Session::csrfToken();
        // renders app/views/auth/login.php
        require dirname(__DIR__, 1) . '/views/auth/login.php';
    }

    public function login(): void
    {
        // Basic request & CSRF guard
        if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST' || !Session::verifyCsrf($_POST['_csrf'] ?? null)) {
            http_response_code(400);
            exit('Bad request');
        }

        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Look up user
        $user = $email ? User::findByEmail($email) : null;

        // Invalid creds → flash + redirect back to login
        if (!$user || !password_verify($password, $user['password_hash'])) {
            Session::flash('error', 'Invalid credentials');
            Url::redirect('index.php?route=login');
        }

        // Success → bind identity to session
        Auth::login($user);
        User::updateLastLogin((int)$user['id']);

        // Role-based landing (relative to base)
        switch ($user['role']) {
            case 'admin':
                $dest = 'index.php?route=admin.dashboard';
                break;
            case 'lecturer':
                $dest = 'index.php?route=lecturer.dashboard';
                break;
            case 'student':
                $dest = 'index.php?route=student.dashboard';
                break;
            default:
                $dest = 'index.php?route=login';
                break;
        }

        Url::redirect($dest);
    }

    public function logout(): void
    {
        Auth::logout();
        Url::redirect('index.php?route=login');
    }
}
