<?php

namespace OhceKata\InsideOut\Tests;

use OhceKata\InsideOut\Palindrome;
use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase
{
    private Palindrome $palindrome;

    protected function setUp(): void
    {
        $this->palindrome = new Palindrome();
    }

    /** @test */
    public function it_can_process_an_empty_string()
    {
        $this->assertFalse($this->palindrome->isPalindrome(''));
    }

    /** @test */
    public function it_can_process_a_non_palindrome()
    {
        $this->assertFalse($this->palindrome->isPalindrome('not'));
    }

    /** @test */
    public function it_can_process_a_palidrome()
    {
        $this->assertTrue($this->palindrome->isPalindrome('non'));
    }
}
