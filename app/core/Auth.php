<?php
namespace App\Core;

class Auth {
    public static function login(array $user): void {
        Session::regenerate();
        // single identity per session; store role with user id
        Session::set('auth', ['id'=>$user['id'], 'email'=>$user['email'], 'name'=>$user['full_name'], 'role'=>$user['role']]);
    }
    public static function logout(): void { Session::flush(); }
    public static function user(): ?array { return Session::get('auth'); }
    public static function id(): ?int { return self::user()['id'] ?? null; }
    public static function role(): ?string { return self::user()['role'] ?? null; }
    public static function check(): bool { return (bool) self::user(); }

    public static function requireAuth(): void {
        if (!self::check()) { header('Location: /public/index.php?route=login'); exit; }
    }
    public static function requireRole(array $roles): void {
        self::requireAuth();
        if (!in_array(self::role(), $roles, true)) { http_response_code(403); exit('Forbidden'); }
    }
}
