<?php

namespace tests;

use Codesai\TDD\PureGreeter\PureGreeter;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PureGreeterTest extends TestCase
{

    #[Test]
    public function greet_during_the_morning() {
        $greeter = new PureGreeter();

        $greeting = $greeter->greet(8, "Pepe");

        $this->assertEquals("¡Buenos días Pepe!", $greeting);
    }

    #[Test]
    public function greet_during_the_afternoon()
    {
        $greeter = new PureGreeter();

        $greeting = $greeter->greet(15, "Pepe");

        $this->assertEquals("¡Buenas tardes Pepe!", $greeting);
    }

    #[Test]
    public function greet_during_the_night()
    {
        $greeter = new PureGreeter();

        $greeting = $greeter->greet(22, "Pepe");

        $this->assertEquals("¡Buenas noches Pepe!", $greeting);
    }

    #[Test]
    public function greeting_hours_should_be_between_0_and_23()
    {
        $greeter = new PureGreeter();

        $this->expectException(\InvalidArgumentException::class);

        $greeter->greet(40, "Pepe");
    }
}