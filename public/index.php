<?php
declare(strict_types=1);

use App\Core\Session;
use App\Core\Auth;
use App\Controllers\AuthController;

require_once dirname(__DIR__) . '/vendor/autoload.php'; // if you add Composer later, fine if missing
require_once dirname(__DIR__) . '/app/core/Config.php';   // ensure class autoload or manual require as needed
require_once dirname(__DIR__) . '/app/core/Session.php';
require_once dirname(__DIR__) . '/app/core/Auth.php';
require_once dirname(__DIR__) . '/app/core/Database.php';
require_once dirname(__DIR__) . '/app/models/User.php';
require_once dirname(__DIR__) . '/app/controllers/AuthController.php';

Session::start();
$route = $_GET['route'] ?? 'login';

$auth = new AuthController();

switch ($route) {
    case 'login':           $auth->showLogin(); break;
    case 'auth.login':      $auth->login(); break;
    case 'logout':          $auth->logout(); break;

    case 'admin.dashboard':
        Auth::requireRole(['admin']);
        require dirname(__DIR__).'/app/views/admin/dashboard.php'; break;

    case 'lecturer.dashboard':
        Auth::requireRole(['lecturer']);
        require dirname(__DIR__).'/app/views/lecturer/dashboard.php'; break;

    case 'student.dashboard':
        Auth::requireRole(['student']);
        require dirname(__DIR__).'/app/views/student/dashboard.php'; break;

    default:
        http_response_code(404); echo 'Not Found';
}
