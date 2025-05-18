<?php
namespace Core\SEO;

class MetaTags {
    public static function generate(string $title, string $description, string $keywords): string {
        return "<title>$title</title>\n" .
               "<meta name='description' content='$description'>\n" .
               "<meta name='keywords' content='$keywords'>\n";
    }
}