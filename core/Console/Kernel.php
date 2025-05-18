<?php
namespace Core\Console;

class Kernel {
    protected array $commands = [];

    public function register(string $name, callable $handler): void {
        $this->commands[$name] = $handler;
    }

    public function handle(array $argv): void {
        \$command = \$argv[1] ?? null;
        if (isset(\$this->commands[\$command])) {
            call_user_func(\$this->commands[\$command]);
        } else {
            echo "Command not found: \$command\n";
        }
    }
}