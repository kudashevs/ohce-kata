<?php

namespace OhceKata\InsideOut\Tests;

use OhceKata\InsideOut\Palindrome;
use PHPUnit\Framework\TestCase;

class PalindromeTest extends TestCase
{
    /** @test */
    public function it_can_process_an_empty_string()
    {
        $palindrome = new Palindrome();

        $this->assertFalse($palindrome->isPalindrome(''));
    }
}
