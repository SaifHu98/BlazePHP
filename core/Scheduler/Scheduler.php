<?php
namespace Core\Scheduler;

class Scheduler {
    protected static array $tasks = [];

    public static function everyMinute(callable $task): void {
        self::$tasks[] = ['interval' => 60, 'task' => $task];
    }

    public static function run(): void {
        foreach (self::$tasks as $t) {
            call_user_func($t['task']);
        }
    }
}