<?php
namespace Core\LiveCode;

class Playground {
    public static function run(string \$code): string {
        ob_start();
        try {
            eval(\$code);
        } catch (\Throwable \$e) {
            return 'Error: ' . \$e->getMessage();
        }
        return ob_get_clean();
    }
}