<?php
namespace Core\Monitoring;

class Logger {
    public static function info(string $message): void {
        self::writeLog("INFO", $message);
    }

    public static function error(string $message): void {
        self::writeLog("ERROR", $message);
    }

    private static function writeLog(string $level, string $message): void {
        $logFile = __DIR__ . '/../../storage/logs/system.log';
        $entry = "[" . date('Y-m-d H:i:s') . "] [$level] $message" . PHP_EOL;
        file_put_contents($logFile, $entry, FILE_APPEND);
    }
}