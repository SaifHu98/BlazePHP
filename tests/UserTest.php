<?php
use PHPUnit\Framework\TestCase;
use App\Models\User;

final class UserTest extends TestCase
{
    public function testUserCanBeCreated()
    {
        $username = 'user_' . rand(100, 999);
        $password = password_hash('testpass', PASSWORD_DEFAULT);
        $role_id = 1;

        User::create($username, $password, $role_id);
        $user = User::findByUsername($username);

        $this->assertNotEmpty($user);
        $this->assertEquals($username, $user['username']);
    }
}
