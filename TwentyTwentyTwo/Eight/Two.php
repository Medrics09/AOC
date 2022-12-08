<?php

namespace AOC\TwentyTwentyTwo\Eight;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Eight';

    protected function buildGift(array $components): string
    {
        $treeRows = $components[0];
        $treeMatrix = [];
        $highestScore = 0;

        foreach ($treeRows as $row => $treeRow) {
            $treeMatrix[$row] = str_split($treeRow);
        }

        for ($row = 0; $row < count($treeMatrix); $row++) {
            for ($column = 0; $column < count($treeMatrix[$row]); $column++) {
                // ignore outer trees
                if (
                    $row  === 0
                    || $row === count($treeMatrix) - 1
                    || $column === 0
                    || $column === count($treeMatrix[$row]) - 1
                ) {
                    continue;
                }

                $treeScore = $this->getScoreForTree($treeMatrix, $row, $column);

                if ($treeScore > $highestScore) {
                    $highestScore = $treeScore;
                }
            }
        }

        return $highestScore;
    }

    private function getScoreForTree(array $treeMatrix, int $startRow, int $startColumn): int
    {
        $tree = $treeMatrix[$startRow][$startColumn];

        $score = 1;
        // look in row left
        $localeScore = 1;
        for ($y = $startColumn-1; $y > 0; $y--,$localeScore++) {
            if ((int) $treeMatrix[$startRow][$y] >= (int) $tree) {
                break;
            }
        }

        $score *= $localeScore;
        $localeScore = 1;

        // look in column up
        for ($x = $startRow-1; $x > 0; $x--,$localeScore++) {
            if ((int) $treeMatrix[$x][$startColumn] >= (int) $tree) {
                break;
            }
        }

        $score *= $localeScore;
        $localeScore = 1;

        // look in row right
        for ($y = $startColumn+1; $y < count($treeMatrix[$startRow]) - 1; $y++,$localeScore++) {
            if ((int) $treeMatrix[$startRow][$y] >= (int) $tree) {
                break;
            }
        }

        $score *= $localeScore;
        $localeScore = 1;

        // look in column down
        for ($x = $startRow+1; $x < count($treeMatrix) - 1; $x++,$localeScore++) {
            if ((int) $treeMatrix[$x][$startColumn] >= (int) $tree) {
                break;
            }
        }

        $score *= $localeScore;

        return $score;
    }
}

?>