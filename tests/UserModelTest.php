<?php
// tests/UserModelTest.php
use App\Models\User;

require_once __DIR__ . '/../vendor/autoload.php';

function test_user_model_can_create_user() {
    $username = 'testuser_' . rand(100, 999);
    $password = password_hash('testpass', PASSWORD_DEFAULT);
    $role_id = 1;

    User::create($username, $password, $role_id);
    $user = User::findByUsername($username);

    assert($user !== false, "User should be created and retrievable.");
    assert($user['username'] === $username, "Username should match.");
}

function run_all_tests() {
    echo "Running BlazePHP Core Tests...
";
    test_user_model_can_create_user();
    echo "All tests passed.
";
}

run_all_tests();
