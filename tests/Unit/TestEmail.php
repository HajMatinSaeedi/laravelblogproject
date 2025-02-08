<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TestEmail extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $user = new User();
        $user->name = "matin";
        $this->assertEquals('matin',$user->name);
        $this->assertTrue(true);
    }
}
