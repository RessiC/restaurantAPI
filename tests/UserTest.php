<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreate(): void
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }

    public function testRole()
    {
        $user = new User();
        $user->setRoles(User::ROLE_USER);

        $this->assertSame(User::ROLE_USER, $user->getRoles());
    }

    public function testEmail()
    {
        $user = new User();
        $user->setEmail('email@test.com');

        $this->assertSame('email@test.com', $user->getEmail());
    }


}
