<?php
namespace Core\Utils;

class MarkdownRenderer {
    public static function render(string $markdown): string {
        return nl2br(htmlspecialchars($markdown));
    }
}