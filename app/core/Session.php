<?php
namespace App\Core;

class Session {
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_set_cookie_params([
                'lifetime'=>0,'path'=>'/','domain'=>'','secure'=>isset($_SERVER['HTTPS']),
                'httponly'=>true,'samesite'=>'Lax'
            ]);
            session_name('wisin_sess');
            session_start();
        }
    }
    public static function regenerate(): void { if (session_status()===PHP_SESSION_ACTIVE) session_regenerate_id(true); }
    public static function get(string $k,$d=null){ return $_SESSION[$k]??$d; }
    public static function set(string $k,$v):void{ $_SESSION[$k]=$v; }
    public static function forget(string $k):void{ unset($_SESSION[$k]); }
    public static function flush():void{ $_SESSION=[]; session_destroy(); }

    // CSRF
    public static function csrfToken(): string {
        $t = self::get('_csrf'); if (!$t){ $t=bin2hex(random_bytes(32)); self::set('_csrf',$t); }
        return $t;
    }
    public static function verifyCsrf(?string $t): bool { return hash_equals(self::get('_csrf',''), $t ?? ''); }

    // Flash
    public static function flash(string $key, ?string $val=null) {
        if ($val === null) { $v = $_SESSION['_flash'][$key] ?? null; unset($_SESSION['_flash'][$key]); return $v; }
        $_SESSION['_flash'][$key] = $val;
    }
}
