<?php
namespace Core\FileUpload;

class Uploader {
    public static function save(array $file, string $path): ?string {
        if (!isset($file['tmp_name']) || $file['error'] !== UPLOAD_ERR_OK) return null;
        $filename = uniqid() . '_' . basename($file['name']);
        $destination = $path . '/' . $filename;
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return $filename;
        }
        return null;
    }
}