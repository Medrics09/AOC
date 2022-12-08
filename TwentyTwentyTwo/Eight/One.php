<?php

namespace AOC\TwentyTwentyTwo\Eight;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class One extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Eight';

    protected function buildGift(array $components): int
    {
        $treeRows = $components[0];
        $treeMatrix = [];
        $visibleTrees = 0;

        foreach ($treeRows as $row => $treeRow) {
            $treeMatrix[$row] = str_split($treeRow);
        }

        for ($row = 0; $row < count($treeMatrix); $row++) {
            for ($column = 0; $column < count($treeMatrix[$row]); $column++) {
                // count outer trees
                if (
                    $row  === 0
                    || $row === count($treeMatrix) - 1
                    || $column === 0
                    || $column === count($treeMatrix[$row]) - 1
                ) {
                    $visibleTrees++;

                    continue;
                }



                if ($this->isVisible($treeMatrix, $row, $column)) {
                    $visibleTrees++;
                }
            }
        }

        return $visibleTrees;
    }

    private function isVisible(array $treeMatrix, int $startRow, int $startColumn): bool
    {
        $tree = $treeMatrix[$startRow][$startColumn];

        $visible = true;
        // look in row left
        for ($y = $startColumn-1; $y >= 0; $y--) {
            if ((int) $treeMatrix[$startRow][$y] >= (int) $tree) {
                $visible = false;

                break;
            }
        }

        if ($visible) {
            return true;
        }

        $visible = true;
        // look in column up
        for ($x = $startRow-1; $x >= 0; $x--) {
            if ((int) $treeMatrix[$x][$startColumn] >= (int) $tree) {
                $visible = false;

                break;
            }
        }

        if ($visible) {
            return true;
        }

        $visible = true;
        // look in row right
        for ($y = $startColumn+1; $y < count($treeMatrix[$startRow]); $y++) {
            if ((int) $treeMatrix[$startRow][$y] >= (int) $tree) {
                $visible = false;

                break;
            }
        }

        if ($visible) {
            return true;
        }

        $visible = true;
        // look in column down
        for ($x = $startRow+1; $x < count($treeMatrix); $x++) {
            if ((int) $treeMatrix[$x][$startColumn] >= (int) $tree) {
                $visible = false;

                break;
            }
        }

        return $visible;
    }
}

?>