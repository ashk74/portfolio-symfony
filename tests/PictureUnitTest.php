<?php

namespace App\Tests;

use App\Entity\Picture;
use PHPUnit\Framework\TestCase;

class PictureUnitTest extends TestCase
{
    private Picture $picture;

    public function setUp(): void
    {
        $this->picture = $this->getPictureEntity();
    }

    public function getPictureEntity(): Picture
    {
        return (new Picture())
            ->setFilename('picture.jpg');
    }

    public function testIsTrue(): void
    {
        $this->assertNull($this->picture->getId());
        $this->assertSame($this->picture->getFilename(), 'picture.jpg');
    }

    public function testIsFalse(): void
    {
        $this->assertNotSame($this->picture->getId(), 1);
        $this->assertNotSame($this->picture->getFilename(), 'false');
    }

    public function testIsEmpty(): void
    {
        $picture = new Picture();

        $this->assertEmpty($picture->getId());
        $this->assertEmpty($picture->getFilename());
    }
}
