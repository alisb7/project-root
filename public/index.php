<?php
declare(strict_types=1);

/**
 * public/index.php – front controller (no Composer required)
 */

define('APP_ROOT', dirname(__DIR__));            // C:\wamp64\www\project-root
define('APP_PATH', APP_ROOT . '/app');           // .../app

// --- Minimal PSR-4 autoloader for classes under App\ ---
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) return;
    $rel   = substr($class, strlen($prefix));                 // e.g. Core\Session
    $file  = APP_PATH . '/' . str_replace('\\', '/', $rel) . '.php';
    if (is_file($file)) require $file;
});

// --- Start session early ---
use App\Core\Session;
Session::start();

// Pull controllers (others autoload on demand)
use App\Core\Auth;
use App\Controllers\AuthController;

$route = $_GET['route'] ?? 'home';   // ← default to home (guest landing)
$auth  = new AuthController();

// Simple helper to render a view file
function render_view(string $relPath): void {
    $view = APP_PATH . '/views/' . ltrim($relPath, '/');
    if (is_file($view)) { require $view; return; }
    http_response_code(500);
    echo "View not found: " . htmlspecialchars($relPath);
    exit;
}

switch ($route) {
    // Public landing page
    case 'home':
        render_view('home.php');
        break;

    // Auth
    case 'login':
        $auth->showLogin();
        break;
    case 'auth.login':
        $auth->login();
        break;
    case 'logout':
        $auth->logout();
        break;

    // Role dashboards
    case 'admin.dashboard':
        Auth::requireRole(['admin']);
        render_view('admin/dashboard.php');
        break;
    case 'lecturer.dashboard':
        Auth::requireRole(['lecturer']);
        render_view('lecturer/dashboard.php');
        break;
    case 'student.dashboard':
        Auth::requireRole(['student']);
        render_view('student/dashboard.php');
        break;

    default:
        http_response_code(404);
        echo 'Not Found';
        break;
}
