<?php
namespace App\Commands;

class SayHello {
    public static function handle(): void {
        echo "Welcome to BlazePHP Ultimate CLI!\n";
    }
}