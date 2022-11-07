<?php

namespace App\Tests;

use App\Entity\User;
use App\Entity\Project;
use PHPUnit\Framework\TestCase;

class ProjectUnitTest extends TestCase
{
    private Project $project;
    private User $user;

    public function setUp(): void
    {
        $this->project = $this->getProjectEntity();
        $this->user = $this->getUserEntity();
    }

    public function getProjectEntity(): Project
    {
        return (new Project())
            ->setTitle('Project title')
            ->setContent('Project content')
            ->setLink('https://project.link')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUser($this->getUserEntity());
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
        $this->assertNull($this->project->getId());
        $this->assertSame($this->project->getTitle(), 'Project title');
        $this->assertSame($this->project->getContent(), 'Project content');
        $this->assertSame($this->project->getLink(), 'https://project.link');
        $this->assertInstanceOf(\DateTimeImmutable::class, $this->project->getCreatedAt());
        $this->assertInstanceOf(User::class, $this->project->getUser());
    }

    public function testIsFalse(): void
    {
        $this->assertNotSame($this->project->getId(), 1);
        $this->assertNotSame($this->project->getTitle(), 'false');
        $this->assertNotSame($this->project->getContent(), 'false');
        $this->assertNotSame($this->project->getLink(), 'false');
        $this->assertNotInstanceOf(\DateTime::class, $this->project->getCreatedAt());
        $this->assertNotInstanceOf(Project::class, $this->project->getUser());
    }

    public function testIsEmpty(): void
    {
        $project = new Project();

        $this->assertEmpty($project->getId());
        $this->assertEmpty($project->getTitle());
        $this->assertEmpty($project->getContent());
        $this->assertEmpty($project->getLink());
        $this->assertNull($project->getCreatedAt());
        $this->assertNull($project->getUser());
    }
}
