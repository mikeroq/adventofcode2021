<?php 
namespace pwnstar\AdventOfCode2021\Day11;

use PHPUnit\Framework\TestCase;

final class Day11Test extends TestCase
{
    public function testPart1Equals0(): void
    {
        $day11 = new Day11();
        $day11->importInput('advent/Day11/test_input.txt');

        $this->assertEquals(0, $day11->findFirstAnswer());
    }
}