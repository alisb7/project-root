<?php
namespace App\Core;

class Config {
    public static function env(string $key, $default=null) {
        static $loaded = false;
        if (!$loaded) {
            $envPath = dirname(__DIR__, 2).'/.env';
            if (is_readable($envPath)) {
                foreach (file($envPath, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES) as $line) {
                    if (str_starts_with(trim($line), '#')) continue;
                    [$k,$v] = array_map('trim', array_pad(explode('=', $line, 2), 2, ''));
                    $_ENV[$k] = $v;
                }
            }
            $loaded = true;
        }
        return $_ENV[$key] ?? $default;
    }
}
