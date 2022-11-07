<?php

namespace App\Tests;

use App\Entity\Category;
use PHPUnit\Framework\TestCase;

class CategoryUnitTest extends TestCase
{
    private Category $category;

    public function setUp(): void
    {
        $this->category = $this->getCategoryEntity();
    }

    public function getCategoryEntity(): Category
    {
        return (new Category())
            ->setName('Category');
    }

    public function testIsTrue(): void
    {
        $this->assertSame($this->category->getName(), 'Category');
    }

    public function testIsFalse(): void
    {
        $this->assertNotSame($this->category->getName(), 'false');
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getName());
    }
}
