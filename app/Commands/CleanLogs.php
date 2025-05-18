<?php
namespace App\Commands;

class CleanLogs {
    public static function handle(): void {
        $logDir = __DIR__ . '/../../../storage/logs/';
        foreach (glob($logDir . '*.log') as $file) {
            unlink($file);
        }
        echo "Logs cleaned.\n";
    }
}