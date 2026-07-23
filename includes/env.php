<?php

/**
 * Tiny local .env loader for this legacy plain-PHP app.
 *
 * No Composer/vlucas-phpdotenv dependency — this app doesn't use Composer.
 * Real process/webserver environment variables always take priority; the
 * .env file (git-ignored, see .gitignore and .env.example) is only a
 * fallback for local development or hosts where env vars can't easily be
 * set per-process.
 *
 * This file must never echo/print a loaded value — only the loader itself
 * reads .env; callers get values back through env_value()/env_required().
 */

if (!function_exists('env_load')) {
    function env_load(?string $path = null): void
    {
        static $loaded = false;
        if ($loaded) {
            return;
        }
        $loaded = true;

        $path = $path ?? dirname(__DIR__) . '/.env';
        if (!is_file($path) || !is_readable($path)) {
            return;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines === false) {
            return;
        }

        foreach ($lines as $line) {
            $line = trim($line);

            // Skip blank lines and comments.
            if ($line === '' || $line[0] === '#') {
                continue;
            }

            if (strpos($line, '=') === false) {
                continue;
            }

            [$key, $value] = explode('=', $line, 2);
            $key = trim($key);
            $value = trim($value);

            if ($key === '') {
                continue;
            }

            // Strip one layer of matching quotes, e.g. KEY="value with spaces".
            $len = strlen($value);
            if ($len >= 2) {
                $first = $value[0];
                $last = $value[$len - 1];
                if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                    $value = substr($value, 1, -1);
                }
            }

            // A real environment/webserver-set variable always wins over .env.
            if (getenv($key) === false && !array_key_exists($key, $_ENV)) {
                putenv($key . '=' . $value);
                $_ENV[$key] = $value;
            }
        }
    }
}

if (!function_exists('env_value')) {
    function env_value(string $key, ?string $default = null): ?string
    {
        env_load();

        $value = getenv($key);
        if ($value !== false) {
            return $value;
        }

        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}

if (!function_exists('env_required')) {
    function env_required(string $key): string
    {
        $value = env_value($key);
        if ($value === null || $value === '') {
            // Log which key is missing (name only, never a value) and fail
            // without leaking any configuration detail to the client.
            error_log("Missing required environment variable: {$key}");
            http_response_code(500);
            die('Server configuration error. Please contact the site administrator.');
        }
        return $value;
    }
}
