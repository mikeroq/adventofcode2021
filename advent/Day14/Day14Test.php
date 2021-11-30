<?php 
namespace pwnstar\AdventOfCode2021\Day14;

use PHPUnit\Framework\TestCase;

final class Day14Test extends TestCase
{
    public function testPart1Equals0(): void
    {
        $day14 = new Day14();
        $day14->importInput('advent/Day14/test_input.txt');

        $this->assertEquals(0, $day14->findFirstAnswer());
    }
}