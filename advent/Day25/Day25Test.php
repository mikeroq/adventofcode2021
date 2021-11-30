<?php 
namespace pwnstar\AdventOfCode2021\Day25;

use PHPUnit\Framework\TestCase;

final class Day25Test extends TestCase
{
    public function testPart1Equals0(): void
    {
        $day25 = new Day25();
        $day25->importInput('advent/Day25/test_input.txt');

        $this->assertEquals(0, $day25->findFirstAnswer());
    }
}