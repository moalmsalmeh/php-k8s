<?php
require_once __DIR__.'/../User.php';
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
    public function testUserName() {
        $user = new User("Ali", "ali@example.com");
        $this->assertEquals("Ali", $user->getName());
    }

    public function testUserEmail() {
        $user = new User("Ali", "ali@example.com");
        $this->assertEquals("ali@example.com", $user->getEmail());
    }
}
