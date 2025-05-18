<?php
namespace Core\PluginSystem;

class PluginManager {
    protected static array $plugins = [];

    public static function register(string $name, callable $handler): void {
        self::$plugins[$name] = $handler;
    }

    public static function run(string $name, ...$params): mixed {
        return self::$plugins[$name](...$params) ?? null;
    }

    public static function list(): array {
        return array_keys(self::$plugins);
    }
}