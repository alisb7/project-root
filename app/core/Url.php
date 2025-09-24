<?php
namespace App\Core;

class Url {
    /**
     * Detect the base path dynamically (e.g. /project-root/public/)
     */
    public static function base(): string {
        // SCRIPT_NAME gives e.g. /project-root/public/index.php
        $script = $_SERVER['SCRIPT_NAME'] ?? '';
        $dir = str_replace('\\', '/', dirname($script));
        if ($dir === '/' || $dir === '.') {
            return '/';
        }
        return rtrim($dir, '/') . '/';
    }

    public static function to(string $path = ''): string {
        return self::base() . ltrim($path, '/');
    }

    public static function redirect(string $path = ''): void {
        header('Location: ' . self::to($path));
        exit;
    }
}
