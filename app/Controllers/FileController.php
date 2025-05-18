<?php
namespace App\Controllers;

use Core\Http\Request;
use Core\Http\Response;
use Core\FileUpload\Uploader;

class FileController {
    public function upload(Request $request, Response $response): void {
        $file = $_FILES['file'] ?? null;
        $saved = Uploader::save($file, __DIR__ . '/../../../uploads');
        if ($saved) {
            $response->json(['status' => 'uploaded', 'file' => $saved]);
        } else {
            $response->setStatusCode(400)->json(['error' => 'Upload failed']);
        }
    }
}