<?php
declare(strict_types=1);

/**
 * public/index.php – front controller (no Composer required)
 */

define('APP_ROOT', dirname(__DIR__));            // C:\wamp64\www\project-root
define('APP_PATH', APP_ROOT . '/app');           // ...\app

// --- Minimal PSR-4 autoloader for classes under App\ ---
spl_autoload_register(function (string $class): void {
    $prefix = 'App\\';
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) return;
    $rel  = substr($class, strlen($prefix));                 // e.g. Core\Session
    $file = APP_PATH . '/' . str_replace('\\', '/', $rel) . '.php';
    if (is_file($file)) require $file;
});

// --- Start session early ---
use App\Core\Session;
Session::start();

// Controllers (others autoload as needed)
use App\Core\Auth;
use App\Controllers\AuthController;

$route = $_GET['route'] ?? 'home';
$auth  = new AuthController();

// --- Tiny helpers ---
function render_view(string $relPath): void {
    $view = APP_PATH . '/views/' . ltrim($relPath, '/');
    if (is_file($view)) { require $view; return; }
    http_response_code(500);
    echo "View not found: " . htmlspecialchars($relPath);
    exit;
}
function guard(array $roles): void {
    // central place if we ever change how we gate
    App\Core\Auth::requireRole($roles);
}

/* ========================================================================== */
/* ROUTING                                                                    */
/* ========================================================================== */

switch ($route) {
    /* ----------------------------- Public pages ---------------------------- */
    case 'home':        render_view('home.php'); break;
    case 'about':       render_view('about.php'); break;
    case 'contact':     render_view('contact.php'); break;
    case 'contact.submit':
        (new App\Controllers\ContactController())->submit(); break;

    /* --------------------------------- Auth -------------------------------- */
    case 'login':       $auth->showLogin(); break;
    case 'auth.login':  $auth->login();     break;
    case 'logout':      $auth->logout();    break;

    /* ------------------------------- Admin --------------------------------- */
    case 'admin.dashboard':   guard(['admin']); render_view('admin/dashboard.php');   break;
    case 'admin.users':       guard(['admin']); render_view('admin/users.php');       break;
    case 'admin.subjects':    guard(['admin']); render_view('admin/subjects.php');    break;
    case 'admin.enrolments':  guard(['admin']); render_view('admin/enrolments.php');  break;
    case 'admin.marks':       guard(['admin']); render_view('admin/marks.php');       break;
    case 'admin.audit':       guard(['admin']); render_view('admin/audit.php');       break;
    case 'admin.settings':    guard(['admin']); render_view('admin/settings.php');    break;
    case 'admin.notifications': guard(['admin']); render_view('admin/notifications.php'); break;
    case 'admin.help':        guard(['admin']); render_view('admin/help.php');        break;

    /* ------------------------------ Lecturer ------------------------------- */
    case 'lecturer.dashboard':   guard(['lecturer']); render_view('lecturer/dashboard.php');   break;
    case 'lecturer.subjects':    guard(['lecturer']); render_view('lecturer/subjects.php');    break;
    case 'lecturer.cohorts':     guard(['lecturer']); render_view('lecturer/cohorts.php');     break;
    case 'lecturer.assessments': guard(['lecturer']); render_view('lecturer/assessments.php'); break;
    case 'lecturer.marks':       guard(['lecturer']); render_view('lecturer/marks.php');       break;
    case 'lecturer.messages':    guard(['lecturer']); render_view('lecturer/messages.php');    break;
    case 'lecturer.profile':     guard(['lecturer']); render_view('lecturer/profile.php');     break;
    case 'lecturer.settings':    guard(['lecturer']); render_view('lecturer/settings.php');    break;
    case 'lecturer.notifications': guard(['lecturer']); render_view('lecturer/notifications.php'); break;
    case 'lecturer.help':        guard(['lecturer']); render_view('lecturer/help.php');        break;

    /* ------------------------------- Student ------------------------------- */
    case 'student.dashboard':  guard(['student']); render_view('student/dashboard.php');  break;
    case 'student.subjects':   guard(['student']); render_view('student/subjects.php');   break;   // My Subjects
    case 'student.marks':      guard(['student']); render_view('student/marks.php');      break;   // My Marks
    case 'student.enrolments': guard(['student']); render_view('student/enrolments.php'); break;   // My Enrolments
    case 'student.messages':   guard(['student']); render_view('student/messages.php');   break;
    case 'student.profile':    guard(['student']); render_view('student/profile.php');    break;
    case 'student.settings':   guard(['student']); render_view('student/settings.php');   break;
    case 'student.notifications': guard(['student']); render_view('student/notifications.php'); break;
    case 'student.help':       guard(['student']); render_view('student/help.php');       break;

    /* -------------------------------- Fallback ----------------------------- */
    default:
        http_response_code(404);
        echo 'Not Found';
        break;
}
