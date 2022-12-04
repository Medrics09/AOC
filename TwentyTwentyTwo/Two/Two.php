<?php

namespace AOC\TwentyTwentyTwo\Two;

include_once __DIR__ . './../../AbstractTask.php';

use AOC\AbstractTask;

class Two extends AbstractTask {
    const TASK_ID = 'TwentyTwentyTwo/Two';

    protected function buildGift(array $components): string
    {        
        // x = lose
        // y = draw
        // z = win

        $scissors = 0;
        $paper = 0;
        $rock = 0;
        $wins = 0;
        $draws = 0;

        foreach($components[0] as $rpsGame) {
            $values = explode(' ', $rpsGame);

            if ($values[1] === 'X') {
                match ($values[0]) {
                    'A' => $scissors++,
                    'B' => $rock++,
                    'C' => $paper++
                };

                continue;
            }

            if ($values[1] === 'Y') {
                $draws++;
                match ($values[0]) {
                    'A' => $rock++,
                    'B' => $paper++,
                    'C' => $scissors++
                };

                continue;
            }

            if ($values[1] === 'Z') {
                $wins++;
                match ($values[0]) {
                    'A' => $paper++,
                    'B' => $scissors++,
                    'C' => $rock++
                };

                continue;
            }
            
        }
        
        return (string) ($scissors * 3 + $paper * 2 + $rock + $wins * 6 + $draws * 3);
    }
}

?>