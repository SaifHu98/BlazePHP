<?php
namespace Core;

use App\Middleware\VerifyCsrfToken;
use App\Middleware\SanitizeInput;
use App\Middleware\SecureHeaders;
use App\Middleware\RateLimiter;
use App\Middleware\Firewall;

class Kernel {
    public static function run(): void {
        SanitizeInput::handle();
        Firewall::handle();
        RateLimiter::handle();
        SecureHeaders::handle();
        VerifyCsrfToken::handle(app('request'));
    }
}
