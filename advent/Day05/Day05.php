<?php

namespace pwnstar\AdventOfCode2021\Day05;

use pwnstar\AdventOfCode2021\Day;

class Day05 extends Day
{
    private array $vents = [];
    private array $ventMap = [];

    protected function formatInput(): void
    {
        $this->explodeInputByNewLine();
        foreach ($this->input as $line) {
            preg_match('/(?<x1>\d+),(?<y1>\d+)\D*(?<x2>\d+),(?<y2>\d+)/', $line, $output);
            $this->vents[] = array_filter($output, 'is_string', ARRAY_FILTER_USE_KEY);
        }
    }

    protected function plotVents(bool $diag = false): int
    {
        foreach ($this->vents as $ventLine) {
            if ($diag == true) {
                if (($ventLine['x1'] !== $ventLine['x2']) && ($ventLine['y1'] !== $ventLine['y2'])) {
                    foreach (range($ventLine['x1'], $ventLine['x2']) as $step => $v) {
                        $x = ($ventLine['x1'] > $ventLine['x2']) ? $ventLine['x1'] - $step : $ventLine['x1'] + $step;
                        $y = ($ventLine['y1'] > $ventLine['y2']) ? $ventLine['y1'] - $step : $ventLine['y1'] + $step;
                        @$this->ventMap[$y][$x]++;
                    }
                }
            }
            if ($ventLine['x1'] == $ventLine['x2']) {
                $startY = ($ventLine['y1'] > $ventLine['y2']) ? $ventLine['y2'] : $ventLine['y1'];
                $endY = ($ventLine['y1'] > $ventLine['y2']) ? $ventLine['y1'] : $ventLine['y2'];
                for($i = $startY; $i <= $endY; $i++) {
                    @$this->ventMap[$i][$ventLine['x1']]++;
                }
            } elseif ($ventLine['y1'] == $ventLine['y2']) {
                $startX = ($ventLine['x1'] > $ventLine['x2']) ? $ventLine['x2'] : $ventLine['x1'];
                $endX = ($ventLine['x1'] > $ventLine['x2']) ? $ventLine['x1'] : $ventLine['x2'];
                for($i = $startX; $i <= $endX; $i++) {
                    @$this->ventMap[$ventLine['y1']][$i]++;
                }
            }
        }
        $count = 0;
        foreach ($this->ventMap as $row) {
            $values = array_count_values($row);
            unset($values[1]);
            $count += array_sum($values);
        }
        return $count;
    }

    public function findFirstAnswer(): int
    {
        return $this->plotVents();
    }

    public function findSecondAnswer(): int
    {
       return $this->plotVents(true);
    }
}