<?php
/**
 * BlazePHP - نظام تنصيب تلقائي
 * يقوم بإعداد قاعدة البيانات وإنشاء الجداول الضرورية
 */

require_once __DIR__ . '/core/init.php';
use Core\DB;

header('Content-Type: application/json');

try {
    $pdo = DB::connect();

    // إنشاء جدول المستخدمين
    $pdo->exec("CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100),
        email VARCHAR(100) UNIQUE,
        password VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    // إنشاء جدول الصلاحيات
    $pdo->exec("CREATE TABLE IF NOT EXISTS permissions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) UNIQUE
    )");

    // جدول ربط المستخدمين بالصلاحيات
    $pdo->exec("CREATE TABLE IF NOT EXISTS user_permissions (
        user_id INT,
        permission_id INT,
        PRIMARY KEY(user_id, permission_id),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE
    )");

    // إضافة مستخدم افتراضي
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users");
    $stmt->execute();
    if ($stmt->fetchColumn() == 0) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([
            'Admin',
            'admin@example.com',
            password_hash('password123', PASSWORD_BCRYPT)
        ]);
    }

    echo json_encode(['status' => 'success', 'message' => 'تم إنشاء الجداول والمستخدم الافتراضي بنجاح.']);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
