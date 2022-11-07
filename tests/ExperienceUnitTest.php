<?php

namespace App\Tests;

use App\Entity\Experience;
use PHPUnit\Framework\TestCase;

class ExperienceUnitTest extends TestCase
{
    private Experience $experience;

    public function setUp(): void
    {
        $this->experience = $this->getExperienceEntity();
    }

    public function getExperienceEntity(): Experience
    {
        return (new Experience())
            ->setCompany('Company')
            ->setJob('Job')
            ->setStartAt(new \DateTime('2020-01-01'))
            ->setEndAt(new \DateTime('2020-12-31'))
            ->setDescription('Description');
    }

    public function testIsTrue(): void
    {
        $this->assertSame($this->experience->getCompany(), 'Company');
        $this->assertSame($this->experience->getJob(), 'Job');
        $this->assertInstanceOf(\DateTime::class, $this->experience->getStartAt());
        $this->assertInstanceOf(\DateTime::class, $this->experience->getEndAt());
        $this->assertSame($this->experience->getDescription(), 'Description');
    }

    public function testIsFalse(): void
    {
        $this->assertFalse($this->experience->getCompany() === 'false');
        $this->assertFalse($this->experience->getJob() === 'false');
        $this->assertNotInstanceOf(\DateTimeImmutable::class, $this->experience->getStartAt());
        $this->assertNotInstanceOf(\DateTimeImmutable::class, $this->experience->getEndAt());
        $this->assertFalse($this->experience->getDescription() === 'false');
    }

    public function testIsEmpty(): void
    {
        $experience = new Experience();

        $this->assertEmpty($experience->getCompany());
        $this->assertEmpty($experience->getJob());
        $this->assertEmpty($experience->getStartAt());
        $this->assertEmpty($experience->getEndAt());
        $this->assertEmpty($experience->getDescription());
    }
}
