<?php

namespace App\Tests\User;

use App\Entity\User\AdminUser;
use PHPUnit\Framework\TestCase;

class AdminUserTest extends TestCase
{
    public function testCreate(): void
    {
        $adminUser = new AdminUser();
        $this->assertInstanceOf(AdminUser::class, $adminUser);
    }

    public function testRole()
    {
        $adminUser = new AdminUser();
        $adminUser->setRoles(AdminUser::ROLE_ADMIN);

        $this->assertSame(AdminUser::ROLE_ADMIN, $adminUser->getRoles());
    }

    public function testEmail()
    {
        $adminUser = new AdminUser();
        $adminUser->setEmail('email@test.com');

        $this->assertSame('email@test.com', $adminUser->getEmail());
    }
}
