<?php 
namespace pwnstar\AdventOfCode2021\Day22;

use PHPUnit\Framework\TestCase;

final class Day22Test extends TestCase
{
    public function testPart1Equals0(): void
    {
        $day22 = new Day22();
        $day22->importInput('advent/Day22/test_input.txt');

        $this->assertEquals(0, $day22->findFirstAnswer());
    }
}