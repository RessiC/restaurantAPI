<?php

namespace App\Tests;

use App\Entity\AdminUser;
use PHPUnit\Framework\TestCase;

class AdminUserTest extends TestCase
{
    public function testCreate(): void
    {
        $AdminUser = new AdminUser();

        $this->assertInstanceOf(AdminUser::class, $AdminUser);
    }

    public function testRole()
    {
        $AdminUser = new AdminUser();
        $AdminUser->setRoles(AdminUser::ROLE_ADMIN);

        $this->assertSame(AdminUser::ROLE_ADMIN, $AdminUser->getRoles());
    }

    public function testEmail()
    {
        $AdminUser = new AdminUser();
        $AdminUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $AdminUser->getEmail());
    }
}
