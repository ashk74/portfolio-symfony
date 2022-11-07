<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    private User $user;

    public function setUp(): void
    {
        $this->user = $this->getUserEntity();
    }

    public function getUserEntity(): User
    {
        return (new User())
            ->setEmail('john.doe@email.com')
            ->setFirstname('John')
            ->setLastname('Doe')
            ->setPassword('password')
            ->setRoles(['ROLE_USER']);
    }

    public function testIsTrue(): void
    {
        $this->assertNull($this->user->getId());
        $this->assertSame($this->user->getEmail(), 'john.doe@email.com');
        $this->assertSame($this->user->getUserIdentifier(), 'john.doe@email.com');
        $this->assertSame($this->user->getFirstname(), 'John');
        $this->assertSame($this->user->getLastname(), 'Doe');
        $this->assertSame($this->user->getPassword(), 'password');
        $this->assertContains('ROLE_USER', $this->user->getRoles());
    }

    public function testIsFalse(): void
    {
        $this->assertNotSame($this->user->getId(), 1);
        $this->assertNotSame($this->user->getEmail(), 'false@email.com');
        $this->assertNotSame($this->user->getUserIdentifier(), 'false@email.com');
        $this->assertNotSame($this->user->getFirstname(), 'false');
        $this->assertNotSame($this->user->getLastname(), 'false');
        $this->assertNotSame($this->user->getPassword(), 'false');
        $this->assertNotContains('ROLE_ADMIN', $this->user->getRoles());
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getId());
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getUserIdentifier());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertNull($user->getPassword());
        $this->assertContains('ROLE_USER', $user->getRoles());
    }
}
